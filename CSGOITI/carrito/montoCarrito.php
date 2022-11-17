
<?php
include("../Login/PHP/conexion_bd.php");
include("../Login/PHP/sesion.php");
session_start();

if (isset($_SESSION['ID'])) {
    $IDUSER = $_SESSION['ID'];
    //MONTO TOTAL EN CARRITO

    $consulta1 = "SELECT pedido.nº_pedido FROM pedido WHERE pedido.nº_pedido = (SELECT MAX(pedido.nº_pedido) FROM pedido) AND pedido.nº_cliente = '$IDUSER';";
    $res1 = mysqli_query($conexion, $consulta1);
    $row1 = mysqli_fetch_array($res1);

    if (is_null($row1)) {
        echo "null";
    } else {
        $lastPedido = intval($row1['nº_pedido']);

        $montoTotal = "SELECT pedido.precio_total FROM pedido WHERE pedido.nº_cliente = $IDUSER AND pedido.nº_pedido = '$lastPedido';";
        $res4 = mysqli_query($conexion, $montoTotal);
        $row4 = mysqli_fetch_array($res4);

        if (is_null($row4)) {
            echo "null";
        } else {

            $precio[] = array(
                (int)'total' => (int)$row4['precio_total'],
            );

            $total = json_encode($precio);
            echo $total;
        }
    }
} else {
    echo "null";
}


?>

