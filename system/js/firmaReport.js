$('#botonFirma').click(function(){
    $("#modalFirma").modal('show');
});


$('#tipoFirma').click(function () {
    option = $(this).val();
    if (option == "1") {
        $("#divFirmaManoAlzada").show();
        $("#contentNombre").hide();
        $("#divLetraFirmaGreat").hide();
    }
    if (option == "2") {
        $("#divFirmaManoAlzada").hide();
        $("#contentNombre").show();
        $("#divLetraFirmaGreat").show();
    }
});

$('#nombre_firma').on('change', function() {
    getTextFirma();
});


function getTextFirma(){
    var canvas = document.getElementById("myCanvas");
    context.clearRect(0, 0, window.innerWidth, window.innerWidth);
    clickX = [];
    clickY = [];
    clickDrag = [];
    var ctx = canvas.getContext("2d");
    ctx.font = "60px Great Vibes";
    ctx.fillText('', 20, 50);
    ctx.fillText($('#nombre_firma').val(), 20, 50);
}