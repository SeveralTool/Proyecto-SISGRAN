<?php
include '../../conexion_bd.php';

$consulta1 = "SELECT huerta.nombre_huerta, huerta.id_huerta FROM huerta 
WHERE huerta.estado_huerta = 'aceptada';";
$res1 = mysqli_query($conexion, $consulta1);

while($row1 = mysqli_fetch_array($res1)){
    $dat[] = array(
        'nombre' => $row1['nombre_huerta'],
        'id' => (int)$row1['id_huerta'],
    );
}
$datos = json_encode($dat);
echo $datos;

?>