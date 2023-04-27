<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/EquipoTicketDTO.php';

class EquipoTicket extends System
{
    public static function newEquipoTicket($id_ticket, $id_equipo, $fecha_registro)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO EquipoTicket (id_ticket, id_equipo, fecha_registro) 
                                VALUES (:id_ticket, :id_equipo, :fecha_registro)");
        $stmt->bindParam(':id_ticket', $id_ticket);
        $stmt->bindParam(':id_equipo', $id_equipo);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        return  $stmt->execute();
    }

    public static function listEquipoTicketByIdTicket($id_ticket)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM EquipoTicket WHERE id_ticket = :id_ticket");
        $stmt->bindParam(':id_ticket', $id_ticket);
        $stmt->execute();

        $listResponse = array();
        $intCount = 0;

        $modelResponse = $stmt->fetchAll();

        foreach ($modelResponse as $result) {
            $equipoDTO = new EquipoTicketDTO();

            $equipoDTO->setId_equipo_ticket($result['id_equipo_ticket']);
            $equipoDTO->setId_ticket($result['id_ticket']);
            $equipoDTO->setEquipoDTO(TipoEquipo::getTipoEquipoById($result['id_equipo']));
            $equipoDTO->setFecha_registro($result['fecha_registro']);


            $listResponse[$intCount] = $equipoDTO;
            $intCount++;
        }
        return $listResponse;
    }

    public static function deleteEquipoTicket($id_equipo_ticket)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("DELETE FROM EquipoTicket WHERE id_equipo_ticket = :id_equipo_ticket");
        $stmt->bindParam(':id_equipo_ticket', $id_equipo_ticket);
        return  $stmt->execute();
    }

    public static function deleteEquipoTicketByTicket($id_ticket)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("DELETE FROM EquipoTicket WHERE id_ticket = :id_ticket");
        $stmt->bindParam(':id_ticket', $id_ticket);
        return  $stmt->execute();
    }

    public static function getValidateEquipoTicketByEquipo($id_equipo)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT id_equipo_ticket FROM EquipoTicket WHERE id_equipo = :id_equipo");
        $stmt->bindParam(':id_equipo', $id_equipo);
        $stmt->execute();

        return $stmt->fetch();
    }
}
?>