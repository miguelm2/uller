<?php
class TicketDTO
{
    protected $id_ticket;
    protected $usuarioDTO;
    protected $tipo_equipoDTO;
    protected $tipo_servicioDTO;
    protected $descripcion;
    protected $tipo_usuario;
    protected $estado;
    protected $fecha_registro;


    /**
     * Get the value of id_ticket
     */ 
    public function getId_ticket()
    {
        return $this->id_ticket;
    }

    /**
     * Set the value of id_ticket
     *
     * @return  self
     */ 
    public function setId_ticket($id_ticket)
    {
        $this->id_ticket = $id_ticket;

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
     * Get the value of tipo_equipoDTO
     */ 
    public function getTipo_equipoDTO()
    {
        return $this->tipo_equipoDTO;
    }

    /**
     * Set the value of tipo_equipoDTO
     *
     * @return  self
     */ 
    public function setTipo_equipoDTO($tipo_equipoDTO)
    {
        $this->tipo_equipoDTO = $tipo_equipoDTO;

        return $this;
    }

    /**
     * Get the value of tipo_servicioDTO
     */ 
    public function getTipo_servicioDTO()
    {
        return $this->tipo_servicioDTO;
    }

    /**
     * Set the value of tipo_servicioDTO
     *
     * @return  self
     */ 
    public function setTipo_servicioDTO($tipo_servicioDTO)
    {
        $this->tipo_servicioDTO = $tipo_servicioDTO;

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
     * Get the value of tipo_usuario
     */ 
    public function getTipo_usuario()
    {
        return $this->tipo_usuario;
    }

    /**
     * Set the value of tipo_usuario
     *
     * @return  self
     */ 
    public function setTipo_usuario($tipo_usuario)
    {
        $this->tipo_usuario = $tipo_usuario;

        return $this;
    }

    /**
     * Get the value of estado
     */ 
    public function getEstado()
    {
        if ($this->estado == 1) return explode(";", $this->estado . ';Creado');
        if ($this->estado == 2) return explode(";", $this->estado . ';Verificado');
        if ($this->estado == 3) return explode(";", $this->estado . ';Finalizado');

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