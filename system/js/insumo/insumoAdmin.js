
$('.btn-eliminar').on('click', function () {
    var id_insumo = $(this).val();
    $('.id_insumo').val(id_insumo);

    $('#deleteInsumo').modal('show');
});

$('#tecnico').change(function () {
    var id_tecnico = $(this).val();
    getInputTecnico(id_tecnico);
});


function getInputTecnico(id_tecnico) {
    $.post("../../php/routing/Admin.php", {
        "getInputTecnico": true,
        "id_tecnico": id_tecnico
    }).done(function (data) {
        console.log(data);
        $('#herramientas').text(data);
    });
}