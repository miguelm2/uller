<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/InformeTicketDTO.php';

class InformeTicket extends System
{
    public static function newInformeTicket($id_ticket, $id_tipo, $fecha_servicio, $fecha_ultimo_servicio, $ubicacion_equipo, $tipo_uso, $presenta_falla, $notas, $observaciones, $fecha_registro)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO InformeTicket (id_ticket, id_tipo, fecha_servicio, fecha_ultimo_servicio, ubicacion_equipo, tipo_uso, presenta_falla, notas, observaciones, fecha_registro) 
                                VALUES (:id_ticket, :id_tipo, :fecha_servicio, :fecha_ultimo_servicio, :ubicacion_equipo, :tipo_uso, :presenta_falla, :notas, :observaciones, :fecha_registro)");
        $stmt->bindParam(':id_ticket', $id_ticket);
        $stmt->bindParam(':id_tipo', $id_tipo);
        $stmt->bindParam(':fecha_servicio', $fecha_servicio);
        $stmt->bindParam(':fecha_ultimo_servicio', $fecha_ultimo_servicio);
        $stmt->bindParam(':ubicacion_equipo', $ubicacion_equipo);
        $stmt->bindParam(':tipo_uso', $tipo_uso);
        $stmt->bindParam(':presenta_falla', $presenta_falla);
        $stmt->bindParam(':notas', $notas);
        $stmt->bindParam(':observaciones', $observaciones);
        $stmt->bindParam(':fecha_registro', $fecha_registro);

        return  $stmt->execute();
    }

    public static function setInformeTicket($id_ticket, $id_tipo, $fecha_servicio, $fecha_ultimo_servicio, $ubicacion_equipo, $tipo_uso, $presenta_falla, $notas, $observaciones)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE InformeTicket SET 
                                                    fecha_servicio = :fecha_servicio, 
                                                    fecha_ultimo_servicio = :fecha_ultimo_servicio, 
                                                    ubicacion_equipo = :ubicacion_equipo, 
                                                    tipo_uso = :tipo_uso, 
                                                    presenta_falla = :presenta_falla, 
                                                    notas = :notas, 
                                                    observaciones = :observaciones 
                                                    WHERE id_ticket = :id_ticket
                                                    AND id_tipo = :id_tipo");
        $stmt->bindParam(':id_ticket', $id_ticket);
        $stmt->bindParam(':id_tipo', $id_tipo);
        $stmt->bindParam(':fecha_servicio', $fecha_servicio);
        $stmt->bindParam(':fecha_ultimo_servicio', $fecha_ultimo_servicio);
        $stmt->bindParam(':ubicacion_equipo', $ubicacion_equipo);
        $stmt->bindParam(':tipo_uso', $tipo_uso);
        $stmt->bindParam(':presenta_falla', $presenta_falla);
        $stmt->bindParam(':notas', $notas);
        $stmt->bindParam(':observaciones', $observaciones);
        return  $stmt->execute();
    }

    public static function getInformeTicketById($id_informe)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM InformeTicket WHERE id_informe = :id_informe");
        $stmt->bindParam(':id_informe', $id_informe);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'InformeTicketDTO');
        $stmt->execute();

        return $stmt->fetch();
    }

    public static function getInformeTicketByTicket($id_ticket)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM InformeTicket WHERE id_ticket = :id_ticket");
        $stmt->bindParam(':id_ticket', $id_ticket);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'InformeTicketDTO');
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public static function getInformeTicketByEquipo($id_tipo, $id_ticket)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM InformeTicket WHERE id_tipo = :id_tipo AND id_ticket = :id_ticket");
        $stmt->bindParam(':id_tipo', $id_tipo);
        $stmt->bindParam(':id_ticket', $id_ticket);
        $stmt->execute();
        return $stmt->fetch();
    }

    public static function getInformeTicketByEquipoAndTicket($id_tipo, $id_ticket)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM InformeTicket WHERE id_tipo = :id_tipo AND id_ticket = :id_ticket");
        $stmt->bindParam(':id_tipo', $id_tipo);
        $stmt->bindParam(':id_ticket', $id_ticket);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'InformeTicketDTO');
        $stmt->execute();
        return $stmt->fetch();
    }

    public static function getCountInformeTicketByTicket($id_ticket)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT COUNT(id_informe) AS total FROM InformeTicket WHERE id_ticket = :id_ticket");
        $stmt->bindParam(':id_ticket', $id_ticket);
        $stmt->execute();
        $result =  $stmt->fetch();

        return $result['total'];
    }

    public static function getIdLastInformeTicket()
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT id_informe AS id FROM InformeTicket ORDER BY id_informe DESC LIMIT 1");
        $stmt->execute();
        $result =  $stmt->fetch();

        return $result['id'];
    }

    public static function deleteInformeTicketByTicket($id_ticket)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("DELETE FROM InformeTicket WHERE id_ticket = :id_ticket");
        $stmt->bindParam(':id_ticket', $id_ticket);
        return  $stmt->execute();
    }
}
?>