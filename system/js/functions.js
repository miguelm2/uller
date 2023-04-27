function validatePassword() {

    var newPass = document.getElementById('newPass');
    var confpass = document.getElementById('confirmPass');

    if (newPass.value == confpass.value) {
        return true;
    } else {
        swal("Las contraseñas no coinciden, intente de nuevo", "", "warning");
        newPass.value = '';
        confpass.value = '';
        return false;
    }
}

//FUNCION PARA VER LA CONTRASEÑA
$('#verPass').on('click', function() {
    var tipo = $('#pass').attr('type');
    
    if(tipo == "password"){
        $('#pass').get(0).type="text";
    }else{
        $('#pass').get(0).type="password";
    }
});

//FUNCION PARA ABRIR LA MODAL DE ELIMINAR TECNICO
$('#button-tecnico').on('click', function() {
    var id_tecnico_ticket = $(this).val();
    $("#id_tecnico_ticket").val(id_tecnico_ticket);
    $("#eliminarTecnico").modal("show");
});