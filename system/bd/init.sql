-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-04-2023 a las 21:21:18
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 7.4.33
SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET
  time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;

/*!40101 SET NAMES utf8mb4 */
;

--
-- Base de datos: `uller_bd`
--
-- --------------------------------------------------------
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
) ENGINE = InnoDB DEFAULT CHARSET = latin1 COLLATE = latin1_swedish_ci;

--
-- Volcado de datos para la tabla `Administrador`
--
INSERT INTO
  `Administrador` (
    `id_administrador`,
    `nombre`,
    `correo`,
    `telefono`,
    `cedula`,
    `pass`,
    `estado`,
    `tipo`,
    `fecha_registro`
  )
VALUES
  (
    1,
    'Kondory Tecnologia',
    'contacto@kondori.co',
    '789',
    '789',
    'd023f10d2e59f09e18a4abe350483498eb896f6ed422d897fe18a686c264136f51909074da618bcff103e5bca6ce6982ab53382791287ca52cf80e82f200f706',
    1,
    0,
    '2022-07-26 19:01:56'
  );

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
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

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
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `EquipoTicket`
--
CREATE TABLE `EquipoTicket` (
  `id_equipo_ticket` int(11) NOT NULL,
  `id_ticket` int(11) NOT NULL,
  `id_equipo` int(11) NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

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
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

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
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

-- --------------------------------------------------------
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
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `Material`
--
CREATE TABLE `Material` (
  `id_material` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

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
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

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
) ENGINE = InnoDB DEFAULT CHARSET = latin1 COLLATE = latin1_swedish_ci;

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
) ENGINE = InnoDB DEFAULT CHARSET = latin1 COLLATE = latin1_swedish_ci;

--
-- Volcado de datos para la tabla `Perfil`
--
INSERT INTO
  `Perfil` (
    `id_perfil`,
    `nombre`,
    `direccion`,
    `correo`,
    `telefono`,
    `departamento`,
    `ciudad`,
    `nit`,
    `wp`,
    `fb`,
    `instagram`,
    `imagen`,
    `imagen2`,
    `color1`,
    `url`
  )
VALUES
  (
    1,
    'Uller',
    'CALLE 123 # 45-67',
    'uller@gmail.com',
    '1234567898',
    'BOYACA',
    'DUITAMA',
    '12345',
    '1234567898',
    'uller',
    'uller',
    'perfil_1_952042110.png',
    '',
    '#2954ff',
    ''
  );

-- --------------------------------------------------------
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
  `firma` text DEFAULT NULL,
  `fecha_registro` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

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
  `estado` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `TecnicoTicket`
--
CREATE TABLE `TecnicoTicket` (
  `id_tecnico_ticket` int(11) NOT NULL,
  `id_ticket` int(11) NOT NULL,
  `id_tecnico` int(11) NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

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
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `TipoEquipo`
--
CREATE TABLE `TipoEquipo` (
  `id_tipo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `TipoServicio`
--
CREATE TABLE `TipoServicio` (
  `id_tipo` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

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
  `ciudad` varchar(255) NOT NULL,
  `departamento` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `estado` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--
--
-- Indices de la tabla `Administrador`
--
ALTER TABLE
  `Administrador`
ADD
  PRIMARY KEY (`id_administrador`);

--
-- Indices de la tabla `AyudanteDiagnostico`
--
ALTER TABLE
  `AyudanteDiagnostico`
ADD
  PRIMARY KEY (`id_ayudante_diagnostico`);

--
-- Indices de la tabla `Diagnostico`
--
ALTER TABLE
  `Diagnostico`
ADD
  PRIMARY KEY (`id_diagnostico`);

--
-- Indices de la tabla `EquipoTicket`
--
ALTER TABLE
  `EquipoTicket`
ADD
  PRIMARY KEY (`id_equipo_ticket`);

--
-- Indices de la tabla `Herramienta`
--
ALTER TABLE
  `Herramienta`
ADD
  PRIMARY KEY (`id_herramienta`);

--
-- Indices de la tabla `HerramientaDiagnostico`
--
ALTER TABLE
  `HerramientaDiagnostico`
ADD
  PRIMARY KEY (`id_herramienta_diagnostico`);

--
-- Indices de la tabla `InformeTicket`
--
ALTER TABLE
  `InformeTicket`
ADD
  PRIMARY KEY (`id_informe`);

--
-- Indices de la tabla `Material`
--
ALTER TABLE
  `Material`
ADD
  PRIMARY KEY (`id_material`);

--
-- Indices de la tabla `MaterialDiagnostico`
--
ALTER TABLE
  `MaterialDiagnostico`
ADD
  PRIMARY KEY (`id_material_diagnostico`);

--
-- Indices de la tabla `Mensaje`
--
ALTER TABLE
  `Mensaje`
ADD
  PRIMARY KEY (`id_mensaje`);

--
-- Indices de la tabla `Perfil`
--
ALTER TABLE
  `Perfil`
ADD
  PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `ReporteFinalTicket`
--
ALTER TABLE
  `ReporteFinalTicket`
ADD
  PRIMARY KEY (`id_reporte_final`);

--
-- Indices de la tabla `Tecnico`
--
ALTER TABLE
  `Tecnico`
ADD
  PRIMARY KEY (`id_tecnico`);

--
-- Indices de la tabla `TecnicoTicket`
--
ALTER TABLE
  `TecnicoTicket`
ADD
  PRIMARY KEY (`id_tecnico_ticket`);

--
-- Indices de la tabla `Ticket`
--
ALTER TABLE
  `Ticket`
ADD
  PRIMARY KEY (`id_ticket`);

--
-- Indices de la tabla `TipoEquipo`
--
ALTER TABLE
  `TipoEquipo`
ADD
  PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `TipoServicio`
--
ALTER TABLE
  `TipoServicio`
ADD
  PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `Usuario`
--
ALTER TABLE
  `Usuario`
ADD
  PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--
--
-- AUTO_INCREMENT de la tabla `Administrador`
--
ALTER TABLE
  `Administrador`
MODIFY
  `id_administrador` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `AyudanteDiagnostico`
--
ALTER TABLE
  `AyudanteDiagnostico`
MODIFY
  `id_ayudante_diagnostico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Diagnostico`
--
ALTER TABLE
  `Diagnostico`
MODIFY
  `id_diagnostico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `EquipoTicket`
--
ALTER TABLE
  `EquipoTicket`
MODIFY
  `id_equipo_ticket` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Herramienta`
--
ALTER TABLE
  `Herramienta`
MODIFY
  `id_herramienta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `HerramientaDiagnostico`
--
ALTER TABLE
  `HerramientaDiagnostico`
MODIFY
  `id_herramienta_diagnostico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `InformeTicket`
--
ALTER TABLE
  `InformeTicket`
MODIFY
  `id_informe` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Material`
--
ALTER TABLE
  `Material`
MODIFY
  `id_material` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `MaterialDiagnostico`
--
ALTER TABLE
  `MaterialDiagnostico`
MODIFY
  `id_material_diagnostico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Mensaje`
--
ALTER TABLE
  `Mensaje`
MODIFY
  `id_mensaje` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Perfil`
--
ALTER TABLE
  `Perfil`
MODIFY
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ReporteFinalTicket`
--
ALTER TABLE
  `ReporteFinalTicket`
MODIFY
  `id_reporte_final` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Tecnico`
--
ALTER TABLE
  `Tecnico`
MODIFY
  `id_tecnico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `TecnicoTicket`
--
ALTER TABLE
  `TecnicoTicket`
MODIFY
  `id_tecnico_ticket` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Ticket`
--
ALTER TABLE
  `Ticket`
MODIFY
  `id_ticket` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `TipoEquipo`
--
ALTER TABLE
  `TipoEquipo`
MODIFY
  `id_tipo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `TipoServicio`
--
ALTER TABLE
  `TipoServicio`
MODIFY
  `id_tipo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Usuario`
--
ALTER TABLE
  `Usuario`
MODIFY
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

COMMIT;

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `Insumo`
--
CREATE TABLE `Insumo` (
  `id_insumo` int(11) NOT NULL,
  `id_tecnico` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--
--
-- Indices de la tabla `Insumo`
--
ALTER TABLE
  `Insumo`
ADD
  PRIMARY KEY (`id_insumo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--
--
-- AUTO_INCREMENT de la tabla `Insumo`
--
ALTER TABLE
  `Insumo`
MODIFY
  `id_insumo` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE
  `TipoEquipo`
ADD
  `marca` VARCHAR(255) NOT NULL
AFTER
  `nombre`,
ADD
  `modelo` VARCHAR(255) NOT NULL
AFTER
  `marca`,
ADD
  `year_fabricacion` YEAR NOT NULL
AFTER
  `modelo`,
ADD
  `serial_interior` VARCHAR(255) NOT NULL
AFTER
  `year_fabricacion`,
ADD
  `serial_exterior` VARCHAR(255) NOT NULL
AFTER
  `serial_interior`,
ADD
  `tipo_equipo` VARCHAR(255) NOT NULL
AFTER
  `serial_exterior`,
ADD
  `capacidad_btuh` FLOAT NOT NULL
AFTER
  `tipo_equipo`,
ADD
  `voltaje_fases` VARCHAR(255) NOT NULL
AFTER
  `capacidad_btuh`,
ADD
  `refrigerante` VARCHAR(255) NOT NULL
AFTER
  `voltaje_fases`,
ADD
  `inverter` VARCHAR(4) NOT NULL
AFTER
  `refrigerante`;

ALTER TABLE
  `Tecnico`
ADD
  `fecha_nacimiento` DATE NOT NULL
AFTER
  `pass`,
ADD
  `direccion` VARCHAR(255) NOT NULL
AFTER
  `fecha_nacimiento`,
ADD
  `ciudad` VARCHAR(255) NOT NULL
AFTER
  `direccion`,
ADD
  `estado_civil` VARCHAR(255) NOT NULL
AFTER
  `ciudad`,
ADD
  `numero_hijos` INT NOT NULL
AFTER
  `estado_civil`,
ADD
  `banco` VARCHAR(255) NOT NULL
AFTER
  `numero_hijos`,
ADD
  `tipo_cuenta` VARCHAR(255) NOT NULL
AFTER
  `banco`,
ADD
  `numero_cuenta` VARCHAR(255) NOT NULL
AFTER
  `tipo_cuenta`;

ALTER TABLE
  `InformeTicket` DROP `tipo_equipo`,
  DROP `capacidad`,
  DROP `marca`;

ALTER TABLE
  `ReporteFinalTicket` DROP `serial`,
  DROP `year_compra`,
  DROP `voltaje`,
  DROP `amperaje`,
  DROP `fases`;

ALTER TABLE
  `Usuario`
ADD
  `localidad` VARCHAR(255) NOT NULL
AFTER
  `direccion`,
ADD
  `barrio_conjunto` VARCHAR(255) NOT NULL
AFTER
  `localidad`,
ADD
  `torre` VARCHAR(20) NULL
AFTER
  `barrio_conjunto`,
ADD
  `numero_apto` VARCHAR(20) NULL
AFTER
  `torre`;

ALTER TABLE
  `InformeTicket`
ADD
  `id_tipo` INT NOT NULL
AFTER
  `id_ticket`;

ALTER TABLE
  `ReporteFinalticket`
ADD
  `id_tipo` INT NOT NULL
AFTER
  `id_ticket`;

ALTER TABLE
  `Tiposervicio`
ADD
  `valor` DOUBLE NOT NULL
AFTER
  `descripcion`;

CREATE TABLE `CuentaCobro` (
  `id_cuenta` INT NOT NULL,
  `id_tecnico` INT NOT NULL,
  `id_ticket` INT NOT NULL,
  `estado` INT NOT NULL,
  `fecha_registro` INT NOT NULL
) ENGINE = InnoDB;

ALTER TABLE
  `CuentaCobro`
ADD
  PRIMARY KEY(`id_cuenta`);

ALTER TABLE
  `CuentaCobro`
MODIFY
  `id_cuenta` integer NOT NULL AUTO_INCREMENT;

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `cobroadicional`
--
CREATE TABLE `CobroAdicional` (
  `id_cobro_adicional` int(11) NOT NULL,
  `id_cuenta` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `observacion` text NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

ALTER TABLE
  `CobroAdicional`
ADD
  PRIMARY KEY(`id_cobro_adicional`);

ALTER TABLE
  `CobroAdicional`
MODIFY
  `id_cobro_adicional` integer NOT NULL AUTO_INCREMENT;

--
-- Estructura de tabla para la tabla `Blog`
--
CREATE TABLE `Blog` (
  `id_blog` int(11) NOT NULL,
  `titulo` longtext CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `vistas` int(11) NOT NULL,
  `contenido` longtext CHARACTER SET utf8 DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `estado` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

--
-- Índices para tablas volcadas
--
--
-- Indices de la tabla `Blog`
--
ALTER TABLE
  `Blog`
ADD
  PRIMARY KEY (`id_blog`);

--
-- AUTO_INCREMENT de las tablas volcadas
--
--
-- AUTO_INCREMENT de la tabla `Blog`
--
ALTER TABLE
  `Blog`
MODIFY
  `id_blog` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE
  `Blog`
ADD
  `id_usuario` INT(11) NOT NULL
AFTER
  `id_blog`,
ADD
  `tipo_usuario` VARCHAR(255) NOT NULL
AFTER
  `id_usuario`;

ALTER TABLE
  `Blog` CHANGE `imagen` `imagen` LONGTEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL;

ALTER TABLE
  `Blog`
ADD
  `tipo_imagen` VARCHAR(255) NOT NULL
AFTER
  `imagen`;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;

---------------------------------------------------------------------------------
CREATE TABLE `EquipoTipo` (
  `id_equipo_tipo` INT NOT NULL,
  `nombre` VARCHAR(255) NOT NULL,
  `imagen` VARCHAR(255) NOT NULL,
  `fecha_registro` DATETIME NOT NULL
) ENGINE = InnoDB;

ALTER TABLE
  `EquipoTipo`
ADD
  PRIMARY KEY(`id_equipo_tipo`);

ALTER TABLE
  `EquipoTipo`
MODIFY
  `id_equipo_tipo` int(11) NOT NULL AUTO_INCREMENT;

CREATE TABLE `Servicio` (
  `id_servicio` INT NOT NULL,
  `id_solicitud` INT NOT NULL,
  `id_tipo_servicio` INT NOT NULL,
  `id_equipo_tipo` INT NOT NULL,
  `cantidad` INT NOT NULL,
  `fecha_registro` DATETIME NOT NULL
) ENGINE = InnoDB;

ALTER TABLE
  `Servicio`
ADD
  PRIMARY KEY(`id_servicio`);

ALTER TABLE
  `Servicio`
MODIFY
  `id_servicio` int(11) NOT NULL AUTO_INCREMENT;

CREATE TABLE `Solicitud` (
  `id_solicitud` INT NOT NULL,
  `id_usuario` INT NOT NULL,
  `estado` INT NOT NULL,
  `fecha_registro` DATETIME NOT NULL
) ENGINE = InnoDB;

ALTER TABLE
  `Solicitud`
ADD
  PRIMARY KEY(`id_solicitud`);

ALTER TABLE
  `Solicitud`
MODIFY
  `id_solicitud` int(11) NOT NULL AUTO_INCREMENT;

INSERT INTO
  `EquipoTipo` (
    `id_equipo_tipo`,
    `nombre`,
    `imagen`,
    `fecha_registro`
  )
VALUES
  (
    '1',
    'Mini Split',
    'mini_split.png',
    '2024-09-19 17:40:45.000000'
  ),
  (
    '2',
    'Central / Split',
    'split_central.png',
    '2024-09-19 17:40:45.000000'
  ),
  (
    '3',
    'Cassette',
    'cassette.png',
    '2024-09-19 17:40:45.000000'
  ),
  (
    '4',
    'Piso techo',
    'piso_techo.jpg',
    '2024-09-19 17:40:45.000000'
  ),
  (
    '5',
    'Ventana',
    'ventana.png',
    '2024-09-19 17:40:45.000000'
  ),
  (
    '6',
    'Otro',
    'otro_aire.png',
    '2024-09-19 17:40:45.000000'
  );

ALTER TABLE
  `Solicitud`
ADD
  `id_tecnico` INT NULL
AFTER
  `estado`,
ADD
  `fecha` DATE NULL
AFTER
  `id_tecnico`,
ADD
  `valor` INT NOT NULL
AFTER
  `fecha`;

--
-- Estructura de tabla para la tabla `Equipo`
--
CREATE TABLE `Equipo` (
  `id_equipo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `marca` VARCHAR(255) NOT NULL,
  `modelo` VARCHAR(255) NOT NULL,
  `serial_interior` VARCHAR(255) NOT NULL,
  `serial_exterior` VARCHAR(255) NOT NULL,
  `id_equipo_tipo` INT(11) NOT NULL,
  `capacidad_btuh` FLOAT NOT NULL,
  `conexion_electrica` INT(11) NOT NULL,
  `refrigerante` VARCHAR(255) NOT NULL,
  `descripcion` VARCHAR(255) NOT NULL,
  `fecha_instalacion` DATE NOT NULL,
  `imagen_placa_interior` varchar(255) NOT NULL,
  `imagen_placa_exterior` varchar(255) NOT NULL,
  `inverter` VARCHAR(4) NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
--
-- Indices de la tabla `Equipo`
--
ALTER TABLE
  `Equipo`
ADD
  PRIMARY KEY (`id_equipo`);
--
-- AUTO_INCREMENT de la tabla `Equipo`
--
ALTER TABLE
  `Equipo`
MODIFY
  `id_equipo` int(11) NOT NULL AUTO_INCREMENT;

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `ReporteFinalSolicitud`
--
CREATE TABLE `ReporteFinalSolicitud` (
  `id_reporte_final` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL,
  `id_equipo` int(11) NOT NULL,
  `fecha_servicio` date NOT NULL,
  `ubicacion` INT(11) NOT NULL,
  `tipo_uso` INT(11) NOT NULL,
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
  `estado_equipo` INT(11) NOT NULL,
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
  `prox_servicio` DATE NOT NULL,
  `firma` text DEFAULT NULL,
  `fecha_registro` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
--
-- Indices de la tabla `ReporteFinalSolicitud`
--
ALTER TABLE
  `ReporteFinalSolicitud`
ADD
  PRIMARY KEY (`id_reporte_final`);
  --
-- AUTO_INCREMENT de la tabla `ReporteFinalSolicitud`
--
ALTER TABLE
  `ReporteFinalSolicitud`
MODIFY
  `id_reporte_final` int(11) NOT NULL AUTO_INCREMENT;