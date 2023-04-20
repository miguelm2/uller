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

if(isset($_POST['setAcceptTicket'])){
    $response = ServiceTicket::setAcceptTicket($_GET['ticket'], $_POST['aceptar_servicio']);
}

if(isset($_POST['deleteTicket'])){
    $response = ServiceTicket::deleteTicket($_GET['ticket']);
}

if(isset($_POST['getListEquiposTicket'])){
    $response = ServiceTicket::getListEquiposTicketAdmin($_POST['id_usuario']);
    echo $response;
}

if(isset($_POST['newReportTicket'])){
    $response = ServiceTicket::newReportTicket($_GET['ticket'],$_POST['fecha_servicio'], $_POST['fecha_ultimo_servicio'], $_POST['ubicacion_equipo'],$_POST['tipo_uso'],$_POST['tipo_equipo'],$_POST['presenta_falla'],$_POST['capacidad'],$_POST['marca'],$_POST['notas'],$_POST['observaciones']);
}

if(isset($_POST['setReportTicket'])){
    $response = ServiceTicket::setReportTicket($_GET['reportTicket'],$_POST['fecha_servicio'], $_POST['fecha_ultimo_servicio'], $_POST['ubicacion_equipo'],$_POST['tipo_uso'],$_POST['tipo_equipo'],$_POST['presenta_falla'],$_POST['capacidad'],$_POST['marca'],$_POST['notas'],$_POST['observaciones']);
}

if(isset($_POST['getPdfReportTicket'])){
    $response = ServiceTicket::getPdfReportTicket($_GET['reportTicket']);
}

if(isset($_GET['getPdfReportTicket'])){
    $response = ServiceTicket::getPdfReportTicket($_GET['getPdfReportTicket']);
}

if(isset($_GET['reportTicket'])){
    $reportTicket         = ServiceTicket::getReportTicket($_GET['reportTicket']);
}

if(isset($_GET['ticket'])){
    $ticket                = ServiceTicket::getTicket($_GET['ticket']);
    $btnAtrasTicket        = ServiceTicket::getBtnAtrasTicket($_GET['ticket']);
    $btnTecnico            = ServiceTicket::getButtonTechnician($_GET['ticket']);
    $btnDiagnostico        = ServiceTicket::getButtonDiagnosis($_GET['ticket']);
    $btnDiagnosticoTecnico = ServiceTicket::getButtonDiagnosisTechnician($_GET['ticket']);
    $btnDiagnosticoAdmin   = ServiceTicket::getButtonDiagnosisAdmin($_GET['ticket']);
    $diagnosticoUsuario    = ServiceTicket::getDiagnosisUser($_GET['ticket']);
    $tablaEquiposTicket    = ServiceTicket::getTableEquiposTicket($_GET['ticket']);
    $btnInformeTecnico     = ServiceTicket::getButtonReportTechnician($_GET['ticket']);
}

if(isset($_GET)){
    $listCheckEquipos      = ServiceTicket::getListEquiposTicket();
    $tablaTickets          = ServiceTicket::getTableTickets();
    $tablaTicketsTecnicos  = ServiceTicket::getTableTicketsTechnician();
}

?>
