<?php
class EquipoDTO
{
   protected $id_equipo;
   protected $usuarioDTO;
   protected $nombre;
   protected $marca;
   protected $modelo;
   protected $year_fabricacion;
   protected $serial_interior;
   protected $serial_exterior;
   protected $equipoTipoDTO;
   protected $capacidad_btuh;
   protected $conexion_electrica;
   protected $refrigerante;
   protected $inverter;
   protected $descripcion;
   protected $fecha_instalacion;
   protected $imagen_placa_interior;
   protected $imagen_placa_exterior;
   protected $fecha_registro;

   /**
    * Get the value of id_equipo
    */
   public function getId_equipo()
   {
      return $this->id_equipo;
   }

   /**
    * Set the value of id_tipo
    *
    * @return  self
    */
   public function setId_equipo($id_equipo)
   {
      $this->id_equipo = $id_equipo;

      return $this;
   }

   /**
    * Get the value of nombre
    */
   public function getNombre()
   {
      return $this->nombre;
   }

   /**
    * Set the value of nombre
    *
    * @return  self
    */
   public function setNombre($nombre)
   {
      $this->nombre = $nombre;

      return $this;
   }

   /**
    * Get the value of marca
    */
   public function getMarca()
   {
      return $this->marca;
   }

   /**
    * Set the value of marca
    *
    * @return  self
    */
   public function setMarca($marca)
   {
      $this->marca = $marca;

      return $this;
   }

   /**
    * Get the value of modelo
    */
   public function getModelo()
   {
      return $this->modelo;
   }

   /**
    * Set the value of modelo
    *
    * @return  self
    */
   public function setModelo($modelo)
   {
      $this->modelo = $modelo;

      return $this;
   }

   /**
    * Get the value of year_fabricacion
    */
   public function getYear_fabricacion()
   {
      return $this->year_fabricacion;
   }

   /**
    * Set the value of year_fabricacion
    *
    * @return  self
    */
   public function setYear_fabricacion($year_fabricacion)
   {
      $this->year_fabricacion = $year_fabricacion;

      return $this;
   }

   /**
    * Get the value of serial_interior
    */
   public function getSerial_interior()
   {
      return $this->serial_interior;
   }

   /**
    * Set the value of serial_interior
    *
    * @return  self
    */
   public function setSerial_interior($serial_interior)
   {
      $this->serial_interior = $serial_interior;

      return $this;
   }

   /**
    * Get the value of serial_exterior
    */
   public function getSerial_exterior()
   {
      return $this->serial_exterior;
   }

   /**
    * Set the value of serial_exterior
    *
    * @return  self
    */
   public function setSerial_exterior($serial_exterior)
   {
      $this->serial_exterior = $serial_exterior;

      return $this;
   }

   /**
    * Get the value of capacidad_btuh
    */
   public function getCapacidad_btuh()
   {
      return $this->capacidad_btuh;
   }

   /**
    * Set the value of capacidad_btuh
    *
    * @return  self
    */
   public function setCapacidad_btuh($capacidad_btuh)
   {
      $this->capacidad_btuh = $capacidad_btuh;

      return $this;
   }

   /**
    * Get the value of refrigerante
    */
   public function getRefrigerante()
   {
      return $this->refrigerante;
   }

   /**
    * Set the value of refrigerante
    *
    * @return  self
    */
   public function setRefrigerante($refrigerante)
   {
      $this->refrigerante = $refrigerante;

      return $this;
   }

   /**
    * Get the value of inverter
    */
   public function getInverter()
   {
      return $this->inverter;
   }

   /**
    * Set the value of inverter
    *
    * @return  self
    */
   public function setInverter($inverter)
   {
      $this->inverter = $inverter;

      return $this;
   }

   /**
    * Get the value of descripcion
    */
   public function getDescripcion()
   {
      return $this->descripcion;
   }

   /**
    * Set the value of descripcion
    *
    * @return  self
    */
   public function setDescripcion($descripcion)
   {
      $this->descripcion = $descripcion;

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
    * Get the value of equipoTipoDTO
    */
   public function getEquipoTipoDTO()
   {
      return $this->equipoTipoDTO;
   }

   /**
    * Set the value of equipoTipoDTO
    *
    * @return  self
    */
   public function setEquipoTipoDTO($equipoTipoDTO)
   {
      $this->equipoTipoDTO = $equipoTipoDTO;

      return $this;
   }

   /**
    * Get the value of imagen_placa_interior
    */
   public function getImagen_placa_interior()
   {
      return $this->imagen_placa_interior;
   }

   /**
    * Set the value of imagen_placa_interior
    *
    * @return  self
    */
   public function setImagen_placa_interior($imagen_placa_interior)
   {
      $this->imagen_placa_interior = $imagen_placa_interior;

      return $this;
   }

   /**
    * Get the value of imagen_placa_exterior
    */
   public function getImagen_placa_exterior()
   {
      return $this->imagen_placa_exterior;
   }

   /**
    * Set the value of imagen_placa_exterior
    *
    * @return  self
    */
   public function setImagen_placa_exterior($imagen_placa_exterior)
   {
      $this->imagen_placa_exterior = $imagen_placa_exterior;

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
    * Get the value of conexion_electrica
    */
   public function getConexion_electrica()
   {
      if ($this->conexion_electrica == 1) return explode(";", $this->conexion_electrica . ';220/1/60');
      if ($this->conexion_electrica == 2) return explode(";", $this->conexion_electrica . ';115/1/60');
      if ($this->conexion_electrica == 3) return explode(";", $this->conexion_electrica . ';220/1/60');
      return $this->conexion_electrica;
   }

   /**
    * Set the value of conexion_electrica
    *
    * @return  self
    */
   public function setConexion_electrica($conexion_electrica)
   {
      $this->conexion_electrica = $conexion_electrica;

      return $this;
   }

   /**
    * Get the value of fecha_instalacion
    */
   public function getFecha_instalacion()
   {
      return $this->fecha_instalacion;
   }

   /**
    * Set the value of fecha_instalacion
    *
    * @return  self
    */
   public function setFecha_instalacion($fecha_instalacion)
   {
      $this->fecha_instalacion = $fecha_instalacion;

      return $this;
   }
}
