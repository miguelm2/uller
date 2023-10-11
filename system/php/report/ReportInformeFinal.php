<?php
//require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/libs/Dompdf/src/Autoloader.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/libs/dompdf/autoload.inc.php';

abstract class ReportInformeFinal
{
    public static function generatePdf($perfilDTO, $reporteDTO, $ordenDTO, $ticketDTO, $tecnicoTicketDTO, $listEquipos)
    {
        $url_imagen = $_SERVER['DOCUMENT_ROOT'] . '/system/img/perfil/' . $perfilDTO->getImagen();
        $logo       = System::converterImageToBase64($url_imagen);

        $pdfName = 'Informe_Final_Servicio_' . date('Y-m-d') . '.pdf';
        $dompdf  = new Dompdf\Dompdf();

        $html = '<style>
        table,
        th,
        td {
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
                    <th colspan="3">
                        MANTENIMIENTO CORRECTIVO Y PREVENTIVO
                        DE EQUIPOS DE AIRE ACONDICIONADO Y REFRIGERACION
                        (INFORME FINAL DE SERVICIO)
                    </th>
                </tr>
            </table>
            <br>
            <table class="default" style="width:100%">
                <tr>
                    <th colspan="4">
                        Datos del cliente
                    </th>
                </tr>
                <tr>
                    <td class="negrilla" width="20%">
                        Nombre
                    </td>
                    <td width="30%">
                        ' . $ticketDTO->getUsuarioDTO()->getNombre() . '
                    </td>
                    <td class="negrilla" width="20%">
                        Documento
                    </td>
                    <td width="30%">
                        ' . $ticketDTO->getUsuarioDTO()->getCedula() . '
                    </td>
                </tr>
                <tr>
                    <td class="negrilla">
                        Telefono
                    </td>
                    <td>
                        ' . $ticketDTO->getUsuarioDTO()->getTelefono() . '
                    </td>
                    <td class="negrilla">
                        Direccion servicio
                    </td>
                    <td>
                        ' . $ticketDTO->getUsuarioDTO()->getDireccion() . '
                    </td>
                </tr>
                <tr>
                    <td class="negrilla">
                        Ciudad
                    </td>
                    <td>
                        ' . $ticketDTO->getUsuarioDTO()->getCiudad() . '
                    </td>
                    <td class="negrilla">
                        Departamento
                    </td>
                    <td>
                        ' . $ticketDTO->getUsuarioDTO()->getDepartamento() . '
                    </td>
                </tr>
            </table>
            <br>
            <table class="default" style="width:100%">
                <tr>
                    <th colspan="4">
                        Datos del técnico
                    </th>
                </tr>
                <tr>
                    <td class="negrilla" width="20%">
                        Nombre
                    </td>
                    <td width="30%">
                        ' . $tecnicoTicketDTO->getTecnicoDTO()->getNombre() . '
                    </td>
                    <td class="negrilla" width="20%">
                        Documento
                    </td>
                    <td width="30%">
                        ' . $tecnicoTicketDTO->getTecnicoDTO()->getCedula() . '
                    </td>
                </tr>
                <tr>
                    <td class="negrilla">
                        Telefono
                    </td>
                    <td>
                        ' . $tecnicoTicketDTO->getTecnicoDTO()->getTelefono() . '
                    </td>
                    <td class="negrilla">
                        Correo
                    </td>
                    <td>
                        ' . $tecnicoTicketDTO->getTecnicoDTO()->getCorreo() . '
                    </td>
                </tr>
                <tr>
                    <td class="negrilla">
                        Dirección
                    </td>
                    <td>
                        ' . $tecnicoTicketDTO->getTecnicoDTO()->getDireccion() . '
                    </td>
                    <td class="negrilla">
                        Ciudad
                    </td>
                    <td>
                        ' . $tecnicoTicketDTO->getTecnicoDTO()->getCiudad() . '
                    </td>
                </tr>
            </table>
            
            
                ' . self::getEquipos($listEquipos, $ordenDTO, $reporteDTO) . '
            
            <br><br>
            <hr>
            <small>Generado automáticamente por el sistema <strong>ULLER</strong> el ' . date('Y-m-d') . ' a las ' . date('H:i:s') . '</small>
        </div>';

        $dompdf->loadHtml($html, 'UTF-8');
        $dompdf->setPaper('A4', 'potrait');
        $dompdf->render();
        $dompdf->stream($pdfName, array("Attachment" => 0));
    }

    private static function getEquipos($listEquipos, $ordenDTO, $reporteDTO)
    {
        $html = '';
        $count = 0;

        foreach ($listEquipos as $value) {
            $html .= '
            <br>
            <br>
            <table class="default" style="width:100%">
                <tr>
                    <th colspan="8">
                        Servicio N° ' . ($count + 1) . '
                    </th>
                </tr>
            </table>
            <br>
            <table class="default" style="width:100%">
                <tr>
                    <th colspan="8">
                        Datos de los equipos
                    </th>
                </tr>
                <tr>
                    <th>
                        Nombre
                    </th>
                    <th>
                        Marca
                    </th>
                    <th>
                        Modelo
                    </th>
                    <th>
                        Tipo
                    </th>
                    <th>
                        Serial interior
                    </th>
                    <th>
                        Serial exterior
                    </th>
                    <th>
                        Capacidad btuh
                    </th>
                    <th>
                        Voltaje / Fases
                    </th>
                </tr>
                <tr>
                    <td>' . $value->getEquipoDTO()->getNombre() . '</td>
                    <td>' . $value->getEquipoDTO()->getMarca() . '</td>
                    <td>' . $value->getEquipoDTO()->getModelo() . '</td>
                    <td>' . $value->getEquipoDTO()->getTipo_equipo() . '</td>
                    <td>' . $value->getEquipoDTO()->getSerial_interior() . '</td>
                    <td>' . $value->getEquipoDTO()->getSerial_exterior() . '</td>
                    <td>' . $value->getEquipoDTO()->getCapacidad_btuh() . '</td>
                    <td>' . $value->getEquipoDTO()->getVoltaje_fases() . '</td>
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
                    <td class="negrilla" width="20%">
                        Ubicación del equipo
                    </td>
                    <td width="30%">
                        ' . $ordenDTO[$count]->getUbicacion_equipo() . '
                    </td>
                    <td class="negrilla" width="20%">
                        Tipo de uso
                    </td>
                    <td width="30%">
                        ' . $ordenDTO[$count]->getTipo_uso()[1] . '
                    </td>
                </tr>
                <tr>
                    <td class="negrilla" colspan="2">
                        Fecha de servicio
                    </td>
                    <td colspan="2">
                        ' . $reporteDTO[$count]->getFecha_servicio() . '
                    </td>
                </tr>
                <tr>
                    <td class="negrilla" colspan="2">
                        Mantenimiento
                    </td>
                    <td colspan="1">
                        <span>Preventivo ( ' . self::validateSi($reporteDTO[$count]->getMantenimiento_preventivo()[0]) . ' )</span>
                    </td>
                    <td colspan="1">
                        <span>Correctivo ( ' . self::validateSi($reporteDTO[$count]->getMantenimiento_correctivo()[0]) . ' )</span> 
                    </td>
                </tr>
            </table>';

            if ($reporteDTO[$count]->getMantenimiento_preventivo()[0] == 1) {
                $html .= '
                    <br>
                    <br>
                    <table class="default" style="width:100%">
                        <tr>
                            <th colspan="2" width="80%">
                                Mantenimiento preventivo
                            </th>
                            <th colspan="1" width="10%">
                                SI
                            </th>
                            <th colspan="1" width="10%">
                                NO
                            </th>
                        </tr>
                        <tr>
                            <td colspan="2" class="justificar">
                                Equipo opera adecuadamente antes del servicio
                            </td>
                            <td colspan="1">
                                ' . self::validateSi($reporteDTO[$count]->getEquipo_opera_inicio()[0]) . '
                            </td>
                            <td colspan="1">
                                ' . self::validateNo($reporteDTO[$count]->getEquipo_opera_inicio()[0]) . '
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="justificar">
                                Limpieza general
                            </td>
                            <td colspan="1">
                                ' . self::validateSi($reporteDTO[$count]->getLimpieza_general()[0]) . '
                            </td>
                            <td colspan="1">
                                ' . self::validateNo($reporteDTO[$count]->getLimpieza_general()[0]) . '
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="justificar">
                                Limpieza filtros
                            </td>
                            <td colspan="1">
                                ' . self::validateSi($reporteDTO[$count]->getLimpieza_filtros()[0]) . '
                            </td>
                            <td colspan="1">
                                ' . self::validateNo($reporteDTO[$count]->getLimpieza_filtros()[0]) . '
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="justificar">
                                Limpieza Serpentin evaporador
                            </td>
                            <td colspan="1">
                                ' . self::validateSi($reporteDTO[$count]->getLimpieza_serpentin()[0]) . '
                            </td>
                            <td colspan="1">
                                ' . self::validateNo($reporteDTO[$count]->getLimpieza_serpentin()[0]) . '
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="justificar">
                                Limpieza bandeja
                            </td>
                            <td colspan="1">
                                ' . self::validateSi($reporteDTO[$count]->getLimpieza_bandeja()[0]) . '
                            </td>
                            <td colspan="1">
                                ' . self::validateNo($reporteDTO[$count]->getLimpieza_bandeja()[0]) . '
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="justificar">
                                Serpentin condensador
                            </td>
                            <td colspan="1">
                                ' . self::validateSi($reporteDTO[$count]->getSerpentin_condensador()[0]) . '
                            </td>
                            <td colspan="1">
                                ' . self::validateNo($reporteDTO[$count]->getSerpentin_condensador()[0]) . '
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="justificar">
                                Limpieza drenaje
                            </td>
                            <td colspan="1">
                                ' . self::validateSi($reporteDTO[$count]->getLimpieza_drenaje()[0]) . '
                            </td>
                            <td colspan="1">
                                ' . self::validateNo($reporteDTO[$count]->getLimpieza_drenaje()[0]) . '
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="justificar">
                                Verificación
                            </td>
                            <td colspan="1">
                                ' . self::validateSi($reporteDTO[$count]->getVerificacion()[0]) . '
                            </td>
                            <td colspan="1">
                                ' . self::validateNo($reporteDTO[$count]->getVerificacion()[0]) . '
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="justificar">
                                Estado carcasa interior
                            </td>
                            <td colspan="1">
                                ' . self::validateSi($reporteDTO[$count]->getEstado_carcasa()[0]) . '
                            </td>
                            <td colspan="1">
                                ' . self::validateNo($reporteDTO[$count]->getEstado_carcasa()[0]) . '
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="justificar">
                                Estado equipo exterior
                            </td>
                            <td colspan="1">
                                ' . self::validateSi($reporteDTO[$count]->getEstado_equipo()[0]) . '
                            </td>
                            <td colspan="1">
                                ' . self::validateNo($reporteDTO[$count]->getEstado_equipo()[0]) . '
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="justificar">
                                Equipo queda operando adecuadamente despues del servicio
                            </td>
                            <td colspan="1">
                                ' . self::validateSi($reporteDTO[$count]->getEquipo_opera_fin()[0]) . '
                            </td>
                            <td colspan="1">
                                ' . self::validateNo($reporteDTO[$count]->getEquipo_opera_fin()[0]) . '
                            </td>
                        </tr>
                    </table>';
            }

            if ($reporteDTO[$count]->getMantenimiento_correctivo()[0] == 1) {
                $html .= '
                    <br>
                    <table class="default" style="width:100%">
                        <tr>
                            <th colspan="2">
                                Mantenimiento Correctivo
                            </th>
                        </tr>
                        <tr>
                            <td class="justificar">
                                Falla encontrada
                            </td>
                            <td>
                                ' . $reporteDTO[$count]->getFalla_encontrada() . '
                            </td>
                        </tr>
                        <tr>
                            <td class="justificar">
                                Repuestos requeridos
                            </td>
                            <td>
                                ' . $reporteDTO[$count]->getRepuestos() . '
                            </td>
                        </tr>
                        <tr>
                            <td class="justificar">
                                Insumos requeridos (refrigerante, aceite, otros)
                            </td>
                            <td>
                                ' . $reporteDTO[$count]->getInsumos() . '
                            </td>
                        </tr>
                        <tr>
                            <td class="justificar">
                                Tarjetas electronicas 
                            </td>
                            <td>
                                ' . $reporteDTO[$count]->getTarjetas_electronicas()[1] . '
                            </td>
                        </tr>
                        <tr>
                            <td class="justificar">
                                Estimado horas reparacion
                            </td>
                            <td>
                                ' . $reporteDTO[$count]->getEstimado_horas() . '
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
                            <p class="justificar" style="margin:5px;">' . $reporteDTO[$count]->getObservaciones() . '</p>
                        </td>
                    </tr>
                </table>
                ';

                $firma = '
                <br>
                <br>
                <br>
                <table class="default deleteBorder" style="width:100%">
                    <tr class="deleteBorder">
                        <td class="deleteBorder" style="text-align:justify;">
                            
                        </td>
                        <td class="deleteBorder" style="text-align:justify;">
                            <img src="' . $reporteDTO[$count]->getFirma() . '" width="250px" style="max-width:300px; margin-top: 5pt;">
                        </td>
                    </tr>
                    <tr class="deleteBorder">
                        <td class="deleteBorder" style="text-align:justify;">
                            <hr size="1" class="lineFirma">
                        </td>
                        <td class="deleteBorder" style="text-align:justify;">
                            <hr size="1" class="lineFirma">
                        </td>
                    </tr>
                    <tr class="deleteBorder">
                        <th class="deleteBorder" style="text-align:justify; width: 50%">
                            Firma de autorización
                            
                        </th>
                        <th class="deleteBorder" style="text-align:justify; width: 50%">
                            Firma de conformidad
                            
                        </th>
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
