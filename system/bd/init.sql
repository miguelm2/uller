CREATE TABLE `Administrador` (
  `id_administrador` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `cedula` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `estado` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `Administrador`
--

INSERT INTO `Administrador` (`id_administrador`, `nombre`, `correo`, `telefono`, `cedula`, `pass`, `estado`, `tipo`, `fecha_registro`) VALUES
(1, 'Kondory Tecnologia', 'contacto@kondori.co', '789', '789', 'd023f10d2e59f09e18a4abe350483498eb896f6ed422d897fe18a686c264136f51909074da618bcff103e5bca6ce6982ab53382791287ca52cf80e82f200f706', 1, 0, '2022-07-26 19:01:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `AyudanteDiagnostico`
--

CREATE TABLE `AyudanteDiagnostico` (
  `id_ayudante_diagnostico` int(11) NOT NULL,
  `id_diagnostico` int(11) NOT NULL,
  `id_ticket` int(11) NOT NULL,
  `id_ayudante` int(11) NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Blog`
--

CREATE TABLE `Blog` (
  `id_blog` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `tipo_usuario` varchar(255) NOT NULL,
  `titulo` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `vistas` int(11) NOT NULL,
  `contenido` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `imagen` longtext DEFAULT NULL,
  `tipo_imagen` varchar(255) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CobroAdicional`
--

CREATE TABLE `CobroAdicional` (
  `id_cobro_adicional` int(11) NOT NULL,
  `id_cuenta` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `observacion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CuentaCobro`
--

CREATE TABLE `CuentaCobro` (
  `id_cuenta` int(11) NOT NULL,
  `id_tecnico` int(11) NOT NULL,
  `id_ticket` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha_registro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Diagnostico`
--

CREATE TABLE `Diagnostico` (
  `id_diagnostico` int(11) NOT NULL,
  `id_ticket` int(11) NOT NULL,
  `numero_horas` int(11) NOT NULL,
  `numero_ayudantes` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `precio` double NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Equipo`
--

CREATE TABLE `Equipo` (
  `id_equipo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `marca` varchar(255) NOT NULL,
  `modelo` varchar(255) NOT NULL,
  `serial_interior` varchar(255) NOT NULL,
  `serial_exterior` varchar(255) NOT NULL,
  `id_equipo_tipo` int(11) NOT NULL,
  `capacidad_btuh` float NOT NULL,
  `conexion_electrica` int(11) NOT NULL,
  `refrigerante` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `fecha_instalacion` date NOT NULL,
  `imagen_placa_interior` varchar(255) NOT NULL,
  `imagen_placa_exterior` varchar(255) NOT NULL,
  `inverter` varchar(4) NOT NULL,
  `year_fabricacion` year(4) NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `EquipoTicket`
--

CREATE TABLE `EquipoTicket` (
  `id_equipo_ticket` int(11) NOT NULL,
  `id_ticket` int(11) NOT NULL,
  `id_equipo` int(11) NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `EquipoTipo`
--

CREATE TABLE `EquipoTipo` (
  `id_equipo_tipo` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `EquipoTipo`
--

INSERT INTO `EquipoTipo` (`id_equipo_tipo`, `nombre`, `imagen`, `fecha_registro`) VALUES
(1, 'Mini Split', 'mini_split.png', '2024-09-19 17:40:45'),
(2, 'Central / Split', 'split_central.png', '2024-09-19 17:40:45'),
(3, 'Cassette', 'cassette.png', '2024-09-19 17:40:45'),
(4, 'Piso techo', 'piso_techo.jpg', '2024-09-19 17:40:45'),
(5, 'Ventana', 'ventana.png', '2024-09-19 17:40:45'),
(6, 'Otro', 'otro_aire.png', '2024-09-19 17:40:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Herramienta`
--

CREATE TABLE `Herramienta` (
  `id_herramienta` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `tipo` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `HerramientaDiagnostico`
--

CREATE TABLE `HerramientaDiagnostico` (
  `id_herramienta_diagnostico` int(11) NOT NULL,
  `id_diagnostico` int(11) NOT NULL,
  `id_ticket` int(11) NOT NULL,
  `id_herramienta` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `InformeTicket`
--

CREATE TABLE `InformeTicket` (
  `id_informe` int(11) NOT NULL,
  `id_ticket` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `fecha_servicio` date NOT NULL,
  `fecha_ultimo_servicio` date NOT NULL,
  `ubicacion_equipo` varchar(255) NOT NULL,
  `tipo_uso` int(11) NOT NULL,
  `presenta_falla` varchar(255) NOT NULL,
  `notas` varchar(255) NOT NULL,
  `observaciones` text NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Insumo`
--

CREATE TABLE `Insumo` (
  `id_insumo` int(11) NOT NULL,
  `id_tecnico` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Material`
--

CREATE TABLE `Material` (
  `id_material` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `MaterialDiagnostico`
--

CREATE TABLE `MaterialDiagnostico` (
  `id_material_diagnostico` int(11) NOT NULL,
  `id_diagnostico` int(11) NOT NULL,
  `id_ticket` int(11) NOT NULL,
  `id_material` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `unidad_medida` varchar(255) NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Mensaje`
--

CREATE TABLE `Mensaje` (
  `id_mensaje` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `mensaje` text NOT NULL,
  `ip` varchar(255) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Perfil`
--

CREATE TABLE `Perfil` (
  `id_perfil` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `departamento` varchar(255) NOT NULL,
  `ciudad` varchar(255) NOT NULL,
  `nit` varchar(255) NOT NULL,
  `wp` varchar(255) NOT NULL,
  `fb` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `imagen2` varchar(255) NOT NULL,
  `color1` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `Perfil`
--

INSERT INTO `Perfil` (`id_perfil`, `nombre`, `direccion`, `correo`, `telefono`, `departamento`, `ciudad`, `nit`, `wp`, `fb`, `instagram`, `imagen`, `imagen2`, `color1`, `url`) VALUES
(1, 'Uller', 'CALLE 123 # 45-67', 'uller@gmail.com', '1234567898', 'BOYACA', 'DUITAMA', '12345', '1234567898', 'uller', 'uller', 'perfil_1_952042110.png', '', '#2954ff', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ReporteFinalSolicitud`
--

CREATE TABLE `ReporteFinalSolicitud` (
  `id_reporte_final` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL,
  `id_equipo` int(11) NOT NULL,
  `fecha_servicio` date NOT NULL,
  `ubicacion` int(11) NOT NULL,
  `otra_ubicacion` varchar(255) DEFAULT NULL,
  `tipo_uso` int(11) NOT NULL,
  `presion_alta` varchar(255) NOT NULL,
  `presion_baja` varchar(255) NOT NULL,
  `presion_reposo` varchar(255) NOT NULL,
  `temperatura_salida` varchar(255) NOT NULL,
  `temperatura_entrada` varchar(255) NOT NULL,
  `temperatura_ret` varchar(255) NOT NULL,
  `temperatura_sum` varchar(255) NOT NULL,
  `voltaje` varchar(255) NOT NULL,
  `amperaje` varchar(255) NOT NULL,
  `fases` varchar(255) NOT NULL,
  `estado_equipo` int(11) NOT NULL,
  `comentario_estado_equipo` varchar(255) NOT NULL,
  `equipo_opera_inicio` int(11) NOT NULL,
  `limpieza_general` int(11) NOT NULL,
  `limpieza_filtros` int(11) NOT NULL,
  `limpieza_serpentin` int(11) NOT NULL,
  `limpieza_bandeja` int(11) NOT NULL,
  `serpentin_condensador` int(11) NOT NULL,
  `limpieza_drenaje` int(11) NOT NULL,
  `verificacion` int(11) NOT NULL,
  `estado_carcasa_interior` int(11) NOT NULL,
  `estado_equipo_exterior` int(11) NOT NULL,
  `equipo_opera_fin` int(11) NOT NULL,
  `diagnostico_mant_corr` varchar(255) NOT NULL,
  `observaciones` text NOT NULL,
  `prox_servicio` date NOT NULL,
  `evidencia_antes_interior` varchar(255) NOT NULL,
  `evidencia_antes_exterior` varchar(255) NOT NULL,
  `evidencia_despues_interior` varchar(255) NOT NULL,
  `evidencia_despues_exterior` varchar(255) NOT NULL,
  `firma` text DEFAULT NULL,
  `fecha_registro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ReporteFinalTicket`
--

CREATE TABLE `ReporteFinalTicket` (
  `id_reporte_final` int(11) NOT NULL,
  `id_ticket` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `fecha_servicio` date NOT NULL,
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
  `firma` text DEFAULT NULL,
  `fecha_registro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Servicio`
--

CREATE TABLE `Servicio` (
  `id_servicio` int(11) NOT NULL,
  `id_solicitud` int(11) NOT NULL,
  `id_tipo_servicio` int(11) NOT NULL,
  `id_equipo_tipo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Solicitud`
--

CREATE TABLE `Solicitud` (
  `id_solicitud` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `id_tecnico` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `valor` int(11) NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tecnico`
--

CREATE TABLE `Tecnico` (
  `id_tecnico` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `cedula` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `ciudad` varchar(255) NOT NULL,
  `estado_civil` varchar(255) NOT NULL,
  `numero_hijos` int(11) NOT NULL,
  `banco` varchar(255) NOT NULL,
  `tipo_cuenta` varchar(255) NOT NULL,
  `numero_cuenta` varchar(255) NOT NULL,
  `estado` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TecnicoTicket`
--

CREATE TABLE `TecnicoTicket` (
  `id_tecnico_ticket` int(11) NOT NULL,
  `id_ticket` int(11) NOT NULL,
  `id_tecnico` int(11) NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Ticket`
--

CREATE TABLE `Ticket` (
  `id_ticket` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_tipo_servicio` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TipoEquipo`
--

CREATE TABLE `TipoEquipo` (
  `id_tipo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `marca` varchar(255) NOT NULL,
  `modelo` varchar(255) NOT NULL,
  `year_fabricacion` year(4) NOT NULL,
  `serial_interior` varchar(255) NOT NULL,
  `serial_exterior` varchar(255) NOT NULL,
  `tipo_equipo` varchar(255) NOT NULL,
  `capacidad_btuh` float NOT NULL,
  `voltaje_fases` varchar(255) NOT NULL,
  `refrigerante` varchar(255) NOT NULL,
  `inverter` varchar(4) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TipoServicio`
--

CREATE TABLE `TipoServicio` (
  `id_tipo` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `valor` double NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

CREATE TABLE `Usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `cedula` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `localidad` varchar(255) NOT NULL,
  `barrio_conjunto` varchar(255) NOT NULL,
  `torre` varchar(20) DEFAULT NULL,
  `numero_apto` varchar(20) DEFAULT NULL,
  `ciudad` varchar(255) NOT NULL,
  `departamento` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `estado` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Administrador`
--
ALTER TABLE `Administrador`
  ADD PRIMARY KEY (`id_administrador`);

--
-- Indices de la tabla `AyudanteDiagnostico`
--
ALTER TABLE `AyudanteDiagnostico`
  ADD PRIMARY KEY (`id_ayudante_diagnostico`);

--
-- Indices de la tabla `Blog`
--
ALTER TABLE `Blog`
  ADD PRIMARY KEY (`id_blog`);

--
-- Indices de la tabla `CobroAdicional`
--
ALTER TABLE `CobroAdicional`
  ADD PRIMARY KEY (`id_cobro_adicional`);

--
-- Indices de la tabla `CuentaCobro`
--
ALTER TABLE `CuentaCobro`
  ADD PRIMARY KEY (`id_cuenta`);

--
-- Indices de la tabla `Diagnostico`
--
ALTER TABLE `Diagnostico`
  ADD PRIMARY KEY (`id_diagnostico`);

--
-- Indices de la tabla `Equipo`
--
ALTER TABLE `Equipo`
  ADD PRIMARY KEY (`id_equipo`);

--
-- Indices de la tabla `EquipoTicket`
--
ALTER TABLE `EquipoTicket`
  ADD PRIMARY KEY (`id_equipo_ticket`);

--
-- Indices de la tabla `EquipoTipo`
--
ALTER TABLE `EquipoTipo`
  ADD PRIMARY KEY (`id_equipo_tipo`);

--
-- Indices de la tabla `Herramienta`
--
ALTER TABLE `Herramienta`
  ADD PRIMARY KEY (`id_herramienta`);

--
-- Indices de la tabla `HerramientaDiagnostico`
--
ALTER TABLE `HerramientaDiagnostico`
  ADD PRIMARY KEY (`id_herramienta_diagnostico`);

--
-- Indices de la tabla `InformeTicket`
--
ALTER TABLE `InformeTicket`
  ADD PRIMARY KEY (`id_informe`);

--
-- Indices de la tabla `Insumo`
--
ALTER TABLE `Insumo`
  ADD PRIMARY KEY (`id_insumo`);

--
-- Indices de la tabla `Material`
--
ALTER TABLE `Material`
  ADD PRIMARY KEY (`id_material`);

--
-- Indices de la tabla `MaterialDiagnostico`
--
ALTER TABLE `MaterialDiagnostico`
  ADD PRIMARY KEY (`id_material_diagnostico`);

--
-- Indices de la tabla `Mensaje`
--
ALTER TABLE `Mensaje`
  ADD PRIMARY KEY (`id_mensaje`);

--
-- Indices de la tabla `Perfil`
--
ALTER TABLE `Perfil`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `ReporteFinalSolicitud`
--
ALTER TABLE `ReporteFinalSolicitud`
  ADD PRIMARY KEY (`id_reporte_final`);

--
-- Indices de la tabla `ReporteFinalTicket`
--
ALTER TABLE `ReporteFinalTicket`
  ADD PRIMARY KEY (`id_reporte_final`);

--
-- Indices de la tabla `Servicio`
--
ALTER TABLE `Servicio`
  ADD PRIMARY KEY (`id_servicio`);

--
-- Indices de la tabla `Solicitud`
--
ALTER TABLE `Solicitud`
  ADD PRIMARY KEY (`id_solicitud`);

--
-- Indices de la tabla `Tecnico`
--
ALTER TABLE `Tecnico`
  ADD PRIMARY KEY (`id_tecnico`);

--
-- Indices de la tabla `TecnicoTicket`
--
ALTER TABLE `TecnicoTicket`
  ADD PRIMARY KEY (`id_tecnico_ticket`);

--
-- Indices de la tabla `Ticket`
--
ALTER TABLE `Ticket`
  ADD PRIMARY KEY (`id_ticket`);

--
-- Indices de la tabla `TipoEquipo`
--
ALTER TABLE `TipoEquipo`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `TipoServicio`
--
ALTER TABLE `TipoServicio`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Administrador`
--
ALTER TABLE `Administrador`
  MODIFY `id_administrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `AyudanteDiagnostico`
--
ALTER TABLE `AyudanteDiagnostico`
  MODIFY `id_ayudante_diagnostico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Blog`
--
ALTER TABLE `Blog`
  MODIFY `id_blog` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `CobroAdicional`
--
ALTER TABLE `CobroAdicional`
  MODIFY `id_cobro_adicional` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `CuentaCobro`
--
ALTER TABLE `CuentaCobro`
  MODIFY `id_cuenta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Diagnostico`
--
ALTER TABLE `Diagnostico`
  MODIFY `id_diagnostico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Equipo`
--
ALTER TABLE `Equipo`
  MODIFY `id_equipo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `EquipoTicket`
--
ALTER TABLE `EquipoTicket`
  MODIFY `id_equipo_ticket` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `EquipoTipo`
--
ALTER TABLE `EquipoTipo`
  MODIFY `id_equipo_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `Herramienta`
--
ALTER TABLE `Herramienta`
  MODIFY `id_herramienta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `HerramientaDiagnostico`
--
ALTER TABLE `HerramientaDiagnostico`
  MODIFY `id_herramienta_diagnostico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `InformeTicket`
--
ALTER TABLE `InformeTicket`
  MODIFY `id_informe` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Insumo`
--
ALTER TABLE `Insumo`
  MODIFY `id_insumo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Material`
--
ALTER TABLE `Material`
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `MaterialDiagnostico`
--
ALTER TABLE `MaterialDiagnostico`
  MODIFY `id_material_diagnostico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Mensaje`
--
ALTER TABLE `Mensaje`
  MODIFY `id_mensaje` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Perfil`
--
ALTER TABLE `Perfil`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ReporteFinalSolicitud`
--
ALTER TABLE `ReporteFinalSolicitud`
  MODIFY `id_reporte_final` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ReporteFinalTicket`
--
ALTER TABLE `ReporteFinalTicket`
  MODIFY `id_reporte_final` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Servicio`
--
ALTER TABLE `Servicio`
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Solicitud`
--
ALTER TABLE `Solicitud`
  MODIFY `id_solicitud` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Tecnico`
--
ALTER TABLE `Tecnico`
  MODIFY `id_tecnico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `TecnicoTicket`
--
ALTER TABLE `TecnicoTicket`
  MODIFY `id_tecnico_ticket` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Ticket`
--
ALTER TABLE `Ticket`
  MODIFY `id_ticket` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `TipoEquipo`
--
ALTER TABLE `TipoEquipo`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `TipoServicio`
--
ALTER TABLE `TipoServicio`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
