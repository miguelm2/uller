//FUNCIONES PARA ACTUALIZAR UNA HERRAMIENTA -------------------------------
$('.btn-editar').on('click', function() {
    var id_herramienta = $(this).val();
    getTool(id_herramienta);
    $("#editTools").modal("show");
});


function getTool(id_herramienta){
    $.post("../../php/routing/Admin.php", {
        "getTool": true,
        "id_herramienta": id_herramienta
    }).done(function(data) {
        var resultado = JSON.parse(data);
        printView(resultado);
    });
}

function printView(resultado){
    $('#id_herramienta').val(resultado['id_herramienta']);
    $('#nombre_tool').val(resultado['nombre']);
    $('#descripcion_tool').val(resultado['descripcion']);
    $('#tipo_tool').val(resultado['tipo']);
}

//FUNCION PARA ELIMINAR UNA HERRAMIENTA -----------------------
$('.btn-eliminar').on('click', function() {
    var id_herramienta = $(this).val();
    $('#id_herramieta_delete').val(id_herramienta);
    $("#eliminar").modal("show");
});