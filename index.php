<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilosLanding.css">
    <title>Proyecto mascotas</title>
</head>
<body>
    <header>
        <div id='nombre_empresa'>
            <img src="img/logo.svg" alt="logo_empresa" id='logo_empresa'>
            <h1 id='titular_web'>PROYECTO</h1>
        </div>
        <div>
            <nav>
                <ul>
                    <li>
                        <a href="">Inicio</a>
                    </li>
                    <li>
                        <a href="">Términos y condiciones</a>
                    </li>
                    <li>
                        <a href="">Contacto</a>
                    </li>
                    <li>
                        <a href="">Iniciar sesión</a> 
                    </li>
                    <li>
                        <a href="">Registrarse</a> 
                    </li>
                </ul>
            </nav>
        </div>
        <div>
            <a href=""><img width="90px" src="img/usuarios/usuario1.jpg" alt="Usuario" id="logo_usuario"></a>
        </div>
        <div>
            <img width='100%' src="img/cabecera2.jpg" alt="cabecera">
        </div>
    </header>
    <section>
        <div>
            <ul>
                <li>
                    <button>Perros</button>
                </li>
                <li>
                    <button>Gatos</button>
                </li>
                <li>
                    <button>Otros</button>
                </li>
            </ul>
        </div>
        <div>
            <form action="" method="post">
                <div>
                    <label for="">Fecha de entrega:</label>
                    <input type="date" name="" id="">
                </div>
                <div>
                    <label for="">Hora de entrega desde las:</label>
                    <select name="" id="">
                        <option value="">00:00</option>
                    </select>
                </div>
                <div>
                    <label for="">Fecha de recogida:</label>
                    <input type="date" name="" id="">
                </div>
                <div>
                    <label for="">Hora de recogida desde las:</label>
                    <select name="" id="">
                        <option value="">00:00</option>
                    </select>  
                </div>
                <div>
                    <label for="">Localidad: </label>
                    <select name="" id="">
                        <option value="">Almería</option>
                    </select>
                </div>
                <div>
                    <button type="submit">FILTRAR</button>
                </div>
            </form>
        </div>
    </section>
</body>
</html>