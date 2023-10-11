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


        <section class="section dashboard">

            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-9">
                                <h5 class="text-primary">Mis herramientas</h5>
                            </div>
                            <div class="col-md-3 text-right d-grid">
                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#newInsumo"><i class="bi bi-journal-plus"></i> Nuevo herramienta</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="padding-top: 5px;">

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Fecha de registro</th>
                                        <th width="40px">Ver</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Fecha de registro</th>
                                        <th width="40px">Ver</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?= $tablaInsumo; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </section>



        <!-- Modal -->
        <!-- ======= Basic Modal ======= -->
        <form method="POST">
            <div class="modal fade" id="newInsumo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Nuevo Herramienta</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-3">

                                <div class="col-md-12 form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" name="nombre" class="form-control UpperCase" required>
                                </div>
                            </div>
                            <hr style="margin-top: 15px; margin-bottom: 15px; width: 100%;">
                            <div class="row g-2">
                                <div class="col-md-6 form-group">
                                    <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal"><i class="bi bi-x-lg"></i> Cerrar</button>
                                </div>
                                <div class="col-md-6 form-group">
                                    <button type="submit" name="newInput" class="btn btn-success w-100"><i class="bi bi-journal-plus"></i> Nueva Herramienta</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- End Basic Modal-->


        <!-- Modal -->
        <!-- ======= Basic Modal ======= -->
        <form method="POST">
            <div class="modal fade" id="updateInsumo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Actualizar Herramienta</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-3">
                                <input type="hidden" name="id_insumo" class="form-control id_insumo" readonly>

                                <div class="col-md-12 form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" name="nombre" id="nombre" class="form-control UpperCase" required>
                                </div>
                            </div>
                            <hr style="margin-top: 15px; margin-bottom: 15px; width: 100%;">
                            <div class="row g-2">
                                <div class="col-md-4 form-group">
                                    <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal"><i class="bi bi-x-lg"></i> Cerrar</button>
                                </div>
                                <div class="col-md-4 form-group">
                                    <button type="button" class="btn btn-danger btn-eliminar w-100" data-bs-dismiss="modal"><i class="bi bi-trash-fill"></i> Eliminar</button>
                                </div>
                                <div class="col-md-4 form-group">
                                    <button type="submit" name="setInput" class="btn btn-success w-100"><i class="bi bi-journal-plus"></i> Actualizar Herramienta</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- End Basic Modal-->


        <!-- Modal -->
        <!-- ======= Basic Modal ======= -->
        <form method="post">
            <div class="modal fade" id="deleteInsumo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Eliminar Herramienta</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-3">
                                <div class="col-md-12 form-group">
                                    <label for="nombre">¿Esta seguro que desea eliminar esta Herramienta?</label>
                                </div>
                                <input type="hidden" name="id_insumo" class="form-control id_insumo">
                            </div>
                            <hr style="margin-top: 15px; margin-bottom: 15px; width: 100%;">
                            <div class="row g-2">
                                <div class="col-md-6 form-group">
                                    <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal"><i class="bi bi-x-lg"></i> Cerrar</button>
                                </div>
                                <div class="col-md-6 form-group">
                                    <button type="submit" name="deleteInput" class="btn btn-danger w-100"><i class="bi bi-trash-fill"></i> Eliminar Herramienta</button>
                                </div>
                            </div>
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

    <script src="../../js/insumo/insumo.js"></script>

    <!-- Template Main JS File -->
    <script src="../../assets/js/main.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?= $response ?>
</body>

</html>