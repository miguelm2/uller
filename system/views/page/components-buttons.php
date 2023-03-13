<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Components / Buttons - NiceAdmin Bootstrap Template</title>
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
  <?php include_once '../../assets/html/header.html'; ?>
<!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <?php include_once '../../assets/html/sidebar.html'; ?>
<!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Buttons</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Components</li>
          <li class="breadcrumb-item active">Buttons</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Default Buttons</h5>

              <button type="button" class="btn btn-primary">Primary</button>
              <button type="button" class="btn btn-secondary">Secondary</button>
              <button type="button" class="btn btn-success">Success</button>
              <button type="button" class="btn btn-danger">Danger</button>
              <button type="button" class="btn btn-warning">Warning</button>
              <button type="button" class="btn btn-info">Info</button>
              <button type="button" class="btn btn-light">Light</button>
              <button type="button" class="btn btn-dark">Dark</button>
              <button type="button" class="btn btn-link">Link</button>
            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Rounded Buttons</h5>

              <button type="button" class="btn btn-primary rounded-pill">Primary</button>
              <button type="button" class="btn btn-secondary rounded-pill">Secondary</button>
              <button type="button" class="btn btn-success rounded-pill">Success</button>
              <button type="button" class="btn btn-danger rounded-pill">Danger</button>
              <button type="button" class="btn btn-warning rounded-pill">Warning</button>
              <button type="button" class="btn btn-info rounded-pill">Info</button>
              <button type="button" class="btn btn-light rounded-pill">Light</button>
              <button type="button" class="btn btn-dark rounded-pill">Dark</button>
            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Icon Buttons</h5>

              <button type="button" class="btn btn-primary"><i class="bi bi-star me-1"></i> With Text</button>
              <button type="button" class="btn btn-secondary"><i class="bi bi-collection"></i></button>
              <button type="button" class="btn btn-success"><i class="bi bi-check-circle"></i></button>
              <button type="button" class="btn btn-danger"><i class="bi bi-exclamation-octagon"></i></button>
              <button type="button" class="btn btn-warning"><i class="bi bi-exclamation-triangle"></i></button>
              <button type="button" class="btn btn-info"><i class="bi bi-info-circle"></i></button>
              <button type="button" class="btn btn-dark"><i class="bi bi-folder"></i></button>
            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Button Groups</h5>

              <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-primary">Left</button>
                <button type="button" class="btn btn-primary">Middle</button>
                <button type="button" class="btn btn-primary">Right</button>
              </div>

              <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                <button type="button" class="btn btn-danger">Left</button>
                <button type="button" class="btn btn-warning">Middle</button>
                <button type="button" class="btn btn-success">Right</button>
              </div>

              <div class="btn-group" role="group" aria-label="Basic outlined example">
                <button type="button" class="btn btn-outline-primary">Left</button>
                <button type="button" class="btn btn-outline-primary">Middle</button>
                <button type="button" class="btn btn-outline-primary">Right</button>
              </div>

            </div>
          </div>

        </div>

        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Outline Buttons</h5>

              <button type="button" class="btn btn-outline-primary">Primary</button>
              <button type="button" class="btn btn-outline-secondary">Secondary</button>
              <button type="button" class="btn btn-outline-success">Success</button>
              <button type="button" class="btn btn-outline-danger">Danger</button>
              <button type="button" class="btn btn-outline-warning">Warning</button>
              <button type="button" class="btn btn-outline-info">Info</button>
              <button type="button" class="btn btn-outline-light">Light</button>
              <button type="button" class="btn btn-outline-dark">Dark</button>
            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Button Sizes</h5>

              <button type="button" class="btn btn-primary btn-sm">Small</button>
              <button type="button" class="btn btn-secondary">Normal</button>
              <button type="button" class="btn btn-success btn-lg">Large</button>

              <button type="button" class="btn btn-outline-danger btn-sm">Small</button>
              <button type="button" class="btn btn-outline-warning">Normal</button>
              <button type="button" class="btn btn-outline-info btn-lg">Large</button>

              <div class="d-grid gap-2 mt-3">
                <button class="btn btn-primary" type="button">Block Button</button>
              </div>

            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Button States</h5>

              <button type="button" class="btn btn-primary">Normal</button>
              <button type="button" class="btn btn-primary" disabled>Disabled</button>
              <button type="button" class="btn btn-outline-primary">Normal</button>
              <button type="button" class="btn btn-outline-primary" disabled>Disabled</button>
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

</body>

</html>