<?php
                session_start();
                include_once($_SESSION['url']."bd/conexion.php"); 
                $database = new Connection();
                $db = $database->open();

                try{    
                    $sql = "SELECT MAX(id) FROM empresa ;";
                    
                    $jsonPhp = array();
                     foreach ($db->query($sql) as $row) {
                         $_SESSION['ide']=$row['MAX(id)'];
                         $jsonPhp [] = array(
                             'id' => $row['id'],
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