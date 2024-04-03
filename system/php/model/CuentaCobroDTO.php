<?php
class CuentaCobroDTO 
{
    protected $id_cuenta;
    protected $id_ticket;
    protected $id_tecnico;
    protected $estado;
    protected $firma_tecnico;
    protected $fecha_registro;

    public function __construct()
    {
        
    }


    /**
     * Get the value of id_cuenta
     */ 
    public function getId_cuenta()
    {
        return $this->id_cuenta;
    }

    /**
     * Set the value of id_cuenta
     *
     * @return  self
     */ 
    public function setId_cuenta($id_cuenta)
    {
        $this->id_cuenta = $id_cuenta;

        return $this;
    }

    /**
     * Get the value of id_tecnico
     */ 
    public function getId_tecnico()
    {
        return $this->id_tecnico;
    }

    /**
     * Set the value of id_tecnico
     *
     * @return  self
     */ 
    public function setId_tecnico($id_tecnico)
    {
        $this->id_tecnico = $id_tecnico;

        return $this;
    }

    /**
     * Get the value of estado
     */ 
    public function getEstado()
    {
        if ($this->estado == 1) return explode(";", $this->estado . ';Generada');
        if ($this->estado == 2) return explode(";", $this->estado . ';Presentada');
        if ($this->estado == 3) return explode(";", $this->estado . ';Aceptada');
        if ($this->estado == 4) return explode(";", $this->estado . ';Pagada');

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
     * Get the value of firma_tecnico
     */ 
    public function getFirma_tecnico()
    {
        return $this->firma_tecnico;
    }

    /**
     * Set the value of firma_tecnico
     *
     * @return  self
     */ 
    public function setFirma_tecnico($firma_tecnico)
    {
        $this->firma_tecnico = $firma_tecnico;

        return $this;
    }
}
?>