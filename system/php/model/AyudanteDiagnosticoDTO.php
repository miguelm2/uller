<?php
class AyudanteDiagnosticoDTO
{
    protected $id_ayudante_diagnostico;
    protected $id_diagnostico;
    protected $id_ticket;
    protected $ayudanteDTO;
    protected $fecha_registro;
    

    /**
     * Get the value of id_ayudante_diagnostico
     */ 
    public function getId_ayudante_diagnostico()
    {
        return $this->id_ayudante_diagnostico;
    }

    /**
     * Set the value of id_ayudante_diagnostico
     *
     * @return  self
     */ 
    public function setId_ayudante_diagnostico($id_ayudante_diagnostico)
    {
        $this->id_ayudante_diagnostico = $id_ayudante_diagnostico;

        return $this;
    }

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
     * Get the value of ayudanteDTO
     */ 
    public function getAyudanteDTO()
    {
        return $this->ayudanteDTO;
    }

    /**
     * Set the value of ayudanteDTO
     *
     * @return  self
     */ 
    public function setAyudanteDTO($ayudanteDTO)
    {
        $this->ayudanteDTO = $ayudanteDTO;

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