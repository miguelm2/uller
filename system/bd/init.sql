--
-- Estructura de tabla para la tabla `Administrador`
--
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

--
-- Indices de la tabla `Administrador`
--
ALTER TABLE `Administrador`
  ADD PRIMARY KEY (`id_administrador`);

--
-- AUTO_INCREMENT de la tabla `Administrador`
--
ALTER TABLE `Administrador`
  MODIFY `id_administrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;




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
-- Indices de la tabla `Perfil`
--
ALTER TABLE `Perfil`
  ADD PRIMARY KEY (`id_perfil`);
--
-- AUTO_INCREMENT de la tabla `Perfil`
--
ALTER TABLE `Perfil`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

INSERT INTO `Perfil` (`id_perfil`, `nombre`, `direccion`, `correo`, `telefono`, `departamento`, `ciudad`, `nit`, `wp`, `fb`, `instagram`, `imagen`, `imagen2`, `color1`, `url`) VALUES
(1, 'Aplicacion web', '', '', '', '', '', '', '', '', '', '', '', '', '');


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
  `estado` INT NOT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Mensaje`
--
ALTER TABLE `Mensaje`
  ADD PRIMARY KEY (`id_mensaje`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Mensaje`
--
ALTER TABLE `Mensaje`
  MODIFY `id_mensaje` int(11) NOT NULL AUTO_INCREMENT;



--
-- Estructura de tabla para la tabla `usuario`
--

  CREATE TABLE `Usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `cedula` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `estado` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`id_usuario`);

ALTER TABLE `Usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;