<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/service/ServiceService.php';

if (isset($_GET['request'])) {
   $cardService = ServiceService::getServiceByRequest($_GET['request']);
}

if (isset($_GET['add_service'])) {
   $tableAddService = ServiceService::getServiceByRequestAddService($_GET['add_service']);
}

if (isset($_POST['addService'])) {
   $listService = ServiceService::listServiceByRequest($_GET['add_service']);
   foreach ($listService as $valor) {
      $num = ' '. $_POST[$valor->getId_servicio()];
      echo ' '. $_POST[$valor->getId_servicio()];
      ServiceService::setService($valor->getId_servicio(), $_POST[$num]);
   }
}
