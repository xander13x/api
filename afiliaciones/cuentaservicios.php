<?php

    session_start();
    include_once($_SESSION['url']."bd/conexion.php"); 
    $database = new Connection();
    $db = $database->open();

    try{    
        $sql = "SELECT COUNT(s.id)
        FROM servicio s 
        WHERE  s.ide= '".$_POST['ide']."' AND estado = 1;";
//                    echo $sql;
        $jsonPhp = array();
         foreach ($db->query($sql) as $row) {
             $jsonPhp [] = array(
                 'servicios' => $row['COUNT(s.id)']
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