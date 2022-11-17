<?php
include '../conexion_bd.php';

//DEL CUENTA
if(isset($_POST['cliente'])){

    session_start();
    session_destroy();
    $cliente = $_POST['cliente'];
    $consulta2 = "UPDATE huerta SET huerta.estado_huerta = 'eliminada' WHERE huerta.id_huerta = '$cliente';";
    $res2 = mysqli_query($conexion, $consulta2);


}

?>