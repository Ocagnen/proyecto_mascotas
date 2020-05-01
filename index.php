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
            <h1 id='titular_web'>Mascotas</h1>
            <img src="img/logo.svg" alt="logo_empresa" id='logo_empresa'>
        </div>
        <div id='wrapper'>
            <img id='bars' src="img/bars_green.svg" alt="">
        </div>
        <div id='cabecera_lista'>            
            <nav id='menu_cabecera'>
                <div>
                    <a href="">Inicio</a>
                </div>
                <div>
                    <a href="">Terminos y condiciones</a>
                </div>
                <div>
                    <a href="">Contacto</a>
                </div>
                <div>
                    <a href="">Iniciar Sesión</a>
                </div>
                <div>
                    <a href="">Registrarse</a>
                </div>
            </nav>
        </div>
        <div>
            <a href=""><img src="img/usuarios/usuario1.jpg" alt="Usuario" id="logo_usuario"></a>
        </div>        
    </header>
    <section>
    <div id='imagen_cabecera'>
            <img width='100%' src="img/cabecera2.jpg" alt="cabecera">
        </div>
    </section>
    <section id='form_inicio'>
        <div>
            <form action="" method="post">
                <div class='campos_busqueda'>
                    <div>
                        <label for="">Fecha de entrega:</label>
                    </div>
                    <div>
                        <input type="date" name="" id="">
                    </div>
                </div>
                <div class='campos_busqueda'>
                    <div>
                        <label for="">Hora de entrega desde las:</label>
                    </div>
                    <div>
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
                    <div>
                        <input type="date" name="" id="">
                    </div>
                </div>
                <div class='campos_busqueda'>
                    <div>
                        <label for="">Hora de recogida desde las:</label>
                    </div>
                    <div>
                        <select name="" id="">
                            <option value="">00:00</option>
                        </select>  
                    </div>                    
                </div>
                <div class='campos_busqueda'>
                    <div>
                        <label for="">Localidad:</label>
                    </div>
                    <div>
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
                <div>
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
                <div class='img_anuncio'>
                    <img src="img/anuncio1.jpg" alt="">
                </div>
                <div>
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
                <div class='img_anuncio'>
                    <img src="img/anuncio1.jpg" alt="">
                </div>
                <div>
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
    <section>
        <article>
            <div>
                <h2>Como usar la aplicación</h2>
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
        <article>
            <div>
                <h2>Como garantizamos la seguridad de nuestros usuarios</h2>
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
        <div>
            <img src="" alt="">
            <h3>PROYECTO</h3>
        </div>
        <div>
            <ul>
                <li>
                    <a href="">Link1</a>
                </li>
                <li>
                    <a href="">Link1</a>
                </li>
                <li>
                    <a href="">Link1</a>
                </li>
                <li>
                    <a href="">Link1</a>
                </li>
            </ul>
        </div>
        <div>
            <img src="img/socialMedia/facebook.svg" alt="">
            <img src="img/socialMedia/facebook.svg" alt="">
        </div>
    </footer>
</body>
</html>