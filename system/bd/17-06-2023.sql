ALTER TABLE `TipoEquipo` ADD `marca` VARCHAR(255) NOT NULL AFTER `nombre`, 
ADD `modelo` VARCHAR(255) NOT NULL AFTER `marca`, 
ADD `year_fabricacion` YEAR NOT NULL AFTER `modelo`, 
ADD `serial_interior` VARCHAR(255) NOT NULL AFTER `year_fabricacion`, 
ADD `serial_exterior` VARCHAR(255) NOT NULL AFTER `serial_interior`, 
ADD `tipo_equipo` VARCHAR(255) NOT NULL AFTER `serial_exterior`, 
ADD `capacidad_btuh` FLOAT NOT NULL AFTER `tipo_equipo`, 
ADD `voltaje_fases` VARCHAR(255) NOT NULL AFTER `capacidad_btuh`, 
ADD `refrigerante` VARCHAR(255) NOT NULL AFTER `voltaje_fases`, 
ADD `inverter` VARCHAR(4) NOT NULL AFTER `refrigerante`;



ALTER TABLE `Tecnico` ADD `fecha_nacimiento` DATE NOT NULL AFTER `pass`, 
ADD `direccion` VARCHAR(255) NOT NULL AFTER `fecha_nacimiento`, 
ADD `ciudad` VARCHAR(255) NOT NULL AFTER `direccion`, 
ADD `estado_civil` VARCHAR(255) NOT NULL AFTER `ciudad`, 
ADD `numero_hijos` INT NOT NULL AFTER `estado_civil`, 
ADD `banco` VARCHAR(255) NOT NULL AFTER `numero_hijos`, 
ADD `tipo_cuenta` VARCHAR(255) NOT NULL AFTER `banco`, 
ADD `numero_cuenta` VARCHAR(255) NOT NULL AFTER `tipo_cuenta`;

ALTER TABLE `InformeTicket`
DROP `tipo_equipo`,
DROP `capacidad`,
DROP `marca`;

ALTER TABLE `ReporteFinalTicket`
DROP `serial`,
DROP `year_compra`,
DROP `voltaje`,
DROP `amperaje`,
DROP `fases`;