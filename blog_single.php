<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/routing/Page.php'; ?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <!--required meta tags-->
    <title>
        <?= $blogPage->getTitulo() ?>
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta name="title" content="<?= $blogPage->getTitulo() ?>">
    <meta name="description" content="<?= str_replace('"', ' ', substr(html_entity_decode($blogPage->getContenido()), 100)) ?>">
    <meta name="keywords" content="blog mantenimiento, tendencias de mantenimiento, mantenimiento de aires acondicionados, soluciones innovadoras, consejos de mantenimiento, novedades de mantenimiento, Uller">
    <meta name="copyright" content="Uller" />
    <meta name="author" content="Uller">
    <link rel="canonical" href="https://uller.co/blog_single" />
    <meta name="robots" content="index, follow" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="article">
    <meta property="og:url" content="https://uller.co/blog_single?blog_single=<?= $blogPage->getTitulo() ?>">
    <meta property="og:title" content="<?= $blogPage->getTitulo() ?>">
    <meta property="og:description" content="<?= str_replace('"', ' ', substr(html_entity_decode($blogPage->getContenido()), 100)) ?>">
    <meta property="og:keywords" content="blog mantenimiento, tendencias de mantenimiento, mantenimiento de aires acondicionados, soluciones innovadoras, consejos de mantenimiento, novedades de mantenimiento, Uller">

    <meta property="og:image" content="" />

    <!-- Twitter -->
    <meta property="twitter:card" content="">
    <meta property="twitter:url" content="https://uller.co/blog_single?blog_single=<?= $blogPage->getTitulo() ?>">
    <meta property="twitter:title" content="<?= $blogPage->getTitulo() ?>">
    <meta property="twitter:description" content="<?= str_replace('"', ' ', substr(html_entity_decode($blogPage->getContenido()), 100)) ?>">
    <meta property="twitter:keywords" content="blog mantenimiento, tendencias de mantenimiento, mantenimiento de aires acondicionados, soluciones innovadoras, consejos de mantenimiento, novedades de mantenimiento, Uller">
    <meta property="twitter:image" content="" />


    <!--favicon icon-->
    <link rel="icon" href="assets/img/cropped-ICONO-1-32x32.png" type="image/png" sizes="16x16">

    <!--title-->
    <title>
        <?= $blogPage->getTitulo() ?>
    </title>

    <!--build:css-->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- endbuild -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-RQPNWSTCBB"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-RQPNWSTCBB');
    </script>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-16548168065">
    </script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'AW-16548168065');
    </script>
    <link rel="stylesheet" href="assets/vendor/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>

    <!--main content wrapper start-->
    <div class="main-wrapper">

        <!--header section start-->
        <?php include_once('./assets/html/header.php') ?>

        <!--blog section start-->
        <section class="masonary-blog-section" style="background-color: #FBFCFC;">
            <div class="container pt-5">

                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-12 mb-3">
                        <div class="card mb-3 rounded-3">
                            <h3 class="card-title text-center pt-3 mb-0" style="color: black;">
                                <?= $blogPage->getTitulo() ?>
                            </h3>
                            <p class="card-text text-center"><small class="text-muted me-3"><i class="bi bi-person-fill"></i>
                                    Uller
                                </small><small class="text-muted"><i class="bi bi-calendar"></i>
                                    <?= $fechaBlogPage ?>
                                </small></p>
                            <div class="card-body">
                                <center><img src="<?= $img_blog_detail ?>" class="card-img-top img-fluid" alt="Imagen">
                                </center>
                                <p class="card-text mt-2" style="color: black;">
                                    <?= html_entity_decode($blogPage->getContenido()) ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <div class="row">
                            <h3>Últimos Blogs</h3>
                            <div class="col-md-12">
                                <div class="progress" style="height: 3px;">
                                    <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <br>
                            </div>
                            <?= $ultimosBlog ?>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!--blog section end-->


        <!--footer section start-->
        <?php include_once('./assets/html/footer.php') ?>

    </div>

    <!--build:js-->
    <script src="assets/js/vendors/jquery-3.6.0.min.js"></script>
    <script src="assets/js/vendors/bootstrap.bundle.min.js"></script>
    <script src="assets/js/vendors/swiper-bundle.min.js"></script>
    <script src="assets/js/vendors/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/vendors/parallax.min.js"></script>
    <script src="assets/js/vendors/aos.js"></script>
    <script src="assets/js/vendors/massonry.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <!--endbuild-->
</body>

</html>