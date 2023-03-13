<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';

class ServicePage extends System
{

    


    static function Login($cedula,$pass)
    {
        $cedula = parent::limpiarString($cedula);
        $pass = parent::limpiarString($pass);
        $pass_hash = parent::hash($pass);
        if(!parent::login($cedula,$pass_hash)) return  '<script>swal("' . Constants::$PAGE_LOGIN . '", "", "warning");</script>';
    }

    static function Recovery($cedula)
    {
        $cedula = parent::limpiarString($cedula);
        if(parent::recovery($cedula))return  '<script>swal("' . Constants::$PAGE_RECUPERAR_PASS2. '", "", "success");</script>';
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
}



?>