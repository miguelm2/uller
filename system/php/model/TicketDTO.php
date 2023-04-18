<?php
class TicketDTO
{
    protected $id_ticket;
    protected $usuarioDTO;
    protected $tipo_servicioDTO;
    protected $descripcion;
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
     * Get the value of estado
     */ 
    public function getEstado()
    {
        if ($this->estado == 1) return explode(";", $this->estado . ';Iniciado');
        if ($this->estado == 2) return explode(";", $this->estado . ';Asignado');
        if ($this->estado == 3) return explode(";", $this->estado . ';Diagnosticado');
        if ($this->estado == 4) return explode(";", $this->estado . ';Cotizado');

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