<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Ticket.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/TipoEquipo.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/TipoServicio.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/TecnicoTicket.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Diagnostico.php';

class ServiceTicket extends System
{
    public static function newTicket($tipo_equipo, $tipo_servicio, $descripcion)
    {
        $id_user        = $_SESSION['id'];
        $tipo_equipo    = parent::limpiarString($tipo_equipo);
        $tipo_servicio  = parent::limpiarString($tipo_servicio);
        $descripcion    = parent::limpiarString($descripcion);
        $tipo_usuario   = $_SESSION['tipo'];
        $estado         = 1;
        $fecha_registro = date('Y-m-d H:i:s');

        try {
            $result = Ticket::newTicket($id_user, $tipo_equipo, $tipo_servicio, $descripcion, $tipo_usuario, $estado, $fecha_registro);

            if ($result) return  '<script>swal("' . Constants::$REGISTER_NEW . '", "", "success");</script>';
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function setTicket($id_ticket, $tipo_equipo, $tipo_servicio, $descripcion, $estado)
    {
        $id_ticket      = parent::limpiarString($id_ticket);
        $tipo_equipo    = parent::limpiarString($tipo_equipo);
        $tipo_servicio  = parent::limpiarString($tipo_servicio);
        $descripcion    = parent::limpiarString($descripcion);
        $estado         = parent::limpiarString($estado);

        try {
            $result = Ticket::setTicket($id_ticket, $tipo_equipo, $tipo_servicio, $descripcion, $estado);

            if ($result) return  '<script>swal("' . Constants::$REGISTER_UPDATE . '", "", "success");</script>';
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function setEstadoTicket($id_ticket, $estado)
    {
        $id_ticket      = parent::limpiarString($id_ticket);
        $estado         = parent::limpiarString($estado);

        try {
            $result = Ticket::setEstadoTicket($id_ticket, $estado);

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

            if ($result) return  '<script>swal("' . Constants::$TECHNICIAN_ASSIGN . '", "", "success");</script>';
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

    public static function deleteTecnicoTicket($id_tecnico_ticket)
    {
        $id_tecnico_ticket = parent::limpiarString($id_tecnico_ticket);

        try {
            $result = TecnicoTicket::deleteTecnicoTicket($id_tecnico_ticket);
            if ($result) return  '<script>swal("' . Constants::$REGISTER_DELETE . '", "", "success");</script>';
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
                    $modelResponse = Ticket::listTicketsByUser($id_usuario, $tipo);
                }


                foreach ($modelResponse as $valor) {
                    $tableHtml .= '<tr>';
                    $tableHtml .= '<td>' . $valor->getId_ticket() . '</td>';
                    $tableHtml .= '<td>' . $valor->getUsuarioDTO()->getNombre() . '</td>';
                    $tableHtml .= '<td>' . $valor->getTipo_equipoDTO()->getNombre() . '</td>';
                    $tableHtml .= '<td>' . $valor->getTipo_servicioDTO()->getNombre() . '</td>';
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
                }else{
                    $html .= '
                    <div class="col-md-12 form-group">
                        <label for="tecnico">Técnico</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" aria-describedby="button-tecnico" value="'.$validar->getTecnicoDTO()->getNombre().'" disabled>
                            <button class="btn btn-danger" type="button" id="button-tecnico" value="'.$validar->getId_tecnico_ticket().'"><i class="bi bi-trash-fill"></i></button>
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

            if (basename($_SERVER['PHP_SELF']) == 'ticket.php' && $_SESSION['tipo']==3) {

                $validar = TecnicoTicket::getValidarTecnicoTicket($id_ticket);

                if (!$validar) {
                    $html .= '';
                }else{
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

            if($validateDiagnostico > 0){
                $id_diagnostico = Diagnostico::getIdDiagnosticoByTicket($id_ticket);
                $html = '<a href="diagnosis?diagnosis='.$id_diagnostico.'&ticket='.$id_ticket.'" class="btn btn-primary"><i class="bi bi-info-circle"></i> Ver Diagnostico</a>';
            } else{
                $html = '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newDiagnostico"><i class="bi bi-journal-plus"></i> Crear Diagnostico</button>';
            }

            return $html;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getButtonDiagnosisUsers($id_ticket)
    {
        try {
            $id_ticket    = parent::limpiarString($id_ticket);
            $tipo_usuario = $_SESSION['tipo'];
            $html = '';

            $validateDiagnostico = Diagnostico::getCountDiagnosticoByTicket($id_ticket);

            if($validateDiagnostico > 0){

                if($tipo_usuario==0 || $tipo_usuario==5){
                    $usuario = 'admin';
                }else{
                    $usuario = 'user';
                }

                $id_diagnostico = Diagnostico::getIdDiagnosticoByTicket($id_ticket);
                $html = '<a href="../'.$usuario.'/diagnosis?diagnosis='.$id_diagnostico.'&ticket='.$id_ticket.'" class="btn btn-primary"><i class="bi bi-info-circle"></i> Ver Diagnostico</a>';
            }

            return $html;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getTableTicketsTechnician()
    {
        try {
            if (basename($_SERVER['PHP_SELF']) == 'tickets.php' && $_SESSION['tipo']==3) {
                $tableHtml  = "";
                $id_tecnico = $_SESSION['id'];

                $modelResponse = Ticket::listTicketsByTecnico($id_tecnico);

                foreach ($modelResponse as $valor) {
                    $tableHtml .= '<tr>';
                    $tableHtml .= '<td>' . $valor->getId_ticket() . '</td>';
                    $tableHtml .= '<td>' . $valor->getUsuarioDTO()->getNombre() . '</td>';
                    $tableHtml .= '<td>' . $valor->getTipo_equipoDTO()->getNombre() . '</td>';
                    $tableHtml .= '<td>' . $valor->getTipo_servicioDTO()->getNombre() . '</td>';
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
}
