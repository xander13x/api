<?php
            session_start();
            include_once($_SESSION['url']."bd/conexion.php"); 
             $database = new Connection();
             $db = $database->open();


                try{
                    $stmt = $db->prepare("INSERT INTO afiliado (idu,ide,fecha) VALUES (:idu,:ide,NOW())");
    if ($stmt->execute(array(':idu' => $_SESSION['idu'], ':ide' => $_POST['ide']))) {
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
