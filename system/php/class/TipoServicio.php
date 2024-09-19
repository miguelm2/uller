<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/TipoServicioDTO.php';

class TipoServicio extends System
{
    public static function newTipoServicio($nombre, $descripcion, $valor, $fecha_registro)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO TipoServicio (nombre, descripcion, valor, fecha_registro) 
                                VALUES (:nombre, :descripcion, :valor, :fecha_registro)");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':valor', $valor);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        return  $stmt->execute();
    }

    public static function setTipoServicio($id_tipo, $nombre, $descripcion, $valor)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE TipoServicio 
                                SET nombre = :nombre, 
                                    descripcion = :descripcion,
                                    valor = :valor 
                                WHERE id_tipo = :id_tipo");
        $stmt->bindParam(':id_tipo', $id_tipo);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':valor', $valor);
        return  $stmt->execute();
    }

    public static function getTipoServicio($id_tipo)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM TipoServicio WHERE id_tipo = :id_tipo");
        $stmt->bindParam(':id_tipo', $id_tipo);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'TipoServicioDTO');
        $stmt->execute();
        return  $stmt->fetch();
    }

    public static function getTipoServicioById($id_tipo)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM TipoServicio WHERE id_tipo = :id_tipo");
        $stmt->bindParam(':id_tipo', $id_tipo);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'TipoServicioDTO');
        $stmt->execute();
        return  $stmt->fetch();
    }

    public static function listTipoServicio()
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM TipoServicio");
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'TipoServicioDTO');
        $stmt->execute();
        return  $stmt->fetchAll();
    }

    public static function deleteTipoServicio($id_tipo)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("DELETE FROM TipoServicio WHERE id_tipo = :id_tipo");
        $stmt->bindParam(':id_tipo', $id_tipo);
        return  $stmt->execute();
    }
}