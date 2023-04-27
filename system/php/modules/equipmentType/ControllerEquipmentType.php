<?php 
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/equipmentType/ServiceEquipmentType.php';

if(isset($_POST['newEquipmentType'])){
    $id_usuario = (isset($_GET['user'])) ? $_GET['user'] : $_SESSION['id'];

    $response = ServiceEquipmentType::newEquipmentType($id_usuario, $_POST['nombre'], $_POST['descripcion']);
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
    $tablaEquiposUser  = ServiceEquipmentType::getTableEquipmentType();
}


?>