<?php

    require "funciones_vistas.php";
    $url_const = "http://localhost/ProyectoMascotas/REST/";
    session_name("mascotas");
    session_start();

    if(!isset($_SESSION["idTrans"])){
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
        <div id='contenedor_foto_perfil'>
            <?php
                if(isset($_SESSION["usuario"])){
                    $imagen = $_SESSION["usuario"]->foto;
                    echo "<a href='profile.php'><img src='img/usuarios/$imagen' alt='Usuario' id='logo_usuario'></a>";
                } 
            ?>
        </div>        
    </header>
    <section>
        <div class="titular_trans">
            <h1>Transacciones</h1>
        </div>
        <div class="carac_trans">
            <?php
                $transaccion = obtenerTransaccion($idAnunTrans,$idUserTrans,$url_const);

                if(isset($transaccion['transaccion'])){
            ?>
            <div id='anuncio_trans'>
                <p><?php echo obtenerAnuncio($transaccion["transaccion"]->idAnuncio,$url_const)["anuncio"]->titulo; ?></p>
            </div>
            <div id='usuario_trans'>
                <p><form method='post' action='transac.php'><button type='submit' name='btn_user_tran' class='btn_user_sol' value='<?php echo $idUserTrans; ?>'>
                    <?php echo obtenerUsuario($transaccion["transaccion"]->idUsuario,$url_const)['usuario']->nombre; ?>&nbsp;<?php echo obtenerUsuario($transaccion["transaccion"]->idUsuario,$url_const)['usuario']->apellidos; ?>
                </button></form></p>
            </div>
            <div id='tarifa_trans'>
                <p><?php echo $transaccion["transaccion"]->tarifa; ?>€</p>
            </div>
            <div id='cancelar_trans'>
                <form action="transac.php" method="post">
                    <button type="submit">Cancelar transacción</button>
                </form>
            </div>
            <?php
                } else {
                    echo "<p>No tiene transacciones en este momento</p>";
                }
            ?>
        </div>
        <div>
            <div>
                <h2>Gestión de códigos</h2>
            </div>
            <div>
                <?php
                    if($_SESSION["usuario"]->idUsuario != $idUserTrans){
                        echo "<div>";
                            echo "<a href='#modalAnuncios' rel='modal:open'><button>Solicitar código de entrega</button></a>";
                            echo "<div id='modalAnuncios' class='modal'>";
                                echo "<p>Para enviar una solicitud o visitar un perfil de otro usuario es necesario estar registrado</p>";
                                echo "<button type='submit' class='btn_solicitud_iniciar' >Iniciar sesión / Registrarme</button>";
                            echo "</div>";
                        echo "</div>";
                    } else {
                        echo "<div>";
                            echo "<a href='#modalAnuncios' rel='modal:open'><button>Solicitar código de recogida</button></a>";
                            echo "<div id='modalAnuncios' class='modal'>";
                                echo "<p>Para enviar una solicitud o visitar un perfil de otro usuario es necesario estar registrado</p>";
                                echo "<button type='submit' class='btn_solicitud_iniciar' >Iniciar sesión / Registrarme</button>";
                            echo "</div>";
                        echo "</div>";
                    }
                ?>
            </div>
            <div>
            <a href='#modalAnuncios' rel='modal:open'><button>Enviar código de entrega</button></a>
                <div id='modalAnuncios' class='modal'>
                    <p>"Para enviar una solicitud o visitar un perfil de otro usuario es necesario estar registrado"</p>
                    <button type="submit" class="btn_solicitud_iniciar" >Iniciar sesión / Registrarme</button>
                </div>
            </div>
            <div>
            <a href='#modalAnuncios' rel='modal:open'><button>Enviar código de recogida</button></a>
            <div id='modalAnuncios' class='modal'>
                    <p>"Para enviar una solicitud o visitar un perfil de otro usuario es necesario estar registrado"</p>
                    <button type="submit" class="btn_solicitud_iniciar" >Iniciar sesión / Registrarme</button>
                </div>
            </div>
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