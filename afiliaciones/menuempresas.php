<?php
                session_start();
                include_once($_SESSION['url']."bd/conexion.php"); 
                $database = new Connection();
                $db = $database->open();

                try{    
                    $sql = '
                            SELECT d.id,d.ide, e.`codigo`,e.`nombre`,d.`fecha`
                            FROM dueño d
                            LEFT JOIN usuario u ON (d.`idu`=u.`id`)
                            LEFT JOIN empresa e ON (d.`ide`=e.`id`)
                            WHERE idu='.$_SESSION['idu'].';';
                    
                    $jsonPhp = array();
                     foreach ($db->query($sql) as $row) {
                         $jsonPhp [] = array(
                             'id' => $row['id'],
                             'ide' => $row['ide'],
                             'codigo' => $row['codigo'],
                             'nombre' => $row['nombre'],
                             'fecha' => $row['fecha']
                                     
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