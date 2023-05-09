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


//Registrar nuevo usuario
if(isset($_POST['newAccountUser'])){
    $response = ServicePage::newAccountUser($_POST['nombre'], $_POST['correo'], $_POST['telefono'], $_POST['cedula'], $_POST['direccion'], $_POST['ciudad'], $_POST['departamento'], $_POST['pass']);
}

if(isset($_GET)){
    $informacionPage = ServicePage::getInformation();
}
?>