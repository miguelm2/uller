<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/TicketDTO.php';

class Ticket extends System
{
    public static function newTicket($id_user, $tipo_equipo, $tipo_servicio, $descripcion, $tipo_usuario, $estado, $fecha_registro)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO Ticket (id_user, id_tipo_equipo, id_tipo_servicio, descripcion, tipo_usuario, estado, fecha_registro) 
                                VALUES (:id_user, :id_tipo_equipo, :id_tipo_servicio, :descripcion, :tipo_usuario, :estado, :fecha_registro)");
        $stmt->bindParam(':id_user', $id_user);
        $stmt->bindParam(':id_tipo_equipo', $tipo_equipo);
        $stmt->bindParam(':id_tipo_servicio', $tipo_servicio);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':tipo_usuario', $tipo_usuario);
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        return  $stmt->execute();
    }

    public static function setTicket($id_ticket, $tipo_equipo, $tipo_servicio, $descripcion)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE Ticket SET id_tipo_equipo = :id_tipo_equipo, id_tipo_servicio = :id_tipo_servicio, descripcion = :descripcion WHERE id_ticket = :id_ticket ");
        $stmt->bindParam(':id_ticket', $id_ticket);
        $stmt->bindParam(':id_tipo_equipo', $tipo_equipo);
        $stmt->bindParam(':id_tipo_servicio', $tipo_servicio);
        $stmt->bindParam(':descripcion', $descripcion);
        return  $stmt->execute();
    }

    public static function setEstadoTicket($id_ticket, $estado)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE Ticket SET estado = :estado WHERE id_ticket = :id_ticket ");
        $stmt->bindParam(':id_ticket', $id_ticket);
        $stmt->bindParam(':estado', $estado);
        return  $stmt->execute();
    }

    public static function getTicket($id_ticket)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Ticket WHERE id_ticket = :id_ticket");
        $stmt->bindParam(':id_ticket', $id_ticket);
        $stmt->execute();
        $result =  $stmt->fetch();

        if ($result) {
            $ticketDTO = new TicketDTO();

            $ticketDTO->setId_ticket($result['id_ticket']);
            $ticketDTO->setTipo_equipoDTO(TipoEquipo::getTipoEquipoById($result['id_tipo_equipo']));
            $ticketDTO->setTipo_servicioDTO(TipoServicio::getTipoServicioById($result['id_tipo_servicio']));
            $ticketDTO->setDescripcion($result['descripcion']);
            $ticketDTO->setTipo_usuario($result['tipo_usuario']);
            $ticketDTO->setEstado($result['estado']);
            $ticketDTO->setFecha_registro($result['fecha_registro']);

            if ($result['tipo_usuario'] == 0 || $result['tipo_usuario'] == 5) {
                $ticketDTO->setUsuarioDTO(Administrador::getAdministradorById($result['id_user']));
            } else {
                $ticketDTO->setUsuarioDTO(Usuario::getUserById($result['id_user']));
            }

            return $ticketDTO;
        }
        return null;
    }

    public static function listTickets()
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Ticket");
        $stmt->execute();

        $lstTicket = array();
        $intCount = 0;

        $modelResponse = $stmt->fetchAll();

        foreach ($modelResponse as $result) {
            $ticketDTO = new TicketDTO();

            $ticketDTO->setId_ticket($result['id_ticket']);
            $ticketDTO->setTipo_equipoDTO(TipoEquipo::getTipoEquipoById($result['id_tipo_equipo']));
            $ticketDTO->setTipo_servicioDTO(TipoServicio::getTipoServicioById($result['id_tipo_servicio']));
            $ticketDTO->setDescripcion($result['descripcion']);
            $ticketDTO->setTipo_usuario($result['tipo_usuario']);
            $ticketDTO->setEstado($result['estado']);
            $ticketDTO->setFecha_registro($result['fecha_registro']);

            if ($result['tipo_usuario'] == 0 || $result['tipo_usuario'] == 5) {
                $ticketDTO->setUsuarioDTO(Administrador::getAdministradorById($result['id_user']));
            } else {
                $ticketDTO->setUsuarioDTO(Usuario::getUserById($result['id_user']));
            }

            $lstTicket[$intCount] = $ticketDTO;
            $intCount++;
        }
        return $lstTicket;
    }

    public static function listTicketsByUser($id_usuario, $tipo)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Ticket WHERE id_user = :id_user AND tipo_usuario = :tipo_usuario");
        $stmt->bindParam(':id_user', $id_usuario);
        $stmt->bindParam(':tipo_usuario', $tipo);
        $stmt->execute();

        $lstTicket = array();
        $intCount = 0;

        $modelResponse = $stmt->fetchAll();

        foreach ($modelResponse as $result) {
            $ticketDTO = new TicketDTO();

            $ticketDTO->setId_ticket($result['id_ticket']);
            $ticketDTO->setTipo_equipoDTO(TipoEquipo::getTipoEquipoById($result['id_tipo_equipo']));
            $ticketDTO->setTipo_servicioDTO(TipoServicio::getTipoServicioById($result['id_tipo_servicio']));
            $ticketDTO->setDescripcion($result['descripcion']);
            $ticketDTO->setTipo_usuario($result['tipo_usuario']);
            $ticketDTO->setEstado($result['estado']);
            $ticketDTO->setFecha_registro($result['fecha_registro']);

            if ($result['tipo_usuario'] == 0 || $result['tipo_usuario'] == 5) {
                $ticketDTO->setUsuarioDTO(Administrador::getAdministradorById($result['id_user']));
            } else {
                $ticketDTO->setUsuarioDTO(Usuario::getUserById($result['id_user']));
            }

            $lstTicket[$intCount] = $ticketDTO;
            $intCount++;
        }
        return $lstTicket;
    }

    public static function listTicketsByTecnico($id_tecnico)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("SELECT t.* FROM Ticket AS t, TecnicoTicket AS his WHERE t.id_ticket = his.id_ticket AND his.id_tecnico = :id_tecnico");
        $stmt->bindParam(':id_tecnico', $id_tecnico);
        $stmt->execute();

        $lstTicket = array();
        $intCount = 0;

        $modelResponse = $stmt->fetchAll();

        foreach ($modelResponse as $result) {
            $ticketDTO = new TicketDTO();

            $ticketDTO->setId_ticket($result['id_ticket']);
            $ticketDTO->setTipo_equipoDTO(TipoEquipo::getTipoEquipoById($result['id_tipo_equipo']));
            $ticketDTO->setTipo_servicioDTO(TipoServicio::getTipoServicioById($result['id_tipo_servicio']));
            $ticketDTO->setDescripcion($result['descripcion']);
            $ticketDTO->setTipo_usuario($result['tipo_usuario']);
            $ticketDTO->setEstado($result['estado']);
            $ticketDTO->setFecha_registro($result['fecha_registro']);

            if ($result['tipo_usuario'] == 0 || $result['tipo_usuario'] == 5) {
                $ticketDTO->setUsuarioDTO(Administrador::getAdministradorById($result['id_user']));
            } else {
                $ticketDTO->setUsuarioDTO(Usuario::getUserById($result['id_user']));
            }

            $lstTicket[$intCount] = $ticketDTO;
            $intCount++;
        }
        return $lstTicket;
    }

    public static function deleteTicket($id_ticket)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("DELETE FROM Ticket WHERE id_ticket = :id_ticket");
        $stmt->bindParam(':id_ticket', $id_ticket);
        return  $stmt->execute();
    }

    public static function getValidarTicket($id_ticket, $id_usuario, $tipo)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Ticket WHERE id_ticket = :id_ticket AND id_user = :id_user AND tipo_usuario = :tipo_usuario");
        $stmt->bindParam(':id_ticket', $id_ticket);
        $stmt->bindParam(':id_user', $id_usuario);
        $stmt->bindParam(':tipo_usuario', $tipo);
        $stmt->execute();
        $result =  $stmt->fetch();

        if ($result) {
            return true;
        }else{
            return false;
        }
        
    }
}
