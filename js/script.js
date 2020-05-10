var url_const = "http://localhost/ProyectoMascotas/REST/";

$(document).ready(function() {
    var abierto = 0;

    $('#bars').click(function() {
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

    $('#btn_filtrar').mouseenter(function() {
        $(this).css('background-color', '#b6ffcb');
        $(this).css('color', 'black');
    });

    $('#btn_filtrar').mouseleave(function() {
        $(this).css('background-color', 'green');
        $(this).css('color', 'white');
    });

    $('#div_btn_enviar_cont button, #btn_reg, #btn_inicio').mouseenter(function() {
        $(this).css('background-color', '#b6ffcb');
        $(this).css('color', 'black');
    });

    $('#div_btn_enviar_cont button, #btn_reg, #btn_inicio').mouseleave(function() {
        $(this).css('background-color', 'green');
        $(this).css('color', 'white');
    });

    $('#tipos_mascota button').mouseenter(function() {
        if ($(this).css('background-color') == 'rgb(0, 128, 0)') {
            $(this).css('background-color', 'transparent');
        } else {
            $(this).css('background-color', '#78ed99');
        }
    });

    $('#tipos_mascota button').mouseleave(function() {
        if ($(this).css('background-color') == 'rgb(0, 128, 0)') {
            $(this).css('background-color', '#78ed99');
        } else {
            $(this).css('background-color', 'transparent');
        }
    });

    $('#direcciones_footer a').mouseenter(function() {
        $(this).css('text-decoration', 'underline');
    });

    $('#direcciones_footer a').mouseleave(function() {
        $(this).css('text-decoration', 'none');
    });



    if ($(window).width() > 1030) {
        $('#cabecera_lista div').mouseenter(function() {
            $(this).css('background-color', '#b6ffcb');
        });
        $('#cabecera_lista div').mouseleave(function() {
            $(this).css('background-color', 'transparent');
        });

        $('#cabecera_lista a').mouseenter(function() {
            $(this).css('text-decoration', 'underline');
        });
        $('#cabecera_lista a').mouseleave(function() {
            $(this).css('text-decoration', 'none');
        });

    }

    $('.pregunta h3').click(function() {
        if ($(this).parent('.pregunta').siblings().css('display') == 'none') {
            $(this).parent('.pregunta').siblings().slideDown();
        } else {
            $(this).parent('.pregunta').siblings().slideUp();
        }
    });

    $('.btn_menu').mouseenter(function() {
        $(this).children('button').css('background-color', '#b6ffcb');
        $(this).children('button').css('color', 'green');
    });
    $('.btn_menu').mouseleave(function() {
        $(this).children('button').css('background-color', 'green');
        $(this).children('button').css('color', 'white');
    });

    $('.boton_solicitar button').mouseenter(function() {
        $(this).css('background-color', '#b6ffcb');
        $(this).css('border', '1px solid green');
        $(this).css('color', 'green');
    });
    $('.boton_solicitar button').mouseleave(function() {
        $(this).css('background-color', 'green');
        $(this).css('border', '1px solid white');
        $(this).css('color', 'white');
    });

});

function crearSolicitud(idAnuncio, idUsuario) {
    var idTarifa = '#tarifa' + idAnuncio;
    var tarifa = $(idTarifa).val();
    var valorMin = $(idTarifa).attr('min');
    if (parseFloat(tarifa) < parseFloat(valorMin)) {
        console.log('paso');
        var idSpan = "#mensaje" + idAnuncio;
        $(idSpan).html("La cantidad debe ser superior o igual a " + $(idTarifa).attr('min'));
        return false;
    } else if (tarifa == "") {
        var idSpan = '#mensaje' + idAnuncio;
        $(idSpan).html("*Campo vacio*");
        return false;
    }
    var idModal = '#modal' + idAnuncio;
    var parametros = { "idAnuncio": idAnuncio, "idUsuario": idUsuario, "tarifa": tarifa };

    $.post(url_const + 'crearSolicitud', parametros, null, "json")
        .done(function(data) {
            if (data.mensaje) {
                $(idModal).html("<p>Solicitud enviada con éxito</p>");
            } else if (data.mensaje_error) {
                $(idModal).html("<p>Error al enviar la solicitud</p>");
            } else {
                console.log("Error");
            }

        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            if (console && console.log) {
                console.log("La solicitud a fallado: " + textStatus);
            }
        });

    return false;

}