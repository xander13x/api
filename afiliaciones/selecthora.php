<?php
    session_start();
    include_once($_SESSION['url']."bd/conexion.php"); 
    $sqlfuncional="";
    if ($_POST['comida']!=0){
        $sqlfuncional='(minutos>='.$_POST['entrada'].' AND minutos<='.$_POST['comida'].'-'.$_POST['restar'].' AND minutos>='.$_POST['horaactual'].' AND minutos % 5 = 0) OR (minutos>='.$_POST['regreso'].' AND minutos>='.$_POST['horaactual'].' AND minutos<='.$_POST['salida'].'-'.$_POST['restar'].' AND minutos % 5 = 0)';
//        echo "entreaqui";
    } else{
        $sqlfuncional=' minutos>='.$_POST['entrada'].' AND minutos>='.$_POST['horaactual'].' AND minutos<='.$_POST['salida'].'-'.$_POST['restar'].' AND minutos % 5 = 0';
//        echo "entre aca";
    }
    $database = new Connection();
    $db = $database->open();

    try{    
        $sql = 'SELECT id, minutos, valor
                FROM dia_minutos
                WHERE '.$sqlfuncional.';';
//    echo $sql;
        $jsonPhp = array();
         foreach ($db->query($sql) as $row) {
             $jsonPhp [] = array(
                 'id' => $row['id'],
                 'minutos' => $row['minutos'],               
                 'valor' => $row['valor']               
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