<?php
    session_start();
    include_once($_SESSION['url']."bd/conexion.php"); 
    $database = new Connection();
    $db = $database->open();

    try{    
        $sql = 'SELECT id, minutos, valor, hora
        FROM dia_minutos 
        WHERE minutos = '.$_POST['buscar'].';';

        $jsonPhp = array();
         foreach ($db->query($sql) as $row) {
             $jsonPhp [] = array(
                 'id' => $row['id'],
                 'minutos' => $row['minutos'],
                 'valor' => $row['valor'],
                 'hora' => $row['hora']
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