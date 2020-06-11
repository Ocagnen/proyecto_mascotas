<?php
    session_name("mascotas");
    session_start();
    
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/contacto.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet"> 
    <script src="jq/jquery-3.1.1.min.js" type="text/javascript"></script>	
    <script src="js/script.js"></script>
    <title>Contacto</title>
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
    <section>
        <picture id='imagen_cabecera'>
            <img width='100%' src="img/contacto2.jpg" alt="cabecera">
        </picture>
    </section>
    <section id='bloques_contacto'>
        <article id='correo'>
            <div class='titulo_form'>
                <h2>CONTACTA CON NOSOTROS</h2>
            </div>
            <div class='cuerpo_form'>  
            <form action="" method="post">
                <div class='campos_busqueda'>
                    <div>
                        <label for="">Nombre*:</label>
                    </div>
                    <div class='input_form'>
                        <input type="text" name="" id="">
                    </div>
                </div>
                <div class='campos_busqueda'>
                    <div>
                        <label for="">Email*:</label>
                    </div>
                    <div class='input_form'>
                        <input type="email" name="" id="">
                    </div>                    
                </div>
                <div class='campos_busqueda'>
                    <div>
                        <label for="">Descripción:</label>
                    </div>
                    <div class='input_form'>
                        <textarea name="" id=""></textarea>
                    </div>                    
                </div>                
                <div id='div_btn_enviar_cont'>
                    <button id='btn_enviar_cont' type="submit">ENVIAR</button>
                </div>
            </form>
            </div>
        </article>
        <article id="redes_sociales_contacto">
            <div class='titulo_form'>
                <h2>NUESTRAS REDES SOCIALES</h2>
            </div>
            <div id="contenido_redes_sociales">
                <div>
                    <img src="img/socialMedia/instagram.svg" alt="">
                    <a href="">@AuPet</a>
                </div>
                <div>
                    <img src="img/socialMedia/facebook2.svg" alt="">
                    <a href="">AuPet España</a>
                </div>
            </div>
        </article>
        <article id="fqa">
            <div class="titulo_form">
                <h2>
                    PREGUNTAS MÁS FRECUENTES
                </h2>
            </div>
            <div id="container_preguntas">
                <div class="preguntas_frec">
                    <div class="pregunta">
                        <h3>¿Cómo me registro?</h3>
                    </div>
                    <div class="respuesta">
                        <p>Desde la sección de "Registrarse" del menú superior de nuestra web podrá acceder a un formulario donde podrá registrarse.</p>
                    </div>
                </div>
                <div class="preguntas_frec">
                    <div class="pregunta">
                        <h3>¿Qué tipos de animales se aceptan?</h3>
                    </div>
                    <div class="respuesta">
                        <p>En Au Pet aceptamos todo tipo de animales. No obstante en nuestras categorías tenemos perros, gatos y otros. Todo lo que no sea un perro o un gato podrá incluirlo en otros.</p>
                    </div>
                </div>
                <div class="preguntas_frec">
                    <div class="pregunta">
                        <h3>¿Dónde se introducen los códigos de entrega y recogida?</h3>
                    </div>
                    <div class="respuesta">  
                        <p>En nuestro perfil debemos acceder a "Transacciones" y gestionar la transacción concreta para la que queremos subir los códigos. Una vez dentro veremos unos botones en la sección de códigos que nos permitirá subir nuestros códigos.</p>
                    </div> 
                </div>
                <div class="preguntas_frec">
                    <div class="pregunta">
                        <h3>¿Cómo puedo enviar una solicitud?</h3>
                    </div>
                    <div class="respuesta">
                        <p>En primer lugar debe estar registrado en nuestra web. Una registrado, inicie sesión y pulse el botón "Solicitar" del anuncio que le interese. Deberá establecer también la tarifa que desea cobrar por sus servicios al anunciante.</p>
                    </div> 
                </div>
                <div class="preguntas_frec">
                    <div class="pregunta">
                        <h3>¿Cómo puedo visitar mi perfil?</h3>
                    </div>
                    <div class="respuesta">
                        <p>Deberá iniciar sesión y posteriormente pulsar la foto de su perfil que aparecerá en la parte derecha del menú superior de la web.</p>
                    </div>
                </div>
                <div class="preguntas_frec">
                    <div class="pregunta">
                        <h3>¿Cómo comento en el perfil de un usuario?</h3>
                    </div>
                    <div class="respuesta">
                        <p>Para comentar el perfil de un usuario será necesario haber iniciado una transacción con este. Una vez tengan una transacción podrá comentar el perfil al acceder a la sección de "Transacciones" de nuestro perfil y haciendo sí sobre la opción de comentar perfil de la transacción en la que está el usuario al que desea dejarle un comentario.</p>
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