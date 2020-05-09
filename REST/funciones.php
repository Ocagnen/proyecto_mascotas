<?php 
require "conexion_bd.php";

function hacerLogin($correo,$clave){
    $con = conectar();
    if(!$con){
        return array("mensaje_error"=>"Error en la conexión. Error ".mysqli_connect_errno().":".mysqli_connect_error());
    } else {
        mysqli_set_charset($con,"utf8");
        $consulta = "select * from usuarios where email='".$correo."' and password='".$clave."'";
        if($resultado=mysqli_query($con,$consulta)){
            if(mysqli_num_rows($resultado)>0){
                $user = mysqli_fetch_assoc($resultado);
                mysqli_free_result($resultado);
                mysqli_close($con);
                return array("usuario"=>$user);
            } else {
                mysqli_free_result($resultado);
                mysqli_close($con);
                return array("mensaje"=>"Usuario no existe");
            }
        } else {
            $mensaje = "Error en la base de datos. Error ".mysqli_errno($con).":".mysqli_error($con);
            mysqli_close($con);
            return array("mensaje_error"=>$mensaje);
        }
    }
}

function obtenerAnuncios(){
    $con = conectar();
    if(!$con){
        return array("mensaje_error"=>"Error en la conexión. Error ".mysqli_connect_errno().":".mysqli_connect_error());
    } else {
        mysqli_set_charset($con,"utf8");
        $consulta = "select * from anuncios";
        if($resultado=mysqli_query($con,$consulta)){
            if(mysqli_num_rows($resultado)>0){
                $anuncios = Array();
                while($fila = mysqli_fetch_assoc($resultado)){
                    $anuncios[] = $fila;
                }
                return array("anuncios"=>$anuncios);
            } else {
                mysqli_free_result($resultado);
                mysqli_close($con);
                return array("mensaje"=>"No hay anuncios");
            }
        } else {
            $mensaje = "Error en la base de datos. Error ".mysqli_errno($con).":".mysqli_error($con);
            mysqli_close($con);
            return array("mensaje_error"=>$mensaje);
        }
    }
}

function obtenerUsuario($idUsuario){
    $con = conectar();
    if(!$con){
        return array("mensaje_error"=>"Error en la conexión. Error ".mysqli_connect_errno().":".mysqli_connect_error());
    } else {
        mysqli_set_charset($con,"utf8");
        $consulta = "select * from usuarios where idUsuario='".$idUsuario."'";
        if($resultado=mysqli_query($con,$consulta)){
            if(mysqli_num_rows($resultado)>0){
                $user = mysqli_fetch_assoc($resultado);
                mysqli_free_result($resultado);
                mysqli_close($con);
                return array("usuario"=>$user);
            } else {
                mysqli_free_result($resultado);
                mysqli_close($con);
                return array("mensaje"=>"Usuario no existe");
            }
        } else {
            $mensaje = "Error en la base de datos. Error ".mysqli_errno($con).":".mysqli_error($con);
            mysqli_close($con);
            return array("mensaje_error"=>$mensaje);
        }
    }
}
