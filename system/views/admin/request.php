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
    <?php include '../../assets/html/sidebar-user.php'; ?>
    <!-- End Sidebar-->

    <main id="main" class="main">


        <section class="section dashboard">

            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-10">
                                <h5 class="text-primary">Añadir servicio</h5>
                            </div>
                            <div class="col-md-2 text-right d-grid">
                                <a href="requests" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left-circle"></i>
                                    <span class="text"> Atras</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="padding-top: 5px;">
                        <!-- Vertical Form -->
                        <form class="row g-3 text-center mt-3 pb-2" method="post">
                            <?= $tableAddService ?>
                            <div class="col-md-4 text-start">
                                <label for="valor">Valor del servicio</label>
                                <input type="number" name="valor" class="form-control" placeholder="Valor del servicio" value="<?= $requestInfo->getValor() ?>" required>
                            </div>
                            <div class="col-md-4 text-start">
                                <label for="fecha">Fecha del servicio</label>
                                <input type="date" name="fecha" id="fecha" class="form-control" value="<?= $requestInfo->getFecha() ?>" required>
                            </div>
                            <div class="col-md-4 text-start">
                                <label for="fecha">Fecha del servicio</label>
                                <select name="estado" id="estado" class="form-select" required>
                                    <option value="<?= $requestInfo->getEstado()[0] ?>"><?= $requestInfo->getEstado()[1] ?></option>
                                    <option value="1">Solicitado</option>
                                    <option value="2">Asignado</option>
                                    <option value="3">En proceso</option>
                                    <option value="4">Finalizado</option>
                                    <option value="5">Rechazado</option>
                                </select>
                            </div>
                            <div class="col-md-6 text-start">
                                <label for="valor">Usuario</label>
                                <p>
                                    <?= $requestInfo->getUsuarioDTO()->getNombre() ?>
                                </p>
                            </div>
                            <div class="col-md-6 text-start">
                                <label for="tecnico">Técnico</label>
                                <select name="tecnico" id="tecnico" class="form-select">
                                    <option value="">Seleccione una opción</option>
                                    <?= $selectTecnicos ?>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12 d-grid">
                                        <button type="submit" class="btn btn-primary" name="addServiceAdmin">
                                            <i class="bi bi-floppy"></i> Guardar Información
                                        </button>
                                    </div>
                                </div>
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