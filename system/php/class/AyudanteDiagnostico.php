<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/AyudanteDiagnosticoDTO.php';

class AyudanteDiagnostico extends System
{
    public static function newAyudanteDiagnostico($id_diagnostico, $id_ticket, $id_ayudante, $fecha_registro)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO AyudanteDiagnostico (id_diagnostico, id_ticket, id_ayudante, fecha_registro) 
                                VALUES (:id_diagnostico, :id_ticket, :id_ayudante, :fecha_registro)");
        $stmt->bindParam(':id_diagnostico', $id_diagnostico);
        $stmt->bindParam(':id_ticket', $id_ticket);
        $stmt->bindParam(':id_ayudante', $id_ayudante);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        return  $stmt->execute();
    }

    public static function listAyudanteDiagnosticoById($id_diagnostico)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM AyudanteDiagnostico WHERE id_diagnostico = :id_diagnostico");
        $stmt->bindParam(':id_diagnostico', $id_diagnostico);
        $stmt->execute();

        $lstAyudante = array();
        $intCount = 0;

        $modelResponse = $stmt->fetchAll();

        foreach ($modelResponse as $result) {
            $ayudanteDTO = new AyudanteDiagnosticoDTO();

            $ayudanteDTO->setId_ayudante_diagnostico($result['id_ayudante_diagnostico']);
            $ayudanteDTO->setId_diagnostico($result['id_diagnostico']);
            $ayudanteDTO->setId_ticket($result['id_ticket']);
            $ayudanteDTO->setAyudanteDTO(Tecnico::getTecnicoById($result['id_ayudante']));
            $ayudanteDTO->setFecha_registro($result['fecha_registro']);


            $lstAyudante[$intCount] = $ayudanteDTO;
            $intCount++;
        }
        return $lstAyudante;
    }

}
?>