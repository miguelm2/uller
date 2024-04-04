<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/CuentaCobroDTO.php';

class CuentaCobro extends System{
    public static function newCuentaCobro($id_ticket, $id_tecnico, $estado, $fecha_registro){
        $dbh = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO CuentaCobro (id_ticket, id_tecnico, estado, fecha_registro)
                                VALUES (:id_ticket, :id_tecnico, :estado, :fecha_registro)");
        $stmt->bindParam(':id_ticket',$id_ticket);
        $stmt->bindParam(':id_tecnico',$id_tecnico);
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        return $stmt->execute();
    }

    public static function getCuentaCobroByIdTecnico($id_tecnico){
        $dbh = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM CuentaCobro
                                WHERE id_tecnico = :id_tecnico");
        $stmt->bindParam(':id_tecnico', $id_tecnico);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'CuentaCobroDTO');
        $stmt->execute();
        return $stmt->fetchAll();
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
    public static function getCuentaCobroByTicket($id_ticket){
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM CuentaCobro 
                            WHERE id_ticket = :id_ticket");
        $stmt->bindParam(':id_ticket', $id_ticket);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'CuentaCobroDTO');
        $stmt->execute();
        return $stmt->fetch();
    }
    public static function setFirmaCuentaCobro($id_ticket, $firma)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE CuentaCobro 
                            SET firma_tecnico = :firma 
                            WHERE id_ticket = :id_ticket");
        $stmt->bindParam(':id_ticket', $id_ticket);
        $stmt->bindParam(':firma', $firma);
        return  $stmt->execute();
    }

    public static function setEstadoCuentaCobro($id_ticket,$estado){
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE CuentaCobro
                            SET estado = :estado
                            WHERE id_ticket = :id_ticket");
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':id_ticket', $id_ticket);
        return $stmt->execute();
    }
    public static function setCuentaCobroEstado($id_cuenta,$estado){
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE CuentaCobro
                            SET estado = :estado
                            WHERE id_cuenta = :id_cuenta");
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':id_cuenta', $id_cuenta);
        return $stmt->execute();
    }
}
?>