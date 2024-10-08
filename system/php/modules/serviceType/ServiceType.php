<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/TipoServicio.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Ticket.php';

class ServiceType extends System
{
    public static function newServiceType($nombre, $descripcion, $valor)
    {
        $nombre         = parent::limpiarString($nombre);
        $descripcion    = parent::limpiarString($descripcion);
        $valor          = parent::limpiarString($valor);
        $fecha_registro = date('Y-m-d H:i:s');

        try {
            $result = TipoServicio::newTipoServicio($nombre, $descripcion, $valor, $fecha_registro);

            if ($result) {
                return '<script>swal("' . Constants::$REGISTER_NEW . '", "", "success");</script>';
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function setServiceType($id_tipo, $nombre, $descripcion, $valor)
    {
        $id_tipo        = parent::limpiarString($id_tipo);
        $nombre         = parent::limpiarString($nombre);
        $descripcion    = parent::limpiarString($descripcion);
        $valor          = parent::LimpiarString($valor);

        try {
            $result = TipoServicio::setTipoServicio($id_tipo, $nombre, $descripcion, $valor);

            if ($result) {
                return '<script>swal("' . Constants::$REGISTER_UPDATE . '", "", "success");</script>';
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getServiceType($id_tipo)
    {
        $id_tipo = parent::limpiarString($id_tipo);

        try {
            $modelResponse = TipoServicio::getTipoServicio($id_tipo);
            return json_encode($modelResponse);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function deleteServiceType($id_tipo)
    {
        $id_tipo = parent::limpiarString($id_tipo);

        try {
            $validateService = Ticket::getValidateTicketByTipoServicio($id_tipo);
            if (!$validateService) {
                $result = TipoServicio::deleteTipoServicio($id_tipo);
                if ($result) {
                    return '<script>swal("' . Constants::$REGISTER_DELETE . '", "", "success");</script>';
                }
            }else{
                return '<script>swal("El tipo de servicio no se puede eliminar", "Existen servicios asociados con este registro", "warning");</script>';
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }


    public static function getTableServiceType()
    {
        if (basename($_SERVER['PHP_SELF']) == 'serviceTypes.php') {
            $tableHtml = "";

            $modelResponse = TipoServicio::listTipoServicio();

            foreach ($modelResponse as $valor) {
                $tableHtml .= '<tr>';
                $tableHtml .= '<td>' . $valor->getId_tipo() . '</td>';
                $tableHtml .= '<td>' . $valor->getNombre() . '</td>';
                $tableHtml .= '<td>' . $valor->getDescripcion() . '</td>';
                $tableHtml .= '<td>' . $valor->getValor() .'</td>';
                $tableHtml .= '<td style="text-align:center;">' . Elements::crearBotonEditarJs($valor->getId_tipo()) . '</td>';
                $tableHtml .= '<td style="text-align:center;">' . Elements::crearBotonEliminarJs($valor->getId_tipo()) . '</td>';
                $tableHtml .= '</tr>';
            }
            return $tableHtml;
        }
    }

    public static function getSelectServiceType()
    {
        if (basename($_SERVER['PHP_SELF']) == 'tickets.php' || basename($_SERVER['PHP_SELF']) == 'ticket.php') {
            $tableHtml = "";

            $modelResponse = TipoServicio::listTipoServicio();

            foreach ($modelResponse as $valor) {
                $tableHtml .= '<option value="' . $valor->getId_tipo() . '">' . $valor->getNombre() . '</option>';
            }
            return $tableHtml;
        }
    }
}
