<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/HerramientaDTO.php';

class Herramienta extends System
{
    public static function newHerramienta($nombre, $tipo, $descripcion, $fecha_registro)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO Herramienta (nombre, tipo, descripcion, fecha_registro) 
                                VALUES (:nombre, :tipo, :descripcion, :fecha_registro)");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':tipo', $tipo);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        return  $stmt->execute();
    }

    public static function setHerramienta($id_herramienta, $nombre, $tipo, $descripcion)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE Herramienta SET nombre = :nombre, tipo = :tipo, descripcion = :descripcion WHERE id_herramienta = :id_herramienta");
        $stmt->bindParam(':id_herramienta', $id_herramienta);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':tipo', $tipo);
        $stmt->bindParam(':descripcion', $descripcion);
        return  $stmt->execute();
    }

    public static function getHerramienta($id_herramienta)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Herramienta WHERE id_herramienta = :id_herramienta");
        $stmt->bindParam(':id_herramienta', $id_herramienta);
        $stmt->execute();
        return  $stmt->fetch();
    }

    public static function getHerramientaById($id_herramienta)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Herramienta WHERE id_herramienta = :id_herramienta");
        $stmt->bindParam(':id_herramienta', $id_herramienta);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'HerramientaDTO');
        $stmt->execute();
        return  $stmt->fetch();
    }

    public static function listHerramienta()
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Herramienta");
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'HerramientaDTO');
        $stmt->execute();
        return  $stmt->fetchAll();
    }

    public static function deleteHerramienta($id_herramienta)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("DELETE FROM Herramienta WHERE id_herramienta = :id_herramienta");
        $stmt->bindParam(':id_herramienta', $id_herramienta);
        return  $stmt->execute();
    }
}
