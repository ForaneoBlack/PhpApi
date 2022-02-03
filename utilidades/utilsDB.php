<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once "config/config.php";

//Abrir conexion a la base de datos
  function getConnection()
  {
      try {
          $conn = new PDO("mysql:host=".host.";dbname=".db.";port=".port, username, password);
          
          // set the PDO error mode to exception
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          return $conn;
      } catch (PDOException $exception) {
          exit($exception->getMessage());
      }
  }
 //Obtener parametros para updates
 function getParams($input)
 {
    $filterParams = [];
    foreach($input as $param => $value)
    {
            $filterParams[] = "$param=:$param";
    }
    return implode(", ", $filterParams);
  }
  //Asociar todos los parametros a un sql
  function bindAllValues($statement, $params)
  {
    foreach($params as $param => $value)
    {
        $statement->bindValue(':'.$param, $value);
    }
    return $statement;
   }

  ?>