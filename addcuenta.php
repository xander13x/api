<?php

    include_once("bd/conexion.php"); 
 $database = new Connection();
 $db = $database->open();

    try{
        $stmt = $db->prepare("INSERT INTO tbl_cmv_cliente_cuenta (idCliente, idCuenta, saldoActual, fechaContratacion, fechaUltimoMovimiento) VALUES (:idCliente, :idCuenta, :saldoActual, NOW(), NOW())");
    if ($stmt->execute(array(':idCliente' => $_POST['idCliente'], ':idCuenta' => $_POST['idCuenta'], ':saldoActual' => $_POST['saldo']))) {
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
