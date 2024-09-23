<?php
class Elements
{
    public static function alert($mensaje, $tipo)
    {
        return  '<script>swal("' . $mensaje . '", "", "' . $tipo . '");</script>';
    }

    public static function crearBotonVer($link, $valor)
    {
        return '<a href="' . $link . '?' . $link . '=' . $valor . '" class="btn btn-info rounded-circle btn-sm"><i class="bi bi-info-circle"></i></a>';
    }

    public static function crearBotonVerTwoLink($link1, $valor1, $link2, $valor2)
    {
        return '<a href="' . $link1 . '?' . $link1 . '=' . $valor1 . '&' . $link2 . '=' . $valor2 . '" class="btn btn-info rounded-circle btn-sm"><i class="bi bi-info-circle"></i></a>';
    }

    public static function crearBotonEliminar($link, $link2, $valor)
    {
        return '<a href="' . $link . '?' . $link2 . '=' . $valor . '" class="btn btn-danger rounded-circle btn-sm"><i class="bi bi-trash-fill"></i></a>';
    }

    public static function crearBotonEditarJs($id)
    {
        return '<button class="btn btn-info rounded-circle btn-sm btn-editar" value="' . $id . '"><i class="bi bi-info-circle"></i></button>';
    }

    public static function crearBotonEliminarJs($id)
    {
        return '<button class="btn btn-danger rounded-circle btn-sm btn-eliminar" value="' . $id . '"><i class="bi bi-trash-fill"></i></button>';
    }

    public static function crearBotonEliminarByTablaJs($tabla, $campo, $id)
    {
        return '<button class="btn btn-danger rounded-circle btn-sm btn-eliminar" value="' . $tabla . '-' . $campo . '-' . $id . '"><i class="bi bi-trash-fill"></i></button>';
    }

    public static function getAlertaRedireccionJs($mensaje, $tipo_mensaje, $link, $valor)
    {
        return '<script>
                    swal("' . $mensaje . '", "", "' . $tipo_mensaje . '");
                    setTimeout(function(){
                        window.location="' . $link . '?' . $link . '=' . $valor . '"
                    }, 1000);
                </script>';
    }

    public static function getAlertaRedireccionNotValueJs($mensaje, $tipo_mensaje, $link)
    {
        return '<script>
                    swal("' . $mensaje . '", "", "' . $tipo_mensaje . '");
                    setTimeout(function(){
                        window.location="' . $link . '"
                    }, 1000);
                </script>';
    }

    public static function getTablaCincoColumnas($nombre, $marca, $tipo, $servicio, $btn, $color)
    {
        return '
        <tr' . $color . '>
        <td>' . $nombre . '</td>
        <td>' . $marca . '</td>
        <td>' . $tipo . '</td>
        <td>' . $servicio . '</label></td>
        <td>' . $btn . '</td>
        </tr>';
    }

    public static function getTablaTresColumnas($id, $nombre, $fecha)
    {
        return '
            <tr>
                <td>' . $id . '</td>
                <td>' . $nombre . '</td>
                <td>' . date_format(date_create($fecha), 'd/m/Y g:i A') . '</td>
                <td>
                    <button type="button" class="btn btn-info rounded-circle btn-sm btn-editar" value="' . $id . '">
                    <i class="bi bi-info-circle"></i></button>
                </td>
            </tr>
        ';
    }

    public static function getTablaTresColumnasAdmin($id, $nombre, $fecha)
    {
        return '
            <tr>
                <td>' . $id . '</td>
                <td>' . $nombre . '</td>
                <td>' . date_format(date_create($fecha), 'd/m/Y g:i A') . '</td>
                <td>
                    <button type="button" class="btn btn-danger rounded-circle btn-sm btn-eliminar" value="' . $id . '">
                    <i class="bi bi-trash"></i></button>
                </td>
            </tr>
        ';
    }

    public static function getBtnPDFOrden()
    {
        return '
        <form method="post">
            <div class="col-md-6 mx-auto mt-3">
                <button type="submit" class="btn btn-secondary w-100" name="getPdfReportTicket"><i class="bi bi-filetype-pdf"></i> Generar Orden</button>
            </div>
        </form>';
    }

    public static function getFechaLetras($fecha)
    {
        $fechaLetras = explode('-', $fecha);
        return $fechaLetras[2] . ' de ' . self::mes($fechaLetras[1]) . ' de ' . $fechaLetras[0];
    }

    public static function mes($numero)
    {
        switch ($numero) {
            case 12: {
                    $numu = "Diciembre";
                    break;
                }
            case 11: {
                    $numu = "Noviembre";
                    break;
                }
            case 10: {
                    $numu = "Octubre";
                    break;
                }
            case 9: {
                    $numu = "Septiembre";
                    break;
                }
            case 8: {
                    $numu = "Agosto";
                    break;
                }
            case 7: {
                    $numu = "Julio";
                    break;
                }
            case 6: {
                    $numu = "Junio";
                    break;
                }
            case 5: {
                    $numu = "Mayo";
                    break;
                }
            case 4: {
                    $numu = "Abril";
                    break;
                }
            case 3: {
                    $numu = "Marzo";
                    break;
                }
            case 2: {
                    $numu = "Febrero";
                    break;
                }
            case 1: {
                    $numu = "Enero";
                    break;
                }
            case 0: {
                    $numu = "";
                    break;
                }
        }
        return $numu;
    }
    public static function getCardBlog($id_blog, $nombre, $imagen, $tipo_imagen, $titulo, $fecha)
    {
        if ($tipo_imagen == "IMG") {
            $url_img = Path::$DIR_IMAGE_BLOG . $imagen;
        } else {
            $url_img = "data:image/png;base64," . $imagen;
        }

        return '
                <div class="col-lg-4 col-md-6">
                    <div class="single-article rounded-custom my-3">
                        <a href="blog_single?blog_single=' . $titulo . '" class="article-img">
                            <img src="' . $url_img . '" class="card-img-top" alt="...">
                        </a>
                        <div class="article-content p-4">
                            <a href="blog_single?blog_single=' . $titulo . '" data-bs-toggle="tooltip" data-bs-placement="top" title="' . $titulo . '">
                                <h2 class="h5 article-title limit-2-line-text">' . $titulo . '</h2>
                            </a>

                            <a href="javascript:;">
                                <div class="d-flex align-items-center pt-4">
                                    <div class="avatar">
                                        <i class="bi bi-person-circle display-6 me-3"></i>
                                    </div>
                                    <div class="avatar-info">
                                        <h6 class="mb-0 avatar-name">' . $nombre . '</h6>
                                        <span class="small fw-medium text-muted">' . self::getFechaLetras($fecha) . '</span>
                                    </div>
                                </div>
                            </a>

                        </div>
                    </div>
                </div>';
    }

    public static function getBlogsRecientes($id_blog, $imagen, $tipo_imagen, $titulo, $fecha, $titulo_completo)
    {
        if ($tipo_imagen == "IMG") {
            $url_img = Path::$DIR_IMAGE_BLOG . $imagen;
        } else {
            $url_img = "data:image/png;base64," . $imagen;
        }

        return '
                <div class="col-md-12 mb-3">
                    <div class="card mb-3">
                        <img src="' . $url_img . '" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a href="blog_single?blog_single=' . $titulo_completo . '" data-bs-toggle="tooltip" data-bs-placement="top" title="' . $titulo_completo . '">
                                <h5 class="card-title" style="font-size: 15px;">' . $titulo . '</h5>
                            </a>
                            <p class="card-text"><small class="text-muted"><i class="bi bi-calendar"></i> ' . self::getFechaLetras($fecha) . '</small></p>
                        </div>
                    </div>
                </div>
        ';
    }
    public static function getBotonPaginacion($numero)
    {
        $active = ($numero == 1) ? 'active' : '';
        return '<li class="page-item itemPagination"><a class="page-link btnPagination ' . $active . '" role="button" id="pag-' . $numero . '">' . $numero . '</a></li>';
    }

    public static function getPaginacion($listBotones)
    {
        return '<div class="row justify-content-center align-items-center mt-5">
                    <div class="col-auto my-1">
                        <button type="button" class="btn btn-soft-primary btn-sm" id="btn-previous" disabled>Anterior</button>
                    </div>
                    <div class="col-auto my-1">
                        <nav>
                            <ul class="pagination rounded mb-0">
                                ' . $listBotones . '
                            </ul>
                        </nav>
                    </div>
                    <div class="col-auto my-1">
                        <button type="button" class="btn btn-soft-primary btn-sm" id="btn-next">Siguiente</button>
                    </div>
                </div>';
    }
    public static function crearMensajeAlerta($mensaje, $tipo_alerta)
    {
        return '<script>swal("' . $mensaje . '", "", "' . $tipo_alerta . '");</script>';
    }
    public static function cardsTypeEquipment($equipo, $imagen, $html)
    {
        return '<div class="col-md-4">
                    <div class="card shadow-lg">
                        <div class="card-header pb-0">
                            <div class="card-title p-0">' . $equipo . '</div>
                        </div>
                        <div class="card-body pb-0">
                            <img src="' . Path::$DIR_IMAGE_EQUIPMENT . $imagen . '" alt="Cassette" class="img-fluid" style="height: 200px;">
                        </div>
                        <div class="card-footer">
                            ' . $html . '
                        </div>
                    </div>
                </div>';
    }
    public static function getCardTechnical($usuario, $direccion, $id_solicitud)
    {
        return '<div class="col-md-12">
                    <div class="card shadow">
                        <div class="row m-2">
                            <div class="col-md-3">Cliente: ' . $usuario . '</div>
                            <div class="col-md-4">Dirección: '. $direccion .'</div>
                            <div class="col-md-4">
                                <a href="request?acceptRequest=' . $id_solicitud . '" class="btn btn-primary">Aceptar</a>
                                <a href="request?acceptRequest=' . $id_solicitud . '" class="btn btn-danger">Rechazar</a>
                            </div>
                        </div>
                    </div>
                </div>';
    }
}
