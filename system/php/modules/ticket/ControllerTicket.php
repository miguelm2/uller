<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/ticket/ServiceTicket.php';

if(isset($_POST['newTicket'])){
    $response = ServiceTicket::newTicket( $_POST['id_usuario'], $_POST['tipo_servicio'], $_POST['descripcion'],$_POST['equipoTicket']);
}

if(isset($_POST['setTicket'])){
    $response = ServiceTicket::setTicket($_GET['ticket'], $_POST['tipo_servicio'], $_POST['descripcion']);
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

if(isset($_POST['getListEquiposTicket'])){
    $response = ServiceTicket::getListEquiposTicketAdmin($_POST['id_usuario']);
    echo $response;
}

//ORDEN DE SERVICIO DE UN TICKET -----------------------------------------
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

//FIN ORDEN DE SERVICIO DE UN TICKET -----------------------------------------


//INFORME FINAL DE SERVICIO DE UN TICKET --------------------------------------
if(isset($_POST['newInformTicket'])){
    $equipo_opera_inicio    = (isset($_POST["equipo_opera_inicio"])) ? '1' : '0';
    $limpieza_general       = (isset($_POST['limpieza_general'])) ? '1' : '0';
    $limpieza_filtros       = (isset($_POST['limpieza_filtros'])) ? '1' : '0';
    $limpieza_serpentin     = (isset($_POST['limpieza_serpentin'])) ? '1' : '0';
    $limpieza_bandeja       = (isset($_POST['limpieza_bandeja'])) ? '1' : '0';
    $serpentin_condensador  = (isset($_POST['serpentin_condensador'])) ? '1' : '0';
    $limpieza_drenaje       = (isset($_POST['limpieza_drenaje'])) ? '1' : '0';
    $verificacion           = (isset($_POST['verificacion'])) ? '1' : '0';
    $estado_carcasa         = (isset($_POST['estado_carcasa'])) ? '1' : '0';
    $estado_equipo          = (isset($_POST['estado_equipo'])) ? '1' : '0';
    $equipo_opera_fin       = (isset($_POST['equipo_opera_fin'])) ? '1' : '0';
    
    $response = ServiceTicket::newInformTicket($_GET['ticket'],$_POST['fecha_servicio'], $_POST['serial'], $_POST['year_compra'],$_POST['voltaje'],$_POST['amperaje'],$_POST['fases'],
                                            $_POST['mantenimiento_preventivo'],$equipo_opera_inicio,$limpieza_general,$limpieza_filtros,
                                            $limpieza_serpentin,$limpieza_bandeja,$serpentin_condensador,$limpieza_drenaje,$verificacion,
                                            $estado_carcasa,$estado_equipo,$equipo_opera_fin,$_POST['mantenimiento_correctivo'],$_POST['falla_encontrada'],
                                            $_POST['repuestos'],$_POST['insumos'],$_POST['tarjetas_electronicas'],$_POST['estimado_horas'],$_POST['observaciones']);
}

if(isset($_POST['setInformTicket'])){
    $equipo_opera_inicio    = (isset($_POST["equipo_opera_inicio"])) ? '1' : '0';
    $limpieza_general       = (isset($_POST['limpieza_general'])) ? '1' : '0';
    $limpieza_filtros       = (isset($_POST['limpieza_filtros'])) ? '1' : '0';
    $limpieza_serpentin     = (isset($_POST['limpieza_serpentin'])) ? '1' : '0';
    $limpieza_bandeja       = (isset($_POST['limpieza_bandeja'])) ? '1' : '0';
    $serpentin_condensador  = (isset($_POST['serpentin_condensador'])) ? '1' : '0';
    $limpieza_drenaje       = (isset($_POST['limpieza_drenaje'])) ? '1' : '0';
    $verificacion           = (isset($_POST['verificacion'])) ? '1' : '0';
    $estado_carcasa         = (isset($_POST['estado_carcasa'])) ? '1' : '0';
    $estado_equipo          = (isset($_POST['estado_equipo'])) ? '1' : '0';
    $equipo_opera_fin       = (isset($_POST['equipo_opera_fin'])) ? '1' : '0';
    
    $response = ServiceTicket::setInformTicket($_GET['informTicket'],$_POST['fecha_servicio'], $_POST['serial'], $_POST['year_compra'],$_POST['voltaje'],$_POST['amperaje'],$_POST['fases'],
                                            $_POST['mantenimiento_preventivo'],$equipo_opera_inicio,$limpieza_general,$limpieza_filtros,
                                            $limpieza_serpentin,$limpieza_bandeja,$serpentin_condensador,$limpieza_drenaje,$verificacion,
                                            $estado_carcasa,$estado_equipo,$equipo_opera_fin,$_POST['mantenimiento_correctivo'],$_POST['falla_encontrada'],
                                            $_POST['repuestos'],$_POST['insumos'],$_POST['tarjetas_electronicas'],$_POST['estimado_horas'],$_POST['observaciones']);
}

if(isset($_POST['newFirmaReport'])){
    $response = ServiceTicket::addFirmaReport($_GET['informTicket'], $_POST['firma']);
}

if(isset($_POST['getPdfInform'])){
    $response = ServiceTicket::getPdfInform($_GET['informTicket']);
}

if(isset($_GET['getPdfInform'])){
    $response = ServiceTicket::getPdfInform($_GET['getPdfInform']);
}

if(isset($_GET['informTicket'])){
    $informTicket   = ServiceTicket::getInformTicket($_GET['informTicket']);
    $btnFirmaInform = ServiceTicket::getButtonFirmaImform($_GET['informTicket']);
}

//FIN INFORME FINAL DE SERVICIO DE UN TICKET --------------------------------------


if(isset($_GET['ticket'])){
    $ticket                = ServiceTicket::getTicket($_GET['ticket']);
    $btnAtrasTicket        = ServiceTicket::getBtnAtrasTicket($_GET['ticket']);
    $btnTecnico            = ServiceTicket::getButtonTechnician($_GET['ticket']);
    $btnDiagnosticoTecnico = ServiceTicket::getButtonDiagnosisTechnician($_GET['ticket']);
    $btnDiagnosticoAdmin   = ServiceTicket::getButtonDiagnosisAdmin($_GET['ticket']);
    $diagnosticoUsuario    = ServiceTicket::getDiagnosisUser($_GET['ticket']);
    $tablaEquiposTicket    = ServiceTicket::getTableEquiposTicket($_GET['ticket']);
    $btnOrdenInforme       = ServiceTicket::getButtonReport($_GET['ticket']);
    $btnOrdenTecnico       = ServiceTicket::getButtonReportTechnician($_GET['ticket']);
    $btnInformeServTecnico = ServiceTicket::getButtonInformeFinalTechnician($_GET['ticket']);
}

if(isset($_POST['deleteTicket'])){
    $response = ServiceTicket::deleteTicket($_GET['ticket']);
}


if(isset($_GET)){
    $listCheckEquipos      = ServiceTicket::getListEquiposTicket();
    $tablaTickets          = ServiceTicket::getTableTickets();
    $tablaTicketsTecnicos  = ServiceTicket::getTableTicketsTechnician();
}

?>
