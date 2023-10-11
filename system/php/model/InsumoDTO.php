<?php
class InsumoDTO
{
    protected $id_insumo;
    protected $id_tecnico;
    protected $nombre;
    protected $fecha_registro;

    

    /**
     * Get the value of id_insumo
     */ 
    public function getId_insumo()
    {
        return $this->id_insumo;
    }

    /**
     * Set the value of id_insumo
     *
     * @return  self
     */ 
    public function setId_insumo($id_insumo)
    {
        $this->id_insumo = $id_insumo;

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