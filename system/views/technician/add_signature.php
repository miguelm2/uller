<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/routing/Technician.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta content="width=device-width, initial-scale=1.0" name="viewport">

   <title>Aplicacion Web - Kondory Tecnologia</title>
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

   <!-- Template Main CSS File -->
   <link href="../../assets/css/style.css" rel="stylesheet">


</head>

<body>

   <!-- ======= Header ======= -->
   <?php include_once '../../assets/html/header.php'; ?>
   <!-- End Header -->

   <!-- ======= Sidebar ======= -->
   <?php include '../../assets/html/sidebar-admin.php'; ?>

   <!-- End Sidebar-->

   <main id="main" class="main">

      <div class="pagetitle">
      </div><!-- End Page Title -->
      <section class="section profile">
         <div class="row">
            <div class="col-xl-12">
               <div class="card">
                  <div class="card-header">
                     <div class="row">
                        <div class="col-md-10">
                           <h5 class="text-primary">Firmar Reporte</h5>
                        </div>
                     </div>
                  </div>
                  <div class="card-body pt-2">
                     <form method="post" id="signatureform">
                        <div class="form-group" id="divFirmaManoAlzada">
                           <label>Firma</label>
                           <div id="canvasDiv" class="border border-primary"></div>
                        </div>
                        <input type="hidden" id="signature" name="firma">
                        <input type="hidden" name="setFirmaElectronic" value="1">
                        <div class="row">
                           <div class="col-md-6 d-grid gap-2 mt-3">
                              <button type="button" class="btn btn-primary" id="reset-btn"><i class="bi bi-arrow-repeat"></i> Limpiar Firma</button>
                           </div>
                           <div class="col-md-6 d-grid gap-2 mt-3">
                              <button type="button" class="btn btn-success" id="btn-save"><i class="bi bi-check-lg"></i> Firmar</button>
                           </div>
                        </div>
                     </form>
                  </div>
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

   <!-- Js page -->
   <script src="../../js/functions.js"></script>
   <script src="../../js/selectRepeat.js"></script>
   <script src="/system/js/valideImage.js"></script>

   <!-- JS FIRMA -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
   <script src="/system/js/firma_canvas/canvas_firma_user.js"></script>

   <!-- Template Main JS File -->
   <script src="../../assets/js/main.js"></script>
   <script src="../../assets/vendor/swal/sweetalert.min.js"></script>
   <?= $response ?>
</body>

</html>