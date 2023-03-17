//FUNCION PARA ABRIR LA MODAL DE ELIMINAR TECNICO
$('#button-tecnico').on('click', function() {
    var id_tecnico_ticket = $(this).val();
    $("#id_tecnico_ticket").val(id_tecnico_ticket);
    $("#eliminarTecnico").modal("show");
});