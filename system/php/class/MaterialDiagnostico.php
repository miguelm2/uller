<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/MaterialDiagnosticoDTO.php';

class MaterialDiagnostico extends System
{
    public static function newMaterialDiagnostico($id_diagnostico, $id_ticket, $id_material, $cantidad, $unidad_medida, $fecha_registro)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO MaterialDiagnostico (id_diagnostico, id_ticket, id_material, cantidad, unidad_medida, fecha_registro) 
                                VALUES (:id_diagnostico, :id_ticket, :id_material, :cantidad, :unidad_medida, :fecha_registro)");
        $stmt->bindParam(':id_diagnostico', $id_diagnostico);
        $stmt->bindParam(':id_ticket', $id_ticket);
        $stmt->bindParam(':id_material', $id_material);
        $stmt->bindParam(':cantidad', $cantidad);
        $stmt->bindParam(':unidad_medida', $unidad_medida);
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
            $materialDTO->setCantidad($result['cantidad']);
            $materialDTO->setUnidad_medida($result['unidad_medida']);
            $materialDTO->setFecha_registro($result['fecha_registro']);


            $lstMaterial[$intCount] = $materialDTO;
            $intCount++;
        }
        return $lstMaterial;
    }

    public static function deleteMaterialByDiagnostico($id_diagnostico)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("DELETE FROM MaterialDiagnostico WHERE id_diagnostico = :id_diagnostico");
        $stmt->bindParam(':id_diagnostico', $id_diagnostico);
        return  $stmt->execute();
    }

    public static function deleteMaterialByTicket($id_ticket)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("DELETE FROM MaterialDiagnostico WHERE id_ticket = :id_ticket");
        $stmt->bindParam(':id_ticket', $id_ticket);
        return  $stmt->execute();
    }

}
?>