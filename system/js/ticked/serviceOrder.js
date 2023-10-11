$('.btn-editar').click(function () {
    var id_tipo = $(this).val();
    $('#id_tipo').val(id_tipo);
    let params = new URLSearchParams(location.search);
    var ticket = params.get('ticket');

    getDataTipoEquipo(id_tipo, ticket);
    $('#modalEditarRegistro').modal('show');

});

function getDataTipoEquipo(id_tipo, ticket) {
    $.post("/system/php/routing/Technician.php", {
        "getDataServiceOrderEquipo": true,
        "id_tipo": id_tipo,
        "ticket": ticket
    }).done(function (data) {
        if (data != '') {
            var resultado = JSON.parse(data);
            console.log(resultado);
            printViewData(resultado);
        }
    });
}

function printViewData(resultado) {
    $('#fecha_servicio').val(resultado[3]);
    $('#fecha_ultimo_servicio').val(resultado[4]);
    $('#ubicacion_equipo').val(resultado[5]);
    $('#tipo_uso').val(resultado[6]);
    $('#presenta_falla').val(resultado[7]);
    $('#notas').val(resultado[8]);
    $('#observaciones').val(resultado[9]);
}