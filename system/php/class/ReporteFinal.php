<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/model/ReporteFinalDTO.php';

class ReporteFinal extends System
{
    public static function newReporteFinal(
        $id_ticket,$fecha_servicio,
        $mantenimiento_preventivo,$equipo_opera_inicio,$limpieza_general,$limpieza_filtros,
        $limpieza_serpentin,$limpieza_bandeja,$serpentin_condensador,$limpieza_drenaje,$verificacion,
        $estado_carcasa,$estado_equipo,$equipo_opera_fin,$mantenimiento_correctivo,$falla_encontrada,
        $repuestos,$insumos,$tarjetas_electronicas,$estimado_horas,$observaciones,$fecha_registro
    )
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("INSERT INTO ReporteFinalTicket (id_ticket,fecha_servicio,
                                                        mantenimiento_preventivo,equipo_opera_inicio,limpieza_general,limpieza_filtros,
                                                        limpieza_serpentin,limpieza_bandeja,serpentin_condensador,limpieza_drenaje,verificacion,
                                                        estado_carcasa,estado_equipo,equipo_opera_fin,mantenimiento_correctivo,falla_encontrada,
                                                        repuestos,insumos,tarjetas_electronicas,estimado_horas,observaciones,fecha_registro) 
                                VALUES (:id_ticket,:fecha_servicio,
                                        :mantenimiento_preventivo,:equipo_opera_inicio,:limpieza_general,:limpieza_filtros,
                                        :limpieza_serpentin,:limpieza_bandeja,:serpentin_condensador,:limpieza_drenaje,:verificacion,
                                        :estado_carcasa,:estado_equipo,:equipo_opera_fin,:mantenimiento_correctivo,:falla_encontrada,
                                        :repuestos,:insumos,:tarjetas_electronicas,:estimado_horas,:observaciones,:fecha_registro)");

        $stmt->bindParam(':id_ticket', $id_ticket);
        $stmt->bindParam(':fecha_servicio', $fecha_servicio);
        $stmt->bindParam(':mantenimiento_preventivo', $mantenimiento_preventivo);
        $stmt->bindParam(':equipo_opera_inicio', $equipo_opera_inicio);
        $stmt->bindParam(':limpieza_general', $limpieza_general);
        $stmt->bindParam(':limpieza_filtros', $limpieza_filtros);
        $stmt->bindParam(':limpieza_serpentin', $limpieza_serpentin);
        $stmt->bindParam(':limpieza_bandeja', $limpieza_bandeja);
        $stmt->bindParam(':serpentin_condensador', $serpentin_condensador);
        $stmt->bindParam(':limpieza_drenaje', $limpieza_drenaje);
        $stmt->bindParam(':verificacion', $verificacion);
        $stmt->bindParam(':estado_carcasa', $estado_carcasa);
        $stmt->bindParam(':estado_equipo', $estado_equipo);
        $stmt->bindParam(':equipo_opera_fin', $equipo_opera_fin);
        $stmt->bindParam(':mantenimiento_correctivo', $mantenimiento_correctivo);
        $stmt->bindParam(':falla_encontrada', $falla_encontrada);
        $stmt->bindParam(':repuestos', $repuestos);
        $stmt->bindParam(':insumos', $insumos);
        $stmt->bindParam(':tarjetas_electronicas', $tarjetas_electronicas);
        $stmt->bindParam(':estimado_horas', $estimado_horas);
        $stmt->bindParam(':observaciones', $observaciones);
        $stmt->bindParam(':fecha_registro', $fecha_registro);

        return  $stmt->execute();
    }

    public static function setReporteFinal(
        $id_reporte_final,$fecha_servicio,
        $mantenimiento_preventivo,$equipo_opera_inicio,$limpieza_general,$limpieza_filtros,
        $limpieza_serpentin,$limpieza_bandeja,$serpentin_condensador,$limpieza_drenaje,$verificacion,
        $estado_carcasa,$estado_equipo,$equipo_opera_fin,$mantenimiento_correctivo,$falla_encontrada,
        $repuestos,$insumos,$tarjetas_electronicas,$estimado_horas,$observaciones
    )
    {
        $dbh  = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE ReporteFinalTicket SET fecha_servicio = :fecha_servicio,
                                                                mantenimiento_preventivo = :mantenimiento_preventivo, equipo_opera_inicio = :equipo_opera_inicio, limpieza_general = :limpieza_general, limpieza_filtros = :limpieza_filtros,
                                                                limpieza_serpentin = :limpieza_serpentin, limpieza_bandeja = :limpieza_bandeja, serpentin_condensador = :serpentin_condensador, limpieza_drenaje = :limpieza_drenaje, verificacion = :verificacion,
                                                                estado_carcasa = :estado_carcasa, estado_equipo = :estado_equipo, equipo_opera_fin = :equipo_opera_fin, mantenimiento_correctivo = :mantenimiento_correctivo, falla_encontrada = :falla_encontrada,
                                                                repuestos = :repuestos, insumos = :insumos, tarjetas_electronicas = :tarjetas_electronicas, estimado_horas = :estimado_horas, observaciones = :observaciones
                                                        WHERE id_reporte_final = :id_reporte_final");

        $stmt->bindParam(':id_reporte_final', $id_reporte_final);
        $stmt->bindParam(':fecha_servicio', $fecha_servicio);
        $stmt->bindParam(':mantenimiento_preventivo', $mantenimiento_preventivo);
        $stmt->bindParam(':equipo_opera_inicio', $equipo_opera_inicio);
        $stmt->bindParam(':limpieza_general', $limpieza_general);
        $stmt->bindParam(':limpieza_filtros', $limpieza_filtros);
        $stmt->bindParam(':limpieza_serpentin', $limpieza_serpentin);
        $stmt->bindParam(':limpieza_bandeja', $limpieza_bandeja);
        $stmt->bindParam(':serpentin_condensador', $serpentin_condensador);
        $stmt->bindParam(':limpieza_drenaje', $limpieza_drenaje);
        $stmt->bindParam(':verificacion', $verificacion);
        $stmt->bindParam(':estado_carcasa', $estado_carcasa);
        $stmt->bindParam(':estado_equipo', $estado_equipo);
        $stmt->bindParam(':equipo_opera_fin', $equipo_opera_fin);
        $stmt->bindParam(':mantenimiento_correctivo', $mantenimiento_correctivo);
        $stmt->bindParam(':falla_encontrada', $falla_encontrada);
        $stmt->bindParam(':repuestos', $repuestos);
        $stmt->bindParam(':insumos', $insumos);
        $stmt->bindParam(':tarjetas_electronicas', $tarjetas_electronicas);
        $stmt->bindParam(':estimado_horas', $estimado_horas);
        $stmt->bindParam(':observaciones', $observaciones);

        return  $stmt->execute();
    }

    public static function setFirmaReporteFinal($id_reporte_final, $firma)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("UPDATE ReporteFinalTicket SET firma = :firma WHERE id_reporte_final = :id_reporte_final");
        $stmt->bindParam(':id_reporte_final', $id_reporte_final);
        $stmt->bindParam(':firma', $firma);
        return  $stmt->execute();
    }

    public static function getReporteFinalById($id_reporte_final)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM ReporteFinalTicket WHERE id_reporte_final = :id_reporte_final");
        $stmt->bindParam(':id_reporte_final', $id_reporte_final);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'ReporteFinalDTO');
        $stmt->execute();

        return $stmt->fetch();
    }

    public static function getReporteFinalByTicket($id_ticket)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT * FROM ReporteFinalTicket WHERE id_ticket = :id_ticket");
        $stmt->bindParam(':id_ticket', $id_ticket);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'ReporteFinalDTO');
        $stmt->execute();

        return $stmt->fetch();
    }

    public static function getIdLastReporteFinal()
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT id_reporte_final AS id FROM ReporteFinalTicket ORDER BY id_reporte_final DESC LIMIT 1");
        $stmt->execute();
        $result =  $stmt->fetch();

        return $result['id'];
    }

    public static function deleteReporteFinalByTicket($id_ticket)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("DELETE FROM ReporteFinalTicket WHERE id_ticket = :id_ticket");
        $stmt->bindParam(':id_ticket', $id_ticket);
        return  $stmt->execute();
    }

    public static function getFirmaByReporteFinal($id_reporte_final)
    {
        $dbh             = parent::Conexion();
        $stmt = $dbh->prepare("SELECT firma AS firma FROM ReporteFinalTicket WHERE id_reporte_final = :id_reporte_final");
        $stmt->bindParam(':id_reporte_final', $id_reporte_final);
        $stmt->execute();
        $result =  $stmt->fetch();

        return $result['firma'];
    }
}
?>