<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/ServicioDTO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Solicitud.php';

class Servicio extends System
{
    public static function newService($id_solicitud, $id_tipo_servicio, $id_equipo_tipo, $cantidad, $fecha_registro)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO Servicio (id_solicitud, id_tipo_servicio, id_equipo_tipo, cantidad, fecha_registro) 
                                VALUES (:id_solicitud, :id_tipo_servicio, :id_equipo_tipo, :cantidad, :fecha_registro)");
        $stmt->bindParam(':id_solicitud', $id_solicitud);
        $stmt->bindParam(':id_tipo_servicio', $id_tipo_servicio);
        $stmt->bindParam(':id_equipo_tipo', $id_equipo_tipo);
        $stmt->bindParam(':cantidad', $cantidad);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        return  $stmt->execute();
    }
    public static function setService($id_servicio, $cantidad)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE Servicio 
                            SET cantidad = :cantidad
                            WHERE id_servicio = :id_servicio");
        $stmt->bindParam(':id_servicio', $id_servicio);
        $stmt->bindParam(':cantidad', $cantidad);
        return  $stmt->execute();
    }
    public static function getService($id_servicio)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Servicio WHERE id_servicio = :id_servicio");
        $stmt->bindParam(':id_servicio', $id_servicio);
        $stmt->execute();
        $result =  $stmt->fetch();

        if ($result) {
            $servicioDTO = new ServicioDTO();
            $servicioDTO->setId_servicio($result['id_servicio']);
            $servicioDTO->setSolicitudDTO(Solicitud::getRequest($result['id_solicitud']));
            $servicioDTO->setTipoServicioDTO(TipoServicio::getTipoServicio($result['id_tipo_servicio']));
            $servicioDTO->setEquipoTipoDTO(EquipoTipo::getEquipmentType($result['id_equipo_tipo']));
            $servicioDTO->setCantidad($result['cantidad']);
            $servicioDTO->setFecha_registro($result['fecha_registro']);

            return $servicioDTO;
        } else {
            return false;
        }
    }
    public static function listServiceByRequest($id_solicitud)
    {
        $dbh = parent::Conexion();
        $stmt = $dbh->prepare("SELECT s.*, e.nombre AS equipo_nombre 
                        FROM Servicio s,
                            EquipoTipo e 
                        WHERE s.id_solicitud = :id_solicitud
                        AND s.id_equipo_tipo = e.id_equipo_tipo");
        $stmt->bindParam(':id_solicitud', $id_solicitud);
        $stmt->execute();
        $modalResponse = $stmt->fetchAll();

        $list = array();

        foreach ($modalResponse as $result) {
            $servicioDTO = new ServicioDTO();
            $servicioDTO->setId_servicio($result['id_servicio']);
            $servicioDTO->setSolicitudDTO(Solicitud::getRequest($result['id_solicitud']));
            $servicioDTO->setTipoServicioDTO(TipoServicio::getTipoServicio($result['id_tipo_servicio']));
            $servicioDTO->setEquipoTipoDTO(EquipoTipo::getEquipmentType($result['id_equipo_tipo']));
            $servicioDTO->setCantidad($result['cantidad']);
            $servicioDTO->setFecha_registro($result['fecha_registro']);

            $list[$result['equipo_nombre']][] = $servicioDTO;
        }

        return $list;
    }
    public static function listServiceByRequestOnly($id_solicitud)
    {
        $dbh = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * 
                        FROM Servicio 
                        WHERE id_solicitud = :id_solicitud");
        $stmt->bindParam(':id_solicitud', $id_solicitud);
        $stmt->execute();
        $modalResponse = $stmt->fetchAll();

        $list = array();
        $cont = 0;

        foreach ($modalResponse as $result) {
            $servicioDTO = new ServicioDTO();
            $servicioDTO->setId_servicio($result['id_servicio']);
            $servicioDTO->setSolicitudDTO(Solicitud::getRequest($result['id_solicitud']));
            $servicioDTO->setTipoServicioDTO(TipoServicio::getTipoServicio($result['id_tipo_servicio']));
            $servicioDTO->setEquipoTipoDTO(EquipoTipo::getEquipmentType($result['id_equipo_tipo']));
            $servicioDTO->setCantidad($result['cantidad']);
            $servicioDTO->setFecha_registro($result['fecha_registro']);

            $list[$cont] = $servicioDTO;
            $cont++;
        }

        return $list;
    }


    public static function deleteService($id_servicio)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("DELETE FROM Servicio WHERE id_servicio = :id_servicio");
        $stmt->bindParam(':id_servicio', $id_servicio);
        return  $stmt->execute();
    }
}
