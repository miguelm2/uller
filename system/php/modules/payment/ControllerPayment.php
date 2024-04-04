<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/payment/ServicePaymet.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/ticket/ServiceTicket.php';

if(isset($_GET))
{
    $tablePaymet = ServicePaymet::getTableCuentaCobroById($_SESSION['id']);
}

if(isset($_GET))
{    
    $tableAllPayment = ServicePaymet::getTableCuentaCobro();
}

if(isset($_POST['newFirmaPayment'])){
    $response = ServicePaymet::addFirmaCuentaCobro($_GET['payment'], $_POST['firma']);
}

if(isset($_POST['setPaymentAdmin'])){
    $response = ServicePaymet::setEstadoCuentaCobro($_GET['paymentAdmin'],$_POST['estado']);
    $response = ServicePaymet::setCobroAdicional($_GET['paymentAdmin'], $_POST['valor'], $_POST['descripcion']);
}

if(isset($_GET['payment'])){
    $response = ServiceTicket::getPdfCuentaCobro($_GET['payment']);
    $pdfName = '/system/pdf/Informe_Final_Servicio_' . $_GET['payment']. '.pdf';
    $btnFirmaInform = ServicePaymet::getButtonFirmaImform($_GET['payment']);
}
if(isset($_GET['paymentAdmin'])){
    $cuentaCobro = ServicePaymet::getCuentaCobroById($_GET['paymentAdmin']);
    $tecnico = Tecnico::getTecnicoById($cuentaCobro->getId_tecnico());
    $cobroAdicional = ServicePaymet::getCobroAdiconal($_GET['paymentAdmin']);
    $response = ServiceTicket::getPdfCuentaCobro($cuentaCobro->getId_ticket());
    $pdfName = '/system/pdf/Informe_Final_Servicio_' . $cuentaCobro->getId_ticket(). '.pdf';
}

?>