<?php 
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/technician/ServiceTechnician.php';


if(isset($_POST['newTechnician'])){
    $response = ServiceTechnician::newTechnician($_POST['nombre'], $_POST['correo'], $_POST['telefono'], $_POST['cedula'], $_POST['pass']);
}

if(isset($_POST['setTechnician'])){
    $response = ServiceTechnician::setTechnician($_GET['technician'],$_POST['nombre'], $_POST['correo'], $_POST['telefono'], $_POST['cedula'], $_POST['estado']);
}

if(isset($_POST['setPasswordTechnician'])){
    $response = ServiceTechnician::setPassTechnician($_GET['technician'],$_POST['newPass'], $_POST['confirmPass']);
}

if(isset($_POST['deleteTechnician'])){
    $response = ServiceTechnician::deleteTechnician($_GET['technician']);
}

if(isset($_GET['technician'])){
    $tecnico = ServiceTechnician::getTechnician($_GET['technician']);
}

if(isset($_GET)){
    $tablaTecnicos  = ServiceTechnician::getTableTechnicians();
    $selectTecnicos = ServiceTechnician::getSelectTechnicians();
    $selectAyudantes= ServiceTechnician::getSelectTechniciansById();
} 

?>