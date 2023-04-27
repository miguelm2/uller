<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/routing/Page.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Ingresar - Kondory Tecnologia</title>
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

    <main>
        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-7 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="index.html" class="logo d-flex align-items-center w-auto">
                                    <img src="../../assets/img/logo.png" alt="">
                                    <span class="d-none d-lg-block">Uller</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Registro</h5>
                                        <br>
                                    </div>


                                    <form method="POST">
                                        <div class="row g-3">
                                            <div class="col-md-6 form-group">
                                                <small for="nombre">Nombre</small>
                                                <input type="text" name="nombre" class="form-control form-control-sm" maxlength="100" required>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <small for="nombre">Correo</small>
                                                <input type="email" name="correo" class="form-control form-control-sm" maxlength="255" required>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <small for="telefono">Telefono</small>
                                                <input type="number" name="telefono" class="form-control form-control-sm" required>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <small for="nombre">Cedula</small>
                                                <input type="text" name="cedula" class="form-control form-control-sm" maxlength="15" required>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <small for="direccion">Direccion</small>
                                                <input type="text" name="direccion" class="form-control form-control-sm" maxlength="100" required>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <small for="ciudad">Ciudad</small>
                                                <input type="text" name="ciudad" class="form-control form-control-sm" maxlength="100" required>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <small for="departamento">Departamento</small>
                                                <input type="text" name="departamento" class="form-control form-control-sm" maxlength="100" required>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <small for="pass">Contraseña</small>
                                                <div class="input-group mb-3">
                                                    <input type="password" name="pass" id="pass" class="form-control form-control-sm" maxlength="20" required>
                                                    <button class="btn btn-primary btn-sm" type="button" id="verPass"><i class="bi bi-eye"></i></button>
                                                </div>
                                            </div>

                                            <div class="d-grid gap-2 col-5 mx-auto" style="margin-top: 25px;">
                                                <button type="submit" class="btn btn-primary btn-sm" name="newAccountUser"><i class="bi bi-person-plus"></i> Registrar</button>
                                            </div>

                                            <div class="col-md-12" style="text-align: center;">
                                                <hr>
                                                <p class="small mb-0"><a href="login"> Iniciar sesión</a></p>
                                                <p class="small mb-0"><a href="../../../index"> Ir a la pagina principal</a></p>
                                            </div>

                                        </div>
                                    </form>

                                </div>
                            </div>

                            <div class="credits">

                                Desarrollado por <a href="https://kondori.co/">Kondory Tecnologia</a>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

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

    <!-- PAGE JS -->
    <script src="../../js/functions.js"></script>

    <!-- Template Main JS File -->
    <script src="../../assets/js/main.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?= $response ?>
</body>

</html>