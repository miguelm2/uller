<?php 
class EquipoTipoDTO
{
    protected $id_equipo_tipo;
    protected $nombre;
    protected $imagen;
    protected $fecha_registro;

    /**
     * Get the value of id_equipo_tipo
     */ 
    public function getId_equipo_tipo()
    {
        return $this->id_equipo_tipo;
    }

    /**
     * Set the value of id_equipo_tipo
     *
     * @return  self
     */ 
    public function setId_equipo_tipo($id_equipo_tipo)
    {
        $this->id_equipo_tipo = $id_equipo_tipo;

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
     * Get the value of imagen
     */ 
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set the value of imagen
     *
     * @return  self
     */ 
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

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