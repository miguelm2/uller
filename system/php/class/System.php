<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/app.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Mail.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Administrador.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Usuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Tecnico.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Elements.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Informacion.php';


abstract  class System
{




    static function Conexion()
    {
        try {
            $dbname = Constants::$NOMBRE_BD;
            $dsn = "mysql:host=localhost;dbname=$dbname";
            $dbh = new PDO($dsn, Constants::$USUARIO_BD, Constants::$PASS_BD);
            return $dbh;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function hyphenize($string)
    {
        $dict = array(
            "I'm"      => "I am",
            "thier"    => "their",
        );

        return strtolower(
            preg_replace(
                array('#[\\s-]+#', '#[^A-Za-z0-9. -]+#'),
                array('-', ''),
                $this->limpiarString(
                    str_replace(
                        array_keys($dict),
                        array_values($dict),
                        urldecode($string)
                    )
                )
            )
        );
    }

    static function limpiarString($text)
    {
        $utf8 = array(
            '/[áàâãªä]/u'   =>   'á',
            '/[ÁÀÂÃÄ]/u'    =>   'Á',
            '/[ÍÌÎÏ]/u'     =>   'Í',
            '/[íìîï]/u'     =>   'í',
            '/[éèêë]/u'     =>   'é',
            '/[ÉÈÊË]/u'     =>   'É',
            '/[óòôõºö]/u'   =>   'ó',
            '/[ÓÒÔÕÖ]/u'    =>   'Ó',
            '/[úùûü]/u'     =>   'ú',
            '/[ÚÙÛÜ]/u'     =>   'Ú',
            '/ç/'           =>   'c',
            '/Ç/'           =>   'C',
            '/ñ/'           =>   'n',
            '/Ñ/'           =>   'N',
            '/–/'           =>   '-', // UTF-8 hyphen to "normal" hyphen
            '/[’‘‹›‚]/u'    =>   ' ', // Literally a single quote
            '/[“”«»„]/u'    =>   ' ', // Double quote
            '/ /'           =>   ' ', // nonbreaking space (equiv. to 0x160)
        );
        return preg_replace(array_keys($utf8), array_values($utf8), $text);
    }


    public static function hash($password)
    {
        return hash(Constants::$HASH_TYPE, Constants::$HASH_SALT . $password);
    }
    public static function verify($password, $hash)
    {
        return ($hash == self::hash($password));
    }


    public static function logout()
    {
        session_start();
        $_SESSION = array();
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }
        session_destroy();
        if (isset($mysqli)) {
            mysqli_close($mysqli);
        }
        header("Location: ../page/login");
    }


    public static function validarSession()
    {
        if (!isset($_SESSION['id']) && basename($_SERVER['PHP_SELF']) != 'login.php') self::logout();
    }

    static function login($user, $pass_hash)
    {
        $administrador  = Administrador::getAdministrador($user, $pass_hash);
        $usuario        = Usuario::getUser($user, $pass_hash);
        $tecnico        = Tecnico::getTecnico($user, $pass_hash);


        if ($administrador != null) {
            session_start();
            $_SESSION['id']     =   $administrador->getId_administrador();
            $_SESSION['nombre'] =   $administrador->getNombre();
            $_SESSION['correo'] =   $administrador->getCorreo();
            $_SESSION['cedula'] =   $administrador->getCedula();
            $_SESSION['telefono'] = $administrador->getTelefono();
            $_SESSION['tipo']   =   $administrador->getTipo();
            $_SESSION['fecha_registro'] = $administrador->getFecha_registro();
            $_SESSION['usuario'] = "Administrador";

            header("Location:/system/views/admin/index");
        }
        if ($usuario != null) {
            session_start();
            $_SESSION['id']     =   $usuario->getId_usuario();
            $_SESSION['nombre'] =   $usuario->getNombre();
            $_SESSION['correo'] =   $usuario->getCorreo();
            $_SESSION['cedula'] =   $usuario->getCedula();
            $_SESSION['telefono'] = $usuario->getTelefono();
            $_SESSION['tipo']   =   $usuario->getTipo();
            $_SESSION['fecha_registro'] = $usuario->getFecha_registro();
            $_SESSION['usuario'] = "Usuario";

            header("Location:/system/views/user/index");
        }
        if ($tecnico != null) {
            session_start();
            $_SESSION['id']     =   $tecnico->getId_tecnico();
            $_SESSION['nombre'] =   $tecnico->getNombre();
            $_SESSION['correo'] =   $tecnico->getCorreo();
            $_SESSION['cedula'] =   $tecnico->getCedula();
            $_SESSION['telefono'] = $tecnico->getTelefono();
            $_SESSION['tipo']   =   $tecnico->getTipo();
            $_SESSION['fecha_registro'] = $tecnico->getFecha_registro();
            $_SESSION['usuario'] = "Técnico";

            header("Location:/system/views/technician/index");
        }
        return false;
    }

    static function recovery($cedula)
    {
        $administrador  = Administrador::getAdministradorByCedula($cedula);
        $usuario        = Usuario::getUserByCedula($cedula);
        $tecnico        = Tecnico::getTecnicoByCedula($cedula);

        $asunto = "Recuperar cuenta aplicacion web ULLER";

        if ($administrador != null) {
            $new_pass = self::randomPassword();
            if (Administrador::setAdministradorPass($administrador->getId_administrador(), self::hash($new_pass))) {
                $mensaje = "Hola " . $administrador->getNombre();
                $mensaje .= " <br> " . "Su nueva contraseña para ingresar al sistema  es: " . $new_pass;
                Mail::sendEmail($asunto, $mensaje, $administrador->getCorreo());
                return true;
            }
        }

        if ($usuario != null) {
            $new_pass = self::randomPassword();
            if (Usuario::setUserPass($usuario->getId_usuario(), self::hash($new_pass))) {
                $mensaje = "Hola " . $usuario->getNombre();
                $mensaje .= " <br> " . "Su nueva contraseña para ingresar al sistema  es: " . $new_pass;
                Mail::sendEmail($asunto, $mensaje, $usuario->getCorreo());
                return true;
            }
        }

        if ($tecnico != null) {
            $new_pass = self::randomPassword();
            if (Tecnico::setTecnicoPass($tecnico->getId_tecnico(), self::hash($new_pass))) {
                $mensaje = "Hola " . $tecnico->getNombre();
                $mensaje .= " <br> " . "Su nueva contraseña para ingresar al sistema  es: " . $new_pass;
                Mail::sendEmail($asunto, $mensaje, $tecnico->getCorreo());
                return true;
            }
        }

        return false;
    }


    static function getIP()
    {
        //whether ip is from the share internet  
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        //whether ip is from the proxy  
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        //whether ip is from the remote address  
        else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    static function randomPassword()
    {
        $alphabet = 'abcdefghijklmnopqrstuvwxyz1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

    public static function validarDecimal($numero)
    {
        $lstnumeros = explode('.', $numero);
        if (count($lstnumeros) > 1) {
            return number_format($numero, 2, ',', '.');
        } else {
            return number_format($numero, 0, ',', '.');
        }
    }
}
