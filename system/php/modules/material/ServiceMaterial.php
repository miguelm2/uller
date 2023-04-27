<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Material.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/MaterialDiagnostico.php';

class ServiceMaterial extends System
{
    public static function newMaterial($nombre, $descripcion)
    {
        $nombre         = parent::limpiarString($nombre);
        $descripcion    = parent::limpiarString($descripcion);
        $fecha_registro = date('Y-m-d H:i:s');

        try {
            $result = Material::newMaterial($nombre, $descripcion, $fecha_registro);

            if ($result) {
                return '<script>swal("' . Constants::$REGISTER_NEW . '", "", "success");</script>';
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function setMaterial($id_material, $nombre, $descripcion)
    {
        $id_material    = parent::limpiarString($id_material);
        $nombre         = parent::limpiarString($nombre);
        $descripcion    = parent::limpiarString($descripcion);

        try {
            $result = Material::setMaterial($id_material, $nombre, $descripcion);

            if ($result) {
                return '<script>swal("' . Constants::$REGISTER_UPDATE . '", "", "success");</script>';
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getMaterial($id_material)
    {
        $id_material = parent::limpiarString($id_material);

        try {
            $modelResponse = Material::getMaterial($id_material);
            return json_encode($modelResponse);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function deleteMaterial($id_material)
    {
        $id_material = parent::limpiarString($id_material);

        try {
            $valdiateMaterial = MaterialDiagnostico::getValidateMaterialDiagnosticoByMaterial($id_material);

            if (!$valdiateMaterial) {
                $result = Material::deleteMaterial($id_material);
                if ($result) {
                    return '<script>swal("' . Constants::$REGISTER_DELETE . '", "", "success");</script>';
                }
            }else{
                return '<script>swal("El material no se puede eliminar", "Existen diagnosticos asociados al material", "warning");</script>';
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }


    public static function getTablaMaterials()
    {
        if (basename($_SERVER['PHP_SELF']) == 'materials.php') {
            $tableHtml = "";

            $modelResponse = Material::listMaterial();

            foreach ($modelResponse as $valor) {
                $tableHtml .= '<tr>';
                $tableHtml .= '<td>' . $valor->getId_material() . '</td>';
                $tableHtml .= '<td>' . $valor->getNombre() . '</td>';
                $tableHtml .= '<td>' . $valor->getDescripcion() . '</td>';
                $tableHtml .= '<td style="text-align:center;">' . Elements::crearBotonEditarJs($valor->getId_material()) . '</td>';
                $tableHtml .= '<td style="text-align:center;">' . Elements::crearBotonEliminarJs($valor->getId_material()) . '</td>';
                $tableHtml .= '</tr>';
            }
            return $tableHtml;
        }
    }

    public static function getSelectMaterials()
    {
        if (basename($_SERVER['PHP_SELF']) == 'diagnosis.php') {
            $tableHtml = "";

            $modelResponse = Material::listMaterial();

            foreach ($modelResponse as $valor) {
                $tableHtml .= '<option value="' . $valor->getId_material() . '">' . $valor->getNombre() . '</option>';
            }
            return $tableHtml;
        }
    }
}
