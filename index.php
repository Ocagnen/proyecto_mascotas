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
            <a href=""><img src="img/usuarios/usuario1.jpg" alt="Usuario" id="logo_usuario"></a>
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
            <article>
                <div class='img_anuncio'>
                    <img src="img/anuncio1.jpg" alt="">
                </div>
                <div class='container_tabla'>
                   <table>
                       <tr>
                           <th>Fecha de entrega</th>
                           <td>10/02/2020 a las 12:20</td>
                       </tr>
                       <tr>
                           <th>Fecha de recogida</th>
                           <td>14/02/2020 a las 12:20</td>
                       </tr>
                       <tr>
                           <th>Tipo de mascota</th>
                           <td><img src="img/cats.svg" alt=""></td>
                       </tr>
                       <tr>
                           <th>Descripción</th>
                           <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ut odio eget ex ultricies
                    blandit ac quis dolor. Proin dignissim sodales ante ut ullamcorper. Morbi dapibus egestas eros
                    tincidunt condimentum.</td>
                       </tr>
                   </table>
                </div>
                <div class='botones_anuncio'>
                    <div class='boton_usuario'>
                        <button>Javier Ocaña Infante</button>
                    </div>
                    <div class='boton_solicitar'>
                        <button>Solicitar</button>
                    </div>
                </div>
            </article>
            <article>
                <picture class='img_anuncio'>
                    <img src="img/anuncio1.jpg" alt="">
                </picture>
                <div class='container_tabla'>
                <table>
                       <tr>
                           <th>Fecha de entrega</th>
                           <td>10/02/2020 a las 12:20</td>
                       </tr>
                       <tr>
                           <th>Fecha de recogida</th>
                           <td>14/02/2020 a las 12:20</td>
                       </tr>
                       <tr>
                           <th>Tipo de mascota</th>
                           <td><img src="img/pets.svg" alt=""></td>
                       </tr>
                       <tr>
                           <th>Descripción</th>
                           <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ut odio eget ex ultricies
                    blandit ac quis dolor. Proin dignissim sodales ante ut ullamcorper. Morbi dapibus egestas eros
                    tincidunt condimentum.</td>
                       </tr>
                   </table>
                </div>
                <div class='botones_anuncio' >
                    <div class='boton_usuario' >
                        <button>Javier Ocaña Infante</button>
                    </div>
                    <div class='boton_solicitar'>
                        <button>Solicitar</button>
                    </div>
                </div>
            </article>
            <article>
                <picture class='img_anuncio'>
                    <img src="img/anuncio1.jpg" alt="">
                </picture>
                <div class='container_tabla'>
                <table>
                       <tr>
                           <th>Fecha de entrega</th>
                           <td>10/02/2020 a las 12:20</td>
                       </tr>
                       <tr>
                           <th>Fecha de recogida</th>
                           <td>14/02/2020 a las 12:20</td>
                       </tr>
                       <tr>
                           <th>Tipo de mascota</th>
                           <td><img src="img/logo.svg" alt=""></td>
                       </tr>
                       <tr>
                           <th>Descripción</th>
                           <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ut odio eget ex ultricies
                    blandit ac quis dolor. Proin dignissim sodales ante ut ullamcorper. Morbi dapibus egestas eros
                    tincidunt condimentum.</td>
                       </tr>
                   </table>
                </div>
                <div class='botones_anuncio'>
                    <div class='boton_usuario'>
                        <button>Javier Ocaña Infante</button>
                    </div>
                    <div class='boton_solicitar'>
                        <button>Solicitar</button>
                    </div>
                </div>
            </article>
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
                <a href="">¿Dónde me registro?</a>
            </div>
            <div class='enlace_footer'>
                <a href="">¿Cómo inicio sesión?</a>
            </div>
            <div class='enlace_footer'>
                <a href="">Contacto</a>
            </div>
            <div class='enlace_footer'>
                <a href="">Términos y condiciones</a>
            </div>
            <div class='enlace_footer'>
                <a href="">Preguntas frecuentes</a>
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