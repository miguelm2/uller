<?php 
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/equipmentType/ServiceEquipmentType.php';

if(isset($_POST['newEquipmentType'])){
    $response = ServiceEquipmentType::newEquipmentType($_GET['user'], $_POST['nombre'], $_POST['descripcion']);
}

if(isset($_POST['setEquipmentType'])){
    $response = ServiceEquipmentType::setEquipmentType($_POST['id_tipo'], $_POST['nombre'], $_POST['descripcion']);
}

if(isset($_POST['deleteEquipmentType'])){
    $response = ServiceEquipmentType::deleteEquipmentType($_POST['id_tipo']);
}

if(isset($_POST['getEquipmentType'])){
    $response = ServiceEquipmentType::getEquipmentType($_POST['id_tipo']);
    echo $response;
}

if(isset($_GET)){
    $tablaTipoEquipos  = ServiceEquipmentType::getTableEquipmentType();
}


?>