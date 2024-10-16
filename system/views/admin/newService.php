<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/routing/Admin.php'; ?>
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
   <?php include '../../assets/html/sidebar-admin.php'; ?>
   <!-- End Sidebar-->

   <main id="main" class="main">


      <section class="section dashboard">

         <div class="row">
            <div class="card">
               <div class="card-header">
                  <div class="row">
                     <div class="col-md-10">
                        <h5 class="text-primary">Nuevo servicio</h5>
                     </div>
                     <div class="col-md-2 text-right d-grid">
                        <a href="request" class="btn btn-secondary">
                           <i class="bi bi-arrow-left-circle"></i>
                           <span class="text"> Atras</span>
                        </a>
                     </div>
                  </div>
               </div>
               <div class="card-body" style="padding-top: 5px;">
                  <!-- Vertical Form -->
                  <form class="row g-3 text-center mt-3 pb-2" method="post">
                     <div class="col-md-4">
                        <div class="card shadow-lg">
                           <div class="card-header pb-0">
                              <div class="card-title p-0">Minisplit</div>
                           </div>
                           <div class="card-body pb-0">
                              <img src="/assets/img/equipos/mini_split.png" alt="Minisplit" class="img-fluid" style="height: 200px;">
                           </div>
                           <div class="card-footer">
                              <table class="table table-bordered justify-content-center">
                                 <tbody id="service-table-mini">
                                    <tr>
                                       <td><input type="number" class="form-control" name="mini_preventive" placeholder="Cantidad"></td>
                                       <td>Preventivo</td>
                                    </tr>
                                    <tr>
                                       <td><input type="number" class="form-control" name="mini_corrective" placeholder="Cantidad"></td>
                                       <td>Correctivo</td>
                                    </tr>
                                 </tbody>
                              </table>
                              <button type="button" name="add_mini" id="add_mini" class="btn btn-outline-dark"><i class="bi bi-plus-lg"></i> Mostrar más</button>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="card shadow-lg">
                           <div class="card-header pb-0">
                              <div class="card-title p-0">Split / Central</div>
                           </div>
                           <div class="card-body pb-0">
                              <img src="/assets/img/equipos/split_central.png" alt="Split/Central" class="img-fluid" style="height: 200px;">
                           </div>
                           <div class="card-footer">
                              <table class="table table-bordered justify-content-center">
                                 <tbody id="service-table-split">
                                    <tr>
                                       <td><input type="number" class="form-control" name="split_preventive" placeholder="Cantidad"></td>
                                       <td>Preventivo</td>
                                    </tr>
                                    <tr>
                                       <td><input type="number" class="form-control" name="split_corrective" placeholder="Cantidad"></td>
                                       <td>Correctivo</td>
                                    </tr>
                                 </tbody>
                              </table>
                              <button type="button" name="add_split" id="add_split" class="btn btn-outline-dark"><i class="bi bi-plus-lg"></i> Mostrar más</button>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="card shadow-lg">
                           <div class="card-header pb-0">
                              <div class="card-title p-0">Cassette</div>
                           </div>
                           <div class="card-body pb-0">
                              <img src="/assets/img/equipos/cassette.png" alt="Cassette" class="img-fluid" style="height: 200px;">
                           </div>
                           <div class="card-footer">
                              <table class="table table-bordered justify-content-center">
                                 <tbody id="service-table-cassette">
                                    <tr>
                                       <td><input type="number" class="form-control" name="cassette_preventive" placeholder="Cantidad"></td>
                                       <td>Preventivo</td>
                                    </tr>
                                    <tr>
                                       <td><input type="number" class="form-control" name="cassette_corrective" placeholder="Cantidad"></td>
                                       <td>Correctivo</td>
                                    </tr>
                                 </tbody>
                              </table>
                              <button type="button" name="add_cassete" id="add_cassette" class="btn btn-outline-dark"><i class="bi bi-plus-lg"></i> Mostrar más</button>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="card shadow-lg">
                           <div class="card-header pb-0">
                              <div class="card-title p-0">Piso Techo</div>
                           </div>
                           <div class="card-body pb-0">
                              <img src="/assets/img/equipos/piso_techo.jpg" alt="Piso-techo" class="img-fluid" style="height: 200px;">
                           </div>
                           <div class="card-footer">
                              <table class="table table-bordered justify-content-center">
                                 <tbody id="service-table-floor">
                                    <tr>
                                       <td><input type="number" class="form-control" name="floor_preventive" placeholder="Cantidad"></td>
                                       <td>Preventivo</td>
                                    </tr>
                                    <tr>
                                       <td><input type="number" class="form-control" name="floor_corrective" placeholder="Cantidad"></td>
                                       <td>Correctivo</td>
                                    </tr>
                                 </tbody>
                              </table>
                              <button type="button" name="add_floor" id="add_floor" class="btn btn-outline-dark"><i class="bi bi-plus-lg"></i> Mostrar más</button>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="card shadow-lg">
                           <div class="card-header pb-0">
                              <div class="card-title p-0">Ventana</div>
                           </div>
                           <div class="card-body pb-0">
                              <img src="/assets/img/equipos/ventana.png" alt="Ventana" class="img-fluid" style="height: 200px;">
                           </div>
                           <div class="card-footer">
                              <table class="table table-bordered justify-content-center">
                                 <tbody id="service-table-window">
                                    <tr>
                                       <td><input type="number" class="form-control" name="window_preventive" placeholder="Cantidad"></td>
                                       <td>Preventivo</td>
                                    </tr>
                                    <tr>
                                       <td><input type="number" class="form-control" name="window_corrective" placeholder="Cantidad"></td>
                                       <td>Correctivo</td>
                                    </tr>
                                 </tbody>
                              </table>
                              <button type="button" name="add_window" id="add_window" class="btn btn-outline-dark"><i class="bi bi-plus-lg"></i> Mostrar más</button>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="card shadow-lg">
                           <div class="card-header pb-0">
                              <div class="card-title p-0">Otro</div>
                           </div>
                           <div class="card-body pb-0">
                              <img src="/assets/img/equipos/otro_aire.png" alt="Otro-Aire" class="img-fluid" style="height: 200px;">
                           </div>
                           <div class="card-footer">
                              <table class="table table-bordered justify-content-center">
                                 <tbody id="service-table-other">
                                    <tr>
                                       <td><input type="number" class="form-control" name="other_preventive" placeholder="Cantidad"></td>
                                       <td>Preventivo</td>
                                    </tr>
                                    <tr>
                                       <td><input type="number" class="form-control" name="other_corrective" placeholder="Cantidad"></td>
                                       <td>Correctivo</td>
                                    </tr>
                                 </tbody>
                              </table>
                              <button type="button" name="add_other" id="add_other" class="btn btn-outline-dark"><i class="bi bi-plus-lg"></i> Mostrar más</button>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6 text-start">
                        <label for="valor">Valor del servicio</label>
                        <input type="number" name="valor" class="form-control" placeholder="Valor del servicio" required>
                     </div>
                     <div class="col-md-6 text-start">
                        <label for="fecha">Fecha del servicio</label>
                        <input type="date" name="fecha" id="fecha" class="form-control" required>
                     </div>
                     <div class="col-md-6 text-start">
                        <label for="valor">Usuario</label>
                        <select name="usuario" id="usuario" class="form-select" required>
                           <option value="">Seleccione una opción</option>
                           <?= $selectUsers ?>
                        </select>
                     </div>
                     <div class="col-md-6 text-start">
                        <label for="tecnico">Técnico</label>
                        <select name="tecnico" id="tecnico" class="form-select">
                           <option value="">Seleccione una opción</option>
                           <?= $selectTecnicos ?>
                        </select>
                     </div>
                     <hr>
                     <div class="col-md-12 d-grid">
                        <button type="submit" class="btn btn-primary" name="newRequestAdmin" id="newRequestAdmin"><i class="bi bi-check2-all"></i> Generar solicitud</button>
                     </div>
                  </form><!-- Vertical Form -->
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

   <!-- Js page -->
   <script src="../../js/selectRepeat.js"></script>

   <!-- Template Main JS File -->
   <script src="../../assets/js/main.js"></script>
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <script src="/system/js/new_service.js"></script>
   <?= $response ?>
</body>

</html>