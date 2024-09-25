<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Equipo.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/EquipoTicket.php';

class ServiceEquipment extends System
{
    public static function newEquipment(
        $id_usuario,
        $nombre,
        $marca,
        $modelo,
        $year_fabricacion,
        $serial_interior,
        $serial_exterior,
        $id_equipo_tipo,
        $capacidad_btuh,
        $conexion_electrica,
        $refrigerante,
        $inverter,
        $descripcion,
        $fecha_instalacion
    ) {
        try {

            $id_usuario         = parent::limpiarString($id_usuario);
            $nombre             = parent::limpiarString($nombre);
            $marca              = parent::limpiarString($marca);
            $modelo             = parent::limpiarString($modelo);
            $year_fabricacion   = parent::limpiarString($year_fabricacion);
            $serial_interior    = parent::limpiarString($serial_interior);
            $serial_exterior    = parent::limpiarString($serial_exterior);
            $id_equipo_tipo     = parent::limpiarString($id_equipo_tipo);
            $capacidad_btuh     = parent::limpiarString($capacidad_btuh);
            $conexion_electrica = parent::limpiarString($conexion_electrica);
            $refrigerante       = parent::limpiarString($refrigerante);
            $inverter           = parent::limpiarString($inverter);
            $descripcion        = parent::limpiarString($descripcion);
            $fecha_instalacion  = parent::limpiarString($fecha_instalacion);
            $fecha_registro     = date('Y-m-d H:i:s');

            $placa_interior    = self::validateImageMaintenance("placa_interior",  "placa_interior", Path::$DIR_IMAGE_EQUIPMENT);
            $placa_exterior  = self::validateImageMaintenance("placa_exterior",  "placa_exterior", Path::$DIR_IMAGE_EQUIPMENT);
            $result = Equipo::newEquipmet(
                $id_usuario,
                $nombre,
                $marca,
                $modelo,
                $year_fabricacion,
                $serial_interior,
                $serial_exterior,
                $id_equipo_tipo,
                $capacidad_btuh,
                $conexion_electrica,
                $refrigerante,
                $inverter,
                $descripcion,
                $fecha_instalacion,
                $placa_interior,
                $placa_exterior,
                $fecha_registro
            );

            if ($result) {
                return '<script>swal("' . Constants::$REGISTER_NEW . '", "", "success");</script>';
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    private static function validateImageMaintenance($nombreFile, $tipo, $ruta)
    {
        $source         = $_FILES[$nombreFile]['tmp_name'];
        $filename       = $_FILES[$nombreFile]['name'];
        $fileSize       = $_FILES[$nombreFile]['size'];
        $imagen = '';

        if ($fileSize > 100 && $filename != '') {
            $dirImagen = $_SERVER['DOCUMENT_ROOT'] . $ruta;

            if (!file_exists($dirImagen)) mkdir($dirImagen, 0777, true);

            $dir         = opendir($dirImagen); //Abrimos el directorio de destino
            $trozo1      = explode(".", $filename);
            $imagen      = $tipo . '_'  . date('Y-m-d') . '_' . rand() . '.' . end($trozo1);
            $target_path = $dirImagen . $imagen; //Indicamos la ruta de destino, así como el nombre del archivo
            move_uploaded_file($source, $target_path);
            closedir($dir);
        }

        return $imagen;
    }

    public static function setEquipment($id_equipo, $nombre, $marca, $modelo, $year_fabricacion, $serial_interior, $serial_exterior, $capacidad_btuh, $conexion_electrica, $refrigerante, $inverter, $descripcion, $fecha_instalacion)
    {
        $id_equipo          = parent::limpiarString($id_equipo);
        $nombre             = parent::limpiarString($nombre);
        $marca              = parent::limpiarString($marca);
        $modelo             = parent::limpiarString($modelo);
        $year_fabricacion   = parent::limpiarString($year_fabricacion);
        $serial_interior    = parent::limpiarString($serial_interior);
        $serial_exterior    = parent::limpiarString($serial_exterior);
        $capacidad_btuh     = parent::limpiarString($capacidad_btuh);
        $conexion_electrica = parent::limpiarString($conexion_electrica);
        $refrigerante       = parent::limpiarString($refrigerante);
        $inverter           = parent::limpiarString($inverter);
        $descripcion        = parent::limpiarString($descripcion);
        $fecha_instalacion  = parent::limpiarString($fecha_instalacion);

        try {
            $result = Equipo::setEquipment(
                $id_equipo,
                $nombre,
                $marca,
                $modelo,
                $year_fabricacion,
                $serial_interior,
                $serial_exterior,
                $capacidad_btuh,
                $conexion_electrica,
                $refrigerante,
                $inverter,
                $descripcion,
                $fecha_instalacion
            );

            if ($result) {
                return '<script>swal("' . Constants::$REGISTER_UPDATE . '", "", "success");</script>';
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function setImagenInnerPlate($id_equipo)
    {
        try {
            $id_equipo        = parent::limpiarString($id_equipo);
            $placa_interior    = self::validateImageMaintenance("placa_interior",  "placa_interior", Path::$DIR_IMAGE_EQUIPMENT);
            $result = Equipo::setEquipmentImagenInnerPlate($id_equipo, $placa_interior);
            if ($result) {
                return '<script>swal("' . Constants::$IMAGE_UPDATE . '", "", "success");</script>';
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function setImagenExteriorPlate($id_equipo)
    {
        try {
            $id_equipo        = parent::limpiarString($id_equipo);
            $placa_exterior    = self::validateImageMaintenance("placa_exterior",  "placa_exterior", Path::$DIR_IMAGE_EQUIPMENT);
            $result = Equipo::setEquipmentImagenExteriorPlate($id_equipo, $placa_exterior);
            if ($result) {
                return '<script>swal("' . Constants::$IMAGE_UPDATE . '", "", "success");</script>';
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getEquipment($id_equipo)
    {
        try {
            $id_equipo = parent::limpiarString($id_equipo);

            $modelResponse = Equipo::getEquipmet($id_equipo);
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

    public static function deleteEquipment($id_equipo, $id_usuario)
    {
        $id_equipo  = parent::limpiarString($id_equipo);
        $id_usuario = parent::limpiarString($id_usuario);

        try {

            $result = Equipo::deleteEquipment($id_equipo);
            if ($result) {
                return Elements::getAlertaRedireccionJs(Constants::$REGISTER_DELETE, "success", "user", $id_usuario);
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function deleteEquipmentUser($id_equipo)
    {
        $id_equipo  = parent::limpiarString($id_equipo);
        try {

            $result = Equipo::deleteEquipment($id_equipo);
            if ($result) {
                return Elements::getAlertaRedireccionNotValueJs(Constants::$REGISTER_DELETE, "success", "equipments");
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }


    public static function getTableEquipment($id_servicio)
    {
        if (basename($_SERVER['PHP_SELF']) == 'service.php') {
            $id_servicio = parent::limpiarString($id_servicio);
            $tableHtml = "";
            $servicioDTO = Servicio::getService($id_servicio);
            $id_usuario = $servicioDTO->getSolicitudDTO()->getUsuarioDTO()->getId_usuario();
            $item = 1;

            $modelResponse = Equipo::listEquipmentByUser($id_usuario);

            foreach ($modelResponse as $valor) {
                $tableHtml .= '<tr>';
                $tableHtml .= '<td>' . $item . '</td>';
                $tableHtml .= '<td>' . $valor->getNombre() . '</td>';
                $tableHtml .= '<td>' . $valor->getMarca() . '</td>';
                $tableHtml .= '<td>' . $valor->getModelo() . '</td>';
                $tableHtml .= '<td>' . $valor->getEquipoTipoDTO()->getNombre() . '</td>';
                $tableHtml .= '<td style="text-align:center;">' . Elements::crearBotonEditar("equip", $valor->getId_equipo()) .
                    Elements::crearBotonVerTwoLink("service_inform", $id_servicio, "equipment", $valor->getId_equipo()) . '</td>';
                $tableHtml .= '</tr>';

                $item++;
            }
            return $tableHtml;
        }
    }

    public static function getSelectEquipment()
    {
        if (basename($_SERVER['PHP_SELF']) == 'tickets.php' || basename($_SERVER['PHP_SELF']) == 'ticket.php') {
            $tableHtml = "";

            $modelResponse = Equipo::listEquiptment();

            foreach ($modelResponse as $valor) {
                $tableHtml .= '<option value="' . $valor->getId_equipo() . '">' . $valor->getNombre() . '</option>';
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
