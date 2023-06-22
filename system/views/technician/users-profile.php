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

    <!-- Template Main CSS File -->
    <link href="../../assets/css/style.css" rel="stylesheet">


</head>

<body>

    <!-- ======= Header ======= -->
    <?php include_once '../../assets/html/header.php'; ?>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <?php include '../../assets/html/sidebar-technician.php'; ?>

    <!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Perfil</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index">Inicio</a></li>
                    <li class="breadcrumb-item active">Perfil</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">


                <div class="col-xl-12">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Resumen</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Editar perfil</button>
                                </li>


                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Cambiar contraseña</button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                    <h5 class="card-title">Detalles</h5>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Nombre completo</div>
                                        <div class="col-lg-9 col-md-8"><?= $perfilTecnico->getNombre() ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Correo</div>
                                        <div class="col-lg-9 col-md-8"><?= $perfilTecnico->getCorreo() ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Telefono / Celular</div>
                                        <div class="col-lg-9 col-md-8"><?= $perfilTecnico->getTelefono() ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Cedula</div>
                                        <div class="col-lg-9 col-md-8"><?= $perfilTecnico->getCedula() ?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Tipo</div>
                                        <div class="col-lg-9 col-md-8"><?= $_SESSION['usuario'] ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Fecha de Registro</div>
                                        <div class="col-lg-9 col-md-8"><?= $perfilTecnico->getFecha_registro() ?></div>
                                    </div>

                                </div>

                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                    <!-- Profile Edit Form -->
                                    <form method="POST">

                                        <div class="row mb-3">
                                            <label for="nombre" class="col-md-4 col-lg-3 col-form-label">Nombre completo</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="nombre" type="text" class="form-control" required value="<?= $perfilTecnico->getNombre() ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="fecha_nacimiento" class="col-md-4 col-lg-3 col-form-label">Fecha de nacimiento</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="fecha_nacimiento" type="date" class="form-control" required value="<?= $perfilTecnico->getFecha_nacimiento() ?>">
                                            </div>
                                        </div>


                                        <div class="row mb-3">
                                            <label for="correo" class="col-md-4 col-lg-3 col-form-label">Correo</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="correo" type="text" class="form-control" required value="<?= $perfilTecnico->getCorreo() ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="telefono" class="col-md-4 col-lg-3 col-form-label">Telefono / Celular</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="telefono" type="number" class="form-control" required value="<?= $perfilTecnico->getTelefono() ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="cedula" class="col-md-4 col-lg-3 col-form-label">Cedula</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="cedula" type="number" class="form-control" required value="<?= $perfilTecnico->getCedula() ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="direccion" class="col-md-4 col-lg-3 col-form-label">Dirección</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="direccion" type="text" class="form-control" required value="<?= $perfilTecnico->getDireccion() ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="ciudad" class="col-md-4 col-lg-3 col-form-label">Ciudad</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="ciudad" type="text" class="form-control" required value="<?= $perfilTecnico->getCiudad() ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="estado_civil" class="col-md-4 col-lg-3 col-form-label">Estado civil</label>
                                            <div class="col-md-8 col-lg-9">
                                                <select class="form-select" name="estado_civil" id="estado_civil">
                                                    <option><?= $perfilTecnico->getEstado_civil(); ?></option>
                                                    <option>Soltero</option>
                                                    <option>Casado</option>
                                                    <option>Divorciado</option>
                                                    <option>Union libre</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="numero_hijos" class="col-md-4 col-lg-3 col-form-label">Número de hijos</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="numero_hijos" type="number" class="form-control" min="0" required value="<?= $perfilTecnico->getNumero_hijos() ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="banco" class="col-md-4 col-lg-3 col-form-label">Banco</label>
                                            <div class="col-md-8 col-lg-9">
                                                <select class="form-select" name="banco" id="banco">
                                                    <option><?= $perfilTecnico->getBanco(); ?></option>
                                                    <option>No presenta</option>
                                                    <option>Bancolombia</option>
                                                    <option>Davivienda</option>
                                                    <option>Av Villas</option>
                                                    <option>Daviplata</option>
                                                    <option>Nequi</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="tipo_cuenta" class="col-md-4 col-lg-3 col-form-label">Tipo de cuenta</label>
                                            <div class="col-md-8 col-lg-9">
                                                <select class="form-select" name="tipo_cuenta" id="tipo_cuenta">
                                                    <option><?= $perfilTecnico->getTipo_cuenta(); ?></option>
                                                    <option>No presenta</option>
                                                    <option>Ahorros</option>
                                                    <option>Corriente</option>
                                                    <option>De bolsillo</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="numero_cuenta" class="col-md-4 col-lg-3 col-form-label">Número de cuenta</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="numero_cuenta" id="numero_cuenta" type="text" class="form-control" min="0" value="<?= $perfilTecnico->getNumero_cuenta() ?>">
                                            </div>
                                        </div>




                                        <div class="text-center">
                                            <button type="submit" name="setProfileTechnician" class="btn btn-primary">Guardar cambios</button>
                                        </div>
                                    </form><!-- End Profile Edit Form -->

                                </div>



                                <div class="tab-pane fade pt-3" id="profile-change-password">
                                    <!-- Change Password Form -->
                                    <form method="post" onsubmit="return validatePassword()">

                                        <div class="row mb-3">
                                            <label for="pass" class="col-md-4 col-lg-3 col-form-label">Contraseña actual</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input type="password" class="form-control" id="pass" name="pass">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="newPass" class="col-md-4 col-lg-3 col-form-label">Nueva contraseña</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input type="password" class="form-control" id="newPass" name="newPass">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="confirmPass" class="col-md-4 col-lg-3 col-form-label">Confirmar nueva contraseña</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input type="password" class="form-control" id="confirmPass" name="confirmPass">
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary" name="setPassProfileTechnician">Cambiar contraseña</button>
                                        </div>
                                    </form><!-- End Change Password Form -->

                                </div>

                            </div><!-- End Bordered Tabs -->

                        </div>
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

    <!-- Js page -->
    <script src="../../js/selectRepeat.js"></script>
    <script src="../../js/functions.js"></script>
    <script src="../../js/technicianFunction.js"></script>

    <!-- Template Main JS File -->
    <script src="../../assets/js/main.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?= $response ?>
</body>

</html>