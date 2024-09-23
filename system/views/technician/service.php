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
                                <h5 class="text-primary">Servicio</h5>
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
                        <div class="row g-2">
                            <div class="col-md-6 form-group">
                                <label for="nombre_cliente">Nombre cliente</label>
                                <input type="text" class="form-control" disabled value="<?= $servicio->getSolicitudDTO()->getUsuarioDTO()->getNombre() ?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="documento">Documento</label>
                                <input type="text" class="form-control" disabled value="<?= $servicio->getSolicitudDTO()->getUsuarioDTO()->getCedula() ?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="telefono">Telefono</label>
                                <input type="text" class="form-control" disabled value="<?= $servicio->getSolicitudDTO()->getUsuarioDTO()->getTelefono() ?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="direccion">Dirección</label>
                                <input type="text" class="form-control" disabled value="<?= $servicio->getSolicitudDTO()->getUsuarioDTO()->getDireccion() ?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="ciudad">Ciudad</label>
                                <input type="text" class="form-control" disabled value="<?= $servicio->getSolicitudDTO()->getUsuarioDTO()->getCiudad() ?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="departamento">Departamento</label>
                                <input type="text" class="form-control" disabled value="<?= $servicio->getSolicitudDTO()->getUsuarioDTO()->getDepartamento() ?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="tipo_servicio">Tipo de servicio</label>
                                <input type="text" class="form-control" disabled value="<?= $servicio->getTipoServicioDTO()->getNombre() ?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="estado">Estado</label>
                                <input type="text" class="form-control" disabled value="<?= $servicio->getSolicitudDTO()->getEstado()[1] ?>">
                            </div>

                            <div class="col-md-12">
                                <hr>
                            </div>

                            <div class="col-md-4 d-grid gap-2 mt-3">
                                <a href="service_inform" class="btn btn-primary">Informe</a>
                            </div>
                            <form method="post">
                            
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-9">
                                <h5 class="text-primary">Equipos</h5>
                            </div>
                            <div class="col-md-3 text-right d-grid">
                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#newType"><i class="bi bi-plus-square"></i> Nuevo Equipo</button>
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

        <!-- ======= Nuevo Equipo ======= -->
        <form method="POST">
            <div class="modal fade" id="newType" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Nuevo Equipo</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-3">
                                <div class="col-md-6 form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" maxlength="255" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="marca">Marca</label>
                                    <select class="form-select" name="marca" id="marca">
                                        <option>Olimpo</option>
                                        <option>LG</option>
                                        <option>Samsung</option>
                                        <option>Panasonic</option>
                                        <option>Carrier</option>
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="modelo">Modelo</label>
                                    <input type="text" class="form-control" name="modelo" maxlength="255" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="year_fabricacion">Año de fabricación</label>
                                    <input type="number" class="form-control" name="year_fabricacion" min="1900" max="3000" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="serial_interior">Serial unidad interior</label>
                                    <input type="text" class="form-control" name="serial_interior" maxlength="255" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="serial_exterior">Serial unidad exterior</label>
                                    <input type="text" class="form-control" name="serial_exterior" maxlength="255" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="tipo_equipo">Tipo de equipo</label>
                                    <select class="form-select" name="tipo_equipo" id="tipo_equipo">
                                        <option>Mini split</option>
                                        <option>Split</option>
                                        <option>Paquete CxW</option>
                                        <option>Ventana</option>
                                        <option>Mini split techo</option>
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="capacidad_btuh">Capacidad (BTUH)</label>
                                    <select class="form-select" name="capacidad_btuh" id="capacidad_btuh">
                                        <option>12000</option>
                                        <option>18000</option>
                                        <option>24000</option>
                                        <option>30000</option>
                                        <option>36000</option>
                                        <option>48000</option>
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="voltaje_fases">Voltaje / Fases</label>
                                    <input type="text" class="form-control" name="voltaje_fases" maxlength="20" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="refrigerante">Refrigerante</label>
                                    <select class="form-select" name="refrigerante" id="refrigerante">
                                        <option>R22</option>
                                        <option>R410</option>
                                    </select>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="inverter">Inverter</label>
                                    <br>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="inverter" id="inverter_si" value="Si" required>
                                        <label class="form-check-label" for="inverter_si">Si</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="inverter" id="inverter_no" value="No">
                                        <label class="form-check-label" for="inverter_no">No</label>
                                    </div>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="descripcion">Descripcion</label>
                                    <textarea class="form-control" name="descripcion" id="descripcion" rows="3" maxlength="255" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" name="newEquipmentType" class="btn btn-success"><i class="bi bi-plus-square"></i> Nuevo Equipo</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Fin Nuevo Equipo-->


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