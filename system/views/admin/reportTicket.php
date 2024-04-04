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
                                <h5 class="text-primary">Orden de Servicio</h5>
                            </div>
                            <div class="col-md-2 text-right d-grid">
                                <a href="<?= $btnAtrasTicket; ?>" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left-circle"></i>
                                    <span class="text"> Atras</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="padding-top: 5px;">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Equipo</th>
                                        <th>Marca</th>
                                        <th>Tipo de equipo</th>
                                        <th>Servicio</th>
                                        <th width="10px">Ver</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Equipo</th>
                                        <th>Marca</th>
                                        <th>Tipo de equipo</th>
                                        <th>Servicio</th>
                                        <th width="10px">Ver</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?= $tablaOrdenServicio; ?>
                                </tbody>
                            </table>
                        </div>
                        <form method="post">
                            <div class="col-md-6 mx-auto mt-3">
                                <button type="submit" class="btn btn-secondary w-100" name="getPdfReportTicket"><i class="bi bi-filetype-pdf"></i> Generar Orden</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </section>


    </main><!-- End #main -->

    <!-- Modal Editar Registro-->
    <!-- ======= Basic Modal ======= -->
    <form method="post">
        <div class="modal fade" id="modalEditarRegistro" tabindex="-1">
            <div class="modal-dialog  modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Editar información de Orden de servicio</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <input type="hidden" id="id_tipo" name="id_tipo">
                            <div class="col-md-6 form-group">
                                <label for="fecha_servicio">Fecha servicio</label>
                                <input type="date" class="form-control" name="fecha_servicio" id="fecha_servicio" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="fecha_ultimo_servicio">Fecha del ultimo servicio</label>
                                <input type="date" class="form-control" name="fecha_ultimo_servicio" id="fecha_ultimo_servicio" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="ubicacion_equipo">Ubicación del equipo</label>
                                <input type="text" class="form-control" name="ubicacion_equipo" id="ubicacion_equipo" maxlength="150" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="tipo_uso">Tipo de uso</label>
                                <select class="form-select" name="tipo_uso" id="tipo_uso">
                                    <option value="1">Residencial</option>
                                    <option value="2">Comercial</option>
                                </select>
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="presenta_falla">Presenta falla</label>
                                <input type="text" class="form-control" name="presenta_falla" id="presenta_falla" maxlength="255" required>
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="notas">Notas</label>
                                <textarea class="form-control" name="notas" id="notas" rows="3" maxlength="255" required></textarea>
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="observaciones">Observaciones</label>
                                <textarea class="form-control" name="observaciones" id="observaciones" rows="3" maxlength="500" required></textarea>
                            </div>
                            <div class="col-md-12">
                                <hr>
                            </div>
                            <div class="col-md-6 d-grid gap-2 mt-3">
                                <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                            <div class="col-md-6 d-grid gap-2 mt-3">
                                <button type="submit" class="btn btn-success w-100" name="setReportTicket"><i class="bi bi-plus-square"></i> Editar Registro de Orden</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- End Basic Modal-->

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
    <script src="../../js/selectRepeat.js"></script>
    <script src="../../js/ticked/serviceOrderAdmin.js"></script>

    <!-- Template Main JS File -->
    <script src="../../assets/js/main.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?= $response ?>
</body>

</html>