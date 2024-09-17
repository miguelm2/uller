<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/EquipoTipoDTO.php';

class EquipoTipo extends System
{
    public static function newEquipmentType($nombre, $imagen, $fecha_registro)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO EquipoTipo (nombre, imagen, fecha_registro) 
                                VALUES (:nombre, :imagen, :fecha_registro)");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':imagen', $imagen);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        return  $stmt->execute();
    }

    public static function setEquipmentType($id_equipo_tipo, $nombre)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE EquipoTipo SET nombre = :nombre WHERE id_equipo_tipo = :id_equipo_tipo");
        $stmt->bindParam(':id_equipo_tipo', $id_equipo_tipo);
        $stmt->bindParam(':nombre', $nombre);
        return  $stmt->execute();
    }

    public static function getEquipmentType($id_equipo_tipo)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM EquipoTipo WHERE id_equipo_tipo = :id_equipo_tipo");
        $stmt->bindParam(':id_equipo_tipo', $id_equipo_tipo);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'EquipoTipoDTO');
        $stmt->execute();
        return  $stmt->fetch();
    }

    public static function listEquipmentType()
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM EquipoTipo");
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'EquipoTipoDTO');
        $stmt->execute();
        return  $stmt->fetchAll();
    }

    public static function deleteEquipmentType($id_equipo_tipo)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("DELETE FROM EquipoTipo WHERE id_equipo_tipo = :id_equipo_tipo");
        $stmt->bindParam(':id_equipo_tipo', $id_equipo_tipo);
        return  $stmt->execute();
    }
}
