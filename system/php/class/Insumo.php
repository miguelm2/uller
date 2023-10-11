<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/InsumoDTO.php';

class Insumo extends System
{
    public static function newInsumo($id_tecnico, $nombre, $fecha_registro)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO Insumo (id_tecnico, nombre, fecha_registro) 
                                VALUES (:id_tecnico, :nombre, :fecha_registro)");
        $stmt->bindParam(':id_tecnico', $id_tecnico);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        return  $stmt->execute();
    }

    public static function setInsumo($id_insumo, $id_tecnico, $nombre)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE Insumo SET nombre = :nombre
                                                    WHERE id_insumo = :id_insumo
                                                    AND id_tecnico = :id_tecnico");
        $stmt->bindParam(':id_insumo', $id_insumo);
        $stmt->bindParam(':id_tecnico', $id_tecnico);
        $stmt->bindParam(':nombre', $nombre);
        return  $stmt->execute();
    }

    public static function getInsumoById($id_insumo)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Insumo WHERE id_insumo = :id_insumo");
        $stmt->bindParam(':id_insumo', $id_insumo);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'InsumoDTO');
        $stmt->execute();

        return $stmt->fetch();
    }

    public static function getInsumoByIdJS($id_insumo)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Insumo WHERE id_insumo = :id_insumo");
        $stmt->bindParam(':id_insumo', $id_insumo);
        $stmt->execute();

        return $stmt->fetch();
    }

    public static function listInsumoByIdTecnico($id_tecnico)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Insumo WHERE id_tecnico = :id_tecnico");
        $stmt->bindParam(':id_tecnico', $id_tecnico);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'InsumoDTO');
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public static function deleteInsumo($id_insumo)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("DELETE FROM Insumo WHERE id_insumo = :id_insumo");
        $stmt->bindParam(':id_insumo', $id_insumo);
        return  $stmt->execute();
    }

    public static function deleteInsumoByTecnico($id_tecnico)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("DELETE FROM Insumo WHERE id_tecnico = :id_tecnico");
        $stmt->bindParam(':id_tecnico', $id_tecnico);
        return  $stmt->execute();
    }

    public static function getCountInsumoByTecnico($id_tecnico)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT COUNT(*) AS total FROM Insumo WHERE id_tecnico = :id_tecnico");
        $stmt->bindParam(':id_tecnico', $id_tecnico);
        $stmt->execute();
        $result =  $stmt->fetch();

        return $result['total'];
    }
}
?>