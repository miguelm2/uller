//FUNCION PARA ELIMINAR UNA REGISTRO DE (HERRAMIENTAS, MATERIALES, AYUDANTES)-----------------------
$('.btn-eliminar').on('click', function() {
    var listTotal = $(this).val();
    listTotal = listTotal.split('-');
    $('#nombre_tabla').val(listTotal[0]);
    $('#nombre_campo').val(listTotal[1]);
    $('#id').val(listTotal[2]);
    $("#deleteComponent").modal("show");
});