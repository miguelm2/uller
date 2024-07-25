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
                                <h5 class="text-primary">Edición de articulo del blog</h5>
                            </div>
                            <div class="col-md-2 text-right d-grid">
                                <a href="blog.php" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left-circle"></i>
                                    <span class="text"> Atras</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="padding-top: 5px;">
                        <!-- Vertical Form -->
                        <form method="post">
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label for="estado" class="form-label">Estado</label>
                                    <select class="form-select" id="estado" name="estado">
                                        <option value="<?= $blog->getEstado()[0]; ?>" hidden><?= $blog->getEstado()[1]; ?></option>
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label for="inputEmail4">Titulo</label>
                                    <input type="text" class="form-control" placeholder="Titulo" name="titulo" required value="<?= $blog->getTitulo() ?>">
                                </div>

                                <div class="col-md-12">
                                    <label for="inputEmail4">Contenido</label>
                                    <textarea class="form-control" placeholder="Contenido" name="contenido" required id="texto"><?= html_entity_decode($blog->getContenido()) ?></textarea>
                                </div>

                                <div class="col-md-4 d-grid gap-2 mt-3">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalActualizar"><i class="bi bi-card-image"></i> Actualizar Imagen</button>
                                </div>

                                <div class="col-md-4 d-grid gap-2 mt-3">
                                    <button type="submit" class="btn btn-success" name="setBlog"><i class="bi bi-save"></i> Actualizar Registro</button>
                                </div>

                                <div class="col-md-4 d-grid gap-2 mt-3">
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminar"><i class="bi bi-trash-fill"></i> Eliminar Registro</button>
                                </div>

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
                            <button type="submit" name="deleteBlog" class="btn btn-danger"><i class="bi bi-trash-fill"></i> Eliminar Registro</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- End Basic Modal-->




        <!-- Modal Actualizar imagen-->
        <!-- ======= Basic Modal ======= -->
        <form method="post" enctype="multipart/form-data">
            <div class="modal fade" id="modalActualizar" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="p-4">
                            <div style="background-image: url(<?= $img_blog_detail; ?>);width: 100%;height:0;padding-top:50%; background-position: 50% 50%; background-size: cover;border-radius:10px">
                            </div>
                        </div>
                        <div class="modal-header">
                            <h5 class="modal-title">Actualizar imagen</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group col-md-12 mb-4">
                                <label for="inputEmail4">Imagen</label>
                                <input type="file" class="form-control" placeholder="imagen" name="updateImgBlog" accept="image/png, image/gif, image/jpeg" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" name="setImageBlog" class="btn btn-primary"><i class="bi bi-card-image"></i> Actualizar imagen</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- End Basic Modal-->


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