<?php
include '../conexion_bd.php';

//DEL CUENTA
if(isset($_POST['cliente'])){

    session_start();
    session_destroy();
    $cliente = $_POST['cliente'];
    $consulta2 = "UPDATE cliente SET cliente.estado_cliente = 'eliminado' WHERE cliente.nº_cliente = '$cliente';";
    $res2 = mysqli_query($conexion, $consulta2);


}

?>