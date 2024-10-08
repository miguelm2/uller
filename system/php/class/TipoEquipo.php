<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/TipoEquipoDTO.php';

class TipoEquipo extends System
{
    public static function newTipoEquipo($id_usuario, $nombre, $marca, $modelo, $year_fabricacion, $serial_interior, $serial_exterior, $tipo_equipo, $capacidad_btuh, $voltaje_fases, $refrigerante, $inverter, $descripcion, $fecha_registro)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO TipoEquipo (id_usuario, nombre, marca, modelo, year_fabricacion, serial_interior, serial_exterior, tipo_equipo, capacidad_btuh, voltaje_fases, refrigerante, inverter, descripcion, fecha_registro) 
                                VALUES (:id_usuario, :nombre, :marca, :modelo, :year_fabricacion, :serial_interior, :serial_exterior, :tipo_equipo, :capacidad_btuh, :voltaje_fases, :refrigerante, :inverter, :descripcion, :fecha_registro)");
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':marca', $marca);
        $stmt->bindParam(':modelo', $modelo);
        $stmt->bindParam(':year_fabricacion', $year_fabricacion);
        $stmt->bindParam(':serial_interior', $serial_interior);
        $stmt->bindParam(':serial_exterior', $serial_exterior);
        $stmt->bindParam(':tipo_equipo', $tipo_equipo);
        $stmt->bindParam(':capacidad_btuh', $capacidad_btuh);
        $stmt->bindParam(':voltaje_fases', $voltaje_fases);
        $stmt->bindParam(':refrigerante', $refrigerante);
        $stmt->bindParam(':inverter', $inverter);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        return  $stmt->execute();
    }

    public static function setTipoEquipo($id_equipo, $nombre, $marca, $modelo, $year_fabricacion, $serial_interior, $serial_exterior, $tipo_equipo, $capacidad_btuh, $voltaje_fases, $refrigerante, $inverter, $descripcion)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE TipoEquipo SET nombre = :nombre, marca = :marca, modelo = :modelo, year_fabricacion = :year_fabricacion, serial_interior = :serial_interior,  
                                                    serial_exterior = :serial_exterior, tipo_equipo = :tipo_equipo, capacidad_btuh = :capacidad_btuh, voltaje_fases = :voltaje_fases,
                                                    refrigerante = :refrigerante, inverter = :inverter, descripcion = :descripcion WHERE id_tipo = :id_tipo");
        $stmt->bindParam(':id_tipo', $id_equipo);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':marca', $marca);
        $stmt->bindParam(':modelo', $modelo);
        $stmt->bindParam(':year_fabricacion', $year_fabricacion);
        $stmt->bindParam(':serial_interior', $serial_interior);
        $stmt->bindParam(':serial_exterior', $serial_exterior);
        $stmt->bindParam(':tipo_equipo', $tipo_equipo);
        $stmt->bindParam(':capacidad_btuh', $capacidad_btuh);
        $stmt->bindParam(':voltaje_fases', $voltaje_fases);
        $stmt->bindParam(':refrigerante', $refrigerante);
        $stmt->bindParam(':inverter', $inverter);
        $stmt->bindParam(':descripcion', $descripcion);
        return  $stmt->execute();
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

    public static function getTipoEquipoByIdJS($id_tipo)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM TipoEquipo WHERE id_tipo = :id_tipo");
        $stmt->bindParam(':id_tipo', $id_tipo);
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

    public static function listTipoEquipoByUser($id_usuario)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM TipoEquipo WHERE id_usuario = :id_usuario");
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'TipoEquipoDTO');
        $stmt->execute();
        return  $stmt->fetchAll();
    }

    public static function listTipoEquipoByUserJs($id_usuario)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM TipoEquipo WHERE id_usuario = :id_usuario");
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->execute();
        return  $stmt->fetchAll();
    }

    public static function deleteTipoEquipo($id_equipo)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("DELETE FROM TipoEquipo WHERE id_tipo = :id_tipo");
        $stmt->bindParam(':id_tipo', $id_equipo);
        return  $stmt->execute();
    }

    public static function deleteTipoEquipoByUser($id_usuario)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("DELETE FROM TipoEquipo WHERE id_usuario = :id_usuario");
        $stmt->bindParam(':id_usuario', $id_usuario);
        return  $stmt->execute();
    }

    public static function getCountEquiposByUser($id_usuario)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT COUNT(id_tipo) AS total FROM TipoEquipo WHERE id_usuario = :id_usuario");
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result['total'];
    }
}