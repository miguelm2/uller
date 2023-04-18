<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/routing/Operation.php'; ?>
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
    <?= include $listUrl[0]; ?>
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
                        <!-- Vertical Form -->
                        <form class="row g-3" method="post">
                            <div class="col-md-6 form-group">
                                <label for="tipo_servicio">Tipo de servicio</label>
                                <select class="form-select" name="tipo_servicio" id="tipo_servicio">
                                    <option value="<?= $ticket->getTipo_servicioDTO()->getId_tipo() ?>"><?= $ticket->getTipo_servicioDTO()->getNombre() ?></option>
                                    <?= $selectTipoServicios; ?>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="estado">Estado</label>
                                <input type="text" class="form-control" name="estado" maxlength="255" disabled value="<?= $ticket->getEstado()[1] ?>">
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="descripcion">Descripción</label>
                                <textarea class="form-control" name="descripcion" id="descripcion" rows="3" maxlength="255" required><?= $ticket->getDescripcion() ?></textarea>
                            </div>

                            <?= $btnTecnico; ?>

                            <div class="col-md-12">
                                <hr>
                            </div>

                            <div class="col-md-4 d-grid gap-2 mt-3">
                                <button type="submit" class="btn btn-success" name="setTicket"><i class="bi bi-save"></i> Actualizar Registro</button>
                            </div>

                            <div class="col-md-4 d-grid gap-2 mt-3">
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminar"><i class="bi bi-trash-fill"></i> Eliminar Registro</button>
                            </div>

                            <div class="col-md-4 d-grid gap-2 mt-3">
                                <?= $btnDiagnosticoAdmin; ?>
                            </div>

                        </form><!-- Vertical Form -->
                        <div class="row">
                            <?= $diagnosticoUsuario; ?>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8">
                                <h5 class="text-primary">Equipos</h5>
                            </div>
                            <div class="col-md-4 text-right d-grid">
                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addEquipos"><i class="bi bi-plus-square"></i> Agregar Equipos</button>
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
                                        <th width="10px"></th>
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



        <!-- Modal Eliminar Registro-->
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
                            <button type="submit" name="deleteTicket" class="btn btn-danger"><i class="bi bi-trash-fill"></i> Eliminar Registro</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- End Basic Modal-->


        <!-- Modal Asignar Tecnico-->
        <form method="post">
            <div class="modal fade" id="AsignarTecnico" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Asignar Técnico</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-12 form-group">
                                <label for="tecnico">Técnico</label>
                                <select class="form-select" name="tecnico" id="tecnico">
                                    <?= $selectTecnicos; ?>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" name="assignTechnician" class="btn btn-primary"><i class="bi bi-check-circle"></i> Asignar Técnico</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- End Modal Asignar Tecnico-->


        <!-- Modal Eliminar Tecnico-->
        <form method="post">
            <div class="modal fade" id="eliminarTecnico" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Eliminar Tecnico</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <label class="form-label">¿Esta seguro que desea eliminar el técnico asignado?</label>
                            <div class="col-md-12 form-group">
                                <input type="hidden" class="form-control" name="id_tecnico_ticket" id="id_tecnico_ticket" readonly required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" name="deleteTecnicoTicket" class="btn btn-danger"><i class="bi bi-trash-fill"></i> Eliminar Técnico</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- End Modal Eliminar Tecnico-->


        <!-- Modal Agregar Equipos-->
        <form method="post">
            <div class="modal fade" id="addEquipos" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Agregar Equipos</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-dm-12">
                                    <label><i>Por favor seleccione los equipos:</i></label>
                                    <br><br>
                                </div>
                                <div class="col-dm-12">
                                    <?=$listEquiposTicket;?>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Cerrar</button>
                            <button type="submit" name="addEquiposTicket" class="btn btn-primary"><i class="bi bi-check-circle"></i> Agregar Equipos</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- End Modal Agregar Equipos-->

        <!-- Modal Eliminar Equipo-->
        <form method="post">
            <div class="modal fade" id="eliminarEquipo" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Eliminar Registro</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-12 form-group">
                                <label class="form-label">¿Esta seguro que desea eliminar el registro?</label>
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="hidden" class="form-control" name="id_equipo_ticket" id="id_tipo_delete" readonly required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" name="deleteEquipmentTicket" class="btn btn-danger"><i class="bi bi-trash-fill"></i> Eliminar Registro</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Modal Eliminar Equipo-->


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
    <script src="../../js/tickets.js"></script>
    <script src="../../js/equipmentTypes.js"></script>

    <!-- Template Main JS File -->
    <script src="../../assets/js/main.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?= $response ?>
</body>

</html>