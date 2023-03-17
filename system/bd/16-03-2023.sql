--
-- Estructura de tabla para la tabla `Material`
--

CREATE TABLE `Material` (
  `id_material` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `Material`
  ADD PRIMARY KEY (`id_material`);

ALTER TABLE `Material`
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT;


--
-- Estructura de tabla para la tabla `TipoEquipo`
--

CREATE TABLE `TipoEquipo` (
  `id_tipo` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `TipoEquipo`
  ADD PRIMARY KEY (`id_tipo`);


ALTER TABLE `TipoEquipo`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT;


--
-- Estructura de tabla para la tabla `TipoServicio`
--

CREATE TABLE `TipoServicio` (
  `id_tipo` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `TipoServicio`
  ADD PRIMARY KEY (`id_tipo`);

ALTER TABLE `TipoServicio`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;