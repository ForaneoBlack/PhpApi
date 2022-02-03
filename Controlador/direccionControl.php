<?php

include_once "utilidades/generalFunc.php";
include_once "utilidades/simpleRest.php";
include_once "utilidades/requestRestHandler.php";
include_once 'modelo/direccionDB.php';

class direccionControl {
    public function crearDireccion() {
        try {
            $datosPeticion = array();
            $request = new simpleRest();
            $json = $request->getHttpRequestBody();
            $handler = new requestRestHandler();
            $datosPeticion = (array) $handler->decodeJson($json);


            if (isset($datosPeticion['Id_direccion'])) {
                $Id_direccion = $datosPeticion['Id_direccion'];

                if (!empty($Id_direccion)) {
                    $Id_direccion = $datosPeticion['Id_direccion'];
                    $Codigo_persona = $datosPeticion['Codigo_persona'];
                    $direcion = $datosPeticion['direcion'];
                    $estado = $datosPeticion['estado'];

                    $direccionDB = new direccionDB();

                    $responseCrearD = $direccionDB->crearDireccion($Id_direccion, $Codigo_persona, $direcion,
                            $estado);
                    $datosRespuesta = (array) $handler->decodeJson($responseCrearD);
                    if (!isset($datosRespuesta["error"])) {
                        $responseListado["error"] = "false";
                        $responseListado["status"] = "OK ";
                        $responseListado["message"] = "success";
                        $responseListado["message"] = $responseCrearD;
                    } else {
                        $responseListado["error"] = "True";
                        $responseListado["status"] = "ERROR";
                        $responseListado["message"] = $datosRespuesta['error'];
                        $responseListado["message"] = "Error datos respuesta";
                    }
                    return $responseListado;
                } else {
                    $responseListado["error"] = "True";
                    $responseListado["status"] = "ERROR";
                    $responseListado["message"] = "Faltan datos";
                    $responseListado["message"] = "{}";
                }
                return $responseListado;
            }
        } catch (Exception $exc) {
            return'{"error":"' . $exc->getMessage() . '"}';
        }
    }
    public function verDireccion() {
        try {
            
            $datosPeticion = array();
            $request = new simpleRest();
            $json = $request->getHttpRequestBody();
            $handler = new requestRestHandler();
            $datosPeticion = (array) $handler->decodeJson($json);

            if (isset($datosPeticion['Codigo_persona'])) {
                $Codigo_persona = $datosPeticion['Codigo_persona'];

                if (!empty($Codigo_persona)) {
                    $Codigo_persona = $datosPeticion['Codigo_persona'];

                    $direccionDB = new direccionDB();

                    $responseVerD = $direccionDB->verDireccion($Codigo_persona);
                    $datosRespuesta = (array) $handler->decodeJson($responseVerD);
                    if (!isset($datosRespuesta["error"])) {
                        $responseListado["error"] = "false";
                        $responseListado["status"] = "OK ";
                        $responseListado["message"] = "success";
                        $responseListado["message"] = $responseVerD;
                    } else {
                        $responseListado["error"] = "True";
                        $responseListado["status"] = "ERROR";
                        $responseListado["message"] = $datosRespuesta['error'];
                        $responseListado["message"] = "Error datos respuesta";
                    }
                    return $responseListado;
                } else {
                    $responseListado["error"] = "True";
                    $responseListado["status"] = "ERROR";
                    $responseListado["message"] = "Faltan datos";
                    $responseListado["message"] = "{}";
                }
                return $responseListado;
            }
        } catch (Exception $exc) {
            return'{"error":"' . $exc->getMessage() . '"}';
        }
    }
}

?>