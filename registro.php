<?php

    require "funciones_vistas.php";
    $url_const = "http://localhost/ProyectoMascotas/REST/";
    session_name("mascotas");
    session_start();

    $error_login = false;
    if(isset($_POST["btn_inicio"])){
        $valores = comprobarLogin($_POST["correo_log"],$_POST["pass_log"],$url_const);
        if(isset($valores["usuario"])){
            $_SESSION["usuario"] = $valores["usuario"];
            header("Location:index.php");
            exit;
        } else {
            $error_login = true;
        }
    }

    $error_edad = false;
    $error_imagen = false;
    $error_correo = false;
    if(isset($_POST["btn_reg"])){
         $fecha_introducida = new DateTime($_POST["fecha_nac"]);
         $fecha_limite = new DateTime('-18 years');

         $error_imagen = ( $_FILES['foto_perfil']['name']!="" && (!getimagesize($_FILES['foto_perfil']['tmp_name']) || $_FILES['foto_perfil']['size']>500000));	

         if($fecha_introducida > $fecha_limite){
             $error_edad = true;
         } 

         if(isset($_POST["correo_reg"])){
             $correo_comprobar = comprobarCorreo($_POST["correo_reg"],$url_const);

             if(isset($correo_comprobar["true"])){
                 $error_correo = true;
             } 
         }

         if(!$error_edad && !$error_imagen && !$error_correo){
             $terminos = false;
             if(isset($_POST["terms"])){
                $terminos = true;
             }
             if(!isset($_POST["descripcion"])){
                $descripcion = "";
             } else {
                 $descripcion = $_POST["descripcion"];
             }
            $usuarioCreado = crearUsuario($_POST["nombre"],$_POST["apellidos"],$_POST["fecha_nac"],$_POST["localidad"],$_FILES['foto_perfil']['name'],$_POST["contrasenia"],$_POST["correo_reg"],$_POST["telefono"],$descripcion,$terminos,0,$url_const);
             if(isset($usuarioCreado["mensaje"])){
                $valores = comprobarLogin($_POST["correo_reg"],$_POST["contrasenia"],$url_const);
                if(isset($valores["usuario"])){
                    session_destroy();
                    session_name("mascotas");
                    session_start();
                    $_SESSION["usuario"] = $valores["usuario"];
                    header("Location:index.php");
                    exit;
                }
             }
        } else {
            $_SESSION["mensaje_error"] = "Error en el formulario. Por favor, revíselo.";
        }


    }
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
    <?php
        if(isset($_SESSION["mensaje_error"])){
            echo "<p class='mensaje_cancel'>".$_SESSION['mensaje_error']."</p>";
            unset($_SESSION["mensaje_error"]);
        }
    ?>
    <section id='formularios'>
        <article id='reg'>
            <div class='titulo_form'>
                <h2>REGISTRARSE</h2>
            </div>
            <div class='cuerpo_form'>  
            <form action="registro.php" method="post" enctype="multipart/form-data">
                <div class='campos_busqueda'>
                    <div>
                        <label for="nombre">Nombre*:</label>
                    </div>
                    <div class='input_form'>
                        <input required type="text" name="nombre"  value='<?php
                            if(isset($_POST["nombre"])){
                                echo $_POST["nombre"];
                            }
                        ?>'>
                    </div>
                </div>
                <div class='campos_busqueda'>
                    <div>
                        <label for="apellidos">Apellidos*:</label>
                    </div>
                    <div class='input_form'>
                        <input required type="text" name="apellidos" value='<?php
                            if(isset($_POST["apellidos"])){
                                echo $_POST["apellidos"];
                            }
                        ?>'>
                    </div>
                </div>
                <div class='campos_busqueda'>
                    <div>
                        <label for="contrasenia">Contraseña*:</label>
                    </div>
                    <div class='input_form'>
                        <input required type="password" name="contrasenia">
                    </div>
                </div>               
                <div class='campos_busqueda'>
                    <div>
                        <label for="fecha_nac">Fecha de nacimiento*:</label> 
                        <?php
                            if($error_edad){
                                echo "<p class='error_foto'>Debe ser mayor de edad para poder registrarse</p>";
                            }
                        ?>
                    </div>
                    <div class='input_form'>
                        <input required type="date" name="fecha_nac" value='<?php
                            if(isset($_POST["fecha_nac"])){
                                echo $_POST["fecha_nac"];
                            }
                        ?>' >
                    </div>
                </div>
                <div class='campos_busqueda'>
                    <div>
                        <label for="telefono">Teléfono móvil*:</label>
                    </div>
                    <div class='input_form'>
                        <input placeholder="Ejemplo: 675568934" oninvalid="this.setCustomValidity('Debe introducir un teléfono válido')" required type="text" pattern="[0-9]{9}" name="telefono" value='<?php
                            if(isset($_POST["telefono"])){
                                echo $_POST["telefono"];
                            }
                        ?>'>
                    </div>
                </div> 
                <div class='campos_busqueda'>
                    <div>
                        <label for="localidad">Localidad*:</label>
                    </div>
                    <div class='input_form'>
                        <input required type="text" name="localidad" value='<?php
                            if(isset($_POST["localidad"])){
                                echo $_POST["localidad"];
                            }
                        ?>'>
                    </div>                
                </div>
                <div class='campos_busqueda'>
                    <div>
                        <label for="descripcion">Descripción:</label>
                    </div>
                    <div class='input_form'>
                        <textarea name="descripcion"><?php
                            if(isset($_POST["descripcion"])){
                                echo $_POST["descripcion"];
                            }
                        ?></textarea>
                    </div>                    
                </div>
                <div class='campos_busqueda'>
                    <div>
                        <label for="foto_perfil">Foto de perfil*:</label>
                        <?php
                            if($error_imagen){
                                if(!getimagesize($_FILES['foto_perfil']['tmp_name'])){
                                    echo "<p class='error_foto'>Error: El archivo debe de ser una imagen.</p>";
                                } else if ($_FILES['foto_perfil']['size']>500000) {
                                    echo "<p class='error_foto'>Error: El archivo es demasiado grande.</p>";
                                }else {
                                    echo "<p class='error_foto'>Error en el servidor</p>";
                                }
                            }
                        ?>
                    </div>
                    <div class='input_form'>
                        <input required type="file" accept='image/*' name="foto_perfil">
                    </div>                    
                </div>
                <div class='campos_busqueda'>
                    <div>
                        <label for="correo_reg">Email*:</label>
                        <?php
                            if($error_correo){
                                echo "<p class='error_foto'>Este correo no está disponible. Introduzca otro por favor.</p>";
                            }
                        ?>
                    </div>
                    <div class='input_form'>
                        <input required type="email" name="correo_reg" value='<?php
                            if(isset($_POST["correo_reg"])){
                                echo $_POST["correo_reg"];
                            }
                        ?>'>
                    </div>                    
                </div>
                <div class='campos_terminos'>
                    <div>
                        <input type="checkbox" name="terms" >
                        <a  target ="_blank" href='terminos.php'>Acepto los términos y condiciones</a>
                    </div>                
                </div>
                <div id='div_btn_reg'>
                    <button id='btn_reg' name='btn_reg' type="submit">REGISTRARSE</button>
                </div>
            </form>
            </div>
        </article>
        <article id='ini'>
            <div class='titulo_form'>
                <h2>INICIAR SESIÓN</h2>
                <?php
                    if($error_login){
                        echo "<h3 style='color:red'>Usuario incorrecto</h3>";
                    }
                ?>
            </div>
            <div class='cuerpo_form'>  
            <form action="registro.php" method="post">
                <div class='campos_busqueda'>
                    <div>
                        <label for="correo_log">Correo:</label>
                    </div>
                    <div class='input_form'>
                        <input required type="text" name="correo_log" id="correo_log" value='<?php
                            if(isset($_POST["btn_inicio"])){
                                echo $_POST["correo_log"];
                            }
                        ?>'>
                    </div>
                </div>
                <div class='campos_busqueda'>
                    <div>
                        <label for="pass_log">Contraseña:</label>
                    </div>
                    <div class='input_form'>
                        <input required type="password" name="pass_log" id="pass_log">
                    </div>
                </div>
                <div id='div_btn_inicio'>
                    <button id='btn_inicio' name="btn_inicio" type="submit">ENTRAR</button>
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