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
                                <h5 class="text-primary">Equipo</h5>
                            </div>
                            <div class="col-md-2 text-right d-grid">
                                <a href="<?=$backPageEqui?>" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left-circle"></i>
                                    <span class="text"> Atras</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="padding-top: 5px;">
                        <!-- Vertical Form -->
                        <form class="row g-3" method="post">
                            <div class="col-md-6 form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" name="nombre" maxlength="255" required value="<?=$equipment->getNombre()?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="marca">Marca</label>
                                <input type="text" class="form-control" name="marca" maxlength="255" required value="<?=$equipment->getMarca()?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="modelo">Modelo</label>
                                <input type="text" class="form-control" name="modelo" maxlength="255" required value="<?=$equipment->getModelo()?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="year_fabricacion">Año de fabricación</label>
                                <input type="number" class="form-control" name="year_fabricacion" min="1900" max="3000" required value="<?=$equipment->getYear_fabricacion()?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="serial_interior">Serial unidad interior</label>
                                <input type="text" class="form-control" name="serial_interior" maxlength="255" required value="<?=$equipment->getSerial_interior()?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="serial_exterior">Serial unidad exterior</label>
                                <input type="text" class="form-control" name="serial_exterior" maxlength="255" required value="<?=$equipment->getSerial_exterior()?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="tipo_equipo">Tipo de equipo</label>
                                <input type="text" class="form-control" name="tipo_equipo" maxlength="255" required value="<?=$equipment->getTipo_equipo()?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="capacidad_btuh">Capacidad (BTUH)</label>
                                <input type="number" step="0.01" class="form-control" name="capacidad_btuh" required value="<?=$equipment->getCapacidad_btuh()?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="voltaje_fases">Voltaje / Fases</label>
                                <input type="text" class="form-control" name="voltaje_fases" maxlength="20" required value="<?=$equipment->getVoltaje_fases()?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="refrigerante">Refrigerante</label>
                                <input type="text" class="form-control" name="refrigerante" maxlength="50" required value="<?=$equipment->getRefrigerante()?>">
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="inverter">Inverter</label>
                                <br>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="inverter" id="inverter_si" value="Si" required <?=$listInverter[0]?>>
                                    <label class="form-check-label" for="inverter_si">Si</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="inverter" id="inverter_no" value="No" <?=$listInverter[1]?>>
                                    <label class="form-check-label" for="inverter_no">No</label>
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="descripcion">Descripcion</label>
                                <textarea class="form-control" name="descripcion" id="descripcion" rows="3" maxlength="255" required><?=$equipment->getDescripcion()?></textarea>
                            </div>

                            <div class="col-md-12">
                                <hr>
                            </div>
                            <div class="col-md-6 d-grid gap-2 mt-3">
                                <button type="submit" class="btn btn-success" name="setEquipmentType"><i class="bi bi-save"></i> Actualizar Registro</button>
                            </div>
                            <div class="col-md-6 d-grid gap-2 mt-3">
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminar"><i class="bi bi-trash-fill"></i> Eliminar Registro</button>
                            </div>

                        </form><!-- Vertical Form -->
                    </div>
                </div>
            </div>

        </section>



        <!-- Modal Eliminar Registro-->
        <!-- ======= Basic Modal ======= -->
        <form method="post">
            <div class="modal fade" id="eliminar" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Eliminar Registro</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <label class="form-label">¿Esta seguro que desea eliminar el registro?</label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" name="deleteEquipmentType" class="btn btn-danger"><i class="bi bi-trash-fill"></i> Eliminar Registro</button>
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

    <!-- Template Main JS File -->
    <script src="../../assets/js/main.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?= $response ?>
</body>

</html>