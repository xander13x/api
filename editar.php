<?php
                include_once("bd/conexion.php"); 
$output = array('error' => false);

$database = new Connection();
$db = $database->open();
try {
    $sql = "UPDATE tbl_cmv_cliente SET nombre ='".$_POST['nombre']."', apellidoPaterno='".$_POST['fecha']."', apellidoMaterno='".$_POST['inicio']."' , rfc='".$_POST['fin']."' , curp='".$_POST['hora']."'  WHERE idCliente = '" . $_POST['id'] . "'";
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