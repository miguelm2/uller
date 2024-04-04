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
    <link href='https://fonts.googleapis.com/css?family=Great Vibes' rel='stylesheet'>
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
        <section class="section">
            <div>
                <embed src="<?= $pdfName?>" 
                type="application/pdf" width="100%" height="500px" frameborder="0"></embed>
            </div>
            <div>
            <?= $btnFirmaInform; ?>
            </div>
            <!-- Comienzo Modal Firma -->
            <form id="signatureform" method="POST">
                <div class="modal fade" id="modalFirma" role="dialog">
                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Firma</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row g-3">
                                    <div class="col-md-12 form-group">
                                        <label for="estado" class="form-label">Estilo de la firma</label>
                                        <select class="form-select" id="tipoFirma" name="">
                                            <option value="1">A mano alzada</option>
                                            <option value="2" style="font-family: 'Great Vibes'"> Great Vibes </option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 form-group" id="contentNombre" style="display: none;">
                                        <label class="form-label">Nombre del técnico</label>
                                        <input type="text" class="form-control border border-primary" name="nombre_firma" id="nombre_firma" placeholder="Nombre de la persona autorizada a firmar">
                                    </div>
                                    <div class="form-group" id="divFirmaManoAlzada">
                                        <label>Firma</label>
                                        <div id="canvasDiv" class="border border-primary"></div>
                                    </div>
                                    <div class="form-group" id="divLetraFirmaGreat" style="display: none;">
                                        <label>Firma</label>
                                        <div id="tipoLetraFirma" class="border border-primary">
                                            <div id="capture" class="border border-primary">
                                                <canvas id="myCanvas" width="760" height="100"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <input type="hidden" id="signature" name="firma">
                                    <input type="hidden" name="newFirmaPayment" value="1">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="reset-btn">Limpiar firma</button>
                                <button type="button" class="btn btn-success" id="btn-save">Firmar y enviar</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Fin Modal Firma -->
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

    <!-- JS FIRMA -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
    <script src="../../js/firma_canvas/canvas_firma.js"></script>
    <script src="../../js/firma_canvas/tooltip_firma.js"></script>

    <!-- JS PAGE -->
    <script src="../../js/informFunctions.js"></script>
    <script src="../../js/selectRepeat.js"></script>
    <script src="../../js/firmaReport.js"></script>
    <script src="../../js/ticked/reportService.js"></script>

    <!-- Template Main JS File -->
    <script src="../../assets/js/main.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?= $response ?>
</body>

</html>