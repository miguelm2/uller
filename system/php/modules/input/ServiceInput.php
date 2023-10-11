<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Insumo.php';

class ServiceInput extends System
{
    public static function newInput($nombre)
    {
        try {
            $nombre = parent::limpiarString($nombre);

            $fecha_registro = date('Y-m-d H:i:s');
            $id_tecnico = $_SESSION['id'];

            $result = Insumo::newInsumo($id_tecnico, strtoupper($nombre), $fecha_registro);
            if ($result) {
                return Elements::alert(Constants::$REGISTER_NEW, "success");
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function setInput($id_insumo, $nombre)
    {
        try {
            $id_insumo = parent::limpiarString($id_insumo);
            $nombre = parent::limpiarString($nombre);
            $id_tecnico = $_SESSION['id'];

            $result = Insumo::setInsumo($id_insumo, $id_tecnico, strtoupper($nombre));

            if ($result) {
                return Elements::alert(Constants::$REGISTER_UPDATE, "success");
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function deleteInput($id_insumo)
    {
        try {
            $id_insumo = parent::limpiarString($id_insumo);

            $result = Insumo::deleteInsumo($id_insumo);
            if ($result) return Elements::alert(Constants::$REGISTER_DELETE, 'success');
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getInsumo($id_insumo)
    {
        try {
            $id_insumo = parent::limpiarString($id_insumo);

            $result = Insumo::getInsumoByIdJS($id_insumo);
            return json_encode($result);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getTablaInsumos()
    {
        try {
            $tableHtml = "";
            $id_tecnico = $_SESSION['id'];
            $modelResponse = Insumo::listInsumoByIdTecnico($id_tecnico);

            foreach ($modelResponse as $valor) {
                $tableHtml .= Elements::getTablaTresColumnas(
                    $valor->getId_insumo(),
                    $valor->getNombre(),
                    $valor->getFecha_registro()
                );
            }
            return $tableHtml;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getTablaInsumosAdmin()
    {
        try {
            $tableHtml = "";
            $id_tecnico = $_SESSION['id'];
            $modelResponse = Insumo::listInsumoByIdTecnico($id_tecnico);

            foreach ($modelResponse as $valor) {
                $tableHtml .= Elements::getTablaTresColumnasAdmin(
                    $valor->getId_insumo(),
                    $valor->getNombre(),
                    $valor->getFecha_registro()
                );
            }
            return $tableHtml;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getOptionInsumos($id_tecnico)
    {
        try {
            $tableHtml = "";
            $id_tecnico = parent::limpiarString($id_tecnico);
            $modelResponse = Insumo::listInsumoByIdTecnico($id_tecnico);

            $count = 0;
            if ($modelResponse) {
                foreach ($modelResponse as $valor) {
                    $count++;
                    if ($count == count($modelResponse)) {
                        $tableHtml .=  $valor->getNombre() . '';
                    } else {
                        $tableHtml .=  $valor->getNombre() . ', ';
                    }
                }
            } else {
                $tableHtml = 'Sin registrar';
            }

            return $tableHtml;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
