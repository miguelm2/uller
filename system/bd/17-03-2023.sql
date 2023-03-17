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
  `estado` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `Tecnico`
  ADD PRIMARY KEY (`id_tecnico`);

ALTER TABLE `Tecnico`
  MODIFY `id_tecnico` int(11) NOT NULL AUTO_INCREMENT;



--
-- Estructura de tabla para la tabla `Ticket`
--

CREATE TABLE `Ticket` (
  `id_ticket` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_tipo_equipo` int(11) NOT NULL,
  `id_tipo_servicio` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `tipo_usuario` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `Ticket`
  ADD PRIMARY KEY (`id_ticket`);

ALTER TABLE `Ticket`
  MODIFY `id_ticket` int(11) NOT NULL AUTO_INCREMENT;



--
-- Estructura de tabla para la tabla `TecnicoTicket`
--

CREATE TABLE `TecnicoTicket` (
  `id_tecnico_ticket` int(11) NOT NULL,
  `id_ticket` int(11) NOT NULL,
  `id_tecnico` int(11) NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


ALTER TABLE `TecnicoTicket`
  ADD PRIMARY KEY (`id_tecnico_ticket`);

ALTER TABLE `TecnicoTicket`
  MODIFY `id_tecnico_ticket` int(11) NOT NULL AUTO_INCREMENT;


