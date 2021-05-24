<?php

                include_once("bd/conexion.php"); 
                $database = new Connection();
                $db = $database->open();

                try{    
                    $sql = "SELECT c.nombre AS nombre, c.apellidoPaterno AS paterno, c.apellidoMaterno AS materno, c.idCliente AS idC, c.curp, c.rfc, cc.idCuenta AS idcuenta, cc.saldoActual AS saldo
                            FROM tbl_cmv_cliente c
                            LEFT JOIN tbl_cmv_cliente_cuenta cc ON (cc.idCliente = c.idCliente)
                            WHERE c.idCliente =".$_POST['id']."
                    ;";
//                    echo $sql;
                    $jsonPhp = array();
                     foreach ($db->query($sql) as $row) {
                         $jsonPhp [] = array(
                             'nombre' => $row['nombre'],
                             'paterno' => $row['paterno'],
                             'materno' => $row['materno'],
                             'idC' => $row['idC'],
                             'curp' => $row['curp'],
                             'rfc' => $row['rfc'],
                             'idcuenta' => $row['idcuenta'],
                             'saldo' => $row['saldo']
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