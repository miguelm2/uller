$(document).ready(function() {
    validateBanco();
});

$('#banco').on('change', function() {
    validateBanco();
});

function validateBanco() {
    let banco = $('#banco').val();

    if(banco == "No presenta"){
        $("#tipo_cuenta").prop('disabled', true);
        $("#numero_cuenta").prop('disabled', true);
    }else{
        $("#tipo_cuenta").prop('disabled', false);
        $("#numero_cuenta").prop('disabled', false);
    }
}