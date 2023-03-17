<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/MaterialDTO.php';

class Material extends System
{
    public static function newMaterial($nombre, $descripcion, $fecha_registro)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO Material (nombre, descripcion, fecha_registro) 
                                VALUES (:nombre, :descripcion, :fecha_registro)");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        return  $stmt->execute();
    }

    public static function setMaterial($id_material, $nombre, $descripcion)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE Material SET nombre = :nombre, descripcion = :descripcion WHERE id_material = :id_material");
        $stmt->bindParam(':id_material', $id_material);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':descripcion', $descripcion);
        return  $stmt->execute();
    }

    public static function getMaterial($id_material)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Material WHERE id_material = :id_material");
        $stmt->bindParam(':id_material', $id_material);
        $stmt->execute();
        return  $stmt->fetch();
    }

    public static function listMaterial()
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Material");
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'MaterialDTO');
        $stmt->execute();
        return  $stmt->fetchAll();
    }

    public static function deleteMaterial($id_material)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("DELETE FROM Material WHERE id_material = :id_material");
        $stmt->bindParam(':id_material', $id_material);
        return  $stmt->execute();
    }
}