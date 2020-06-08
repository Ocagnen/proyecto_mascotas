<?php
    require "funciones_vistas.php";
    $url_const = "http://localhost/ProyectoMascotas/REST/";
    session_name("mascotas");
    session_start();

    if(!isset($_SESSION["anuncio"])){
        header("Location: index.php");
        exit;
    } else {
        $anuncioEditado = obtenerAnuncio($_SESSION["anuncio"],$url_const);
    }
    

    $error_fecha = false;
    $error_imagen = false;
    $error_hora = false;

    if(isset($_POST["btn_publicar_anuncio"])){
        if($_POST["fecha_inicio"]>$_POST["fecha_devolucion"]){
            $error_fecha = true;
        } else if ($_POST["fecha_inicio"]==$_POST["fecha_devolucion"]){
            if($_POST["hora_entrega"]>$_POST["hora_devolucion"]){
                $error_hora = true;
            }
        }

        if(isset($_FILES["foto_anuncio"])){
            $error_imagen = ( $_FILES['foto_anuncio']['name']!="" && (!getimagesize($_FILES['foto_anuncio']['tmp_name']) || $_FILES['foto_anuncio']['size']>500000));	
        }
        
        if(!$error_fecha && !$error_imagen && !$error_hora){
            $editarAnuncio = editarAnuncio($_SESSION["anuncio"],$_POST["descripcion"],$_POST["fecha_inicio"],$_POST["fecha_devolucion"],$_POST["hora_entrega"],$_POST["hora_devolucion"],$_POST["ciudad"],$_POST["tipo_mascota"],$anuncioEditado["anuncio"]->foto,$_POST["titulo"],$url_const);
            $_SESSION["mensaje_editar"] = "Su anuncio se ha editado con éxito.";
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
    <link rel="stylesheet" href="css/crearAnuncio.css">
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
                if(isset($_SESSION["usuario"])){
                    $imagen = $_SESSION["usuario"]->foto;
                    echo "<div id='contenedor_foto_perfil'><a href='profile.php'><img src='img/usuarios/$imagen' alt='Usuario' id='logo_usuario'></a></div>";
                } 
            ?>
                
    </header>
    <?php
        if(isset($_SESSION["mensaje_error"])){
            echo "<p class='mensaje_cancel'>".$_SESSION['mensaje_error']."</p>";
            unset($_SESSION["mensaje_error"]);
        }

        if(isset($_SESSION["mensaje_editar"])){
            echo "<p class='mensaje_editar'>".$_SESSION['mensaje_editar']."</p>";
            unset($_SESSION["mensaje_editar"]);
        }

    ?>
    <section id='formularios'>
        <article id='reg'>
            <div class='titulo_form'>
                <h2>EDITAR ANUNCIO</h2>
            </div>
            <div class='cuerpo_form'>  
            <form action="editarAnun.php" method="post" enctype="multipart/form-data">
            <div class='campos_busqueda'>
                    <div class='foto_anuncio'>
                        <img src="img/<?php echo $anuncioEditado['anuncio']->foto;?>" alt="">
                    </div>
                    <div>
                        <label for="foto_anuncio">Foto del anuncio*:</label>
                        <?php
                            if($error_imagen){
                                if(!getimagesize($_FILES['foto_anuncio']['tmp_name'])){
                                    echo "<p class='error_foto'>Error: El archivo debe de ser una imagen.</p>";
                                } else if ($_FILES['foto_anuncio']['size']>500000) {
                                    echo "<p class='error_foto'>Error: El archivo es demasiado grande.</p>";
                                }else {
                                    echo "<p class='error_foto'>Error en el servidor</p>";
                                }
                            }
                        ?>
                    </div>
                    <div class='input_form'>
                        <input type="file" name="foto_anuncio"  accept='image/*' id="foto_anuncio">
                    </div>                    
                </div>
                <div class='campos_busqueda'>
                    <div>
                        <label for="titulo">Título*:</label>
                    </div>
                    <div class='input_form'>
                        <input required type="text" name="titulo" id="titulo" value='<?php
                            if(isset($_POST["titulo"])){
                                echo $_POST["titulo"];
                            } else {
                                echo $anuncioEditado["anuncio"]->titulo;
                            }
                        ?>'>
                    </div>
                </div>
                <div class='campos_busqueda'>
                    <div>
                        <label for="ciudad">Ciudad*:</label>
                    </div>
                    <div class='input_form'>
                        <input required type="text" name="ciudad" id="ciudad" value='<?php
                            if(isset($_POST["ciudad"])){
                                echo $_POST["ciudad"];
                            } else {
                                echo $anuncioEditado["anuncio"]->ciudad;
                            }
                        ?>'>
                    </div>
                </div>
                <div class='campos_busqueda'>
                    <div>
                        <label for="fecha_inicio">Fecha de entrega*:</label> 
                        <?php
                            if($error_fecha){
                                echo "<p class='error_foto'>La fecha de entrega no puede ser posterior a la fecha de devolución</p>";
                            }
                        ?>
                    </div>
                    <div class='input_form'>
                        <input required type="date" name="fecha_inicio" id="fecha_inicio" value='<?php
                            if(isset($_POST["fecha_inicio"])){
                                echo $_POST["fecha_inicio"];
                            } else {
                                echo $anuncioEditado["anuncio"]->fecha_entrega;
                            }
                        ?>'>
                    </div>
                </div>
                <div class='campos_busqueda'>
                    <div>
                        <label for="fecha_devolucion">Fecha de devolución*:</label> 
                        <?php
                            if($error_fecha){
                                echo "<p class='error_foto'>La fecha de devolución no puede ser anterior a la fecha de entrega</p>";
                            }
                        ?>
                    </div>
                    <div class='input_form'>
                        <input required type="date" name="fecha_devolucion" id="fecha_devolucion" value='<?php
                            if(isset($_POST["fecha_devolucion"])){
                                echo $_POST["fecha_devolucion"];
                            } else {
                                echo $anuncioEditado["anuncio"]->fecha_devolucion;
                            }
                        ?>'>
                    </div>
                </div>
                <div class='campos_busqueda'>
                    <div>
                        <label for="hora_entrega">Hora de entrega*:</label>
                        <?php
                            if($error_hora){
                                echo "<p class='error_foto'>La hora de entrega no puede ser posterior a la de entrega si la fecha de entrega y devolución son la misma</p>";
                            }
                        ?>
                    </div>
                    <div class='input_form'>
                        <input required type="time"  name="hora_entrega" id="hora_entrega" value='<?php
                            if(isset($_POST["hora_entrega"])){
                                echo $_POST["hora_entrega"];
                            } else {
                                echo $anuncioEditado["anuncio"]->hora_entrega;
                            }
                        ?>'>
                    </div>
                </div> 
                <div class='campos_busqueda'>
                    <div>
                        <label for="hora_devolucion">Hora de devolución*:</label>
                        <?php
                            if($error_hora){
                                echo "<p class='error_foto'>La hora de devolución no puede ser anterior a la de recogida si la fecha de entrega y devolución son la misma</p>";
                            }
                        ?>
                    </div>
                    <div class='input_form'>
                        <input required type="time" name="hora_devolucion" id="hora_devolucion" value='<?php
                            if(isset($_POST["hora_devolucion"])){
                                echo $_POST["hora_devolucion"];
                            } else {
                                echo $anuncioEditado["anuncio"]->hora_devolucion;
                            }
                        ?>'>
                    </div>
                </div> 
                <div class='campos_busqueda'>
                    <div>
                        <label for="tipo_mascota">Tipo de Mascota*:</label>
                    </div>
                    <div class='input_form'>
                        <select name="tipo_mascota" id="tipo_mascota">
                            <option value="Perro" <?php 
                            if(isset($_POST["tipo_mascota"]) && $_POST["tipo_mascota"]=="Perro"){
                                echo "selected";
                            } else if($anuncioEditado["anuncio"]->tipo_mascota =="Perro"){
                                echo "selected";
                            }
                            
                            ?>>Perro</option>
                            <option value="Gato" <?php 
                            
                            if(isset($_POST["tipo_mascota"]) && $_POST["tipo_mascota"]=="Gato"){
                                echo "selected";
                            } else if($anuncioEditado["anuncio"]->tipo_mascota =="Gato"){
                                echo "selected";
                            } 
                            
                            ?>>Gato</option>
                            <option value="Otros" <?php 
                            
                            if(isset($_POST["tipo_mascota"]) && $_POST["tipo_mascota"]=="Otros"){
                                echo "selected";
                            } else if($anuncioEditado["anuncio"]->tipo_mascota =="Otros"){
                                echo "selected";
                            } 
                            
                            ?>>Otros</option>
                        </select>  
                    </div>                    
                </div>
                <div class='campos_busqueda'>
                    <div>
                        <label for="descripcion">Descripción*:</label>
                    </div>
                    <div class='input_form'>
                        <textarea required name="descripcion" id="descripcion"><?php
                            if(isset($_POST["descripcion"])){
                                echo $_POST["descripcion"];
                            } else {
                                echo $anuncioEditado["anuncio"]->descripcion;
                            }
                        ?></textarea>
                    </div>                    
                </div>
                
                <div id='container_pub_anuncio'>
                    <button id='btn_pub_anuncio' name='btn_publicar_anuncio' type="submit">EDITAR ANUNCIO</button>
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