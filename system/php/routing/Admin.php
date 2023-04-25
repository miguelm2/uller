<?php 
session_start(); 
$response = null;
date_default_timezone_set('America/Bogota'); // CDT


// Acceso a los modulos de la aplicacion web
include_once $_SERVER['DOCUMENT_ROOT'].'/system/php/modules/page/ControllerPage.php';

System::validarSession();

include_once $_SERVER['DOCUMENT_ROOT'].'/system/php/modules/administrator/ControllerAdmin.php';

ServiceAdmin::validateSessionAdmin();

include_once $_SERVER['DOCUMENT_ROOT'].'/system/php/modules/information/ControllerInformation.php';

include_once $_SERVER['DOCUMENT_ROOT'].'/system/php/modules/message/ControllerMessage.php';

include_once $_SERVER['DOCUMENT_ROOT'].'/system/php/modules/tool/ControllerTool.php';

include_once $_SERVER['DOCUMENT_ROOT'].'/system/php/modules/material/ControllerMaterial.php';

include_once $_SERVER['DOCUMENT_ROOT'].'/system/php/modules/equipmentType/ControllerEquipmentType.php';

include_once $_SERVER['DOCUMENT_ROOT'].'/system/php/modules/user/ControllerUser.php';

include_once $_SERVER['DOCUMENT_ROOT'].'/system/php/modules/serviceType/ControllerServiceType.php';

include_once $_SERVER['DOCUMENT_ROOT'].'/system/php/modules/technician/ControllerTechnician.php';

include_once $_SERVER['DOCUMENT_ROOT'].'/system/php/modules/diagnosis/ControllerDiagnosis.php';

include_once $_SERVER['DOCUMENT_ROOT'].'/system/php/modules/ticket/ControllerTicket.php';

?>