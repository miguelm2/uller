<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/DiagnosticoDTO.php';

class Diagnostico extends System
{
    public static function newDiagnostico($id_ticket, $descripcion, $fecha_registro)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO Diagnostico (id_ticket, descripcion, fecha_registro) 
                                VALUES (:id_ticket, :descripcion, :fecha_registro)");
        $stmt->bindParam(':id_ticket', $id_ticket);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        return  $stmt->execute();
    }

    public static function getLastDiagnostico()
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("SELECT id_diagnostico FROM Diagnostico ORDER BY id_diagnostico DESC LIMIT 1");
        $stmt->execute();
        $result = $stmt->fetch();

        return $result['id_diagnostico'];
    }

    public static function getDiagnosticoById($id_diagnostico)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Diagnostico WHERE id_diagnostico = :id_diagnostico");
        $stmt->bindParam(':id_diagnostico', $id_diagnostico);
        $stmt->execute();
        $result =  $stmt->fetch();

        if ($result) {
            $diagnosticoDTO = new DiagnosticoDTO();

            $diagnosticoDTO->setId_diagnostico($result['id_diagnostico']);
            $diagnosticoDTO->setId_ticket($result['id_ticket']);
            $diagnosticoDTO->setDescripcion($result['descripcion']);
            $diagnosticoDTO->setFecha_registro($result['fecha_registro']);
            $diagnosticoDTO->setLstHerramientas(HerramientaDiagnostico::listHerramientaDiagnosticoById($result['id_diagnostico']));
            $diagnosticoDTO->setLstMateriales(MaterialDiagnostico::listMaterialDiagnosticoById($result['id_diagnostico']));
            $diagnosticoDTO->setLstAyudantes(AyudanteDiagnostico::listAyudanteDiagnosticoById($result['id_diagnostico']));

            return $diagnosticoDTO;
        }
        return null;
    }

    public static function deleteComponenteDiagnostico($tabla, $campo, $id)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("DELETE FROM ".$tabla." WHERE ".$campo." = :".$campo."");
        $stmt->bindParam(':'.$campo.'', $id);
        return  $stmt->execute();
    }
}
?>