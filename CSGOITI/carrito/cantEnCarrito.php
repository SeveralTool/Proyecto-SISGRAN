<?php
include("../Login/PHP/conexion_bd.php");
include("../Login/PHP/sesion.php");
session_start();

//CANTIDAD DE PRODUCTOS EN EL CARRITO

if(isset($_SESSION['ID'])){
    $IDUSER = $_SESSION['ID'];

    $consulta1 = "SELECT pedido.nº_pedido FROM pedido WHERE pedido.nº_pedido = (SELECT MAX(pedido.nº_pedido) FROM pedido) AND pedido.nº_cliente = '$IDUSER';";
    $res1 = mysqli_query($conexion, $consulta1);
    $row1 = mysqli_fetch_array($res1);
    if(is_null($row1)){
        echo "null";
    }else{
        $lastPedido = $row1['nº_pedido'];
        $cantProductos = "SELECT COUNT(detalle.nº_cliente) FROM detalle WHERE detalle.nº_cliente = '$IDUSER' AND detalle.nº_pedido = '$lastPedido';";
        $res3 = mysqli_query($conexion, $cantProductos);
        $row3 = mysqli_fetch_array($res3);
        $num = $row3['COUNT(detalle.nº_cliente)'];
        if($num === 0){
            echo "null";
        }else{
                $canti[] = array(
                    (int)'cant' => (int)$num,
                );
        }
            $cantproductos = json_encode($canti[0]);
            echo $cantproductos;
            
        }
    
}else{
echo "sin";
}


    





?>