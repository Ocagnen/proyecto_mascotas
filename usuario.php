<?php
session_name("mascotas");
session_start();
$url_const = "http://localhost/ProyectoMascotas/REST/";
require "funciones_vistas.php";

if(!isset($_SESSION["usuario"])){
    header("Location:index.php");
    exit;
}


if (isset($_SESSION["idAutor"])) {
    $usuarioVisitado = obtenerUsuario($_SESSION["idAutor"], $url_const);
}

if(isset($_POST["btn_acceder_coment"])){
    if($_POST["btn_acceder_coment"]==$_SESSION["usuario"]->idUsuario){
        header("Location: profile.php");
        exit;
    }
    $_SESSION["idAutor"] = $_POST["btn_acceder_coment"];
    header("Location: usuario.php");
    exit;
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
            if (isset($_SESSION["usuario"])) {
                $imagen = $_SESSION["usuario"]->foto;
                echo "<div id='contenedor_foto_perfil'><a href='profile.php'><img src='img/usuarios/$imagen' alt='Usuario' id='logo_usuario'></a></div>";
            }
            ?>
        
    </header>
    <section id="container_usuario">
        <article id='datos_usuario'>
            <div id='nombre_usu'>
                <h3><?php echo $usuarioVisitado["usuario"]->nombre;
                    echo "&nbsp;";
                    echo $usuarioVisitado["usuario"]->apellidos; ?></h3>
            </div>
            <div id='foto_usu'>
                <img src="img/usuarios/<?php echo $usuarioVisitado["usuario"]->foto; ?>" alt="">
                <div id="promedio" class="estrellas_valor">
                    <?php
                    $valoracion = obtenerValoracionMedia($usuarioVisitado["usuario"]->idUsuario, $url_const);
                    if($valoracion!=-1){                   
                  
                        for ($i=0; $i < $valoracion ; $i++) { 
                            echo "<img src='img/star2.svg' alt='valoracion positiva'>"; 
                        }
    
                        for ($i=0; $i < (5 -$valoracion) ; $i++) { 
                            echo "<img src='img/stargrey.svg' alt='valoracion negativa'>";
                        }
                    }
                    ?>
                </div>
            </div>
            <div id='desc_usu'>
                <p>
                    <i>"<?php 
                    if($usuarioVisitado["usuario"]->descripcion == ""){
                        echo "Sin descripción";
                    } else {
                        echo $usuarioVisitado["usuario"]->descripcion;
                    }
                    ?>"</i>
                </p>
            </div>
        </article>
        <article id='valoraciones'>
            <div id='valoraciones_usu'>
                <?php
                $valoraciones_array = getValoraciones($usuarioVisitado["usuario"]->idUsuario, $url_const);
                if (isset($valoraciones_array["mensaje"])) {
                    echo "<h3>No existen valoraciones para este usuario</h3>";
                } else if (isset($valoraciones_array["valoraciones"])) {
                    foreach ($valoraciones_array as $key => $value) {
                        foreach ($value as $key2 => $value2) {
                            $usuarioEscritor = obtenerUsuario($value2->idUsuarioEscritor, $url_const);
                            echo "<div class='valoracion'>";
                            echo "<div class='usuario_valor'>";
                            echo "<h3><form method='post' action='usuario.php'>";
                            echo "<button type='submit' value='" . $usuarioEscritor['usuario']->idUsuario . "' name='btn_acceder_coment' class='btn_acceder_coment'>" . $usuarioEscritor['usuario']->nombre . "&nbsp;" . $usuarioEscritor['usuario']->apellidos . "</button></h3>";
                            echo "</div>";
                            echo "<div class='comentario_valor'>";
                            echo "<p>";
                            echo $value2->comentario;
                            echo "</p>";
                            echo "</div>";
                            echo "<div class='estrellas_valor'>";
                            for ($i = 0; $i < $value2->valor; $i++) {
                                echo "<img src='img/star2.svg' alt='valoracion positiva'>";
                            }
                            for ($i = 0; $i < (5 - $value2->valor); $i++) {
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