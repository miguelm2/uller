<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" href="assets/img/cropped-ICONO-1-32x32.png">
    <link rel="stylesheet" href="assets/vendor/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <main>
        <?php include_once('./assets/html/header.php') ?>
        <section>
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
                            <p class="m-0 p-0">Barranquilla Santa Marta y Cartagena</p>
                            <p class="m-0 p-0">Teléfono: +57 323 8067136</p>
                            <hr>
                            <p class="m-0 p-0">Dudas e inquietudes, escríbenos.</p>
                            <p class="m-0 p-0">soporte@uller.co</p>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <form method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="nombre" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" name="nombre" placeholder="Nombre">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Dirección de correo electrónico</label>
                                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Mensaje </label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <div class="text-end mt-4">
                                <button type="submit" class="btn btn-dark p-3">
                                    Enviar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <?php include_once('./assets/html/footer.php') ?>
    </main>
    <a href="https://api.whatsapp.com/send/?phone=573238067136&text&type=phone_number&app_absent=0" class="whatsapp-button" target="_blank">
        <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp">
    </a>
</body>
</html>