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
                    <a href="">Contacto</a>
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
    <section id='formularios'>
        <article id='reg'>
            <div class='titulo_form'>
                <h2>REGISTRARSE</h2>
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
                        <label for="">Apellidos*:</label>
                    </div>
                    <div class='input_form'>
                        <input type="text" name="" id="">
                    </div>
                </div>
                <div class='campos_busqueda'>
                    <div>
                        <label for="">Contraseña*:</label>
                    </div>
                    <div class='input_form'>
                        <input type="password" name="" id="">
                    </div>
                </div>
                <div class='campos_busqueda'>
                    <div>
                        <label for="">Repita la contraseña*:</label>
                    </div>
                    <div class='input_form'>
                        <input type="password" name="" id="">
                    </div>
                </div>                
                <div class='campos_busqueda'>
                    <div>
                        <label for="">Fecha de nacimiento*:</label> 
                    </div>
                    <div class='input_form'>
                        <input type="date" name="" id="">
                    </div>
                </div>
                <div class='campos_busqueda'>
                    <div>
                        <label for="">Teléfono*:</label>
                    </div>
                    <div class='input_form'>
                        <input type="tel" name="" id="">
                    </div>
                </div> 
                <div class='campos_busqueda'>
                    <div>
                        <label for="">Localidad*:</label>
                    </div>
                    <div class='input_form'>
                        <select name="" id="">
                            <option value="">Almería</option>
                        </select>  
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
                <div class='campos_busqueda'>
                    <div>
                        <label for="">Foto de perfil*:</label>
                    </div>
                    <div class='input_form'>
                        <input type="file" name="" id="">
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
                <div class='campos_terminos'>
                    <div>
                        <input type="checkbox" name="" id="">
                        Acepto los términos y condiciones
                    </div>                
                </div>
                <div id='div_btn_reg'>
                    <button id='btn_reg' type="submit">REGISTRARSE</button>
                </div>
            </form>
            </div>
        </article>
        <article id='ini'>
            <div class='titulo_form'>
                <h2>INICIAR SESIÓN</h2>
            </div>
            <div class='cuerpo_form'>  
            <form action="" method="post">
                <div class='campos_busqueda'>
                    <div>
                        <label for="">Usuario:</label>
                    </div>
                    <div class='input_form'>
                        <input type="text" name="" id="">
                    </div>
                </div>
                <div class='campos_busqueda'>
                    <div>
                        <label for="">Contraseña:</label>
                    </div>
                    <div class='input_form'>
                        <input type="password" name="" id="">
                    </div>
                </div>
                <div id='div_btn_inicio'>
                    <button id='btn_inicio' type="submit">ENTRAR</button>
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