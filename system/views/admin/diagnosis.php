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
                                <h4 class="text-primary">Diagnostico</h4>
                            </div>
                            <div class="col-md-2 text-right d-grid">
                                <a href="<?= $btnAtras; ?>" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left-circle"></i>
                                    <span class="text"> Atras</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="padding-top: 5px;">
                        <form method="post">
                            <div class="row g-2">
                                <div class="col-md-6 form-group">
                                    <label for="numero_horas">Número de horas</label>
                                    <input type="number" class="form-control" name="numero_horas" min="0" max="5000" required value="<?= $diagnostico->getNumero_horas(); ?>">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="numero_ayudantes">Número de ayudantes</label>
                                    <input type="number" class="form-control" name="numero_ayudantes" min="0" max="5000" required value="<?= $diagnostico->getNumero_ayudantes(); ?>">
                                </div>
                                <div class="col-md-12">
                                    <label for="descripcion">Descripción</label>
                                    <textarea class="form-control" name="descripcion" rows="3" maxlength="255" required><?= $diagnostico->getDescripcion(); ?></textarea>
                                </div>

                                <?=$btnAceptarServicio?>

                                <div class="col-md-12">
                                    <hr>
                                </div>
                                <div class="col-md-4 d-grid gap-2 mt-3">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalPrecio"><i class="bi bi-currency-dollar"></i>Ver Precio</button>
                                </div>
                                <div class="col-md-4 d-grid gap-2 mt-3">
                                    <button type="submit" class="btn btn-success" name="setDiagnosis"><i class="bi bi-save"></i> Actualizar Diagnostico</button>
                                </div>
                                <div class="col-md-4 d-grid gap-2 mt-3">
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalEliminar"><i class="bi bi-trash-fill"></i> Eliminar Diagnostico</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-9">
                                <h5 class="text-primary">Herramientas / Equipos</h5>
                            </div>
                            <div class="col-md-3 text-right d-grid">
                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addTool"><i class="bi bi-plus-square"></i> Agregar Herramienta</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="padding-top: 5px;">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-diagnosis" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Herramienta / Equipo</th>
                                        <th>Tipo</th>
                                        <th>Cantidad</th>
                                        <th>Fecha registro</th>
                                        <th width="10px"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?= $tablaHerramientasDiagnostico; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-9">
                                <h5 class="text-primary">Materiales</h5>
                            </div>
                            <div class="col-md-3 text-right d-grid">
                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addMaterial"><i class="bi bi-plus-square"></i> Agregar Material</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="padding-top: 5px;">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-diagnosis" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Material</th>
                                        <th>Cantidad</th>
                                        <th>Unidad de medida</th>
                                        <th>Fecha registro</th>
                                        <th width="10px"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?= $tablaMaterialesDiagnostico; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <!-- Modal Eliminar Registro-->
        <form method="post">
            <div class="modal fade" id="modalEliminar" tabindex="-1">
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
                            <button type="submit" name="deleteDiagnosis" class="btn btn-danger"><i class="bi bi-trash-fill"></i> Eliminar Registro</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!-- Modal Precio-->
        <form method="post">
            <div class="modal fade" id="modalPrecio" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Precio Diagnostico</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="precio">Precio</label>
                                    <input type="number" class="form-control" name="precio" required value="<?= $diagnostico->getPrecio(); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary" name="setPrecioDiagnosis"><i class="bi bi-save"></i> Actualizar Precio</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!-- ======= Modal Herramienta ======= -->
        <form method="POST">
            <div class="modal fade" id="addTool" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Agregar Herramienta/Equipo</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-2">
                                <div class="col-md-12 form-group">
                                    <label for="herramienta">Herramienta/Equipo</label>
                                    <select class="form-select" name="herramienta" id="herramienta">
                                        <?= $selectHerramientas; ?>
                                    </select>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="cantidad_herramientas">Cantidad</label>
                                    <input type="number" class="form-control" name="cantidad_herramientas" min="0" max="5000" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Cerrar</button>
                            <button type="submit" name="addTool" class="btn btn-primary"><i class="bi bi-check-circle"></i> Agregar Herramienta</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!-- ======= Modal Material ======= -->
        <form method="POST">
            <div class="modal fade" id="addMaterial" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Agregar Material</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-2">
                                <div class="col-md-12 form-group">
                                    <label for="material">Material</label>
                                    <select class="form-select" name="material" id="material">
                                        <?= $selectMateriales; ?>
                                    </select>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="cantidad_material">Cantidad</label>
                                    <input type="number" class="form-control" name="cantidad_material" min="0" max="5000" required>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="unidad_medida">Unidades de medida</label>
                                    <input type="text" class="form-control" name="unidad_medida" maxlength="50" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Cerrar</button>
                            <button type="submit" name="addMaterial" class="btn btn-primary"><i class="bi bi-check-circle"></i> Agregar Material</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!-- ======= Modal Eliminar Herramienta - Material ======= -->
        <form method="POST">
            <div class="modal fade" id="deleteComponent" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Eliminar Registro</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-12 form-group">
                                <label>¿Esta seguro que desea eliminar el registro?</label>
                            </div>
                            <div class="col-md-12">
                                <input type="hidden" class="form-control" name="nombre_tabla" id="nombre_tabla" required readonly>
                                <input type="hidden" class="form-control" name="nombre_campo" id="nombre_campo" required readonly>
                                <input type="hidden" class="form-control" name="id" id="id" required readonly>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Cancelar</button>
                            <button type="submit" name="deleteComponentDiagnosis" class="btn btn-danger"><i class="bi bi-trash-fill"></i> Eliminar Registro</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!-- Modal Aceptar Servicio-->
        <form method="post">
            <div class="modal fade" id="modalAceptarServicio" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Aceptar Servicio</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <label class="form-label">¿Esta seguro que desea aceptar el servicio por el costo establecido?</label>
                            <input type="hidden" class="form-control" name="aceptar_servicio" maxlength="3" value="Si">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-lg"></i> Cerrar</button>
                            <button type="submit" name="setAcceptTicket" class="btn btn-success"><i class="bi bi-check-lg"></i> Aceptar Servicio</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Finf Modal Aceptar Servicio-->


        <!-- Modal Rechazar Servicio-->
        <form method="post">
            <div class="modal fade" id="modalRechazarServicio" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Rechazar Servicio</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <label class="form-label">¿Esta seguro que desea rechazar el servicio?</label>
                            <input type="hidden" class="form-control" name="aceptar_servicio" maxlength="3" value="No">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-lg"></i> Cerrar</button>
                            <button type="submit" name="setAcceptTicket" class="btn btn-danger"><i class="bi bi-check-lg"></i> Rechazar Servicio</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Finf Modal Rechazar Servicio-->


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
    <script src="../../js/diagnosis.js"></script>

    <!-- Template Main JS File -->
    <script src="../../assets/js/main.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?= $response ?>
</body>

</html>