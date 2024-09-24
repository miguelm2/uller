<?php
//require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/libs/Dompdf/src/Autoloader.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/libs/dompdf/autoload.inc.php';

abstract class ReportInformeFinalSolicitud
{
    public static function generatePdf($perfilDTO, $reporteFinalDTO, $solicitudDTO, $tecnicoDTO, $servicioDTO, $equipoDTO)
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
                        SERVICIO DE EQUIPOS DE AIRE ACONDICIONADO Y REFRIGERACION
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
                        ' . $solicitudDTO->getUsuarioDTO()->getNombre() . '
                    </td>
                    <td class="negrilla" width="20%">
                        Documento
                    </td>
                    <td width="30%">
                        ' . $solicitudDTO->getUsuarioDTO()->getCedula() . '
                    </td>
                </tr>
                <tr>
                    <td class="negrilla">
                        Telefono
                    </td>
                    <td>
                        ' . $solicitudDTO->getUsuarioDTO()->getTelefono() . '
                    </td>
                    <td class="negrilla">
                        Direccion servicio
                    </td>
                    <td>
                        ' . $solicitudDTO->getUsuarioDTO()->getDireccion() . '
                    </td>
                </tr>
                <tr>
                    <td class="negrilla">
                        Ciudad
                    </td>
                    <td>
                        ' . $solicitudDTO->getUsuarioDTO()->getCiudad() . '
                    </td>
                    <td class="negrilla">
                        Departamento
                    </td>
                    <td>
                        ' . $solicitudDTO->getUsuarioDTO()->getDepartamento() . '
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
                        ' . $tecnicoDTO->getNombre() . '
                    </td>
                    <td class="negrilla" width="20%">
                        Documento
                    </td>
                    <td width="30%">
                        ' . $tecnicoDTO->getCedula() . '
                    </td>
                </tr>
                <tr>
                    <td class="negrilla">
                        Telefono
                    </td>
                    <td>
                        ' . $tecnicoDTO->getTelefono() . '
                    </td>
                    <td class="negrilla">
                        Correo
                    </td>
                    <td>
                        ' . $tecnicoDTO->getCorreo() . '
                    </td>
                </tr>
                <tr>
                    <td class="negrilla">
                        Dirección
                    </td>
                    <td>
                        ' . $tecnicoDTO->getDireccion() . '
                    </td>
                    <td class="negrilla">
                        Ciudad
                    </td>
                    <td>
                        ' . $tecnicoDTO()->getCiudad() . '
                    </td>
                </tr>
            </table>
            
                ' . self::getEquipos($equipoDTO, $servicioDTO, $reporteFinalDTO) . '
            <br><br>
            <hr>
            <small>Generado automáticamente por el sistema <strong>ULLER</strong> el ' . date('Y-m-d') . ' a las ' . date('H:i:s') . '</small>
        </div>';

        $dompdf->loadHtml($html, 'UTF-8');
        $dompdf->setPaper('A4', 'potrait');
        $dompdf->render();
        $dompdf->stream($pdfName, array("Attachment" => 0));
    }

    private static function getEquipos($equipoDTO, $servicioDTO, $reporteDTO)
    {
        $html = '';
        $count = 0;

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
                    <td>' . $equipoDTO->getNombre() . '</td>
                    <td>' . $equipoDTO->getMarca() . '</td>
                    <td>' . $equipoDTO->getModelo() . '</td>
                    <td>' . $equipoDTO->getTipoServicioDTO()->getNombre() . '</td>
                    <td>' . $equipoDTO->getSerial_interior() . '</td>
                    <td>' . $equipoDTO->getSerial_exterior() . '</td>
                    <td>' . $equipoDTO->getCapacidad_btuh() . '</td>
                    <td>' . $equipoDTO->getConexionElectrica()[1] . '</td>
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
                        ' . $reporteDTO->getUbicacion() . '
                    </td>
                    <td class="negrilla" width="20%">
                        Tipo de uso
                    </td>
                    <td width="30%">
                        ' . $reporteDTO->getTipo_uso()[1] . '
                    </td>
                </tr>
                <tr>
                    <td class="negrilla" colspan="2">
                        Fecha de servicio
                    </td>
                    <td colspan="2">
                        ' . $reporteDTO->getFecha_servicio() . '
                    </td>
                </tr>
                <tr>
                    <td class="negrilla" colspan="2">
                        Servicio
                    </td>
                    <td colspan="2">
                        <span>' . $servicioDTO->getTipoServicioDTO()->getNombre() . '</span>
                    </td>
                </tr>
            </table>';

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
                                ' . self::validateSi($reporteDTO->getEquipo_opera_inicio()[0]) . '
                            </td>
                            <td colspan="1">
                                ' . self::validateNo($reporteDTO->getEquipo_opera_inicio()[0]) . '
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="justificar">
                                Limpieza general
                            </td>
                            <td colspan="1">
                                ' . self::validateSi($reporteDTO->getLimpieza_general()[0]) . '
                            </td>
                            <td colspan="1">
                                ' . self::validateNo($reporteDTO->getLimpieza_general()[0]) . '
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="justificar">
                                Limpieza filtros
                            </td>
                            <td colspan="1">
                                ' . self::validateSi($reporteDTO->getLimpieza_filtros()[0]) . '
                            </td>
                            <td colspan="1">
                                ' . self::validateNo($reporteDTO->getLimpieza_filtros()[0]) . '
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="justificar">
                                Limpieza Serpentin evaporador
                            </td>
                            <td colspan="1">
                                ' . self::validateSi($reporteDTO->getLimpieza_serpentin()[0]) . '
                            </td>
                            <td colspan="1">
                                ' . self::validateNo($reporteDTO->getLimpieza_serpentin()[0]) . '
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="justificar">
                                Limpieza bandeja
                            </td>
                            <td colspan="1">
                                ' . self::validateSi($reporteDTO->getLimpieza_bandeja()[0]) . '
                            </td>
                            <td colspan="1">
                                ' . self::validateNo($reporteDTO->getLimpieza_bandeja()[0]) . '
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="justificar">
                                Serpentin condensador
                            </td>
                            <td colspan="1">
                                ' . self::validateSi($reporteDTO->getSerpentin_condensador()[0]) . '
                            </td>
                            <td colspan="1">
                                ' . self::validateNo($reporteDTO->getSerpentin_condensador()[0]) . '
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="justificar">
                                Limpieza drenaje
                            </td>
                            <td colspan="1">
                                ' . self::validateSi($reporteDTO->getLimpieza_drenaje()[0]) . '
                            </td>
                            <td colspan="1">
                                ' . self::validateNo($reporteDTO->getLimpieza_drenaje()[0]) . '
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="justificar">
                                Verificación
                            </td>
                            <td colspan="1">
                                ' . self::validateSi($reporteDTO->getVerificacion()[0]) . '
                            </td>
                            <td colspan="1">
                                ' . self::validateNo($reporteDTO->getVerificacion()[0]) . '
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="justificar">
                                Estado carcasa interior
                            </td>
                            <td colspan="1">
                                ' . self::validateSi($reporteDTO->getEstado_carcasa()[0]) . '
                            </td>
                            <td colspan="1">
                                ' . self::validateNo($reporteDTO->getEstado_carcasa()[0]) . '
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="justificar">
                                Estado equipo exterior
                            </td>
                            <td colspan="1">
                                ' . self::validateSi($reporteDTO->getEstado_equipo()[0]) . '
                            </td>
                            <td colspan="1">
                                ' . self::validateNo($reporteDTO->getEstado_equipo()[0]) . '
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="justificar">
                                Equipo queda operando adecuadamente despues del servicio
                            </td>
                            <td colspan="1">
                                ' . self::validateSi($reporteDTO->getEquipo_opera_fin()[0]) . '
                            </td>
                            <td colspan="1">
                                ' . self::validateNo($reporteDTO->getEquipo_opera_fin()[0]) . '
                            </td>
                        </tr>
                    </table>';

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
                                Diagnostico Mantenimiento Correctivo
                            </td>
                            <td>
                                ' . $reporteDTO->getDiagnostico_mant_corr() . '
                            </td>
                        </tr>
                        <tr>
                            <td class="justificar">
                                Fecha Aproximada del próximo servicio
                            </td>
                            <td>
                                ' . $reporteDTO->getProx_servicio() . '
                            </td>
                        </tr>
                    </table>';

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
                            <p class="justificar" style="margin:5px;">' . $reporteDTO->getObservaciones() . '</p>
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
                            <img src="' . $reporteDTO->getFirma() . '" width="250px" style="max-width:300px; margin-top: 5pt;">
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
