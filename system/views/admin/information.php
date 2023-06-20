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
                        <h5 class="text-primary">Informacion de la empresa</h5>
                    </div>
                    <div class="card-body" style="padding-top: 5px;">

                        <form method="POST" class="row g-3" enctype="multipart/form-data">
                            <div class="col-md-12">
                                <img style="max-height: 200px;" src="../../img/perfil/<?= $information->getImagen(); ?>" class="img-fluid" alt="<?= $information->getImagen(); ?>">
                            </div>
                            <div class="col-md-8">
                                <label class="form-label">Nombre Completo</label>
                                <input type="text" class="form-control" name="nombre" value="<?= $information->getNombre(); ?>">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">NIT</label>
                                <input type="number" class="form-control" name="nit" value="<?= $information->getNit(); ?>">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Direccion</label>
                                <input type="text" class="form-control" name="direccion" value="<?= $information->getDireccion(); ?>">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Ciudad</label>
                                <input type="text" class="form-control" name="ciudad" value="<?= $information->getCiudad(); ?>">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Departamento</label>
                                <input type="text" class="form-control" name="departamento" value="<?= $information->getDepartamento(); ?>">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Correo electronico</label>
                                <input type="email" class="form-control" name="correo" value="<?= $information->getCorreo(); ?>">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Telefono</label>
                                <input type="number" class="form-control" name="telefono" value="<?= $information->getTelefono(); ?>">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">WhatsApp</label>
                                <input type="number" class="form-control" name="whatsapp" value="<?= $information->getWp(); ?>">
                            </div>
                            <div class="col-md-12">
                                <hr>
                            </div>
                            <div class="col-md-6 row" style="margin-top: 5px;">
                                
                                <p class="text-primary">Redes sociales</p>

                                <div class="col-12">
                                    <label class="form-label">Facebook</label>
                                    <input type="text" class="form-control" name="facebook" value="<?= $information->getFb(); ?>">
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Instagram</label>
                                    <input type="text" class="form-control" name="instagram" value="<?= $information->getInstagram(); ?>">
                                </div>
                            </div>

                            <div class="col-md-6 row" style="margin-top: 5px;">
                              
                                <p class="text-primary">Aplicacion web</p>

                                <div class="col-12">
                                    <label class="form-label">Color</label>
                                    <input type="color" class="form-control form-control-color" name="color" value="<?= $information->getColor1(); ?>">
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Logo</label>
                                    <input class="form-control" type="file" id="logo" name="logo" accept="image/png, image/gif, image/jpeg">
                                </div>

                            </div>
                            <div class="col-md-12">
                                <hr>
                            </div>
                            <div class="col-md-12 text-center">
                            <button class="btn btn-success" type="submit" name="setInformation"><i class="ri-save-3-line"></i> Guardar Informacion</button>
                            
                            </div>
                        </form>

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
    <script src="../../assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/vendor/chart.js/chart.umd.js"></script>
    <script src="../../assets/vendor/echarts/echarts.min.js"></script>
    <script src="../../assets/vendor/quill/quill.min.js"></script>
    <script src="../../assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="../../assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="../../assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../../assets/js/main.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <?= $response ?>  
</body>

</html>