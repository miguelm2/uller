<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/routing/Page.php'; ?>
<!DOCTYPE html>
<html lang="en">

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
</head>

<body>
    <main class="main">
        <?php include_once('./assets/html/header.php') ?>
        <section class="hero">
            <div class="row p-5">
                <div class="col-md-7 p-5">
                    <h1 class="mt-3 display-4  fst-italic fw-bold colorp1">
                        ¡La solución para el mantenimiento de aires acondicionados en casa!
                    </h1>
                    <div class="color">
                        <a href="bienvenidos" class="btn btn-warning p-2 m-5 fw-bold">Solicita un técnico</a>
                    </div>
                </div>
            </div>
        </section>
        <section class="mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 text-center">
                        <h3 class="mt-5 text-black fw-light fst-italic display-6">
                            Contrata ULLER la plataforma para suministro de técnicos certificados en Aire
                            Acondicionado a tu hogar.
                        </h3>
                    </div>
                    <div class="col-md-4 text-center">
                        <img src="/assets/img/tecnico-uller.png" loading="lazy" alt="tecnico uller" class="img-fluid">
                    </div>
                </div>
            </div>
        </section>
        <section class="p-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 text-center">
                        <h1 class=" colorp1 fst-italic fw-bolder">
                            Beneficios de Uller
                        </h1>
                    </div>
                    <div class="col-md-12">
                        <ul class="mt-4 text-black">
                            <li>Rutinas de acuerdo a recomendaciones y estándares internacionales*</li>
                            <li>Tarifas estandarizadas para los servicios de mantenimiento de equipos menores a 5TR con condiciones de instalación convencionales (unidad interior y exterior a menos de 5 metros , fácil acceso a unidad exterior, unidad interior a menos de 2.2 de altura)</li>
                            <li>Técnicos validados con estudio de seguridad y verificación de experiencia y conocimientos.</li>
                            <li>Mantenimientos correctivos con técnicos de alta calidad y Soporte de ingeniería en caso de requerirlo.</li>
                            <li>Rapidez en el servicio pues contamos con varios técnicos afiliados en las ciudades donde estamos.</li>
                            <li>Seguridad y facilidad de pago por transferencia o con tarjeta de crédito con link de pago.</li>
                            <li>Evite riesgos innecesarios por accidentes laborales sin tener cobertura nuestros Técnicos cuentan con seguridad social al día.</li>
                            <li>Le recordaremos a tiempo para que tome sus mantenimientos preventivos y evite mayor consumo de energía o fallas comunes por descuido.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <?php include_once('./assets/html/footer.php') ?>
    </main>
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js" defer></script>
    <script src="assets/vendor/jquery/jquery.min.js" defer></script>
    <a href="https://api.whatsapp.com/send/?phone=573238067136&text&type=phone_number&app_absent=0" class="whatsapp-button" target="_blank">
        <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp">
    </a>
</body>

</html>