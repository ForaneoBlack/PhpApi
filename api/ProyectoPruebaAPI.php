<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once "utilidades/simpleRest.php";
include_once "utilidades/requestRestHandler.php";
include_once "utilidades/utilsDB.php";
include_once "controlador/tipoIdentificacionControl.php";
include_once "controlador/personaControl.php";
include_once 'controlador/direccionControl.php';

class ProyectoPruebaAPI {

    public function api() {

        try {
            //Declara el objeto rest
            $restObj = New simpleRest();

            //Define la respuesta JSON
            $restObj->setHttpHeaders('Content-Type: application/JSON', 200);

            //switchear funcion
            $method = $_SERVER['REQUEST_METHOD'];
            $action = $_GET['action'];
            $headers = apache_request_headers();


            switch ($action) {
                case 'crearId':
                    if ($method == "POST") {
                        //Definir variable de la clase
                        $tipoIdentificacion = new tipoIdentificacionControl();
                        //llamar funcion
                        $responseLista = $tipoIdentificacion->crearId();
                        $this->response(200, $responseLista);
                    } else {
                        $responseLista["error"] = "true";
                        $responseLista["status"] = "error";
                        $responseLista["message"] = "Metodo NO soportado";
                        $this->response(200, $responseLista); //status - 405
                    }
                    break;
                case 'verId':
                    if ($method == "POST") {
                        //Definir variable de la clase
                        $tipoIdentificacion = new tipoIdentificacionControl();
                        //llamar funcion
                        $responseLista = $tipoIdentificacion->verId();
                        $this->response(200, $responseLista);
                    } else {
                        $responseLista["error"] = "true";
                        $responseLista["status"] = "error";
                        $responseLista["message"] = "Metodo NO soportado";
                        $this->response(200, $responseLista); //status - 405
                    }
                    break;
                case 'actualizarId':
                    if ($method == "POST") {
                        //Definir variable de la clase
                        $tipoIdentificacion = new tipoIdentificacionControl();
                        //llamar funcion
                        $responseLista = $tipoIdentificacion->actualizarId();
                        $this->response(200, $responseLista);
                    } else {
                        $responseLista["error"] = "true";
                        $responseLista["status"] = "error";
                        $responseLista["message"] = "Metodo NO soportado";
                        $this->response(200, $responseLista); //status - 405
                    }
                    break;
                case 'eliminarId':
                    if ($method == "POST") {
                        //Definir variable de la clase
                        $tipoIdentificacion = new tipoIdentificacionControl();
                        //llamar funcion
                        $responseLista = $tipoIdentificacion->eliminarId();
                        $this->response(200, $responseLista);
                    } else {
                        $responseLista["error"] = "true";
                        $responseLista["status"] = "error";
                        $responseLista["message"] = "Metodo NO soportado";
                        $this->response(200, $responseLista); //status - 405
                    }
                    break;
                //--------------------------------------------------------------------------PERSONA            
                case 'crearPersona':
                    if ($method == "POST") {
                        //Definir variable de la clase
                        $persona = new personaControl();
                        //llamar funcion
                        $responseLista = $persona->crearPersona();
                        $this->response(200, $responseLista);
                    } else {
                        $responseLista["error"] = "true";
                        $responseLista["status"] = "error";
                        $responseLista["message"] = "Metodo NO soportado";
                        $this->response(200, $responseLista); //status - 405
                    }
                    break;
                case 'verPersona':
                    if ($method == "POST") {
                        //Definir variable de la clase
                        $persona = new personaControl();
                        //llamar funcion
                        $responseLista = $persona->verPersona();
                        $this->response(200, $responseLista);
                    } else {
                        $responseLista["error"] = "true";
                        $responseLista["status"] = "error";
                        $responseLista["message"] = "Metodo NO soportado";
                        $this->response(200, $responseLista); //status - 405
                    }
                    break;
                case 'actualizarPersona':
                    if ($method == "POST") {
                        //Definir variable de la clase
                        $persona = new personaControl();
                        //llamar funcion
                        $responseLista = $persona->actualizarPersona();
                        $this->response(200, $responseLista);
                    } else {
                        $responseLista["error"] = "true";
                        $responseLista["status"] = "error";
                        $responseLista["message"] = "Metodo NO soportado";
                        $this->response(200, $responseLista); //status - 405
                    }
                    break;
                case 'eliminarPersona':
                    if ($method == "POST") {
                        //Definir variable de la clase
                        $persona = new personaControl();
                        //llamar funcion
                        $responseLista = $persona->eliminarPersona();
                        $this->response(200, $responseLista);
                    } else {
                        $responseLista["error"] = "true";
                        $responseLista["status"] = "error";
                        $responseLista["message"] = "Metodo NO soportado";
                        $this->response(200, $responseLista); //status - 405
                    }
                    break;
  //--------------------------------------------------------------------------GENERAR EL CRUD PARA ESTADO CIVIL    
                case 'crearEstadoCivil':
                    if ($method == "POST") {
                        //Definir variable de la clase
                        $persona = new estCivControl();
                        //llamar funcion
                        $responseLista = $persona->crearPersona();
                        $this->response(200, $responseLista);
                    } else {
                        $responseLista["error"] = "true";
                        $responseLista["status"] = "error";
                        $responseLista["message"] = "Metodo NO soportado";
                        $this->response(200, $responseLista); //status - 405
                    }
                    break;
                    //----------------Generacion del CRUD PARA DIRECCION-----//
                case 'verDireccion':
                    if ($method == "POST") {
                        //Definir variable de la clase
                        $direccion = new direccionControl();
                        //llamar funcion
                        $responseLista = $direccion->verDireccion();
                        $this->response(200, $responseLista);
                    } else {
                        $responseLista["error"] = "true";
                        $responseLista["status"] = "error";
                        $responseLista["message"] = "Metodo NO soportado";
                        $this->response(200, $responseLista); //status - 405
                    }
                    break;
                case 'crearDireccion':
                    if ($method == "POST") {
                        //Definir variable de la clase
                        $direccion = new direccionControl();
                        //llamar funcion
                        $responseLista = $direccion->crearDireccion();
                        $this->response(200, $responseLista);
                    } else {
                        $responseLista["error"] = "true";
                        $responseLista["status"] = "error";
                        $responseLista["message"] = "Metodo NO soportado";
                        $this->response(200, $responseLista); //status - 405
                    }
                    break;
                default :
            }
        } catch (Exception $ex) {
            $ex->getMessage();
        }
    }

    /* Respuesta al cliente */

    function response($code = 200, $responseRest) {
        //objeto que maneja los respuestas
        $rest = new simpleRest();
        //setea el codigo de respuesta
        $rest->setHttpResponseCode($code);
        //objeto que maneja las codificaciones/descodificaciones
        $request = new requestRestHandler();
        //codifica la respuetsa en formato Json
        echo $request->encodeJson($responseRest);
    }

}
?>



