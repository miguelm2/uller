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
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

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
                                <h5 class="text-primary">Usuario</h5>
                            </div>
                            <div class="col-md-2 text-right d-grid">
                                <a href="users" class="btn btn-secondary">
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
                                <input type="text" class="form-control" id="nombre" name="nombre" maxlength="150"
                                    required value="<?= $user->getNombre(); ?>">
                            </div>
                            <div class="col-6">
                                <label for="email" class="form-label">Correo electrónico</label>
                                <input type="email" class="form-control" id="correo" name="correo" maxlength="255"
                                    required value="<?= $user->getCorreo(); ?>">
                            </div>
                            <div class="col-6">
                                <label for="phone" class="form-label">Telefono</label>
                                <input type="number" class="form-control" id="telefono" name="telefono" maxlength="15"
                                    required value="<?= $user->getTelefono(); ?>">
                            </div>
                            <div class="col-6">
                                <label for="cedula" class="form-label">Cedula</label>
                                <input type="text" class="form-control" id="cedula" name="cedula" maxlength="20"
                                    required value="<?= $user->getCedula(); ?>">
                            </div>
                            <div class="col-6 form-group">
                                <label for="departamento" class="form-label">Departamento</label>
                                <input type="text" class="form-control" name="departamento" maxlength="255" required
                                    value="<?= $user->getDepartamento(); ?>">
                            </div>
                            <div class="col-6 form-group">
                                <label for="ciudad" class="form-label">Ciudad</label>
                                <input type="text" class="form-control" name="ciudad" maxlength="255" required
                                    value="<?= $user->getCiudad(); ?>">
                            </div>
                            <div class="col-6 form-group">
                                <label for="direccion" class="form-label">Direccion</label>
                                <input type="text" class="form-control" name="direccion" maxlength="255" required
                                    value="<?= $user->getDireccion(); ?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="localidad" class="form-label">Localidad</label>
                                <select class="form-select" name="localidad" id="localidad">
                                    <option><?= $user->getLocalidad(); ?></option>
                                    <option>Localidad Suroccidente</option>
                                    <option>Localidad Suroriente</option>
                                    <option>Localidad Norte-Centro Historico</option>
                                    <option>Localidad Metropolitana</option>
                                    <option>Localidad Riomar</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="barrio" class="form-label">Barrio / Conjunto</label>
                                <input type="text" name="barrio" class="form-control" maxlength="255" required
                                    value="<?= $user->getBarrio_conjunto(); ?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="torre" class="form-label">Torre <small
                                        class="text-secondary">(opcional)</small></label>
                                <input type="text" name="torre" class="form-control" maxlength="20"
                                    value="<?= $user->getTorre(); ?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="numero_apto" class="form-label">Numero: Apartamento/Casa <small
                                        class="text-secondary">(opcional)</small></label>
                                <input type="number" name="numero_apto" class="form-control" min="0"
                                    value="<?= $user->getNumero_apto(); ?>">
                            </div>
                            <div class="col-6">
                                <label for="estado" class="form-label">Estado</label>
                                <select class="form-select" id="estado" name="estado">
                                    <option value="<?= $user->getEstado()[0]; ?>"><?= $user->getEstado()[1]; ?></option>
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                            </div>


                            <div class="col-md-12">
                                <hr>
                            </div>

                            <div class="col-md-4 d-grid gap-2 mt-3">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#cambiarPass"><i class="bi bi-lock-fill"></i> Cambiar
                                    Contraseña</button>
                            </div>

                            <div class="col-md-4 d-grid gap-2 mt-3">
                                <button type="submit" class="btn btn-success" name="setUser"><i class="bi bi-save"></i>
                                    Actualizar Registro</button>
                            </div>

                            <div class="col-md-4 d-grid gap-2 mt-3">
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#eliminar"><i class="bi bi-trash-fill"></i> Eliminar
                                    Registro</button>
                            </div>

                        </form><!-- Vertical Form -->
                    </div>
                </div>


                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8">
                                <h5 class="text-primary">Equipos</h5>
                            </div>
                            <div class="col-md-4 text-right d-grid">
                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#newType"><i
                                        class="bi bi-plus-square"></i> Nuevo Equipo</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="padding-top: 5px;">

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="dataTable" width="100%"
                                cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th>Nombre</th>
                                        <th>Marca</th>
                                        <th>Modelo</th>
                                        <th>Tipo</th>
                                        <th width="10px">Ver</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Item</th>
                                        <th>Nombre</th>
                                        <th>Marca</th>
                                        <th>Modelo</th>
                                        <th>Tipo</th>
                                        <th width="10px">Ver</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?= $tableEquipmentUser; ?>
                                </tbody>
                            </table>
                        </div>
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
                            <button type="submit" name="deleteUser" class="btn btn-danger"><i
                                    class="bi bi-trash-fill"></i> Eliminar Registro</button>
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
                                    <input type="password" id="newPass" name="newPass" class="form-control"
                                        maxlength="30" required>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="confirmPass">Confirmar contraseña</label>
                                    <input type="password" id="confirmPass" name="confirmPass" class="form-control"
                                        maxlength="30" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" name="setPassUser" class="btn btn-primary"><i class="bi bi-save"></i>
                                Actualizar Contraseña</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- End Basic Modal-->


        <!-- ======= Nuevo Equipo ======= -->
        <form method="POST" enctype="multipart/form-data">
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
                                        <option>Carrier</option>
                                        <option>Conforlife</option>
                                        <option>Confortfresh</option>
                                        <option>Dainkin</option>
                                        <option>Electrolux</option>
                                        <option>Innova</option>
                                        <option>LG</option>
                                        <option>Lenox</option>
                                        <option>Mabel</option>
                                        <option>Midea</option>
                                        <option>Mirage</option>
                                        <option>Olimpo</option>
                                        <option>Panasonic</option>
                                        <option>Royal</option>
                                        <option>Samsung</option>
                                        <option>Simply</option>
                                        <option>Trane</option>
                                        <option>York</option>
                                        <option>Otro</option>
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="modelo">Modelo</label>
                                    <input type="text" class="form-control" name="modelo" maxlength="255" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="year_fabricacion">Año de fabricación</label>
                                    <input type="number" class="form-control" name="year_fabricacion" min="1900"
                                        max="3000" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="fecha_instalacion">Fecha de instalación estimada</label>
                                    <input type="date" class="form-control" name="fecha_instalacion" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="serial_interior">Serial unidad interior</label>
                                    <input type="text" class="form-control" name="serial_interior" maxlength="255"
                                        required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="serial_exterior">Serial unidad exterior</label>
                                    <input type="text" class="form-control" name="serial_exterior" maxlength="255"
                                        required>
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
                                    <label for="conexion_electrica">Conexión electrica</label>
                                    <select class="form-select" name="conexion_electrica" id="conexion_electrica"
                                        required>
                                        <option value="">Seleccione una opcion</option>
                                        <option value="1">220/1/60</option>
                                        <option value="2">115/1/60</option>
                                        <option value="3">220/2/60</option>
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="tipo_equipo">Conexión electrica</label>
                                    <select class="form-select" name="tipo_equipo" id="tipo_equipo" required>
                                        <option value="">Seleccione una opcion</option>
                                        <option value="1">Mini-split</option>
                                        <option value="2">Split - Central</option>
                                        <option value="3">Cassette</option>
                                        <option value="4">Piso techo</option>
                                        <option value="5">Ventana</option>
                                        <option value="6">Otro</option>
                                    </select>
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
                                        <input class="form-check-input" type="radio" name="inverter" id="inverter_si"
                                            value="Si" required>
                                        <label class="form-check-label" for="inverter_si">Si</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="inverter" id="inverter_no"
                                            value="No">
                                        <label class="form-check-label" for="inverter_no">No</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="placa_interior">Imagen placa interior</label>
                                    <input type="file" name="placa_interior" id="placa_interior" class="form-control"
                                        accept="/*image">
                                </div>
                                <div class="col-md-6">
                                    <label for="placa_exteriror">Imagen placa exterior</label>
                                    <input type="file" name="placa_exterior" id="placa_interior" class="form-control"
                                        accept="/*image">
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="descripcion">Descripcion</label>
                                    <textarea class="form-control" name="descripcion" id="descripcion" rows="3"
                                        maxlength="255" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" name="newEquipmentAdmin" class="btn btn-success"><i
                                    class="bi bi-plus-square"></i> Nuevo Equipo</button>
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

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

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


    <!-- Template Main JS File -->
    <script src="../../assets/js/main.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?= $response ?>
</body>

</html>