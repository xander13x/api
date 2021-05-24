<?php
                session_start();
                include_once($_SESSION['url']."bd/conexion.php"); 
                $database = new Connection();
                $db = $database->open();

                try{    
                    $sql = 'SELECT s.id , s.nombre, s.costo, s.durasion
                    FROM servicio s 
                    LEFT JOIN empresa e ON (s.ide=e.id)
                    WHERE e.id = "'.$_POST['ide'].'" AND s.estado > 0 AND s.estado < 3 ;';
                    
                    $jsonPhp = array();
                     foreach ($db->query($sql) as $row) {
                         $jsonPhp [] = array(
                             'id' => $row['id'],
                             'nombre' => $row['nombre'],
                             'costo' => $row['costo'],
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