<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/EquipoDTO.php';

class Equipo extends System
{
    public static function newEquipmet(
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
        $imagen_placa_interior,
        $imagen_placa_exterior,
        $fecha_registro
    ) {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO Equipo (id_usuario, nombre, marca, modelo, year_fabricacion, serial_interior, serial_exterior, 
                            id_equipo_tipo, capacidad_btuh, conexion_electrica, refrigerante, inverter, descripcion, fecha_instalacion
                            imagen_placa_interior, imagen_placa_exterior, fecha_registro) 
                                VALUES (:id_usuario, :nombre, :marca, :modelo, :year_fabricacion, :serial_interior, :serial_exterior, 
                                :id_equipo_tipo, :capacidad_btuh, :conexion_electrica, :refrigerante, :inverter, :descripcion, 
                                :fecha_instalacion, :imagen_placa_interior, :imagen_placa_exterior, :fecha_registro)");
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':marca', $marca);
        $stmt->bindParam(':modelo', $modelo);
        $stmt->bindParam(':year_fabricacion', $year_fabricacion);
        $stmt->bindParam(':serial_interior', $serial_interior);
        $stmt->bindParam(':serial_exterior', $serial_exterior);
        $stmt->bindParam(':id_equipo_tipo', $id_equipo_tipo);
        $stmt->bindParam(':capacidad_btuh', $capacidad_btuh);
        $stmt->bindParam(':conexion_electrica', $conexion_electrica);
        $stmt->bindParam(':refrigerante', $refrigerante);
        $stmt->bindParam(':inverter', $inverter);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':fecha_instalacion', $fecha_instalacion);
        $stmt->bindParam(':imagen_placa_interior', $imagen_placa_interior);
        $stmt->bindParam(':imagen_placa_exterior', $imagen_placa_exterior);
        $stmt->bindParam(':fecha_registro', $fecha_registro);
        return  $stmt->execute();
    }

    public static function setEquipment(
        $id_equipo,
        $nombre,
        $marca,
        $modelo,
        $year_fabricacion,
        $serial_interior,
        $serial_exterior,
        $capacidad_btuh,
        $voltaje_fases,
        $refrigerante,
        $inverter,
        $descripcion,
        $fecha_instalacion
    ) {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE Equipo 
                            SET nombre = :nombre, marca = :marca, modelo = :modelo, year_fabricacion = :year_fabricacion, serial_interior = :serial_interior,  
                            serial_exterior = :serial_exterior, capacidad_btuh = :capacidad_btuh, voltaje_fases = :voltaje_fases,
                            refrigerante = :refrigerante, inverter = :inverter, descripcion = :descripcion, fecha_instalacion = :fecha_instalacion
                            WHERE id_equipo = :id_equipo");
        $stmt->bindParam(':id_equipo', $id_equipo);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':marca', $marca);
        $stmt->bindParam(':modelo', $modelo);
        $stmt->bindParam(':year_fabricacion', $year_fabricacion);
        $stmt->bindParam(':serial_interior', $serial_interior);
        $stmt->bindParam(':serial_exterior', $serial_exterior);
        $stmt->bindParam(':capacidad_btuh', $capacidad_btuh);
        $stmt->bindParam(':voltaje_fases', $voltaje_fases);
        $stmt->bindParam(':refrigerante', $refrigerante);
        $stmt->bindParam(':inverter', $inverter);
        $stmt->bindParam(':descripcion', $descripcion);
        return  $stmt->execute();
    }
    public static function setEquipmentImagenInnerPlate($id_equipo, $imagen_placa_interior)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE Equipo 
                            SET imagen_placa_interior = :imagen_placa_interior
                            WHERE id_equipo = :id_equipo");
        $stmt->bindParam(':id_equipo', $id_equipo);
        $stmt->bindParam(':imagen_placa_interior', $imagen_placa_interior);
        return  $stmt->execute();
    }
    public static function setEquipmentImagenExteriorPlate($id_equipo, $imagen_placa_exterior)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE Equipo 
                            SET imagen_placa_exterior = :imagen_placa_exterior
                            WHERE id_equipo = :id_equipo");
        $stmt->bindParam(':id_equipo', $id_equipo);
        $stmt->bindParam(':imagen_placa_exterior', $imagen_placa_exterior);
        return  $stmt->execute();
    }
    public static function getEquipmet($id_equipo)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Equipo WHERE id_equipo = :id_equipo");
        $stmt->bindParam(':id_equipo', $id_equipo);
        $stmt->execute();
        $result =  $stmt->fetch();
        if ($result) {
            $equipoDTO = new EquipoDTO();
            $equipoDTO->setId_equipo($result['id_equipo']);
            $equipoDTO->setUsuarioDTO(Usuario::getUserById($result['id_usuario']));
            $equipoDTO->setNombre($result['nombre']);
            $equipoDTO->setMarca($result['marca']);
            $equipoDTO->setModelo($result['modelo']);
            $equipoDTO->setYear_fabricacion($result['year_fabricacion']);
            $equipoDTO->setSerial_interior($result['serial_interior']);
            $equipoDTO->setSerial_exterior($result['serial_exterior']);
            $equipoDTO->setEquipoTipoDTO(EquipoTipo::getEquipmentType($result['id_equipo_tipo']));
            $equipoDTO->setCapacidad_btuh($result['capacidad_btuh']);
            $equipoDTO->setConexion_electrica($result['conexion_electrica']);
            $equipoDTO->setRefrigerante($result['refrigerante']);
            $equipoDTO->setInverter($result['inverter']);
            $equipoDTO->setDescripcion($result['descripcion']);
            $equipoDTO->setImagen_placa_interior($result['imagen_placa_interior']);
            $equipoDTO->setImagen_placa_exterior($result['imagen_placa_exterior']);
            $equipoDTO->setFecha_registro($result['fecha_registro']);

            return $equipoDTO;
        }
        return null;
    }
    public static function listEquiptment()
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Equipo");
        $stmt->execute();
        $modelResponse = $stmt->fetchAll();
        $list = array();
        $cont = 0;
        foreach ($modelResponse as $result) {
            $equipoDTO = new EquipoDTO();
            $equipoDTO->setId_equipo($result['id_equipo']);
            $equipoDTO->setUsuarioDTO(Usuario::getUserById($result['id_usuario']));
            $equipoDTO->setNombre($result['nombre']);
            $equipoDTO->setMarca($result['marca']);
            $equipoDTO->setModelo($result['modelo']);
            $equipoDTO->setYear_fabricacion($result['year_fabricacion']);
            $equipoDTO->setSerial_interior($result['serial_interior']);
            $equipoDTO->setSerial_exterior($result['serial_exterior']);
            $equipoDTO->setEquipoTipoDTO(EquipoTipo::getEquipmentType($result['id_equipo_tipo']));
            $equipoDTO->setCapacidad_btuh($result['capacidad_btuh']);
            $equipoDTO->setConexion_electrica($result['conexion_electrica']);
            $equipoDTO->setRefrigerante($result['refrigerante']);
            $equipoDTO->setInverter($result['inverter']);
            $equipoDTO->setDescripcion($result['descripcion']);
            $equipoDTO->setImagen_placa_interior($result['imagen_placa_interior']);
            $equipoDTO->setImagen_placa_exterior($result['imagen_placa_exterior']);
            $equipoDTO->setFecha_registro($result['fecha_registro']);
            $list[$cont] = $equipoDTO;
            $cont++;
        }
        return $list;
    }

    public static function listEquipmentByUser($id_usuario)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Equipo WHERE id_usuario = :id_usuario");
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->execute();
        $modelResponse = $stmt->fetchAll();
        $list = array();
        $cont = 0;
        foreach ($modelResponse as $result) {
            $equipoDTO = new EquipoDTO();
            $equipoDTO->setId_equipo($result['id_equipo']);
            $equipoDTO->setUsuarioDTO(Usuario::getUserById($result['id_usuario']));
            $equipoDTO->setNombre($result['nombre']);
            $equipoDTO->setMarca($result['marca']);
            $equipoDTO->setModelo($result['modelo']);
            $equipoDTO->setYear_fabricacion($result['year_fabricacion']);
            $equipoDTO->setSerial_interior($result['serial_interior']);
            $equipoDTO->setSerial_exterior($result['serial_exterior']);
            $equipoDTO->setEquipoTipoDTO(EquipoTipo::getEquipmentType($result['id_equipo_tipo']));
            $equipoDTO->setCapacidad_btuh($result['capacidad_btuh']);
            $equipoDTO->setConexion_electrica($result['conexion_electrica']);
            $equipoDTO->setRefrigerante($result['refrigerante']);
            $equipoDTO->setInverter($result['inverter']);
            $equipoDTO->setDescripcion($result['descripcion']);
            $equipoDTO->setImagen_placa_interior($result['imagen_placa_interior']);
            $equipoDTO->setImagen_placa_exterior($result['imagen_placa_exterior']);
            $equipoDTO->setFecha_registro($result['fecha_registro']);
            $list[$cont] = $equipoDTO;
            $cont++;
        }
        return $list;
    }
    public static function deleteEquipment($id_equipo)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("DELETE FROM Equipo WHERE id_equipo = :id_equipo");
        $stmt->bindParam(':id_equipo', $id_equipo);
        return  $stmt->execute();
    }

    public static function deleteEquipmentByUser($id_usuario)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("DELETE FROM Equipo WHERE id_usuario = :id_usuario");
        $stmt->bindParam(':id_usuario', $id_usuario);
        return  $stmt->execute();
    }

    public static function getCountEquipmentByUser($id_usuario)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT COUNT(id_equipo) AS total FROM Equipo WHERE id_usuario = :id_usuario");
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result['total'];
    }
}
