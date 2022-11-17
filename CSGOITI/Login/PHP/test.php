<?php
include("conexion_bd.php");

$lastCliente = "SELECT cliente.nº_cliente FROM cliente WHERE cliente.nº_cliente = (SELECT MAX(nº_cliente) FROM cliente);";
$res = mysqli_query($conexion,$lastCliente);
$array = mysqli_fetch_array($res);

echo $array['nº_cliente'];


?>