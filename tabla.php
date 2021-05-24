<?php

                include_once("bd/conexion.php"); 
                $database = new Connection();
                $db = $database->open();

                try{    
                    $sql = "SELECT c.nombre As nombre, c.apellidoPaterno AS paterno, c.apellidoMaterno AS materno, c.idCliente AS idC
                            FROM tbl_cmv_cliente c
                    ;";
//                    echo $sql;
                    $jsonPhp = array();
                     foreach ($db->query($sql) as $row) {
                         $jsonPhp [] = array(
                             'nombre' => $row['nombre'],
                             'paterno' => $row['paterno'],
                             'materno' => $row['materno'],
                             'idC' => $row['idC']
                     );
                     }
                     $jsonstring = json_encode($jsonPhp);
                     echo $jsonstring;
    }
    catch(PDOException $e){
        echo "Se tiene un problema en la connecxion: " . $e->getMessage();
    }
 
    //cerrar conexión
    $database->close();
     
?>