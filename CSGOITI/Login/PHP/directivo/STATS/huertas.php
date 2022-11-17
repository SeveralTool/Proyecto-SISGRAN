<?php
include("../../conexion_bd.php");

$consulta1 = 
"SELECT huerta.estado_huerta , COUNT(huerta.estado_huerta) FROM huerta WHERE huerta.estado_huerta = 'pendiente'
UNION
SELECT huerta.estado_huerta, COUNT(huerta.estado_huerta) FROM huerta WHERE huerta.estado_huerta = 'aceptada'
UNION
SELECT huerta.estado_huerta, COUNT(huerta.estado_huerta) FROM huerta WHERE huerta.estado_huerta = 'aprobada'
UNION
SELECT huerta.estado_huerta, COUNT(huerta.estado_huerta) FROM huerta WHERE huerta.estado_huerta = 'rechazada';";
$res1 = mysqli_query($conexion,$consulta1);

$contador = array();

while($row1 = mysqli_fetch_array($res1)){
    $contador[] = $row1;
    $conteo = json_encode($contador);
}
    echo $conteo;

?>