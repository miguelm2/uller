<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/equipment/ServiceEquipment.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/service/ServiceService.php';

if (isset($_POST['newEquipment'])) {
    $service = ServiceService::getService($_GET['service']);
    $id_usuario = $service->getSolicitudDTO()->getUsuarioDTO()->getId_usuario();
    $id_equipo_tipo = $service->getTipoServicioDTO()->getId_tipo_servicio();

    $inverter = (empty($_POST['inverter'])) ? '' : $_POST['inverter'];

    $response = ServiceEquipment::newEquipment(
        $id_usuario,
        $_POST['nombre'],
        $_POST['marca'],
        $_POST['modelo'],
        $_POST['year_fabricacion'],
        $_POST['serial_interior'],
        $_POST['serial_exterior'],
        $id_equipo_tipo,
        $_POST['capacidad_btuh'],
        $_POST['conexion_electrica'],
        $_POST['refrigerante'],
        $inverter,
        $_POST['descripcion'],
        $_POST['fecha_instalacion']
    );
}

if (isset($_POST['setEquipment'])) {
    $response = ServiceEquipment::setEquipment(
        $_GET['equipment'],
        $_POST['nombre'],
        $_POST['marca'],
        $_POST['modelo'],
        $_POST['year_fabricacion'],
        $_POST['serial_interior'],
        $_POST['serial_exterior'],
        $_POST['capacidad_btuh'],
        $_POST['voltaje_fases'],
        $_POST['refrigerante'],
        $_POST['inverter'],
        $_POST['descripcion'], $_POST['fecha_instalacion']
    );
}

if (isset($_POST['setImagenInnerPlate'])) {
    $response = ServiceEquipment::setImagenInnerPlate($_GET['equipment']);
}

if (isset($_POST['setImagenExteriorPlate'])) {
    $response = ServiceEquipment::setImagenExteriorPlate($_GET['equipment']);
}

if (isset($_GET['equipment'])) {
    $equipment    = ServiceEquipment::getEquipment($_GET['equipment']);
    $listInverter = ServiceEquipment::getValidateInverter($equipment);

    if ($_SESSION['tipo'] == 0 || $_SESSION['tipo'] == 5) {
        $backPageEqui = ServiceEquipment::getBackButton("user", $_GET['user_equipment']);
    }
}

if (isset($_POST['deleteEquipment'])) {

    if ($_SESSION['tipo'] == 0 || $_SESSION['tipo'] == 5) {
        $response = ServiceEquipment::deleteEquipment($_GET['equipment'], $_GET['user_equipment']);
    } else {
        $response = ServiceEquipment::deleteEquipmentUser($_GET['equipment']);
    }
}

if (isset($_GET['service'])) {
    $tablaEquiposUser  = ServiceEquipment::getTableEquipment($_GET['service']);
}