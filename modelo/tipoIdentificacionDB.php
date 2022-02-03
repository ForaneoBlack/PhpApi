<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class tipoIdentificacionDB {

    public function __construct() {
        
    }

    public function verificarID($CodId) {
        try {
            $sql = "SELECT COUNT(*) AS Existe  
                FROM `control_de_libros`.`tipoidentificacion`
                WHERE `Codigo_tipo_identificacion` = '" . $CodId . "';";

            $dbCon = getConnection();
            $stmt = $dbCon->query($sql);
            $row = $stmt->fetch();

            if ($row['Existe'] == 1) {
                $dbCon = null;
                return true;
            } else {

                $dbCon = null;
                echo "no hay  ese codigo";
                return false;
            }
        } catch (PDOException $exc) {
            return false;
        }
    }

    public function CrearId($CodId, $descripcion) {
        try {
            $dbCon = getConnection();
            $sql = "    INSERT INTO `tipoidentificacion`(`Codigo_tipo_identificacion`,`Descripcion_tipo_identificacion`)
                    VALUES('" . $CodId . "','" . $descripcion . "');";
            $dbCon->beginTransaction();
            $dbCon->exec($sql);
            $dbCon->commit();
            $respuesta = '{"exec":"OK"}';

            $dbCon = null;
            return $respuesta;
        } catch (PDOException $exc) {
            if ($dbCon->inTransaction()) {
                $dbCon->rollBack();
            } $dbCon = null;

            return '{"error":"' . $exc->getMessage() . '"}';
        }
    }

    public function verId($CodId = '') {
        if ($this->verificarId($CodId)) {
            try {
                $dbCon = getConnection();
                $sql = "SELECT `Codigo_tipo_identificacion`,`Descripcion_tipo_identificacion`
                FROM `control_de_libros`.`tipoidentificacion`
                WHERE `Codigo_tipo_identificacion`='" . $CodId . "';";
                $dbCon = getConnection();
                $stmt = $dbCon->query($sql);
                $tipoId = $stmt->fetch();
                if (!empty($tipoId['Codigo_tipo_identificacion'])) {
                    $dbCon = null;
                    $TipoIde["Codigo_tipo_identificacion"] = utf8_encode($tipoId['Codigo_tipo_identificacion']);
                    $TipoIde["Descripcion_tipo_identificacion"] = utf8_encode($tipoId['Descripcion_tipo_identificacion']);


                    return json_encode($TipoIde, JSON_PRETTY_PRINT);
                } else {
                    $dbCon = null;
                    return '{"error":"no existe ese usiario"}';
                }
            } catch (PDOException $exc) {
                return '{"error":"' . $exc->getMessage() . '"}';
            }
        }
    }

    public function actualizarId($CodId, $descripcion) {
        if ($this->verificarId($CodId)) {
            try {

                $dbCon = getConnection();
                $sql = "   UPDATE  `tipoidentificacion`
                SET `Descripcion_tipo_identificacion`='" . $descripcion . "'                                       
                     WHERE `Codigo_tipo_identificacion`='" . $CodId . "';";
               // echo sql;
                $dbCon->beginTransaction();
                $dbCon->exec($sql);
                $dbCon->commit();
                $respuesta = '{"exec":"OK"}';

                $dbCon = null;
                return $respuesta;
            } catch (PDOException $exc) {
                if ($dbCon->inTransaction()) {
                    $dbCon->rollBack();
                } $dbCon = null;

                return '{"error":"' . $exc->getMessage() . '"}';
            }
        }
    }

    public function eliminarId($CodId) {
        if ($this->verificarId($CodId)) {
            try {
                $dbCon = getConnection();
                $sql = "DELETE FROM `tipoidentificacion`
                  WHERE `Codigo_tipo_identificacion`='" . $CodId . "';";


                $dbCon->beginTransaction();
                $dbCon->exec($sql);
                $dbCon->commit();
                $respuesta = '{"exec":"OK"}';

                $dbCon = null;
                return $respuesta;
            } catch (PDOException $exc) {
                if ($dbCon->inTransaction()) {
                    $dbCon->rollBack();
                } $dbCon = null;

                return '{"error":"' . $exc->getMessage() . '"}';
            }
        }
    }

}
?>

