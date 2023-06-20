<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/TipoEquipo.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/EquipoTicket.php';

class ServiceEquipmentType extends System
{
    public static function newEquipmentType($id_usuario, $nombre, $marca, $modelo, $year_fabricacion, $serial_interior, $serial_exterior, $tipo_equipo, $capacidad_btuh, $voltaje_fases, $refrigerante, $inverter, $descripcion)
    {
        $id_usuario       = parent::limpiarString($id_usuario);
        $nombre           = parent::limpiarString($nombre);
        $marca            = parent::limpiarString($marca);
        $modelo           = parent::limpiarString($modelo);
        $year_fabricacion = parent::limpiarString($year_fabricacion);
        $serial_interior  = parent::limpiarString($serial_interior);
        $serial_exterior  = parent::limpiarString($serial_exterior);
        $tipo_equipo      = parent::limpiarString($tipo_equipo);
        $capacidad_btuh   = parent::limpiarString($capacidad_btuh);
        $voltaje_fases    = parent::limpiarString($voltaje_fases);
        $refrigerante     = parent::limpiarString($refrigerante);
        $inverter         = parent::limpiarString($inverter);
        $descripcion      = parent::limpiarString($descripcion);
        $fecha_registro   = date('Y-m-d H:i:s');

        try {
            $result = TipoEquipo::newTipoEquipo($id_usuario, $nombre, $marca, $modelo, $year_fabricacion, $serial_interior, $serial_exterior, $tipo_equipo, $capacidad_btuh, $voltaje_fases, $refrigerante, $inverter, $descripcion, $fecha_registro);

            if ($result) {
                return '<script>swal("' . Constants::$REGISTER_NEW . '", "", "success");</script>';
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function setEquipmentType($id_equipo, $nombre, $marca, $modelo, $year_fabricacion, $serial_interior, $serial_exterior, $tipo_equipo, $capacidad_btuh, $voltaje_fases, $refrigerante, $inverter, $descripcion)
    {
        $id_equipo        = parent::limpiarString($id_equipo);
        $nombre           = parent::limpiarString($nombre);
        $marca            = parent::limpiarString($marca);
        $modelo           = parent::limpiarString($modelo);
        $year_fabricacion = parent::limpiarString($year_fabricacion);
        $serial_interior  = parent::limpiarString($serial_interior);
        $serial_exterior  = parent::limpiarString($serial_exterior);
        $tipo_equipo      = parent::limpiarString($tipo_equipo);
        $capacidad_btuh   = parent::limpiarString($capacidad_btuh);
        $voltaje_fases    = parent::limpiarString($voltaje_fases);
        $refrigerante     = parent::limpiarString($refrigerante);
        $inverter         = parent::limpiarString($inverter);
        $descripcion      = parent::limpiarString($descripcion);

        try {
            $result = TipoEquipo::setTipoEquipo($id_equipo, $nombre, $marca, $modelo, $year_fabricacion, $serial_interior, $serial_exterior, $tipo_equipo, $capacidad_btuh, $voltaje_fases, $refrigerante, $inverter, $descripcion);

            if ($result) {
                return '<script>swal("' . Constants::$REGISTER_UPDATE . '", "", "success");</script>';
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getEquipmentType($id_equipo)
    {
        try {
            $id_equipo = parent::limpiarString($id_equipo);

            $modelResponse = TipoEquipo::getTipoEquipoById($id_equipo);
            return $modelResponse;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getValidateInverter($equipoDTO)
    {
        try {
            $listResponse = array();

            if ($equipoDTO->getInverter() == "Si") {
                $listResponse[0] = "checked";
                $listResponse[1] = "";
            } else {
                $listResponse[0] = "";
                $listResponse[1] = "checked";
            }

            return $listResponse;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function deleteEquipmentType($id_equipo, $id_usuario)
    {
        $id_equipo  = parent::limpiarString($id_equipo);
        $id_usuario = parent::limpiarString($id_usuario);

        try {
            $validateTicket = EquipoTicket::getValidateEquipoTicketByEquipo($id_equipo);

            if (!$validateTicket) {
                $result = TipoEquipo::deleteTipoEquipo($id_equipo);
                if ($result) {
                    return Elements::getAlertaRedireccionJs(Constants::$REGISTER_DELETE, "success", "user", $id_usuario);
                }
            } else {
                return '<script>swal("El equipo no se puede eliminar", "Existen servicios asociados al equipo", "warning");</script>';
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function deleteEquipmentTypeUser($id_equipo)
    {
        $id_equipo  = parent::limpiarString($id_equipo);
        try {
            $validateTicket = EquipoTicket::getValidateEquipoTicketByEquipo($id_equipo);

            if (!$validateTicket) {
                $result = TipoEquipo::deleteTipoEquipo($id_equipo);
                if ($result) {
                    return Elements::getAlertaRedireccionNotValueJs(Constants::$REGISTER_DELETE, "success", "equipments");
                }
            } else {
                return '<script>swal("El equipo no se puede eliminar", "Existen servicios asociados al equipo", "warning");</script>';
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }


    public static function getTableEquipmentType()
    {
        if (basename($_SERVER['PHP_SELF']) == 'equipments.php' && $_SESSION['tipo'] == 1) {
            $tableHtml = "";
            $id_usuario = $_SESSION['id'];
            $item = 1;

            $modelResponse = TipoEquipo::listTipoEquipoByUser($id_usuario);

            foreach ($modelResponse as $valor) {
                $tableHtml .= '<tr>';
                $tableHtml .= '<td>' . $item . '</td>';
                $tableHtml .= '<td>' . $valor->getNombre() . '</td>';
                $tableHtml .= '<td>' . $valor->getMarca() . '</td>';
                $tableHtml .= '<td>' . $valor->getModelo() . '</td>';
                $tableHtml .= '<td>' . $valor->getTipo_equipo() . '</td>';
                $tableHtml .= '<td style="text-align:center;">' . Elements::crearBotonVer("equipment", $valor->getId_tipo()) . '</td>';
                $tableHtml .= '</tr>';

                $item++;
            }
            return $tableHtml;
        }
    }

    public static function getSelectEquipmentType()
    {
        if (basename($_SERVER['PHP_SELF']) == 'tickets.php' || basename($_SERVER['PHP_SELF']) == 'ticket.php') {
            $tableHtml = "";

            $modelResponse = TipoEquipo::listTipoEquipo();

            foreach ($modelResponse as $valor) {
                $tableHtml .= '<option value="' . $valor->getId_tipo() . '">' . $valor->getNombre() . '</option>';
            }
            return $tableHtml;
        }
    }

    public static function getBackButton($link, $value)
    {
        try {
            $value = parent::limpiarString($value);

            return $link . "?" . $link . "=" . $value;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
