--
-- Estructura de tabla para la tabla `Diagnostico`
--

CREATE TABLE `Diagnostico` (
  `id_diagnostico` int(11) NOT NULL,
  `id_ticket` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `Diagnostico`
  ADD PRIMARY KEY (`id_diagnostico`);

ALTER TABLE `Diagnostico`
  MODIFY `id_diagnostico` int(11) NOT NULL AUTO_INCREMENT;



--
-- Estructura de tabla para la tabla `HerramientaDiagnostico`
--

CREATE TABLE `HerramientaDiagnostico` (
  `id_herramienta_diagnostico` int(11) NOT NULL,
  `id_diagnostico` int(11) NOT NULL,
  `id_ticket` int(11) NOT NULL,
  `id_herramienta` int(11) NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


ALTER TABLE `HerramientaDiagnostico`
  ADD PRIMARY KEY (`id_herramienta_diagnostico`);


ALTER TABLE `HerramientaDiagnostico`
  MODIFY `id_herramienta_diagnostico` int(11) NOT NULL AUTO_INCREMENT;


--
-- Estructura de tabla para la tabla `MaterialDiagnostico`
--

CREATE TABLE `MaterialDiagnostico` (
  `id_material_diagnostico` int(11) NOT NULL,
  `id_diagnostico` int(11) NOT NULL,
  `id_ticket` int(11) NOT NULL,
  `id_material` int(11) NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


ALTER TABLE `MaterialDiagnostico`
  ADD PRIMARY KEY (`id_material_diagnostico`);


ALTER TABLE `MaterialDiagnostico`
  MODIFY `id_material_diagnostico` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;


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

ALTER TABLE `AyudanteDiagnostico`
  ADD PRIMARY KEY (`id_ayudante_diagnostico`);


ALTER TABLE `AyudanteDiagnostico`
  MODIFY `id_ayudante_diagnostico` int(11) NOT NULL AUTO_INCREMENT;

