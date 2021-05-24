<?php
                session_start();
                include_once($_SESSION['url']."bd/conexion.php"); 
                $database = new Connection();
                $db = $database->open();

                try{    
                    $sql = 'SELECT d.id,
                            e.`id` AS ide,e.`codigo`,e.`nombre` AS empresa,e.telefono,e.email,e.`calle`,e.`numero`,e.`cp`,e.`estado`,e.`municipio`,e.`telefono`,e.`hini` AS abre,e.`hfin` AS cierra,
                            u.`id` AS idu, u.nombre, u.`apellidos`
                            FROM dueño d
                            LEFT JOIN usuario u ON (d.`idu`=u.`id`)
                            LEFT JOIN empresa e ON (d.`ide`=e.`id`)
                            WHERE d.`idu`='.$_SESSION['idu'].' AND d.ide='.$_POST['ide'].';';
                    
                    $jsonPhp = array();
                     foreach ($db->query($sql) as $row) {
                         $_SESSION['ide']=$row['ide'];
                         $_SESSION['codigo']=$row['codigo'];
                         $_SESSION['empresa']=$row['empresa'];
                         $_SESSION['telefono']=$row['telefono'];
                         $_SESSION['email']=$row['email'];
                         $_SESSION['calle']=$row['calle'];
                         $_SESSION['numero']=$row['numero'];
                         $_SESSION['estado']=$row['estado'];
                         $_SESSION['municipio']=$row['municipio'];
                         $_SESSION['cp']=$row['cp'];
                         $jsonPhp [] = array(
                             'id' => $row['id'],
                             'ide' => $row['ide'],
                             'codigo' => $row['codigo'],
                             'empresa' => $row['empresa']
                                     
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