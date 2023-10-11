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
}
