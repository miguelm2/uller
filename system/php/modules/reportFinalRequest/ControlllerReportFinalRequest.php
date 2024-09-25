<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/reportFinalRequest/ServiceReportFinalRequest.php';
if (isset($_POST['newInformRequest'])) {
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

   ServiceReportFinalRequest::newInformTicket(
      $_GET['service_inform'],
      $_GET['equipment'],
      $_POST['fecha_servicio'],
      $_POST['ubicacion'],
      $_POST['otra_ubicacion'],
      $_POST['tipo_uso'],
      $_POST['presion_alta'],
      $_POST['presion_baja'],
      $_POST['presion_reposo'],
      $equipo_opera_inicio,
      $_POST['temperatura_salida'],
      $_POST['temperatura_entrada'],
      $_POST['temperatura_ret'],
      $_POST['temperatura_sum'],
      $_POST['voltaje'],
      $_POST['amperaje'],
      $_POST['fases'],
      $_POST['estado_equipo'],
      $_POST['comentario_equipo'],
      $limpieza_general,
      $limpieza_filtros,
      $limpieza_serpentin,
      $limpieza_bandeja,
      $serpentin_condensador,
      $limpieza_drenaje,
      $verificacion,
      $estado_carcasa,
      $estado_equipo,
      $equipo_opera_fin,
      $_POST['diagnostico'],
      $_POST['observaciones'],
      $_POST['proximo_servicio']
   );
}

if (isset($_POST['setInformTicket'])) {
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

   $response = ServiceReportFinalRequest::setInformTicket(
      $_GET['report_final'],
      $_POST['fecha_servicio'],
      $_POST['ubicacion'],
      $_POST['tipo_uso'],
      $_POST['otra_ubicacion'],
      $_POST['presion_alta'],
      $_POST['presion_baja'],
      $_POST['presion_reposo'],
      $equipo_opera_inicio,
      $_POST['temperatura_salida'],
      $_POST['temperatura_entrada'],
      $_POST['temperatura_ret'],
      $_POST['temperatura_sum'],
      $_POST['voltaje'],
      $_POST['amperaje'],
      $_POST['fases'],
      $_POST['estado_equipo'],
      $_POST['comentario_equipo'],
      $limpieza_general,
      $limpieza_filtros,
      $limpieza_serpentin,
      $limpieza_bandeja,
      $serpentin_condensador,
      $limpieza_drenaje,
      $verificacion,
      $estado_carcasa,
      $estado_equipo,
      $equipo_opera_fin,
      $_POST['diagnostico'],
      $_POST['observaciones'],
      $_POST['proximo_servicio']
   );
}

if (isset($_POST['setFirmaElectronic'])) {
   ServiceReportFinalRequest::addFirmaReport($_GET['report'], $_POST['firma']);
}

if (isset($_POST['getPdfInform'])) {
   ServiceReportFinalRequest::getPdfInform($_GET['informTicket']);
}
if (isset($_GET['pdf_inform'])) {
   ServiceReportFinalRequest::getPdfInform($_GET['pdf_inform']);
}
