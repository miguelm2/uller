<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/CobroAdicionalDTO.php';

class CobroAdicional extends System{
    public static function newCobroAdicional($id_cuenta, $valor, $observacion){
        $dbh = parent::Conexion();
        $stmt = $dbh->prepare('INSERT INTO CobroAdicional
                            (id_cuenta, valor, observacion)
                            VALUES (:id_cuenta, :valor, :observacion)');
        $stmt->bindParam(':id_cuenta', $id_cuenta);
        $stmt->bindParam(':valor', $valor);
        $stmt->bindParam(':observacion',$observacion);
        return $stmt->execute(); 
    }

    public static function getCobroAdiconalById($id_cuenta){
        $dbh = parent::Conexion();
        $stmt = $dbh->prepare('SELECT * 
                            FROM CobroAdicional
                            WHERE id_cuenta = :id_cuenta');
        $stmt->bindParam(':id_cuenta', $id_cuenta);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'CobroAdicionalDTO');
        $stmt->execute();
        return $stmt->fetch();
    }

    public static function setCobroAdicional($id_cuenta, $valor, $observacion){
        $dbh = parent::Conexion();
        $stmt = $dbh->prepare('UPDATE CobroAdicional
                            SET valor = :valor,
                                observacion = :observacion
                            WHERE id_cuenta = :id_cuenta');
        $stmt->bindParam(':valor', $valor);
        $stmt->bindParam(':observacion',$observacion);
        $stmt->bindParam(':id_cuenta', $id_cuenta);
        return $stmt->execute();
    }
}

?>