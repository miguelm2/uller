<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/routing/Page.php'; ?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Conectamos usuarios de equipos de aire acondicionado con técnicos idóneos mediante una APP de geolocalización, fomentando la calidad del servicio y la estabilidad para la comunidad y el medio ambiente.">
    <meta name="keywords" content="mantenimiento de aires, geolocalización, técnicos de aire acondicionado, servicio técnico de calidad">
    <meta name="author" content="ULLER">
    <title>Mantenimiento de aires acondicionados</title>
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="ULLER - Conexión entre usuarios y técnicos de aire acondicionado">
    <meta property="og:description" content="Conectamos usuarios de equipos de aire acondicionado con técnicos idóneos mediante una APP de geolocalización, fomentando la calidad del servicio y la estabilidad para la comunidad y el medio ambiente.">
    <meta property="og:image" content="https://www.uller.co/assets/img/ULLER_cliente_feliz.jpg">
    <meta property="og:url" content="https://www.uller.co/">
    <meta property="og:type" content="website">
    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="ULLER - Conexión entre usuarios y técnicos de aire acondicionado">
    <meta name="twitter:description" content="Conectamos usuarios de equipos de aire acondicionado con técnicos idóneos mediante una APP de geolocalización, fomentando la calidad del servicio y la estabilidad para la comunidad y el medio ambiente.">
    <meta name="twitter:image" content="URL_de_la_imagen_de_previsualización">
    <link rel="canonical" href="https://www.uller.co/">
    <link rel="icon" href="assets/img/cropped-ICONO-1-32x32.png">
    <link rel="stylesheet" href="assets/vendor/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">

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
</head>

<body>

    <!--preloader end-->
    <!--main content wrapper start-->
    <div class="main-wrapper">

        <!--header section start-->
        <?php include_once('./assets/html/header.php') ?>

        <!--page header section start-->
        <section class="page-header position-relative overflow-hidden ptb-80 bg-dark" style="background: url('assets/img/page-header-bg.svg')no-repeat center bottom">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-12">
                        <div class="section-heading text-center">
                            <h1 class="display-5 fw-bold">Nuestro Blog</h1>
                            <p class="lead mb-0">En este espacio, encontrarás artículos y recursos diseñados para informarte
                                y ayudarte a mantener tus sistemas de aire acondicionado en óptimas condiciones. Desde consejos
                                de mantenimiento y eficiencia energética, hasta las últimas tendencias y tecnologías en el
                                sector, nuestro objetivo es proporcionarte información valiosa y práctica.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-circle rounded-circle circle-shape-3 position-absolute bg-dark-light right-5"></div>
            </div>
        </section>
        <!--page header section end-->

        <!--blog section start-->
        <section class="masonary-blog-section ptb-120">
            <div class="container">

                <div class="row" id="contentCards">

                </div>

                <!--pagination start-->
                <?= $paginateBlog ?>
                <!--pagination end-->
            </div>
        </section>
        <!--blog section end-->


        <!--footer section start-->
        <!--footer section start-->
        <?php include_once('./assets/html/footer.php') ?>

    </div>

    <!--build:js-->
    <script src="/system/assets/vendor/jquery/jquery.min.js"></script>
    <script src="/system/assets/js/vendors/bootstrap.bundle.min.js"></script>
    <script src="/system/assets/js/vendors/swiper-bundle.min.js"></script>
    <script src="/system/assets/js/vendors/jquery.magnific-popup.min.js"></script>
    <script src="/system/assets/js/vendors/parallax.min.js"></script>
    <script src="/system/assets/js/vendors/aos.js"></script>
    <script src="/system/assets/js/vendors/massonry.min.js"></script>

    <!--endbuild-->
    <script src="/system/js/page/pagination.js"></script>
</body>

</html>