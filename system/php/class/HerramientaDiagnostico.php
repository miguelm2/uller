<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/HerramientaDiagnosticoDTO.php';

class HerramientaDiagnostico extends System
{
    public static function newHerramientaDiagnostico($id_diagnostico, $id_ticket, $id_herramienta, $cantidad, $fecha_registro)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO HerramientaDiagnostico (id_diagnostico, id_ticket, id_herramienta, cantidad, fecha_registro) 
                                VALUES (:id_diagnostico, :id_ticket, :id_herramienta, :cantidad, :fecha_registro)");
        $stmt->bindParam(':id_diagnostico', $id_diagnostico);
        $stmt->bindParam(':id_ticket', $id_ticket);
        $stmt->bindParam(':id_herramienta', $id_herramienta);
        $stmt->bindParam(':cantidad', $cantidad);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        return  $stmt->execute();
    }

    public static function listHerramientaDiagnosticoById($id_diagnostico)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM HerramientaDiagnostico WHERE id_diagnostico = :id_diagnostico");
        $stmt->bindParam(':id_diagnostico', $id_diagnostico);
        $stmt->execute();

        $lstHerramienta = array();
        $intCount = 0;

        $modelResponse = $stmt->fetchAll();

        foreach ($modelResponse as $result) {
            $herramientaDTO = new HerramientaDiagnosticoDTO();

            $herramientaDTO->setId_herramienta_diagnostico($result['id_herramienta_diagnostico']);
            $herramientaDTO->setId_diagnostico($result['id_diagnostico']);
            $herramientaDTO->setId_ticket($result['id_ticket']);
            $herramientaDTO->setHerramientaDTO(Herramienta::getHerramientaById($result['id_herramienta']));
            $herramientaDTO->setCantidad($result['cantidad']);
            $herramientaDTO->setFecha_registro($result['fecha_registro']);


            $lstHerramienta[$intCount] = $herramientaDTO;
            $intCount++;
        }
        return $lstHerramienta;
    }

    public static function deleteHerramientaByDiagnostico($id_diagnostico)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("DELETE FROM HerramientaDiagnostico WHERE id_diagnostico = :id_diagnostico");
        $stmt->bindParam(':id_diagnostico', $id_diagnostico);
        return  $stmt->execute();
    }

    public static function deleteHerramientaByTicket($id_ticket)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("DELETE FROM HerramientaDiagnostico WHERE id_ticket = :id_ticket");
        $stmt->bindParam(':id_ticket', $id_ticket);
        return  $stmt->execute();
    }

    public static function getValidateHerramientaDiagnosticoByHerramienta($id_herramienta)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT id_herramienta_diagnostico FROM HerramientaDiagnostico WHERE id_herramienta = :id_herramienta");
        $stmt->bindParam(':id_herramienta', $id_herramienta);
        $stmt->execute();

        return $stmt->fetch();
    }

}
?>