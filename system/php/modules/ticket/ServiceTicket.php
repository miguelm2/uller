<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Ticket.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/TipoEquipo.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/TipoServicio.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/TecnicoTicket.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Herramienta.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Material.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/HerramientaDiagnostico.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/MaterialDiagnostico.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Diagnostico.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/EquipoTicket.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/InformeTicket.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/report/ReportInformeTicket.php';

class ServiceTicket extends System
{
    public static function newTicket($id_usuario, $tipo_servicio, $descripcion, $lista_equipos)
    {
        $id_usuario    = parent::limpiarString($id_usuario);
        $tipo_servicio  = parent::limpiarString($tipo_servicio);
        $descripcion    = parent::limpiarString($descripcion);
        $estado         = 1;
        $fecha_registro = date('Y-m-d H:i:s');

        try {
            //Agregamos primero el ticket
            $result = Ticket::newTicket($id_usuario, $tipo_servicio, $descripcion, $estado, $fecha_registro);

            if ($result) {
                $id_ticket  = Ticket::getIdLastTicket(); //Obtenemos el id de ticket agregado
                $addEquipos = self::addEquiposTicket($id_ticket, $lista_equipos, $fecha_registro); //Agregams los equipos pertenecientes al ticket

                if ($addEquipos) header('Location:ticket?ticket=' . $id_ticket);
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    private static function addEquiposTicket($id_ticket, $lista_equipos, $fecha_registro)
    {
        try {

            foreach ($lista_equipos as $value) {
                $modelResponse = EquipoTicket::newEquipoTicket($id_ticket, $value, $fecha_registro);
            }

            if ($modelResponse) return true;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function setTicket($id_ticket, $tipo_equipo, $tipo_servicio, $descripcion)
    {
        $id_ticket      = parent::limpiarString($id_ticket);
        $tipo_equipo    = parent::limpiarString($tipo_equipo);
        $tipo_servicio  = parent::limpiarString($tipo_servicio);
        $descripcion    = parent::limpiarString($descripcion);

        try {
            $result = Ticket::setTicket($id_ticket, $tipo_equipo, $tipo_servicio, $descripcion);

            if ($result) return  '<script>swal("' . Constants::$REGISTER_UPDATE . '", "", "success");</script>';
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function assignTechnician($id_ticket, $tecnico)
    {
        $id_ticket      = parent::limpiarString($id_ticket);
        $tecnico        = parent::limpiarString($tecnico);
        $fecha_registro = date('Y-m-d H:i:s');

        try {
            $result = TecnicoTicket::newTecnicoTicket($id_ticket, $tecnico, $fecha_registro);

            if ($result) {
                $estado = Ticket::setEstadoTicket($id_ticket, 2);
                return  '<script>swal("' . Constants::$TECHNICIAN_ASSIGN . '", "", "success");</script>';
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getTicket($id_ticket)
    {
        $id_ticket = parent::limpiarString($id_ticket);

        try {
            if ($_SESSION['tipo'] == 1) {
                self::validatePermisoUsuario($id_ticket);
            }

            if ($_SESSION['tipo'] == 3) {
                self::validatePermisoTecnico($id_ticket);
            }

            $modelResponse = Ticket::getTicket($id_ticket);
            return $modelResponse;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    private static function validatePermisoUsuario($id_ticket)
    {
        try {
            $id_usuario = $_SESSION['id'];
            $modelResponse = Ticket::getValidarTicket($id_ticket, $id_usuario);
            if (!$modelResponse) header('Location:tickets');
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    private static function validatePermisoTecnico($id_ticket)
    {
        try {
            $id_tecnico = $_SESSION['id'];
            $modelResponse = TecnicoTicket::getValidarTecnicoHasTicket($id_ticket, $id_tecnico);
            if (!$modelResponse) header('Location:tickets');
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function deleteTecnicoTicket($id_tecnico_ticket, $id_ticket)
    {
        $id_tecnico_ticket = parent::limpiarString($id_tecnico_ticket);
        $id_ticket         = parent::limpiarString($id_ticket);

        try {
            $result = TecnicoTicket::deleteTecnicoTicket($id_tecnico_ticket);
            if ($result) {
                Ticket::setEstadoTicket($id_ticket, 1);
                return  '<script>swal("' . Constants::$REGISTER_DELETE . '", "", "success");</script>';
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function setAcceptTicket($id_ticket, $aceptar_servicio)
    {
        $id_ticket        = parent::limpiarString($id_ticket);
        $aceptar_servicio = parent::limpiarString($aceptar_servicio);

        try {
            if ($aceptar_servicio == 'Si') {
                Ticket::setEstadoTicket($id_ticket, 5);
                $mensaje  = '<script>swal("Servicio aceptado exitosamente", "", "success");</script>';
            } else {
                Ticket::setEstadoTicket($id_ticket, 6);
                $mensaje  = '<script>swal("Servicio rechazado exitosamente", "", "success");</script>';
            }

            return $mensaje;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function deleteTicket($id_ticket)
    {
        $id_ticket = parent::limpiarString($id_ticket);

        try {
            $result = Ticket::deleteTicket($id_ticket);
            if ($result) header('Location:tickets?delete');
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getTableTickets()
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'tickets.php') {
                $tableHtml = "";
                $tipo      = $_SESSION['tipo'];

                if ($tipo == 0 || $tipo == 5) {
                    $modelResponse = Ticket::listTickets();
                } else {
                    $id_usuario    = $_SESSION['id'];
                    $modelResponse = Ticket::listTicketsByUser($id_usuario);
                }


                foreach ($modelResponse as $valor) {

                    switch ($valor->getEstado()[0]) {
                        case '1':
                            $style = 'alert alert-secondary';
                            break;
                        case '2':
                            $style = 'alert alert-warning';
                            break;
                        case '3':
                            $style = 'alert alert-primary';
                            break;
                        case '4':
                            $style = 'alert alert-danger';
                            break;
                        case '5':
                            $style = 'alert alert-info';
                            break;
                        case '6':
                            $style = 'alert alert-danger';
                            break;
                        case '7':
                            $style = 'alert alert-danger';
                            break;
                    }

                    $tableHtml .= '<tr>';
                    $tableHtml .= '<td>' . $valor->getId_ticket() . '</td>';
                    $tableHtml .= '<td>' . $valor->getUsuarioDTO()->getNombre() . '</td>';
                    $tableHtml .= '<td>' . $valor->getTipo_servicioDTO()->getNombre() . '</td>';
                    $tableHtml .= '<td><label class="p-1 col-md-12 ' . $style . '">' . $valor->getEstado()[1] . '</label></td>';
                    $tableHtml .= '<td>' . $valor->getFecha_registro() . '</td>';
                    $tableHtml .= '<td style="text-align:center;">' . Elements::crearBotonVer("ticket", $valor->getId_ticket()) . '</td>';
                    $tableHtml .= '</tr>';
                }
                return $tableHtml;
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getBtnAtrasTicket($id_ticket)
    {
        try {
            $id_ticket = parent::limpiarString($id_ticket);

            return "ticket?ticket=" . $id_ticket;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getButtonTechnician($id_ticket)
    {
        try {
            $id_ticket = parent::limpiarString($id_ticket);
            $html = '';

            if ($_SESSION['tipo'] == 0 || $_SESSION['tipo'] == 5) {

                $validar = TecnicoTicket::getValidarTecnicoTicket($id_ticket);

                if (!$validar) {
                    $html .= '
                    <div class="col-md-6 d-grid gap-2 mt-3">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AsignarTecnico"><i class="bi bi-person-add"></i> Asignar Tecnico</button>
                    </div>';
                } else {
                    $html .= '
                    <div class="col-md-12 form-group">
                        <label for="tecnico">Técnico</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" aria-describedby="button-tecnico" value="' . $validar->getTecnicoDTO()->getNombre() . '" disabled>
                            <button class="btn btn-danger" type="button" id="button-tecnico" value="' . $validar->getId_tecnico_ticket() . '"><i class="bi bi-trash-fill"></i></button>
                        </div>
                    </div>';
                }
            }

            return $html;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getButtonDiagnosis($id_ticket)
    {
        try {
            $id_ticket = parent::limpiarString($id_ticket);
            $html = '';

            if (basename($_SERVER['PHP_SELF']) == 'ticket.php' && $_SESSION['tipo'] == 3) {

                $validar = TecnicoTicket::getValidarTecnicoTicket($id_ticket);

                if (!$validar) {
                    $html .= '';
                } else {
                    $html .= '';
                }
            }

            return $html;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getButtonDiagnosisTechnician($id_ticket)
    {
        try {
            $id_ticket = parent::limpiarString($id_ticket);

            $validateDiagnostico = Diagnostico::getCountDiagnosticoByTicket($id_ticket);

            if ($validateDiagnostico > 0) {
                $id_diagnostico = Diagnostico::getIdDiagnosticoByTicket($id_ticket);
                $html = '<a href="diagnosis?diagnosis=' . $id_diagnostico . '&ticket=' . $id_ticket . '" class="btn btn-primary"><i class="bi bi-info-circle"></i> Ver Diagnostico</a>';
            } else {
                $html = '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newDiagnostico"><i class="bi bi-journal-plus"></i> Crear Diagnostico</button>';
            }

            return $html;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getButtonDiagnosisAdmin($id_ticket)
    {
        try {
            $id_ticket    = parent::limpiarString($id_ticket);
            $tipo_usuario = $_SESSION['tipo'];
            $html = '';

            if ($tipo_usuario == 0 || $tipo_usuario == 5) {
                $validateDiagnostico = Diagnostico::getCountDiagnosticoByTicket($id_ticket);

                if ($validateDiagnostico > 0) {
                    $id_diagnostico = Diagnostico::getIdDiagnosticoByTicket($id_ticket);
                    $html = '<a href="../admin/diagnosis?diagnosis=' . $id_diagnostico . '&ticket=' . $id_ticket . '" class="btn btn-primary"><i class="bi bi-info-circle"></i> Ver Diagnostico</a>';
                }
            }

            return $html;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getButtonReportTechnician($id_ticket)
    {
        try {
            $id_ticket = parent::limpiarString($id_ticket);
            $html = '';

            $estadoTicket = Ticket::getEstadoTicket($id_ticket);

            if ($estadoTicket >= 5 && $estadoTicket != 6) {
                $informeDTO = InformeTicket::getInformeTicketByTicket($id_ticket);

                if ($informeDTO) {
                    $html = '<a href="reportTicket?reportTicket=' . $informeDTO->getId_informe() . '&ticket=' . $id_ticket . '" class="btn btn-success"><i class="bi bi-info-circle"></i> Ver informe de servicio</a>';
                } else {
                    $html = '<a href="newReport?ticket=' . $id_ticket . '" class="btn btn-success"><i class="bi bi-info-circle"></i> Crear informe de servicio</a>';
                }
            }

            return $html;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function newReportTicket($id_ticket, $fecha_servicio, $fecha_ultimo_servicio, $ubicacion_equipo, $tipo_uso, $tipo_equipo, $presenta_falla, $capacidad, $marca, $notas, $observaciones)
    {
        $id_ticket          = parent::limpiarString($id_ticket);
        $fecha_servicio     = parent::limpiarString($fecha_servicio);
        $fecha_ultimo_servicio    = parent::limpiarString($fecha_ultimo_servicio);
        $ubicacion_equipo         = parent::limpiarString($ubicacion_equipo);
        $tipo_uso       = parent::limpiarString($tipo_uso);
        $tipo_equipo    = parent::limpiarString($tipo_equipo);
        $presenta_falla = parent::limpiarString($presenta_falla);
        $capacidad      = parent::limpiarString($capacidad);
        $marca          = parent::limpiarString($marca);
        $notas          = parent::limpiarString($notas);
        $observaciones  = parent::limpiarString($observaciones);
        $fecha_registro = date('Y-m-d H:i:s');

        try {
            $modelResponse = InformeTicket::newInformeTicket($id_ticket, $fecha_servicio, $fecha_ultimo_servicio, $ubicacion_equipo, $tipo_uso, $tipo_equipo, $presenta_falla, $capacidad, $marca, $notas, $observaciones, $fecha_registro);

            if ($modelResponse) {
                $id_informe = InformeTicket::getIdLastInformeTicket();
                Ticket::setEstadoTicket($id_ticket, 7);
                header('Location:reportTicket?reportTicket=' . $id_informe . '&ticket=' . $id_ticket);
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function setReportTicket($id_informe, $fecha_servicio, $fecha_ultimo_servicio, $ubicacion_equipo, $tipo_uso, $tipo_equipo, $presenta_falla, $capacidad, $marca, $notas, $observaciones)
    {
        $id_informe         = parent::limpiarString($id_informe);
        $fecha_servicio     = parent::limpiarString($fecha_servicio);
        $fecha_ultimo_servicio    = parent::limpiarString($fecha_ultimo_servicio);
        $ubicacion_equipo         = parent::limpiarString($ubicacion_equipo);
        $tipo_uso       = parent::limpiarString($tipo_uso);
        $tipo_equipo    = parent::limpiarString($tipo_equipo);
        $presenta_falla = parent::limpiarString($presenta_falla);
        $capacidad      = parent::limpiarString($capacidad);
        $marca          = parent::limpiarString($marca);
        $notas          = parent::limpiarString($notas);
        $observaciones  = parent::limpiarString($observaciones);

        try {
            $modelResponse = InformeTicket::setInformeTicket($id_informe, $fecha_servicio, $fecha_ultimo_servicio, $ubicacion_equipo, $tipo_uso, $tipo_equipo, $presenta_falla, $capacidad, $marca, $notas, $observaciones);

            if ($modelResponse) return '<script>swal("' . Constants::$REGISTER_UPDATE . '", "", "success");</script>';
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getTableTicketsTechnician()
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'tickets.php' && $_SESSION['tipo'] == 3) {
                $tableHtml  = "";
                $id_tecnico = $_SESSION['id'];

                $modelResponse = Ticket::listTicketsByTecnico($id_tecnico);

                foreach ($modelResponse as $valor) {

                    switch ($valor->getEstado()[0]) {
                        case '1':
                            $style = 'alert alert-secondary';
                            break;
                        case '2':
                            $style = 'alert alert-warning';
                            break;
                        case '3':
                            $style = 'alert alert-primary';
                            break;
                        case '4':
                            $style = 'alert alert-danger';
                            break;
                        case '5':
                            $style = 'alert alert-info';
                            break;
                        case '6':
                            $style = 'alert alert-danger';
                            break;
                        case '7':
                            $style = 'alert alert-danger';
                            break;
                    }

                    $tableHtml .= '<tr>';
                    $tableHtml .= '<td>' . $valor->getId_ticket() . '</td>';
                    $tableHtml .= '<td>' . $valor->getUsuarioDTO()->getNombre() . '</td>';
                    $tableHtml .= '<td>' . $valor->getTipo_servicioDTO()->getNombre() . '</td>';
                    $tableHtml .= '<td><label class="p-1 col-md-12 ' . $style . '">'. $valor->getEstado()[1] . '</label></td>';
                    $tableHtml .= '<td>' . $valor->getFecha_registro() . '</td>';
                    $tableHtml .= '<td style="text-align:center;">' . Elements::crearBotonVer("ticket", $valor->getId_ticket()) . '</td>';
                    $tableHtml .= '</tr>';
                }
                return $tableHtml;
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getDiagnosisUser($id_ticket)
    {
        $id_ticket = parent::limpiarString($id_ticket);
        $html      = '';

        try {
            if ($_SESSION['tipo'] == 1) {
                $validarDiagnostico = Diagnostico::getCountDiagnosticoCotizadoByTicket($id_ticket);

                if ($validarDiagnostico > 0) {
                    $ticketDTO        = Ticket::getTicket($id_ticket);
                    $diagnosticoDTO   = Diagnostico::getDiagnosticoByTicket($id_ticket);
                    $listHerramientas = $diagnosticoDTO->getLstHerramientas();
                    $listMateriales   = $diagnosticoDTO->getLstMateriales();

                    $html .= '
                                <div class="col-md-12">
                                    <br><br>
                                </div>
                                <div class="col-md-12">
                                    <h4 class="text-primary">Diagnostico</h4>
                                </div>
                                <div class="col-md-12">
                                    <label><strong>Número de horas:</strong> ' . $diagnosticoDTO->getNumero_horas() . '</label>
                                    <br>
                                    <label><strong>Número de ayudantes:</strong> ' . $diagnosticoDTO->getNumero_ayudantes() . '</label>
                                </div>
                                <div class="col-md-12">
                                    <br>
                                </div>
                                <div class="col-md-12">
                                    <label><strong>Descripción:</strong></label>
                                    <br>
                                    <p>' . $diagnosticoDTO->getDescripcion() . '</p>
                                </div>';

                    if (count($listHerramientas) > 0) {
                        $html .= '
                                <div class="col-md-12">
                                    <br>
                                </div>
                                <div class="col-md-12">
                                    <label><strong>Herramientas o equipos necesarios:</strong></label>
                                </div>
                                <div class="col-md-12" style="margin-top:5px;">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Tipo</th>
                                                <th>Cantidad</th>
                                            </tr>
                                        </thead>
                                        <tbody';
                        foreach ($listHerramientas as $value) {
                            $html .= '
                                    <tr>
                                        <td>' . $value->getHerramientaDTO()->getNombre() . '</td>
                                        <td>' . $value->getHerramientaDTO()->getTipo()[1] . '</td>
                                        <td>' . $value->getCantidad() . '</td>
                                    </tr>
                            ';
                        }
                        $html .= '
                                        </tbody>
                                    </table>
                                </div>';
                    }

                    if (count($listMateriales) > 0) {
                        $html .= '
                                <div class="col-md-12">
                                    <br><br>
                                </div>
                                <div class="col-md-12">
                                    <label><strong>Materiales necesarios:</strong></label>
                                </div>
                                <div class="col-md-12" style="margin-top:5px;">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Cantidad</th>
                                                <th>Unidad de medida</th>
                                            </tr>
                                        </thead>
                                        <tbody';
                        foreach ($listMateriales as $value) {
                            $html .= '
                                    <tr>
                                        <td>' . $value->getMaterialDTO()->getNombre() . '</td>
                                        <td>' . $value->getCantidad() . '</td>
                                        <td>' . $value->getUnidad_medida() . '</td>
                                    </tr>
                            ';
                        }
                        $html .= '
                                        </tbody>
                                    </table>
                                </div>';
                    }

                    $html .= '
                                <div class="col-md-12">
                                    <br><hr>
                                </div>
                                <div class="col-md-12">
                                    <center><label><h4>Precio final: $' . $diagnosticoDTO->getPrecio() . '</h4></label></center>
                                </div>
                                <div class="col-md-12">
                                    <hr>
                                </div>';

                    if ($ticketDTO->getEstado()[0] == 4) {
                        $html .= '
                                <div class="col-md-6 d-grid gap-2 mt-3">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAceptarServicio"><i class="bi bi-check-lg"></i> Aceptar Servicio</button>
                                </div>
                                <div class="col-md-6 d-grid gap-2 mt-3">
                                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalRechazarServicio"><i class="bi bi-x-lg"></i> Rechazar Servicio</button>
                                </div>';
                    }

                    if ($ticketDTO->getEstado()[0] == 7) {
                        $informeDTO = InformeTicket::getInformeTicketByTicket($id_ticket);
                        $html .= '
                                <div class="col-md-12 d-grid gap-2 mt-3">
                                    <a href="ticket?ticket=' . $id_ticket . '&getPdfReportTicket=' . $informeDTO->getId_informe() . '" class="btn btn-primary"><i class="bi bi-filetype-pdf"></i> Ver informe de servicio</a>
                                </div>';
                    }
                }
            }

            return $html;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getListEquiposTicket()
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'tickets.php' && $_SESSION['tipo'] == 1) {

                $id_usuario = $_SESSION['id'];
                $html = '';

                $listTipoEquipo = TipoEquipo::listTipoEquipoByUser($id_usuario);

                foreach ($listTipoEquipo as $value) {
                    $html .= '
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="' . $value->getId_tipo() . '" id="' . $value->getId_tipo() . '" name="equipoTicket[]" onchange="validateCheckEquipos()">
                                <label class="form-check-label" for="' . $value->getId_tipo() . '">
                                    ' . $value->getNombre() . '
                                </label>
                            </div>';
                }

                return $html;
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getTableEquiposTicket($id_ticket)
    {
        try {
            $id_ticket  = parent::limpiarString($id_ticket);
            $tableHtml  = '';

            $modelResponse = EquipoTicket::listEquipoTicketByIdTicket($id_ticket);

            foreach ($modelResponse as $valor) {

                $tableHtml .= '<tr>';
                $tableHtml .= '<td>' . $valor->getEquipoDTO()->getNombre() . '</td>';
                $tableHtml .= '<td>' . $valor->getEquipoDTO()->getDescripcion() . '</td>';
                if ($_SESSION['tipo'] != 3) {
                    $tableHtml .= '<td style="text-align:center;">' . Elements::crearBotonEliminarJs($valor->getId_equipo_ticket()) . '</td>';
                }
                $tableHtml .= '</tr>';
            }
            return $tableHtml;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function deleteEquipmentTicket($id_equipo_ticket)
    {
        $id_equipo_ticket = parent::limpiarString($id_equipo_ticket);

        try {
            $result = EquipoTicket::deleteEquipoTicket($id_equipo_ticket);

            if ($result) return '<script>swal("' . Constants::$REGISTER_DELETE . '", "", "success");</script>';
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getListEquiposTicketAdmin($id_usuario)
    {
        try {
            $listTipoEquipo = TipoEquipo::listTipoEquipoByUserJs($id_usuario);
            return json_encode($listTipoEquipo);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getReportTicket($id_informe)
    {
        $id_informe = parent::limpiarString($id_informe);

        try {
            $modelResponse = InformeTicket::getInformeTicketById($id_informe);
            return $modelResponse;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getPdfReportTicket($id_informe)
    {
        $id_informe = parent::limpiarString($id_informe);

        try {
            $informeDTO       = InformeTicket::getInformeTicketById($id_informe);
            $ticketDTO        = Ticket::getTicket($informeDTO->getId_ticket());
            $tecnicoTicketDTO = TecnicoTicket::getValidarTecnicoTicket($informeDTO->getId_ticket());

            $modelResponse = ReportInformeTicket::generatePdf($informeDTO, $ticketDTO, $tecnicoTicketDTO);
            return $modelResponse;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
