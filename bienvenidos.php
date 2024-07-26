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
        <section>
            <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-10 card mt-5 p-3">
                        <div class="mt-3">
                            <h2 class="fw-bold fst-italic text-center colorp1">
                                Solicitar un técnico
                            </h2>
                        </div>
                        <div class="col-12">
                            <form method="post" class="container">
                                <div class="form-group">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" required>
                                </div>
                                <div class="form-group">
                                    <label for="celular" class="form-label">Celular</label>
                                    <input type="number" name="celular" id="celular" class="form-control" placeholder="Celular" required>
                                </div>
                                <div class="form-group">
                                    <label for="correo" class="form-label">Correo</label>
                                    <input type="email" name="correo" id="correo" class="form-control" placeholder="Correo" required>
                                </div>
                                <div class="form-group">
                                    <label for="direccion" class="form-label">Dirección</label>
                                    <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Dirección" required>
                                </div>
                                <div class="form-group">
                                    <label for="ciudad" class="form-label">Ciudad</label>
                                    <input type="text" name="ciudad" id="ciudad" class="form-control" placeholder="Ciudad" required>
                                </div>
                                <div class="form-group">
                                    <label for="mensaje" class="form-label">Mensaje</label>
                                    <textarea name="mensaje" id="mensaje" class="form-control" placeholder="Escribe tu mensaje..." required rows="4"></textarea>
                                </div>
                                <div class="form-group text-center mt-2">
                                    <button type="submit" class="btn btn-success p-3 m-3" name="solicitar"><i class="bi bi-send-fill"></i> Enviar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-8 col-sm-10 text-center mt-5">
                        <img src="/assets/img/tecnicoask.png" alt="tecnico aire acondicionado" class="img-fluid">
                    </div>
                </div>
            </div>
        </section>

        <?php include_once('./assets/html/footer.php') ?>
    </main>
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <a href="https://api.whatsapp.com/send/?phone=573238067136&text&type=phone_number&app_absent=0" class="whatsapp-button" target="_blank">
        <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp">
    </a>
</body>

</html>