<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/libs/dompdf/autoload.inc.php';

abstract class ReportCuentaCobro
{
    public static function generatePdf($perfilDTO, $reporteDTO, $ordenDTO, $tecnicoTicketDTO, $listEquipos, $tipoServicio, $cuentaCobro, $cobroAdicional)
    {
        $url_imagen = $_SERVER['DOCUMENT_ROOT'] . '/system/img/perfil/' . $perfilDTO->getImagen();
        $logo       = System::converterImageToBase64($url_imagen);

        $pdfName = $_SERVER['DOCUMENT_ROOT'] .'/system/pdf/Informe_Final_Servicio_' . $cuentaCobro->getId_ticket() . '.pdf';
        $dompdf  = new Dompdf\Dompdf();

        $html = '<style>
        .tableBorde,
        .thBorde,
        .tdBorde {
            border: 1px solid black;
            border-collapse: collapse;
            font-size:15px;
            align-items:center;
            text-align: center;
        }
        label{
            font-size:15px;
        }
        .negrilla{
            font-weight: bold;
        }
        .deleteBorder{
            border: none;
        }
        .lineFirma{
            margin-right: 40pt;
            background-color:#000000;
        }
        .justificar{
            text-align: justify;
        }
        </style>
        <div>
            <table class="default" style="width:100%">
                <tr>
                    <th colspan="1">
                        <img src="' . $logo . '" width="150px" height="50px" style="max-width:200px;max-height:80px;">
                    </th>
                    <th colspan="2">
                        CUENTA DE COBRO N°. '. $cuentaCobro->getId_cuenta() .'
                    </th>
                    <th colspan="2">
                        ' . Elements::getFechaLetras(date('Y-m-d')) . '
                    </th>
                </tr>
            </table>
            <center><span style="font-size: 22px">' . $perfilDTO->getNombre() . '</span><br><span style="font-size: 18px">NIT ' . $perfilDTO->getNit() . '</span></center>
            <br>
            <center><b>Debe a:</b></center>
            <br>
            <center>
            <span style="font-size: 20px">' . $tecnicoTicketDTO->getTecnicoDTO()->getNombre() . '</span>
            <br>
            <span style="font-size: 18px">Numero de documento ' . $tecnicoTicketDTO->getTecnicoDTO()->getCedula() . '</span>
            <br>
            <span style="font-size: 18px">Telefono:  ' . $tecnicoTicketDTO->getTecnicoDTO()->getTelefono() . '</span>
            <br>
            <span style="font-size: 18px">Correo: ' . $tecnicoTicketDTO->getTecnicoDTO()->getCorreo() . '</span>
            <br>
            <span style="font-size: 18px">' . $tecnicoTicketDTO->getTecnicoDTO()->getDireccion() . '</span>
            <br>
            <span style="font-size: 18px">' . $tecnicoTicketDTO->getTecnicoDTO()->getCiudad() . '</span>
            </center>            
            <p>
            Para que sea pagada a la cuenta que se indica a continuación:
            <br>
            Entidad: ' . $tecnicoTicketDTO->getTecnicoDTO()->getBanco() . '
            <br>
            Tipo de cuenta: ' . $tecnicoTicketDTO->getTecnicoDTO()->getTipo_cuenta() . '
            <br>
            Número de cuenta: ' . $tecnicoTicketDTO->getTecnicoDTO()->getNumero_cuenta() . '
            <br>
            </p>
            <span>
                Lo anterior por cuenta de los siguientes conceptos:
            </span>
                ' . self::getEquipos($listEquipos, $ordenDTO, $reporteDTO, $tipoServicio,$cuentaCobro, $cobroAdicional) . '
            
            <br>
            
            <hr>
            <small>Generado automáticamente por el sistema <strong>ULLER</strong> el ' . date('Y-m-d') . ' a las ' . date('H:i:s') . '</small>
        </div>';

        $dompdf->loadHtml($html, 'UTF-8');
        $dompdf->setPaper('A4', 'potrait');
        $dompdf->render();
        //$dompdf->stream($pdfName, array("Attachment" => 0));
        file_put_contents($pdfName, $dompdf->output());
        chmod($pdfName, 0777);
    }

    private static function getEquipos($listEquipos, $ordenDTO, $reporteDTO, $tipoServicio,$cuentaCobro,$cobroAdicional)
    {
        $html = '';
        $count = 0;

        foreach ($listEquipos as $value) {
            $html .= '
            <br>
            <br>
            <table class="default tableBorde" style="width:100%">
                <tr>
                    <th colspan="8" class="thBorde">
                        Servicio N° ' . ($count + 1) . '
                    </th>
                </tr>
            </table>
            <br>
            <table class="default tableBorde" style="width:100%">
                <tr class="thBorde">
                    <th colspan="8" class="thBorde">
                        Datos de los equipos
                    </th>
                </tr>
                <tr class="thBorde">
                    <th class="thBorde">
                        Nombre
                    </th>
                    <th class="thBorde">
                        Marca
                    </th>
                    <th class="thBorde">
                        Modelo
                    </th>
                    <th class="thBorde">
                        Tipo
                    </th>
                    <th class="thBorde">
                        Serial interior
                    </th>
                    <th class="thBorde">
                        Serial exterior
                    </th>
                    <th class="thBorde">
                        Capacidad btuh
                    </th>
                    <th class="thBorde">
                        Voltaje / Fases
                    </th>
                </tr>
                <tr>
                    <td class="thBorde">' . $value->getEquipoDTO()->getNombre() . '</td>
                    <td class="thBorde">' . $value->getEquipoDTO()->getMarca() . '</td>
                    <td class="thBorde">' . $value->getEquipoDTO()->getModelo() . '</td>
                    <td class="thBorde">' . $value->getEquipoDTO()->getTipo_equipo() . '</td>
                    <td class="thBorde">' . $value->getEquipoDTO()->getSerial_interior() . '</td>
                    <td class="thBorde">' . $value->getEquipoDTO()->getSerial_exterior() . '</td>
                    <td class="thBorde">' . $value->getEquipoDTO()->getCapacidad_btuh() . '</td>
                    <td class="thBorde">' . $value->getEquipoDTO()->getVoltaje_fases() . '</td>
                </tr>
            </table>
            <br>
            <table class="default tableBorde" style="width:100%">
                <tr>
                    <th colspan="4" class="thBorde">
                        Datos del servicio
                    </th>
                </tr>
                <tr>
                    <td class="negrilla thBorde" width="20%">
                        Ubicación del equipo
                    </td>
                    <td width="30%" class="thBorde">
                        ' . $ordenDTO[$count]->getUbicacion_equipo() . '
                    </td>
                    <td class="negrilla thBorde" width="20%">
                        Tipo de uso
                    </td>
                    <td width="30%" class="thBorde">
                        ' . $ordenDTO[$count]->getTipo_uso()[1] . '
                    </td>
                </tr>
                <tr>
                    <td class="negrilla thBorde" colspan="2">
                        Fecha de servicio
                    </td>
                    <td colspan="2" class="thBorde">
                        ' . $reporteDTO[$count]->getFecha_servicio() . '
                    </td>
                </tr>
                <tr>
                    <td class="negrilla thBorde" colspan="2">
                        Mantenimiento
                    </td>
                    <td colspan="1" class="thBorde">
                        <span>Preventivo ( ' . self::validateSi($reporteDTO[$count]->getMantenimiento_preventivo()[0]) . ' )</span>
                    </td>
                    <td colspan="1" class="thBorde">
                        <span>Correctivo ( ' . self::validateSi($reporteDTO[$count]->getMantenimiento_correctivo()[0]) . ' )</span> 
                    </td>
                </tr>
            </table>';
            $suma = $tipoServicio->getValor() + $cobroAdicional->getValor();
            $html .= '
                <br>
                <table class="default tableBorde" style="width:100%">
                    <tr>
                        <th class="thBorde">
                            Observaciones
                        </th>
                    </tr>
                    <tr>
                        <td class="thBorde">
                            <p class="justificar" style="margin:5px;">' . $reporteDTO[$count]->getObservaciones() . '</p>
                        </td>
                    </tr>
                </table>
                <br>
                Estado de la cuenta: <strong>'. $cuentaCobro->getEstado()[1] .' </strong>
                <br>
                Valor del servicio:<strong>$'. number_format($tipoServicio->getValor(),0,'','.' ).' COP </strong>
                <br>
                Cobro Adicional: <strong>$'. number_format($cobroAdicional->getValor(),0,'','.' ).' COP </strong> 
                , Observación : '. $cobroAdicional->getObservacion() .'
                <br>
                La suma total a cobrar es: <strong>$'. number_format($suma,0,'','.') .' COP</strong>
                ';
                

            $firma = '
                <br>
                <br>
                <table class="default deleteBorder" style="width:100%">
                    <tr class="deleteBorder">
                        <td></td>
                        <td class="deleteBorder" style="text-align:justify;">
                        <center><img src="' . $cuentaCobro->getFirma_tecnico() . '" width="250px" style="max-width:300px; margin-top: 5pt;"></center>
                        </td>
                        <td></td>
                    </tr>
                    <tr class="deleteBorder">
                        <td></td>
                        <td class="deleteBorder" style="text-align:justify;">
                            <center><hr size="1" class="lineFirma"></center>
                        </td>
                        <td></td>
                    </tr>
                    <tr class="deleteBorder">
                        <td></td>
                        <th class="deleteBorder" style="text-align:justify; width: 50%">
                            <center>Firma del tecnico</center>
                        </th>
                        <td></td>
                    </tr>
                </table>';
            $count++;
        }

        $html .= $firma;

        return $html;
    }

    private static function validateSi($valor)
    {
        $result = ($valor == 1) ? 'X' : '';
        return $result;
    }

    private static function validateNo($valor)
    {
        $result = ($valor == 0) ? 'X' : '';
        return $result;
    }
}
