<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/service/ServiceService.php';

if (isset($_GET['request'])) {
   $cardService = ServiceService::getServiceByRequest($_GET['request']);
}
