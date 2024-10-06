<?php
//require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/libs/Dompdf/src/Autoloader.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/libs/Dompdf/autoload.inc.php';

abstract class ReportInformeTicket
{
    public static function generatePdf($perfilDTO, $informeDTO, $ticketDTO, $tecnicoTicketDTO, $listEquipos)
    {
        $url_imagen = $_SERVER['DOCUMENT_ROOT'] . '/system/img/perfil/' . $perfilDTO->getImagen();
        $logo       = System::converterImageToBase64($url_imagen);


        $pdfName = 'Informe_Servicio_' . date('Y-m-d') . '.pdf';
        $dompdf = new Dompdf\Dompdf();

        $prev = '';
        $corr = '';

        if ($ticketDTO->getTipo_servicioDTO()->getNombre() == "Mantenimiento preventivo") {
            $prev = 'X';
            $corr = '';
        } else {
            $prev = '';
            $corr = 'X';
        }

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
                        (ORDEN DE SERVICIO)
                    </th>
                </tr>
                <tr>
                    <td class="negrilla">
                        Mantenimiento preventivo
                    </td>
                    <td>
                        ' . $prev . '
                    </td>
                    <td class="negrilla">
                        Mantenimiento correctivo
                    </td>
                    <td>
                        ' . $corr . '
                    </td>
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
                        Dirección servicio
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
            <br>
            
            
                ' . self::getEquipos($listEquipos, $informeDTO) . '
            <br><br>
            <hr>
            <small>Generado automáticamente por el sistema <strong>ULLER</strong> el ' . date('Y-m-d') . ' a las ' . date('H:i:s') . '</small>
        </div>';

        $dompdf->loadHtml($html, 'UTF-8');
        $dompdf->setPaper('A4', 'potrait');
        $dompdf->render();
        $dompdf->stream($pdfName, array("Attachment" => 0));
    }

    private static function getEquipos($listEquipos, $informeDTO)
    {
        $html = '';
        $count = 0;
        foreach ($listEquipos as $value) {
            $html .= '
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
                                Datos del equipo
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
                                ' . $informeDTO[$count]->getUbicacion_equipo() . '
                            </td>
                            <td class="negrilla" width="20%">
                                Tipo de uso
                            </td>
                            <td width="30%">
                                ' . $informeDTO[$count]->getTipo_uso()[1] . '
                            </td>
                        </tr>
                        <tr>
                            <td class="negrilla">
                                Fecha de servicio
                            </td>
                            <td>
                                ' . $informeDTO[$count]->getFecha_servicio() . '
                            </td>
                            <td class="negrilla">
                                Fecha del ultimo servicio
                            </td>
                            <td>
                                ' . $informeDTO[$count]->getFecha_ultimo_servicio() . '
                            </td>
                        </tr>
                    </table>
                    <br>
                    <table class="default" style="width:100%">
                        <tr>
                            <th colspan="3">
                                Descripcion del servicio
                            </th>
                        </tr>
                        <tr>
                            <th width="25%">
                                Presenta falla
                            </th>
                            <th width="25%">
                                Notas
                            </th>
                            <th width="50%">
                                Observaciones
                            </th>
                        </tr>
                        <tr>
                            <td>
                                ' . $informeDTO[$count]->getPresenta_falla() . '
                            </td>
                            <td>
                                ' . $informeDTO[$count]->getNotas() . '
                            </td>
                            <td>
                                ' . $informeDTO[$count]->getObservaciones() . '
                            </td>
                        </tr>
                    </table>
                    <br>
            ';

            $count++;
        }
        return $html;
    }
}
