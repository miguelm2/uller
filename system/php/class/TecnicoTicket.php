<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/TecnicoTicketDTO.php';

class TecnicoTicket extends System
{
    public static function newTecnicoTicket($id_ticket, $id_tecnico, $fecha_registro)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO TecnicoTicket (id_ticket, id_tecnico, fecha_registro) 
                                VALUES (:id_ticket, :id_tecnico, :fecha_registro)");
        $stmt->bindParam(':id_ticket', $id_ticket);
        $stmt->bindParam(':id_tecnico', $id_tecnico);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        return  $stmt->execute();
    }

    public static function getValidarTecnicoTicket($id_ticket)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM TecnicoTicket WHERE id_ticket = :id_ticket");
        $stmt->bindParam(':id_ticket', $id_ticket);
        $stmt->execute();
        $result =  $stmt->fetch();

        if ($result) {
            $ticketDTO = new TecnicoTicketDTO();

            $ticketDTO->setId_tecnico_ticket($result['id_tecnico_ticket']);
            $ticketDTO->setId_ticket($result['id_ticket']);
            $ticketDTO->setTecnicoDTO(Tecnico::getTecnicoById($result['id_tecnico']));
            $ticketDTO->setFecha_registro($result['fecha_registro']);

            return $ticketDTO;

        }else{
            return false;
        }
    }

    public static function deleteTecnicoTicket($id_tecnico_ticket)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("DELETE FROM TecnicoTicket WHERE id_tecnico_ticket = :id_tecnico_ticket");
        $stmt->bindParam(':id_tecnico_ticket', $id_tecnico_ticket);
        return  $stmt->execute();
    }
}
?>