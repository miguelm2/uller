<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Solicitud.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Servicio.php';

class ServiceRequest extends System
{
    public static function newRequest($services)
    {
        //try {
            $id_usuario = $_SESSION['id'];
            $estado = parent::limpiarString(1);
            $fecha_registro = date('Y-m-d H:i:s');

            $result = Solicitud::newRequest($id_usuario, $estado, $fecha_registro);
            if ($result) {
                $lastRequest = Solicitud::getLastRequestByUser($id_usuario);
                foreach ($services as $serviceType => $serviceData) {
                    $id_equipo_tipo = 0;
                    switch ($serviceType) {
                        case 'cassette': {
                                $id_equipo_tipo = 1;
                                break;
                            }
                        case 'floor': {
                                $id_equipo_tipo = 2;
                                break;
                            }
                        case 'window': {
                                $id_equipo_tipo = 3;
                                break;
                            }
                        case 'split': {
                                $id_equipo_tipo = 4;
                                break;
                            }
                        case 'mini': {
                                $id_equipo_tipo = 5;
                                break;
                            }
                        case 'other': {
                                $id_equipo_tipo = 6;
                                break;
                            }
                    }
                    $responnse = self::newService($lastRequest->getId_solicitud(), $serviceData, $id_equipo_tipo);
                }
                if ($responnse) {
                    header('Location:resumeService?');
                }
            }
        //} catch (\Exception $e) {
            //throw new Exception($e->getMessage());
        //}
    }
    private static function newService($id_solicitud, $serviceData, $id_equipo_tipo)
    {
        foreach ($serviceData as $subService => $quantity) {
            $id_servicio_tipo = 0;
            switch ($subService) {
                case 'preventive': {
                        $id_servicio_tipo = 1;
                        break;
                    }
                case 'corrective': {
                        $id_servicio_tipo = 2;
                        break;
                    }
                case 'install': {
                        $id_servicio_tipo = 3;
                        break;
                    }
                case 'unistall': {
                        $id_servicio_tipo = 4;
                        break;
                    }
            }

            if ($quantity != 0) {
                $result = Servicio::newService($id_solicitud, $id_servicio_tipo, $id_equipo_tipo, $quantity, 1);
            }
        }
        return $result;
    }

    public static function setServiceUser($id_tipo, $nombre, $descripcion, $valor) {}

    public static function getRequest($id_solicitud)
    {
        try {
            $id_solicitud = parent::limpiarString($id_solicitud);
            $modelResponse = Solicitud::getRequest($id_solicitud);
            return $modelResponse;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function deleteRequest($id_solicitud)
    {
        try {
            $id_solicitud = parent::limpiarString($id_solicitud);
            $result = Solicitud::deleteRequest($id_solicitud);
            if ($result) {
                return '<script>swal("' . Constants::$REGISTER_DELETE . '", "", "success");</script>';
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getTableRequestByUser()
    {
        $tableHtml = "";
        $id_usuario = $_SESSION['id'];
        $modelResponse = Solicitud::listRequestByUser($id_usuario);

        foreach ($modelResponse as $valor) {
            $tableHtml .= '<tr>';
            $tableHtml .= '<td>' . $valor->getId_solicitud() . '</td>';
            $tableHtml .= '<td>' . $valor->getEstado() . '</td>';
            $tableHtml .= '<td>' . $valor->getFecha_registro() . '</td>';
            $tableHtml .= '</tr>';
        }
        return $tableHtml;
    }
}
