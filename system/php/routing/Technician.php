<?php 
session_start(); 
$response = null;
date_default_timezone_set('America/Bogota'); 

// Acceso a los modulos de la aplicacion web
include_once $_SERVER['DOCUMENT_ROOT'].'/system/php/modules/page/ControllerPage.php';

include_once $_SERVER['DOCUMENT_ROOT'].'/system/php/modules/ticket/ControllerTicket.php';

include_once $_SERVER['DOCUMENT_ROOT'].'/system/php/modules/tool/ControllerTool.php';

?>