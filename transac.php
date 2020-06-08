<?php

    require "funciones_vistas.php";
    $url_const = "http://localhost/ProyectoMascotas/REST/";
    session_name("mascotas");
    session_start();

    if(!isset($_SESSION["idTrans"]) || (isset($_SESSION["idTrans"]) && $_SESSION["idTrans"]=="borrada")){
        header("Location:index.php");
        exit;
    } else {
        $arrayTrans = explode(".",$_SESSION["idTrans"]);
        $idAnunTrans = $arrayTrans[1];
        $idUserTrans = $arrayTrans[0];
    }

    if(isset($_POST["btn_user_tran"])){
        $_SESSION["idAutor"] = $_POST["btn_user_tran"];
        header("Location: usuario.php");
        exit;
    }

    if(isset($_POST["btn_cancel_tran"])){
        $tran_cancelada = cancelarTransaccion($idAnunTrans,$idUserTrans,$url_const);
        if(isset($tran_cancelada)){
            $_SESSION["cancelada"] = "La transacción fue cancelada con éxito";
            $_SESSION["idTrans"] = "borrada";
            header("Location: profile.php");
            exit;
        }
    }

    if(isset($_POST["btn_enviar_entrega"])){
        $transaccion = obtenerTransaccion($idAnunTrans,$idUserTrans,$url_const);

        if(isset($transaccion['transaccion'])){
            if($transaccion['transaccion']->codigo_anuncio_inicio != $_POST["codigoEntrega"]){

                if(!isset($_SESSION["mensaje_error"])){
                    $_SESSION["mensaje_error"] = "Código incorrecto";
                }

                if(!isset($_SESSION["errorEntrega"])){
                    $_SESSION["errorEntrega"] = 1;
                } else {
                    if((int)$_SESSION["errorEntrega"]<2){
                        $_SESSION["errorEntrega"] = (int)$_SESSION["errorEntrega"] + 1;
                    } else {
                        unset($_SESSION["errorEntrega"]);
                        
                        $tran_cancelada = cancelarTransaccion($idAnunTrans,$idUserTrans,$url_const);
                        if(isset($tran_cancelada)){
                            $_SESSION["cancelada"] = "Códigos incorrectos, la transacción fue cancelada.";
                            $_SESSION["idTrans"] = "borrada";
                            header("Location: profile.php");
                            exit;
                            
                        }
                        
                    }
                }
            } else {
                if(isset($_SESSION["errorEntrega"])){
                    unset($_SESSION["errorEntrega"]);
                }
                if(!isset($_SESSION["codigo_correcto"])){
                    $_SESSION["codigo_correcto"] = "Código correcto.";
                }
                if($_SESSION["usuario"]->idUsuario == $idUserTrans){
                    $tipoUsuario = "solicitante" ;
                } else {
                    $tipoUsuario = "anunciante";
                }
                    actualizarTransaccion($idAnunTrans,$idUserTrans,"entrega",$tipoUsuario,$url_const);
            }
        }

    }

    if(isset($_POST["btn_enviar_recogida"])){
        $transaccion = obtenerTransaccion($idAnunTrans,$idUserTrans,$url_const);

        if(isset($transaccion['transaccion'])){
            if($transaccion['transaccion']->codigo_anuncio_fin != $_POST["codigoRecogida"]){

                if(!isset($_SESSION["mensaje_error"])){
                    $_SESSION["mensaje_error"] = "Código incorrecto";
                }

                if(!isset($_SESSION["errorRecogida"])){
                    $_SESSION["errorRecogida"] = 1;
                } else {
                    if((int)$_SESSION["errorRecogida"]<2){
                        $_SESSION["errorRecogida"] = (int)$_SESSION["errorRecogida"] + 1;
                    } else {
                        unset($_SESSION["errorRecogida"]);
                        
                        $tran_cancelada = cancelarTransaccion($idAnunTrans,$idUserTrans,$url_const);
                        if(isset($tran_cancelada)){
                            $_SESSION["cancelada"] = "Códigos incorrectos, la transacción fue cancelada.";
                            $_SESSION["idTrans"] = "borrada";
                            header("Location: profile.php");
                            exit;
                            
                        }
                        
                    }
                }
            } else {
                if(isset($_SESSION["errorRecogida"])){
                    unset($_SESSION["errorRecogida"]);
                }
                if(!isset($_SESSION["codigo_correcto"])){
                    $_SESSION["codigo_correcto"] = "Código correcto.";
                }
                if($_SESSION["usuario"]->idUsuario == $idUserTrans){
                    $tipoUsuario = "solicitante" ;
                } else {
                    $tipoUsuario = "anunciante";
                }
                actualizarTransaccion($idAnunTrans,$idUserTrans,"recogida",$tipoUsuario,$url_const);            
            }
        }

    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/transac.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <script src="jq/jquery-3.1.1.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <script src="js/script.js"></script>
    <title>Proyecto mascotas</title>
</head>
<body>
    <header>
        <div id='nombre_empresa'>
            <h1 id='titular_web' onclick="window.location.href = 'index.php'">Au Pet</h1>    
        </div>
        <div id='wrapper'>
            <img id='bars' src="img/bars_green.svg" alt="">
        </div>
        <div id='cabecera_lista'>            
            <nav id='menu_cabecera'>
                <div>
                    <a href="index.php">Inicio</a>
                </div>
                <div>
                    <a href="terminos.php">Términos y condiciones</a>
                </div>
                <div>
                    <a href="contacto.php">Contacto</a>
                </div>
                <div>
                    <a href="registro.php">Iniciar sesión</a>
                </div>
                <div>
                    <a href="registro.php">Registrarse</a>
                </div>
            </nav>
        </div>
        
            <?php
                if(isset($_SESSION["usuario"])){
                    $imagen = $_SESSION["usuario"]->foto;
                    echo "<div id='contenedor_foto_perfil'><a href='profile.php'><img src='img/usuarios/$imagen' alt='Usuario' id='logo_usuario'></a></div>";
                } 
            ?>
                
    </header>
    <?php
        if(isset($_SESSION["mensaje_error"])){
            echo "<p class='mensaje_cancel'>".$_SESSION['mensaje_error']."</p>";
            unset($_SESSION["mensaje_error"]);
        }
        if(isset($_SESSION["codigo_correcto"])){
            echo "<p class='mensaje_correcto'>".$_SESSION['codigo_correcto']."</p>";
            unset($_SESSION["codigo_correcto"]);
        }

    ?>
    <section>
        <div class="cuerpo_tran">
            <div class="titular_trans">
                <h1>Transacción</h1>
            </div>
            <div class="carac_trans">
                <?php
                    $transaccion = obtenerTransaccion($idAnunTrans,$idUserTrans,$url_const);

                    if(isset($transaccion['transaccion'])){
                ?>
                <div id='anuncio_trans'>
                    <p><strong>Anuncio</strong>: <?php echo obtenerAnuncio($transaccion["transaccion"]->idAnuncio,$url_const)["anuncio"]->titulo; ?></p>
                </div>
                <div id='usuario_trans'>
                    <p><form method='post' action='transac.php'><strong>Solicitante</strong>:<button type='submit' name='btn_user_tran' class='btn_user_sol' value='<?php echo $idUserTrans; ?>'>
                        <?php echo obtenerUsuario($transaccion["transaccion"]->idUsuario,$url_const)['usuario']->nombre; ?>&nbsp;<?php echo obtenerUsuario($transaccion["transaccion"]->idUsuario,$url_const)['usuario']->apellidos; ?>
                    </button></form></p>
                </div>
                <div id='tarifa_trans'>
                    <p><strong>Tarifa</strong>: <?php echo $transaccion["transaccion"]->tarifa; ?>€</p>
                </div>
                <div id='telefonos_trans'>
                    <p><strong>Teléfono anunciante: </strong><?php echo obtenerUsuario(obtenerAnuncio($transaccion["transaccion"]->idAnuncio,$url_const)["anuncio"]->idUsuarioAutor,$url_const)['usuario']->telefono; ?></p>
                    <p><strong>Teléfono solicitante: </strong> <?php echo obtenerUsuario($transaccion["transaccion"]->idUsuario,$url_const)['usuario']->telefono; ?></p>
                </div>
                <div id='cancelar_trans'>
                    <form action="transac.php" method="post">
                        <button type="submit" name = "btn_cancel_tran" class='btn_cancel_tran'>Cancelar transacción</button>
                    </form>
                </div>
                <?php
                    } else {
                        echo "<p>No tiene transacciones en este momento</p>";
                    }
                ?>
            </div>
        </div>        
        <div class="cuerpo_tran">
            <div>
                <h2>Gestión de códigos</h2>
            </div>
            <div>
                <?php
                    if($_SESSION["usuario"]->idUsuario != $idUserTrans){
                        echo "<div class='opciones_codigo'>";
                            echo "<a href='#modalAnuncios1' rel='modal:open'><button>Solicitar código de entrega</button></a>";
                            echo "<div id='modalAnuncios1' class='modal'>";
                                echo "<p>El código de entrega es <strong>".$transaccion['transaccion']->codigo_anuncio_inicio."</strong>.</p>";
                            echo "</div>";
                        echo "</div>";
                    } else {
                        echo "<div  class='opciones_codigo'>";
                            echo "<a href='#modalAnuncios1' rel='modal:open'><button>Solicitar código de recogida</button></a>";
                            echo "<div id='modalAnuncios1' class='modal'>";
                            echo "<p>El código de recogida es <strong>".$transaccion['transaccion']->codigo_anuncio_fin."</strong>.</p>";
                            echo "</div>";
                        echo "</div>";
                    }
                ?>
            </div>
            <div  class='opciones_codigo'>
            <a href='#modalAnuncios2' rel='modal:open'><button>Enviar código de entrega</button></a>
            <?php
                $transaccion = obtenerTransaccion($idAnunTrans,$idUserTrans,$url_const);
                $escribirForm1 = true;
                if(isset($transaccion['transaccion'])){
                    if($_SESSION["usuario"]->idUsuario == $idUserTrans){
                        if($transaccion['transaccion']->codigo_entrega_solicitante == 1){
                            $escribirForm1 = false;
                        }
                    } else {
                        if($transaccion['transaccion']->codigo_entrega_anunciante == 1){
                            $escribirForm1 = false;
                        }
                    }
                }
                if($escribirForm1) {

            ?>
                <div id='modalAnuncios2' class='modal'>
                    <form action="transac.php" method="post">
                        <div>
                            <label for="codigoEntrega">Introduzca el código de <strong>entrega</strong>:</label>
                        </div>
                        <div>
                            <input required type="number" name="codigoEntrega" id="codigoEntrega"/>
                            <br><span style='color:red'><?php
                                if(isset($_POST["btn_enviar_entrega"])){
                                    if(isset($_SESSION["errorEntrega"])){
                                        echo "Código incorrecto. Tiene ". (3-(int)$_SESSION["errorEntrega"])." intentos más.";
                                    }
                                }
                            ?></span>
                        </div>
                        <div>
                            <button type="submit" name="btn_enviar_entrega" id="btn_enviar_entrega">Enviar</button>
                        </div>
                    </form>
                </div>
                <?php
                } else {
                    ?>
                    <div id='modalAnuncios2' class='modal'>
                        <p>Su código ya fue introducido.</p>
                    </div>

                    <?php
                }
                ?>
            </div>
            <div  class='opciones_codigo'>
            <a href='#modalAnuncios3' rel='modal:open'><button>Enviar código de recogida</button></a>
            <?php
                $transaccion = obtenerTransaccion($idAnunTrans,$idUserTrans,$url_const);
                $escribirForm2 = true;
                if(isset($transaccion['transaccion'])){
                    if($_SESSION["usuario"]->idUsuario == $idUserTrans){
                        if($transaccion['transaccion']->codigo_recogida_solicitante == 1){
                            $escribirForm2 = false;
                        }
                    } else {
                        if($transaccion['transaccion']->codigo_recogida_anunciante == 1){
                            $escribirForm2 = false;
                        }
                    }
                }
                if($escribirForm2) {

            ?>
            <div id='modalAnuncios3' class='modal'>
                <form action="transac.php" method="post">
                    <div>
                        <label for="codigoRecogida">Introduzca el código de <strong>recogida</strong>:</label>
                    </div>
                    <div>
                        <input required type="number" name="codigoRecogida" id="codigoRecogida"/>
                        <br><span style='color:red'><?php
                            if(isset($_POST["btn_enviar_recogida"])){
                                if(isset($_SESSION["errorRecogida"])){
                                    echo "Código incorrecto. Tiene ". (3-(int)$_SESSION["errorRecogida"])." intentos más.";
                                }
                            }
                        ?></span>
                    </div>
                    <div>
                        <button type="submit" name="btn_enviar_recogida" id="btn_enviar_recogida">Enviar</button>
                    </div>
                </form>
            </div>
            <?php
                } else {
                    ?>
                    <div id='modalAnuncios3' class='modal'>
                        <p>Su código ya fue introducido.</p>
                    </div>

                    <?php
                }
                ?>
        </div>
    </section>
    <footer>
        <div id='logo_footer'>
            <h3 id='nombre_footer'>Au Pet</h3>
        </div>
        <div id='direcciones_footer'>
        <div  class='enlace_footer'>
                <a href="registro.php#reg">¿Dónde me registro?</a>
            </div>
            <div class='enlace_footer'>
                <a href="registro.php#ini">¿Cómo inicio sesión?</a>
            </div>
            <div class='enlace_footer'>
                <a href="contacto.php#correo">Contacto</a>
            </div>
            <div class='enlace_footer'>
                <a href="terminos.php">Términos y condiciones</a>
            </div>
            <div class='enlace_footer'>
                <a href="contacto.php#container_preguntas">Preguntas frecuentes</a>
            </div>
        </div>
        <div id='redes_sociales_footer'>
            <div>
                <a href="">
                    <img src="img/socialMedia/facebook.svg" alt="">
                </a>
            </div>
            <div>
                <a href="">
                    <img src="img/socialMedia/insta.svg" alt="">
                </a>
            </div>
        </div>
        <div id='container_derechos'>
            <p>©2020 Au Pet. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html>