<?php 
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/input/ServiceInput.php';

if(isset($_POST['newInput'])){
    $response = ServiceInput::newInput($_POST['nombre']);
}

if(isset($_POST['setInput'])){
    $response = ServiceInput::setInput($_POST['id_insumo'],$_POST['nombre']);
}

if(isset($_POST['getInput'])){
    $insumo = ServiceInput::getInsumo($_POST['id_insumo']);
    echo $insumo;
}

if(isset($_POST['getInputTecnico'])){
    $insumosTecnico = ServiceInput::getOptionInsumos($_POST['id_tecnico']);
    echo $insumosTecnico;
}

if(isset($_POST['deleteInput'])){
    $response = ServiceInput::deleteInput($_POST['id_insumo']);
}

if(isset($_GET)){
    $tablaInsumo = ServiceInput::getTablaInsumos();
    $tablaInsumoAdmin = ServiceInput::getTablaInsumosAdmin();
}

