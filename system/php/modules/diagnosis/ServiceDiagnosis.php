<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Diagnostico.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Herramienta.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Material.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Tecnico.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/HerramientaDiagnostico.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/MaterialDiagnostico.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/AyudanteDiagnostico.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Ticket.php';

class ServiceDiagnosis extends System
{
    public static function newDiagnosis($id_ticket, $numero_horas, $numero_ayudantes, $descripcion)
    {
        $id_ticket        = parent::limpiarString($id_ticket);
        $numero_horas     = parent::limpiarString($numero_horas);
        $numero_ayudantes = parent::limpiarString($numero_ayudantes);
        $descripcion      = parent::limpiarString($descripcion);
        $fecha_registro   = date('Y-m-d H:i:s');

        try {
            $result = Diagnostico::newDiagnostico($id_ticket, $numero_horas, $numero_ayudantes, $descripcion, $fecha_registro);

            if ($result) {
                $id_diagnostico = Diagnostico::getLastDiagnostico();
                $estado         = Ticket::setEstadoTicket($id_ticket, 3);
                header('Location:diagnosis?diagnosis=' . $id_diagnostico . '&ticket=' . $id_ticket);
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function setDiagnosis($id_diagnostico, $numero_horas, $numero_ayudantes, $descripcion)
    {
        $id_diagnostico   = parent::limpiarString($id_diagnostico);
        $numero_horas     = parent::limpiarString($numero_horas);
        $numero_ayudantes = parent::limpiarString($numero_ayudantes);
        $descripcion      = parent::limpiarString($descripcion);

        try {
            $result = Diagnostico::setDiagnostico($id_diagnostico, $numero_horas, $numero_ayudantes, $descripcion);

            if ($result) return '<script>swal("' . Constants::$REGISTER_UPDATE . '", "", "success");</script>';
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function setPrecioDiagnosis($id_diagnostico, $id_ticket, $precio)
    {
        $id_diagnostico   = parent::limpiarString($id_diagnostico);
        $id_ticket        = parent::limpiarString($id_ticket);
        $precio           = parent::limpiarString($precio);

        try {
            $result = Diagnostico::setPrecioDiagnostico($id_diagnostico, $precio);

            if ($result) {
                Ticket::setEstadoTicket($id_ticket, 4);
                return '<script>swal("' . Constants::$REGISTER_UPDATE . '", "", "success");</script>';
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getDiagnosis($id_diagnostico)
    {
        $id_diagnostico = parent::limpiarString($id_diagnostico);

        try {
            if($_SESSION['tipo'] == 3){
                self::validatePermisoTecnico($id_diagnostico);
            }

            $modelResponse = Diagnostico::getDiagnosticoById($id_diagnostico);
            return $modelResponse;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    private static function validatePermisoTecnico($id_diagnostico)
    {
        try {
            $id_tecnico = $_SESSION['id'];
            $modelResponse = TecnicoTicket::getValidarTecnicoHasDiagnosis($id_diagnostico, $id_tecnico);
            if (!$modelResponse) header('Location:tickets');
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function addToolDiagnosis($id_diagnostico, $id_ticket, $id_herramienta, $cantidad)
    {
        $id_diagnostico = parent::limpiarString($id_diagnostico);
        $id_ticket      = parent::limpiarString($id_ticket);
        $id_herramienta = parent::limpiarString($id_herramienta);
        $cantidad       = parent::limpiarString($cantidad);
        $fecha_registro = date('Y-m-d H:i:s');

        try {
            $result = HerramientaDiagnostico::newHerramientaDiagnostico($id_diagnostico, $id_ticket, $id_herramienta, $cantidad, $fecha_registro);

            if ($result) return '<script>swal("' . Constants::$REGISTER_NEW . '", "", "success");</script>';
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function addMaterialDiagnosis($id_diagnostico, $id_ticket, $id_material, $cantidad, $unidad_medida)
    {
        $id_diagnostico = parent::limpiarString($id_diagnostico);
        $id_ticket      = parent::limpiarString($id_ticket);
        $id_material    = parent::limpiarString($id_material);
        $cantidad       = parent::limpiarString($cantidad);
        $unidad_medida  = parent::limpiarString($unidad_medida);
        $fecha_registro = date('Y-m-d H:i:s');

        try {
            $result = MaterialDiagnostico::newMaterialDiagnostico($id_diagnostico, $id_ticket, $id_material, $cantidad, $unidad_medida, $fecha_registro);

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

    public static function deleteDiagnosis($id_diagnostico, $id_ticket)
    {
        $id_diagnostico = parent::limpiarString($id_diagnostico);
        $id_ticket      = parent::limpiarString($id_ticket);

        try {
            $deleteHerramientas = HerramientaDiagnostico::deleteHerramientaByDiagnostico($id_diagnostico);
            $deleteMateriales   = MaterialDiagnostico::deleteMaterialByDiagnostico($id_diagnostico);
            $deleteDiagnostico  = Diagnostico::deleteDiagnostico($id_diagnostico);

            if ($deleteHerramientas && $deleteMateriales && $deleteDiagnostico) {
                header('Location:ticket?ticket=' . $id_ticket . '&delete');
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getTableHerramientas($lstHerramientas)
    {
        if (basename($_SERVER['PHP_SELF']) == 'diagnosis.php') {
            $tableHtml = "";
            $tipo_usuario = $_SESSION['tipo'];

            $modelResponse = $lstHerramientas;

            foreach ($modelResponse as $valor) {
                $tableHtml .= '<tr>';
                $tableHtml .= '<td>' . $valor->getId_herramienta_diagnostico() . '</td>';
                $tableHtml .= '<td>' . $valor->getHerramientaDTO()->getNombre() . '</td>';
                $tableHtml .= '<td>' . $valor->getHerramientaDTO()->getTipo()[1] . '</td>';
                $tableHtml .= '<td>' . $valor->getCantidad() . '</td>';
                $tableHtml .= '<td>' . $valor->getFecha_registro() . '</td>';
                if ($tipo_usuario == 3) {
                    $tableHtml .= '<td style="text-align:center;">' . Elements::crearBotonEliminarByTablaJs("HerramientaDiagnostico", "id_herramienta_diagnostico", $valor->getId_herramienta_diagnostico()) . '</td>';
                }
                $tableHtml .= '</tr>';
            }
            return $tableHtml;
        }
    }

    public static function getTableMateriales($lstMateriales)
    {
        if (basename($_SERVER['PHP_SELF']) == 'diagnosis.php') {
            $tableHtml = "";
            $tipo_usuario = $_SESSION['tipo'];

            $modelResponse = $lstMateriales;

            foreach ($modelResponse as $valor) {
                $tableHtml .= '<tr>';
                $tableHtml .= '<td>' . $valor->getId_material_diagnostico() . '</td>';
                $tableHtml .= '<td>' . $valor->getMaterialDTO()->getNombre() . '</td>';
                $tableHtml .= '<td>' . $valor->getCantidad() . '</td>';
                $tableHtml .= '<td>' . $valor->getUnidad_medida() . '</td>';
                $tableHtml .= '<td>' . $valor->getFecha_registro() . '</td>';
                if ($tipo_usuario == 3) {
                    $tableHtml .= '<td style="text-align:center;">' . Elements::crearBotonEliminarByTablaJs("MaterialDiagnostico", "id_material_diagnostico", $valor->getId_material_diagnostico()) . '</td>';
                }
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
                return "ticket?ticket=" . $id_ticket;
            } catch (\Exception $e) {
                throw new Exception($e->getMessage());
            }
        }
    }
}
