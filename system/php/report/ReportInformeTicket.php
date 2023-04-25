<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/libs/Dompdf/src/Autoloader.php';

abstract class ReportInformeTicket
{
    public static function generatePdf($perfilDTO, $informeDTO, $ticketDTO, $tecnicoTicketDTO)
    {
        Dompdf\Autoloader::register();
        $pdfName = 'Informe_Servicio_' . date('Y-m-d') . '.pdf';
        $dompdf = new Dompdf\Dompdf();

        $prev = '';
        $corr = '';

        if($ticketDTO->getTipo_servicioDTO()->getNombre() == "Mantenimiento preventivo"){
            $prev = 'X';
            $corr = '';
        }else{
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
                        <img src="' . $_SERVER['DOCUMENT_ROOT'] . '/system/img/perfil/' . $perfilDTO->getImagen() . '" width="150px" height="50px" style="max-width:200px;max-height:80px;">
                    </th>
                    <th colspan="3">
                        MANTENIMIENTO CORRECTIVO Y PREVENTIVO
                        DE EQUIPOS DE AIRE ACONDICIONADO Y REFRIGERACION
                        (ORDEN DE SERVICIO)
                    </th>
                </tr>
                <tr>
                    <td class="negrilla">
                        Fecha de servicio
                    </td>
                    <td>
                        '.$informeDTO->getFecha_servicio().'
                    </td>
                    <td class="negrilla">
                        Fecha del ultimo servicio
                    </td>
                    <td>
                        '.$informeDTO->getFecha_ultimo_servicio().'
                    </td>
                </tr>
                <tr>
                    <td class="negrilla">
                        Mantenimiento preventivo
                    </td>
                    <td>
                        '.$prev.'
                    </td>
                    <td class="negrilla">
                        Mantenimiento correctivo
                    </td>
                    <td>
                        '.$corr.'
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
                    <td class="negrilla">
                        Nombre
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
                        Dirección servicio
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
            </table>
            <br>
            <table class="default" style="width:100%">
                <tr>
                    <th colspan="4">
                        Datos del técnico
                    </th>
                </tr>
                <tr>
                    <td class="negrilla">
                        Nombre
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
                        '.$informeDTO->getUbicacion_equipo().'
                    </td>
                    <td class="negrilla">
                        Tipo de uso
                    </td>
                    <td>
                        '.$informeDTO->getTipo_uso()[1].'
                    </td>
                </tr>
            </table>
            <br>
            <table class="default" style="width:100%">
                <tr>
                    <th colspan="5">
                        Descripcion del servicio
                    </th>
                </tr>
                <tr>
                    <th>
                        Equipo tipo (msp, paq, split, otro)
                    </th>
                    <th>
                        Presenta falla
                    </th>
                    <th>
                        Capacidad (Btuh/TR)
                    </th>
                    <th>
                        Marca
                    </th>
                    <th>
                        Notas
                    </th>
                </tr>
                <tr>
                    <td>
                        '.$informeDTO->getTipo_equipo().'
                    </td>
                    <td>
                        '.$informeDTO->getPresenta_falla().'
                    </td>
                    <td>
                        '.$informeDTO->getCapacidad().'
                    </td>
                    <td>
                        '.$informeDTO->getMarca().'
                    </td>
                    <td>
                        '.$informeDTO->getNotas().'
                    </td>
                </tr>
            </table>
            <br>
            <table class="default" style="width:100%">
                <tr>
                    <th colspan="4">
                        Observaciones
                    </th>
                </tr>
                <tr>
                    <td colspan="4">
                        '.$informeDTO->getObservaciones().'
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
}
