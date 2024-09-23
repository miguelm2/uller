<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Solicitud.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Servicio.php';

class ServiceRequest extends System
{
    public static function newRequest($services)
    {
        try {
            $id_usuario = $_SESSION['id'];
            $estado = parent::limpiarString(1);
            $fecha_registro = date('Y-m-d H:i:s');

            $result = Solicitud::newRequest($id_usuario, $estado, $fecha_registro);
            if ($result) {
                $lastRequest = Solicitud::getLastRequestByUser($id_usuario);
                foreach ($services as $serviceType => $serviceData) {
                    $id_equipo_tipo = 0;
                    switch ($serviceType) {
                        case 'mini': {
                                $id_equipo_tipo = 1;
                                break;
                            }
                        case 'split': {
                                $id_equipo_tipo = 2;
                                break;
                            }
                        case 'cassette': {
                                $id_equipo_tipo = 3;
                                break;
                            }
                        case 'floor': {
                                $id_equipo_tipo = 4;
                                break;
                            }
                        case 'window': {
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
                    header('Location:resumeService?request=' . $lastRequest->getId_solicitud());
                }
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function newRequestAdmin($services, $valor, $id_usuario, $id_tecnico, $fecha)
    {
        try {
            $id_usuario     = parent::limpiarString($id_usuario);
            $id_tecnico     = parent::limpiarString($id_tecnico);
            $valor          = parent::limpiarString($valor);
            $fecha          = parent::limpiarString($fecha);
            $estado         = parent::limpiarString(2);
            $fecha_registro = date('Y-m-d H:i:s');

            $result = Solicitud::newRequestAdmin($id_usuario, $id_tecnico, $valor, $fecha,  $estado, $fecha_registro);
            if ($result) {
                $lastRequest = Solicitud::getLastRequestByUser($id_usuario);
                foreach ($services as $serviceType => $serviceData) {
                    $id_equipo_tipo = 0;
                    switch ($serviceType) {
                        case 'mini': {
                                $id_equipo_tipo = 1;
                                break;
                            }
                        case 'split': {
                                $id_equipo_tipo = 2;
                                break;
                            }
                        case 'cassette': {
                                $id_equipo_tipo = 3;
                                break;
                            }
                        case 'floor': {
                                $id_equipo_tipo = 4;
                                break;
                            }
                        case 'window': {
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
                    header('Location:resumeService?request=' . $lastRequest->getId_solicitud());
                }
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    private static function newService($id_solicitud, $serviceData, $id_equipo_tipo)
    {
        $result = false;
        foreach ($serviceData as $subService => $quantity) {
            $fecha_registro = date('Y-m-d H:i:s');
            $id_servicio_tipo = 0;
            switch ($subService) {
                case 'preventive': {
                        $id_servicio_tipo = 3;
                        break;
                    }
                case 'corrective': {
                        $id_servicio_tipo = 4;
                        break;
                    }
                case 'install': {
                        $id_servicio_tipo = 6;
                        break;
                    }
                case 'uninstall': {
                        $id_servicio_tipo = 7;
                        break;
                    }
            }
            $result = Servicio::newService($id_solicitud, $id_servicio_tipo, $id_equipo_tipo, $quantity, $fecha_registro);
        }
        return $result;
    }
    public static function getRequest($id_solicitud)
    {
        try {
            $id_solicitud = parent::limpiarString($id_solicitud);
            $solicitudDTO = Solicitud::getRequest($id_solicitud);
            return $solicitudDTO;
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
            $style = self::getColorByEstate($valor->getEstado()[0]);
            $tableHtml .= '<tr>';
            $tableHtml .= '<td>' . $valor->getId_solicitud() . '</td>';
            $tableHtml .= '<td>' . $valor->getUsuarioDTO()->getNombre() . '</td>';
            $tableHtml .= '<td><small class="alert alert-' . $style . ' p-1">' . $valor->getEstado()[1] . '</small></td>';
            $tableHtml .= '<td>' . $valor->getFecha_registro() . '</td>';
            $tableHtml .= '<td>' . Elements::crearBotonVer("request", $valor->getId_solicitud()) . '</td>';
            $tableHtml .= '</tr>';
        }
        return $tableHtml;
    }
    public static function getTableRequest()
    {
        try {
            $tableHtml = "";
            $modelResponse = Solicitud::listRequest();

            foreach ($modelResponse as $valor) {
                $style = self::getColorByEstate($valor->getEstado()[0]);
                $tableHtml .= '<tr>';
                $tableHtml .= '<td>' . $valor->getId_solicitud() . '</td>';
                $tableHtml .= '<td>' . $valor->getUsuarioDTO()->getNombre() . '</td>';
                $tableHtml .= '<td><small class="alert alert-' . $style . ' p-1">' . $valor->getEstado()[1] . '</small></td>';
                $tableHtml .= '<td>' . $valor->getFecha_registro() . '</td>';
                $tableHtml .= '<td>' . Elements::crearBotonVer("request", $valor->getId_solicitud()) . '</td>';
                $tableHtml .= '</tr>';
            }
            return $tableHtml;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function getCardRequestTecnicias()
    {
        try {
            $html = '';
            $id_tecnico = $_SESSION['id'];
            $modelResponse = Solicitud::listRequestEstateByTecnico($id_tecnico);
            if($modelResponse){
                foreach ($modelResponse as $valor) {
                    $html .= Elements::getCardTechnical(
                        $valor->getUsuarioDTO()->getNombre(),
                        $valor->getUsuarioDTO()->getDireccion(),
                        $valor->getId_solicitud(),
                        $valor->getFecha()
                    );
                }
            }else{
                return '<div class="mt-4"><h5>No hay solicitudes en este momento</h5></div>';
            }
            
            return $html;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    public static function setRequest($id_tecnico, $estado, $valor, $fecha, $id_solicitud)
    {
        try {
            $id_tecnico     = parent::limpiarString($id_tecnico);
            $valor          = parent::limpiarString($valor);
            $fecha          = parent::limpiarString($fecha);
            $estado         = parent::limpiarString($estado);
            $id_solicitud   = parent::limpiarString($id_solicitud);
            if ($id_tecnico && $estado != 2) {
                $estado = 2;
            }
            return Solicitud::setRequest($id_solicitud, $id_tecnico, $fecha, $estado, $valor);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    private static function getColorByEstate($estado)
    {
        switch ($estado) {
            case 1: {
                    return 'primary';
                }
            case 2: {
                    return 'success';
                }
            case 3: {
                    return 'warning';
                }
            case 4: {
                    return 'info';
                }
            case 5: {
                    return 'danger';
                }
        }
    }
}
