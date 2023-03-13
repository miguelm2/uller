<?php 
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/page/ServicePage.php';


// EndPoint Expuestos


if(isset($_POST['ingresar'])){
    $response = ServicePage::Login($_POST['cedula'], $_POST['pass']);
}


if(isset($_POST['recovery'])){
    $response = ServicePage::Recovery($_POST['cedula']);
}



if(isset($_POST['logout'])){
    $response = ServicePage::Logout();
}

//ALERTAS
if(isset($_GET['new'])){
    $response = ServicePage::getAlertaNuevo();
}

if(isset($_GET['delete'])){
    $response = ServicePage::getAlertaEliminar();
}

?>