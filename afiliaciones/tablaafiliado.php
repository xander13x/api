<?php
                session_start();
                include_once($_SESSION['url']."bd/conexion.php"); 
                $database = new Connection();
                $db = $database->open();

                try{    
                    $sql = 'SELECT a.id,a.fecha,
                            e.`id` AS ide,e.`codigo`,e.`nombre` AS empresa,e.`calle`,e.`numero`,e.`cp`,e.`estado`,e.`municipio`,e.`telefono`,e.`hini` AS abre,e.`hfin` AS cierra,
                            u.`id` AS idu, u.nombre, u.`apellidos`
                            FROM afiliado a
                            LEFT JOIN usuario u ON (a.`idu`=u.`id`)
                            LEFT JOIN empresa e ON (a.`ide`=e.`id`)
                            WHERE u.`id`='.$_SESSION['idu'].';';
                    
                    $jsonPhp = array();
                     foreach ($db->query($sql) as $row) {
                         $jsonPhp [] = array(
                             'id' => $row['id'],
                             'ide' => $row['ide'],
                             'codigo' => $row['codigo'],
                             'empresa' => $row['empresa'],
                             'fecha' => $row['fecha'],
                                     
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