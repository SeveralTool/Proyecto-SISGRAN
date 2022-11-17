<?php
include '../conexion_bd.php';

$consulta1 = "SELECT pedido.nº_pedido,cliente.nº_cliente, pedido.fecha_entrega_pedido, pedido.rango_hora_entrega_pedido,
pedido.precio_total, cliente.direccion, cliente.puerta, cliente.postal FROM cliente, pedido, esta
WHERE pedido.nº_cliente = cliente.nº_cliente AND pedido.nº_pedido = esta.nº_pedido AND (esta.id_estado_pedido
= '3' OR esta.id_estado_pedido = '6') AND (esta.fecha_final_estado = '0000-00-00 00:00:00' OR esta.fecha_final_estado IS NULL) 
AND DAY(pedido.fecha_entrega_pedido) = DAY(CURRENT_DATE()) ORDER BY pedido.fecha_entrega_pedido ASC;";
$res1 = mysqli_query($conexion,$consulta1);

while($row1 = mysqli_fetch_array($res1)){
    $det[] = array(
        'cliente' => $row1['nº_cliente'],
        'pedido' => $row1['nº_pedido'],
        'fecha' => $row1['fecha_entrega_pedido'],
        'hora' => $row1['rango_hora_entrega_pedido'],
        'precio' => $row1['precio_total'],
        'direccion' => $row1['direccion'],
        'puerta' => $row1['puerta'],
        'postal' => $row1['postal'],

    );
}
    
   if(empty($det)){
    echo "null";
   }else{
    $pedido = json_encode($det);
    echo $pedido;
   }

?>