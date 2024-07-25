<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/routing/Admin.php'; ?>
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
	<link href="../../assets/css/styleCkeditor.css" rel="stylesheet">

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
								<h5 class="text-primary">Crear nuevo artículo</h5>
							</div>
							<div class="col-md-2 text-right d-grid">
                                <a href="blog.php" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left-circle"></i>
                                    <span class="text"> Atras</span>
                                </a>
                            </div>
						</div>
					</div>
					<div class="card-body" style="padding: 3%;">

						<form method="post" enctype="multipart/form-data">

							<div class="row g-2">
								
								<div class="col-md-12">
									<label for="inputEmail4">Titulo</label>
									<input type="text" class="form-control" placeholder="Titulo" name="titulo" required>
								</div>

								<div class="col-md-12">
									<label for="inputEmail4">Imagen</label>
									<input type="file" class="form-control" placeholder="imagen" name="imagenblog" accept="image/png, image/gif, image/jpeg" required>
								</div>
								
								<div class="col-md-12">
									<label for="inputEmail4">Contenido</label>
									<textarea class="form-control" placeholder="Contenido" name="contenido" id="texto" required>Contenido del blog</textarea>
								</div>

								<div class="col-md-12" style="text-align: center;">
									<button type="submit" class="btn btn-primary col-md-3" name="newBlog"><i class="bi bi-pencil-square"></i> Publicar</button>
								</div>

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

	<!-- Ck Editor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/super-build/ckeditor.js"></script>
    <script src="https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format"></script>
    <script src="https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration"></script>
    <script src="https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration"></script>
    <script src="https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature"></script>
    <script src="https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature"></script>
    <script src="https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features"></script>
    <script src="https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews"></script>
    <script src="https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators"></script>
    <script src="https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration"></script>
    <script src="https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html"></script>
    <script src=" https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html"></script>


    <!-- Uncomment to load the Spanish translation -->
    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/super-build/translations/es.js"></script>
    <script src="../../js/page/confCkeditor.js"></script>

	<!-- Template Main JS File -->
	<script src="../../assets/js/main.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<?= $response ?>
</body>

</html>