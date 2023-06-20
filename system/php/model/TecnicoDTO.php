<?php

class TecnicoDTO
{

    protected $id_tecnico;
    protected $nombre;
    protected $cedula;
    protected $correo;
    protected $telefono;
    protected $pass;
    protected $fecha_nacimiento;
    protected $direccion;
    protected $ciudad;
    protected $estado_civil;
    protected $numero_hijos;
    protected $banco;
    protected $tipo_cuenta;
    protected $numero_cuenta;
    protected $estado;
    protected $tipo;
    protected $fecha_registro;


    public function __construct()
    {
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
     * Get the value of cedula
     */
    public function getCedula()
    {
        return $this->cedula;
    }

    /**
     * Set the value of cedula
     *
     * @return  self
     */
    public function setCedula($cedula)
    {
        $this->cedula = $cedula;

        return $this;
    }

    /**
     * Get the value of correo
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set the value of correo
     *
     * @return  self
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Get the value of telefono
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set the value of telefono
     *
     * @return  self
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get the value of pass
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * Set the value of pass
     *
     * @return  self
     */
    public function setPass($pass)
    {
        $this->pass = $pass;

        return $this;
    }

    /**
     * Get the value of fecha_nacimiento
     */ 
    public function getFecha_nacimiento()
    {
        return $this->fecha_nacimiento;
    }

    /**
     * Set the value of fecha_nacimiento
     *
     * @return  self
     */ 
    public function setFecha_nacimiento($fecha_nacimiento)
    {
        $this->fecha_nacimiento = $fecha_nacimiento;

        return $this;
    }

    /**
     * Get the value of direccion
     */ 
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set the value of direccion
     *
     * @return  self
     */ 
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get the value of ciudad
     */ 
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * Set the value of ciudad
     *
     * @return  self
     */ 
    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;

        return $this;
    }

    /**
     * Get the value of estado_civil
     */ 
    public function getEstado_civil()
    {
        return $this->estado_civil;
    }

    /**
     * Set the value of estado_civil
     *
     * @return  self
     */ 
    public function setEstado_civil($estado_civil)
    {
        $this->estado_civil = $estado_civil;

        return $this;
    }

    /**
     * Get the value of numero_hijos
     */ 
    public function getNumero_hijos()
    {
        return $this->numero_hijos;
    }

    /**
     * Set the value of numero_hijos
     *
     * @return  self
     */ 
    public function setNumero_hijos($numero_hijos)
    {
        $this->numero_hijos = $numero_hijos;

        return $this;
    }

    /**
     * Get the value of banco
     */ 
    public function getBanco()
    {
        return $this->banco;
    }

    /**
     * Set the value of banco
     *
     * @return  self
     */ 
    public function setBanco($banco)
    {
        $this->banco = $banco;

        return $this;
    }

    /**
     * Get the value of tipo_cuenta
     */ 
    public function getTipo_cuenta()
    {
        return $this->tipo_cuenta;
    }

    /**
     * Set the value of tipo_cuenta
     *
     * @return  self
     */ 
    public function setTipo_cuenta($tipo_cuenta)
    {
        $this->tipo_cuenta = $tipo_cuenta;

        return $this;
    }

    /**
     * Get the value of numero_cuenta
     */ 
    public function getNumero_cuenta()
    {
        return $this->numero_cuenta;
    }

    /**
     * Set the value of numero_cuenta
     *
     * @return  self
     */ 
    public function setNumero_cuenta($numero_cuenta)
    {
        $this->numero_cuenta = $numero_cuenta;

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
     * Get the value of tipo
     */
    public function getTipo()
    {
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
