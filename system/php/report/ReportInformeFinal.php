<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/libs/Dompdf/src/Autoloader.php';

abstract class ReportInformeFinal
{
    public static function generatePdf($reporteDTO, $ordenDTO, $ticketDTO, $tecnicoTicketDTO)
    {
        Dompdf\Autoloader::register();
        $pdfName = 'Informe_Final_Servicio_' . date('Y-m-d') . '.pdf';
        $dompdf = new Dompdf\Dompdf();

        $html = '<style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            font-size:13px;
            align-items:center;
            text-align: center;
        }
        label{
            font-size:13px;
        }
        .negrilla{
            font-weight: bold;
        }
        .deleteBorder{
            border: none;
        }
        .lineFirma{
            margin-right: 30pt;
            background-color:#000000;
        }
        </style>
        <div>
            <table class="default" style="width:100%">
                <tr>
                    <th colspan="4">
                        MANTENIMIENTO CORRECTIVO Y PREVENTIVO
                        DE EQUIPOS DE AIRE ACONDICIONADO Y REFRIGERACION
                        (INFORME FINAL DE SERVICIO)
                    </th>
                </tr>
                <tr>
                    <td class="negrilla">
                        Fecha de servicio
                    </td>
                    <td>
                        '.$reporteDTO->getFecha_servicio().'
                    </td>
                    <td class="negrilla">
                        Mantenimiento
                    </td>
                    <td>
                        <span style="margin-right: 10pt;">Preventivo ( '.self::validateSi($reporteDTO->getMantenimiento_preventivo()[0]).' )</span><span>Correctivo ( '.self::validateSi($reporteDTO->getMantenimiento_correctivo()[0]).' )</span> 
                    </td>
                </tr>
                <tr>
                    <td class="negrilla">
                        Nombre cliente
                    </td>
                    <td>
                        '.$ticketDTO->getUsuarioDTO()->getNombre().'
                    </td>
                    <td class="negrilla">
                        Documento
                    </td>
                    <td>
                        '.$ticketDTO->getUsuarioDTO()->getCedula().'
                    </td>
                </tr>
                <tr>
                    <td class="negrilla">
                        Telefono
                    </td>
                    <td>
                        '.$ticketDTO->getUsuarioDTO()->getTelefono().'
                    </td>
                    <td class="negrilla">
                        Direccion servicio
                    </td>
                    <td>
                        '.$ticketDTO->getUsuarioDTO()->getDireccion().'
                    </td>
                </tr>
                <tr>
                    <td class="negrilla">
                        Ciudad
                    </td>
                    <td>
                        '.$ticketDTO->getUsuarioDTO()->getCiudad().'
                    </td>
                    <td class="negrilla">
                        Departamento
                    </td>
                    <td>
                        '.$ticketDTO->getUsuarioDTO()->getDepartamento().'
                    </td>
                </tr>
                <tr>
                    <td class="negrilla">
                        Nombre técnico
                    </td>
                    <td>
                        '.$tecnicoTicketDTO->getTecnicoDTO()->getNombre().'
                    </td>
                    <td class="negrilla">
                        Documento
                    </td>
                    <td>
                        '.$tecnicoTicketDTO->getTecnicoDTO()->getCedula().'
                    </td>
                </tr>
                <tr>
                    <td class="negrilla">
                        Telefono
                    </td>
                    <td>
                        '.$tecnicoTicketDTO->getTecnicoDTO()->getTelefono().'
                    </td>
                    <td class="negrilla">
                        Correo
                    </td>
                    <td>
                        '.$tecnicoTicketDTO->getTecnicoDTO()->getCorreo().'
                    </td>
                </tr>
            </table>
            <br>
            <table class="default" style="width:100%">
                <tr>
                    <th colspan="4">
                        Datos del servicio
                    </th>
                </tr>
                <tr>
                    <td class="negrilla">
                        Ubicación del equipo
                    </td>
                    <td>
                        '.$ordenDTO->getUbicacion_equipo().'
                    </td>
                    <td class="negrilla">
                        Tipo de uso
                    </td>
                    <td>
                        '.$ordenDTO->getTipo_uso()[1].'
                    </td>
                </tr>
                <tr>
                    <td class="negrilla">
                        Tipo de equipo
                    </td>
                    <td>
                        '.$ordenDTO->getTipo_equipo().'
                    </td>
                    <td class="negrilla">
                        Marca
                    </td>
                    <td>
                        '.$ordenDTO->getMarca().'
                    </td>
                </tr>
                <tr>
                    <td class="negrilla">
                        Serial
                    </td>
                    <td>
                        '.$reporteDTO->getSerial().'
                    </td>
                    <td class="negrilla">
                        Año de compra
                    </td>
                    <td>
                        '.$reporteDTO->getYear_compra().'
                    </td>
                </tr>
                <tr>
                    <td class="negrilla">
                        Capacidad (Btuh)
                    </td>
                    <td>
                        '.$ordenDTO->getCapacidad().'
                    </td>
                    <td class="negrilla">
                        Fases
                    </td>
                    <td>
                        '.$reporteDTO->getFases().'
                    </td>
                </tr>
                <tr>
                    <td class="negrilla">
                        Voltaje
                    </td>
                    <td>
                        '.$reporteDTO->getVoltaje().'
                    </td>
                    <td class="negrilla">
                        Amperaje
                    </td>
                    <td>
                        '.$reporteDTO->getAmperaje().'
                    </td>
                </tr>
            </table>';

        if($reporteDTO->getMantenimiento_preventivo()[0] == 1){
            $html .= '
                <br>
                <table class="default" style="width:100%">
                    <tr>
                        <th colspan="2">
                            Mantenimiento preventivo
                        </th>
                        <th colspan="1">
                            SI
                        </th>
                        <th colspan="1">
                            NO
                        </th>
                    </tr>
                    <tr>
                        <td colspan="2">
                            Equipo opera adecuadamente antes del servicio
                        </td>
                        <td colspan="1">
                            '.self::validateSi($reporteDTO->getEquipo_opera_inicio()[0]).'
                        </td>
                        <td colspan="1">
                            '.self::validateNo($reporteDTO->getEquipo_opera_inicio()[0]).'
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            Limpieza general
                        </td>
                        <td colspan="1">
                            '.self::validateSi($reporteDTO->getLimpieza_general()[0]).'
                        </td>
                        <td colspan="1">
                            '.self::validateNo($reporteDTO->getLimpieza_general()[0]).'
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            Limpieza filtros
                        </td>
                        <td colspan="1">
                            '.self::validateSi($reporteDTO->getLimpieza_filtros()[0]).'
                        </td>
                        <td colspan="1">
                            '.self::validateNo($reporteDTO->getLimpieza_filtros()[0]).'
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            Limpieza Serpentin evaporador
                        </td>
                        <td colspan="1">
                            '.self::validateSi($reporteDTO->getLimpieza_serpentin()[0]).'
                        </td>
                        <td colspan="1">
                            '.self::validateNo($reporteDTO->getLimpieza_serpentin()[0]).'
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            Limpieza bandeja
                        </td>
                        <td colspan="1">
                            '.self::validateSi($reporteDTO->getLimpieza_bandeja()[0]).'
                        </td>
                        <td colspan="1">
                            '.self::validateNo($reporteDTO->getLimpieza_bandeja()[0]).'
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            Serpentin condensador
                        </td>
                        <td colspan="1">
                            '.self::validateSi($reporteDTO->getSerpentin_condensador()[0]).'
                        </td>
                        <td colspan="1">
                            '.self::validateNo($reporteDTO->getSerpentin_condensador()[0]).'
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            Limpieza drenaje
                        </td>
                        <td colspan="1">
                            '.self::validateSi($reporteDTO->getLimpieza_drenaje()[0]).'
                        </td>
                        <td colspan="1">
                            '.self::validateNo($reporteDTO->getLimpieza_drenaje()[0]).'
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            Verificación
                        </td>
                        <td colspan="1">
                            '.self::validateSi($reporteDTO->getVerificacion()[0]).'
                        </td>
                        <td colspan="1">
                            '.self::validateNo($reporteDTO->getVerificacion()[0]).'
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            Estado carcasa interior
                        </td>
                        <td colspan="1">
                            '.self::validateSi($reporteDTO->getEstado_carcasa()[0]).'
                        </td>
                        <td colspan="1">
                            '.self::validateNo($reporteDTO->getEstado_carcasa()[0]).'
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            Estado equipo exterior
                        </td>
                        <td colspan="1">
                            '.self::validateSi($reporteDTO->getEstado_equipo()[0]).'
                        </td>
                        <td colspan="1">
                            '.self::validateNo($reporteDTO->getEstado_equipo()[0]).'
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            Equipo queda operando adecuadamente despues del servicio
                        </td>
                        <td colspan="1">
                            '.self::validateSi($reporteDTO->getEquipo_opera_fin()[0]).'
                        </td>
                        <td colspan="1">
                            '.self::validateNo($reporteDTO->getEquipo_opera_fin()[0]).'
                        </td>
                    </tr>
                </table>';
        }

        if($reporteDTO->getMantenimiento_correctivo()[0] == 1){
                $html .= '
                <br>
                <table class="default" style="width:100%">
                    <tr>
                        <th colspan="2">
                            Mantenimiento Correctivo
                        </th>
                    </tr>
                    <tr>
                        <td>
                            Falla encontrada
                        </td>
                        <td>
                            '.$reporteDTO->getFalla_encontrada().'
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Repuestos requeridos
                        </td>
                        <td>
                            '.$reporteDTO->getRepuestos().'
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Insumos requeridos (refrigerante, aceite, otros)
                        </td>
                        <td>
                            '.$reporteDTO->getInsumos().'
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Tarjetas electronicas 
                        </td>
                        <td>
                            '.$reporteDTO->getTarjetas_electronicas()[1].'
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Estimado horas reparacion
                        </td>
                        <td>
                            '.$reporteDTO->getEstimado_horas().'
                        </td>
                    </tr>
                </table>';
        }

            $html .= '
            <br>
            <table class="default" style="width:100%">
                <tr>
                    <th>
                        Observaciones
                    </th>
                </tr>
                <tr>
                    <td>
                        '.$reporteDTO->getObservaciones().'
                    </td>
                </tr>
            </table>
            <div style="page-break-after:always;"></div>
            <table class="default deleteBorder" style="width:100%">
                <tr class="deleteBorder">
                    <th class="deleteBorder" style="text-align:justify;">
                        Firma de autorización
                    </th>
                    <th class="deleteBorder" style="text-align:justify;">
                        Firma de conformidad
                    </th>
                </tr>
                <tr class="deleteBorder">
                    <td class="deleteBorder">
                    <br><br><br>
                        <hr size="1px" class="lineFirma">
                    </td>
                    <td class="deleteBorder">
                    <br><br><br>
                        <hr size="1px" class="lineFirma">
                    </td>
                </tr>
            </table>
            <br><br>
            <hr>
            <small>Generado automáticamente por el sistema <strong>ULLER</strong> el ' . date('Y-m-d') . ' a las ' . date('H:i:s') . '</small>
        </div>';

        $dompdf->loadHtml($html, 'UTF-8');
        $dompdf->setPaper('A4', 'potrait');
        $dompdf->render();
        $dompdf->stream($pdfName, array("Attachment" => 0));
    }

    private static function validateSi($valor){
        $result = ($valor == 1) ? 'X' : '';
        return $result;
    }

    private static function validateNo($valor){
        $result = ($valor == 0) ? 'X' : '';
        return $result;
    }
}
