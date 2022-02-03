<?php

class direccionDB {

    public function verDireccion($Codigo_persona) {

        try {
            $dbCon = getConnection();
            $sql1 = "SELECT dir.`Id_direccion`, per.`Codigo_persona`, dir.`direcion`, per.`Nombres`, per.`Apellidos`"
                    . "FROM direccionpersona as dir INNER JOIN persona per ON dir.Codigo_persona = per.Codigo_persona "
                    . "WHERE dir.Codigo_persona = '" . $Codigo_persona . "' and dir.estado = 1;"; 
          
            $stmt = $dbCon->query($sql1);
            $datosDireccion = $stmt->fetch();
            if (!empty($datosDireccion['Codigo_persona'])) {
                $dbCon = null;
                $direccion["Id_direccion"] = utf8_encode($datosDireccion['Id_direccion']);
                $direccion["Codigo_persona"] = utf8_encode($datosDireccion['Codigo_persona']);
                $direccion["direccion"] = utf8_encode($datosDireccion['direcion']);
                $direccion["Nombres"] = utf8_encode($datosDireccion['Nombres']);
                $direccion["Apellidos"] = utf8_encode($datosDireccion['Apellidos']);
                

                return json_encode($direccion, JSON_PRETTY_PRINT);
            } else {
                $dbCon = null;
                return '{"error":"no existe ese usiario"}';
            }
        } catch (PDOException $exc) {
            return '{"error":"' . $exc->getMessage() . '"}';
        }
        
    }
    public function crearDireccion($Id_direccion, $Codigo_persona, $direcion, $estado) {
        try {
            $dbCon = getConnection();
            $sql= "INSERT INTO `direccionpersona`(`Codigo_persona`, `Id_direccion`, `direcion`, `estado`) VALUES ('" . $Id_direccion . "','" . $Codigo_persona . "',"
                    . "'" . $direcion . "','" . $estado . "');";
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

?>
