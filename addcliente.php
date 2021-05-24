<?php

    include_once("bd/conexion.php"); 
 $database = new Connection();
 $db = $database->open();

    try{
        $stmt = $db->prepare("INSERT INTO tbl_cmv_cliente (nombre, apellidoPaterno, apellidoMaterno, rfc, curp, fechaAlta) VALUES (:nombre, :apellidoPaterno, :apellidoMaterno, :rfc, :curp, NOW())");
    if ($stmt->execute(array(':nombre' => $_POST['nombre'], ':apellidoPaterno' => $_POST['paterno'], ':apellidoMaterno' => $_POST['materno'],':rfc' => $_POST['rfc'],':curp' => $_POST['curp']))) {
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
