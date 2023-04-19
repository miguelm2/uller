<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/ticket/ServiceTicket.php';

if(isset($_POST['newTicket'])){
    $response = ServiceTicket::newTicket( $_POST['id_usuario'], $_POST['tipo_servicio'], $_POST['descripcion'],$_POST['equipoTicket']);
}

if(isset($_POST['setTicket'])){
    $response = ServiceTicket::setTicket($_GET['ticket'], $_POST['tipo_equipo'], $_POST['tipo_servicio'], $_POST['descripcion']);
}

if(isset($_POST['assignTechnician'])){
    $response = ServiceTicket::assignTechnician($_GET['ticket'], $_POST['tecnico']);
}

if(isset($_POST['deleteTecnicoTicket'])){
    $response = ServiceTicket::deleteTecnicoTicket($_POST['id_tecnico_ticket'], $_GET['ticket']);
}

if(isset($_POST['deleteEquipmentTicket'])){
    $response = ServiceTicket::deleteEquipmentTicket($_POST['id_equipo_ticket']);
}

if(isset($_POST['deleteTicket'])){
    $response = ServiceTicket::deleteTicket($_GET['ticket']);
}

if(isset($_POST['getListEquiposTicket'])){
    $response = ServiceTicket::getListEquiposTicketAdmin($_POST['id_usuario']);
    echo $response;
}

if(isset($_GET['ticket'])){
    $ticket                = ServiceTicket::getTicket($_GET['ticket']);
    $btnTecnico            = ServiceTicket::getButtonTechnician($_GET['ticket']);
    $btnDiagnostico        = ServiceTicket::getButtonDiagnosis($_GET['ticket']);
    $btnDiagnosticoTecnico = ServiceTicket::getButtonDiagnosisTechnician($_GET['ticket']);
    $btnDiagnosticoAdmin   = ServiceTicket::getButtonDiagnosisAdmin($_GET['ticket']);
    $diagnosticoUsuario    = ServiceTicket::getDiagnosisUser($_GET['ticket']);
    $tablaEquiposTicket    = ServiceTicket::getTableEquiposTicket($_GET['ticket']);
}

if(isset($_GET)){
    $listCheckEquipos      = ServiceTicket::getListEquiposTicket();
    $tablaTickets          = ServiceTicket::getTableTickets();
    $tablaTicketsTecnicos  = ServiceTicket::getTableTicketsTechnician();
}

?>
