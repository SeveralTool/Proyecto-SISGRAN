<?php
include("../conexion_bd.php");

$consulta2 = "SELECT pedido.nº_pedido, pedido.nº_cliente, pedido.fecha_realizado, pedido.fecha_entrega_pedido, pedido.rango_hora_entrega_pedido, pedido.precio_total 
FROM pedido, esta
WHERE esta.id_estado_pedido = '2' AND pedido.nº_pedido = esta.nº_pedido
AND (esta.fecha_final_estado = '0000-00-00 00:00:00' OR esta.fecha_final_estado IS NULL) ORDER BY pedido.fecha_realizado ASC;";
$res2 = mysqli_query($conexion, $consulta2);
if ($res2 == false) {
    echo "null";
} else {
    while ($row2 = mysqli_fetch_array($res2)) {
        $pedidos[] = array(
            'nº_pedido' => (int)$row2['nº_pedido'],
            'nº_cliente' => (int)$row2['nº_cliente'],
            'realizado' => $row2['fecha_realizado'],
            'entrega' => $row2['fecha_entrega_pedido'],
            'horario' => $row2['rango_hora_entrega_pedido'],
            'total' => $row2['precio_total'],
        );
    }

    if (empty($pedidos)) {
        echo "null";
    } else {
        $Pedidos = json_encode($pedidos);
        echo $Pedidos;
    }
}

if (isset($_POST['pedidoArmado']) && isset($_POST['cliente'])) {
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $armado = $_POST['pedidoArmado'];
    $cliente = $_POST['cliente'];
    $fechaHora = date('Y-m-d H:i:s');
    $consulta3 = "UPDATE esta SET esta.fecha_final_estado = '$fechaHora' WHERE esta.nº_pedido = '$armado' AND esta.id_estado_pedido = '2';";
    $res3 = mysqli_query($conexion, $consulta3);

    $consulta4 = "INSERT INTO esta VALUES('$armado','$cliente','$fechaHora','','3')";
    $res4 = mysqli_query($conexion, $consulta4);

}
