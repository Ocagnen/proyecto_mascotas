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

function obtenerValoraciones($idUsuario){
    $con = conectar();
    if(!$con){
        return array("mensaje_error"=>"Error en la conexión. Error ".mysqli_connect_errno().":".mysqli_connect_error());
    } else {
        mysqli_set_charset($con,"utf8");
        $consulta = "select * from valoraciones where idUsuarioLector='".$idUsuario."'";
        if($resultado=mysqli_query($con,$consulta)){
            if(mysqli_num_rows($resultado)>0){
                $valoraciones = Array();
                while($fila = mysqli_fetch_assoc($resultado)){
                    $valoraciones[] = $fila;
                }
                return array("valoraciones"=>$valoraciones);
            } else {
                mysqli_free_result($resultado);
                mysqli_close($con);
                return array("mensaje"=>"No hay valoraciones");
            }
        } else {
            $mensaje = "Error en la base de datos. Error ".mysqli_errno($con).":".mysqli_error($con);
            mysqli_close($con);
            return array("mensaje_error"=>$mensaje);
        }
    }
}

function obtenerAnunciosTipo($tipo){
    $con = conectar();
    if(!$con){
        return array("mensaje_error"=>"Error en la conexión. Error ".mysqli_connect_errno().":".mysqli_connect_error());
    } else {
        mysqli_set_charset($con,"utf8");
        $consulta = "select * from anuncios where tipo_mascota='$tipo'";
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

function comprobarExistencia($idUsuario,$idAnuncio){
    $con = conectar();
    if(!$con){
        return array("mensaje_error"=>"Error en la conexión. Error ".mysqli_connect_errno().":".mysqli_connect_error());
    } else {
        mysqli_set_charset($con,"utf8");
        $consulta = "select * from solicitudes where idUsuario = $idUsuario and idAnuncio = $idAnuncio";
        if($resultado=mysqli_query($con,$consulta)){
            if(mysqli_num_rows($resultado)>0){
                mysqli_free_result($resultado);
                mysqli_close($con);
                return true;
            } else {
                mysqli_free_result($resultado);
                mysqli_close($con);
                return false;
            }
        } else {
            $mensaje = "Error en la base de datos. Error ".mysqli_errno($con).":".mysqli_error($con);
            mysqli_close($con);
            return array("mensaje_error"=>$mensaje);
        }
    }
}

function crearSolicitud($idUsuario,$idAnuncio,$tarifa){
    $con = conectar();
    if(!$con){
        return array("mensaje_error"=>"Error en la conexión. Error ".mysqli_connect_errno().":".mysqli_connect_error());
    } else {
        mysqli_set_charset($con,"utf8");
        if(comprobarExistencia($idUsuario,$idAnuncio)){
            $consulta = "update solicitudes set tarifa = $tarifa where idUsuario = $idUsuario and idAnuncio = $idAnuncio";
        } else {
            $consulta = "insert into solicitudes (idUsuario,idAnuncio,tarifa) values ($idUsuario,$idAnuncio,$tarifa)";
        }
        if($resultado=mysqli_query($con,$consulta)){
            mysqli_close($con);
            return array ("mensaje"=>"Solicitud enviada con éxito");            
        } else {
            $mensaje = "Error en la base de datos. Error ".mysqli_errno($con).":".mysqli_error($con);
            mysqli_close($con);
            return array("mensaje_error"=>$mensaje);
        }
    }
}

function obtenerSolicitudes($idUsuario){
    $con = conectar();
    if(!$con){
        return array("mensaje_error"=>"Error en la conexión. Error ".mysqli_connect_errno().":".mysqli_connect_error());
    } else {
        mysqli_set_charset($con,"utf8");
        $consulta = "select * from solicitudes inner join anuncios on solicitudes.idAnuncio = anuncios.idAnuncio where anuncios.idUsuarioAutor = $idUsuario order by anuncios.idAnuncio";        
        if($resultado=mysqli_query($con,$consulta)){
            if(mysqli_num_rows($resultado)>0){
                $solicitudes = Array();
                while($fila = mysqli_fetch_assoc($resultado)){
                    $solicitudes[] = $fila;
                }
                return array("solicitudes"=>$solicitudes);
            } else {
                mysqli_free_result($resultado);
                mysqli_close($con);
                return array("mensaje"=>"No hay solicitudes");
            }
        } else {
            $mensaje = "Error en la base de datos. Error ".mysqli_errno($con).":".mysqli_error($con);
            mysqli_close($con);
            return array("mensaje_error"=>$mensaje);
        }
    }
}

function aceptarSolicitud($idUsuario,$idAnuncio){
    $con = conectar();
    if(!$con){
        return array("mensaje_error"=>"Error en la conexión. Error ".mysqli_connect_errno().":".mysqli_connect_error());
    } else {
        mysqli_set_charset($con,"utf8");
        $consulta = "update solicitudes set aceptada = 1 where idUsuario = $idUsuario and idAnuncio = $idAnuncio";        
        if($resultado=mysqli_query($con,$consulta)){
            mysqli_close($con);
            return array ("mensaje"=>"Solicitud aceptada");            
        } else {
            $mensaje = "Error en la base de datos. Error ".mysqli_errno($con).":".mysqli_error($con);
            mysqli_close($con);
            return array("mensaje_error"=>$mensaje);
        }

    }
}

function generarCodigo () {
    return rand(1000,9999);
}

function crearTransaccion($idUsuario,$idAnuncio,$tarifa){
    $con = conectar();
    if(!$con){
        return array("mensaje_error"=>"Error en la conexión. Error ".mysqli_connect_errno().":".mysqli_connect_error());
    } else {
        mysqli_set_charset($con,"utf8");
        $codigo_inicio = generarCodigo();
        $codigo_fin = generarCodigo();
        $consulta = "insert into transacciones (idUsuario,idAnuncio,codigo_anuncio_inicio,codigo_anuncio_fin,tarifa) values ($idUsuario,$idAnuncio,$codigo_inicio,$codigo_fin,$tarifa)";        
        if($resultado=mysqli_query($con,$consulta)){
            mysqli_close($con);
            return array ("mensaje"=>"Transacción creada");            
        } else {
            $mensaje = "Error en la base de datos. Error ".mysqli_errno($con).":".mysqli_error($con);
            mysqli_close($con);
            return array("mensaje_error"=>$mensaje);
        }

    }
}



