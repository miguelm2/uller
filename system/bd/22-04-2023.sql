--
-- Estructura de tabla para la tabla `ReporteFinalTicket`
--

CREATE TABLE `ReporteFinalTicket` (
  `id_reporte_final` int(11) NOT NULL,
  `id_ticket` int(11) NOT NULL,
  `fecha_servicio` date NOT NULL,
  `serial` varchar(255) NOT NULL,
  `year_compra` year(4) NOT NULL,
  `voltaje` varchar(255) NOT NULL,
  `amperaje` varchar(255) NOT NULL,
  `fases` varchar(255) NOT NULL,
  `mantenimiento_preventivo` int(11) NOT NULL,
  `equipo_opera_inicio` int(11) NOT NULL,
  `limpieza_general` int(11) NOT NULL,
  `limpieza_filtros` int(11) NOT NULL,
  `limpieza_serpentin` int(11) NOT NULL,
  `limpieza_bandeja` int(11) NOT NULL,
  `serpentin_condensador` int(11) NOT NULL,
  `limpieza_drenaje` int(11) NOT NULL,
  `verificacion` int(11) NOT NULL,
  `estado_carcasa` int(11) NOT NULL,
  `estado_equipo` int(11) NOT NULL,
  `equipo_opera_fin` int(11) NOT NULL,
  `mantenimiento_correctivo` int(11) NOT NULL,
  `falla_encontrada` varchar(255) NOT NULL,
  `repuestos` varchar(255) NOT NULL,
  `insumos` varchar(255) NOT NULL,
  `tarjetas_electronicas` int(11) NOT NULL,
  `estimado_horas` int(11) NOT NULL,
  `observaciones` text NOT NULL,
  `fecha_registro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


ALTER TABLE `ReporteFinalTicket`
  ADD PRIMARY KEY (`id_reporte_final`);

ALTER TABLE `ReporteFinalTicket`
  MODIFY `id_reporte_final` int(11) NOT NULL AUTO_INCREMENT;