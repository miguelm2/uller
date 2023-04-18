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

class ServiceTicket extends System
{
    public static function newTicket($id_usuario, $tipo_servicio, $descripcion)
    {
        $id_usuario    = parent::limpiarString($id_usuario);
        $tipo_servicio  = parent::limpiarString($tipo_servicio);
        $descripcion    = parent::limpiarString($descripcion);
        $estado         = 1;
        $fecha_registro = date('Y-m-d H:i:s');

        try {
            $result = Ticket::newTicket($id_usuario, $tipo_servicio, $descripcion, $estado, $fecha_registro);

            if ($result) return  '<script>swal("' . Constants::$REGISTER_NEW . '", "", "success");</script>';
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
            $tipo       = $_SESSION['tipo'];

            $modelResponse = Ticket::getValidarTicket($id_ticket, $id_usuario, $tipo);
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

    public static function getDiagnosisUser($id_ticket)
    {
        $id_ticket = parent::limpiarString($id_ticket);
        $html      = '';

        try {
            if ($_SESSION['tipo'] == 1) {
                $validarDiagnostico = Diagnostico::getCountDiagnosticoCotizadoByTicket($id_ticket);

                if ($validarDiagnostico > 0) {
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
                                    <label><h4>Precio final: $' . $diagnosticoDTO->getPrecio() . '</h4></label>
                                </div>
                    ';
                }
            }

            return $html;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getUsersTickets()
    {
        try {

            if (basename($_SERVER['PHP_SELF']) == 'tickets.php') {
                $html = '';

                if ($_SESSION['tipo'] == 0 || $_SESSION['tipo'] == 5) {
                    $listUsuarios = Usuario::listUser();
                    $html = '
                                <div class="col-md-12 form-group">
                                    <label for="tipo_equipo">Usuario</label>
                                    <select class="form-select" name="id_usuario" id="id_usuario">';

                    foreach ($listUsuarios as $value) {
                        $html .= '<option value="' . $value->getId_usuario() . '">' . $value->getNombre() . '</option>';
                    }

                    $html .= '
                                </select>
                                </div>';
                }else{
                    $id_usuario = $_SESSION['id'];
                    $html = '<input type="hidden" class="form-control" name="id_usuario" value="'.$id_usuario.'">';
                }
                return $html;
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }


    public static function getListEquiposTicket($id_ticket)
    {
        try {
            $id_ticket      = parent::limpiarString($id_ticket);
            $ticketDTO      = Ticket::getTicket($id_ticket);
            $listTipoEquipo = TipoEquipo::listTipoEquipoByUser($ticketDTO->getUsuarioDTO()->getId_usuario());
            $html = '';

            foreach ($listTipoEquipo as $value) {
                $html .= '
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="' . $id_ticket . '-' . $value->getId_tipo() . '" id="' . $value->getId_tipo() . '" name="equipoTicket[]">
                                <label class="form-check-label" for="' . $value->getId_tipo() . '">
                                    ' . $value->getNombre() . '
                                </label>
                            </div>';
            }

            return $html;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function addEquiposTicket($lista_equipos)
    {
        try {
            $fecha_registro = date('Y-m-d H:i:s');

            foreach ($lista_equipos as $value) {
                $result = explode("-", $value);
                $modelResponse = EquipoTicket::newEquipoTicket($result[0], $result[1], $fecha_registro);
            }

            if ($modelResponse) return '<script>swal("' . Constants::$REGISTER_ADD . '", "", "success");</script>';
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
                $tableHtml .= '<td style="text-align:center;">' . Elements::crearBotonEliminarJs($valor->getId_equipo_ticket()) . '</td>';
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
            
            if($result) return '<script>swal("' . Constants::$REGISTER_DELETE . '", "", "success");</script>';
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
