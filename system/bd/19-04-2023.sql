ALTER TABLE `Usuario` ADD `direccion` VARCHAR(255) NOT NULL AFTER `cedula`, 
ADD `ciudad` VARCHAR(255) NOT NULL AFTER `direccion`, 
ADD `departamento` VARCHAR(255) NOT NULL AFTER `ciudad`;