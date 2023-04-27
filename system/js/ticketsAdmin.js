//FUNCIONES PARA CARGAR LOS CHECKBOX DE EQUIPOS
$(document).ready(function() {
    const id_usuario = $("#id_usuario").val();
    getListEquipos(id_usuario);
});

$('#id_usuario').on('change', function() {
    const id_usuario = $(this).val();
    $('#botonNewTicket').prop({disabled: true}); 
    getListEquipos(id_usuario);
});

function getListEquipos(id_usuario){
    $.post("../../php/routing/Admin.php", {
        "getListEquiposTicket": true,
        "id_usuario": id_usuario
    }).done(function(data) {
        const lista_equipos = JSON.parse(data);
        printView(lista_equipos);
    });
}

function printView(lista_equipos){
    var dataHtml = '<label>Por favor seleccione los equipos:</label>';
    for (let index = 0; index < lista_equipos.length; index++) {
        dataHtml += '<div class="form-check">';
        dataHtml += '<input class="form-check-input" type="checkbox" value="'+lista_equipos[index][0]+'" id="'+lista_equipos[index][0]+'" name="equipoTicket[]" onchange="validateCheckEquipos()">';
        dataHtml += '<label class="form-check-label" for="'+lista_equipos[index][0]+'">'+lista_equipos[index][2]+'</label>';                      
        dataHtml += '</div>';
    }

    $('#contentEquipos').html(dataHtml);
}