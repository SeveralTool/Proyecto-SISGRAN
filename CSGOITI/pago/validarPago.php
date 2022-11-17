<?php
include("../Login/PHP/conexion_bd.php");
session_start();
$IDUSER = $_SESSION['ID'];

if(isset($_POST['ver'])){
    $consulta1 = "SELECT pedido.nº_pedido FROM pedido WHERE pedido.nº_pedido = (SELECT MAX(pedido.nº_pedido) FROM pedido) AND pedido.nº_cliente = '$IDUSER';";
    $res1 = mysqli_query($conexion, $consulta1);
    $row1 = mysqli_fetch_array($res1);
    $lastPedido = (int)$row1['nº_pedido'];
    $newPedido = $lastPedido + 1;
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $fecha = date('Y-m-d');
    $fechaHora = date('Y-m-d H:i:s');

    $consulta2 = "UPDATE esta SET esta.fecha_final_estado = '$fechaHora' WHERE esta.nº_pedido = '$lastPedido' AND esta.nº_cliente = '$IDUSER' AND esta.id_estado_pedido = '1';";
    $res2 = mysqli_query($conexion, $consulta2);

    $consulta9 = "INSERT INTO esta VALUES('$lastPedido','$IDUSER','$fechaHora','','2');";
    $res9 = mysqli_query($conexion, $consulta9);

    $consulta3 = "UPDATE pedido SET pedido.fecha_realizado = '$fecha' WHERE pedido.nº_cliente = '$IDUSER' AND pedido.nº_pedido = '$lastPedido';";  
    $res3 = mysqli_query($conexion, $consulta3);
    sleep(0.05);
    $consulta4 = "INSERT INTO pedido VALUES('','$IDUSER','','','PayPal','$fecha','0')";
    $res4 = mysqli_query($conexion, $consulta4);
    sleep(0.1);
    $consulta5 = "SELECT pedido.nº_pedido FROM pedido WHERE pedido.nº_pedido = (SELECT MAX(pedido.nº_pedido) FROM pedido) AND pedido.nº_cliente = '$IDUSER';";
    $res5 = mysqli_query($conexion, $consulta5);
    $row5 = mysqli_fetch_array($res5);
    $LASTpedido2 = (int)$row5['nº_pedido'];
    $consulta6 = "INSERT INTO esta VALUES('$LASTpedido2','$IDUSER','$fechaHora','','1')";
    $res6 = mysqli_query($conexion, $consulta6);
    

    echo "good";
    restar();
}

//RESTAR STOCK DE EL PEDIDO CUANDO SE ACEPTE EL PAGO


    function restar(){
    include("../Login/PHP/conexion_bd.php");
    $IDUSER = $_SESSION['ID'];
    $consulta6 = "SELECT pedido.nº_pedido FROM pedido WHERE pedido.nº_pedido = (SELECT MAX(pedido.nº_pedido) FROM pedido) AND pedido.nº_cliente = '$IDUSER';";
    $res6 = mysqli_query($conexion, $consulta6);
    $row6 = mysqli_fetch_array($res6);
    $ultimoPedido = (int)$row6['nº_pedido'] - 1;
    $consulta7 = "SELECT detalle.id_variedad, detalle.cantidad FROM detalle WHERE detalle.nº_cliente = '$IDUSER' AND detalle.nº_pedido = '$ultimoPedido';";
    $res7 = mysqli_query($conexion,$consulta7);
    while($row7 = mysqli_fetch_array($res7)){
        /*$var[] = array(
            'variedad' => (int)$row7['id_variedad'],
            'cantidad' => (int)$row7['cantidad'],
        );*/
    $variedad = (int)$row7['id_variedad'];
    $cantidad = (int)$row7['cantidad'];
    $consulta8 = "UPDATE stock SET stock.cantidad_stock = stock.cantidad_stock - '$cantidad' WHERE stock.id_variedad = '$variedad';";
    $res8 = mysqli_query($conexion, $consulta8);
    echo "</br>" . (int)$row7['cantidad'] . " " . (int)$row7['id_variedad'];
    }
    }


?>