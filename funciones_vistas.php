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
?>
