<?php 

    class UsuarioDTO {

        protected $id_usuario;
        protected $nombre;
        protected $cedula;
        protected $correo;
        protected $telefono;
        protected $direccion;
        protected $localidad;
        protected $barrio_conjunto;
        protected $torre;
        protected $numero_apto;
        protected $ciudad;
        protected $departamento;
        protected $pass;
        protected $estado;
        protected $tipo;
        protected $fecha_registro;




        public function __construct(){
         
        }
            
        
        /**
         * Get the value of id_usuario
         */ 
        public function getId_usuario()
        {
                return $this->id_usuario;
        }

        /**
         * Set the value of id_usuario
         *
         * @return  self
         */ 
        public function setId_usuario($id_usuario)
        {
                $this->id_usuario = $id_usuario;

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
         * Get the value of localidad
         */ 
        public function getLocalidad()
        {
                return $this->localidad;
        }

        /**
         * Set the value of localidad
         *
         * @return  self
         */ 
        public function setLocalidad($localidad)
        {
                $this->localidad = $localidad;

                return $this;
        }

        /**
         * Get the value of barrio_conjunto
         */ 
        public function getBarrio_conjunto()
        {
                return $this->barrio_conjunto;
        }

        /**
         * Set the value of barrio_conjunto
         *
         * @return  self
         */ 
        public function setBarrio_conjunto($barrio_conjunto)
        {
                $this->barrio_conjunto = $barrio_conjunto;

                return $this;
        }

        /**
         * Get the value of torre
         */ 
        public function getTorre()
        {
                return $this->torre;
        }

        /**
         * Set the value of torre
         *
         * @return  self
         */ 
        public function setTorre($torre)
        {
                $this->torre = $torre;

                return $this;
        }

        /**
         * Get the value of numero_apto
         */ 
        public function getNumero_apto()
        {
                return $this->numero_apto;
        }

        /**
         * Set the value of numero_apto
         *
         * @return  self
         */ 
        public function setNumero_apto($numero_apto)
        {
                $this->numero_apto = $numero_apto;

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
         * Get the value of departamento
         */ 
        public function getDepartamento()
        {
                return $this->departamento;
        }

        /**
         * Set the value of departamento
         *
         * @return  self
         */ 
        public function setDepartamento($departamento)
        {
                $this->departamento = $departamento;

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
         * Get the value of estado
         */ 
        public function getEstado()
        {
                if($this->estado==1) return explode(";", $this->estado.';Activo') ;
                if($this->estado==0) return explode(";", $this->estado.';Inactivo') ;

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