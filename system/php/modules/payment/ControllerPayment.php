<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/payment/ServicePaymet.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/ticket/ServiceTicket.php';

if(isset($_GET))
{
    $tablePaymet = ServicePaymet::getTableCuentaCobro($_SESSION['id']);
}

if(isset($_GET['payment'])){
    $response = ServiceTicket::getPdfCuentaCobro($_GET['payment']);
    $btnFirmaInform = ServicePaymet::getButtonFirmaImform($_GET['payment']);
}

if(isset($_POST['newFirmaReport'])){
    $response = ServicePaymet::addFirmaCuentaCobro($_GET['payment'], $_POST['firma']);
}

?>