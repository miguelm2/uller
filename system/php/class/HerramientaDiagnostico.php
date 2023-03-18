<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/HerramientaDiagnosticoDTO.php';

class HerramientaDiagnostico extends System
{
    public static function newHerramientaDiagnostico($id_diagnostico, $id_ticket, $id_herramienta, $fecha_registro)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO HerramientaDiagnostico (id_diagnostico, id_ticket, id_herramienta, fecha_registro) 
                                VALUES (:id_diagnostico, :id_ticket, :id_herramienta, :fecha_registro)");
        $stmt->bindParam(':id_diagnostico', $id_diagnostico);
        $stmt->bindParam(':id_ticket', $id_ticket);
        $stmt->bindParam(':id_herramienta', $id_herramienta);
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
            $herramientaDTO->setFecha_registro($result['fecha_registro']);


            $lstHerramienta[$intCount] = $herramientaDTO;
            $intCount++;
        }
        return $lstHerramienta;
    }

}
?>