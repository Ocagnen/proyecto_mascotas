<?php


    function consumir_servicio_REST($url,$metodo,$datos=null){

        //url contra la que atacamos
        $llamada = curl_init($url);

        //a true, obtendremos una respuesta de la url, en otro caso,
        //true si es correcto, false si no lo es
        curl_setopt($llamada, CURLOPT_RETURNTRANSFER, true);

        //establecemos el verbo http que queremos utilizar para la petición
        curl_setopt($llamada, CURLOPT_CUSTOMREQUEST, $metodo);

        if(isset($datos)){
            curl_setopt($llamada, CURLOPT_POSTFIELDS, http_build_query($datos));
        }

        //obtenemos la respuesta
        $response = curl_exec($llamada);

        // Se cierra el recurso CURL y se liberan los recursos del sistema
        curl_close($llamada);

        if(!$response) {
            die("Error al consumir el servicio Web ".$url);
        }else{
        $decodedText=substr($response,3,strlen($response)-1);

        return json_decode($decodedText);

        }

    }

    function comprobarLogin($correo,$clave,$url){
        $datosInsertar=Array("correo"=>$correo,"clave"=>$clave);
        $obj = consumir_servicio_REST($url."login","POST",$datosInsertar);

            if(isset($obj->mensaje_error)){
                die($obj->mensaje_error);
            } else if(isset($obj->mensaje)){
                return array ("mensaje"=>$obj->mensaje);
            } else {
                return array ("usuario"=>$obj->usuario);
            }           

    }

    function obtenerUsuario($clave,$url){
        $obj = consumir_servicio_REST($url."obtenerUsuario/".$clave,"GET");

            if(isset($obj->mensaje_error)){
                die($obj->mensaje_error);
            } else if(isset($obj->mensaje)){
                return array ("mensaje"=>$obj->mensaje);
            } else {
                return array ("usuario"=>$obj->usuario);
            }           

    }

    function obtenerAnuncio($idAnuncio,$url){
        $obj = consumir_servicio_REST($url."obtenerAnuncio/".$idAnuncio,"GET");
            if(isset($obj->mensaje_error)){
                die($obj->mensaje_error);
            } else if(isset($obj->mensaje)){
                return array ("mensaje"=>$obj->mensaje);
            } else {
                return array ("anuncio"=>$obj->anuncio);
            }           

    }

    function obtenerTransaccion($idAnuncio,$idUsuario,$url){
        $obj = consumir_servicio_REST($url."obtenerTransaccion/".$idAnuncio."/".$idUsuario,"GET");
            if(isset($obj->mensaje_error)){
                die($obj->mensaje_error);
            } else if(isset($obj->mensaje)){
                return array ("mensaje"=>$obj->mensaje);
            } else {
                return array ("transaccion"=>$obj->transaccion);
            }           

    }

    function getAnuncios($url){
        $obj = consumir_servicio_REST($url."obtenerAnuncios","GET");
        if(isset($obj->mensaje_error)){
            die($obj->mensaje_error);
        } else if(isset($obj->anuncios)){
            return array ("anuncios"=>$obj->anuncios);
        } else {
            return array ("mensaje"=>$obj->mensaje);
        }
    }

    function getTransacciones($idUsuario,$url){
        $obj = consumir_servicio_REST($url."obtenerTransacciones/$idUsuario","GET");
        if(isset($obj->mensaje_error)){
            die($obj->mensaje_error);
        } else if(isset($obj->transacciones)){
            return array ("transacciones"=>$obj->transacciones);
        } else {
            return array ("mensaje"=>$obj->mensaje);
        }
    }

    function obtenerTipo($valor){
        switch($valor){
            case "Perro":
                return "logo.svg";
            case "Gato":
                return "cats.svg";
            default:
                return "pets.svg";
        }
    }

    function accederPerfil($idAutor){
        $_SESSION["idAutor"] = $idAutor;
        header("Location: usuario.php");
    }

    function getValoraciones($idLector, $url){
        $obj = consumir_servicio_REST($url."obtenerValoraciones/$idLector","GET");
        if(isset($obj->mensaje_error)){
            die($obj->mensaje_error);
        } else if(isset($obj->valoraciones)){
            return array ("valoraciones"=>$obj->valoraciones);
        } else {
            return array ("mensaje"=>$obj->mensaje);
        }
    }

    function obtenerValoracionMedia($idUsuario, $url){
       $valoraciones = getValoraciones($idUsuario, $url);
        $total = 0;
        $numeroValoraciones = 0;
       foreach ($valoraciones as $key => $value) {
           foreach ($value as $key2 => $value2) {
               $total += $value2->valor;
               $numeroValoraciones++;

           }
       }
       return round($total/$numeroValoraciones);
    }

    function getAnunciosTipo($tipo,$url){
        $obj = consumir_servicio_REST($url."obtenerAnunciosTipo/$tipo","GET");
        if(isset($obj->mensaje_error)){
            die($obj->mensaje_error);
        } else if(isset($obj->anuncios)){
            return array ("anuncios"=>$obj->anuncios);
        } else {
            return array ("mensaje"=>$obj->mensaje);
        }
    }

    function crearSolicitud($idUsuario,$idAnuncio,$tarifa,$url){
        $datosInsertar=Array("idUsuario"=>$idUsuario,"idAnuncio"=>$idAnuncio,"tarifa"=>$tarifa);
        $obj = consumir_servicio_REST($url."crearSolicitud","POST",$datosInsertar);
        if(isset($obj->mensaje_error)){
            die($obj->mensaje_error);
        } else if(isset($obj->mensaje)){
            return array ("mensaje"=>$obj->mensaje);
        } 
    }

    function obtenerSolicitudes($idUsuario,$url){
        $obj = consumir_servicio_REST($url."obtenerSolicitudes/$idUsuario","GET");
        if(isset($obj->mensaje_error)){
            die($obj->mensaje_error);
        } else if(isset($obj->mensaje)){
            return array ("mensaje"=>$obj->mensaje);
        } else {
            return array ("solicitudes"=>$obj);
        }
    }

    function actualizarTransaccionComentario1($idAnuncio,$idUsuario,$url){
        $obj = consumir_servicio_REST($url."actualizarTransaccionComentario1/".$idAnuncio."/".$idUsuario,"GET");
        if(isset($obj->mensaje_error)){
            die($obj->mensaje_error);        
        } else {
            return array ("exito"=>$obj->exito);
        }       
    }

    function actualizarTransaccionComentario2($idAnuncio,$idUsuario,$url){
        $obj = consumir_servicio_REST($url."actualizarTransaccionComentario2/".$idAnuncio."/".$idUsuario,"GET");
        if(isset($obj->mensaje_error)){
            die($obj->mensaje_error);        
        } else {
            return array ("exito"=>$obj->exito);
        }       
    }

    function cancelarTransaccion($idAnuncio,$idUsuario,$url){
        $obj = consumir_servicio_REST($url."cancelarTransaccion/".$idAnuncio."/".$idUsuario,"GET");
        if(isset($obj->mensaje_error)){
            die($obj->mensaje_error);        
        } else {
            return array ("exito"=>$obj->exito);
        }       
    }


    function actualizarTransaccion($idAnuncio,$idUsuario,$tipoCod,$tipoUsuario,$url){
        $datosInsertar=Array("idUsuario"=>$idUsuario,"idAnuncio"=>$idAnuncio,"tipoCod"=>$tipoCod,"tipoUsuario"=>$tipoUsuario);
        $obj = consumir_servicio_REST($url."actualizarTransaccion","POST",$datosInsertar);
        if(isset($obj->mensaje_error)){
            die($obj->mensaje_error);        
        } else {
            return array ("mensaje"=>$obj->mensaje);
        }       
    }

    function crearValoracion($valor,$comentario,$idUsuarioEscritor,$idUsuarioLector,$url){
        $datosInsertar=Array("valor"=>$valor,"comentario"=>$comentario,"idUsuarioEscritor"=>$idUsuarioEscritor,"idUsuarioLector"=>$idUsuarioLector);     
        $obj = consumir_servicio_REST($url."crearComentario","POST",$datosInsertar);
        if(isset($obj->mensaje_error)){
            die($obj->mensaje_error);        
        } else {
            return array ("mensaje"=>$obj->mensaje);
        }       
    }

    function crearAnuncio($descripcion,$fecha_entrega,$fecha_devolucion,$hora_entrega,$hora_devolucion,$ciudad,$tipo_mascota,$foto,$idUsuarioAutor,$titulo,$url){
        $datosInsertar=Array("descripcion"=>$descripcion,"fecha_entrega"=>$fecha_entrega,"fecha_devolucion"=>$fecha_devolucion,"hora_entrega"=>$hora_entrega,"hora_devolucion"=>$hora_devolucion, "ciudad"=>$ciudad, "tipo_mascota"=>$tipo_mascota, "foto"=>$foto, "idUsuarioAutor"=> $idUsuarioAutor, "titulo"=>$titulo);     
        $obj = consumir_servicio_REST($url."crearAnuncio","POST",$datosInsertar);
        if(isset($obj->mensaje_error)){
            die($obj->mensaje_error);        
        } else {
            return array ("mensaje"=>$obj->mensaje);
        }       
    }


    function calcularTarifaMin($tipo_mascota, $fecha_entrega,$fecha_devolucion, $hora_entrega, $hora_devolucion){
        
        $date1 =  date_create($fecha_entrega);
        $date2 = date_create($fecha_devolucion);
        $diff=date_diff($date1,$date2);
        $diasTotales = $diff->format("%a");

        if($diasTotales == 0){
            $hour1 = explode(":",$hora_entrega)[0];
            $hour2 = explode(":",$hora_devolucion)[0];

            $diferencia_horas = $hour2-$hour1;

            if($diferencia_horas >= 0 && $diferencia_horas <= 2){
                return 4;
            } else if($diferencia_horas > 2 && $diferencia_horas < 4) {
                return 6;
            } else {
                return 8;
            }

        } else {
            switch($tipo_mascota){
                case "Perro":
                    return $diasTotales*8;
                    break;
                case "Gato":
                    return $diasTotales*5;
                    break;
                case "Otros":
                    return $diasTotales*3;
                    break;
            }
        }

    }
?>
