<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/CuentaCobro.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Tecnico.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/TipoServicio.php';
class ServicePaymet extends System{
    public static function getTableCuentaCobro()
    {
        if (basename($_SERVER['PHP_SELF']) == 'payments.php') {
            $tableHtml = "";
            $modelResponse = CuentaCobro::getCuentaCobro();

            foreach ($modelResponse as $valor) {
                $tecnico      = Tecnico::getTecnicoById($valor->getId_tecnico());
                $tipoServicio = TipoServicio::getTipoServicioById($valor->getId_servicio());

                $tableHtml .= '<tr>';
                $tableHtml .= '<td>' . $valor->getId_cuenta() . '</td>';
                $tableHtml .= '<td>' . $tecnico->getNombre() . '</td>';
                $tableHtml .= '<td>' . $tipoServicio->getNombre() . '</td>';
                $tableHtml .= '<td>' . $valor->getEstado()[1] . '</td>';
                $tableHtml .= '<td>' . $valor->getFecha_registro() . '</td>';
                $tableHtml .= '<td style="text-align:center;">' . Elements::crearBotonVer("payment", $valor->getId_cuenta()) . '</td>';
                $tableHtml .= '</tr>';
            }
            return $tableHtml;
        }
    }
    public static function getCuentaCobroById($id_cuenta){
        $id_cuenta = parent::limpiarString($id_cuenta);
        try{
            $modelResponse = CuentaCobro::getCuentaCobroById($id_cuenta);
            return $modelResponse;
        }catch(\Exception $e){
            throw new Exception($e->getMessage());
        }
    }
}


?>