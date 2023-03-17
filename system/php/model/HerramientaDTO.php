<?php
class HerramientaDTO
{
    protected $id_herramienta;
    protected $nombre;
    protected $tipo;
    protected $descripcion;
    protected $fecha_registro;

    /**
     * Get the value of id_herramienta
     */ 
    public function getId_herramienta()
    {
        return $this->id_herramienta;
    }

    /**
     * Set the value of id_herramienta
     *
     * @return  self
     */ 
    public function setId_herramienta($id_herramienta)
    {
        $this->id_herramienta = $id_herramienta;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of tipo
     */ 
    public function getTipo()
    {
        if($this->tipo==1) return explode(";", $this->tipo.';Herramienta') ;
        if($this->tipo==2) return explode(";", $this->tipo.';Equipo') ;

        return $this->tipo;
    }

    /**
     * Set the value of tipo
     *
     * @return  self
     */ 
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

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
}
?>