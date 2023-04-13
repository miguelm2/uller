<?php
class MaterialDiagnosticoDTO
{
    protected $id_material_diagnostico;
    protected $id_diagnostico;
    protected $id_ticket;
    protected $materialDTO;
    protected $cantidad;
    protected $unidad_medida;
    protected $fecha_registro;
    

    /**
     * Get the value of id_material_diagnostico
     */ 
    public function getId_material_diagnostico()
    {
        return $this->id_material_diagnostico;
    }

    /**
     * Set the value of id_material_diagnostico
     *
     * @return  self
     */ 
    public function setId_material_diagnostico($id_material_diagnostico)
    {
        $this->id_material_diagnostico = $id_material_diagnostico;

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
     * Get the value of materialDTO
     */ 
    public function getMaterialDTO()
    {
        return $this->materialDTO;
    }

    /**
     * Set the value of materialDTO
     *
     * @return  self
     */ 
    public function setMaterialDTO($materialDTO)
    {
        $this->materialDTO = $materialDTO;

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
     * Get the value of unidad_medida
     */
    public function getUnidad_medida()
    {
        return $this->unidad_medida;
    }

    /**
     * Set the value of unidad_medida
     *
     * @return  self
     */
    public function setUnidad_medida($unidad_medida)
    {
        $this->unidad_medida = $unidad_medida;

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