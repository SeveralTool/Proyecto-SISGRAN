<?php
include("../conexion_bd.php");

$consulta1 = 
"SELECT COUNT(esta.id_estado_pedido), estado_pedido.nombre_estado_pedido FROM esta, estado_pedido WHERE esta.id_estado_pedido = 2 AND esta.id_estado_pedido = estado_pedido.id_estado_pedido
AND esta.fecha_final_estado = '0000-00-00 00:00:00'
UNION
SELECT COUNT(esta.id_estado_pedido), estado_pedido.nombre_estado_pedido FROM esta, estado_pedido WHERE esta.id_estado_pedido = 3 AND esta.id_estado_pedido = estado_pedido.id_estado_pedido
AND esta.fecha_final_estado = '0000-00-00 00:00:00'
UNION
SELECT COUNT(esta.id_estado_pedido), estado_pedido.nombre_estado_pedido FROM esta, estado_pedido WHERE esta.id_estado_pedido = 4 AND esta.id_estado_pedido = estado_pedido.id_estado_pedido
AND esta.fecha_final_estado = '0000-00-00 00:00:00'
UNION
SELECT COUNT(esta.id_estado_pedido), estado_pedido.nombre_estado_pedido FROM esta, estado_pedido WHERE esta.id_estado_pedido = 5 AND esta.id_estado_pedido = estado_pedido.id_estado_pedido
AND esta.fecha_final_estado = '0000-00-00 00:00:00'
UNION
SELECT COUNT(esta.id_estado_pedido), estado_pedido.nombre_estado_pedido FROM esta, estado_pedido WHERE esta.id_estado_pedido = 6 AND esta.id_estado_pedido = estado_pedido.id_estado_pedido
AND esta.fecha_final_estado = '0000-00-00 00:00:00'
UNION
SELECT COUNT(esta.id_estado_pedido), estado_pedido.nombre_estado_pedido FROM esta, estado_pedido WHERE esta.id_estado_pedido = 7 AND esta.id_estado_pedido = estado_pedido.id_estado_pedido
AND esta.fecha_final_estado = '0000-00-00 00:00:00';";
$res1 = mysqli_query($conexion,$consulta1);

$contador = array();

while($row1 = mysqli_fetch_array($res1)){
    $contador[] = $row1;
    $conteo = json_encode($contador);
}
    echo $conteo;

    /*
    $contador[] = array(
        'nombre' => $row1['nombre_estado_pedido'],
        'cant' => $row1['COUNT(esta.id_estado_pedido)'],
    );
*/ 
?>