<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/modules/request/ServiceRequest.php';

if (isset($_POST['newRequest'])) {
   $services = [
      'split' => [
         'preventive' => isset($_POST['split_preventive']) ? $_POST['split_preventive'] : 0,
         'corrective' => isset($_POST['split_corrective']) ? $_POST['split_corrective'] : 0,
         'install'    => isset($_POST['split_install']) ? $_POST['split_install'] : 0,
         'uninstall'  => isset($_POST['split_uninstall']) ? $_POST['split_uninstall'] : 0
      ],
      'mini' => [
         'preventive' => isset($_POST['mini_preventive']) ? $_POST['mini_preventive'] : 0,
         'corrective' => isset($_POST['mini_corrective']) ? $_POST['mini_corrective'] : 0,
         'install'    => isset($_POST['mini_install']) ? $_POST['mini_install'] : 0,
         'uninstall'  => isset($_POST['mini_uninstall']) ? $_POST['mini_uninstall'] : 0
      ],
      'cassette' => [
         'preventive' => isset($_POST['cassette_preventive']) ? $_POST['cassette_preventive'] : 0,
         'corrective' => isset($_POST['cassette_corrective']) ? $_POST['cassette_corrective'] : 0,
         'install'    => isset($_POST['cassette_install']) ? $_POST['cassette_install'] : 0,
         'uninstall'  => isset($_POST['cassette_uninstall']) ? $_POST['cassette_uninstall'] : 0
      ],
      'floor' => [
         'preventive' => isset($_POST['floor_preventive']) ? $_POST['floor_preventive'] : 0,
         'corrective' => isset($_POST['floor_corrective']) ? $_POST['floor_corrective'] : 0,
         'install'    => isset($_POST['floor_install']) ? $_POST['floor_install'] : 0,
         'uninstall'  => isset($_POST['floor_uninstall']) ? $_POST['floor_uninstall'] : 0
      ],
      'window' => [
         'preventive' => isset($_POST['window_preventive']) ? $_POST['window_preventive'] : 0,
         'corrective' => isset($_POST['window_corrective']) ? $_POST['window_corrective'] : 0,
         'install'    => isset($_POST['window_install']) ? $_POST['window_install'] : 0,
         'uninstall'  => isset($_POST['window_uninstall']) ? $_POST['window_uninstall'] : 0
      ],
      'other' => [
         'preventive' => isset($_POST['other_preventive']) ? $_POST['other_preventive'] : 0,
         'corrective' => isset($_POST['other_corrective']) ? $_POST['other_corrective'] : 0,
         'install'    => isset($_POST['other_install']) ? $_POST['other_install'] : 0,
         'uninstall'  => isset($_POST['other_uninstall']) ? $_POST['other_uninstall'] : 0
      ]
   ];
   ServiceRequest::newRequest($services);
}
if (isset($_POST['newRequestAdmin'])) {
   $services = [
      'split' => [
         'preventive' => isset($_POST['split_preventive']) ? $_POST['split_preventive'] : 0,
         'corrective' => isset($_POST['split_corrective']) ? $_POST['split_corrective'] : 0,
         'install'    => isset($_POST['split_install']) ? $_POST['split_install'] : 0,
         'uninstall'  => isset($_POST['split_uninstall']) ? $_POST['split_uninstall'] : 0
      ],
      'mini' => [
         'preventive' => isset($_POST['mini_preventive']) ? $_POST['mini_preventive'] : 0,
         'corrective' => isset($_POST['mini_corrective']) ? $_POST['mini_corrective'] : 0,
         'install'    => isset($_POST['mini_install']) ? $_POST['mini_install'] : 0,
         'uninstall'  => isset($_POST['mini_uninstall']) ? $_POST['mini_uninstall'] : 0
      ],
      'cassette' => [
         'preventive' => isset($_POST['cassette_preventive']) ? $_POST['cassette_preventive'] : 0,
         'corrective' => isset($_POST['cassette_corrective']) ? $_POST['cassette_corrective'] : 0,
         'install'    => isset($_POST['cassette_install']) ? $_POST['cassette_install'] : 0,
         'uninstall'  => isset($_POST['cassette_uninstall']) ? $_POST['cassette_uninstall'] : 0
      ],
      'floor' => [
         'preventive' => isset($_POST['floor_preventive']) ? $_POST['floor_preventive'] : 0,
         'corrective' => isset($_POST['floor_corrective']) ? $_POST['floor_corrective'] : 0,
         'install'    => isset($_POST['floor_install']) ? $_POST['floor_install'] : 0,
         'uninstall'  => isset($_POST['floor_uninstall']) ? $_POST['floor_uninstall'] : 0
      ],
      'window' => [
         'preventive' => isset($_POST['window_preventive']) ? $_POST['window_preventive'] : 0,
         'corrective' => isset($_POST['window_corrective']) ? $_POST['window_corrective'] : 0,
         'install'    => isset($_POST['window_install']) ? $_POST['window_install'] : 0,
         'uninstall'  => isset($_POST['window_uninstall']) ? $_POST['window_uninstall'] : 0
      ],
      'other' => [
         'preventive' => isset($_POST['other_preventive']) ? $_POST['other_preventive'] : 0,
         'corrective' => isset($_POST['other_corrective']) ? $_POST['other_corrective'] : 0,
         'install'    => isset($_POST['other_install']) ? $_POST['other_install'] : 0,
         'uninstall'  => isset($_POST['other_uninstall']) ? $_POST['other_uninstall'] : 0
      ]
   ];
   ServiceRequest::newRequestAdmin($services, $_POST['valor'], $_POST['usuario'], $_POST['tecnico'], $_POST['fecha']);
}

if (isset($_GET['request'])) {
   $requestInfo = ServiceRequest::getRequest($_GET['request']);
}

if (basename($_SERVER['PHP_SELF']) == 'requests.php') {
   $tableRequest = ServiceRequest::getTableRequestByUser();
   $tableRequestAdmin = ServiceRequest::getTableRequest();
   $cardRequestTechinal = ServiceRequest::getCardRequestTecnicias();
}

if (basename($_SERVER['PHP_SELF']) == 'index.php') {
   $cardRequestTechinal = ServiceRequest::getCardRequestTecnicias();
}