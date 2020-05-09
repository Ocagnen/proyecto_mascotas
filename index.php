<?php
    session_name("mascotas");
    session_start();
    $url_const = "http://localhost/ProyectoMascotas/REST/";
    require "funciones_vistas.php";

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilosLanding.css">
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
                    <a href="registro.php">Iniciar Sesión</a>
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
                    echo "<a href='usuario.php'><img src='img/usuarios/$imagen' alt='Usuario' id='logo_usuario'></a>";
                } 
            ?>
        </div>        
    </header>
    <section>
        <picture id='imagen_cabecera'>
            <img width='100%' src="img/cabecera3.jpg" alt="cabecera">
        </picture>
    </section>
    <section id='form_inicio'>
        <div>
            <form action="" method="post">
                <div class='campos_busqueda'>
                    <div>
                        <label for="">Fecha de entrega:</label>
                    </div>
                    <div class='input_form'>
                        <input type="date" name="" id="">
                    </div>
                </div>
                <div class='campos_busqueda'>
                    <div>
                        <label for="">Hora de entrega desde las:</label>
                    </div>
                    <div class='input_form'>
                        <select name="" id="">
                            <option value="">00:00</option>
                            <option value="">01:00</option>
                        </select>
                    </div>                    
                </div>
                <div class='campos_busqueda'>
                    <div>
                        <label for="">Fecha de recogida:</label> 
                    </div>
                    <div class='input_form'>
                        <input type="date" name="" id="">
                    </div>
                </div>
                <div class='campos_busqueda'>
                    <div>
                        <label for="">Hora de recogida desde las:</label>
                    </div>
                    <div class='input_form'>
                        <select name="" id="">
                            <option value="">00:00</option>
                        </select>  
                    </div>                    
                </div>
                <div class='campos_busqueda'>
                    <div>
                        <label for="">Localidad:</label>
                    </div>
                    <div class='input_form'>
                        <select name="" id="">
                            <option value="">Almería</option>
                        </select>
                    </div>                    
                </div>
                <div id='div_btn_filt'>
                    <button id='btn_filtrar' type="submit">FILTRAR</button>
                </div>
            </form>
        </div>        
    </section>
    <section id='anuncios'>
        <div>
            <h2>ANUNCIOS</h2>
        </div>
        <div id='tipos_mascota'>
            <div>
                <button><img src="img/logo.svg" alt=""></button>
            </div>
            <div>
                <button><img src="img/cats.svg" alt=""></button>
            </div>
            <div>
                <button><img src="img/pets.svg" alt=""></button>
            </div>
        </div>
        <div id='contenido_anuncios'>
            <?php
                $anuncios = getAnuncios($url_const);
                if(isset($anuncios["mensaje"])){
                    echo "<h3>No existen anuncios en este momento</h3>";
                } else if(isset($anuncios["anuncios"])){
                    foreach ($anuncios as $key => $value) {
                        foreach ($value as $key2 => $value2) {
                            echo "<article>";
                                echo "<div class='img_anuncio'>";
                                    echo "<img src='img/$value2->foto' alt='$value2->foto'>";
                                echo "</div>";
                                echo "<div class='container_tabla'>";
                                echo "<table>";
                                    echo "<tr>";
                                        echo "<th>Fecha de entrega</th>";
                                        echo "<td>".date_format(date_create($value2->fecha_entrega),"d/m/Y")." a las ".date_format(date_create($value2->hora_entrega),'H:i')."</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                        echo "<th>Fecha de recogida</th>";
                                        echo "<td>".date_format(date_create($value2->fecha_devolucion),"d/m/Y")." a las ".date_format(date_create($value2->hora_devolucion),'H:i')."</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                        echo "<th>Tipo de mascota</th>";
                                        echo "<td><img src='img/".obtenerTipo($value2->tipo_mascota)."' alt='tipo de mascota'></td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                        echo "<th>Descripción</th>";
                                        echo "<td>".$value2->descripcion."</td>";
                                    echo "</tr>";
                                echo "</table>";
                                echo "</div>";
                                echo "<div class='botones_anuncio'>";
                                    echo "<div class='boton_usuario'>";
                                        echo "<button>".obtenerUsuario($value2->idUsuarioAutor,$url_const)["usuario"]->nombre." ".obtenerUsuario($value2->idUsuarioAutor,$url_const)["usuario"]->apellidos."</button>";
                                    echo "</div>";
                                    echo "<div class='boton_solicitar'>";
                                        echo "<button>Solicitar</button>";
                                    echo "</div>";
                                echo "</div>";
                            echo "</article>";
                        }
                    }
                }
            ?>
            
        </div>
    </section>
    <section id='contenido'>
        <article class='contenido_landing'>
            <div class='titular_info'>
                <picture class='img_titular'>
                    <img src="img/question.svg" width='50px' alt="">
                </picture>
                <div class='titulo_titular'>
                    <h2>Cómo usar la aplicación</h2>
                </div>
            </div>
            <div>
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
        <article class='contenido_landing'>
            <div class='titular_info'>
                <picture class='img_titular'>
                    <img src="img/secure.svg" width='50px' alt="">
                </picture>
                <div class='titulo_titular'>
                    <h2>Cómo garantizamos la seguridad de nuestros usuarios</h2>
                </div>
            </div>
            <div>
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