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
        if ($(this).css('background-color') != 'rgb(0, 128, 0)') {
            $(this).css('background-color', '#78ed99');
        }
    });

    $('#tipos_mascota button').mouseleave(function() {
        if ($(this).css('background-color') != 'rgb(0, 128, 0)') {
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

    $('.boton_sol_aceptar, .btn_trans_edit, .btn_trans_edit').mouseenter(function() {
        $(this).css('background-color', '#b6ffcb');
        $(this).css('color', 'green');
    });
    $('.boton_sol_aceptar, .btn_trans_edit, .btn_trans_edit').mouseleave(function() {
        $(this).css('background-color', 'green');
        $(this).css('color', 'white');
    });

    $('.opciones_codigo button').mouseenter(function() {
        $(this).css('background-color', '#b6ffcb');
        $(this).css('color', 'green');
    });
    $('.opciones_codigo button').mouseleave(function() {
        $(this).css('background-color', 'green');
        $(this).css('color', 'white');
    });

    $('.btn_cancel_tran').mouseenter(function() {
        $(this).css('background-color', 'orange');
    });

    $('.btn_cancel_tran').mouseleave(function() {
        $(this).css('background-color', 'rgb(250, 200, 107)');
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

    $('.btn_menu a button').mouseenter(function() {
        $(this).css('background-color', '#b6ffcb');
        $(this).css('border', '1px solid green');
        $(this).css('color', 'green');
    });
    $('.btn_menu a button').mouseleave(function() {
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
/*
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
*/

function crearTransaccion(idAnuncio, idUsuario, tarifa) {
    var parametros = { "idAnuncio": idAnuncio, "idUsuario": idUsuario, "tarifa": tarifa };

    $.post(url_const + 'crearTransaccion', parametros, null, "json")
        .done(function(data) {
            if (data.mensaje) {
                return true;
            } else if (data.mensaje_error) {
                return false;
            } else {
                return false;
            }

        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            if (console && console.log) {
                console.log("La solicitud a fallado: " + textStatus);
            }
        });

    return false;

}

function aceptarSolicitud(idAnuncio, idUsuario, tarifa) {
    var divSol = '#solicitud' + idAnuncio + idUsuario;
    $.getJSON(url_const + 'aceptarSolicitud/' + idUsuario + '/' + idAnuncio)
        .done(function(data) {
            if (data.mensaje) {
                crearTransaccion(idAnuncio, idUsuario, tarifa);
                $(divSol).html("<p>Solicitud aceptada</p>");
            } else if (data.mensaje_error) {
                $(divSol).html("<p>Error al aceptar la solicitud</p>");
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

function cargarTransacciones(idUsuario) {
    $("#modalTransacc > div").html("");
    $.getJSON(url_const + 'obtenerTransacciones/' + idUsuario)
        .done(function(data) {
            if (data.mensaje) {
                $("#modalTransacc > div").html("<p>No tiene transacciones</p>");
            } else if (data.mensaje_error) {
                $("#modalTransacc > div").html("<p>Error en el servidor</p>");
            } else {
                var output = "";
                $.each(data.transacciones, function(key, value) {
                    output += "<div class='solicitudes_container'>";
                    output += "<div class='cuerpo_sol'>";
                    output += "<div class='nombre_trans'>";
                    output += "<p>Transacción para el anuncio " + value["titulo"] + "</p>";
                    output += "</div>";
                    output += "</div><form method='post' action='profile.php'>";
                    output += "<button type='submit' name ='btn_trans_edit' class='btn_trans_edit' value=" + value['idUsuario'] + "." + value['idAnuncio'] + " >Gestionar</button>";
                    output += "</form></div>";
                });

                $("#modalTransacc > div").html(output);
            }

        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            if (console && console.log) {
                console.log("La solicitud a fallado: " + textStatus);
            }
        });

    return false;

}