<?php
class CuentaCobroDTO 
{
    protected $id_cuenta;
    protected $id_tecnico;
    protected $id_servicio;
    protected $estado;
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
     * Get the value of estado
     */ 
    public function getEstado()
    {
        if ($this->estado == 1) return explode(";", $this->estado . ';Presentada');
        if ($this->estado == 2) return explode(";", $this->estado . ';Aceptada');

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
}
?>