<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/payment/ServicePaymet.php';

if(isset($_GET))
{
    $tablePaymet = ServicePaymet::getTableCuentaCobro();
}

if(isset($_GET['payment'])){
    $payment = ServicePaymet::getCuentaCobroById($_GET['payment']);
}

?>