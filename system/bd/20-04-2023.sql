--
-- Estructura de tabla para la tabla `InformeTicket`
--

CREATE TABLE `InformeTicket` (
  `id_informe` int(11) NOT NULL,
  `id_ticket` int(11) NOT NULL,
  `fecha_servicio` date NOT NULL,
  `fecha_ultimo_servicio` date NOT NULL,
  `ubicacion_equipo` varchar(255) NOT NULL,
  `tipo_uso` int(11) NOT NULL,
  `tipo_equipo` varchar(255) NOT NULL,
  `presenta_falla` varchar(255) NOT NULL,
  `capacidad` varchar(255) NOT NULL,
  `marca` varchar(255) NOT NULL,
  `notas` varchar(255) NOT NULL,
  `observaciones` text NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `InformeTicket`
  ADD PRIMARY KEY (`id_informe`);

ALTER TABLE `InformeTicket`
  MODIFY `id_informe` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;