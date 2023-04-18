ALTER TABLE `TipoEquipo` ADD `id_usuario` INT NOT NULL AFTER `id_tipo`;

ALTER TABLE `Ticket` DROP `tipo_usuario`;
ALTER TABLE `Ticket` DROP `id_tipo_equipo`;


--
-- Estructura de tabla para la tabla `EquipoTicket`
--

CREATE TABLE `EquipoTicket` (
  `id_equipo_ticket` int(11) NOT NULL,
  `id_ticket` int(11) NOT NULL,
  `id_equipo` int(11) NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `EquipoTicket`
  ADD PRIMARY KEY (`id_equipo_ticket`);

ALTER TABLE `EquipoTicket`
  MODIFY `id_equipo_ticket` int(11) NOT NULL AUTO_INCREMENT;