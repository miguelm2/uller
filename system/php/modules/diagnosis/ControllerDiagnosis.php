<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/diagnosis/ServiceDiagnosis.php';

if(isset($_POST['newDiagnosis'])){
    $response = ServiceDiagnosis::newDiagnosis($_GET['ticket'], $_POST['numero_horas'], $_POST['numero_ayudantes'], $_POST['descripcion']);
}

if(isset($_POST['setDiagnosis'])){
    $response = ServiceDiagnosis::setDiagnosis($_GET['diagnosis'], $_POST['numero_horas'], $_POST['numero_ayudantes'], $_POST['descripcion']);
}

if(isset($_POST['setPrecioDiagnosis'])){
    $response = ServiceDiagnosis::setPrecioDiagnosis($_GET['diagnosis'], $_POST['precio']);
}

if(isset($_POST['addTool'])){
    $response = ServiceDiagnosis::addToolDiagnosis($_GET['diagnosis'], $_GET['ticket'], $_POST['herramienta'], $_POST['cantidad_herramientas']);
}

if(isset($_POST['addMaterial'])){
    $response = ServiceDiagnosis::addMaterialDiagnosis($_GET['diagnosis'], $_GET['ticket'], $_POST['material'], $_POST['cantidad_material'], $_POST['unidad_medida']);
}

if(isset($_POST['deleteComponentDiagnosis'])){
    $response = ServiceDiagnosis::deleteComponentDiagnosis($_POST['nombre_tabla'],$_POST['nombre_campo'],$_POST['id']);
}

if(isset($_POST['deleteDiagnosis'])){
    $response = ServiceDiagnosis::deleteDiagnosis($_GET['diagnosis'], $_GET['ticket']);
}

if(isset($_GET['diagnosis'])){
    $diagnostico       = ServiceDiagnosis::getDiagnosis($_GET['diagnosis']);
    $btnAtras          = ServiceDiagnosis::getBackButton($_GET['ticket']);
    $tablaHerramientas = ServiceDiagnosis::getTableHerramientas($diagnostico->getLstHerramientas());
    $tablaMateriales   = ServiceDiagnosis::getTableMateriales($diagnostico->getLstMateriales());
}
?>