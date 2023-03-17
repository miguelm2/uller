<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/TipoEquipo.php';

class ServiceEquipmentType extends System
{
    public static function newEquipmentType($nombre, $descripcion)
    {
        $nombre         = parent::limpiarString($nombre);
        $descripcion    = parent::limpiarString($descripcion);
        $fecha_registro = date('Y-m-d H:i:s');

        try {
            $result = TipoEquipo::newTipoEquipo($nombre, $descripcion, $fecha_registro);

            if ($result) {
                return '<script>swal("' . Constants::$REGISTER_NEW . '", "", "success");</script>';
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function setEquipmentType($id_tipo, $nombre, $descripcion)
    {
        $id_tipo        = parent::limpiarString($id_tipo);
        $nombre         = parent::limpiarString($nombre);
        $descripcion    = parent::limpiarString($descripcion);

        try {
            $result = TipoEquipo::setTipoEquipo($id_tipo, $nombre, $descripcion);

            if ($result) {
                return '<script>swal("' . Constants::$REGISTER_UPDATE . '", "", "success");</script>';
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getEquipmentType($id_tipo)
    {
        $id_tipo = parent::limpiarString($id_tipo);

        try {
            $modelResponse = TipoEquipo::getTipoEquipo($id_tipo);
            return json_encode($modelResponse);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function deleteEquipmentType($id_tipo)
    {
        $id_tipo = parent::limpiarString($id_tipo);

        try {
            $result = TipoEquipo::deleteTipoEquipo($id_tipo);

            if ($result) {
                return '<script>swal("' . Constants::$REGISTER_DELETE . '", "", "success");</script>';
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }


    public static function getTableEquipmentType()
    {
        if (basename($_SERVER['PHP_SELF']) == 'equipmentTypes.php') {
            $tableHtml = "";

            $modelResponse = TipoEquipo::listTipoEquipo();

            foreach ($modelResponse as $valor) {
                $tableHtml .= '<tr>';
                $tableHtml .= '<td>' . $valor->getId_tipo() . '</td>';
                $tableHtml .= '<td>' . $valor->getNombre() . '</td>';
                $tableHtml .= '<td>' . $valor->getDescripcion() . '</td>';
                $tableHtml .= '<td style="text-align:center;">' . Elements::crearBotonEditarJs($valor->getId_tipo()) .'</td>';
                $tableHtml .= '<td style="text-align:center;">' . Elements::crearBotonEliminarJs($valor->getId_tipo()) .'</td>';
                $tableHtml .= '</tr>';
            }
            return $tableHtml;
        }
    }
}
