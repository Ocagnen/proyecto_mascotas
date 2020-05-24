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

function obtenerTransacciones($idUsuario){
    $con = conectar();
    if(!$con){
        return array("mensaje_error"=>"Error en la conexión. Error ".mysqli_connect_errno().":".mysqli_connect_error());
    } else {
        mysqli_set_charset($con,"utf8");
        $consulta = "(select * from transacciones inner join anuncios on transacciones.idAnuncio = anuncios.idAnuncio where idUsuarioAutor = $idUsuario and cancelada = 0 and transferida = 0 ) union (select * from transacciones inner join anuncios on transacciones.idAnuncio = anuncios.idAnuncio where transacciones.idUsuario = $idUsuario and cancelada = 0 and transferida = 0 ) union (select * from transacciones inner join anuncios on transacciones.idAnuncio = anuncios.idAnuncio where transacciones.idUsuario = $idUsuario and cancelada = 1 and (comentadaAnunciante = 0 or comentadaSolicitante=0)) union (select * from transacciones inner join anuncios on transacciones.idAnuncio = anuncios.idAnuncio where idUsuarioAutor = $idUsuario and cancelada = 1 and (comentadaAnunciante = 0 or comentadaSolicitante=0) )";        
        if($resultado=mysqli_query($con,$consulta)){
            if(mysqli_num_rows($resultado)>0){
                $transacciones = Array();
                while($fila = mysqli_fetch_assoc($resultado)){
                    $transacciones[] = $fila;
                }
                return array("transacciones"=>$transacciones);
            } else {
                mysqli_free_result($resultado);
                mysqli_close($con);
                return array("mensaje"=>"No hay transacciones");
            }
        } else {
            $mensaje = "Error en la base de datos. Error ".mysqli_errno($con).":".mysqli_error($con);
            mysqli_close($con);
            return array("mensaje_error"=>$mensaje);
        }
    }
}

function obtenerAnuncio($idAnuncio){
    $con = conectar();
    if(!$con){
        return array("mensaje_error"=>"Error en la conexión. Error ".mysqli_connect_errno().":".mysqli_connect_error());
    } else {
        mysqli_set_charset($con,"utf8");
        $consulta = "select * from anuncios where idAnuncio='".$idAnuncio."'";
        if($resultado=mysqli_query($con,$consulta)){
            if(mysqli_num_rows($resultado)>0){
                $anuncio = mysqli_fetch_assoc($resultado);
                mysqli_free_result($resultado);
                mysqli_close($con);
                return array("anuncio"=>$anuncio);
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



function obtenerTransaccion($idAnuncio,$idUsuario){
    $con = conectar();
    if(!$con){
        return array("mensaje_error"=>"Error en la conexión. Error ".mysqli_connect_errno().":".mysqli_connect_error());
    } else {
        mysqli_set_charset($con,"utf8");
        $consulta = "select * from transacciones where idAnuncio=$idAnuncio and idUsuario=$idUsuario";
        if($resultado=mysqli_query($con,$consulta)){
            if(mysqli_num_rows($resultado)>0){
                $transaccion = mysqli_fetch_assoc($resultado);
                mysqli_free_result($resultado);
                mysqli_close($con);
                return array("transaccion"=>$transaccion);
            } else {
                mysqli_free_result($resultado);
                mysqli_close($con);
                return array("mensaje"=>"La transacción no existe");
            }
        } else {
            $mensaje = "Error en la base de datos. Error ".mysqli_errno($con).":".mysqli_error($con);
            mysqli_close($con);
            return array("mensaje_error"=>$mensaje);
        }
    }
}

function borrarSolicitud($idUsuario,$idAnuncio){
    $con = conectar();
    if(!$con){
        return array("mensaje_error"=>"Error en la conexión. Error ".mysqli_connect_errno().":".mysqli_connect_error());
    } else {
        mysqli_set_charset($con,"utf8");
        $consulta = "delete from solicitudes where idAnuncio=$idAnuncio and idUsuario=$idUsuario";
        if($resultado=mysqli_query($con,$consulta)){
            mysqli_close($con);
            return array("exito"=>"Solicitud borrada con éxito");            
        } else {
            $mensaje = "Error en la base de datos. Error ".mysqli_errno($con).":".mysqli_error($con);
            mysqli_close($con);
            return array("mensaje_error"=>$mensaje);
        }
    }
}

function cancelarTransaccion($idAnuncio,$idUsuario){
    $con = conectar();
    if(!$con){
        return array("mensaje_error"=>"Error en la conexión. Error ".mysqli_connect_errno().":".mysqli_connect_error());
    } else {
        mysqli_set_charset($con,"utf8");
        $consulta = "update transacciones set cancelada = 1 where idAnuncio=$idAnuncio and idUsuario=$idUsuario";
        if($resultado=mysqli_query($con,$consulta)){ 
            mysqli_close($con);
            return array("exito"=>"La transacción fue cancelada con éxito.");            
        } else {
            $mensaje = "Error en la base de datos. Error ".mysqli_errno($con).":".mysqli_error($con);
            mysqli_close($con);
            return array("mensaje_error"=>$mensaje);
        }
    }
}

function actualizarTransaccionComentario1($idAnuncio,$idUsuario){
    $con = conectar();
    if(!$con){
        return array("mensaje_error"=>"Error en la conexión. Error ".mysqli_connect_errno().":".mysqli_connect_error());
    } else {
        mysqli_set_charset($con,"utf8");
        $consulta = "update transacciones set comentadaAnunciante = 1 where idAnuncio=$idAnuncio and idUsuario=$idUsuario";
        if($resultado=mysqli_query($con,$consulta)){ 
            borrarSolicitud($idUsuario,$idAnuncio);
            mysqli_close($con);
            return array("exito"=>"La transacción fue actualizada con éxito.");            
        } else {
            $mensaje = "Error en la base de datos. Error ".mysqli_errno($con).":".mysqli_error($con);
            mysqli_close($con);
            return array("mensaje_error"=>$mensaje);
        }
    }
}

function actualizarTransaccionComentario2($idAnuncio,$idUsuario){
    $con = conectar();
    if(!$con){
        return array("mensaje_error"=>"Error en la conexión. Error ".mysqli_connect_errno().":".mysqli_connect_error());
    } else {
        mysqli_set_charset($con,"utf8");
        $consulta = "update transacciones set comentadaSolicitante = 1 where idAnuncio=$idAnuncio and idUsuario=$idUsuario";
        if($resultado=mysqli_query($con,$consulta)){ 
            borrarSolicitud($idUsuario,$idAnuncio);
            mysqli_close($con);
            return array("exito"=>"La transacción fue actualizada con éxito.");            
        } else {
            $mensaje = "Error en la base de datos. Error ".mysqli_errno($con).":".mysqli_error($con);
            mysqli_close($con);
            return array("mensaje_error"=>$mensaje);
        }
    }
}

function actualizarTransaccion($idAnuncio,$idUsuario,$tipoCod,$tipoUsuario){
    $con = conectar();
    if(!$con){
        return array("mensaje_error"=>"Error en la conexión. Error ".mysqli_connect_errno().":".mysqli_connect_error());
    } else {
        mysqli_set_charset($con,"utf8");
        if($tipoCod == "entrega"){
            if($tipoUsuario == "solicitante"){
                $consulta = "update transacciones set codigo_entrega_solicitante = 1 where idAnuncio=$idAnuncio and idUsuario=$idUsuario";
            } else {
                $consulta = "update transacciones set codigo_entrega_anunciante = 1 where idAnuncio=$idAnuncio and idUsuario=$idUsuario";
            }
        } else {
            if($tipoUsuario == "solicitante"){
                $consulta = "update transacciones set codigo_recogida_solicitante = 1 where idAnuncio=$idAnuncio and idUsuario=$idUsuario";
            } else {
                $consulta = "update transacciones set codigo_recogida_anunciante = 1 where idAnuncio=$idAnuncio and idUsuario=$idUsuario";
            }
        }
        if($resultado=mysqli_query($con,$consulta)){ 
            mysqli_close($con);
            return array("mensaje"=>"La transacción fue actualizada con éxito.");            
        } else {
            $mensaje = "Error en la base de datos. Error ".mysqli_errno($con).":".mysqli_error($con);
            mysqli_close($con);
            return array("mensaje_error"=>$mensaje);
        }
    }
}

function crearComentario($valor,$comentario,$idUsuarioEscritor,$idUsuarioLector){
    $con = conectar();
    if(!$con){
        return array("mensaje_error"=>"Error en la conexión. Error ".mysqli_connect_errno().":".mysqli_connect_error());
    } else {
        mysqli_set_charset($con,"utf8");    
        $consulta = "insert into valoraciones (valor,comentario,idUsuarioEscritor,idUsuarioLector) values ('".$valor."','".$comentario."','".$idUsuarioEscritor."','".$idUsuarioLector."')";      
        if($resultado=mysqli_query($con,$consulta)){
            mysqli_close($con);
            return array ("mensaje"=>"Valoración creada");            
        } else {
            $mensaje = "Error en la base de datos. Error ".mysqli_errno($con).":".mysqli_error($con);
            mysqli_close($con);
            return array("mensaje_error"=>$mensaje);
        }

    }
}








