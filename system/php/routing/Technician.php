<?php
session_start();
$response = null;
date_default_timezone_set('America/Bogota');

// Acceso a los modulos de la aplicacion web

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/technician/ControllerTechnician.php';

System::validarSession();

ServiceTechnician::validateSessionTechnician();

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/tool/ControllerTool.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/material/ControllerMaterial.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/diagnosis/ControllerDiagnosis.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/ticket/ControllerTicket.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/page/ControllerPage.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/input/ControllerInput.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/payment/ControllerPayment.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/request/ControllerRequest.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/service/ControllerService.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/equipment/ControllerEquipment.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/reportFinalRequest/ControlllerReportFinalRequest.php';
