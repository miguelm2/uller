ALTER TABLE `Diagnostico` ADD `numero_horas` INT NOT NULL AFTER `id_ticket`, 
ADD `numero_ayudantes` INT NOT NULL AFTER `numero_horas`;

ALTER TABLE `Diagnostico` ADD `precio` DOUBLE NOT NULL AFTER `descripcion`;

ALTER TABLE `HerramientaDiagnostico` ADD `cantidad` INT NOT NULL AFTER `id_herramienta`;

ALTER TABLE `MaterialDiagnostico` ADD `cantidad` INT NOT NULL AFTER `id_material`, 
ADD `unidad_medida` VARCHAR(255) NOT NULL AFTER `cantidad`;