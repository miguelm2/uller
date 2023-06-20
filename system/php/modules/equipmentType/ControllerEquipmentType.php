<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/equipmentType/ServiceEquipmentType.php';

if (isset($_POST['newEquipmentType'])) {
    $id_usuario = (isset($_GET['user'])) ? $_GET['user'] : $_SESSION['id'];

    $response = ServiceEquipmentType::newEquipmentType($id_usuario, $_POST['nombre'], $_POST['marca'], $_POST['modelo'], $_POST['year_fabricacion'], $_POST['serial_interior'], $_POST['serial_exterior'], $_POST['tipo_equipo'], $_POST['capacidad_btuh'], $_POST['voltaje_fases'], $_POST['refrigerante'], $_POST['inverter'], $_POST['descripcion']);
}

if (isset($_POST['setEquipmentType'])) {
    $response = ServiceEquipmentType::setEquipmentType($_GET['equipment'], $_POST['nombre'], $_POST['marca'], $_POST['modelo'], $_POST['year_fabricacion'], $_POST['serial_interior'], $_POST['serial_exterior'], $_POST['tipo_equipo'], $_POST['capacidad_btuh'], $_POST['voltaje_fases'], $_POST['refrigerante'], $_POST['inverter'], $_POST['descripcion']);
}

if (isset($_GET['equipment'])) {
    $equipment    = ServiceEquipmentType::getEquipmentType($_GET['equipment']);
    $listInverter = ServiceEquipmentType::getValidateInverter($equipment);

    if ($_SESSION['tipo'] == 0 || $_SESSION['tipo'] == 5) {
        $backPageEqui = ServiceEquipmentType::getBackButton("user", $_GET['user_equipment']);
    }
}

if (isset($_POST['deleteEquipmentType'])) {

    if ($_SESSION['tipo'] == 0 || $_SESSION['tipo'] == 5) {
        $response = ServiceEquipmentType::deleteEquipmentType($_GET['equipment'], $_GET['user_equipment']);
    } else {
        $response = ServiceEquipmentType::deleteEquipmentTypeUser($_GET['equipment']);
    }
}

if (isset($_GET)) {
    $tablaEquiposUser  = ServiceEquipmentType::getTableEquipmentType();
}
