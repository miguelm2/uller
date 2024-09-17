<?php
class ServicioDTO
{
    protected $id_servicio;
    protected $solicitudDTO;
    protected $tipoServicioDTO;
    protected $equipoTipoDTO;
    protected $cantidad;
    protected $fecha_registro;
    

    /**
     * Get the value of id_servicio
     */ 
    public function getId_servicio()
    {
        return $this->id_servicio;
    }

    /**
     * Set the value of id_servicio
     *
     * @return  self
     */ 
    public function setId_servicio($id_servicio)
    {
        $this->id_servicio = $id_servicio;

        return $this;
    }

    /**
     * Get the value of solicitudDTO
     */ 
    public function getSolicitudDTO()
    {
        return $this->solicitudDTO;
    }

    /**
     * Set the value of solicitudDTO
     *
     * @return  self
     */ 
    public function setSolicitudDTO($solicitudDTO)
    {
        $this->solicitudDTO = $solicitudDTO;

        return $this;
    }

    /**
     * Get the value of tipoServicioDTO
     */ 
    public function getTipoServicioDTO()
    {
        return $this->tipoServicioDTO;
    }

    /**
     * Set the value of tipoServicioDTO
     *
     * @return  self
     */ 
    public function setTipoServicioDTO($tipoServicioDTO)
    {
        $this->tipoServicioDTO = $tipoServicioDTO;

        return $this;
    }

    /**
     * Get the value of cantidad
     */ 
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set the value of cantidad
     *
     * @return  self
     */ 
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

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
}
