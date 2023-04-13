<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Herramienta.php';

class ServiceTool extends System
{
    public static function newTool($nombre, $tipo, $descripcion)
    {
        $nombre         = parent::limpiarString($nombre);
        $tipo           = parent::limpiarString($tipo);
        $descripcion    = parent::limpiarString($descripcion);
        $fecha_registro = date('Y-m-d H:i:s');

        try {
            $result = Herramienta::newHerramienta($nombre, $tipo, $descripcion, $fecha_registro);

            if ($result) {
                return '<script>swal("' . Constants::$REGISTER_NEW . '", "", "success");</script>';
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function setTool($id_herramienta,$nombre, $tipo, $descripcion)
    {
        $id_herramienta = parent::limpiarString($id_herramienta);
        $nombre         = parent::limpiarString($nombre);
        $tipo           = parent::limpiarString($tipo);
        $descripcion    = parent::limpiarString($descripcion);

        try {
            $result = Herramienta::setHerramienta($id_herramienta, $nombre, $tipo, $descripcion);

            if ($result) {
                return '<script>swal("' . Constants::$REGISTER_UPDATE . '", "", "success");</script>';
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getTool($id_herramienta)
    {
        $id_herramienta = parent::limpiarString($id_herramienta);

        try {
            $modelResponse = Herramienta::getHerramienta($id_herramienta);
            return json_encode($modelResponse);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function deleteTool($id_herramienta)
    {
        $id_herramienta = parent::limpiarString($id_herramienta);

        try {
            $result = Herramienta::deleteHerramienta($id_herramienta);

            if ($result) {
                return '<script>swal("' . Constants::$REGISTER_DELETE . '", "", "success");</script>';
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }


    public static function getTablaTools()
    {
        if (basename($_SERVER['PHP_SELF']) == 'tools.php') {
            $tableHtml = "";

            $modelResponse = Herramienta::listHerramienta();

            foreach ($modelResponse as $valor) {
                $tableHtml .= '<tr>';
                $tableHtml .= '<td>' . $valor->getId_herramienta() . '</td>';
                $tableHtml .= '<td>' . $valor->getNombre() . '</td>';
                $tableHtml .= '<td>' . $valor->getTipo()[1] . '</td>';
                $tableHtml .= '<td>' . $valor->getDescripcion() . '</td>';
                $tableHtml .= '<td style="text-align:center;">' . Elements::crearBotonEditarJs($valor->getId_herramienta()) .'</td>';
                $tableHtml .= '<td style="text-align:center;">' . Elements::crearBotonEliminarJs($valor->getId_herramienta()) .'</td>';
                $tableHtml .= '</tr>';
            }
            return $tableHtml;
        }
    }

    public static function getSelectTools()
    {
        if (basename($_SERVER['PHP_SELF']) == 'ticket.php' || basename($_SERVER['PHP_SELF']) == 'diagnosis.php') {
            $tableHtml = "";

            $modelResponse = Herramienta::listHerramienta();

            foreach ($modelResponse as $valor) {
                $tableHtml .= '<option value="'.$valor->getId_herramienta().'">'.$valor->getNombre().' ('.$valor->getTipo()[1].')</option>';
            }
            return $tableHtml;
        }
    }
}
