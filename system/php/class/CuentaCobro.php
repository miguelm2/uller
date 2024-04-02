<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/CuentaCobroDTO.php';

class CuentaCobro extends System{
    public static function newCuentaCobro($id_servicio, $id_tecnico, $estado, $fecha_registro){
        $dbh = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO CuentaCobro (id_servicio, id_tecnico, estado, fecha_registro)
                                VALUES (:id_servicio, :id_tecnico:, :estado, :fecha_registro)");
        $stmt->bindParam(':id_sevicio',$id_servicio);
        $stmt->bindParam(':id_tecnico',$id_tecnico);
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        return $stmt->execute();
    }

    public static function getCuentaCobro(){
        $dbh = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM CuentaCobro");
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'CuentaCobroDTO');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function getCuentaCobroById($id_cuenta){
        $dbh = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM CuentaCobro 
                            WHERE id_cuenta = :id_cuenta");
        $stmt->bindParam(':id_cuenta', $id_cuenta);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'CuentaCobroDTO');
        $stmt->execute();
        return $stmt->fetch();
    }
}
?>