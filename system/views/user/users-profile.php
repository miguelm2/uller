<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/routing/User.php'; ?>
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
  <?php include '../../assets/html/sidebar-user.php'; ?>

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
                    <div class="col-lg-9 col-md-8"><?= $perfilUsuario->getNombre() ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Correo</div>
                    <div class="col-lg-9 col-md-8"><?= $perfilUsuario->getCorreo() ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Telefono</div>
                    <div class="col-lg-9 col-md-8"><?= $perfilUsuario->getTelefono() ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Cedula</div>
                    <div class="col-lg-9 col-md-8"><?= $perfilUsuario->getCedula() ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Departamento</div>
                    <div class="col-lg-9 col-md-8"><?= $perfilUsuario->getDepartamento() ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Ciudad</div>
                    <div class="col-lg-9 col-md-8"><?= $perfilUsuario->getCiudad() ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Dirección</div>
                    <div class="col-lg-9 col-md-8"><?= $perfilUsuario->getDireccion() ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Localidad</div>
                    <div class="col-lg-9 col-md-8"><?= $perfilUsuario->getLocalidad() ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Barrio / Conjunto</div>
                    <div class="col-lg-9 col-md-8"><?= $perfilUsuario->getBarrio_conjunto() ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Tipo</div>
                    <div class="col-lg-9 col-md-8"><?= $_SESSION['usuario'] ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Fecha de Registro</div>
                    <div class="col-lg-9 col-md-8"><?= $perfilUsuario->getFecha_registro() ?></div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form method="POST">

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nombre Completo</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="nombre" type="text" class="form-control" value="<?= $perfilUsuario->getNombre() ?>">
                      </div>
                    </div>


                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Correo</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="correo" type="text" class="form-control" value="<?= $perfilUsuario->getCorreo() ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Job" class="col-md-4 col-lg-3 col-form-label">Telefono</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="telefono" type="number" class="form-control" value="<?= $perfilUsuario->getTelefono() ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">Cedula</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="cedula" type="number" class="form-control" value="<?= $perfilUsuario->getCedula() ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="departamento" class="col-md-4 col-lg-3 col-form-label">Departamento</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="text" class="form-control" name="departamento" maxlength="255" required value="<?= $perfilUsuario->getDepartamento(); ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="ciudad" class="col-md-4 col-lg-3 col-form-label">Ciudad</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="text" class="form-control" name="ciudad" maxlength="255" required value="<?= $perfilUsuario->getCiudad(); ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="direccion" class="col-md-4 col-lg-3 col-form-label">Dirección</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="text" class="form-control" name="direccion" maxlength="255" required value="<?= $perfilUsuario->getDireccion(); ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="localidad" class="col-md-4 col-lg-3 col-form-label">Localidad</label>
                      <div class="col-md-8 col-lg-9">
                        <select class="form-select" name="localidad" id="localidad">
                          <option><?= $perfilUsuario->getLocalidad(); ?></option>
                          <option>Localidad Suroccidente</option>
                          <option>Localidad Suroriente</option>
                          <option>Localidad Norte-Centro Historico</option>
                          <option>Localidad Metropolitana</option>
                          <option>Localidad Riomar</option>
                        </select>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="barrio" class="col-md-4 col-lg-3 col-form-label">Barrio / Conjunto</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="text" class="form-control" name="barrio" maxlength="255" required value="<?= $perfilUsuario->getBarrio_conjunto(); ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="torre" class="col-md-4 col-lg-3 col-form-label">Torre <small class="text-secondary">(opcional)</small></label>
                      <div class="col-md-8 col-lg-9">
                        <input type="text" class="form-control" name="torre" maxlength="20" value="<?= $perfilUsuario->getTorre(); ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="numero_apto" class="col-md-4 col-lg-3 col-form-label">Apartamento/Casa <small class="text-secondary">(opcional)</small></label>
                      <div class="col-md-8 col-lg-9">
                        <input type="number" class="form-control" name="numero_apto" min="0" value="<?= $perfilUsuario->getNumero_apto(); ?>">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" name="setProfileUser" class="btn btn-primary">Guardar cambios</button>
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
                      <button type="submit" class="btn btn-primary" name="setPassProfileUser">Cambiar contraseña</button>
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

  <!-- Template Main JS File -->
  <script src="../../assets/js/main.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <?= $response ?>
</body>

</html>