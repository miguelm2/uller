<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/equipment/ServiceEquipment.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/service/ServiceService.php';

if (isset($_POST['newEquipment'])) {
    $service = ServiceService::getService($_GET['service']);
    $id_usuario = $service->getSolicitudDTO()->getUsuarioDTO()->getId_usuario();
    $id_equipo_tipo = $service->getTipoServicioDTO()->getId_tipo();

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
if (isset($_POST['newEquipmentUser'])) {
    $service = ServiceService::getService($_GET['service']);
    $id_usuario = $_SESSION['id'];

    $inverter = (empty($_POST['inverter'])) ? '' : $_POST['inverter'];

    $response = ServiceEquipment::newEquipment(
        $id_usuario,
        $_POST['nombre'],
        $_POST['marca'],
        $_POST['modelo'],
        $_POST['year_fabricacion'],
        $_POST['serial_interior'],
        $_POST['serial_exterior'],

        $_POST['tipo_equipo'],
        $_POST['capacidad_btuh'],
        $_POST['conexion_electrica'],
        $_POST['refrigerante'],
        $inverter,
        $_POST['descripcion'],
        $_POST['fecha_instalacion']
    );
}
if (isset($_POST['newEquipmentAdmin'])) {

    $inverter = (empty($_POST['inverter'])) ? '' : $_POST['inverter'];

    $response = ServiceEquipment::newEquipment(
        $_GET['user'],
        $_POST['nombre'],
        $_POST['marca'],
        $_POST['modelo'],
        $_POST['year_fabricacion'],
        $_POST['serial_interior'],
        $_POST['serial_exterior'],
        $_POST['tipo_equipo'],
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
        $_GET['equip'],
        $_POST['nombre'],
        $_POST['marca'],
        $_POST['modelo'],
        $_POST['year_fabricacion'],
        $_POST['serial_interior'],
        $_POST['serial_exterior'],
        $_POST['capacidad_btuh'],
        $_POST['conexion_electrica'],
        $_POST['refrigerante'],
        $_POST['inverter'],
        $_POST['descripcion'],
        $_POST['fecha_instalacion']
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
}

if (isset($_GET['user'])) {
    $tableEquipmentUser = ServiceEquipment::getTableEquipmentByUser($_GET['user']);
}

if (isset($_GET['equip'])) {
    $equip    = ServiceEquipment::getEquipment($_GET['equip']);
    $listInverter = ServiceEquipment::getValidateInverter($equip);
    $backButton = ServiceEquipment::getBackButton($_GET['id_service']);
}

if (isset($_POST['deleteEquipment'])) {
    $response = ServiceEquipment::deleteEquipmentUser($_GET['equip']);
}

if (isset($_GET['service'])) {
    $tablaEquiposUser  = ServiceEquipment::getTableEquipment($_GET['service']);
}

if (isset($_GET)) {
    $tableEquipmentUserByUser = ServiceEquipment::getTableEquipmentUserByUser();
}
