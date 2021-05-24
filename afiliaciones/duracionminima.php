<?php
                session_start();
                include_once($_SESSION['url']."bd/conexion.php"); 
                $database = new Connection();
                $db = $database->open();

                try{    
                    $sql = 'SELECT s.durasion as durasion
                    FROM servicio s 
                    LEFT JOIN empresa e ON (s.ide=e.id)
                    WHERE e.id = "'.$_POST['ide'].'" and s.estado=1 and s.id = "'.$_POST['id'].'";';
                    
                    $jsonPhp = array();
                     foreach ($db->query($sql) as $row) {
                         $jsonPhp [] = array(
                             'durasion' => $row['durasion']
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