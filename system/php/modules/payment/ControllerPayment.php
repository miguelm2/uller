<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/payment/ServicePaymet.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/ticket/ServiceTicket.php';

if(isset($_GET))
{
    $tablePaymet = ServicePaymet::getTableCuentaCobro($_SESSION['id']);
}

if(isset($_GET['payment'])){
    $response = ServiceTicket::getPdfCuentaCobro($_GET['payment']);
    $pdfName = '/system/pdf/Informe_Final_Servicio_' . $_GET['payment']. '.pdf';
    $btnFirmaInform = ServicePaymet::getButtonFirmaImform($_GET['payment']);
}

if(isset($_POST['newFirmaPayment'])){
    $response = ServicePaymet::addFirmaCuentaCobro($_GET['payment'], $_POST['firma']);
}

?>