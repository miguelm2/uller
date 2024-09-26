
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Ticket.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/TipoEquipo.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/TipoServicio.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/TecnicoTicket.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Herramienta.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Material.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/HerramientaDiagnostico.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/MaterialDiagnostico.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Diagnostico.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/Equipo.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/class/ReporteFinalSolicitud.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/report/ReportInformeFinalSolicitud.php';

class ServiceReportFinalRequest extends System
{
   public static function newInformTicket(
      $id_servicio,
      $id_equipo,
      $fecha_servicio,
      $ubicacion,
      $otra_ubicacion,
      $tipo_uso,
      $presion_alta,
      $presion_baja,
      $presion_reposo,
      $equipo_opera_inicio,
      $temperatura_salida,
      $temperatura_entrada,
      $temperatura_ret,
      $temperatura_sum,
      $voltaje,
      $amperaje,
      $fases,
      $estado_equipo,
      $comentario_estado_equipo,
      $limpieza_general,
      $limpieza_filtros,
      $limpieza_serpentin,
      $limpieza_bandeja,
      $serpentin_condensador,
      $limpieza_drenaje,
      $verificacion,
      $estado_carcasa_interior,
      $estado_equipo_exterior,
      $equipo_opera_fin,
      $diagnostico_mant_corr,
      $observaciones,
      $prox_servicio
   ) {
      try {
         $id_servicio                = parent::limpiarString($id_servicio);
         $id_equipo                  = parent::limpiarString($id_equipo);
         $fecha_servicio             = parent::limpiarString($fecha_servicio);
         $ubicacion                  = parent::limpiarString($ubicacion);
         $otra_ubicacion             = parent::limpiarString($otra_ubicacion);
         $tipo_uso                   = parent::limpiarString($tipo_uso);
         $presion_alta               = parent::limpiarString($presion_alta);
         $presion_baja               = parent::limpiarString($presion_baja);
         $presion_reposo             = parent::limpiarString($presion_reposo);
         $temperatura_salida         = parent::limpiarString($temperatura_salida);
         $temperatura_entrada        = parent::limpiarString($temperatura_entrada);
         $temperatura_ret            = parent::limpiarString($temperatura_ret);
         $temperatura_sum            = parent::limpiarString($temperatura_sum);
         $voltaje                    = parent::limpiarString($voltaje);
         $fases                      = parent::limpiarString($fases);
         $amperaje                   = parent::limpiarString($amperaje);
         $amperaje                   = parent::limpiarString($amperaje);
         $estado_equipo              = parent::limpiarString($estado_equipo);
         $comentario_estado_equipo   = parent::limpiarString($comentario_estado_equipo);
         $equipo_opera_inicio        = parent::limpiarString($equipo_opera_inicio);
         $limpieza_general           = parent::limpiarString($limpieza_general);
         $limpieza_filtros           = parent::limpiarString($limpieza_filtros);
         $limpieza_serpentin         = parent::limpiarString($limpieza_serpentin);
         $limpieza_bandeja           = parent::limpiarString($limpieza_bandeja);
         $serpentin_condensador      = parent::limpiarString($serpentin_condensador);
         $limpieza_drenaje           = parent::limpiarString($limpieza_drenaje);
         $verificacion               = parent::limpiarString($verificacion);
         $estado_carcasa_interior    = parent::limpiarString($estado_carcasa_interior);
         $estado_equipo_exterior     = parent::limpiarString($estado_equipo_exterior);
         $equipo_opera_fin           = parent::limpiarString($equipo_opera_fin);
         $diagnostico_mant_corr      = parent::limpiarString($diagnostico_mant_corr);
         $observaciones              = parent::limpiarString($observaciones);
         $prox_servicio              = parent::limpiarString($prox_servicio);
         $fecha_registro = date('Y-m-d H:i:s');

         $evidencia_antes_interior     = self::validateImageMaintenance("evidencia_antes_interior",  "antes_interior", Path::$DIR_IMAGE_MANTEINCE);
         $evidencia_antes_exterior     = self::validateImageMaintenance("evidencia_antes_exterior",  "antes_exterior", Path::$DIR_IMAGE_MANTEINCE);
         $evidencia_despues_interior   = self::validateImageMaintenance("evidencia_despues_interior",  "despues_interior", Path::$DIR_IMAGE_MANTEINCE);
         $evidencia_despues_exterior   = self::validateImageMaintenance("evidencia_despues_exterior",  "despues_exterior", Path::$DIR_IMAGE_MANTEINCE);

         $reporteDTO = ReporteFinalSolicitud::getReportFinalRequestByServiceAndEquipment($id_equipo, $id_servicio);
         if (!$reporteDTO) {
            $modelResponse = ReporteFinalSolicitud::newReportFinalRequest(
               $id_servicio,
               $id_equipo,
               $fecha_servicio,
               $ubicacion,
               $otra_ubicacion,
               $tipo_uso,
               $presion_alta,
               $presion_baja,
               $presion_reposo,
               $equipo_opera_inicio,
               $temperatura_salida,
               $temperatura_entrada,
               $temperatura_ret,
               $temperatura_sum,
               $voltaje,
               $amperaje,
               $fases,
               $estado_equipo,
               $comentario_estado_equipo,
               $limpieza_general,
               $limpieza_filtros,
               $limpieza_serpentin,
               $limpieza_bandeja,
               $serpentin_condensador,
               $limpieza_drenaje,
               $verificacion,
               $estado_carcasa_interior,
               $estado_equipo_exterior,
               $equipo_opera_fin,
               $diagnostico_mant_corr,
               $observaciones,
               $prox_servicio,
               $evidencia_antes_interior,
               $evidencia_antes_exterior,
               $evidencia_despues_interior,
               $evidencia_despues_exterior,
               $fecha_registro
            );

            if ($modelResponse) {
               $lastReport = ReporteFinalSolicitud::getIdLastReportFinalRequest();
               header('Location:add_signature?report=' . $lastReport . '&new');
            }
         } else {
            return self::setInformTicket(
               $reporteDTO->getId_reporte_final(),
               $fecha_servicio,
               $ubicacion,
               $otra_ubicacion,
               $tipo_uso,
               $presion_alta,
               $presion_baja,
               $presion_reposo,
               $equipo_opera_inicio,
               $temperatura_salida,
               $temperatura_entrada,
               $temperatura_ret,
               $temperatura_sum,
               $voltaje,
               $amperaje,
               $fases,
               $estado_equipo,
               $comentario_estado_equipo,
               $limpieza_general,
               $limpieza_filtros,
               $limpieza_serpentin,
               $limpieza_bandeja,
               $serpentin_condensador,
               $limpieza_drenaje,
               $verificacion,
               $estado_carcasa_interior,
               $estado_equipo_exterior,
               $equipo_opera_fin,
               $diagnostico_mant_corr,
               $observaciones,
               $prox_servicio
            );
         }
      } catch (\Exception $e) {
         throw new Exception($e->getMessage());
      }
   }
   private static function validateImageMaintenance($nombreFile, $tipo, $ruta)
   {
      $source         = $_FILES[$nombreFile]['tmp_name'];
      $filename       = $_FILES[$nombreFile]['name'];
      $fileSize       = $_FILES[$nombreFile]['size'];
      $imagen = '';

      if ($fileSize > 100 && $filename != '') {
         $dirImagen = $_SERVER['DOCUMENT_ROOT'] . $ruta;

         if (!file_exists($dirImagen)) mkdir($dirImagen, 0777, true);

         $dir         = opendir($dirImagen); //Abrimos el directorio de destino
         $trozo1      = explode(".", $filename);
         $imagen      = $tipo . '_'  . date('Y-m-d') . '_' . rand() . '.' . end($trozo1);
         $target_path = $dirImagen . $imagen; //Indicamos la ruta de destino, así como el nombre del archivo
         move_uploaded_file($source, $target_path);
         closedir($dir);
      }

      return $imagen;
   }


   public static function setInformTicket(
      $id_reporte_final,
      $fecha_servicio,
      $ubicacion,
      $otra_ubicacion,
      $tipo_uso,
      $presion_alta,
      $presion_baja,
      $presion_reposo,
      $equipo_opera_inicio,
      $temperatura_salida,
      $temperatura_entrada,
      $temperatura_ret,
      $temperatura_sum,
      $voltaje,
      $amperaje,
      $fases,
      $estado_equipo,
      $comentario_estado_equipo,
      $limpieza_general,
      $limpieza_filtros,
      $limpieza_serpentin,
      $limpieza_bandeja,
      $serpentin_condensador,
      $limpieza_drenaje,
      $verificacion,
      $estado_carcasa_interior,
      $estado_equipo_exterior,
      $equipo_opera_fin,
      $diagnostico_mant_corr,
      $observaciones,
      $prox_servicio
   ) {
      $id_reporte_final           = parent::limpiarString($id_reporte_final);
      $fecha_servicio             = parent::limpiarString($fecha_servicio);
      $ubicacion                  = parent::limpiarString($ubicacion);
      $otra_ubicacion             = parent::limpiarString($otra_ubicacion);
      $tipo_uso                   = parent::limpiarString($tipo_uso);
      $presion_alta               = parent::limpiarString($presion_alta);
      $presion_baja               = parent::limpiarString($presion_baja);
      $presion_reposo             = parent::limpiarString($presion_reposo);
      $temperatura_salida         = parent::limpiarString($temperatura_salida);
      $temperatura_entrada        = parent::limpiarString($temperatura_entrada);
      $temperatura_ret            = parent::limpiarString($temperatura_ret);
      $temperatura_sum            = parent::limpiarString($temperatura_sum);
      $voltaje                    = parent::limpiarString($voltaje);
      $fases                      = parent::limpiarString($fases);
      $amperaje                   = parent::limpiarString($amperaje);
      $amperaje                   = parent::limpiarString($amperaje);
      $estado_equipo              = parent::limpiarString($estado_equipo);
      $comentario_estado_equipo   = parent::limpiarString($comentario_estado_equipo);
      $equipo_opera_inicio        = parent::limpiarString($equipo_opera_inicio);
      $limpieza_general           = parent::limpiarString($limpieza_general);
      $limpieza_filtros           = parent::limpiarString($limpieza_filtros);
      $limpieza_serpentin         = parent::limpiarString($limpieza_serpentin);
      $limpieza_bandeja           = parent::limpiarString($limpieza_bandeja);
      $serpentin_condensador      = parent::limpiarString($serpentin_condensador);
      $limpieza_drenaje           = parent::limpiarString($limpieza_drenaje);
      $verificacion               = parent::limpiarString($verificacion);
      $estado_carcasa_interior    = parent::limpiarString($estado_carcasa_interior);
      $estado_equipo_exterior     = parent::limpiarString($estado_equipo_exterior);
      $equipo_opera_fin           = parent::limpiarString($equipo_opera_fin);
      $diagnostico_mant_corr      = parent::limpiarString($diagnostico_mant_corr);
      $observaciones              = parent::limpiarString($observaciones);
      $prox_servicio              = parent::limpiarString($prox_servicio);

      try {
         $modelResponse = ReporteFinalSolicitud::setReportFinalRequest(
            $id_reporte_final,
            $fecha_servicio,
            $ubicacion,
            $otra_ubicacion,
            $tipo_uso,
            $presion_alta,
            $presion_baja,
            $presion_reposo,
            $equipo_opera_inicio,
            $temperatura_salida,
            $temperatura_entrada,
            $temperatura_ret,
            $temperatura_sum,
            $voltaje,
            $amperaje,
            $fases,
            $estado_equipo,
            $comentario_estado_equipo,
            $limpieza_general,
            $limpieza_filtros,
            $limpieza_serpentin,
            $limpieza_bandeja,
            $serpentin_condensador,
            $limpieza_drenaje,
            $verificacion,
            $estado_carcasa_interior,
            $estado_equipo_exterior,
            $equipo_opera_fin,
            $diagnostico_mant_corr,
            $observaciones,
            $prox_servicio
         );

         if ($modelResponse) {
            $lastReport = ReporteFinalSolicitud::getIdLastReportFinalRequest();
            header('Location:add_signature?report=' . $lastReport . '&new');
         }
      } catch (\Exception $e) {
         throw new Exception($e->getMessage());
      }
   }
   public static function addFirmaReport($id_reporte_final, $firma)
   {
      try {
         $id_reporte_final = parent::limpiarString($id_reporte_final);
         $firma            = parent::limpiarString($firma);
         $modelResponse = ReporteFinalSolicitud::setFirmaReportFinalRequest($id_reporte_final, $firma);
         if ($modelResponse) {
            header('Location:pdf_inform?pdf_inform=' . $id_reporte_final);
         };
      } catch (\Exception $e) {
         throw new Exception($e->getMessage());
      }
   }
   public static function getPdfInform($id_reporte_final)
   {
      try {
         $id_reporte_final = parent::limpiarString($id_reporte_final);

         $perfilDTO        = Informacion::getInformacion();
         $reporteFinalDTO  = ReporteFinalSolicitud::getReportFinalRequest($id_reporte_final);
         $servicioDTO      = Servicio::getService($reporteFinalDTO->getId_servicio());
         $tecnicoDTO       = $servicioDTO->getSolicitudDTO()->getTecnicoDTO();
         $solicitudDTO     = $servicioDTO->getSolicitudDTO();
         $equipoDTO        = Equipo::getEquipmet($reporteFinalDTO->getId_equipo());
         Solicitud::setEstateRequest($servicioDTO->getSolicitudDTO()->getId_solicitud(), 4);
         ReportInformeFinalSolicitud::generatePdf(
            $perfilDTO,
            $reporteFinalDTO,
            $solicitudDTO,
            $tecnicoDTO,
            $servicioDTO,
            $equipoDTO
         );
      } catch (\Exception $e) {
         throw new Exception($e->getMessage());
      }
   }
}
