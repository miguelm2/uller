<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/TipoEquipo.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Ticket.php';

class ServiceUser extends System
{

    //FUNCION PARA VALIDAR EL USUARIO QUE ACCEDE POR URL
    public static function validateSessionUser()
    {
        if ($_SESSION['tipo'] != 1) {
            parent::logout();
        }
    }

    public static function getDataDashboard()
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'index.php' && $_SESSION['tipo'] == 1) {

                $id_usuario = $_SESSION['id'];
                $list = array();

                $list[0] = TipoEquipo::getCountEquiposByUser($id_usuario);
                $list[1] = Ticket::getCountTicketsByUser($id_usuario);

                return $list;
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    static function setProfile($nombre, $correo, $telefono, $cedula, $direccion, $ciudad, $departamento)
    {
        $nombre       = parent::limpiarString($nombre);
        $correo       = parent::limpiarString($correo);
        $telefono     = parent::limpiarString($telefono);
        $cedula       = parent::limpiarString($cedula);
        $direccion    = parent::limpiarString($direccion);
        $ciudad       = parent::limpiarString($ciudad);
        $departamento = parent::limpiarString($departamento);
        $id_usuario   = $_SESSION['id'];

        if (Usuario::setUserProfile($id_usuario, $nombre, $correo, $telefono, $cedula, $direccion, $ciudad, $departamento)) {
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

    public static function newUser($nombre, $correo, $telefono, $cedula, $direccion, $ciudad, $departamento, $pass)
    {
        $nombre       = parent::limpiarString($nombre);
        $correo       = parent::limpiarString($correo);
        $telefono     = parent::limpiarString($telefono);
        $cedula       = parent::limpiarString($cedula);
        $direccion    = parent::limpiarString($direccion);
        $ciudad       = parent::limpiarString($ciudad);
        $departamento = parent::limpiarString($departamento);
        $pass         = parent::limpiarString($pass);
        $pass_hash    = parent::hash($pass);
        $estado = 1;
        $tipo   = 1;
        $fecha_registro = date('Y-m-d H:i:s');

        try {
            $result = Usuario::newUser($nombre, $correo, $telefono, $cedula, $direccion, $ciudad, $departamento, $pass_hash, $estado, $tipo, $fecha_registro);
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

    public static function setUser($id_usuario, $nombre, $correo, $telefono, $cedula, $direccion, $ciudad, $departamento, $estado)
    {
        $id_usuario   = parent::limpiarString($id_usuario);
        $nombre       = parent::limpiarString($nombre);
        $correo       = parent::limpiarString($correo);
        $telefono     = parent::limpiarString($telefono);
        $cedula       = parent::limpiarString($cedula);
        $direccion    = parent::limpiarString($direccion);
        $ciudad       = parent::limpiarString($ciudad);
        $departamento = parent::limpiarString($departamento);
        $estado       = parent::limpiarString($estado);

        try {
            $result = Usuario::setUser($id_usuario, $nombre, $correo, $telefono, $cedula, $direccion, $ciudad, $departamento, $estado);

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

    public static function getPerfilUsuario()
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'users-profile.php' && $_SESSION['tipo'] == 1) {
                $id_usuario = $_SESSION['id'];
                $result = Usuario::getUserById($id_usuario);
                return $result;
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getTablaUsuarios()
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'users.php') {
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
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getTableEquipmentType($id_usuario)
    {
        try {
            $id_usuario = parent::limpiarString($id_usuario);
            $tableHtml = "";

            $modelResponse = TipoEquipo::listTipoEquipoByUser($id_usuario);

            foreach ($modelResponse as $valor) {
                $tableHtml .= '<tr>';
                $tableHtml .= '<td>' . $valor->getId_tipo() . '</td>';
                $tableHtml .= '<td>' . $valor->getNombre() . '</td>';
                $tableHtml .= '<td>' . $valor->getDescripcion() . '</td>';
                $tableHtml .= '<td style="text-align:center;">' . Elements::crearBotonEditarJs($valor->getId_tipo()) . '</td>';
                $tableHtml .= '<td style="text-align:center;">' . Elements::crearBotonEliminarJs($valor->getId_tipo()) . '</td>';
                $tableHtml .= '</tr>';
            }

            return $tableHtml;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getSelectUsers()
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'tickets.php') {
                $html = '';

                $listUsuarios = Usuario::listUser();

                foreach ($listUsuarios as $value) {
                    $html .= '<option value="' . $value->getId_usuario() . '">' . $value->getNombre() . '</option>';
                }

                return $html;
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getIdUser()
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'tickets.php' && $_SESSION['tipo'] == 1) {
                return $_SESSION['id'];
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
