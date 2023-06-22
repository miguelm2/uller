<?php 
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/user/ServiceUser.php';

if(isset($_POST['setProfileUser'])){
    $response = ServiceUser::setProfile($_POST['nombre'], $_POST['correo'], $_POST['telefono'], $_POST['cedula'], $_POST['direccion'], $_POST['localidad'], $_POST['barrio'], $_POST['torre'], $_POST['numero_apto'], $_POST['ciudad'], $_POST['departamento']);
}

if(isset($_POST['setPassProfileUser'])){
    $response = ServiceUser::setPassProfile($_POST['pass'], $_POST['newPass'], $_POST['confirmPass']);
}

if(isset($_POST['newUser'])){
    $response = ServiceUser::newUser($_POST['nombre'], $_POST['correo'], $_POST['telefono'], $_POST['cedula'], $_POST['direccion'], $_POST['localidad'], $_POST['barrio'], $_POST['torre'], $_POST['numero_apto'], $_POST['ciudad'], $_POST['departamento'], $_POST['pass']);
}

if(isset($_POST['setUser'])){
    $response = ServiceUser::setUser($_GET['user'],$_POST['nombre'], $_POST['correo'], $_POST['telefono'], $_POST['cedula'], $_POST['direccion'], $_POST['localidad'], $_POST['barrio'], $_POST['torre'], $_POST['numero_apto'], $_POST['ciudad'], $_POST['departamento'], $_POST['estado']);
}

if(isset($_POST['setPassUser'])){
    $response = ServiceUser::setPassUser($_GET['user'], $_POST['newPass'], $_POST['confirmPass']);
}

if(isset($_GET['user'])){
    $user         = ServiceUser::getUsuario($_GET['user']);
    $tablaEquipos = ServiceUser::getTableEquipmentType($_GET['user']);
}

if(isset($_POST['deleteUser'])){
    $response = ServiceUser::deleteUser($_GET['user']);
}

if(isset($_GET)){
    $dashboardUser = ServiceUser::getDataDashboard();
    $perfilUsuario = ServiceUser::getPerfilUsuario();
    $tablaUsuarios = ServiceUser::getTablaUsuarios();
    $selectUsers   = ServiceUser::getSelectUsers();
    $id_usuario    = ServiceUser::getIdUser();
}

