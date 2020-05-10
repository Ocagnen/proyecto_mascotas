<?php
require 'Slim/Slim.php';
require 'funciones.php';



// El framework Slim tiene definido un namespace llamado Slim
// Por eso aparece \Slim\ antes del nombre de la clase.
\Slim\Slim::registerAutoloader();
// Creamos la aplicaci�n
$app = new \Slim\Slim();
// Indicamos el tipo de contenido y condificaci�n que devolveremos desde el framework Slim
$app->contentType('application/json; charset=utf-8');

$app->post('/login', function(){
    echo json_encode(hacerLogin($_POST["correo"],$_POST["clave"]),JSON_FORCE_OBJECT);
});

$app->get('/obtenerAnuncios', function(){
    echo json_encode(obtenerAnuncios(),JSON_FORCE_OBJECT);
});

$app->get('/obtenerUsuario/:idUsuario', function($idUsuario){
    echo json_encode(obtenerUsuario($idUsuario),JSON_FORCE_OBJECT);
});

$app->get('/obtenerValoraciones/:idUsuario', function($idUsuario){
    echo json_encode(obtenerValoraciones($idUsuario),JSON_FORCE_OBJECT);
});

$app->get('/obtenerAnunciosTipo/:tipo', function($tipo){
    echo json_encode(obtenerAnunciosTipo($tipo),JSON_FORCE_OBJECT);
});

$app->post('/crearSolicitud', function(){
    echo json_encode(crearSolicitud($_POST["idUsuario"],$_POST["idAnuncio"],$_POST["tarifa"]),JSON_FORCE_OBJECT);
});

$app->run();

?>





