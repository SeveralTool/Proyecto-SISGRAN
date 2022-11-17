<?php
include("../../conexion_bd.php");

$consulta1 = 
"SELECT SUM(pedido.precio_total) FROM pedido WHERE MONTH(pedido.fecha_realizado) = '09' AND YEAR(CURRENT_DATE()) = YEAR(pedido.fecha_realizado)
UNION
SELECT SUM(pedido.precio_total) FROM pedido WHERE MONTH(pedido.fecha_realizado) = '10' AND YEAR(CURRENT_DATE()) = YEAR(pedido.fecha_realizado)
UNION
SELECT SUM(pedido.precio_total) FROM pedido WHERE MONTH(pedido.fecha_realizado) = '11' AND YEAR(CURRENT_DATE()) = YEAR(pedido.fecha_realizado)
UNION
SELECT SUM(pedido.precio_total) FROM pedido WHERE MONTH(pedido.fecha_realizado) = '12' AND YEAR(CURRENT_DATE()) = YEAR(pedido.fecha_realizado);";
$res1 = mysqli_query($conexion,$consulta1);

$contador = array();

while($row1 = mysqli_fetch_array($res1)){
    $contador[] = $row1;
    $conteo = json_encode($contador);
}
    echo $conteo;

?>