<?php
include("../Login/PHP/conexion_bd.php");
session_start();
$IDUSER = $_SESSION['ID'];
$ROL = $_SESSION['ROL'];




if(isset($_POST['PickDia'])>= 1 && ($_POST['PickHora'])){

    $DiaDeEntrega = $_POST['PickDia'];
    $HorarioDeEntrega = $_POST['PickHora'];
    
    $consulta1 = "SELECT pedido.nº_pedido FROM pedido WHERE pedido.nº_pedido = (SELECT MAX(pedido.nº_pedido) FROM pedido) AND pedido.nº_cliente = '$IDUSER';";
    $res1 = mysqli_query($conexion, $consulta1);
    $row1 = mysqli_fetch_array($res1);
    $lastPedido = intval($row1['nº_pedido']);

    $update1 = "UPDATE pedido SET fecha_entrega_pedido = '$DiaDeEntrega', rango_hora_entrega_pedido = '$HorarioDeEntrega' WHERE pedido.nº_pedido = '$lastPedido' AND pedido.nº_cliente = '$IDUSER';";
    $res2 = mysqli_query($conexion, $update1);

}




?>