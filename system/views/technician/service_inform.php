<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/routing/Technician.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta content="width=device-width, initial-scale=1.0" name="viewport">

   <title>Aplicacion Web - Uller</title>
   <meta content="" name="description">
   <meta content="" name="keywords">

   <!-- Favicons -->
   <link href="../../assets/img/favicon.png" rel="icon">
   <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

   <!-- Google Fonts -->
   <link href="https://fonts.gstatic.com" rel="preconnect">
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

   <!-- Vendor CSS Files -->
   <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
   <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
   <link href="../../assets/vendor/quill/quill.snow.css" rel="stylesheet">
   <link href="../../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
   <link href="../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
   <link href="../../assets/vendor/simple-datatables/style.css" rel="stylesheet">
   <link href="../../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

   <!-- Template Main CSS File -->
   <link href="../../assets/css/style.css" rel="stylesheet">

</head>

<body>

   <!-- ======= Header ======= -->
   <?php include '../../assets/html/header.php'; ?>
   <!-- End Header -->

   <!-- ======= Sidebar ======= -->
   <?php include '../../assets/html/sidebar-technician.php'; ?>
   <!-- End Sidebar-->

   <main id="main" class="main">


      <section class="section dashboard">

         <div class="row">
            <div class="card">
               <div class="card-header">
                  <div class="row">
                     <div class="col-md-10">
                        <h5 class="text-primary">Nuevo Informe de Servicio</h5>
                     </div>
                     <div class="col-md-2 text-right d-grid">
                        <a href="service?service=1" class="btn btn-secondary">
                           <i class="bi bi-arrow-left-circle"></i>
                           <span class="text"> Atras</span>
                        </a>
                     </div>
                  </div>
               </div>
               <div class="card-body" style="padding-top: 5px;">
                  <form method="POST">
                     <div class="row g-3">
                        <div class="col-md-12 form-group">
                           <label for="fecha_servicio">Fecha servicio</label>
                           <input type="date" class="form-control" name="fecha_servicio" required>
                        </div>
                     </div>
                     <div class="row g-1" id="" style="margin-top:10pt;">
                        <div class="col-md-6">
                           <label for="ubicacion">Ubicación</label>
                           <select name="ubicacion" id="ubicacion" class="form-select" required>
                              <option value="">Seleccione una opción</option>
                              <option value="1">Sala</option>
                              <option value="2">Comedor</option>
                              <option value="3">Habitación principal</option>
                              <option value="4">Habitacion 1</option>
                              <option value="5">Habitación 2</option>
                              <option value="6">Habitación 3</option>
                              <option value="7">Estudio</option>
                              <option value="8">Family</option>
                              <option value="9">Otro</option>
                           </select>
                        </div>
                        <div class="col-md-6">
                           <label for="tipo_uso">Tipo de uso</label>
                           <select name="tipo_uso" id="tipo_uso" class="form-select" required>
                              <option value="">Seleccione una opción</option>
                              <option value="1">Comercial</option>
                              <option value="2">Residencial</option>
                              <option value="3">Industrial</option>
                              <option value="4">Otro</option>
                           </select>
                        </div>
                        <div class="col-md-6">
                           <label for="presion_alta">Presión Alta (psig)</label>
                           <input type="text" name="presion_alta" id="presion_alta" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                           <label for="presion_baja">Presión Baja (psig)</label>
                           <input type="text" name="presion_baja" id="presion_baja" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                           <label for="presion_reposo">Presión en reposo (psig)</label>
                           <input type="text" name="presion_reposo" id="presion_reposo" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                           <label for="temperatura_entrada">Temperatura Entrada Condensadora(°C)</label>
                           <input type="text" name="temperatura_entrada" id="temperatura_entrada" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                           <label for="temperatura_salida">Temperatura Salida Condensadora(°C)</label>
                           <input type="text" name="temperatura_salida" id="temperatura_salida" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                           <label for="temperatura_ret">Temperatura Ret Evap(°C)</label>
                           <input type="text" name="temperatura_ret" id="temperatura_ret" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                           <label for="temperatura_sum">Temperatura Sum Evap(°C)</label>
                           <input type="text" name="temperatura_sum" id="temperatura_sum" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                           <label for="voltaje">Voltaje (V)</label>
                           <input type="number" name="voltaje" id="voltaje" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                           <label for="fases">Fases</label>
                           <input type="number" name="fases" id="fases" class="form-control" min="1" max="3" required>
                        </div>
                        <div class="col-md-6">
                           <label for="amperaje">Amperaje (A)</label>
                           <input type="number" name="amperaje" id="amperaje" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                           <label for="estado_equipo">Estado Equipo</label>
                           <select name="estado_equipo" id="estado_equipo" class="form-select">
                              <option value="">Seleccione una opción</option>
                              <option value="1">Bueno</option>
                              <option value="2">Regular</option>
                              <option value="3">Requiere Cambio</option>
                           </select>
                        </div>
                        <div class="col-md-12">
                           <label for="comentario_equipo">Comentarios de este equipo</label>
                           <textarea name="comentario_equipo" id="comentario_equipo" class="form-control" rows="3" placeholder="Escribe comentarios sobre este equipo"></textarea>
                        </div>

                        <hr class="mt-2">

                        <div class="col-md-6">
                           <input class="form-check-input " type="checkbox" value="1" name="equipo_opera_inicio">
                           <label class="form-check-label" for="equipo_opera_inicio">
                              Equipo opera adecuadamente antes del servicio
                           </label>
                        </div>
                        <div class="col-md-6">
                           <input class="form-check-input " type="checkbox" value="1" name="limpieza_general">
                           <label class="form-check-label" for="limpieza_general">
                              Limpieza General
                           </label>
                        </div>
                        <div class="col-md-6">
                           <input class="form-check-input " type="checkbox" value="1" name="limpieza_filtros">
                           <label class="form-check-label" for="limpieza_filtros">
                              Limpieza Filtros
                           </label>
                        </div>
                        <div class="col-md-6">
                           <input class="form-check-input " type="checkbox" value="1" name="limpieza_serpentin">
                           <label class="form-check-label" for="limpieza_serpentin">
                              Limpieza Serpentin Evaporador
                           </label>
                        </div>
                        <div class="col-md-6">
                           <input class="form-check-input " type="checkbox" value="1" name="limpieza_bandeja">
                           <label class="form-check-label" for="limpieza_bandeja">
                              Limpieza Bandeja
                           </label>
                        </div>
                        <div class="col-md-6">
                           <input class="form-check-input " type="checkbox" value="1" name="serpentin_condensador">
                           <label class="form-check-label" for="serpentin_condensador">
                              Limpieza Serpentin Condensador
                           </label>
                        </div>
                        <div class="col-md-6">
                           <input class="form-check-input " type="checkbox" value="1" name="limpieza_drenaje">
                           <label class="form-check-label" for="limpieza_drenaje">
                              Limpieza Drenaje
                           </label>
                        </div>
                        <div class="col-md-6">
                           <input class="form-check-input " type="checkbox" value="1" name="verificacion">
                           <label class="form-check-label" for="verificacion">
                              Verificacion
                           </label>
                        </div>
                        <div class="col-md-6">
                           <input class="form-check-input " type="checkbox" value="1" name="estado_carcasa">
                           <label class="form-check-label" for="estado_carcasa">
                              Estado Carcasa Interior
                           </label>
                        </div>
                        <div class="col-md-6">
                           <input class="form-check-input " type="checkbox" value="1" name="estado_equipo">
                           <label class="form-check-label" for="estado_equipo">
                              Estado Equipo Exterior (B/R/M)
                           </label>
                        </div>
                        <div class="col-md-12">
                           <input class="form-check-input " type="checkbox" value="1" name="equipo_opera_fin">
                           <label class="form-check-label" for="equipo_opera_fin">
                              Equipo queda operando adecuadamente después del servicio
                           </label>
                        </div>

                        <hr class="mt-2">

                        <div class="col-md-6">
                           <label class="form-check-label" for="unidad_inferior">
                              Unidad interior adecuadamente instalada
                           </label>
                           <select name="unidad_inferior" id="unidad_inferior" class="form-select" required>
                              <option value="">Seleccione una opción</option>
                              <option value="1">Si</option>
                              <option value="2">Recomienda mejorarse</option>
                           </select>
                        </div>
                        <div class="col-md-6">
                           <label class="form-check-label" for="condesadora_ventilada" class="form-select" required>
                              Condensadora adecuadamente ventilada
                           </label>
                           <select name="condesadora_ventilada" id="condesadora_ventilada" class="form-select" required>
                              <option value="">Seleccione una opción</option>
                              <option value="1">Si</option>
                              <option value="2">Recomienda mejorarse</option>
                           </select>
                        </div>
                        <div class="col-md-6">
                           <label class="form-check-label" for="cables_electricos" class="form-select" required>
                              Estado cables electricos
                           </label>
                           <select name="cables" id="cables" class="form-select" required>
                              <option value="">Seleccione una opción</option>
                              <option value="1">Bueno</option>
                              <option value="2">Regular</option>
                              <option value="3">Recomienda cambio</option>
                           </select>
                        </div>
                        
                        <div class="col-md-6 form-group">
                           <label for="proximo_servicio">Próximo servicio Recomendado</label>
                           <input type="date" class="form-control" name="proximo_servicio">
                        </div>
                     </div>


                     <div class="row g-3" id="" style="margin-top:1pt;">
                        <div class="col-md-12 form-group">
                           <label for="diagnostico">Diagnostico Mantenimiento Correctivo</label>
                           <textarea class="form-control " name="diagnostico" rows="3" maxlength="255"></textarea>
                        </div>
                     </div>

                     <div class="row g-3" style="margin-top:1pt;">
                        <div class="col-md-12 form-group">
                           <label for="observaciones">Observaciones / Recomendaciones</label>
                           <textarea class="form-control" name="observaciones" rows="3" maxlength="500" required></textarea>
                        </div>
                        <div class="col-md-6">
                           <label for="evidencia_antes">Evidencia Antes</label>
                           <input type="file" name="evidencia_antes" id="evidencia_antes" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                           <label for="evidencia_despues">Evidencia Después</label>
                           <input type="file" name="evidencia_despues" id="evidencia_despues" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                           <hr>
                        </div>
                        <div class="col-md-12 d-grid gap-2 mt-3">
                           <button type="submit" class="btn btn-success" name="newInformRequest"><i class="bi bi-plus-square"></i> Crear Informe</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>

         </div>

      </section>


   </main><!-- End #main -->

   <!-- ======= Footer ======= -->
   <?php include_once '../../assets/html/footer.html'; ?>
   <!-- End Footer -->

   <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

   <!-- Vendor JS Files -->
   <script src="../../assets/vendor/jquery/jquery.min.js"></script>

   <script src="../../assets/vendor/apexcharts/apexcharts.min.js"></script>
   <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="../../assets/vendor/chart.js/chart.umd.js"></script>
   <script src="../../assets/vendor/echarts/echarts.min.js"></script>
   <script src="../../assets/vendor/quill/quill.min.js"></script>
   <script src="../../assets/vendor/simple-datatables/simple-datatables.js"></script>
   <script src="../../assets/vendor/tinymce/tinymce.min.js"></script>
   <script src="../../assets/vendor/php-email-form/validate.js"></script>
   <script src="../../assets/vendor/datatables/jquery.dataTables.min.js"></script>
   <script src="../../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
   <script src="../../js/demo/datatables-demo.js"></script>

   <!-- JS PAGE -->
   <script src="../../js/informFunctions.js"></script>

   <!-- Template Main JS File -->
   <script src="../../assets/js/main.js"></script>
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <?= $response ?>
</body>

</html>