<?php
class SolicitudDTO
{
   protected $id_solicitud;
   protected $usuarioDTO;
   protected $estado;
   protected $tecnicoDTO;
   protected $fecha;
   protected $valor;
   protected $fecha_registro;

   /**
    * Get the value of id_solicitud
    */
   public function getId_solicitud()
   {
      return $this->id_solicitud;
   }

   /**
    * Set the value of id_solicitud
    *
    * @return  self
    */
   public function setId_solicitud($id_solicitud)
   {
      $this->id_solicitud = $id_solicitud;

      return $this;
   }

   /**
    * Get the value of usuarioDTO
    */
   public function getUsuarioDTO()
   {
      return $this->usuarioDTO;
   }

   /**
    * Set the value of usuarioDTO
    *
    * @return  self
    */
   public function setUsuarioDTO($usuarioDTO)
   {
      $this->usuarioDTO = $usuarioDTO;

      return $this;
   }

   /**
    * Get the value of estado
    */
   public function getEstado()
   {
      if ($this->estado == 1) return explode(";", $this->estado . ';Solicitado');
      if ($this->estado == 2) return explode(";", $this->estado . ';Asignado');
      if ($this->estado == 3) return explode(";", $this->estado . ';En proceso');
      if ($this->estado == 4) return explode(";", $this->estado . ';Finalizado');
      if ($this->estado == 5) return explode(";", $this->estado . ';Rechazado');
      return $this->estado;
   }

   /**
    * Set the value of estado
    *
    * @return  self
    */
   public function setEstado($estado)
   {
      $this->estado = $estado;

      return $this;
   }

   /**
    * Get the value of fecha_registro
    */
   public function getFecha_registro()
   {
      return $this->fecha_registro;
   }

   /**
    * Set the value of fecha_registro
    *
    * @return  self
    */
   public function setFecha_registro($fecha_registro)
   {
      $this->fecha_registro = $fecha_registro;

      return $this;
   }

   /**
    * Get the value of tecnicoDTO
    */
   public function getTecnicoDTO()
   {
      return $this->tecnicoDTO;
   }

   /**
    * Set the value of tecnicoDTO
    *
    * @return  self
    */
   public function setTecnicoDTO($tecnicoDTO)
   {
      $this->tecnicoDTO = $tecnicoDTO;

      return $this;
   }

   /**
    * Get the value of fecha
    */
   public function getFecha()
   {
      return $this->fecha;
   }

   /**
    * Set the value of fecha
    *
    * @return  self
    */
   public function setFecha($fecha)
   {
      $this->fecha = $fecha;

      return $this;
   }

   /**
    * Get the value of valor
    */
   public function getValor()
   {
      return $this->valor;
   }

   /**
    * Set the value of valor
    *
    * @return  self
    */
   public function setValor($valor)
   {
      $this->valor = $valor;

      return $this;
   }
}
