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

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Insumo`
--
ALTER TABLE `Insumo`
  ADD PRIMARY KEY (`id_insumo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Insumo`
--
ALTER TABLE `Insumo`
  MODIFY `id_insumo` int(11) NOT NULL AUTO_INCREMENT;