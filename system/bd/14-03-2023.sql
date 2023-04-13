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

ALTER TABLE `Herramienta`
  ADD PRIMARY KEY (`id_herramienta`);

ALTER TABLE `Herramienta`
  MODIFY `id_herramienta` int(11) NOT NULL AUTO_INCREMENT;
