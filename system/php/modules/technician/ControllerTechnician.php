<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/technician/ServiceTechnician.php';

if (isset($_POST['setProfileTechnician'])) {
    $tipo_cuenta   = (isset($_POST['tipo_cuenta'])) ? $_POST['tipo_cuenta'] : "No presenta";
    $numero_cuenta = (isset($_POST['numero_cuenta'])) ? $_POST['numero_cuenta'] : 0;

    $response = ServiceTechnician::setProfile($_POST['nombre'], $_POST['correo'], $_POST['telefono'], $_POST['cedula'], $_POST['fecha_nacimiento'], $_POST['direccion'], $_POST['ciudad'], $_POST['estado_civil'], $_POST['numero_hijos'], $_POST['banco'], $tipo_cuenta, $numero_cuenta);
}

if (isset($_POST['setPassProfileTechnician'])) {
    $response = ServiceTechnician::setPassProfile($_POST['pass'], $_POST['newPass'], $_POST['confirmPass']);
}

if (isset($_POST['newTechnician'])) {
    $tipo_cuenta   = (isset($_POST['tipo_cuenta'])) ? $_POST['tipo_cuenta'] : "No presenta";
    $numero_cuenta = (isset($_POST['numero_cuenta'])) ? $_POST['numero_cuenta'] : 0;

    $response = ServiceTechnician::newTechnician($_POST['nombre'], $_POST['correo'], $_POST['telefono'], $_POST['cedula'], $_POST['pass'], $_POST['fecha_nacimiento'], $_POST['direccion'], $_POST['ciudad'], $_POST['estado_civil'], $_POST['numero_hijos'], $_POST['banco'], $tipo_cuenta, $numero_cuenta);
}

if (isset($_POST['setTechnician'])) {
    $tipo_cuenta   = (isset($_POST['tipo_cuenta'])) ? $_POST['tipo_cuenta'] : "No presenta";
    $numero_cuenta = (isset($_POST['numero_cuenta'])) ? $_POST['numero_cuenta'] : 0;

    $response = ServiceTechnician::setTechnician($_GET['technician'], $_POST['nombre'], $_POST['correo'], $_POST['telefono'], $_POST['cedula'], $_POST['fecha_nacimiento'], $_POST['direccion'], $_POST['ciudad'], $_POST['estado_civil'], $_POST['numero_hijos'], $_POST['banco'], $tipo_cuenta, $numero_cuenta, $_POST['estado']);
}

if (isset($_POST['setPasswordTechnician'])) {
    $response = ServiceTechnician::setPassTechnician($_GET['technician'], $_POST['newPass'], $_POST['confirmPass']);
}

if (isset($_GET['technician'])) {
    $tecnico = ServiceTechnician::getTechnician($_GET['technician']);
}

if (isset($_POST['deleteTechnician'])) {
    $response = ServiceTechnician::deleteTechnician($_GET['technician']);
}


if (isset($_GET)) {
    $perfilTecnico  = ServiceTechnician::getPerfilTecnico();
    $tablaTecnicos  = ServiceTechnician::getTableTechnicians();
    $selectTecnicos = ServiceTechnician::getSelectTechnicians();
    $selectAyudantes = ServiceTechnician::getSelectTechniciansById();
}
