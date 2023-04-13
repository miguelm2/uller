<?php
class DiagnosticoDTO 
{
    protected $id_diagnostico;
    protected $id_ticket;
    protected $numero_horas;
    protected $numero_ayudantes;
    protected $descripcion;
    protected $precio;
    protected $fecha_registro;
    protected $lstHerramientas;
    protected $lstMateriales;
    

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
     * Get the value of numero_horas
     */
    public function getNumero_horas()
    {
        return $this->numero_horas;
    }

    /**
     * Set the value of numero_horas
     *
     * @return  self
     */
    public function setNumero_horas($numero_horas)
    {
        $this->numero_horas = $numero_horas;

        return $this;
    }

    /**
     * Get the value of numero_ayudantes
     */
    public function getNumero_ayudantes()
    {
        return $this->numero_ayudantes;
    }

    /**
     * Set the value of numero_ayudantes
     *
     * @return  self
     */
    public function setNumero_ayudantes($numero_ayudantes)
    {
        $this->numero_ayudantes = $numero_ayudantes;

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
     * Get the value of precio
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set the value of precio
     *
     * @return  self
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

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
}
?>