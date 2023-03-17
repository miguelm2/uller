<?php

use PhpOffice\PhpSpreadsheet\Calculation\Web\Service;

include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/ticket/ServiceTicket.php';

if(isset($_POST['newTicket'])){
    $response = ServiceTicket::newTicket( $_POST['tipo_equipo'], $_POST['tipo_servicio'], $_POST['descripcion']);
}

if(isset($_POST['setTicket'])){
    $response = ServiceTicket::setTicket($_GET['ticket'], $_POST['tipo_equipo'], $_POST['tipo_servicio'], $_POST['descripcion'], $_POST['estado']);
}

if(isset($_POST['setEstadoTicket'])){
    $response = ServiceTicket::setEstadoTicket($_GET['ticket'], $_POST['estado']);
}

if(isset($_POST['assignTechnician'])){
    $response = ServiceTicket::assignTechnician($_GET['ticket'], $_POST['tecnico']);
}

if(isset($_POST['deleteTecnicoTicket'])){
    $response = ServiceTicket::deleteTecnicoTicket($_POST['id_tecnico_ticket']);
}

if(isset($_POST['deleteTicket'])){
    $response = ServiceTicket::deleteTicket($_GET['ticket']);
}

if(isset($_GET['ticket'])){
    $ticket     = ServiceTicket::getTicket($_GET['ticket']);
    $btnTecnico = ServiceTicket::getButtonTechnician($_GET['ticket']);
}

if(isset($_GET)){
    $tablaTickets          = ServiceTicket::getTableTickets();
    $tablaTicketsTecnicos  = ServiceTicket::getTableTicketsTechnician();
}

?>
