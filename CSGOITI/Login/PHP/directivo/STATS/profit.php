<?php
include '../../conexion_bd.php';

$consulta1 = "SELECT
(SELECT SUM(pedido.precio_total)FROM pedido) AS ventasweb,
(SELECT SUM(vende.cantidad*variedad.precio)FROM variedad, vende WHERE vende.id_variedad = variedad.id_variedad) AS ventasalmacen;";
$res1 =mysqli_query($conexion, $consulta1);
$row1 = mysqli_fetch_array($res1);
$web = (int)$row1['ventasweb'];
$almacen = (int)$row1['ventasalmacen'];
$total = $web + $almacen;
echo $total;


?>