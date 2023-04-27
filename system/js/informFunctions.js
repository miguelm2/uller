//FUNCION PARA VALIDAR OPCIONES DE MANTENIMIENTO PREVENTIVO Y CORRECTIVO
$(document).ready(function() {
    const mantPrev = $('#mantenimiento_preventivo').val();
    const mantCorr = $('#mantenimiento_correctivo').val();
    validatePreventivos(mantPrev);
    validateCorrectivos(mantCorr);
});


$('#mantenimiento_preventivo').on('change', function() {
    const mantenimiento = $(this).val();
    validatePreventivos(mantenimiento);
});

$('#mantenimiento_correctivo').on('change', function() {
    const mantenimiento = $(this).val();
    validateCorrectivos(mantenimiento);
});

function validatePreventivos(mantenimiento){
    if(mantenimiento==1){
        $("#contentPreventivo").css("display", "");
    }else{
        $("#contentPreventivo").css("display", "none");
        $(".checkPreventivo").prop("checked", false);
    }
}

function validateCorrectivos(mantenimiento){
    if(mantenimiento==1){
        $("#contentCorrectivo").css("display", "");
    }else{
        $("#contentCorrectivo").css("display", "none");
        $(".dataCorrectivo").val('');
    }
}
