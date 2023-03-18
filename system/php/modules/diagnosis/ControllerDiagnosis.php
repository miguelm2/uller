<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/diagnosis/ServiceDiagnosis.php';

if(isset($_POST['newDiagnosis'])){
    $response = ServiceDiagnosis::newDiagnosis( $_GET['ticket'], $_POST['descripcion']);
}

if(isset($_POST['addTool'])){
    $response = ServiceDiagnosis::addToolDiagnosis($_GET['diagnosis'], $_GET['ticket'], $_POST['herramienta']);
}

if(isset($_POST['addMaterial'])){
    $response = ServiceDiagnosis::addMaterialDiagnosis($_GET['diagnosis'], $_GET['ticket'], $_POST['material']);
}

if(isset($_POST['addAssistant'])){
    $response = ServiceDiagnosis::addAssistantDiagnosis($_GET['diagnosis'], $_GET['ticket'], $_POST['ayudante']);
}

if(isset($_POST['deleteComponentDiagnosis'])){
    $response = ServiceDiagnosis::deleteComponentDiagnosis($_POST['nombre_tabla'],$_POST['nombre_campo'],$_POST['id']);
}

if(isset($_GET['diagnosis'])){
    $diagnostico       = ServiceDiagnosis::getDiagnosis($_GET['diagnosis']);
    $btnAtras          = ServiceDiagnosis::getBackButton($_GET['ticket']);
    $tablaHerramientas = ServiceDiagnosis::getTableHerramientas($diagnostico->getLstHerramientas());
    $tablaMateriales   = ServiceDiagnosis::getTableMateriales($diagnostico->getLstMateriales());
    $tablaAyudantes    = ServiceDiagnosis::getTableAyudantes($diagnostico->getLstAyudantes());
}
?>