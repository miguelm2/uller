<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/CuentaCobro.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Tecnico.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/TipoServicio.php';
class ServicePaymet extends System{
    public static function getTableCuentaCobro($id_tecnico)
    {
        $id_tecnico = parent::limpiarString($id_tecnico);
        if (basename($_SERVER['PHP_SELF']) == 'payments.php') {
            $tableHtml = "";
            $modelResponse = CuentaCobro::getCuentaCobro($id_tecnico);

            foreach ($modelResponse as $valor) {
                $tecnico      = Tecnico::getTecnicoById($valor->getId_tecnico());
                $tableHtml .= '<tr>';
                $tableHtml .= '<td>' . $valor->getId_cuenta() . '</td>';
                $tableHtml .= '<td>' . $tecnico->getNombre() . '</td>';
                $tableHtml .= '<td>' . $valor->getEstado()[1] . '</td>';
                $tableHtml .= '<td>' . $valor->getFecha_registro() . '</td>';
                $tableHtml .= '<td style="text-align:center;">' . Elements::crearBotonVer("payment", $valor->getId_ticket()) . '</td>';
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
    public static function addFirmaCuentaCobro($id_ticket, $firma)
    {
        $id_ticket = parent::limpiarString($id_ticket);
        $firma            = parent::limpiarString($firma);

        try {
            $modelResponse = CuentaCobro::setFirmaCuentaCobro($id_ticket, $firma);
            if ($modelResponse) return '<script>swal("Firma agregada correctamente", "", "success");</script>';
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getButtonFirmaImform($id_ticket)
    {
        try {
            if ($_SESSION['tipo'] != 1) {
                $id_ticket = parent::limpiarString($id_ticket);
                $html = '';

                $countReportes = ReporteFinal::getCountReporteFinalByTicket($id_ticket);
                $countEquiposTicket = EquipoTicket::getCountEquipoTicketByTicket($id_ticket);

                if ($countReportes == $countEquiposTicket) {
                    $html = '
                    <form method="post" class="row">
                        <div class="col-md-4 d-grid gap-2 mt-3 mx-auto">
                            <button type="button" class="btn btn-warning text-white" id="botonFirma"><i class="bi bi-pencil-square"></i> Actualizar Firma</button>
                        </div>
                    </form>';
                }


                return $html;
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}


?>