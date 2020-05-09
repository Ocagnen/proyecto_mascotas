<?php
    session_name("mascotas");
    session_start();
    $url_const = "http://localhost/ProyectoMascotas/REST/";
    require "funciones_vistas.php";


    if(isset($_SESSION["idAutor"])){
        $usuarioVisitado = obtenerUsuario($_SESSION["idAutor"],$url_const);
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
    <script src="js/script.js"></script>
    <title>Proyecto mascotas</title>
</head>

<body>
    <header>
        <div id='nombre_empresa'>
            <h1 id='titular_web'>Au Pet</h1>
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
    <section id="container_usuario">
        <article id='datos_usuario'>
            <div id='nombre_usu'>
                <h3><?php echo $usuarioVisitado["usuario"]->nombre; echo "&nbsp;"; echo $usuarioVisitado["usuario"]->apellidos; ?></h3>
            </div>
            <div id='foto_usu'>
                <img src="img/usuarios/<?php echo $usuarioVisitado["usuario"]->foto;?>" alt="">
                <div id="promedio" class="estrellas_valor">
                <img src="img/star2.svg" alt="">
                <img src="img/star2.svg" alt="">
                <img src="img/star2.svg" alt="">
                <img src="img/star2.svg" alt="">
                <img src="img/stargrey.svg" alt="">
            </div>
            </div>
            <div id='desc_usu'>
                <p>
                    <i>"<?php echo $usuarioVisitado["usuario"]->descripcion; ?>"</i>
                </p>
            </div>
        </article>
        <article id='valoraciones'>
            <div id='valoraciones_usu'>
                <div class="valoracion">
                    <div class="usuario_valor">
                        <h3>Usuario</h3>
                    </div>
                    <div class="comentario_valor">
                        <p>
                            Cuidoo muy bien de mi perro. RECOMENDADO
                        </p>
                    </div>
                    <div class="estrellas_valor">
                        <img src="img/star2.svg" alt="">
                        <img src="img/star2.svg" alt="">
                        <img src="img/star2.svg" alt="">
                        <img src="img/star2.svg" alt="">
                        <img src="img/stargrey.svg" alt="">
                    </div>
                </div>
                <div class="valoracion">
                    <div class="usuario_valor">
                        <h3>Usuario</h3>
                    </div>
                    <div class="comentario_valor">
                        <p>
                            Cuidoo muy bien de mi perro. RECOMENDADO
                        </p>
                    </div>
                    <div class="estrellas_valor">
                        <img src="img/star2.svg" alt="">
                        <img src="img/star2.svg" alt="">
                        <img src="img/star2.svg" alt="">
                        <img src="img/stargrey.svg" alt="">
                        <img src="img/stargrey.svg" alt="">

                    </div>
                </div>
                <div class="valoracion">
                    <div class="usuario_valor">
                        <h3>Usuario</h3>
                    </div>
                    <div class="comentario_valor">
                        <p>
                            Cuidoo muy bien de mi perro. RECOMENDADO
                        </p>
                    </div>
                    <div class="estrellas_valor">
                        <img src="img/star2.svg" alt="">
                        <img src="img/star2.svg" alt="">
                        <img src="img/stargrey.svg" alt="">
                        <img src="img/stargrey.svg" alt="">
                        <img src="img/stargrey.svg" alt="">

                    </div>
                </div>
                <div class="valoracion">
                    <div class="usuario_valor">
                        <h3>Usuario</h3>
                    </div>
                    <div class="comentario_valor">
                        <p>
                            Cuidoo muy bien de mi perro. RECOMENDADO
                        </p>
                    </div>
                    <div class="estrellas_valor">
                        <img src="img/star2.svg" alt="">
                        <img src="img/star2.svg" alt="">
                        <img src="img/star2.svg" alt="">
                        <img src="img/star2.svg" alt="">
                        <img src="img/stargrey.svg" alt="">
                    </div>
                </div>
                <div class="valoracion">
                    <div class="usuario_valor">
                        <h3>Usuario</h3>
                    </div>
                    <div class="comentario_valor">
                        <p>
                            Cuidoo muy bien de mi perro. RECOMENDADO
                        </p>
                    </div>
                    <div class="estrellas_valor">
                        <img src="img/star2.svg" alt="">
                        <img src="img/star2.svg" alt="">
                        <img src="img/star2.svg" alt="">
                        <img src="img/star2.svg" alt="">
                        <img src="img/stargrey.svg" alt="">
                    </div>
                </div>
                <div class="valoracion">
                    <div class="usuario_valor">
                        <h3>Usuario</h3>
                    </div>
                    <div class="comentario_valor">
                        <p>
                            Cuidoo muy bien de mi perro. RECOMENDADO
                        </p>
                    </div>
                    <div class="estrellas_valor">
                        <img src="img/star2.svg" alt="">
                        <img src="img/star2.svg" alt="">
                        <img src="img/star2.svg" alt="">
                        <img src="img/star2.svg" alt="">
                        <img src="img/stargrey.svg" alt="">
                    </div>
                </div>
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