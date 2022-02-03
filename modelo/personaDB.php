<?php


class personaDB {

    public function __construct() {
        
    }

    public function verificarPersona($Codigo_persona) {
        try {
            $sql = "SELECT COUNT(*) AS Existe  
                FROM `persona`
                WHERE `Codigo_persona` = '" . $Codigo_persona . "';";

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

    public function crearPersona($Codigo_persona, $Nombres, $Apellidos, $Codigo_tipo_identificacion,
            $Identificacion_persona, $Sexo, $Fecha_nacimiento, $Estado_persona) {
        try {
            $dbCon = getConnection();
            $sql = "INSERT INTO `persona`(`Codigo_persona`,`Nombres`,`Apellidos`,`Codigo_tipo_identificacion`,
                   `Identificacion_persona`,`Sexo`,`Fecha_nacimiento`,`Estado_persona`)
                    VALUES('" . $Codigo_persona . "','" . $Nombres . "','" . $Apellidos . "','" . $Codigo_tipo_identificacion . "'"
                    . ",'" . $Identificacion_persona . "','" . $Sexo . "','" . $Fecha_nacimiento . "','" . $Estado_persona . "');";
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

    public function verPersona($Codigo_persona = '') {
        if ($this->verificarPersona($Codigo_persona)) {
            try {
                $dbCon = getConnection();
                $sql = "SELECT   p.`Codigo_persona`,p.`Nombres`,p.`Apellidos`,i.`Descripcion_tipo_identificacion`,p.`Identificacion_persona`,
                        p.`Sexo`,p.`Fecha_nacimiento`,p.`Estado_persona`
                        FROM persona p 
                        INNER JOIN `tipoidentificacion` i
                        WHERE p.`Codigo_tipo_identificacion`=i.`Codigo_tipo_identificacion` 
                     AND p.`Codigo_persona`='" . $Codigo_persona . "';";
                $dbCon = getConnection();
                $stmt = $dbCon->query($sql);
                $datosPersona = $stmt->fetch();
                if (!empty($datosPersona['Codigo_persona'])) {
                    $dbCon = null;
                    $personas["Codigo_persona"] = utf8_encode($datosPersona['Codigo_persona']);
                    $personas["Nombres"] = utf8_encode($datosPersona['Nombres']);
                    $personas["Apellidos"] = utf8_encode($datosPersona['Apellidos']);
                    $personas["Descripcion_tipo_identificacion"] = utf8_encode($datosPersona['Descripcion_tipo_identificacion']);
                    $personas["Identificacion_persona"] = utf8_encode($datosPersona['Identificacion_persona']);
                    $personas["Sexo"] = utf8_encode($datosPersona['Sexo']);
                    $personas["Fecha_nacimiento"] = utf8_encode($datosPersona['Fecha_nacimiento']);
                    $personas["Estado_persona"] = utf8_encode($datosPersona['Estado_persona']);

                    return json_encode($personas, JSON_PRETTY_PRINT);
                } else {
                    $dbCon = null;
                    return '{"error":"no existe ese usiario"}';
                }
            } catch (PDOException $exc) {
                return '{"error":"' . $exc->getMessage() . '"}';
            }
        }
    }

    public function actualizarPersona($Codigo_persona, $Nombres, $Apellidos, $Codigo_tipo_identificacion,
            $Identificacion_persona, $Sexo, $Fecha_nacimiento, $Estado_persona) {
        if ($this->verificarPersona($Codigo_persona)) {
            try {
                $dbCon = getConnection();
                $sql = "   UPDATE  `persona`
                SET `Nombres`='" . $Nombres . "',  
                    `Apellidos`='" . $Apellidos . "',
                    `Codigo_tipo_identificacion`='" . $Codigo_tipo_identificacion . "',
                    `Identificacion_persona`='" . $Identificacion_persona . "',
                    `Sexo`='" . $Sexo . "',
                    `Fecha_nacimiento`='" . $Fecha_nacimiento . "',
                    `Estado_persona`='" . $Estado_persona . "'                         
                    WHERE `Codigo_persona`='" . $Codigo_persona . "';";

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

    public function eliminarPersona($Codigo_persona) {
        if ($this->verificarPersona($Codigo_persona)) {
            try {
                $dbCon = getConnection();
                $sql = "DELETE FROM `persona`
                  WHERE `Codigo_persona`='" . $Codigo_persona . "';";

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

