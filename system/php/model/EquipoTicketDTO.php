<?php
class EquipoTicketDTO
{
    protected $id_equipo_ticket;
    protected $id_ticket;
    protected $equipoDTO;
    protected $fecha_registro;

    /**
     * Get the value of id_equipo_ticket
     */ 
    public function getId_equipo_ticket()
    {
        return $this->id_equipo_ticket;
    }

    /**
     * Set the value of id_equipo_ticket
     *
     * @return  self
     */ 
    public function setId_equipo_ticket($id_equipo_ticket)
    {
        $this->id_equipo_ticket = $id_equipo_ticket;

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
     * Get the value of equipoDTO
     */ 
    public function getEquipoDTO()
    {
        return $this->equipoDTO;
    }

    /**
     * Set the value of equipoDTO
     *
     * @return  self
     */ 
    public function setEquipoDTO($equipoDTO)
    {
        $this->equipoDTO = $equipoDTO;

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
}
?>