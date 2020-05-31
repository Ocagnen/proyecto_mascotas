<?php
    session_name("mascotas");
    session_start();
    require "funciones_vistas.php";
    $url_const = "http://localhost/ProyectoMascotas/REST/";

    if(!isset($_SESSION["usuario"])){
        header("Location:index.php");
        exit;
    }
    

    if(isset($_POST["btn_cerrar_sesion"])){
        session_destroy();
        header("Location: registro.php");
        exit;
    }

    if(isset($_POST["btn_acceder_coment"])){
        $_SESSION["idAutor"] = $_POST["btn_acceder_coment"];
        header("Location: usuario.php");
        exit;
    }  
    
    if(isset($_POST["btn_trans_edit"])){
        $_SESSION["idTrans"] = $_POST["btn_trans_edit"];
        header("Location: transac.php");
        exit;
    }

    if(isset($_POST["btn_user_tran"])){
        $_SESSION["idAutor"] = $_POST["btn_user_tran"];
        header("Location: usuario.php");
        exit;
    }
    if(isset($_POST["btn_user_sol"])){
        $_SESSION["idAutor"] = $_POST["btn_user_sol"];
        header("Location: usuario.php");
        exit;
    }

    if(isset($_POST["btn_crear_anun"])){
        header("Location: crearAnun.php");
        exit;
    }

    if(isset($_POST["btn_anun_edit"])){
        $_SESSION["anuncio"] = $_POST["btn_anun_edit"];
        header("Location: editarAnun.php");
        exit;
    }

    if(isset($_POST["btn_anun_borr"])){
       $borrado = borrarAnuncio($_POST["btn_anun_borr"],$url_const);
       if(isset($borrado["mensaje"])){
           $_SESSION["cancelada2"] = $borrado["mensaje"];
       } else if(isset($borrado["exito"])){
        $_SESSION["cancelada"] = $borrado["exito"];

       }
    }


    if(isset($_POST["btn_comentar_no"])){
        $arrayTrans = explode(".",$_POST["btn_comentar_no"]);
        $idAnunTrans = $arrayTrans[1];
        $idUserTrans = $arrayTrans[0];
        if($idUserTrans == $_SESSION["usuario"]->idUsuario){
            actualizarTransaccionComentario2($idAnunTrans,$idUserTrans,$url_const);
        } else {
            actualizarTransaccionComentario1($idAnunTrans,$idUserTrans,$url_const);
        }
    }

    if(isset($_POST["btn_comentario_enviar"])){
        $arrayValoracion = explode(".",$_POST["btn_comentario_enviar"]);
        $idUserValor = $arrayValoracion[0];
        $idAnunValor = $arrayValoracion[1];

        $usuarioLector = "";

        if($idUserValor == $_SESSION["usuario"]->idUsuario){
            $anun_aux = obtenerAnuncio($idAnunValor,$url_const);

            if(isset($anun_aux['anuncio'])){
                $usuarioLector = $anun_aux["anuncio"]->idUsuarioAutor;

            }
        } else {
            $usuarioLector = $idUserValor;
        }

        $valoracion = crearValoracion($_POST["valoracion_valor"],$_POST["comentario_valor"],$_SESSION["usuario"]->idUsuario,$usuarioLector,$url_const);
        if($idUserTrans == $_SESSION["usuario"]->idUsuario){
            actualizarTransaccionComentario2($idAnunTrans,$idUserTrans,$url_const);
        } else {
            actualizarTransaccionComentario1($idAnunTrans,$idUserTrans,$url_const);
        }
        $_SESSION['cancelada'] = "Valoración enviada con éxito";
    }

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/usuario.css">
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
        <?php
            if(isset($_SESSION["cancelada"])){
                echo "<p class='mensaje_cancel'>".$_SESSION['cancelada']."</p>";
                unset($_SESSION["cancelada"]);
            }

            if(isset($_SESSION["cancelada2"])){
                echo "<p class='mensaje_exito'>".$_SESSION['cancelada2']."</p>";
                unset($_SESSION["cancelada2"]);
            }
        ?>
    <section id="container_usuario">
        <article id='datos_usuario'>
            <div id='nombre_usu'>
                <h3><?php echo $_SESSION["usuario"]->nombre; echo "&nbsp;"; echo $_SESSION["usuario"]->apellidos;  ?>
                    <form action="profile.php" method="post">
                        <button type="submit" id='btn_cerrar_sesion' name='btn_cerrar_sesion'>(Cerrar sesión)</button>
                    </form>
                </h3>
            </div>
            <div id='foto_usu'>
                <img src="img/usuarios/<?php echo $_SESSION["usuario"]->foto;?>" alt="">
                <div id="promedio" class="estrellas_valor">
                <?php
                    $valoracion = obtenerValoracionMedia($_SESSION["usuario"]->idUsuario,$url_const);
                    for ($i=0; $i < $valoracion ; $i++) { 
                        echo "<img src='img/star2.svg' alt='valoracion positiva'>"; 
                    }

                    for ($i=0; $i < (5 -$valoracion) ; $i++) { 
                        echo "<img src='img/stargrey.svg' alt='valoracion negativa'>";
                    }
                ?>
            </div>
            </div>
            <div id='desc_usu'>
                <p>
                    <i>"<?php echo $_SESSION["usuario"]->descripcion;?>"</i>
                </p>
            </div>
            <div id='menu_usu'>
                <div class='btn_menu'>
                <a href='#modalAnuncios' rel='modal:open'><button type='button' onclick='cargarAnuncios(<?php echo $_SESSION["usuario"]->idUsuario;?>);'>Anuncios</button></a>
                    <div id='modalAnuncios' class='modal'>
                        <div>
                        
                        </div>
                    </div>
                </div>
                <div class='btn_menu'>
                <a href='#modalSolicitud' rel='modal:open'><button>Solicitudes</button></a>
                    <div id='modalSolicitud' class='modal'>
                        <?php
                            $solicitudes = obtenerSolicitudes($_SESSION["usuario"]->idUsuario,$url_const);                            
                            if(isset($solicitudes["mensaje"])){
                                echo "<p>No tiene solicitudes en este momento</p>";
                            } else {
                                foreach ($solicitudes as $key => $value) {
                                    foreach ($value as $key2 => $value2) {
                                        foreach ($value2 as $key3 => $value3) {
                                            echo "<div class='solicitudes_container' id='solicitud".$value3->idAnuncio."".$value3->idUsuario."'>";
                                            echo "<div class='title_sol'>".strtoupper($value3->titulo)."</div>";
                                            echo "<div class='cuerpo_sol'>";
                                            $usuarioProv = obtenerUsuario($value3->idUsuario,$url_const);
                                            echo "<div class='nombre_sol'><form method='post' action='profile.php'>";
                                            echo "<button type='submit' name='btn_user_sol' class='btn_user_sol' value='$value3->idUsuario'>".$usuarioProv["usuario"]->nombre."&nbsp;".$usuarioProv["usuario"]->apellidos."</button>";
                                            echo "</form></div>";
                                            echo "<div class='tarifa_sol'><strong>".$value3->tarifa."€</strong></div>"; 
                                            
                                            if($value3->aceptada == 0){
                                                echo "<div class='est_sol'>";
                                                echo "<strong>En espera</strong>";
                                            } else {
                                                echo "<div class='acep_sol'>";
                                                echo "<strong>Aceptada</strong>";
                                            }   
                                            echo "</div>";
                                            echo "</div>";
                                            if($value3->aceptada == 0){
                                                ?>
                                                    <button type='button' class='boton_sol_aceptar' onclick="aceptarSolicitud(<?php echo $value3->idAnuncio ?>,<?php echo $value3->idUsuario ?>,<?php echo $value3->tarifa?>);" >Aceptar</button>
                                                <?php
                                            }
                                            
                                            echo "</div>";
                                        }                         
                                    }
                                }
                            }
                        ?>
                    </div>
                </div>
                <div class='btn_menu'>
                <a href='#modalTransacc' rel='modal:open'><button type='button' onclick='cargarTransacciones1(<?php echo $_SESSION["usuario"]->idUsuario;?>);'>Transacciones</button></a>
                    <div id='modalTransacc' class='modal'>
                        <div>

                        </div>          
                    </div>
                </div>
            </div>
        </article>
        <article id='valoraciones'>
            <div id='valoraciones_usu'>
                <?php
                    $valoraciones_array = getValoraciones($_SESSION["usuario"]->idUsuario,$url_const);
                    if(isset($valoraciones_array["mensaje"])){
                        echo "<h3>No existen valoraciones para este usuario</h3>";
                    } else if(isset($valoraciones_array["valoraciones"])){
                        foreach ($valoraciones_array as $key => $value) {
                            foreach ($value as $key2 => $value2) {
                                $usuarioEscritor = obtenerUsuario($value2->idUsuarioEscritor,$url_const);
                                echo "<div class='valoracion'>";
                                    echo "<div class='usuario_valor'>";
                                        echo "<h3><form method='post' action='profile.php'>";
                                        echo "<button type='submit' value='".$usuarioEscritor['usuario']->idUsuario."' name='btn_acceder_coment' class='btn_acceder_coment'>".$usuarioEscritor['usuario']->nombre."&nbsp;".$usuarioEscritor['usuario']->apellidos."</button></h3>";
                                    echo "</div>";
                                    echo "<div class='comentario_valor'>";
                                        echo "<p>";
                                            echo $value2->comentario;
                                        echo "</p>";
                                    echo "</div>";
                                    echo "<div class='estrellas_valor'>";
                                        for ($i=0; $i < $value2->valor ; $i++) { 
                                            echo "<img src='img/star2.svg' alt='valoracion positiva'>";
                                        }
                                        for ($i=0; $i < (5-$value2->valor) ; $i++) { 
                                            echo "<img src='img/stargrey.svg' alt='valoracion negativa'>";
                                        } 
                                    echo "</div>";
                                echo "</div>";
                            }
                        }

                    }
                ?>
            </div>
        </article>
    </section>
    <footer>
        <div id='logo_footer'>
            <h3 id='nombre_footer'>Au Pet</h3>
        </div>
        <div id='direcciones_footer'>
            <div class='enlace_footer'>
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