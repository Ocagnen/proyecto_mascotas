<?php
    session_name("mascotas");
    session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/terminos.css">
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
    <section id='contenido'>
        <article class='contenido_terminos'>
            <div class='titular_info'>
                <div class='titulo_titular'>
                    <h2>Términos y condiciones</h2>
                </div>
            </div>
            <div id='texto_terminos'>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ut odio eget ex ultricies
                    blandit ac quis dolor. Proin dignissim sodales ante ut ullamcorper. Morbi dapibus egestas eros
                    tincidunt condimentum. Ut vel elit vitae nunc aliquam vestibulum. Curabitur ultrices faucibus 
                    interdum. Maecenas eleifend tincidunt massa, vitae ullamcorper velit sagittis in. Proin vitae
                    elit et ex porta consectetur. Vivamus tincidunt ligula vulputate, tincidunt mi at, pharetra nulla.
                    Integer fringilla tincidunt sem, vel sodales felis malesuada at. Nam gravida ac erat at gravida. 
                    In sit amet tortor ac nisl tincidunt hendrerit. Nunc ultricies, risus eu elementum fringilla, tellus
                    augue eleifend arcu, ac porttitor urna ligula non lectus. Sed non mauris in quam dapibus ullamcorper. 
                    Nulla pretium dolor at est ullamcorper, sit amet posuere enim mattis.                   
                </p>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ut odio eget ex ultricies
                    blandit ac quis dolor. Proin dignissim sodales ante ut ullamcorper. Morbi dapibus egestas eros
                    tincidunt condimentum. Ut vel elit vitae nunc aliquam vestibulum. Curabitur ultrices faucibus 
                    interdum. Maecenas eleifend tincidunt massa, vitae ullamcorper velit sagittis in. Proin vitae
                    elit et ex porta consectetur. Vivamus tincidunt ligula vulputate, tincidunt mi at, pharetra nulla.
                    Integer fringilla tincidunt sem, vel sodales felis malesuada at. Nam gravida ac erat at gravida. 
                    In sit amet tortor ac nisl tincidunt hendrerit. Nunc ultricies, risus eu elementum fringilla, tellus
                    augue eleifend arcu, ac porttitor urna ligula non lectus. Sed non mauris in quam dapibus ullamcorper. 
                    Nulla pretium dolor at est ullamcorper, sit amet posuere enim mattis.                   
                </p>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ut odio eget ex ultricies
                    blandit ac quis dolor. Proin dignissim sodales ante ut ullamcorper. Morbi dapibus egestas eros
                    tincidunt condimentum. Ut vel elit vitae nunc aliquam vestibulum. Curabitur ultrices faucibus 
                    interdum. Maecenas eleifend tincidunt massa, vitae ullamcorper velit sagittis in. Proin vitae
                    elit et ex porta consectetur. Vivamus tincidunt ligula vulputate, tincidunt mi at, pharetra nulla.
                    Integer fringilla tincidunt sem, vel sodales felis malesuada at. Nam gravida ac erat at gravida. 
                    In sit amet tortor ac nisl tincidunt hendrerit. Nunc ultricies, risus eu elementum fringilla, tellus
                    augue eleifend arcu, ac porttitor urna ligula non lectus. Sed non mauris in quam dapibus ullamcorper. 
                    Nulla pretium dolor at est ullamcorper, sit amet posuere enim mattis.                   
                </p>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ut odio eget ex ultricies
                    blandit ac quis dolor. Proin dignissim sodales ante ut ullamcorper. Morbi dapibus egestas eros
                    tincidunt condimentum. Ut vel elit vitae nunc aliquam vestibulum. Curabitur ultrices faucibus 
                    interdum. Maecenas eleifend tincidunt massa, vitae ullamcorper velit sagittis in. Proin vitae
                    elit et ex porta consectetur. Vivamus tincidunt ligula vulputate, tincidunt mi at, pharetra nulla.
                    Integer fringilla tincidunt sem, vel sodales felis malesuada at. Nam gravida ac erat at gravida. 
                    In sit amet tortor ac nisl tincidunt hendrerit. Nunc ultricies, risus eu elementum fringilla, tellus
                    augue eleifend arcu, ac porttitor urna ligula non lectus. Sed non mauris in quam dapibus ullamcorper. 
                    Nulla pretium dolor at est ullamcorper, sit amet posuere enim mattis.                   
                </p>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ut odio eget ex ultricies
                    blandit ac quis dolor. Proin dignissim sodales ante ut ullamcorper. Morbi dapibus egestas eros
                    tincidunt condimentum. Ut vel elit vitae nunc aliquam vestibulum. Curabitur ultrices faucibus 
                    interdum. Maecenas eleifend tincidunt massa, vitae ullamcorper velit sagittis in. Proin vitae
                    elit et ex porta consectetur. Vivamus tincidunt ligula vulputate, tincidunt mi at, pharetra nulla.
                    Integer fringilla tincidunt sem, vel sodales felis malesuada at. Nam gravida ac erat at gravida. 
                    In sit amet tortor ac nisl tincidunt hendrerit. Nunc ultricies, risus eu elementum fringilla, tellus
                    augue eleifend arcu, ac porttitor urna ligula non lectus. Sed non mauris in quam dapibus ullamcorper. 
                    Nulla pretium dolor at est ullamcorper, sit amet posuere enim mattis.                   
                </p>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ut odio eget ex ultricies
                    blandit ac quis dolor. Proin dignissim sodales ante ut ullamcorper. Morbi dapibus egestas eros
                    tincidunt condimentum. Ut vel elit vitae nunc aliquam vestibulum. Curabitur ultrices faucibus 
                    interdum. Maecenas eleifend tincidunt massa, vitae ullamcorper velit sagittis in. Proin vitae
                    elit et ex porta consectetur. Vivamus tincidunt ligula vulputate, tincidunt mi at, pharetra nulla.
                    Integer fringilla tincidunt sem, vel sodales felis malesuada at. Nam gravida ac erat at gravida. 
                    In sit amet tortor ac nisl tincidunt hendrerit. Nunc ultricies, risus eu elementum fringilla, tellus
                    augue eleifend arcu, ac porttitor urna ligula non lectus. Sed non mauris in quam dapibus ullamcorper. 
                    Nulla pretium dolor at est ullamcorper, sit amet posuere enim mattis.                   
                </p>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ut odio eget ex ultricies
                    blandit ac quis dolor. Proin dignissim sodales ante ut ullamcorper. Morbi dapibus egestas eros
                    tincidunt condimentum. Ut vel elit vitae nunc aliquam vestibulum. Curabitur ultrices faucibus 
                    interdum. Maecenas eleifend tincidunt massa, vitae ullamcorper velit sagittis in. Proin vitae
                    elit et ex porta consectetur. Vivamus tincidunt ligula vulputate, tincidunt mi at, pharetra nulla.
                    Integer fringilla tincidunt sem, vel sodales felis malesuada at. Nam gravida ac erat at gravida. 
                    In sit amet tortor ac nisl tincidunt hendrerit. Nunc ultricies, risus eu elementum fringilla, tellus
                    augue eleifend arcu, ac porttitor urna ligula non lectus. Sed non mauris in quam dapibus ullamcorper. 
                    Nulla pretium dolor at est ullamcorper, sit amet posuere enim mattis.                   
                </p>
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