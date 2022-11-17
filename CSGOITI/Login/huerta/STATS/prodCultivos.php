<?php
include '../../conexion_bd.php';
session_start();
$ID = $_SESSION['ID'];

$consulta = "SELECT vegetal.nombre_vegetal, cultiva.cantidad
FROM vegetal, cultiva
WHERE cultiva.id_vegetal = vegetal.id_vegetal AND cultiva.id_huerta = '$ID' AND YEAR(cultiva.fecha_cultivo) = YEAR(CURRENT_DATE());";
$res = mysqli_query($conexion,$consulta);

while($row = mysqli_fetch_array($res)){
    $cul[] = array(
        'vegetal' => $row['nombre_vegetal'],
        'cantidad' => $row['cantidad'],
    );
}
$cultivos = json_encode($cul);
echo $cultivos;
?>