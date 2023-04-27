<?php 
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/tool/ServiceTool.php';

if(isset($_POST['newTool'])){
    $response = ServiceTool::newTool($_POST['nombre'], $_POST['tipo'], $_POST['descripcion']);
}

if(isset($_POST['setTool'])){
    $response = ServiceTool::setTool($_POST['id_herramienta'],$_POST['nombre_tool'], $_POST['tipo_tool'], $_POST['descripcion_tool']);
}

if(isset($_POST['getTool'])){
    $response = ServiceTool::getTool($_POST['id_herramienta']);
    echo $response;
}

if(isset($_POST['deleteTool'])){
    $response = ServiceTool::deleteTool($_POST['id_herramienta']);
}

if(isset($_GET)){
    $tablaHerramientas  = ServiceTool::getTablaTools();
    $selectHerramientas = ServiceTool::getSelectTools();
}
?>