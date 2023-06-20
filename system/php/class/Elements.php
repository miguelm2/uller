<?php
class Elements
{
    public static function crearBotonVer($link,$valor){
        return '<a href="'.$link.'?'.$link.'=' . $valor . '" class="btn btn-info rounded-circle btn-sm"><i class="bi bi-info-circle"></i></a>';
    }

    public static function crearBotonVerTwoLink($link1,$valor1,$link2,$valor2){
        return '<a href="'.$link1.'?'.$link1.'=' . $valor1 . '&'.$link2.'='.$valor2.'" class="btn btn-info rounded-circle btn-sm"><i class="bi bi-info-circle"></i></a>';
    }

    public static function crearBotonEliminar($link,$link2,$valor){
        return '<a href="'.$link.'?'.$link2.'=' . $valor . '" class="btn btn-danger rounded-circle btn-sm"><i class="bi bi-trash-fill"></i></a>';
    }

    public static function crearBotonEditarJs($id){
        return '<button class="btn btn-info rounded-circle btn-sm btn-editar" value="'.$id.'"><i class="bi bi-info-circle"></i></button>';
    }

    public static function crearBotonEliminarJs($id){
        return '<button class="btn btn-danger rounded-circle btn-sm btn-eliminar" value="'.$id.'"><i class="bi bi-trash-fill"></i></button>';
    }

    public static function crearBotonEliminarByTablaJs($tabla, $campo, $id){
        return '<button class="btn btn-danger rounded-circle btn-sm btn-eliminar" value="'.$tabla.'-'.$campo.'-'.$id.'"><i class="bi bi-trash-fill"></i></button>';
    }

    public static function getAlertaRedireccionJs($mensaje, $tipo_mensaje, $link, $valor){
        return '<script>
                    swal("' . $mensaje . '", "", "'.$tipo_mensaje.'");
                    setTimeout(function(){
                        window.location="'.$link.'?'.$link.'=' . $valor . '"
                    }, 1000);
                </script>';
    }

    public static function getAlertaRedireccionNotValueJs($mensaje, $tipo_mensaje, $link){
        return '<script>
                    swal("' . $mensaje . '", "", "'.$tipo_mensaje.'");
                    setTimeout(function(){
                        window.location="'.$link.'"
                    }, 1000);
                </script>';
    }
}
?>