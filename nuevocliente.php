<?php

                include_once("bd/conexion.php"); 
                $database = new Connection();
                $db = $database->open();
                try{    
                    $sql = "SELECT c.idCliente AS idC
                            FROM tbl_cmv_cliente c
                            WHERE curp = '".$_POST['curp']."'
                    ;";
//                    echo $sql;
                    $jsonPhp = array();
                     foreach ($db->query($sql) as $row) {
                         $jsonPhp [] = array(
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