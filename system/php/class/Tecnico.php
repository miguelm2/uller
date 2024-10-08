<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/TecnicoDTO.php';

class Tecnico extends System
{
    public static function newTecnico($nombre, $correo, $telefono, $cedula, $pass_hash, $fecha_nacimiento, $direccion, $ciudad, $estado_civil, $numero_hijos, $banco, $tipo_cuenta, $numero_cuenta, $estado, $tipo, $fecha_registro)
    {

        $validarAdmin   = Administrador::validateAdministrator($cedula, $correo, null);
        $validarUser    = Usuario::validateUser($cedula, $correo, null);
        $validarTecnico = self::validateTecnico($cedula, $correo, null);

        if (!$validarAdmin && !$validarUser && !$validarTecnico) {
            $dbh             = parent::Conexion();
            $stmt = $dbh->prepare("INSERT INTO Tecnico (nombre, correo, telefono, cedula, pass, fecha_nacimiento, direccion, ciudad, estado_civil, numero_hijos, banco, tipo_cuenta, numero_cuenta, estado, tipo, fecha_registro) 
                                VALUES (:nombre, :correo, :telefono, :cedula, :pass, :fecha_nacimiento, :direccion, :ciudad, :estado_civil, :numero_hijos, :banco, :tipo_cuenta, :numero_cuenta, :estado, :tipo, :fecha_registro)");
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':correo', $correo);
            $stmt->bindParam(':telefono', $telefono);
            $stmt->bindParam(':cedula', $cedula);
            $stmt->bindParam(':pass', $pass_hash);
            $stmt->bindParam(':fecha_nacimiento', $fecha_nacimiento);
            $stmt->bindParam(':direccion', $direccion);
            $stmt->bindParam(':ciudad', $ciudad);
            $stmt->bindParam(':estado_civil', $estado_civil);
            $stmt->bindParam(':numero_hijos', $numero_hijos);
            $stmt->bindParam(':banco', $banco);
            $stmt->bindParam(':tipo_cuenta', $tipo_cuenta);
            $stmt->bindParam(':numero_cuenta', $numero_cuenta);
            $stmt->bindParam(':estado', $estado);
            $stmt->bindParam(':tipo', $tipo);
            $stmt->bindParam(':fecha_registro', $fecha_registro);
            return  $stmt->execute();
        } else {
            return false;
        }
    }

    public static function setTecnico($id_tecnico, $nombre, $correo, $telefono, $cedula, $fecha_nacimiento, $direccion, $ciudad, $estado_civil, $numero_hijos, $banco, $tipo_cuenta, $numero_cuenta, $estado)
    {
        $validarAdmin   = Administrador::validateAdministrator($cedula, $correo, null);
        $validarUser    = Usuario::validateUser($cedula, $correo, null);
        $validarTecnico = self::validateTecnico($cedula, $correo, $id_tecnico);

        if (!$validarAdmin && !$validarUser && !$validarTecnico) {
            $dbh             = parent::Conexion();
            $stmt = $dbh->prepare("UPDATE Tecnico SET nombre = :nombre, correo = :correo, telefono = :telefono, cedula = :cedula, 
                                                        fecha_nacimiento = :fecha_nacimiento, direccion = :direccion, ciudad = :ciudad, 
                                                        estado_civil = :estado_civil, numero_hijos = :numero_hijos, banco = :banco, 
                                                        tipo_cuenta = :tipo_cuenta, numero_cuenta = :numero_cuenta, estado = :estado 
                                                        WHERE id_tecnico = :id_tecnico ");
            $stmt->bindParam(':id_tecnico', $id_tecnico);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':correo', $correo);
            $stmt->bindParam(':telefono', $telefono);
            $stmt->bindParam(':cedula', $cedula);
            $stmt->bindParam(':fecha_nacimiento', $fecha_nacimiento);
            $stmt->bindParam(':direccion', $direccion);
            $stmt->bindParam(':ciudad', $ciudad);
            $stmt->bindParam(':estado_civil', $estado_civil);
            $stmt->bindParam(':numero_hijos', $numero_hijos);
            $stmt->bindParam(':banco', $banco);
            $stmt->bindParam(':tipo_cuenta', $tipo_cuenta);
            $stmt->bindParam(':numero_cuenta', $numero_cuenta);
            $stmt->bindParam(':estado', $estado);
            return  $stmt->execute();
        } else {
            return false;
        }
    }

    public static function setTecnicoPass($id_tecnico, $pass_hash)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE Tecnico SET pass = :pass WHERE id_tecnico = :id_tecnico ");
        $stmt->bindParam(':id_tecnico', $id_tecnico);
        $stmt->bindParam(':pass', $pass_hash);
        return  $stmt->execute();
    }

    public static function setTecnicoProfile($id_tecnico, $nombre, $correo, $telefono, $cedula, $fecha_nacimiento, $direccion, $ciudad, $estado_civil, $numero_hijos, $banco, $tipo_cuenta, $numero_cuenta)
    {
        $validarAdmin   = Administrador::validateAdministrator($cedula, $correo, null);
        $validarUser    = Usuario::validateUser($cedula, $correo, null);
        $validarTecnico = self::validateTecnico($cedula, $correo, $id_tecnico);

        if (!$validarAdmin && !$validarUser && !$validarTecnico) {
            $dbh             = parent::Conexion();
            $stmt = $dbh->prepare("UPDATE Tecnico SET nombre = :nombre, correo = :correo, telefono = :telefono, cedula = :cedula,
                                                    fecha_nacimiento = :fecha_nacimiento, direccion = :direccion, ciudad = :ciudad, 
                                                    estado_civil = :estado_civil, numero_hijos = :numero_hijos, banco = :banco, 
                                                    tipo_cuenta = :tipo_cuenta, numero_cuenta = :numero_cuenta
                                                    WHERE id_tecnico = :id_tecnico");
                                                    
            $stmt->bindParam(':id_tecnico', $id_tecnico);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':correo', $correo);
            $stmt->bindParam(':telefono', $telefono);
            $stmt->bindParam(':cedula', $cedula);
            $stmt->bindParam(':fecha_nacimiento', $fecha_nacimiento);
            $stmt->bindParam(':direccion', $direccion);
            $stmt->bindParam(':ciudad', $ciudad);
            $stmt->bindParam(':estado_civil', $estado_civil);
            $stmt->bindParam(':numero_hijos', $numero_hijos);
            $stmt->bindParam(':banco', $banco);
            $stmt->bindParam(':tipo_cuenta', $tipo_cuenta);
            $stmt->bindParam(':numero_cuenta', $numero_cuenta);
            return  $stmt->execute();
        } else {
            return false;
        }
    }

    public static function getTecnicoById($id_tecnico)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Tecnico WHERE id_tecnico = :id_tecnico ");
        $stmt->bindParam(':id_tecnico', $id_tecnico);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'TecnicoDTO');
        $stmt->execute();
        return  $stmt->fetch();
    }

    public static function getTecnico($cedula, $pass_hash)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Tecnico WHERE cedula = :cedula AND pass = :pass AND estado = 1");
        $stmt->bindParam(':cedula', $cedula);
        $stmt->bindParam(':pass', $pass_hash);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'TecnicoDTO');
        $stmt->execute();
        return  $stmt->fetch();
    }

    public static function getTecnicoByCedula($cedula)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Tecnico WHERE cedula = :cedula ");
        $stmt->bindParam(':cedula', $cedula);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'TecnicoDTO');
        $stmt->execute();
        return  $stmt->fetch();
    }

    public static function listTecnicos()
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Tecnico");
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'TecnicoDTO');
        $stmt->execute();
        return  $stmt->fetchAll();
    }

    public static function listTecnicosActivos()
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Tecnico WHERE estado = 1");
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'TecnicoDTO');
        $stmt->execute();
        return  $stmt->fetchAll();
    }

    public static function listTecnicosActivosById($id_tecnico)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Tecnico WHERE estado = 1 AND id_tecnico != :id_tecnico");
        $stmt->bindParam(':id_tecnico', $id_tecnico);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'TecnicoDTO');
        $stmt->execute();
        return  $stmt->fetchAll();
    }

    public static function deleteTecnico($id_tecnico)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("DELETE FROM Tecnico WHERE id_tecnico = :id_tecnico ");
        $stmt->bindParam(':id_tecnico', $id_tecnico);
        return  $stmt->execute();
    }

    public static function validateTecnico($cedula, $correo, $id_tecnico)
    {
        $dbh  = parent::Conexion();

        if ($id_tecnico == null) {
            $stmt = $dbh->prepare("SELECT * FROM Tecnico WHERE cedula = :cedula OR correo = :correo");
        } else {
            $stmt = $dbh->prepare("SELECT * FROM Tecnico WHERE (cedula = :cedula OR correo = :correo) AND id_tecnico != :id_tecnico");
            $stmt->bindParam(':id_tecnico', $id_tecnico);
        }

        $stmt->bindParam(':cedula', $cedula);
        $stmt->bindParam(':correo', $correo);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'TecnicoDTO');
        $stmt->execute();

        if ($stmt->fetch()) {
            return true;
        } else {
            return false;
        }
    }

    public static function getCountTecnicos()
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT COUNT(id_tecnico) AS total FROM Tecnico");
        $stmt->execute();
        $result = $stmt->fetch();
        return $result['total'];
    }
}
