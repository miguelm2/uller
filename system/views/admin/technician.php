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
                                <h5 class="text-primary">Técnico</h5>
                            </div>
                            <div class="col-md-2 text-right d-grid">
                                <a href="technicians" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left-circle"></i>
                                    <span class="text"> Atras</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="padding-top: 5px;">
                        <!-- Vertical Form -->
                        <form class="row g-3" method="post">
                            <div class="col-6">
                                <label for="name" class="form-label">Nombre completo</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" maxlength="150" required value="<?= $tecnico->getNombre(); ?>">
                            </div>
                            <div class="col-6 form-group">
                                <label for="fecha_nacimiento">Fecha de nacimiento</label>
                                <input type="date" name="fecha_nacimiento" class="form-control" required value="<?= $tecnico->getFecha_nacimiento(); ?>">
                            </div>
                            <div class="col-6">
                                <label for="email" class="form-label">Correo electrónico</label>
                                <input type="email" class="form-control" id="correo" name="correo" maxlength="255" required value="<?= $tecnico->getCorreo(); ?>">
                            </div>
                            <div class="col-6">
                                <label for="phone" class="form-label">Teléfono / Celular</label>
                                <input type="number" class="form-control" id="telefono" name="telefono" maxlength="15" required value="<?= $tecnico->getTelefono(); ?>">
                            </div>
                            <div class="col-6">
                                <label for="cedula" class="form-label">Cedula</label>
                                <input type="text" class="form-control" id="cedula" name="cedula" maxlength="20" required value="<?= $tecnico->getCedula(); ?>">
                            </div>
                            <div class="col-6">
                                <label for="direccion" class="form-label">Dirección</label>
                                <input type="text" name="direccion" class="form-control" required value="<?= $tecnico->getDireccion(); ?>">
                            </div>
                            <div class="col-6">
                                <label for="ciudad" class="form-label">Ciudad</label>
                                <input type="text" name="ciudad" class="form-control" required value="<?= $tecnico->getCiudad(); ?>">
                            </div>
                            <div class="col-6">
                                <label for="estado_civil" class="form-label">Estado civil</label>
                                <select class="form-select" name="estado_civil" id="estado_civil">
                                    <option><?= $tecnico->getEstado_civil(); ?></option>
                                    <option>Soltero</option>
                                    <option>Casado</option>
                                    <option>Divorciado</option>
                                    <option>Union libre</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="numero_hijos" class="form-label">Número de hijos</label>
                                <input type="number" name="numero_hijos" min="0" class="form-control" required value="<?= $tecnico->getNumero_hijos(); ?>">
                            </div>
                            <div class="col-6">
                                <label for="banco" class="form-label">Banco</label>
                                <select class="form-select" name="banco" id="banco">
                                    <option><?= $tecnico->getBanco(); ?></option>
                                    <option>No presenta</option>
                                    <option>Bancolombia</option>
                                    <option>Davivienda</option>
                                    <option>Av Villas</option>
                                    <option>Daviplata</option>
                                    <option>Nequi</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="tipo_cuenta" class="form-label">Tipo de cuenta</label>
                                <select class="form-select" name="tipo_cuenta" id="tipo_cuenta">
                                    <option><?= $tecnico->getTipo_cuenta(); ?></option>
                                    <option>No presenta</option>
                                    <option>Ahorros</option>
                                    <option>Corriente</option>
                                    <option>De bolsillo</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="numero_cuenta" class="form-label">Número de cuenta</label>
                                <input type="text" name="numero_cuenta" id="numero_cuenta" class="form-control" required value="<?= $tecnico->getNumero_cuenta(); ?>">
                            </div>
                            <div class="col-12">
                                <label for="estado" class="form-label">Estado</label>
                                <select class="form-select" id="estado" name="estado">
                                    <option value="<?= $tecnico->getEstado()[0]; ?>"><?= $tecnico->getEstado()[1]; ?></option>
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                            </div>


                            <div class="col-md-12">
                                <hr>
                            </div>

                            <div class="col-md-4 d-grid gap-2 mt-3">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cambiarPass"><i class="bi bi-lock-fill"></i> Cambiar Contraseña</button>
                            </div>

                            <div class="col-md-4 d-grid gap-2 mt-3">
                                <button type="submit" class="btn btn-success" name="setTechnician"><i class="bi bi-save"></i> Actualizar Registro</button>
                            </div>

                            <div class="col-md-4 d-grid gap-2 mt-3">
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
                            <button type="submit" name="deleteTechnician" class="btn btn-danger"><i class="bi bi-trash-fill"></i> Eliminar Registro</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- End Basic Modal-->


        <!-- Modal Cambiar Contraseña-->
        <!-- ======= Basic Modal ======= -->
        <form method="post" onsubmit="return validatePassword()">
            <div class="modal fade" id="cambiarPass" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Cambiar Contraseña</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-3">
                                <div class="col-md-12 form-group">
                                    <label for="newPass">Nueva contraseña</label>
                                    <input type="password" id="newPass" name="newPass" class="form-control" maxlength="30" required>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="confirmPass">Confirmar contraseña</label>
                                    <input type="password" id="confirmPass" name="confirmPass" class="form-control" maxlength="30" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" name="setPasswordTechnician" class="btn btn-primary"><i class="bi bi-save"></i> Actualizar Contraseña</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- End Basic Modal-->


        <section class="section dashboard">

            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-9">
                                <h5 class="text-primary">Mis herramientas</h5>
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
                                    <?= $tablaInsumoAdmin; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </section>




    </main><!-- End #main -->

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
    <script src="../../js/functions.js"></script>
    <script src="../../js/technicianFunction.js"></script>
    <script src="../../js/insumo/insumoAdmin.js"></script>

    <!-- Template Main JS File -->
    <script src="../../assets/js/main.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?= $response ?>
</body>

</html>