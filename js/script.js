$(document).ready(function() {
    var abierto = 0;
    $('#bars').click(function() {
        console.log("hols");
        if (abierto == 0) {
            $('#menu_cabecera').fadeIn();
            abierto = 1;
        } else {
            $('#menu_cabecera').fadeOut();
            abierto = 0;
        }
    });
});