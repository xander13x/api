<?php
                session_start();
                include_once($_SESSION['url']."bd/conexion.php"); 
                $database = new Connection();
                $db = $database->open();

                try{    
                    $sql = 'SELECT `tiempofin`, `tiempoinicio`
                            FROM cita
                            WHERE fecha = "'.$_POST['hoy'].'" AND estado = 0 AND tiempofin > '.$_POST['horaactual'].' ORDER BY tiempoinicio;';
                    
                    $jsonPhp = array();
                     foreach ($db->query($sql) as $row) {
                         $jsonPhp [] = array(
                             'tiempofin' => $row['tiempofin'],
                             'tiempoinicio' => $row['tiempoinicio']
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