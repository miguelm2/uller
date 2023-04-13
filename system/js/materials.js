//FUNCIONES PARA ACTUALIZAR UN MATERIAL -------------------------------
$('.btn-editar').on('click', function() {
    var id_material = $(this).val();
    getMaterial(id_material);
    $("#editMaterials").modal("show");
});

function getMaterial(id_material){
    $.post("../../php/routing/Admin.php", {
        "getMaterial": true,
        "id_material": id_material
    }).done(function(data) {
        var resultado = JSON.parse(data);
        printView(resultado);
    });
}

function printView(resultado){
    $('#id_material').val(resultado['id_material']);
    $('#nombre_material').val(resultado['nombre']);
    $('#descripcion_material').val(resultado['descripcion']);
}

//FUNCION PARA ELIMINAR UN MATERIAL-----------------------
$('.btn-eliminar').on('click', function() {
    var id_material = $(this).val();
    $('#id_material_delete').val(id_material);
    $("#eliminar").modal("show");
});