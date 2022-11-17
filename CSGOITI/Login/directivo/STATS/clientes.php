<?php
include("../../conexion_bd.php");

$consulta1 = 
"SELECT cliente.estado_cliente, COUNT(cliente.estado_cliente) FROM cliente WHERE cliente.estado_cliente = 'pendiente'
UNION
SELECT cliente.estado_cliente, COUNT(cliente.estado_cliente) FROM cliente WHERE cliente.estado_cliente = 'aceptado'
UNION
SELECT cliente.estado_cliente, COUNT(cliente.estado_cliente) FROM cliente WHERE cliente.estado_cliente = 'rechazado';";
$res1 = mysqli_query($conexion,$consulta1);

$contador = array();

while($row1 = mysqli_fetch_array($res1)){
    $contador[] = $row1;
    $conteo = json_encode($contador);
}
    echo $conteo;

?>