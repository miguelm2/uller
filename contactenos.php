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
    <main>
        <?php include_once('./assets/html/header.php') ?>
        <section class="pb-3">
            <div class="container">
                <div class="row">
                    <div class="mt-5">
                        <h2 class="fw-bold fst-italic">
                            Contáctanos
                        </h2>
                    </div>
                    <div class="col-md-4 mt-4">
                        <div class="linea-azul">
                            <p class="m-0 p-0">Estamos en</p>
                            <p class="m-0 p-0"><?= $informacionPage->getCiudad() ?>, Santa Marta y Cartagena</p>
                            <p class="m-0 p-0">Dirección: <?= $informacionPage->getDireccion() ?></p>
                            <p class="m-0 p-0">Teléfono: +57 <?= $informacionPage->getWp() ?></p>
                            <hr>
                            <p class="m-0 p-0">Dudas e inquietudes, escríbenos.</p>
                            <p class="m-0 p-0">soporte@uller.co</p>
                        </div>
                        <div>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3916.4661467568403!2d-74.80775709030846!3d11.003609954918822!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8ef42da1c8eb4ea1%3A0x44884cec382b2c18!2sCl.%2076%20%2354-11%2C%20Nte.%20Centro%20Historico%2C%20Barranquilla%2C%20Atl%C3%A1ntico!5e0!3m2!1ses-419!2sco!4v1722608366283!5m2!1ses-419!2sco" style="border:0; max-width: 100%; max-height: 40%;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <form method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 form-group">
                                        <label for="nombre" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 form-group">
                                        <label for="celular" class="form-label">Celular</label>
                                        <input type="number" name="celular" id="celular" class="form-control" placeholder="Celular" required>
                                    </div>
                                </div>
                                <div class="col-md-12 form-group">
                                    <div class="mb-3">
                                        <label for="correo" class="form-label">Correo Electrónico</label>
                                        <input type="email" class="form-control" name="correo" placeholder="Correo Electrónico" required>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="mensaje" class="form-label">Mensaje </label>
                                <textarea class="form-control" name="mensaje" rows="4" placeholder="Escribe tu mensaje"></textarea>
                            </div>
                            <div class="text-end mt-4">
                                <button type="submit" class="btn btn-dark p-3 m-3" name="newMessage">
                                    <i class="bi bi-send-fill"></i> Enviar
                                </button>
                            </div>
                        </form>
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?= $response ?>
</body>

</html>