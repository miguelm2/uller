<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/MaterialDiagnosticoDTO.php';

class MaterialDiagnostico extends System
{
    public static function newMaterialDiagnostico($id_diagnostico, $id_ticket, $id_material, $fecha_registro)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO MaterialDiagnostico (id_diagnostico, id_ticket, id_material, fecha_registro) 
                                VALUES (:id_diagnostico, :id_ticket, :id_material, :fecha_registro)");
        $stmt->bindParam(':id_diagnostico', $id_diagnostico);
        $stmt->bindParam(':id_ticket', $id_ticket);
        $stmt->bindParam(':id_material', $id_material);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        return  $stmt->execute();
    }

    public static function listMaterialDiagnosticoById($id_diagnostico)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM MaterialDiagnostico WHERE id_diagnostico = :id_diagnostico");
        $stmt->bindParam(':id_diagnostico', $id_diagnostico);
        $stmt->execute();

        $lstMaterial = array();
        $intCount = 0;

        $modelResponse = $stmt->fetchAll();

        foreach ($modelResponse as $result) {
            $materialDTO = new MaterialDiagnosticoDTO();

            $materialDTO->setId_material_diagnostico($result['id_material_diagnostico']);
            $materialDTO->setId_diagnostico($result['id_diagnostico']);
            $materialDTO->setId_ticket($result['id_ticket']);
            $materialDTO->setMaterialDTO(Material::getMaterialById($result['id_material']));
            $materialDTO->setFecha_registro($result['fecha_registro']);


            $lstMaterial[$intCount] = $materialDTO;
            $intCount++;
        }
        return $lstMaterial;
    }

}
?>