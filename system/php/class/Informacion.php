<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/InformacionDTO.php';
class Informacion extends System
{
    public static function setInformacion($nombre, $nit, $direccion, $ciudad, $departamento, $correo, $telefono, $whatsapp, $facebook, $instagram, $color, $imagen)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE Perfil SET nombre = :nombre, nit = :nit, direccion = :direccion, ciudad = :ciudad, departamento = :departamento, correo = :correo, telefono = :telefono, wp = :wp, fb = :fb, instagram = :instagram, color1 = :color1, imagen = :imagen");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':nit', $nit);
        $stmt->bindParam(':direccion', $direccion);
        $stmt->bindParam(':ciudad', $ciudad);
        $stmt->bindParam(':departamento', $departamento);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':wp', $whatsapp);
        $stmt->bindParam(':fb', $facebook);
        $stmt->bindParam(':instagram', $instagram);
        $stmt->bindParam(':color1', $color);
        $stmt->bindParam(':imagen', $imagen);
        return  $stmt->execute();
    }

    public static function getInformacion()
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM Perfil LIMIT 1");
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'InformacionDTO');
        $stmt->execute();
        return  $stmt->fetch();
    }
}
?>