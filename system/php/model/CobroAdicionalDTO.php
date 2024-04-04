<?php

class CobroAdicionalDTO{
    protected $id_cobro_adicional;
    protected $id_cuenta;
    protected $valor;
    protected $observacion;

    public function __construct(){
        
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
     * Get the value of valor
     */ 
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Set the value of valor
     *
     * @return  self
     */ 
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get the value of observacion
     */ 
    public function getObservacion()
    {
        return $this->observacion;
    }

    /**
     * Set the value of observacion
     *
     * @return  self
     */ 
    public function setObservacion($observacion)
    {
        $this->observacion = $observacion;

        return $this;
    }

    /**
     * Get the value of id_cobro_adicional
     */ 
    public function getId_cobro_adicional()
    {
        return $this->id_cobro_adicional;
    }

    /**
     * Set the value of id_cobro_adicional
     *
     * @return  self
     */ 
    public function setId_cobro_adicional($id_cobro_adicional)
    {
        $this->id_cobro_adicional = $id_cobro_adicional;

        return $this;
    }
}

?>