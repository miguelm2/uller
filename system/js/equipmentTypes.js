//FUNCIONES PARA ACTUALIZAR UN TIPO DE EQUIPO -------------------------------
$('.btn-editar').on('click', function() {
    var id_tipo = $(this).val();
    getEquipmentType(id_tipo);
    $("#editTypes").modal("show");
});

function getEquipmentType(id_tipo){
    $.post("../../php/routing/Admin.php", {
        "getEquipmentType": true,
        "id_tipo": id_tipo
    }).done(function(data) {
        var resultado = JSON.parse(data);
        printView(resultado);
    });
}

function printView(resultado){
    $('#id_tipo').val(resultado['id_tipo']);
    $('#nombre_tipo').val(resultado['nombre']);
    $('#descripcion_tipo').val(resultado['descripcion']);
}

//FUNCION PARA ELIMINAR UN TIPO DE EQUIPO-----------------------
$('.btn-eliminar').on('click', function() {
    var id_tipo = $(this).val();
    $('#id_tipo_delete').val(id_tipo);
    $("#eliminarEquipo").modal("show");
});