<?php
class Elements
{
    public static function crearBotonVer($link,$valor){
        return '<a href="'.$link.'?'.$link.'=' . $valor . '" class="btn btn-info rounded-circle btn-sm"><i class="bi bi-info-circle"></i></a>';
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
}
?>