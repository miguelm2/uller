$('.btn-editar').click(function () {
    var id_tipo = $(this).val();
    $('#id_tipo').val(id_tipo);
    let params = new URLSearchParams(location.search);
    var ticket = params.get('ticket');

    getDataTipoEquipo(id_tipo, ticket);
    $('#modalEditarRegistro').modal('show');

});

function getDataTipoEquipo(id_tipo, ticket) {
    $.post("/system/php/routing/Admin.php", {
        "getDataReportServiceEquipo": true,
        "id_tipo": id_tipo,
        "ticket": ticket,
    }).done(function (data) {
        if (data != 'false') {
            var resultado = JSON.parse(data);
            printViewData(resultado);
        } else {
            printViewData('');
            $('#equipo_opera_inicio').prop('checked', false);
            $('#limpieza_filtros').prop('checked', false);
            $('#limpieza_serpentin').prop('checked', false);
            $('#limpieza_bandeja').prop('checked', false);
            $('#serpentin_condensador').prop('checked', false);
            $('#limpieza_drenaje').prop('checked', false);
            $('#verificacion').prop('checked', false);
            $('#estado_carcasa').prop('checked', false);
            $('#estado_equipo').prop('checked', false);
            $('#equipo_opera_fin').prop('checked', false);
        }
    });
}

function printViewData(resultado) {
    $('#fecha_servicio').val(resultado[3]);
    
    validatePreventivos(parseInt(resultado[4]));
    $('#mantenimiento_preventivo').val(resultado[4]);

    if (resultado[6] == 1) $('#equipo_opera_inicio').prop('checked', true);
    if (resultado[7] == 1) $('#limpieza_filtros').prop('checked', true);
    if (resultado[8] == 1) $('#limpieza_serpentin').prop('checked', true);
    if (resultado[9] == 1) $('#limpieza_bandeja').prop('checked', true);
    if (resultado[10] == 1) $('#serpentin_condensador').prop('checked', true);
    if (resultado[11] == 1) $('#limpieza_drenaje').prop('checked', true);
    if (resultado[12] == 1) $('#verificacion').prop('checked', true);
    if (resultado[13] == 1) $('#estado_carcasa').prop('checked', true);
    if (resultado[14] == 1) $('#estado_equipo').prop('checked', true);
    if (resultado[15] == 1) $('#equipo_opera_fin').prop('checked', true);

    validateCorrectivos(parseInt(resultado[16]));

    $('#mantenimiento_correctivo').val(resultado[16]);
    $('#falla_encontrada').val(resultado[17]);
    $('#repuestos').val(resultado[18]);
    $('#insumos').val(resultado[19]);
    $('#tarjetas_electronicas').val(resultado[20]);
    $('#estimado_horas').val(resultado[21]);
    $('#observaciones').val(resultado[22]);
}


function validatePreventivos(mantenimiento){
    if(mantenimiento==1){
        $("#contentPreventivo").css("display", "");
    }else{
        $("#contentPreventivo").css("display", "none");
        $(".checkPreventivo").prop("checked", false);
    }
}

function validateCorrectivos(mantenimiento){
    if(mantenimiento==1){
        $("#contentCorrectivo").css("display", "");
    }else{
        $("#contentCorrectivo").css("display", "none");
        $(".dataCorrectivo").val('');
    }
}