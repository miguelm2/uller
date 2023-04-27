<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/routing/Technician.php'; ?>
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
    <link href='https://fonts.googleapis.com/css?family=Great Vibes' rel='stylesheet'>
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
    <?php include '../../assets/html/sidebar-technician.php'; ?>
    <!-- End Sidebar-->

    <main id="main" class="main">


        <section class="section dashboard">

            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-10">
                                <h5 class="text-primary">Informe de Servicio</h5>
                            </div>
                            <div class="col-md-2 text-right d-grid">
                                <a href="<?= $btnAtrasTicket; ?>" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left-circle"></i>
                                    <span class="text"> Atras</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="padding-top: 5px;">
                        <form method="POST">
                            <div class="row g-3">
                                <div class="col-md-6 form-group">
                                    <label for="fecha_servicio">Fecha servicio</label>
                                    <input type="date" class="form-control" name="fecha_servicio" required value="<?= $informTicket->getFecha_servicio() ?>">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="serial">Serial</label>
                                    <input type="text" class="form-control" name="serial" maxlength="150" required value="<?= $informTicket->getSerial() ?>">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="year_compra">Año de compra</label>
                                    <input type="text" class="form-control" name="year_compra" maxlength="4" required value="<?= $informTicket->getYear_compra() ?>">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="voltaje">Voltaje</label>
                                    <input type="number" class="form-control" name="voltaje" required value="<?= $informTicket->getVoltaje() ?>">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="amperaje">Amperaje</label>
                                    <input type="number" class="form-control" name="amperaje" required value="<?= $informTicket->getAmperaje() ?>">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="fases">Fases</label>
                                    <input type="number" class="form-control" name="fases" required value="<?= $informTicket->getFases() ?>">
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="mantenimiento_preventivo">Mantenimiento Preventivo</label>
                                    <select class="form-select" name="mantenimiento_preventivo" id="mantenimiento_preventivo">
                                        <option value="<?= $informTicket->getMantenimiento_preventivo()[0] ?>"><?= $informTicket->getMantenimiento_preventivo()[1] ?></option>
                                        <option value="1">Si</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row g-1" id="contentPreventivo" style="margin-top:10pt;">
                                <div class="col-md-12">
                                    <input class="form-check-input checkPreventivo" type="checkbox" value="1" name="equipo_opera_inicio" <?= $informTicket->getEquipo_opera_inicio()[1] ?>>
                                    <label class="form-check-label" for="equipo_opera_inicio">
                                        Equipo opera adecuadamente antes del servicio
                                    </label>
                                </div>
                                <div class="col-md-12">
                                    <input class="form-check-input checkPreventivo" type="checkbox" value="1" name="limpieza_general" <?= $informTicket->getLimpieza_general()[1] ?>>
                                    <label class="form-check-label" for="limpieza_general">
                                        Limpieza general
                                    </label>
                                </div>
                                <div class="col-md-12">
                                    <input class="form-check-input checkPreventivo" type="checkbox" value="1" name="limpieza_filtros" <?= $informTicket->getLimpieza_filtros()[1] ?>>
                                    <label class="form-check-label" for="limpieza_filtros">
                                        Limpieza filtros
                                    </label>
                                </div>
                                <div class="col-md-12">
                                    <input class="form-check-input checkPreventivo" type="checkbox" value="1" name="limpieza_serpentin" <?= $informTicket->getLimpieza_serpentin()[1] ?>>
                                    <label class="form-check-label" for="limpieza_serpentin">
                                        Limpieza Serpentin evaporador
                                    </label>
                                </div>
                                <div class="col-md-12">
                                    <input class="form-check-input checkPreventivo" type="checkbox" value="1" name="limpieza_bandeja" <?= $informTicket->getLimpieza_bandeja()[1] ?>>
                                    <label class="form-check-label" for="limpieza_bandeja">
                                        Limpieza bandeja
                                    </label>
                                </div>
                                <div class="col-md-12">
                                    <input class="form-check-input checkPreventivo" type="checkbox" value="1" name="serpentin_condensador" <?= $informTicket->getSerpentin_condensador()[1] ?>>
                                    <label class="form-check-label" for="serpentin_condensador">
                                        Serpentin condensador
                                    </label>
                                </div>
                                <div class="col-md-12">
                                    <input class="form-check-input checkPreventivo" type="checkbox" value="1" name="limpieza_drenaje" <?= $informTicket->getLimpieza_drenaje()[1] ?>>
                                    <label class="form-check-label" for="limpieza_drenaje">
                                        Limpieza drenaje
                                    </label>
                                </div>
                                <div class="col-md-12">
                                    <input class="form-check-input checkPreventivo" type="checkbox" value="1" name="verificacion" <?= $informTicket->getVerificacion()[1] ?>>
                                    <label class="form-check-label" for="verificacion">
                                        Verificacion
                                    </label>
                                </div>
                                <div class="col-md-12">
                                    <input class="form-check-input checkPreventivo" type="checkbox" value="1" name="estado_carcasa" <?= $informTicket->getEstado_carcasa()[1] ?>>
                                    <label class="form-check-label" for="estado_carcasa">
                                        Estado carcasa interior
                                    </label>
                                </div>
                                <div class="col-md-12">
                                    <input class="form-check-input checkPreventivo" type="checkbox" value="1" name="estado_equipo" <?= $informTicket->getEstado_equipo()[1] ?>>
                                    <label class="form-check-label" for="estado_equipo">
                                        Estado equipo exterior (B/R/M)
                                    </label>
                                </div>
                                <div class="col-md-12">
                                    <input class="form-check-input checkPreventivo" type="checkbox" value="1" name="equipo_opera_fin" <?= $informTicket->getEquipo_opera_fin()[1] ?>>
                                    <label class="form-check-label" for="equipo_opera_fin">
                                        Equipo queda operando adecuadamente despues del servicio
                                    </label>
                                </div>
                            </div>

                            <div class="row g-3" style="margin-top:1pt;">
                                <div class="col-md-12 form-group">
                                    <label for="mantenimiento_correctivo">Mantenimiento Correctivo</label>
                                    <select class="form-select" name="mantenimiento_correctivo" id="mantenimiento_correctivo">
                                        <option value="<?= $informTicket->getMantenimiento_correctivo()[0] ?>"><?= $informTicket->getMantenimiento_correctivo()[1] ?></option>
                                        <option value="1">Si</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row g-3" id="contentCorrectivo" style="margin-top:1pt;">
                                <div class="col-md-12 form-group">
                                    <label for="falla_encontrada">Falla encontrada</label>
                                    <textarea class="form-control dataCorrectivo" name="falla_encontrada" rows="3" maxlength="255"><?= $informTicket->getFalla_encontrada() ?></textarea>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="repuestos">Repuestos requeridos</label>
                                    <textarea class="form-control dataCorrectivo" name="repuestos" rows="3" maxlength="255"><?= $informTicket->getRepuestos() ?></textarea>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="insumos">Insumos requeridos (refrigerante, aceite, otros)</label>
                                    <textarea class="form-control dataCorrectivo" name="insumos" rows="3" maxlength="255"><?= $informTicket->getInsumos() ?></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label for="tarjetas_electronicas">Tarjetas electronicas</label>
                                    <select class="form-select" name="tarjetas_electronicas" id="tarjetas_electronicas">
                                        <option value="<?= $informTicket->getTarjetas_electronicas()[0] ?>"><?= $informTicket->getTarjetas_electronicas()[1] ?></option>
                                        <option value="1">Si</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="estimado_horas">Estimado horas de reparacion</label>
                                    <input type="number" class="form-control dataCorrectivo" name="estimado_horas" value="<?= $informTicket->getEstimado_horas() ?>">
                                </div>
                            </div>

                            <div class="row g-3" style="margin-top:1pt;">
                                <div class="col-md-12 form-group">
                                    <label for="observaciones">Observaciones</label>
                                    <textarea class="form-control" name="observaciones" rows="3" maxlength="500" required><?= $informTicket->getObservaciones() ?></textarea>
                                </div>
                                <div class="col-md-12">
                                    <hr>
                                </div>
                                <div class="col-md-4 d-grid gap-2 mt-3">
                                    <button type="submit" class="btn btn-success" name="setInformTicket"><i class="bi bi-save"></i> Actualizar Informe</button>
                                </div>
                                <div class="col-md-4 d-grid gap-2 mt-3">
                                    <button type="submit" class="btn btn-primary" name="getPdfInform"><i class="bi bi-filetype-pdf"></i> Generar Informe</button>
                                </div>

                                <?=$btnFirmaInform;?>
                                
                            </div>
                        </form>
                    </div>
                </div>

            </div>


            <form id="signatureform" method="POST">
                <div class="modal fade" id="modalFirma" role="dialog">
                    <div class="modal-dialog modal-lg modal-dialog-scrollable">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Firma</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row g-3">
                                    <div class="col-md-12 form-group">
                                        <label for="estado" class="form-label">Estilo de la firma</label>
                                        <select class="form-select" id="tipoFirma" name="">
                                            <option value="1">A mano alzada</option>
                                            <option value="2" style="font-family: 'Great Vibes'"> Great Vibes </option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 form-group" id="contentNombre" style="display: none;">
                                        <label class="form-label">Nombre cliente</label>
                                        <input type="text" class="form-control border border-primary" name="nombre_firma" id="nombre_firma" placeholder="Nombre de la persona autorizada a firmar">
                                    </div>
                                    <div class="form-group" id="divFirmaManoAlzada">
                                        <label>Firma</label>
                                        <div id="canvasDiv" class="border border-primary"></div>
                                    </div>
                                    <div class="form-group" id="divLetraFirmaGreat" style="display: none;">
                                        <label>Firma</label>
                                        <div id="tipoLetraFirma" class="border border-primary">
                                            <div id="capture" class="border border-primary">
                                                <canvas id="myCanvas" width="760" height="100"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>

                                    <input type="hidden" id="signature" name="firma">
                                    <input type="hidden" name="newFirmaReport" value="1">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="reset-btn">Limpiar firma</button>
                                <button type="button" class="btn btn-success" id="btn-save">Crear firma electrónica</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            </div>

                        </div>

                    </div>
                </div> <!-- fin modal -->
            </form>

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

    <!-- JS FIRMA -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
    <script src="../../js/firma_canvas/canvas_firma.js"></script>
    <script src="../../js/firma_canvas/tooltip_firma.js"></script>

    <!-- JS PAGE -->
    <script src="../../js/informFunctions.js"></script>
    <script src="../../js/selectRepeat.js"></script>
    <script src="../../js/firmaReport.js"></script>

    <!-- Template Main JS File -->
    <script src="../../assets/js/main.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?= $response ?>
</body>

</html>