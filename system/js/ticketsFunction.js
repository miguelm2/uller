//FUNCION PARA VALIDAR LOS CHECKBOX DE EQUIPOS EN LOS TICKETES
function validateCheckEquipos(){
    if ($('input:checkbox:checked').length > 0) {
        $('#botonNewTicket').prop({disabled: false}); 
    } else {
        $('#botonNewTicket').prop({disabled: true}); 
    }
}

/* $('.checkEquipos').on('change', function() {
    if ($('input:checkbox:checked').length > 0) {
        $('#botonNewTicket').prop({disabled: false}); 
    } else {
        $('#botonNewTicket').prop({disabled: true}); 
    }
}); */

