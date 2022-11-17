<?php
include '../../conexion_bd.php';
session_start();
$ID = $_SESSION['ID'];

$consulta = "SELECT SUM(cultiva.cantidad)
FROM cultiva
WHERE cultiva.id_huerta = '$ID' AND YEAR(cultiva.fecha_cultivo) = YEAR(CURRENT_DATE())";
$res = mysqli_query($conexion,$consulta);
$row = mysqli_fetch_array($res);
$consulta2 = "SELECT SUM(cosecha.cantidad)
FROM cosecha
WHERE cosecha.id_huerta = '$ID' AND YEAR(cosecha.fecha_cosecha) = YEAR(CURRENT_DATE());";
$res2 = mysqli_query($conexion,$consulta2);
$row2 = mysqli_fetch_array($res2);

    $tot[] = array(
        'cultivos' => $row['SUM(cultiva.cantidad)'],
        'cosechas' => $row2['SUM(cosecha.cantidad)'],
    );



$total = json_encode($tot);
echo $total;
?>