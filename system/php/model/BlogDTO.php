<?php

class BlogDTO
{
    protected $id_blog;
    protected $id_usuario;
    protected $tipo_usuario;
    protected $titulo;
    protected $vistas;
    protected $contenido;
    protected $imagen;
    protected $tipo_imagen;
    protected $estado;
    protected $fecha_creacion;

    public function __construct()
    {
    }




    /**
     * Get the value of id_blog
     */
    public function getId_blog()
    {
        return $this->id_blog;
    }

    /**
     * Set the value of id_blog
     *
     * @return  self
     */
    public function setId_blog($id_blog)
    {
        $this->id_blog = $id_blog;

        return $this;
    }

    /**
     * Get the value of titulo
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set the value of titulo
     *
     * @return  self
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get the value of vistas
     */
    public function getVistas()
    {
        return $this->vistas;
    }

    /**
     * Set the value of vistas
     *
     * @return  self
     */
    public function setVistas($vistas)
    {
        $this->vistas = $vistas;

        return $this;
    }

    /**
     * Get the value of contenido
     */
    public function getContenido()
    {
        return $this->contenido;
    }

    /**
     * Set the value of contenido
     *
     * @return  self
     */
    public function setContenido($contenido)
    {
        $this->contenido = $contenido;

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
     * Get the value of estado
     */
    public function getEstado()
    {
        if ($this->estado == 1) return explode(";", $this->estado . ';Activo');
        if ($this->estado == 0) return explode(";", $this->estado . ';Inactivo');

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
     * Get the value of fecha_creacion
     */
    public function getFecha_creacion()
    {
        return $this->fecha_creacion;
    }

    /**
     * Set the value of fecha_creacion
     *
     * @return  self
     */
    public function setFecha_creacion($fecha_creacion)
    {
        $this->fecha_creacion = $fecha_creacion;

        return $this;
    }

    /**
     * Get the value of id_usuario
     */
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    /**
     * Set the value of id_usuario
     */
    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;

        return $this;
    }

    /**
     * Get the value of tipo_usuario
     */
    public function getTipoUsuario()
    {
        return $this->tipo_usuario;
    }

    /**
     * Set the value of tipo_usuario
     */
    public function setTipoUsuario($tipo_usuario)
    {
        $this->tipo_usuario = $tipo_usuario;

        return $this;
    }

    /**
     * Get the value of tipo_imagen
     */ 
    public function getTipo_imagen()
    {
        return $this->tipo_imagen;
    }

    /**
     * Set the value of tipo_imagen
     *
     * @return  self
     */ 
    public function setTipo_imagen($tipo_imagen)
    {
        $this->tipo_imagen = $tipo_imagen;

        return $this;
    }
}
