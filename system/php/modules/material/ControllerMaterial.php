<?php 
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/material/ServiceMaterial.php';

if(isset($_POST['newMaterial'])){
    $response = ServiceMaterial::newMaterial($_POST['nombre'], $_POST['descripcion']);
}

if(isset($_POST['setMaterial'])){
    $response = ServiceMaterial::setMaterial($_POST['id_material'], $_POST['nombre'], $_POST['descripcion']);
}

if(isset($_POST['deleteMaterial'])){
    $response = ServiceMaterial::deleteMaterial($_POST['id_material']);
}

if(isset($_POST['getMaterial'])){
    $response = ServiceMaterial::getMaterial($_POST['id_material']);
    echo $response;
}

if(isset($_GET)){
    $tablaMateriales = ServiceMaterial::getTablaMaterials();
}
?>