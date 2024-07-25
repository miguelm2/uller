$.post("/system/php/routing/Page.php", {
    "getTotalPagination": true
}).done(function(data) {
    let response = JSON.parse(data);
    if(response > 0){
        window.btnTotal = response;
        window.pageActual = 1;
        validatePagination();
    }
});

$('.btnPagination').on('click', function () {
    let id_completo = $(this).attr('id');
    let listId      = id_completo.split('-');
    window.pageActual = listId[1];

    validatePagination();
    validatePrevious(listId[1]);
    validateNext(listId[1]);

    $(".btnPagination").removeClass("active");
    $("#"+id_completo).addClass("active");
});

$('#btn-previous').on('click', function () {
    let newPage = parseInt(pageActual) - 1;
    window.pageActual = newPage;

    validatePagination();
    validatePrevious(newPage);
    validateNext(newPage);

    $(".btnPagination").removeClass("active");
    $("#pag-"+newPage).addClass("active");
});

$('#btn-next').on('click', function () {
    let newPage = parseInt(pageActual) + 1;
    window.pageActual = newPage;

    validatePagination();
    validatePrevious(newPage);
    validateNext(newPage);

    $(".btnPagination").removeClass("active");
    $("#pag-"+newPage).addClass("active");
});

function validatePrevious(numero){
    numero = parseInt(numero);
    if(numero > 1){
        $('#btn-previous').attr('disabled', false);
    }else{
        $('#btn-previous').attr('disabled', true);
    }
}

function validateNext(numero){
    numero = parseInt(numero);
    if(numero < btnTotal){
        $('#btn-next').attr('disabled', false);
    }else{
        $('#btn-next').attr('disabled', true);
    }
}

function validatePagination() {
    let inicio = (parseInt(pageActual)-1)*6;

    printView(inicio);
}

function printView(inicio){
    $.post("/system/php/routing/Page.php", {
        "getCardsBlog": true,
        "inicio": inicio
    }).done(function(data) {
        let response = JSON.parse(data);

        $('#loaderBlog').hide();
        $('#contentCards').html(response);
    });
}


