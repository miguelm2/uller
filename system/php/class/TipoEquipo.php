<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/TipoEquipoDTO.php';

class TipoEquipo extends System
{
    public static function newTipoEquipo($nombre, $descripcion, $fecha_registro)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO TipoEquipo (nombre, descripcion, fecha_registro) 
                                VALUES (:nombre, :descripcion, :fecha_registro)");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        return  $stmt->execute();
    }

    public static function setTipoEquipo($id_tipo, $nombre, $descripcion)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE TipoEquipo SET nombre = :nombre, descripcion = :descripcion WHERE id_tipo = :id_tipo");
        $stmt->bindParam(':id_tipo', $id_tipo);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':descripcion', $descripcion);
        return  $stmt->execute();
    }

    public static function getTipoEquipo($id_tipo)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM TipoEquipo WHERE id_tipo = :id_tipo");
        $stmt->bindParam(':id_tipo', $id_tipo);
        $stmt->execute();
        return  $stmt->fetch();
    }

    public static function getTipoEquipoById($id_tipo)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM TipoEquipo WHERE id_tipo = :id_tipo");
        $stmt->bindParam(':id_tipo', $id_tipo);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'TipoEquipoDTO');
        $stmt->execute();
        return  $stmt->fetch();
    }

    public static function listTipoEquipo()
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM TipoEquipo");
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'TipoEquipoDTO');
        $stmt->execute();
        return  $stmt->fetchAll();
    }

    public static function deleteTipoEquipo($id_tipo)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("DELETE FROM TipoEquipo WHERE id_tipo = :id_tipo");
        $stmt->bindParam(':id_tipo', $id_tipo);
        return  $stmt->execute();
    }
}