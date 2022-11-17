<?php
include '../Login/PHP/conexion_bd.php';
session_start();
if(isset($_SESSION['ID'])){
    $ID = $_SESSION['ID'];
}

if(isset($_POST['idVariedadalCarrito'])){
    $var = $_POST['idVariedadalCarrito'];

    $consulta0 = "SELECT MAX(pedido.nº_pedido) FROM pedido WHERE pedido.nº_cliente = '$ID';";
    $res0 = mysqli_query($conexion,$consulta0);
    $row0 = mysqli_fetch_array($res0);

    if(is_null($row0)){
        echo "null";
    }else{
        $pedido = (int)$row0['MAX(pedido.nº_pedido)'];
        $consutal = "SELECT detalle.cantidad FROM detalle WHERE detalle.nº_cliente = 
        '$ID' AND detalle.id_variedad = '$var' AND detalle.nº_pedido = '$pedido';";
        $res1 = mysqli_query($conexion, $consutal);
        $row1 = mysqli_fetch_array($res1);
        
        if(is_null($row1)){
            echo "null";
        }else{
            echo (int)$row1['cantidad'];
        }
    

    }

    

}





?>