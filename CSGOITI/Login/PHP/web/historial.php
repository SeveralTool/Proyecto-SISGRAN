<?php
include('../conexion_bd.php');
session_start();
$ID = $_SESSION["ID"];

$consulta1 = "SELECT pedido.nº_pedido, pedido.fecha_realizado, pedido.fecha_entrega_pedido,
rango_hora_entrega_pedido, pedido.precio_total, esta.id_estado_pedido, estado_pedido.nombre_estado_pedido
FROM pedido, esta, estado_pedido
WHERE pedido.nº_pedido = esta.nº_pedido AND esta.id_estado_pedido = estado_pedido.id_estado_pedido AND pedido.nº_cliente
= '$ID' AND esta.nº_cliente = '$ID' AND (esta.id_estado_pedido = 5 OR esta.id_estado_pedido = 6 OR esta.id_estado_pedido = 7) 
AND esta.fecha_final_estado != (esta.fecha_final_estado = '0000-00-00 00:00:00' OR esta.fecha_final_estado IS NULL) ORDER BY esta.nº_pedido DESC;";
$res1 = mysqli_query($conexion, $consulta1);

if ($res1 === false) {
    echo "null";
} else {
    while ($row1 = mysqli_fetch_array($res1)) {

        $ped[] = array(
            'pedido' => (int)$row1['nº_pedido'],
            'realizado' => $row1['fecha_realizado'],
            'entrega' => $row1['fecha_entrega_pedido'],
            'horario' => $row1['rango_hora_entrega_pedido'],
            'precio' => $row1['precio_total'],
            'IDestado' => (int)$row1['id_estado_pedido'],
            'estado' => $row1['nombre_estado_pedido'],
        );
    }
    if(empty($ped)){
        echo "null";
    }else{
        $pedidos = json_encode($ped);
        echo $pedidos;
    }
}
