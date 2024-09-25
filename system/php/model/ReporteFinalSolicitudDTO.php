<?php
class ReporteFinalSolicitudDTO
{
    protected $id_reporte_final;
    protected $id_servicio;
    protected $id_equipo;
    protected $fecha_servicio;
    protected $ubicacion;
    protected $otra_ubicacion;
    protected $tipo_uso;
    protected $presion_alta;
    protected $presion_baja;
    protected $presion_reposo;
    protected $temperatura_salida;
    protected $temperatura_entrada;
    protected $temperatura_ret;
    protected $temperatura_sum;
    protected $voltaje;
    protected $amperaje;
    protected $fases;
    protected $estado_equipo;
    protected $comentario_estado_equipo;
    protected $equipo_opera_inicio;
    protected $limpieza_general;
    protected $limpieza_filtros;
    protected $limpieza_serpentin;
    protected $limpieza_bandeja;
    protected $serpentin_condensador;
    protected $limpieza_drenaje;
    protected $verificacion;
    protected $estado_carcasa_interior;
    protected $estado_equipo_exterior;
    protected $equipo_opera_fin;
    protected $diagnostico_mant_corr;
    protected $observaciones;
    protected $prox_servicio;
    protected $firma;
    protected $evidencia_antes_interior;
    protected $evidencia_antes_exterior;
    protected $evidencia_despues_interior;
    protected $evidencia_despues_exterior;
    protected $fecha_registro;

    /**
     * Get the value of id_reporte_final
     */
    public function getId_reporte_final()
    {
        return $this->id_reporte_final;
    }

    /**
     * Set the value of id_reporte_final
     *
     * @return  self
     */
    public function setId_reporte_final($id_reporte_final)
    {
        $this->id_reporte_final = $id_reporte_final;

        return $this;
    }

    /**
     * Get the value of fecha_servicio
     */
    public function getFecha_servicio()
    {
        return $this->fecha_servicio;
    }

    /**
     * Set the value of fecha_servicio
     *
     * @return  self
     */
    public function setFecha_servicio($fecha_servicio)
    {
        $this->fecha_servicio = $fecha_servicio;

        return $this;
    }


    /**
     * Get the value of id_equipo
     */
    public function getId_equipo()
    {
        return $this->id_equipo;
    }

    /**
     * Set the value of id_equipo
     *
     * @return  self
     */
    public function setId_equipo($id_equipo)
    {
        $this->id_equipo = $id_equipo;

        return $this;
    }

    /**
     * Get the value of equipo_opera_inicio
     */
    public function getEquipo_opera_inicio()
    {
        if ($this->equipo_opera_inicio == 1) return explode(";", $this->equipo_opera_inicio . ';checked');
        if ($this->equipo_opera_inicio == 0) return explode(";", $this->equipo_opera_inicio . ';');

        return $this->equipo_opera_inicio;
    }

    /**
     * Set the value of equipo_opera_inicio
     *
     * @return  self
     */
    public function setEquipo_opera_inicio($equipo_opera_inicio)
    {
        $this->equipo_opera_inicio = $equipo_opera_inicio;

        return $this;
    }

    /**
     * Get the value of limpieza_general
     */
    public function getLimpieza_general()
    {
        if ($this->limpieza_general == 1) return explode(";", $this->limpieza_general . ';checked');
        if ($this->limpieza_general == 0) return explode(";", $this->limpieza_general . ';');

        return $this->limpieza_general;
    }

    /**
     * Set the value of limpieza_general
     *
     * @return  self
     */
    public function setLimpieza_general($limpieza_general)
    {
        $this->limpieza_general = $limpieza_general;

        return $this;
    }

    /**
     * Get the value of limpieza_filtros
     */
    public function getLimpieza_filtros()
    {
        if ($this->limpieza_filtros == 1) return explode(";", $this->limpieza_filtros . ';checked');
        if ($this->limpieza_filtros == 0) return explode(";", $this->limpieza_filtros . ';');

        return $this->limpieza_filtros;
    }

    /**
     * Set the value of limpieza_filtros
     *
     * @return  self
     */
    public function setLimpieza_filtros($limpieza_filtros)
    {
        $this->limpieza_filtros = $limpieza_filtros;

        return $this;
    }

    /**
     * Get the value of limpieza_serpentin
     */
    public function getLimpieza_serpentin()
    {
        if ($this->limpieza_serpentin == 1) return explode(";", $this->limpieza_serpentin . ';checked');
        if ($this->limpieza_serpentin == 0) return explode(";", $this->limpieza_serpentin . ';');

        return $this->limpieza_serpentin;
    }

    /**
     * Set the value of limpieza_serpentin
     *
     * @return  self
     */
    public function setLimpieza_serpentin($limpieza_serpentin)
    {
        $this->limpieza_serpentin = $limpieza_serpentin;

        return $this;
    }

    /**
     * Get the value of limpieza_bandeja
     */
    public function getLimpieza_bandeja()
    {
        if ($this->limpieza_bandeja == 1) return explode(";", $this->limpieza_bandeja . ';checked');
        if ($this->limpieza_bandeja == 0) return explode(";", $this->limpieza_bandeja . ';');

        return $this->limpieza_bandeja;
    }

    /**
     * Set the value of limpieza_bandeja
     *
     * @return  self
     */
    public function setLimpieza_bandeja($limpieza_bandeja)
    {
        $this->limpieza_bandeja = $limpieza_bandeja;

        return $this;
    }

    /**
     * Get the value of serpentin_condensador
     */
    public function getSerpentin_condensador()
    {
        if ($this->serpentin_condensador == 1) return explode(";", $this->serpentin_condensador . ';checked');
        if ($this->serpentin_condensador == 0) return explode(";", $this->serpentin_condensador . ';');

        return $this->serpentin_condensador;
    }

    /**
     * Set the value of serpentin_condensador
     *
     * @return  self
     */
    public function setSerpentin_condensador($serpentin_condensador)
    {
        $this->serpentin_condensador = $serpentin_condensador;

        return $this;
    }

    /**
     * Get the value of limpieza_drenaje
     */
    public function getLimpieza_drenaje()
    {
        if ($this->limpieza_drenaje == 1) return explode(";", $this->limpieza_drenaje . ';checked');
        if ($this->limpieza_drenaje == 0) return explode(";", $this->limpieza_drenaje . ';');

        return $this->limpieza_drenaje;
    }

    /**
     * Set the value of limpieza_drenaje
     *
     * @return  self
     */
    public function setLimpieza_drenaje($limpieza_drenaje)
    {
        $this->limpieza_drenaje = $limpieza_drenaje;

        return $this;
    }

    /**
     * Get the value of verificacion
     */
    public function getVerificacion()
    {
        if ($this->verificacion == 1) return explode(";", $this->verificacion . ';checked');
        if ($this->verificacion == 0) return explode(";", $this->verificacion . ';');

        return $this->verificacion;
    }

    /**
     * Set the value of verificacion
     *
     * @return  self
     */
    public function setVerificacion($verificacion)
    {
        $this->verificacion = $verificacion;

        return $this;
    }

    /**
     * Get the value of estado_carcasa
     */
    public function getEstado_carcasa_interior()
    {
        if ($this->estado_carcasa_interior == 1) return explode(";", $this->estado_carcasa_interior . ';checked');
        if ($this->estado_carcasa_interior == 0) return explode(";", $this->estado_carcasa_interior . ';');

        return $this->estado_carcasa_interior;
    }

    /**
     * Set the value of estado_carcasa
     *
     * @return  self
     */
    public function setEstado_carcasa_interior($estado_carcasa_interior)
    {
        $this->estado_carcasa_interior = $estado_carcasa_interior;

        return $this;
    }

    /**
     * Get the value of estado_equipo
     */
    public function getEstado_equipo()
    {
        if ($this->estado_equipo == 1) return explode(";", $this->estado_equipo . ';Bueno');
        if ($this->estado_equipo == 2) return explode(";", $this->estado_equipo . ';Regular');
        if ($this->estado_equipo == 3) return explode(";", $this->estado_equipo . ';Requiere cambio');

        return $this->estado_equipo;
    }

    /**
     * Set the value of estado_equipo
     *
     * @return  self
     */
    public function setEstado_equipo($estado_equipo)
    {
        $this->estado_equipo = $estado_equipo;

        return $this;
    }

    /**
     * Get the value of equipo_opera_fin
     */
    public function getEquipo_opera_fin()
    {
        if ($this->equipo_opera_fin == 1) return explode(";", $this->equipo_opera_fin . ';checked');
        if ($this->equipo_opera_fin == 0) return explode(";", $this->equipo_opera_fin . ';');

        return $this->equipo_opera_fin;
    }

    /**
     * Set the value of equipo_opera_fin
     *
     * @return  self
     */
    public function setEquipo_opera_fin($equipo_opera_fin)
    {
        $this->equipo_opera_fin = $equipo_opera_fin;

        return $this;
    }

    /**
     * Get the value of observaciones
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Set the value of observaciones
     *
     * @return  self
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;

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
     * Get the value of firma
     */
    public function getFirma()
    {
        return $this->firma;
    }

    /**
     * Set the value of firma
     *
     * @return  self
     */
    public function setFirma($firma)
    {
        $this->firma = $firma;

        return $this;
    }

    /**
     * Get the value of ubicacion
     */
    public function getUbicacion()
    {
        if ($this->ubicacion == 1) return explode(";", $this->ubicacion . ';Sala');
        if ($this->ubicacion == 2) return explode(";", $this->ubicacion . ';Comedor');
        if ($this->ubicacion == 3) return explode(";", $this->ubicacion . ';Habitación principal');
        if ($this->ubicacion == 4) return explode(";", $this->ubicacion . ';Habitación 1');
        if ($this->ubicacion == 5) return explode(";", $this->ubicacion . ';Habitación 2');
        if ($this->ubicacion == 6) return explode(";", $this->ubicacion . ';Habitación 3');
        if ($this->ubicacion == 7) return explode(";", $this->ubicacion . ';Estudio');
        if ($this->ubicacion == 8) return explode(";", $this->ubicacion . ';Family');
        if ($this->ubicacion == 9) return explode(";", $this->ubicacion . ';Otro');
        return $this->ubicacion;
    }

    /**
     * Set the value of ubicacion
     *
     * @return  self
     */
    public function setUbicacion($ubicacion)
    {
        $this->ubicacion = $ubicacion;

        return $this;
    }

    /**
     * Get the value of tipo_uso
     */
    public function getTipo_uso()
    {
        if ($this->tipo_uso == 1) return explode(";", $this->tipo_uso . ';Comercial');
        if ($this->tipo_uso == 2) return explode(";", $this->tipo_uso . ';Residencial');
        if ($this->tipo_uso == 3) return explode(";", $this->tipo_uso . ';Industrial');
        if ($this->tipo_uso == 4) return explode(";", $this->tipo_uso . ';Otro');
        return $this->tipo_uso;
    }

    /**
     * Set the value of tipo_uso
     *
     * @return  self
     */
    public function setTipo_uso($tipo_uso)
    {
        $this->tipo_uso = $tipo_uso;

        return $this;
    }

    /**
     * Get the value of presion_alta
     */
    public function getPresion_alta()
    {
        return $this->presion_alta;
    }

    /**
     * Set the value of presion_alta
     *
     * @return  self
     */
    public function setPresion_alta($presion_alta)
    {
        $this->presion_alta = $presion_alta;

        return $this;
    }

    /**
     * Get the value of presion_baja
     */
    public function getPresion_baja()
    {
        return $this->presion_baja;
    }

    /**
     * Set the value of presion_baja
     *
     * @return  self
     */
    public function setPresion_baja($presion_baja)
    {
        $this->presion_baja = $presion_baja;

        return $this;
    }

    /**
     * Get the value of presion_reposo
     */
    public function getPresion_reposo()
    {
        return $this->presion_reposo;
    }

    /**
     * Set the value of presion_reposo
     *
     * @return  self
     */
    public function setPresion_reposo($presion_reposo)
    {
        $this->presion_reposo = $presion_reposo;

        return $this;
    }

    /**
     * Get the value of temperatura_salida
     */
    public function getTemperatura_salida()
    {
        return $this->temperatura_salida;
    }

    /**
     * Set the value of temperatura_salida
     *
     * @return  self
     */
    public function setTemperatura_salida($temperatura_salida)
    {
        $this->temperatura_salida = $temperatura_salida;

        return $this;
    }

    /**
     * Get the value of temperatura_entrada
     */
    public function getTemperatura_entrada()
    {
        return $this->temperatura_entrada;
    }

    /**
     * Set the value of temperatura_entrada
     *
     * @return  self
     */
    public function setTemperatura_entrada($temperatura_entrada)
    {
        $this->temperatura_entrada = $temperatura_entrada;

        return $this;
    }

    /**
     * Get the value of comentario_estado_equipo
     */
    public function getComentario_estado_equipo()
    {
        return $this->comentario_estado_equipo;
    }

    /**
     * Set the value of comentario_estado_equipo
     *
     * @return  self
     */
    public function setComentario_estado_equipo($comentario_estado_equipo)
    {
        $this->comentario_estado_equipo = $comentario_estado_equipo;

        return $this;
    }

    /**
     * Get the value of temperatura_ret
     */
    public function getTemperatura_ret()
    {
        return $this->temperatura_ret;
    }

    /**
     * Set the value of temperatura_ret
     *
     * @return  self
     */
    public function setTemperatura_ret($temperatura_ret)
    {
        $this->temperatura_ret = $temperatura_ret;

        return $this;
    }

    /**
     * Get the value of temperatura_sum
     */
    public function getTemperatura_sum()
    {
        return $this->temperatura_sum;
    }

    /**
     * Set the value of temperatura_sum
     *
     * @return  self
     */
    public function setTemperatura_sum($temperatura_sum)
    {
        $this->temperatura_sum = $temperatura_sum;

        return $this;
    }

    /**
     * Get the value of voltaje
     */
    public function getVoltaje()
    {
        return $this->voltaje;
    }

    /**
     * Set the value of voltaje
     *
     * @return  self
     */
    public function setVoltaje($voltaje)
    {
        $this->voltaje = $voltaje;

        return $this;
    }

    /**
     * Get the value of amperaje
     */
    public function getAmperaje()
    {
        return $this->amperaje;
    }

    /**
     * Set the value of amperaje
     *
     * @return  self
     */
    public function setAmperaje($amperaje)
    {
        $this->amperaje = $amperaje;

        return $this;
    }

    /**
     * Get the value of fases
     */
    public function getFases()
    {
        return $this->fases;
    }

    /**
     * Set the value of fases
     *
     * @return  self
     */
    public function setFases($fases)
    {
        $this->fases = $fases;

        return $this;
    }

    /**
     * Get the value of estado_equipo_exterior
     */
    public function getEstado_equipo_exterior()
    {
        if ($this->estado_equipo_exterior == 1) return explode(";", $this->estado_equipo_exterior . ';checked');
        if ($this->estado_equipo_exterior == 0) return explode(";", $this->estado_equipo_exterior . ';');
        return $this->estado_equipo_exterior;
    }

    /**
     * Set the value of estado_equipo_exterior
     *
     * @return  self
     */
    public function setEstado_equipo_exterior($estado_equipo_exterior)
    {
        $this->estado_equipo_exterior = $estado_equipo_exterior;

        return $this;
    }

    /**
     * Get the value of prox_servicio
     */
    public function getProx_servicio()
    {
        return $this->prox_servicio;
    }

    /**
     * Set the value of prox_servicio
     *
     * @return  self
     */
    public function setProx_servicio($prox_servicio)
    {
        $this->prox_servicio = $prox_servicio;

        return $this;
    }

    /**
     * Get the value of diagnostico_mant_corr
     */
    public function getDiagnostico_mant_corr()
    {
        return $this->diagnostico_mant_corr;
    }

    /**
     * Set the value of diagnostico_mant_corr
     *
     * @return  self
     */
    public function setDiagnostico_mant_corr($diagnostico_mant_corr)
    {
        $this->diagnostico_mant_corr = $diagnostico_mant_corr;

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
     * Get the value of evidencia_antes_interior
     */
    public function getEvidencia_antes_interior()
    {
        return $this->evidencia_antes_interior;
    }

    /**
     * Set the value of evidencia_antes_interior
     *
     * @return  self
     */
    public function setEvidencia_antes_interior($evidencia_antes_interior)
    {
        $this->evidencia_antes_interior = $evidencia_antes_interior;

        return $this;
    }

    /**
     * Get the value of evidencia_antes_exterior
     */
    public function getEvidencia_antes_exterior()
    {
        return $this->evidencia_antes_exterior;
    }

    /**
     * Set the value of evidencia_antes_exterior
     *
     * @return  self
     */
    public function setEvidencia_antes_exterior($evidencia_antes_exterior)
    {
        $this->evidencia_antes_exterior = $evidencia_antes_exterior;

        return $this;
    }

    /**
     * Get the value of evidencia_despues_interior
     */
    public function getEvidencia_despues_interior()
    {
        return $this->evidencia_despues_interior;
    }

    /**
     * Set the value of evidencia_despues_interior
     *
     * @return  self
     */
    public function setEvidencia_despues_interior($evidencia_despues_interior)
    {
        $this->evidencia_despues_interior = $evidencia_despues_interior;

        return $this;
    }

    /**
     * Get the value of evidencia_despues_exterior
     */
    public function getEvidencia_despues_exterior()
    {
        return $this->evidencia_despues_exterior;
    }

    /**
     * Set the value of evidencia_despues_exterior
     *
     * @return  self
     */
    public function setEvidencia_despues_exterior($evidencia_despues_exterior)
    {
        $this->evidencia_despues_exterior = $evidencia_despues_exterior;

        return $this;
    }

    /**
     * Get the value of otra_ubicacion
     */ 
    public function getOtra_ubicacion()
    {
        return $this->otra_ubicacion;
    }

    /**
     * Set the value of otra_ubicacion
     *
     * @return  self
     */ 
    public function setOtra_ubicacion($otra_ubicacion)
    {
        $this->otra_ubicacion = $otra_ubicacion;

        return $this;
    }
}
