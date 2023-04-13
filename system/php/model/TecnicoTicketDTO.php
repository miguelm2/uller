<?php
class TecnicoTicketDTO
{
    protected $id_tecnico_ticket;
    protected $id_ticket;
    protected $tecnicoDTO;
    protected $fecha_registro;

    /**
     * Get the value of id_tecnico_ticket
     */ 
    public function getId_tecnico_ticket()
    {
        return $this->id_tecnico_ticket;
    }

    /**
     * Set the value of id_tecnico_ticket
     *
     * @return  self
     */ 
    public function setId_tecnico_ticket($id_tecnico_ticket)
    {
        $this->id_tecnico_ticket = $id_tecnico_ticket;

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