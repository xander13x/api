<?php
                include_once("bd/conexion.php"); 
$output = array('error' => false);

$database = new Connection();
$db = $database->open();
try {
    $sql = "UPDATE tbl_cmv_cliente_cuenta SET idCuenta ='".$_POST['tipo']."', saldoActual='".$_POST['saldo']."', fechaUltimoMovimiento= NOW() WHERE idCliente = '" . $_POST['idc'] . "'";
    if ($db->exec($sql)) {
        $output['message'] = 'Modificado correctamente';
    } else {
        $output['error'] = true;
        $output['message'] = 'Ocurrió un error. No se pudo Modificar';
        $output['sql'] = $sql;
    }
} catch (PDOException $e) {
    $output['error'] = true;
    $output['message'] = $e->getMessage();
    ;
}
$database->close();
echo json_encode($output);
?>