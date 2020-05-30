<?php
    require "funciones_vistas.php";
    $url_const = "http://localhost/ProyectoMascotas/REST/";
    session_name("mascotas");
    session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/registro.css">
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
        <div id='contenedor_foto_perfil'>
            <?php
                if(isset($_SESSION["usuario"])){
                    $imagen = $_SESSION["usuario"]->foto;
                    echo "<a href='profile.php'><img src='img/usuarios/$imagen' alt='Usuario' id='logo_usuario'></a>";
                } 
            ?>
        </div>        
    </header>
    <section id='formularios'>
        <article id='reg'>
            <div class='titulo_form'>
                <h2>CREAR ANUNCIO</h2>
            </div>
            <div class='cuerpo_form'>  
            <form action="" method="post">
                <div class='campos_busqueda'>
                    <div>
                        <label for="titulo">Título*:</label>
                    </div>
                    <div class='input_form'>
                        <input required type="text" name="titulo" id="titulo">
                    </div>
                </div>
                <div class='campos_busqueda'>
                    <div>
                        <label for="ciudad">Ciudad*:</label>
                    </div>
                    <div class='input_form'>
                        <input required type="text" name="ciudad" id="ciudad">
                    </div>
                </div>
                <div class='campos_busqueda'>
                    <div>
                        <label for="fecha_inicio">Fecha de entrega*:</label> 
                    </div>
                    <div class='input_form'>
                        <input required type="date" name="fecha_inicio" id="fecha_inicio">
                    </div>
                </div>
                <div class='campos_busqueda'>
                    <div>
                        <label for="fecha_devolucion">Fecha de devolución*:</label> 
                    </div>
                    <div class='input_form'>
                        <input required type="date" name="fecha_devolucion" id="fecha_devolucion">
                    </div>
                </div>
                <div class='campos_busqueda'>
                    <div>
                        <label for="hora_entrega">Hora de entrega*:</label>
                    </div>
                    <div class='input_form'>
                        <input required type="time" value= "00:00" name="hora_entrega" id="hora_entrega">
                    </div>
                </div> 
                <div class='campos_busqueda'>
                    <div>
                        <label for="hora_devolucion">Hora de devolución*:</label>
                    </div>
                    <div class='input_form'>
                        <input required type="time" value= "00:00" name="hora_devolucion" id="hora_devolucion">
                    </div>
                </div> 
                <div class='campos_busqueda'>
                    <div>
                        <label for="tipo_mascota">Tipo de Mascota*:</label>
                    </div>
                    <div class='input_form'>
                        <select name="tipo_mascota" id="tipo_mascota">
                            <option value="Perro">Perro</option>
                            <option value="Gato">Gato</option>
                            <option value="Otros">Otros</option>
                        </select>  
                    </div>                    
                </div>
                <div class='campos_busqueda'>
                    <div>
                        <label for="descripcion">Descripción*:</label>
                    </div>
                    <div class='input_form'>
                        <textarea required name="descripcion" id="descripcion"></textarea>
                    </div>                    
                </div>
                <div class='campos_busqueda'>
                    <div>
                        <label for="foto_anuncio">Foto del anuncio*:</label>
                    </div>
                    <div class='input_form'>
                        <input required type="file" name="foto_anuncio" id="foto_anuncio">
                    </div>                    
                </div>
                <div id='btn_pub_anuncio'>
                    <button id='btn_pub_anuncio' name='btn_publicar_anuncio' type="submit">PUBLICAR ANUNCIO</button>
                </div>
            </form>
            </div>
        </article>
        
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