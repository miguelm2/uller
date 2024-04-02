<?php 
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/serviceType/ServiceType.php';

if(isset($_POST['newServiceType'])){
    $response = ServiceType::newServiceType($_POST['nombre'], $_POST['descripcion'], $_POST['valor']);
}

if(isset($_POST['setServiceType'])){
    $response = ServiceType::setServiceType($_POST['id_tipo'], $_POST['nombre'], $_POST['descripcion'], $_POST['valor_tipo']);
}

if(isset($_POST['deleteServiceType'])){
    $response = ServiceType::deleteServiceType($_POST['id_tipo']);
}

if(isset($_POST['getServiceType'])){
    $response = ServiceType::getServiceType($_POST['id_tipo']);
    echo $response;
}

if(isset($_GET)){
    $tablaTipoServicios  = ServiceType::getTableServiceType();
    $selectTipoServicios = ServiceType::getSelectServiceType();
}


?>