<?php
class TipoEquipoDTO
{
    protected $id_tipo;
    protected $id_usuario;
    protected $nombre;
    protected $marca;
    protected $modelo;
    protected $year_fabricacion;
    protected $serial_interior;
    protected $serial_exterior;
    protected $tipo_equipo;
    protected $capacidad_btuh;
    protected $voltaje_fases;
    protected $refrigerante;
    protected $inverter;
    protected $descripcion;
    protected $fecha_registro;

    /**
     * Get the value of id_tipo
     */ 
    public function getId_tipo()
    {
        return $this->id_tipo;
    }

    /**
     * Set the value of id_tipo
     *
     * @return  self
     */ 
    public function setId_tipo($id_tipo)
    {
        $this->id_tipo = $id_tipo;

        return $this;
    }

    /**
         * Get the value of id_usuario
         */ 
        public function getId_usuario()
        {
                return $this->id_usuario;
        }

        /**
         * Set the value of id_usuario
         *
         * @return  self
         */ 
        public function setId_usuario($id_usuario)
        {
                $this->id_usuario = $id_usuario;

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
     * Get the value of tipo_equipo
     */ 
    public function getTipo_equipo()
    {
        return $this->tipo_equipo;
    }

    /**
     * Set the value of tipo_equipo
     *
     * @return  self
     */ 
    public function setTipo_equipo($tipo_equipo)
    {
        $this->tipo_equipo = $tipo_equipo;

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
     * Get the value of voltaje_fases
     */ 
    public function getVoltaje_fases()
    {
        return $this->voltaje_fases;
    }

    /**
     * Set the value of voltaje_fases
     *
     * @return  self
     */ 
    public function setVoltaje_fases($voltaje_fases)
    {
        $this->voltaje_fases = $voltaje_fases;

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
        return date_format(date_create($this->fecha_registro), 'd/m/Y g:i A');
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
}
?>