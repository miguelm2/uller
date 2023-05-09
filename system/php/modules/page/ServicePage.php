<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';

class ServicePage extends System
{




    static function Login($cedula, $pass)
    {
        $cedula = parent::limpiarString($cedula);
        $pass = parent::limpiarString($pass);
        $pass_hash = parent::hash($pass);
        if (!parent::login($cedula, $pass_hash)) return  '<script>swal("' . Constants::$PAGE_LOGIN . '", "", "warning");</script>';
    }

    static function Recovery($cedula)
    {
        $cedula = parent::limpiarString($cedula);
        if (parent::recovery($cedula)) return  '<script>swal("' . Constants::$PAGE_RECUPERAR_PASS2 . '", "", "success");</script>';
        return  '<script>swal("' . Constants::$PAGE_RECUPERAR_PASS_CEDULA . '", "", "warning");</script>';
    }

    //ALERTAS ----------------------------------------------------------------------------------

    static function getAlertaNuevo()
    {
        return '<script>swal("' . Constants::$REGISTER_NEW . '", "", "success");</script>';
    }

    static function getAlertaEliminar()
    {
        return '<script>swal("' . Constants::$REGISTER_DELETE . '", "", "success");</script>';
    }



    //Registrar nuevo usuario ----------------------------------------------------------------
    public static function newAccountUser($nombre, $correo, $telefono, $cedula, $direccion, $ciudad, $departamento, $pass)
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
                return  '<script>swal("' . Constants::$USER_NEW . '", "Haga clic en iniciar sesión", "success");</script>';
            } else {
                return  '<script>swal("' . Constants::$ADMIN_REPEAT . '", "Ya existe un usuario con esas credenciales", "warning");</script>';
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getInformation()
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'login.php' || basename($_SERVER['PHP_SELF']) == 'recovery.php' || basename($_SERVER['PHP_SELF']) == 'registerAccount.php') {
                $result = Informacion::getInformacion();
                return $result;
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
