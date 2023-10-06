<?php
class InformeTicketDTO
{
    protected $id_informe;
    protected $id_ticket;
    protected $id_tipo;
    protected $fecha_servicio;
    protected $fecha_ultimo_servicio;
    protected $ubicacion_equipo;
    protected $tipo_uso;
    protected $presenta_falla;
    protected $notas;
    protected $observaciones;
    protected $fecha_registro;

    /**
     * Get the value of id_informe
     */ 
    public function getId_informe()
    {
        return $this->id_informe;
    }

    /**
     * Set the value of id_informe
     *
     * @return  self
     */ 
    public function setId_informe($id_informe)
    {
        $this->id_informe = $id_informe;

        return $this;
    }

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
     * Get the value of fecha_servicio
     */ 
    public function getFecha_servicio()
    {
        return $this->fecha_servicio;
    }

    /**
     * Set the value of fecha_servicio
     *
     * @return  self
     */ 
    public function setFecha_servicio($fecha_servicio)
    {
        $this->fecha_servicio = $fecha_servicio;

        return $this;
    }

    /**
     * Get the value of fecha_ultimo_servicio
     */ 
    public function getFecha_ultimo_servicio()
    {
        return $this->fecha_ultimo_servicio;
    }

    /**
     * Set the value of fecha_ultimo_servicio
     *
     * @return  self
     */ 
    public function setFecha_ultimo_servicio($fecha_ultimo_servicio)
    {
        $this->fecha_ultimo_servicio = $fecha_ultimo_servicio;

        return $this;
    }

    /**
     * Get the value of ubicacion_equipo
     */ 
    public function getUbicacion_equipo()
    {
        return $this->ubicacion_equipo;
    }

    /**
     * Set the value of ubicacion_equipo
     *
     * @return  self
     */ 
    public function setUbicacion_equipo($ubicacion_equipo)
    {
        $this->ubicacion_equipo = $ubicacion_equipo;

        return $this;
    }

    /**
     * Get the value of tipo_uso
     */ 
    public function getTipo_uso()
    {
        if ($this->tipo_uso == 1) return explode(";", $this->tipo_uso . ';Residencial');
        if ($this->tipo_uso == 2) return explode(";", $this->tipo_uso . ';Comercial');

        return $this->tipo_uso;
    }

    /**
     * Set the value of tipo_uso
     *
     * @return  self
     */ 
    public function setTipo_uso($tipo_uso)
    {
        $this->tipo_uso = $tipo_uso;

        return $this;
    }

    /**
     * Get the value of presenta_falla
     */ 
    public function getPresenta_falla()
    {
        return $this->presenta_falla;
    }

    /**
     * Set the value of presenta_falla
     *
     * @return  self
     */ 
    public function setPresenta_falla($presenta_falla)
    {
        $this->presenta_falla = $presenta_falla;

        return $this;
    }

    /**
     * Get the value of notas
     */ 
    public function getNotas()
    {
        return $this->notas;
    }

    /**
     * Set the value of notas
     *
     * @return  self
     */ 
    public function setNotas($notas)
    {
        $this->notas = $notas;

        return $this;
    }

    /**
     * Get the value of observaciones
     */ 
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Set the value of observaciones
     *
     * @return  self
     */ 
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;

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
}
?>