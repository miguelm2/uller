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
                                <h5 class="text-primary">Ticket</h5>
                            </div>
                            <div class="col-md-2 text-right d-grid">
                                <a href="tickets" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left-circle"></i>
                                    <span class="text"> Atras</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="padding-top: 5px;">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="tipo_servicio">Tipo de servicio</label>
                                <input type="text" class="form-control" disabled value="<?= $ticket->getTipo_servicioDTO()->getNombre() ?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="estado">Estado</label>
                                <input type="text" class="form-control" disabled value="<?= $ticket->getEstado()[1] ?>">
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="descripcion">Descripción</label>
                                <textarea class="form-control" rows="3" maxlength="255" disabled><?= $ticket->getDescripcion() ?></textarea>
                            </div>

                            <div class="col-md-12">
                                <hr>
                            </div>

                            <div class="col-md-6 d-grid gap-2 mt-3">
                                <?= $btnDiagnosticoTecnico; ?>
                            </div>
                            <div class="col-md-6 d-grid gap-2 mt-3">
                                <?= $btnInformeTecnico; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="text-primary">Equipos</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="padding-top: 5px;">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Descripcion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?=$tablaEquiposTicket;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </section>

        <!-- ======= Basic Modal ======= -->
        <form method="POST">
            <div class="modal fade" id="newDiagnostico" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Nuevo Diagnostico</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-2">
                                <div class="col-md-12 form-group">
                                    <label for="numero_horas">Número de horas</label>
                                    <input type="number" class="form-control" name="numero_horas" min="0" max="5000" required>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="numero_ayudantes">Número de ayudantes</label>
                                    <input type="number" class="form-control" name="numero_ayudantes" min="0" max="5000" required>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="descripcion">Descripción</label>
                                    <textarea class="form-control" name="descripcion" rows="3" maxlength="255" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Cerrar</button>
                            <button type="submit" name="newDiagnosis" class="btn btn-primary"><i class="bi bi-check-circle"></i> Nuevo Diagnostico</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- End Basic Modal-->


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
    <?= $response ?>
</body>

</html>