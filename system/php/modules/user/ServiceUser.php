<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';

class ServiceUser extends System
{
    static function setProfile($nombre, $correo, $telefono, $cedula)
    {
        $nombre = parent::limpiarString($nombre);
        $correo = parent::limpiarString($correo);
        $telefono = parent::limpiarString($telefono);
        $cedula = parent::limpiarString($cedula);
        $id_usuario = $_SESSION['id'];
        if (Usuario::setUserProfile($id_usuario, $nombre, $correo, $telefono, $cedula)) {
            $usuario = Usuario::getUserById($id_usuario);
            $_SESSION['id']     =   $usuario->getId_usuario();
            $_SESSION['nombre'] =   $usuario->getNombre();
            $_SESSION['correo'] =   $usuario->getCorreo();
            $_SESSION['cedula'] =   $usuario->getCedula();
            $_SESSION['telefono'] = $usuario->getTelefono();
            $_SESSION['tipo']   =   $usuario->getTipo();
            $_SESSION['fecha_registro'] = $usuario->getFecha_registro();
            return  '<script>swal("' . Constants::$INFORMATION_NEW . '", "", "success");</script>';
        } else {
            return  '<script>swal("' . Constants::$ADMIN_REPEAT . '", "", "error");</script>';
        }
    }

    static function setPassProfile($pass, $newPass, $confirmPass)
    {
        $pass = parent::limpiarString($pass);
        $newPass = parent::limpiarString($newPass);
        $confirmPass = parent::limpiarString($confirmPass);

        try {
                $cedula = $_SESSION['cedula'];
                $pass_hash = parent::hash($pass);
                $result = Usuario::getUser($cedula, $pass_hash);

                if ($result) {
                    $id_usuario = $_SESSION['id'];
                    $pass_hash = parent::hash($newPass);
                    $result = Usuario::setUserPass($id_usuario, $pass_hash);
                    if ($result) return  '<script>swal("' . Constants::$UPDATE_PASS . '", "", "success");</script>';
                } else {
                    return  '<script>swal("' . Constants::$CURRENT_PASS . '", "", "error");</script>';
                }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function newUser($nombre, $correo, $telefono, $cedula, $pass)
    {
        $nombre = parent::limpiarString($nombre);
        $correo = parent::limpiarString($correo);
        $telefono = parent::limpiarString($telefono);
        $cedula = parent::limpiarString($cedula);
        $pass = parent::limpiarString($pass);
        $pass_hash = parent::hash($pass);
        $estado = 1;
        $tipo = 1;
        $fecha_registro = date('Y-m-d H:i:s');

        try {
            $result = Usuario::newUser($nombre, $correo, $telefono, $cedula, $pass_hash, $estado, $tipo, $fecha_registro);
            if ($result) {
                $lastUser = Usuario::lastUsuario();
                header('Location:user?user=' . $lastUser->getId_usuario() . '&new');
            } else {
                return  '<script>swal("' . Constants::$ADMIN_REPEAT . '", "", "error");</script>';
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function setUser($id_usuario, $nombre, $correo, $telefono, $cedula, $estado)
    {
        $id_usuario = parent::limpiarString($id_usuario);
        $nombre = parent::limpiarString($nombre);
        $correo = parent::limpiarString($correo);
        $telefono = parent::limpiarString($telefono);
        $cedula = parent::limpiarString($cedula);
        $estado = parent::limpiarString($estado);

        try {
            $result = Usuario::setUser($id_usuario, $nombre, $correo, $telefono, $cedula, $estado);

            if ($result) {
                return  '<script>swal("' . Constants::$USER_UPDATE . '", "", "success");</script>';
            } else {
                return  '<script>swal("' . Constants::$ADMIN_REPEAT . '", "", "error");</script>';
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    static function setPassUser($id_usuario, $pass, $confirmPass)
    {
        $id_usuario = parent::limpiarString($id_usuario);
        $pass = parent::limpiarString($pass);
        $confirmPass = parent::limpiarString($confirmPass);

        try {
            $pass_hash = parent::hash($pass);
            $result = Usuario::setUserPass($id_usuario, $pass_hash);
            if ($result) return  '<script>swal("' . Constants::$UPDATE_PASS . '", "", "success");</script>';
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function deleteUser($id_usuario)
    {
        $id_usuario = parent::limpiarString($id_usuario);

        try {
            $result = Usuario::deleteUser($id_usuario);
            if ($result) header('Location:users?delete');
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getUsuario($id_usuario)
    {
        $id_usuario = parent::limpiarString($id_usuario);

        try {
            $result = Usuario::getUserById($id_usuario);
            return $result;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getTablaUsuarios()
    {
        try {
            $tableHtml = "";
            $modelResponse = Usuario::listUser();

            foreach ($modelResponse as $valor) {
                $tableHtml .= '<tr>';
                $tableHtml .= '<td>' . $valor->getNombre() . '</td>';
                $tableHtml .= '<td>' . $valor->getCorreo() . '</td>';
                $tableHtml .= '<td>' . $valor->getTelefono() . '</td>';
                $tableHtml .= '<td>' . $valor->getCedula() . '</td>';
                $tableHtml .= '<td>' . $valor->getEstado()[1] . '</td>';
                $tableHtml .= '<td>' . Elements::crearBotonVer("user", $valor->getId_usuario()) . '</td>';
                $tableHtml .= '</tr>';
            }
            return $tableHtml;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
