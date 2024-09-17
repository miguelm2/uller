<?php
class ReporteFinalDTO
{
    protected $id_reporte_final;
    protected $id_ticket;
    protected $id_tipo;
    protected $fecha_servicio;
    protected $mantenimiento_preventivo;
    protected $equipo_opera_inicio;
    protected $limpieza_general;
    protected $limpieza_filtros;
    protected $limpieza_serpentin;
    protected $limpieza_bandeja;
    protected $serpentin_condensador;
    protected $limpieza_drenaje;
    protected $verificacion;
    protected $estado_carcasa;
    protected $estado_equipo;
    protected $equipo_opera_fin;
    protected $mantenimiento_correctivo;
    protected $falla_encontrada;
    protected $repuestos;
    protected $insumos;
    protected $tarjetas_electronicas;
    protected $estimado_horas;
    protected $observaciones;
    protected $fecha_registro;
    protected $firma;

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
     * Get the value of mantenimiento_preventivo
     */
    public function getMantenimiento_preventivo()
    {
        if ($this->mantenimiento_preventivo == 1) return explode(";", $this->mantenimiento_preventivo . ';Si');
        if ($this->mantenimiento_preventivo == 0) return explode(";", $this->mantenimiento_preventivo . ';No');

        return $this->mantenimiento_preventivo;
    }

    /**
     * Set the value of mantenimiento_preventivo
     *
     * @return  self
     */
    public function setMantenimiento_preventivo($mantenimiento_preventivo)
    {
        $this->mantenimiento_preventivo = $mantenimiento_preventivo;

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
    public function getEstado_carcasa()
    {
        if ($this->estado_carcasa == 1) return explode(";", $this->estado_carcasa . ';checked');
        if ($this->estado_carcasa == 0) return explode(";", $this->estado_carcasa . ';');

        return $this->estado_carcasa;
    }

    /**
     * Set the value of estado_carcasa
     *
     * @return  self
     */
    public function setEstado_carcasa($estado_carcasa)
    {
        $this->estado_carcasa = $estado_carcasa;

        return $this;
    }

    /**
     * Get the value of estado_equipo
     */
    public function getEstado_equipo()
    {
        if ($this->estado_equipo == 1) return explode(";", $this->estado_equipo . ';checked');
        if ($this->estado_equipo == 0) return explode(";", $this->estado_equipo . ';');

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
     * Get the value of mantenimiento_correctivo
     */
    public function getMantenimiento_correctivo()
    {
        if ($this->mantenimiento_correctivo == 1) return explode(";", $this->mantenimiento_correctivo . ';Si');
        if ($this->mantenimiento_correctivo == 0) return explode(";", $this->mantenimiento_correctivo . ';No');

        return $this->mantenimiento_correctivo;
    }

    /**
     * Set the value of mantenimiento_correctivo
     *
     * @return  self
     */
    public function setMantenimiento_correctivo($mantenimiento_correctivo)
    {
        $this->mantenimiento_correctivo = $mantenimiento_correctivo;

        return $this;
    }

    /**
     * Get the value of falla_encontrada
     */
    public function getFalla_encontrada()
    {
        return $this->falla_encontrada;
    }

    /**
     * Set the value of falla_encontrada
     *
     * @return  self
     */
    public function setFalla_encontrada($falla_encontrada)
    {
        $this->falla_encontrada = $falla_encontrada;

        return $this;
    }

    /**
     * Get the value of repuestos
     */
    public function getRepuestos()
    {
        return $this->repuestos;
    }

    /**
     * Set the value of repuestos
     *
     * @return  self
     */
    public function setRepuestos($repuestos)
    {
        $this->repuestos = $repuestos;

        return $this;
    }

    /**
     * Get the value of insumos
     */
    public function getInsumos()
    {
        return $this->insumos;
    }

    /**
     * Set the value of insumos
     *
     * @return  self
     */
    public function setInsumos($insumos)
    {
        $this->insumos = $insumos;

        return $this;
    }

    /**
     * Get the value of tarjetas_electronicas
     */
    public function getTarjetas_electronicas()
    {
        if ($this->tarjetas_electronicas == 1) return explode(";", $this->tarjetas_electronicas . ';Si');
        if ($this->tarjetas_electronicas == 0) return explode(";", $this->tarjetas_electronicas . ';No');

        return $this->tarjetas_electronicas;
    }

    /**
     * Set the value of tarjetas_electronicas
     *
     * @return  self
     */
    public function setTarjetas_electronicas($tarjetas_electronicas)
    {
        $this->tarjetas_electronicas = $tarjetas_electronicas;

        return $this;
    }

    /**
     * Get the value of estimado_horas
     */
    public function getEstimado_horas()
    {
        return $this->estimado_horas;
    }

    /**
     * Set the value of estimado_horas
     *
     * @return  self
     */
    public function setEstimado_horas($estimado_horas)
    {
        $this->estimado_horas = $estimado_horas;

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
     * Get the value of id_tipo
     */
    public function getId_tipo()
    {
        return $this->id_tipo;
    }

    /**
     * Set the value of id_tipo
     *
     * @return  self
     */
    public function setId_tipo($id_tipo)
    {
        $this->id_tipo = $id_tipo;

        return $this;
    }
}
