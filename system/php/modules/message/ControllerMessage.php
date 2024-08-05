<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/message/ServiceMessage.php';

if (isset($_POST['newMessage'])) {
    $response = ServiceMessage::newMessage($_POST['nombre'], $_POST['correo'], $_POST['celular'], $_POST['mensaje']);
}

if (isset($_POST['requestTechnician'])) {
    $response = ServiceMessage::newMessageRequest($_POST['nombre'], $_POST['correo'], $_POST['celular'], $_POST['mensaje'], $_POST['direccion'], $_POST['ciudad']);
}

if (isset($_GET['deleteMessage'])) {
    ServiceMessage::deleteMessage($_GET['deleteMessage']);
}

if (isset($_GET)) {
    $tablaMensajes      = ServiceMessage::getTableMessages();
    ServiceMessage::updateEstadoMessages();
    $contadorMensajes   = ServiceMessage::getCountMensajesNoVistos();
}
