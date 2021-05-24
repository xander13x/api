<?php

                include_once("bd/conexion.php"); 
                $database = new Connection();
                $db = $database->open();

                try{    
                    $sql = "SELECT idClienteCuenta, idCliente, idCuenta, saldoActual, fechaContratacion, fechaUltimoMovimiento
                            FROM tbl_cmv_cliente_cuenta
                    ;";
//                    echo $sql;
                    $jsonPhp = array();
                     foreach ($db->query($sql) as $row) {
                         $jsonPhp [] = array(
                             'idClienteCuenta' => $row['idClienteCuenta'],
                             'idCliente' => $row['idCliente'],
                             'idCuenta' => $row['idCuenta'],
                             'saldoActual' => $row['saldoActual'],
                             'fechaContratacion' => $row['fechaContratacion'],
                             'fechaUltimoMovimiento' => $row['fechaUltimoMovimiento']
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