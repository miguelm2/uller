<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Informacion.php';

class ServiceInformation extends System
{
    public static function setInformation($nombre, $nit, $direccion, $ciudad, $departamento, $correo, $telefono, $whatsapp, $facebook, $instagram, $color)
    {
        $nombre     = parent::limpiarString($nombre);
        $nit        = parent::limpiarString($nit);
        $direccion  = parent::limpiarString($direccion);
        $ciudad     = parent::limpiarString($ciudad);
        $departamento = parent::limpiarString($departamento);
        $correo     = parent::limpiarString($correo);
        $telefono   = parent::limpiarString($telefono);
        $whatsapp   = parent::limpiarString($whatsapp);
        $facebook   = parent::limpiarString($facebook);
        $instagram  = parent::limpiarString($instagram);
        $color      = parent::limpiarString($color);
        $imagen = "";

        $source         = $_FILES['logo']['tmp_name'];
        $filename       = $_FILES['logo']['name'];
        $fileSize       = $_FILES['logo']['size'];

        if ($fileSize > 100 & $filename != '') {
            if (!file_exists(self::getDirectorioImagenesPerfil())) mkdir(self::getDirectorioImagenesPerfil(), 0777, true);

            $informacion = Informacion::getInformacion();
            unlink(self::getDirectorioImagenesPerfil() . $informacion->getImagen());

            $dir            = opendir(self::getDirectorioImagenesPerfil()); //Abrimos el directorio de destino
            $trozo1         = explode(".", $filename);
            $imagen = 'perfil_' . ($informacion->getId_perfil()) . '_' . rand() . '.' . end($trozo1);
            $target_path    = self::getDirectorioImagenesPerfil() . '/' . $imagen; //Indicamos la ruta de destino, así como el nombre del archivo
            move_uploaded_file($source, $target_path);
            closedir($dir);
        }

        $result = Informacion::setInformacion($nombre, $nit, $direccion, $ciudad, $departamento, $correo, $telefono, $whatsapp, $facebook, $instagram, $color, $imagen);
        if ($result) return  '<script>swal("' . Constants::$INFORMATION_NEW . '", "", "success");</script>';
    }

    public static function getInformation()
    {
        try {
            $result = Informacion::getInformacion();
            return $result;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    private static function getDirectorioImagenesPerfil(){
        return $_SERVER['DOCUMENT_ROOT'] . '/system/img/perfil/';
    }
}
