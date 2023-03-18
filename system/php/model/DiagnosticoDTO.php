<?php
class DiagnosticoDTO 
{
    protected $id_diagnostico;
    protected $id_ticket;
    protected $descripcion;
    protected $fecha_registro;
    protected $lstHerramientas;
    protected $lstMateriales;
    protected $lstAyudantes;
    

    /**
     * Get the value of id_diagnostico
     */ 
    public function getId_diagnostico()
    {
        return $this->id_diagnostico;
    }

    /**
     * Set the value of id_diagnostico
     *
     * @return  self
     */ 
    public function setId_diagnostico($id_diagnostico)
    {
        $this->id_diagnostico = $id_diagnostico;

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

    /**
     * Get the value of lstHerramientas
     */ 
    public function getLstHerramientas()
    {
        return $this->lstHerramientas;
    }

    /**
     * Set the value of lstHerramientas
     *
     * @return  self
     */ 
    public function setLstHerramientas($lstHerramientas)
    {
        $this->lstHerramientas = $lstHerramientas;

        return $this;
    }

    /**
     * Get the value of lstMateriales
     */ 
    public function getLstMateriales()
    {
        return $this->lstMateriales;
    }

    /**
     * Set the value of lstMateriales
     *
     * @return  self
     */ 
    public function setLstMateriales($lstMateriales)
    {
        $this->lstMateriales = $lstMateriales;

        return $this;
    }

    /**
     * Get the value of lstAyudantes
     */ 
    public function getLstAyudantes()
    {
        return $this->lstAyudantes;
    }

    /**
     * Set the value of lstAyudantes
     *
     * @return  self
     */ 
    public function setLstAyudantes($lstAyudantes)
    {
        $this->lstAyudantes = $lstAyudantes;

        return $this;
    }
}
?>