<?php
session_start();
$response = null;
date_default_timezone_set('America/Bogota'); // CDT


// Acceso a los modulos de la aplicacion web

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/user/ControllerUser.php';

System::validarSession();

ServiceUser::validateSessionUser();

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/equipment/ControllerEquipment.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/serviceType/ControllerServiceType.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/ticket/ControllerTicket.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/diagnosis/ControllerDiagnosis.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/page/ControllerPage.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/information/ControllerInformation.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/request/ControllerRequest.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/service/ControllerService.php';
