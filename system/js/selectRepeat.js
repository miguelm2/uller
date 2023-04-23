//FUNCION PARA ELIMINAR EL ESTADO REPETIDO EN LOS USUARIOS
var mycode = {};
$("select[id='estado'] > option").each(function() {
    if (mycode[this.text]) {
        $(this).remove();
    } else {
        mycode[this.text] = this.value;
    }
});

//FUNCIONES PARA LOS SELECT REPETIDOS EN LOS TICKETS
var mycode = {};
$("select[id='tecnico'] > option").each(function() {
    if (mycode[this.text]) {
        $(this).remove();
    } else {
        mycode[this.text] = this.value;
    }
});

var mycode = {};
$("select[id='tipo_equipo'] > option").each(function() {
    if (mycode[this.text]) {
        $(this).remove();
    } else {
        mycode[this.text] = this.value;
    }
});

var mycode = {};
$("select[id='tipo_servicio'] > option").each(function() {
    if (mycode[this.text]) {
        $(this).remove();
    } else {
        mycode[this.text] = this.value;
    }
});

//FUNCIONES PARA LOS SELECT REPETIDOS DE INFORME FINAL 
var mycode = {};
$("select[id='mantenimiento_preventivo'] > option").each(function() {
    if (mycode[this.text]) {
        $(this).remove();
    } else {
        mycode[this.text] = this.value;
    }
});

var mycode = {};
$("select[id='mantenimiento_correctivo'] > option").each(function() {
    if (mycode[this.text]) {
        $(this).remove();
    } else {
        mycode[this.text] = this.value;
    }
});

var mycode = {};
$("select[id='tarjetas_electronicas'] > option").each(function() {
    if (mycode[this.text]) {
        $(this).remove();
    } else {
        mycode[this.text] = this.value;
    }
});