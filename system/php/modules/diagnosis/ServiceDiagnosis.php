<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Diagnostico.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Herramienta.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Material.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Tecnico.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/HerramientaDiagnostico.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/MaterialDiagnostico.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/AyudanteDiagnostico.php';

class ServiceDiagnosis extends System
{
    public static function newDiagnosis($id_ticket, $descripcion)
    {
        $id_ticket      = parent::limpiarString($id_ticket);
        $descripcion    = parent::limpiarString($descripcion);
        $fecha_registro = date('Y-m-d H:i:s');

        try {
            $result = Diagnostico::newDiagnostico($id_ticket, $descripcion, $fecha_registro);

            if ($result) {
                $id_diagnostico = Diagnostico::getLastDiagnostico();
                header('Location:diagnosis?diagnosis=' . $id_diagnostico . '&ticket=' . $id_ticket);
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getDiagnosis($id_diagnostico)
    {
        $id_diagnostico = parent::limpiarString($id_diagnostico);

        try {
            $modelResponse = Diagnostico::getDiagnosticoById($id_diagnostico);
            return $modelResponse;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function addToolDiagnosis($id_diagnostico, $id_ticket, $id_herramienta)
    {
        $id_diagnostico = parent::limpiarString($id_diagnostico);
        $id_ticket      = parent::limpiarString($id_ticket);
        $id_herramienta = parent::limpiarString($id_herramienta);
        $fecha_registro = date('Y-m-d H:i:s');

        try {
            $result = HerramientaDiagnostico::newHerramientaDiagnostico($id_diagnostico, $id_ticket, $id_herramienta, $fecha_registro);

            if ($result) return '<script>swal("' . Constants::$REGISTER_NEW . '", "", "success");</script>';
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function addMaterialDiagnosis($id_diagnostico, $id_ticket, $id_material)
    {
        $id_diagnostico = parent::limpiarString($id_diagnostico);
        $id_ticket      = parent::limpiarString($id_ticket);
        $id_material = parent::limpiarString($id_material);
        $fecha_registro = date('Y-m-d H:i:s');

        try {
            $result = MaterialDiagnostico::newMaterialDiagnostico($id_diagnostico, $id_ticket, $id_material, $fecha_registro);

            if ($result) return '<script>swal("' . Constants::$REGISTER_NEW . '", "", "success");</script>';
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function addAssistantDiagnosis($id_diagnostico, $id_ticket, $id_ayudante)
    {
        $id_diagnostico = parent::limpiarString($id_diagnostico);
        $id_ticket      = parent::limpiarString($id_ticket);
        $id_ayudante = parent::limpiarString($id_ayudante);
        $fecha_registro = date('Y-m-d H:i:s');

        try {
            $result = AyudanteDiagnostico::newAyudanteDiagnostico($id_diagnostico, $id_ticket, $id_ayudante, $fecha_registro);

            if ($result) return '<script>swal("' . Constants::$REGISTER_NEW . '", "", "success");</script>';
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function deleteComponentDiagnosis($tabla, $campo, $id)
    {
        $tabla = parent::limpiarString($tabla);
        $campo = parent::limpiarString($campo);
        $id    = parent::limpiarString($id);

        try {
            $result = Diagnostico::deleteComponenteDiagnostico($tabla, $campo, $id);

            if ($result) {
                return '<script>swal("' . Constants::$REGISTER_DELETE . '", "", "success");</script>';
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getTableHerramientas($lstHerramientas)
    {
        if (basename($_SERVER['PHP_SELF']) == 'diagnosis.php') {
            $tableHtml = "";

            $modelResponse = $lstHerramientas;

            foreach ($modelResponse as $valor) {
                $tableHtml .= '<tr>';
                $tableHtml .= '<td>' . $valor->getId_herramienta_diagnostico() . '</td>';
                $tableHtml .= '<td>' . $valor->getHerramientaDTO()->getNombre() . '</td>';
                $tableHtml .= '<td>' . $valor->getHerramientaDTO()->getTipo()[1] . '</td>';
                $tableHtml .= '<td>' . $valor->getFecha_registro() . '</td>';
                $tableHtml .= '<td style="text-align:center;">' . Elements::crearBotonEliminarByTablaJs("HerramientaDiagnostico", "id_herramienta_diagnostico", $valor->getId_herramienta_diagnostico()) . '</td>';
                $tableHtml .= '</tr>';
            }
            return $tableHtml;
        }
    }

    public static function getTableMateriales($lstMateriales)
    {
        if (basename($_SERVER['PHP_SELF']) == 'diagnosis.php') {
            $tableHtml = "";

            $modelResponse = $lstMateriales;

            foreach ($modelResponse as $valor) {
                $tableHtml .= '<tr>';
                $tableHtml .= '<td>' . $valor->getId_material_diagnostico() . '</td>';
                $tableHtml .= '<td>' . $valor->getMaterialDTO()->getNombre() . '</td>';
                $tableHtml .= '<td>' . $valor->getFecha_registro() . '</td>';
                $tableHtml .= '<td style="text-align:center;">' . Elements::crearBotonEliminarByTablaJs("MaterialDiagnostico", "id_material_diagnostico", $valor->getId_material_diagnostico()) . '</td>';
                $tableHtml .= '</tr>';
            }
            return $tableHtml;
        }
    }

    public static function getTableAyudantes($lstAyudantes)
    {
        if (basename($_SERVER['PHP_SELF']) == 'diagnosis.php') {
            $tableHtml = "";

            $modelResponse = $lstAyudantes;

            foreach ($modelResponse as $valor) {
                $tableHtml .= '<tr>';
                $tableHtml .= '<td>' . $valor->getId_ayudante_diagnostico() . '</td>';
                $tableHtml .= '<td>' . $valor->getAyudanteDTO()->getNombre() . '</td>';
                $tableHtml .= '<td>' . $valor->getFecha_registro() . '</td>';
                $tableHtml .= '<td style="text-align:center;">' . Elements::crearBotonEliminarByTablaJs("AyudanteDiagnostico", "id_ayudante_diagnostico", $valor->getId_ayudante_diagnostico()) . '</td>';
                $tableHtml .= '</tr>';
            }
            return $tableHtml;
        }
    }

    public static function getBackButton($id_ticket)
    {
        if (basename($_SERVER['PHP_SELF']) == 'diagnosis.php') {
            try {
                $id_ticket = parent::limpiarString($id_ticket);
                return "ticket?ticket=".$id_ticket;
            } catch (\Exception $e) {
                throw new Exception($e->getMessage());
            }
        }
    }
}
