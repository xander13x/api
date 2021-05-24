<?php
                session_start();
                include_once($_SESSION['url']."bd/conexion.php"); 
                $database = new Connection();
                $db = $database->open();
                try{    
                    $sql = "SELECT id, nombre, hini, hfin, lunes, martes, miercoles, jueves, viernes, sabado, domingo,
                            he1,he2,he3,he4,he5,he6,he7,
                            hc1,hc2,hc3,hc4,hc5,hc6,hc7,
                            hr1,hr2,hr3,hr4,hr5,hr6,hr7,
                            hs1,hs2,hs3,hs4,hs5,hs6,hs7
                            FROM empresa
                            WHERE id = ".$_POST['ide'].";";
                    
                    $jsonPhp = array();
                     foreach ($db->query($sql) as $row) {
                         $jsonPhp [] = array(
                             'id' => $row['id'],
                             'nombre' => $row['nombre'],
                             'hini' => $row['hini'],               
                             'hfin' => $row['hfin'],           
                             'lunes' => $row['lunes'],           
                             'martes' => $row['martes'],           
                             'miercoles' => $row['miercoles'],           
                             'jueves' => $row['jueves'],           
                             'viernes' => $row['viernes'],           
                             'sabado' => $row['sabado'],           
                             'domingo' => $row['domingo'],
                             'hini' => $row['hini'],
                             'hfin' => $row['hfin'],
                             'he1' => $row['he1'],
                             'he2' => $row['he2'],
                             'he3' => $row['he3'],
                             'he4' => $row['he4'],
                             'he5' => $row['he5'],
                             'he6' => $row['he6'],
                             'he7' => $row['he7'],
                             'hc1' => $row['hc1'],
                             'hc2' => $row['hc2'],
                             'hc3' => $row['hc3'],
                             'hc4' => $row['hc4'],
                             'hc5' => $row['hc5'],
                             'hc6' => $row['hc6'],
                             'hc7' => $row['hc7'],
                             'hr1' => $row['hr1'],
                             'hr2' => $row['hr2'],
                             'hr3' => $row['hr3'],
                             'hr4' => $row['hr4'],
                             'hr5' => $row['hr5'],
                             'hr6' => $row['hr6'],
                             'hr7' => $row['hr7'],
                             'hs1' => $row['hs1'],
                             'hs2' => $row['hs2'],
                             'hs3' => $row['hs3'],
                             'hs4' => $row['hs4'],
                             'hs5' => $row['hs5'],
                             'hs6' => $row['hs6'],
                             'hs7' => $row['hs7']
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