<?php
                session_start();
                include_once($_SESSION['url']."bd/conexion.php"); 
                $database = new Connection();
                $db = $database->open();
//                            LEFT JOIN afectado af ON (af.`idsuspencion`=a.`idsuspencion`)
//                            LEFT JOIN cita c ON (c.`idsuspencion` = a.`idsuspencion`)
//                            LEFT JOIN suspenciones s ON (s.`id`=c.`idsuspencion`)
                try{    
                    $sql = 'SELECT COUNT(id)
                            FROM notificaciones n
                            WHERE idu= "'.$_SESSION['idu'].'" AND estado = 0';
                    
                    $jsonPhp = array();
                     foreach ($db->query($sql) as $row) {
                         $jsonPhp [] = array(
                             'notificaciones' => $row['COUNT(id)']
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