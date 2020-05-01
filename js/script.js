$(document).ready(function() {
    var abierto = 0;
    $('#bars').click(function() {
        console.log("hols");
        if (abierto == 0) {
            $('#cabecera_lista').slideDown();
            $('#bars').attr("src", "img/cross_green.svg");
            abierto = 1;
        } else {
            $('#cabecera_lista').slideUp();
            $('#bars').attr("src", "img/bars_green.svg");
            abierto = 0;
        }
    });
});