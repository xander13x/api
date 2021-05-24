<?php
            session_start();
            include_once($_SESSION['url']."bd/conexion.php"); 
             $database = new Connection();
             $db = $database->open();


                try{
                    $stmt = $db->prepare("INSERT INTO cita (idu,idu_c,ids,fecha,tiempoinicio,tiempofin,hora,horafin,estado,idsuspencion,fechacreacion,horacreacion) VALUES (".$_SESSION['idu'].",".$_SESSION['idu'].",:ids,:fecha,:tiempoinicio,:tiempofin,:hora,:horafin,0,0,NOW(),NOW())");
    if ($stmt->execute(array(':hora' => $_POST['hora'],':horafin' => $_POST['horafin'], ':fecha' => $_POST['fecha'], ':ids' => $_POST['servicio'], ':tiempoinicio' => $_POST['inicio'], ':tiempofin' => $_POST['fin']))) {
        $output['message'] = 'Agregado correctamente';
    } else {
        $output['error'] = true;
        $output['message'] = 'Ocurrió un error al agregar. No se pudo agregar';
    }
}
    catch(PDOException $e){
        echo "Se tiene un problema en la connecxion: " . $e->getMessage();
    }
    
     //cerrar conexión
    $database->close();

?>
