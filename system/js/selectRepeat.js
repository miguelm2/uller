//FUNCION PARA ELIMINAR EL ESTADO REPETIDO EN LOS USUARIOS
var mycode = {};
$("select[id='estado'] > option").each(function() {
    if (mycode[this.text]) {
        $(this).remove();
    } else {
        mycode[this.text] = this.value;
    }
});

var mycode = {};
$("select[id='localidad'] > option").each(function() {
    if (mycode[this.text]) {
        $(this).remove();
    } else {
        mycode[this.text] = this.value;
    }
});

//FUNCIONES PARA LOS SELECT REPETIDOS EN EQUIPOS
var mycode = {};
$("select[id='marca'] > option").each(function() {
    if (mycode[this.text]) {
        $(this).remove();
    } else {
        mycode[this.text] = this.value;
    }
});

var mycode = {};
$("select[id='capacidad_btuh'] > option").each(function() {
    if (mycode[this.text]) {
        $(this).remove();
    } else {
        mycode[this.text] = this.value;
    }
});

var mycode = {};
$("select[id='refrigerante'] > option").each(function() {
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

//FUNCIONES PARA LOS SELECT REPETIDOS DE REPORTE DE SERVICIO
var mycode = {};
$("select[id='tipo_uso'] > option").each(function() {
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

//FUNCIONES PARA LOS SELECT REPETIDOS DE TECNICO 
var mycode = {};
$("select[id='estado_civil'] > option").each(function() {
    if (mycode[this.text]) {
        $(this).remove();
    } else {
        mycode[this.text] = this.value;
    }
});

var mycode = {};
$("select[id='banco'] > option").each(function() {
    if (mycode[this.text]) {
        $(this).remove();
    } else {
        mycode[this.text] = this.value;
    }
});

var mycode = {};
$("select[id='tipo_cuenta'] > option").each(function() {
    if (mycode[this.text]) {
        $(this).remove();
    } else {
        mycode[this.text] = this.value;
    }
});