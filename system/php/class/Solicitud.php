<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/SolicitudDTO.php';

class Solicitud extends System
{
   public static function newRequest($id_usuario, $estado, $fecha_registro)
   {
      $dbh  = parent::Conexion();
      $stmt = $dbh->prepare("INSERT INTO Servicio (id_usuario, cantidad, fecha_registro) 
                                 VALUES (:id_usuario, :cantidad, :fecha_registro)");
      $stmt->bindParam(':id_usuario', $id_usuario);
      $stmt->bindParam(':estado', $estado);
      $stmt->bindParam(':fecha_registro', $fecha_registro);
      return  $stmt->execute();
   }
   public static function setRequest($id_servicio, $estado)
   {
      $dbh  = parent::Conexion();
      $stmt = $dbh->prepare("UPDATE Solicitud 
                              SET estado = :estado,
                              WHERE id_servicio :id_servicio");
      $stmt->bindParam(':id_servicio', $id_servicio);
      $stmt->bindParam(':cantidad', $cantidad);
      $stmt->bindParam(':estado', $estado);
      return  $stmt->execute();
   }
   public static function getRequest($id_solicitud)
   {
      $dbh             = parent::Conexion();
      $stmt = $dbh->prepare("SELECT * FROM Solicitud WHERE id_solicitud = :id_solicitud");
      $stmt->bindParam(':id_solicitud', $id_solicitud);
      $stmt->execute();
      $result =  $stmt->fetch();

      if ($result) {
         $solicitudDTO = new SolicitudDTO();
         $solicitudDTO->setId_solicitud($result['id_servicio']);
         $solicitudDTO->setUsuarioDTO(Usuario::getUserById($result['id_usuario']));
         $solicitudDTO->setEstado($result['estado']);
         $solicitudDTO->setFecha_registro($result['fecha_registro']);

         return $solicitudDTO;
      }
      return false;
   }
   public static function listRequest()
   {
      $dbh             = parent::Conexion();
      $stmt = $dbh->prepare("SELECT * FROM Solicitud");
      $stmt->execute();
      $modalResponse =  $stmt->fetchAll();
      $list = array();
      $cont = 0;

      foreach ($modalResponse as $result) {
         $solicitudDTO = new SolicitudDTO();
         $solicitudDTO->setId_solicitud($result['id_servicio']);
         $solicitudDTO->setUsuarioDTO(Usuario::getUserById($result['id_usuario']));
         $solicitudDTO->setEstado($result['estado']);
         $solicitudDTO->setFecha_registro($result['fecha_registro']);

         $list[$cont] = $solicitudDTO;
         $cont++;
      }
      return $list;
   }
   public static function listRequestByUser($id_usuario)
   {
      $dbh             = parent::Conexion();
      $stmt = $dbh->prepare("SELECT * FROM Solicitud WHERE id_usuario = :id_usuario");
      $stmt->bindParam(':id_usuario', $id_usuario);
      $stmt->execute();
      $modalResponse =  $stmt->fetchAll();
      $list = array();
      $cont = 0;

      foreach ($modalResponse as $result) {
         $solicitudDTO = new SolicitudDTO();
         $solicitudDTO->setId_solicitud($result['id_servicio']);
         $solicitudDTO->setUsuarioDTO(Usuario::getUserById($result['id_usuario']));
         $solicitudDTO->setEstado($result['estado']);
         $solicitudDTO->setFecha_registro($result['fecha_registro']);

         $list[$cont] = $solicitudDTO;
         $cont++;
      }
      return $list;
   }
   public static function deleteRequest($id_solicitud)
   {
      $dbh             = parent::Conexion();
      $stmt = $dbh->prepare("DELETE FROM Solicitud WHERE id_solicitud = :id_solicitud");
      $stmt->bindParam(':id_solicitud', $id_solicitud);
      return  $stmt->execute();
   }
}
