
$('.btn-editar').on('click', function () {
    var id_insumo = $(this).val();
    getDataInsumo(id_insumo);
    $('#updateInsumo').modal('show');
});

function getDataInsumo(id_insumo) {
    $.post("../../php/routing/Technician.php", {
        "getInput": true,
        "id_insumo": id_insumo
    }).done(function (data) {
        var result = JSON.parse(data);
        getInfoInsumo(result);
    });
}

function getInfoInsumo(result) {
    $('.id_insumo').val(result[0]);
    $('#nombre').val(result[2]);
}

$('.btn-eliminar').on('click', function () {
    $('#deleteInsumo').modal('show');
});