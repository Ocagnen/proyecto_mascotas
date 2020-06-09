<?php
    session_name("mascotas");
    session_start();
    $url_const = "http://localhost/ProyectoMascotas/REST/";
    require "funciones_vistas.php";

    /*
    if(isset($_POST["btn_usuario_anuncio"])){

        if($_POST["btn_usuario_anuncio"]==$_SESSION["usuario"]->idUsuario){
            header("Location: profile.php");
            exit;
        }
        $_SESSION["idAutor"] = $_POST["btn_usuario_anuncio"];
        header("Location: usuario.php");
        exit;
    }
    */
    /*
    if(isset($_POST["btn_solicitud_enviar"])){
        $insertarSolicitud = crearSolicitud($_SESSION["usuario"]->idUsuario,$_POST["btn_solicitud_enviar"],$_POST["tarifa"],$url_const);
        if(isset($insertarSolicitud["mensaje"])){
            echo "<script>";
                echo "alert('Solicitud enviada con éxito')";
            echo "</script>";
        } else {
            echo "<script>";
                echo "alert('Fallo al enviar la solicitud.')";
            echo "</script>";
        }
    }
    */
    $anunciosMostrar = "todos";
    if(isset($_POST["filtrar_perros"])){
        
        if(!isset($_SESSION["marcado"])){
            $_SESSION["marcado"] = $_POST["filtrar_perros"];
            $anunciosMostrar = $_POST["filtrar_perros"];

        } else {

            if($_POST["filtrar_perros"]==$_SESSION["marcado"]){
                $anunciosMostrar = "todos";
                $_SESSION["marcado"] = "todos";
            } else {
                $anunciosMostrar = $_POST["filtrar_perros"];
                $_SESSION["marcado"] = $_POST["filtrar_perros"];
    
            }    
        }       
        
    } else if (isset($_SESSION["marcado"])){
        $anunciosMostrar = $_SESSION["marcado"];
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilosLanding.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet"> 
    <script src="jq/jquery-3.1.1.min.js" type="text/javascript"></script>	
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <script src="js/script.js"></script>
    <title>Proyecto mascotas</title>
</head>
<body>
    <?php
        if(isset($_POST["btn_usuario_anuncio"])){

        if($_POST["btn_usuario_anuncio"]==$_SESSION["usuario"]->idUsuario){

            echo "<script>";
                echo "window.open('profile.php')";
            echo "</script>";

        } else {
            $_SESSION["idAutor"] = $_POST["btn_usuario_anuncio"];
            echo "<script>";
                    echo "window.open('usuario.php')";
            echo "</script>";
        }

        }
    ?>
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
                <form action="index.php#anuncios" method="post">
                    <button type="submit" value="Perro" name="filtrar_perros" <?php
                        if($anunciosMostrar=="Perro"){
                            echo "style='background-color: green;'";
                        }
                    ?>><img src="img/logo.svg" alt=""></button>
                </form>
            </div>
            <div>
                <form action="index.php#anuncios" method="post">
                    <button type="submit" value="Gato" name="filtrar_perros"  <?php
                        if($anunciosMostrar=="Gato"){
                            echo "style='background-color: green;'";
                        }
                    ?>><img src="img/cats.svg" alt=""></button>
                </form>
            </div>
            <div>
                <form action="index.php#anuncios" method="post">
                    <button type="submit" value="Otros" name="filtrar_perros"  <?php
                        if($anunciosMostrar=="Otros"){
                            echo "style='background-color: green;'";
                        }
                    ?>><img src="img/pets.svg" alt=""></button>
                </form>
            </div>
        </div>
        <div id='contenido_anuncios'>
            <?php
                if($anunciosMostrar=="todos"){
                    $anuncios = getAnuncios($url_const);
                } else {
                    $anuncios = getAnunciosTipo($anunciosMostrar,$url_const);
                }
                if(isset($anuncios["mensaje"])){
                    echo "<h3 id='mensaje_vacio'>No existen anuncios en este momento</h3>";
                } else if(isset($anuncios["anuncios"])){
                    foreach ($anuncios as $key => $value) {
                        foreach ($value as $key2 => $value2) {
                            echo "<article id='anuncio$value2->idAnuncio'>";
                                echo "<div class='img_anuncio'>";
                                    echo "<img src='img/$value2->foto' alt='$value2->foto'>";
                                echo "</div>";
                                echo "<div class='container_tabla'>";
                                echo "<table>";
                                    echo "<tr>";
                                        echo "<th>Título</th>";
                                        echo "<td><strong>".strtoupper($value2->titulo)."</strong></td>";
                                    echo "</tr>";
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
                                        echo "<th>Localidad</th>";
                                        echo "<td>$value2->ciudad</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                        echo "<th>Descripción</th>";
                                        echo "<td>".$value2->descripcion."</td>";
                                    echo "</tr>";
                                echo "</table>";
                                echo "</div>";
                                if(!isset($_SESSION["usuario"])){
                                    echo "<div class='botones_anuncio'>";
                                    echo "<div class='boton_usuario'>";                                        
                                        echo "<form action='index.php' method='post'>";
                                            echo "<a href='#ex$value2->idAnuncio' rel='modal:open'><button class='btn_usuario_anuncio' name='btn_usuario_sesion'>".obtenerUsuario($value2->idUsuarioAutor,$url_const)["usuario"]->nombre." ".obtenerUsuario($value2->idUsuarioAutor,$url_const)["usuario"]->apellidos."</button></a>";
                                        echo "</form>";
                                        echo "</div>";
                                    echo "<div class='boton_solicitar'>";
                                        echo "<a href='#ex$value2->idAnuncio' rel='modal:open'><button>Solicitar</button></a>";
                                        echo "<div id='ex$value2->idAnuncio' class='modal'>";
                                            ?>
                                                <p>"Para enviar una solicitud o visitar un perfil de otro usuario es necesario estar registrado"</p>
                                                <button type="submit" class="btn_solicitud_iniciar" onclick = "location.href = 'registro.php';" >Iniciar sesión / Registrarme</button>
                                            <?php
                                        echo "</div>";
                                        echo "</div>";
                                echo "</div>";
                                } else {
                                    echo "<div class='botones_anuncio'>";
                                    echo "<div class='boton_usuario'>";                                        
                                        echo "<form action='index.php#anuncio$value2->idAnuncio' method='post'>";
                                            echo "<button class='btn_usuario_anuncio' name='btn_usuario_anuncio' value='$value2->idUsuarioAutor'>".obtenerUsuario($value2->idUsuarioAutor,$url_const)["usuario"]->nombre." ".obtenerUsuario($value2->idUsuarioAutor,$url_const)["usuario"]->apellidos."</button>";
                                        echo "</form>";
                                        echo "</div>";                                        
                                    echo "<div class='boton_solicitar'>";
                                        echo "<a href='#ex$value2->idAnuncio' rel='modal:open'><button>Solicitar</button></a>";
                                        echo "<div id='ex$value2->idAnuncio' class='modal'>";
                                            echo "<div id='modal$value2->idAnuncio'>";
                                            if(isset($_SESSION["usuario"]) && $value2->idUsuarioAutor == $_SESSION["usuario"]->idUsuario){
                                                echo "<p>No puede realizar una solicitud para su propio anuncio</p>";
                                            } else {
                                            ?>                                            
                                                <p>"Establezca la cantidad por la que está dispuesto a ofrecer sus servicios al anunciante"</p>
                                                <form action="index.php" method="post">
                                                    <div class="tarifa_modal">
                                                        <div>
                                                            <label for="cantidad">Tarifa:</label>
                                                        </div>
                                                        <div>
                                                            <input required type="number" name="tarifa" id="tarifa<?php echo $value2->idAnuncio; ?>" placeholder="Tarifa mínima : <?php
                                                                echo calcularTarifaMin($value2->tipo_mascota,$value2->fecha_entrega,$value2->fecha_devolucion,$value2->hora_entrega,$value2->hora_devolucion);
                                                            ?>€" min="<?php
                                                                echo calcularTarifaMin($value2->tipo_mascota,$value2->fecha_entrega,$value2->fecha_devolucion,$value2->hora_entrega,$value2->hora_devolucion);
                                                            ?>">
                                                            <br><span style='color:red' id="mensaje<?php echo $value2->idAnuncio;?>"></span>
                                                        </div>
                                                        <div>
                                                            <button type="button" id='btn_solicitud_enviar' class="btn_solicitud_enviar" name="btn_solicitud_enviar" onclick="crearSolicitud(<?php echo $value2->idAnuncio?>,<?php echo $_SESSION['usuario']->idUsuario?>);" value="<?php echo $value2->idAnuncio; ?>">Enviar</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            <?php
                                            }
                                            echo "</div>";
                                        echo "</div>";
                                        echo "</div>";
                                echo "</div>";
                                }                                
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
                    Para usar la aplicación es necesario estar registrados en ella. Una vez lo hagamos podremos iniciar sesión
                    y hacer uso de las distintas funcionalidades que presenta. Una de ellas será el poder enviar solicitudes
                    a los anuncios que nos interesen. También podremos acceder a nuestro perfil, donde podremos publicar anuncios,
                    editarlos y borrarlos. Además, podremos acceder a las solicitudes que nos envíen otros usuarios a nuestro
                    perfil y aceptarlas si nos convencen. Una vez las hayamos aceptado accederemos a una transacción, donde podremos
                    ver los datos de contacto del otro usuario. Del mismo modo, cuando un anunciante acepte nuestra solicitud, podremos
                    acceder a dicha transacción desde nuestro perfil. En cualquier momento podremos cancelar la transacción si lo vemos 
                    conveniente. Aquí es donde gestionaremos el sistema de códigos para garantizar la seguridad de nuestros usuarios. 
                    Otra de las posibilidades que tenemos al comenzar una transacción es la de comentar y valorar al otro usuario involucrado
                    en esta.
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
                    Sabemos la importancia de nuestras mascotas, por lo que queremos que nuestros usuarios se sientan seguros
                    a la hora de dejarselas a desconocidos para que se hagan cargo de ellas durante un tiempo. Para ello, cada vez
                    que se genera una transacción, los usuarios dispondran de dos códigos que deberán entregar en la sescción de
                    transacciones. El código de entrega y el de recogida. El primero tan solo lo sabrá el usuario que haya 
                    publicado el anuncio, mientras que el segundo solo lo sabrá el usuario que haya presentado la solicitud. La 
                    idea es que ambos usuarios introduzcan ambos códigos, de forma que quede constancia de que la mascota se recogió 
                    y se entregó sin percances. De esta manera, existe un registro en nuestra plataforma que nos permite garantizar
                    que la mascota fue entregada y recogida en caso de que exista algún tipo de problema o reclamación por parte
                    de alguno de los usuarios implicados en la trasacción.
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