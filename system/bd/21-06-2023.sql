ALTER TABLE `Usuario` ADD `localidad` VARCHAR(255) NOT NULL AFTER `direccion`, 
ADD `barrio_conjunto` VARCHAR(255) NOT NULL AFTER `localidad`, 
ADD `torre` VARCHAR(20) NULL AFTER `barrio_conjunto`, 
ADD `numero_apto` VARCHAR(20) NULL AFTER `torre`;