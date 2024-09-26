<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/service/ServiceService.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/request/ServiceRequest.php';

if (isset($_POST['addService'])) {
   $listService = ServiceService::listServiceByRequest($_GET['add_service']);
   foreach ($listService as $valor) {
      $num = '' . $valor->getId_servicio();
      ServiceService::setService($valor->getId_servicio(), $_POST[$num]);
   }
}

if (isset($_POST['addServiceAdmin'])) {
   $listService = ServiceService::listServiceByRequest($_GET['request']);
   foreach ($listService as $valor) {
      $num = '' . $valor->getId_servicio();
      ServiceService::setService($valor->getId_servicio(), $_POST[$num]);
   }
   ServiceRequest::setRequest($_POST['tecnico'], $_POST['estado'], $_POST['valor'], $_POST['fecha'], $_GET['request']);
}

if (isset($_GET['request'])) {
   $cardService = ServiceService::getServiceByRequest($_GET['request']);
   $tableAddService = ServiceService::getServiceByRequestAddService($_GET['request']);
}

if (isset($_GET['request_tech'])) {
   $tableServiceRequest = ServiceService::getServiceByRequestTech($_GET['request_tech']);
}

if (isset($_GET['add_service'])) {
   $tableAddService = ServiceService::getServiceByRequestAddService($_GET['add_service']);
}

if (isset($_GET['service'])) {
   $servicio = ServiceService::getService($_GET['service']);
}
