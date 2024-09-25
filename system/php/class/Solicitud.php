<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/SolicitudDTO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/EquipoTipo.php';

class Solicitud extends System
{
   public static function newRequest($id_usuario, $estado, $fecha_registro)
   {
      $dbh  = parent::Conexion();
      $stmt = $dbh->prepare("INSERT INTO Solicitud (id_usuario, estado, fecha_registro) 
                                 VALUES (:id_usuario, :estado, :fecha_registro)");
      $stmt->bindParam(':id_usuario', $id_usuario);
      $stmt->bindParam(':estado', $estado);
      $stmt->bindParam(':fecha_registro', $fecha_registro);
      return  $stmt->execute();
   }
   public static function newRequestAdmin($id_usuario, $id_tecnico, $valor, $fecha, $estado, $fecha_registro)
   {
      $dbh  = parent::Conexion();
      $stmt = $dbh->prepare("INSERT INTO Solicitud (id_usuario, id_tecnico, valor, fecha, estado, fecha_registro) 
                                 VALUES (:id_usuario, :id_tecnico, :valor, :fecha, :estado, :fecha_registro)");
      $stmt->bindParam(':id_usuario', $id_usuario);
      $stmt->bindParam(':id_tecnico', $id_tecnico);
      $stmt->bindParam(':valor', $valor);
      $stmt->bindParam(':fecha', $fecha);
      $stmt->bindParam(':estado', $estado);
      $stmt->bindParam(':fecha_registro', $fecha_registro);
      return  $stmt->execute();
   }
   public static function setRequest($id_solicitud, $id_tecnico, $fecha, $estado, $valor)
   {
      $dbh  = parent::Conexion();
      $stmt = $dbh->prepare("UPDATE Solicitud 
                              SET estado = :estado, id_tecnico = :id_tecnico, fecha = :fecha, valor = :valor
                              WHERE id_solicitud = :id_solicitud");
      $stmt->bindParam(':id_solicitud', $id_solicitud);
      $stmt->bindParam(':estado', $estado);
      $stmt->bindParam(':id_tecnico', $id_tecnico);
      $stmt->bindParam(':fecha', $fecha);
      $stmt->bindParam(':valor', $valor);
      return  $stmt->execute();
   }
   public static function setEstateRequest($id_solicitud, $estado)
   {
      $dbh  = parent::Conexion();
      $stmt = $dbh->prepare("UPDATE Solicitud 
                              SET estado = :estado
                              WHERE id_solicitud = :id_solicitud");
      $stmt->bindParam(':id_solicitud', $id_solicitud);
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
         $solicitudDTO->setId_solicitud($result['id_solicitud']);
         $solicitudDTO->setUsuarioDTO(Usuario::getUserById($result['id_usuario']));
         $solicitudDTO->setTecnicoDTO(Tecnico::getTecnicoById($result['id_tecnico']));
         $solicitudDTO->setEstado($result['estado']);
         $solicitudDTO->setValor($result['valor']);
         $solicitudDTO->setFecha($result['fecha']);
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
         $solicitudDTO->setId_solicitud($result['id_solicitud']);
         $solicitudDTO->setUsuarioDTO(Usuario::getUserById($result['id_usuario']));
         $solicitudDTO->setTecnicoDTO(Tecnico::getTecnicoById($result['id_tecnico']));
         $solicitudDTO->setEstado($result['estado']);
         $solicitudDTO->setValor($result['valor']);
         $solicitudDTO->setFecha($result['fecha']);
         $solicitudDTO->setFecha_registro($result['fecha_registro']);

         $list[$cont] = $solicitudDTO;
         $cont++;
      }
      return $list;
   }
   public static function listRequestEstateByTecnico($id_tecnico)
   {
      $dbh             = parent::Conexion();
      $stmt = $dbh->prepare("SELECT * 
                           FROM Solicitud 
                           WHERE id_tecnico = :id_tecnico
                           AND estado = 2");
      $stmt->bindParam(':id_tecnico', $id_tecnico);
      $stmt->execute();
      $modalResponse =  $stmt->fetchAll();
      $list = array();
      $cont = 0;

      foreach ($modalResponse as $result) {
         $solicitudDTO = new SolicitudDTO();
         $solicitudDTO->setId_solicitud($result['id_solicitud']);
         $solicitudDTO->setUsuarioDTO(Usuario::getUserById($result['id_usuario']));
         $solicitudDTO->setTecnicoDTO(Tecnico::getTecnicoById($result['id_tecnico']));
         $solicitudDTO->setEstado($result['estado']);
         $solicitudDTO->setValor($result['valor']);
         $solicitudDTO->setFecha($result['fecha']);
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
         $solicitudDTO->setId_solicitud($result['id_solicitud']);
         $solicitudDTO->setUsuarioDTO(Usuario::getUserById($result['id_usuario']));
         $solicitudDTO->setTecnicoDTO(Tecnico::getTecnicoById($result['id_tecnico']));
         $solicitudDTO->setEstado($result['estado']);
         $solicitudDTO->setValor($result['valor']);
         $solicitudDTO->setFecha($result['fecha']);
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
   public static function getLastRequestByUser($id_usuario)
   {
      $dbh             = parent::Conexion();
      $stmt = $dbh->prepare("SELECT * FROM Solicitud 
                                    WHERE id_usuario = :id_usuario
                                    ORDER BY id_solicitud DESC 
                                    LIMIT 1");
      $stmt->bindParam(':id_usuario', $id_usuario);
      $stmt->execute();
      $result =  $stmt->fetch();

      if ($result) {
         $solicitudDTO = new SolicitudDTO();
         $solicitudDTO->setId_solicitud($result['id_solicitud']);
         $solicitudDTO->setUsuarioDTO(Usuario::getUserById($result['id_usuario']));
         $solicitudDTO->setTecnicoDTO(Tecnico::getTecnicoById($result['id_tecnico']));
         $solicitudDTO->setEstado($result['estado']);
         $solicitudDTO->setValor($result['valor']);
         $solicitudDTO->setFecha($result['fecha']);
         $solicitudDTO->setFecha_registro($result['fecha_registro']);

         return $solicitudDTO;
      }
      return false;
   }
}
