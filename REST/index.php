﻿<?php
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

$app->get('/obtenerSolicitudes/:idUsuario', function($idUsuario){
    echo json_encode(obtenerSolicitudes($idUsuario),JSON_FORCE_OBJECT);
});

$app->get('/aceptarSolicitud/:idUsuario/:idAnuncio', function ($idUsuario,$idAnuncio)  {
	echo json_encode(aceptarSolicitud($idUsuario,$idAnuncio),JSON_FORCE_OBJECT);
});

$app->post('/crearTransaccion', function(){
    echo json_encode(crearTransaccion($_POST["idUsuario"],$_POST["idAnuncio"],$_POST["tarifa"]),JSON_FORCE_OBJECT);
});

$app->get('/obtenerTransacciones/:idUsuario', function($idUsuario){
    echo json_encode(obtenerTransacciones($idUsuario),JSON_FORCE_OBJECT);
});

$app->get('/obtenerTransaccion/:idAnuncio/:idUsuario', function($idAnuncio,$idUsuario){
    echo json_encode(obtenerTransaccion($idAnuncio,$idUsuario),JSON_FORCE_OBJECT);
});

$app->get('/obtenerAnuncio/:idAnuncio', function($idAnuncio){
    echo json_encode(obtenerAnuncio($idAnuncio),JSON_FORCE_OBJECT);
});

$app->get('/cancelarTransaccion/:idAnuncio/:idUsuario', function($idAnuncio,$idUsuario){
    echo json_encode(cancelarTransaccion($idAnuncio,$idUsuario),JSON_FORCE_OBJECT);
});

$app->post('/actualizarTransaccion', function(){
    echo json_encode(actualizarTransaccion($_POST["idAnuncio"],$_POST["idUsuario"],$_POST["tipoCod"],$_POST["tipoUsuario"]),JSON_FORCE_OBJECT);
});

$app->get('/actualizarTransaccionComentario1/:idAnuncio/:idUsuario', function($idAnuncio,$idUsuario){
    echo json_encode(actualizarTransaccionComentario1($idAnuncio,$idUsuario),JSON_FORCE_OBJECT);
});

$app->get('/actualizarTransaccionComentario2/:idAnuncio/:idUsuario', function($idAnuncio,$idUsuario){
    echo json_encode(actualizarTransaccionComentario2($idAnuncio,$idUsuario),JSON_FORCE_OBJECT);
});

$app->post('/crearComentario', function(){
    echo json_encode(crearComentario($_POST["valor"],$_POST["comentario"],$_POST["idUsuarioEscritor"],$_POST["idUsuarioLector"]),JSON_FORCE_OBJECT);
});

$app->post('/crearAnuncio', function(){
    echo json_encode(crearAnuncio($_POST["descripcion"],$_POST["fecha_entrega"],$_POST["fecha_devolucion"],$_POST["hora_entrega"],$_POST["hora_devolucion"],$_POST["ciudad"],$_POST["tipo_mascota"],$_POST["foto"],$_POST["idUsuarioAutor"],$_POST["titulo"]),JSON_FORCE_OBJECT);
});

$app->get('/obtenerAnunciosUser/:idUsuario', function($idUsuario){
    echo json_encode(obtenerAnunciosUser($idUsuario),JSON_FORCE_OBJECT);
});

$app->run();

?>





