<?php 
session_start(); 
$response = null;
date_default_timezone_set('America/Bogota'); 

// Acceso a los modulos de la aplicacion web
include_once $_SERVER['DOCUMENT_ROOT'].'/system/php/modules/page/ControllerPage.php';

System::validarSession();

include_once $_SERVER['DOCUMENT_ROOT'].'/system/php/modules/technician/ControllerTechnician.php';

ServiceTechnician::validateSessionTechnician();

include_once $_SERVER['DOCUMENT_ROOT'].'/system/php/modules/tool/ControllerTool.php';

include_once $_SERVER['DOCUMENT_ROOT'].'/system/php/modules/material/ControllerMaterial.php';

include_once $_SERVER['DOCUMENT_ROOT'].'/system/php/modules/diagnosis/ControllerDiagnosis.php';

include_once $_SERVER['DOCUMENT_ROOT'].'/system/php/modules/ticket/ControllerTicket.php';

?>