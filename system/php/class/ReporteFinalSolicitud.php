<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/ReporteFinalSolicitudDTO.php';

class ReporteFinalSolicitud extends System
{
    public static function newReportFinalRequest(
        $id_servicio,
        $id_equipo,
        $fecha_servicio,
        $ubicacion,
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
        $fecha_registro
    ) {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO ReporteFinalSolicitud (id_servicio, id_equipo, fecha_servicio, ubicacion, tipo_uso,
                            presion_alta, presion_baja, presion_reposo, temperatura_salida, temperatura_entrada, temperatura_ret,
                            temperatura_sum, voltaje, amperaje, fases, estado_equipo, comentario_estado_equipo,
                            equipo_opera_inicio, limpieza_general, limpieza_filtros,
                            limpieza_serpentin, limpieza_bandeja, serpentin_condensador, limpieza_drenaje, verificacion,
                            estado_carcasa_interior, estado_equipo_exterior, equipo_opera_fin, 
                            diagnostico_mant_corr, prox_servicio, observaciones, fecha_registro) 
                            VALUES (:id_servicio, :id_equipo, :fecha_servicio, :ubicacion, :tipo_uso, :presion_alta, :presion_baja,
                                    :presion_reposo, :temperatura_salida, :temperatura_entrada, :temperatura_ret, :temperatura_sum,
                                    :voltaje, :amperaje, :fases, :estado_equipo, :comentario_estado_equipo,
                                    :equipo_opera_inicio, :limpieza_general, :limpieza_filtros,
                                    :limpieza_serpentin, :limpieza_bandeja, :serpentin_condensador, :limpieza_drenaje, :verificacion,
                                    :estado_carcasa_interior, :estado_equipo_exterior, :equipo_opera_fin, 
                                    :diagnostico_mant_corr, :observaciones, :prox_servicio, :fecha_registro)");

        $stmt->bindParam(':id_servicio', $id_servicio);
        $stmt->bindParam(':id_equipo', $id_equipo);
        $stmt->bindParam(':fecha_servicio', $fecha_servicio);
        $stmt->bindParam(':ubicacion', $ubicacion);
        $stmt->bindParam(':tipo_uso', $tipo_uso);
        $stmt->bindParam(':presion_alta', $presion_alta);
        $stmt->bindParam(':presion_baja', $presion_baja);
        $stmt->bindParam(':presion_reposo', $presion_reposo);
        $stmt->bindParam(':temperatura_salida', $temperatura_salida);
        $stmt->bindParam(':temperatura_entrada', $temperatura_entrada);
        $stmt->bindParam(':temperatura_ret', $temperatura_ret);
        $stmt->bindParam(':temperatura_sum', $temperatura_sum);
        $stmt->bindParam(':voltaje', $voltaje);
        $stmt->bindParam(':amperaje', $amperaje);
        $stmt->bindParam(':fases', $fases);
        $stmt->bindParam(':estado_equipo', $estado_equipo);
        $stmt->bindParam(':comentario_estado_equipo', $comentario_estado_equipo);
        $stmt->bindParam(':equipo_opera_inicio', $equipo_opera_inicio);
        $stmt->bindParam(':limpieza_general', $limpieza_general);
        $stmt->bindParam(':limpieza_filtros', $limpieza_filtros);
        $stmt->bindParam(':limpieza_serpentin', $limpieza_serpentin);
        $stmt->bindParam(':limpieza_bandeja', $limpieza_bandeja);
        $stmt->bindParam(':serpentin_condensador', $serpentin_condensador);
        $stmt->bindParam(':limpieza_drenaje', $limpieza_drenaje);
        $stmt->bindParam(':verificacion', $verificacion);
        $stmt->bindParam(':estado_carcasa_interior', $estado_carcasa_interior);
        $stmt->bindParam(':estado_equipo_exterior', $estado_equipo_exterior);
        $stmt->bindParam(':equipo_opera_fin', $equipo_opera_fin);
        $stmt->bindParam(':diagnostico_mant_corr', $diagnostico_mant_corr);
        $stmt->bindParam(':observaciones', $observaciones);
        $stmt->bindParam(':prox_servicio', $prox_servicio);
        $stmt->bindParam(':fecha_registro', $fecha_registro);

        return  $stmt->execute();
    }

    public static function setReportFinalRequest(
        $id_reporte_final,
        $fecha_servicio,
        $ubicacion,
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
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE ReporteFinalSolicitud
                            SET fecha_servicio = :fecha_servicio, ubicacion = :ubicacion, tipo_uso = :tipo_uso, presion_alta = :presion_alta,
                                presion_baja = :presion_baja, presion_reposo = :presion_reposo, temperatura_salida = :temperatura_salida,
                                temperatura_entrada = :temperatura_entrada, temperatura_ret = :temperatura_ret, temperatura_sum = :temperatura_sum,
                                voltaje = :voltaje, amperaje = :amperaje, fases = :fases, estado_equipo = :estado_equipo,
                                comentario_estado_equipo = :comentario_estado_equipo, equipo_opera_inicio = :equipo_opera_inicio, 
                                limpieza_general = :limpieza_general, limpieza_filtros = :limpieza_filtros, limpieza_serpentin = :limpieza_serpentin, 
                                limpieza_bandeja = :limpieza_bandeja, serpentin_condensador = :serpentin_condensador, limpieza_drenaje = :limpieza_drenaje, 
                                verificacion = :verificacion, estado_carcasa_interior = :estado_carcasa_interior, estado_equipo_exterior = :estado_equipo_exterior, 
                                equipo_opera_fin = :equipo_opera_fin, diagnostico_mant_corr = :diagnostico_mant_corr, observaciones = :observaciones,
                                prox_servicio = :prox_servicio
                            WHERE id_reporte_final = :id_reporte_final");
        $stmt->bindParam(':id_reporte_final', $id_reporte_final);
        $stmt->bindParam(':fecha_servicio', $fecha_servicio);
        $stmt->bindParam(':ubicacion', $ubicacion);
        $stmt->bindParam(':tipo_uso', $tipo_uso);
        $stmt->bindParam(':presion_alta', $presion_alta);
        $stmt->bindParam(':presion_baja', $presion_baja);
        $stmt->bindParam(':presion_reposo', $presion_reposo);
        $stmt->bindParam(':temperatura_salida', $temperatura_salida);
        $stmt->bindParam(':temperatura_entrada', $temperatura_entrada);
        $stmt->bindParam(':temperatura_ret', $temperatura_ret);
        $stmt->bindParam(':temperatura_sum', $temperatura_sum);
        $stmt->bindParam(':voltaje', $voltaje);
        $stmt->bindParam(':amperaje', $amperaje);
        $stmt->bindParam(':fases', $fases);
        $stmt->bindParam(':estado_equipo', $estado_equipo);
        $stmt->bindParam(':comentario_estado_equipo', $comentario_estado_equipo);
        $stmt->bindParam(':equipo_opera_inicio', $equipo_opera_inicio);
        $stmt->bindParam(':limpieza_general', $limpieza_general);
        $stmt->bindParam(':limpieza_filtros', $limpieza_filtros);
        $stmt->bindParam(':limpieza_serpentin', $limpieza_serpentin);
        $stmt->bindParam(':limpieza_bandeja', $limpieza_bandeja);
        $stmt->bindParam(':serpentin_condensador', $serpentin_condensador);
        $stmt->bindParam(':limpieza_drenaje', $limpieza_drenaje);
        $stmt->bindParam(':verificacion', $verificacion);
        $stmt->bindParam(':estado_carcasa_interior', $estado_carcasa_interior);
        $stmt->bindParam(':estado_equipo_exterior', $estado_equipo_exterior);
        $stmt->bindParam(':equipo_opera_fin', $equipo_opera_fin);
        $stmt->bindParam(':diagnostico_mant_corr', $diagnostico_mant_corr);
        $stmt->bindParam(':observaciones', $observaciones);
        $stmt->bindParam(':prox_servicio', $prox_servicio);

        return  $stmt->execute();
    }

    public static function setFirmaReportFinalRequest($id_reporte_final, $firma)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE ReporteFinalSolicitud SET firma = :firma WHERE id_reporte_final = :id_reporte_final");
        $stmt->bindParam(':id_reporte_final', $id_reporte_final);
        $stmt->bindParam(':firma', $firma);
        return  $stmt->execute();
    }

    public static function getReportFinalRequestByService($id_servicio)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM ReporteFinalSolicitud WHERE id_servicio = :id_servicio");
        $stmt->bindParam(':id_servicio', $id_servicio);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'ReporteFinalSolicitudDTO');
        $stmt->execute();

        return $stmt->fetch();
    }

    public static function getReporteFinalByTicketJS($id_tipo, $id_ticket)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM ReporteFinalSolicitud WHERE id_tipo = :id_tipo AND id_ticket = :id_ticket");
        $stmt->bindParam(':id_tipo', $id_tipo);
        $stmt->bindParam(':id_ticket', $id_ticket);
        $stmt->execute();

        return $stmt->fetch();
    }

    public static function getReportFinalRequestByServiceAndEquipment($id_equipo, $id_servicio)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM ReporteFinalSolicitud WHERE id_equipo = :id_equipo AND id_servicio = :id_servicio");
        $stmt->bindParam(':id_equipo', $id_equipo);
        $stmt->bindParam(':id_servicio', $id_servicio);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'ReporteFinalSolicitudDTO');
        $stmt->execute();

        return $stmt->fetch();
    }

    public static function getIdLastReportFinalRequest()
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT id_reporte_final AS id FROM ReporteFinalSolicitud ORDER BY id_reporte_final DESC LIMIT 1");
        $stmt->execute();
        $result =  $stmt->fetch();

        return $result['id'];
    }

    public static function getCountReportFinalRequestByService($id_solicitud)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT COUNT(id_reporte_final) AS total FROM ReporteFinalSolicitud WHERE id_solicitud = :id_solicitud");
        $stmt->bindParam(':id_solicitud', $id_solicitud);
        $stmt->execute();
        $result =  $stmt->fetch();

        return $result['total'];
    }

    public static function deleteReportFinalRequestByService($id_solicitud)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("DELETE FROM ReporteFinalSolicitud WHERE id_solicitud = :id_solicitud");
        $stmt->bindParam(':id_solicitud', $id_solicitud);
        return  $stmt->execute();
    }

    public static function getSignatureByReportFinalRequest($id_reporte_final)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT firma AS firma FROM ReporteFinalSolicitud WHERE id_reporte_final = :id_reporte_final");
        $stmt->bindParam(':id_reporte_final', $id_reporte_final);
        $stmt->execute();
        $result =  $stmt->fetch();

        return $result['firma'];
    }
    public static function getReportFinalRequest($id_reporte_final)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM ReporteFinalSolicitud WHERE id_reporte_final = :id_reporte_final");
        $stmt->bindParam(':id_reporte_final', $id_reporte_final);
        $stmt->execute();
        $result =  $stmt->fetch();

        return $result['firma'];
    }
}
