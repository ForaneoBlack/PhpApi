<?php

/*
  trabajar CRUD
 */
include_once "utilidades/generalFunc.php";
include_once "utilidades/simpleRest.php";
include_once "utilidades/requestRestHandler.php";
include_once "modelo/tipoIdentificacionDB.php";

class tipoIdentificacionControl {

    public function crearId() {
        try {
            $datosPeticion = array();
            $request = new simpleRest();
            $json = $request->getHttpRequestBody();
            $handler = new requestRestHandler();
            $datosPeticion = (array) $handler->decodeJson($json);

            if (isset($datosPeticion['Codigo_tipo_identificacion'])) {
                $CodId = $datosPeticion['Codigo_tipo_identificacion'];

                if (!empty($CodId)) {
                    $CodId = $datosPeticion['Codigo_tipo_identificacion'];
                    $descripcion = $datosPeticion['Descripcion_tipo_identificacion'];

                    $tipoIdentificacionDB = new TipoIdentificacionDB();

                    $responseCrearId = $tipoIdentificacionDB->crearId($CodId, $descripcion);
                    $datosRespuesta = (array) $handler->decodeJson($responseCrearId);
                    if (!isset($datosRespuesta["error"])) {
                        $responseListado["error"] = "false";
                        $responseListado["status"] = "OK ";
                        $responseListado["message"] = "success";
                        $responseListado["message"] = $responseCrearId;
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

    public function verId() {
        try {
            $datosPeticion = array();
            $request = new simpleRest();
            $json = $request->getHttpRequestBody();
            $handler = new requestRestHandler();
            $datosPeticion = (array) $handler->decodeJson($json);

            if (isset($datosPeticion['Codigo_tipo_identificacion'])) {
                $CodId = $datosPeticion['Codigo_tipo_identificacion'];

                if (!empty($CodId)) {
                    $CodId = $datosPeticion['Codigo_tipo_identificacion'];

                    $tipoIdentificacionDB = new TipoIdentificacionDB();

                    $responseVerId = $tipoIdentificacionDB->verId($CodId);
                    $datosRespuesta = (array) $handler->decodeJson($responseVerId);
                    if (!isset($datosRespuesta["error"])) {
                        $responseListado["error"] = "false";
                        $responseListado["status"] = "OK ";
                        $responseListado["message"] = "success";
                        $responseListado["message"] = $responseVerId;
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

    public function actualizarId() {
        try {
            $datosPeticion = array();
            $request = new simpleRest();
            $json = $request->getHttpRequestBody();
            $handler = new requestRestHandler();
            $datosPeticion = (array) $handler->decodeJson($json);

            if (isset($datosPeticion['Codigo_tipo_identificacion'])) {
                $CodId = $datosPeticion['Codigo_tipo_identificacion'];

                if (!empty($CodId)) {

                    $CodId = $datosPeticion['Codigo_tipo_identificacion'];
                    $descripcion = $datosPeticion['Descripcion_tipo_identificacion'];

                    $tipoIdentificacionDB = new tipoIdentificacionDB();


                    $responseActualizarId = $tipoIdentificacionDB->actualizarId($CodId, $descripcion);
                    $datosRespuesta = (array) $handler->decodeJson($responseActualizarId);
                    if (!isset($datosRespuesta["error"])) {
                        $responseListado["error"] = "false";
                        $responseListado["status"] = "OK ";
                        $responseListado["message"] = "success";
                        $responseListado["message"] = $responseActualizarId;
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

    public function eliminarId() {
        try {
            $datosPeticion = array();
            $request = new simpleRest();
            $json = $request->getHttpRequestBody();
            $handler = new requestRestHandler();
            $datosPeticion = (array) $handler->decodeJson($json);

            if (isset($datosPeticion['Codigo_tipo_identificacion'])) {
                $CodId = $datosPeticion['Codigo_tipo_identificacion'];

                if (!empty($CodId)) {
                    $CodId = $datosPeticion['Codigo_tipo_identificacion'];
                   
                    $tipoIdentificacionDB = new TipoIdentificacionDB();

                    $responseEliminarId = $tipoIdentificacionDB->eliminarId($CodId);
                    $datosRespuesta = (array) $handler->decodeJson($responseEliminarId);
                    if (!isset($datosRespuesta["error"])) {
                        $responseListado["error"] = "false";
                        $responseListado["status"] = "OK ";
                        $responseListado["message"] = "success";
                        $responseListado["message"] = $responseEliminarId;
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