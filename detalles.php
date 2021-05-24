<?php

                include_once("bd/conexion.php"); 
                $database = new Connection();
                $db = $database->open();

                try{    
                    $sql = "
SELECT c.nombre AS nombre, c.apellidoPaterno AS paterno, c.apellidoMaterno AS materno, c.idCliente AS idC, cc.saldoActual AS saldo, cc.fechaContratacion AS contratado, cc.fechaUltimoMovimiento AS ultimo
                            FROM tbl_cmv_cliente c
                            LEFT JOIN tbl_cmv_cliente_cuenta cc ON (c.`idCliente` = cc.`idCliente`)
                    ;";
//                    echo $sql;
                    $jsonPhp = array();
                     foreach ($db->query($sql) as $row) {
                         $jsonPhp [] = array(
                             'nombre' => $row['nombre'],
                             'paterno' => $row['paterno'],
                             'materno' => $row['materno'],
                             'idC' => $row['idC'],
                             'saldo' => $row['saldo'],
                             'contratado' => $row['contratado'],
                             'ultimo' => $row['ultimo']
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