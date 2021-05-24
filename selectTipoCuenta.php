<?php
                include_once("bd/conexion.php"); 
                $database = new Connection();
                $db = $database->open();

                try{    
                    $sql = '
                        SELECT idCuenta AS id, nombreCuenta As nombre
                            FROM cat_cmv_tipo_cuenta
                            ;';
                    
                    $jsonPhp = array();
                     foreach ($db->query($sql) as $row) {
                         $jsonPhp [] = array(
                             'id' => $row['id'],
                             'nombre' => $row['nombre']
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