<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/information/ServiceInformation.php';

if (isset($_POST['setInformation'])) {
    $response = ServiceInformation::setInformation($_POST['nombre'], $_POST['nit'], $_POST['direccion'], $_POST['ciudad'], $_POST['departamento'], $_POST['correo'], $_POST['telefono'], $_POST['whatsapp'], $_POST['facebook'], $_POST['instagram'], $_POST['color']);
}

if (isset($_GET)) {
    $information = ServiceInformation::getInformation();
}
