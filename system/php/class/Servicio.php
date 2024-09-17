<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/ServicioDTO.php';

class Servicio extends System
{
    public static function newService($id_solicitud, $id_servicio_tipo, $id_equipo_tipo, $cantidad, $estado, $fecha_registro)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO Servicio (id_solicitud, id_servicio_tipo, id_equipo_tipo, cantidad, fecha_registro) 
                                VALUES (:id_solicitud, :id_servicio_tipo, :id_equipo_tipo, :cantidad, :fecha_registro)");
        $stmt->bindParam(':id_solicitud', $id_solicitud);
        $stmt->bindParam(':id_servicio_tipo', $id_servicio_tipo);
        $stmt->bindParam(':id_equipo_tipo', $id_equipo_tipo);
        $stmt->bindParam(':cantidad', $cantidad);
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        return  $stmt->execute();
    }
    public static function setService($id_servicio, $cantidad)
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE Servicio 
                            SET cantidad = :cantidad
                            WHERE id_servicio :id_servicio");
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
            $servicioDTO->setCantidad($result['cantidad']);
            $servicioDTO->setFecha_registro($result['fecha_registro']);

            return $servicioDTO;
        } else {
            return false;
        }
    }
    public static function listServiceByRequest($id_solicitud)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Servicio WHERE id_solicitud = :id_solicitud");
        $stmt->bindParam(':id_solicitud', $id_solicitud);
        $stmt->execute();
        $modalResponse =  $stmt->fetchAll();
        $list = array();
        $cont = 0;

        foreach ($modalResponse as $result) {
            $servicioDTO = new ServicioDTO();
            $servicioDTO->setId_servicio($result['id_servicio']);
            $servicioDTO->setSolicitudDTO(Solicitud::getRequest($result['id_solicitud']));
            $servicioDTO->setTipoServicioDTO(TipoServicio::getTipoServicio($result['id_tipo_servicio']));
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