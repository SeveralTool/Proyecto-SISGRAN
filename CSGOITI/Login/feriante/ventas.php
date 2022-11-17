<?php
include('../conexion_bd.php');
session_start();
$PERSONAL = $_SESSION['NOMBREPERSONAL'];

$consulta1 = "SELECT vegetal.nombre_vegetal, variedad.foto_variedad, variedad.nombre_variedad
, vende.cantidad, variedad.unidad_variedad FROM vegetal, variedad, vende WHERE vende.id_vegetal = vegetal.id_vegetal
AND vende.id_variedad = variedad.id_variedad AND vende.nombre_vendedor = '$PERSONAL';";
$res1 = mysqli_query($conexion, $consulta1);

while($row1 = mysqli_fetch_array($res1)){
    $ven[] = array(
        'foto' => $row1['foto_variedad'],
        'vegetal' => $row1['nombre_vegetal'],
        'variedad' =>$row1['nombre_variedad'],
        'cantidad' => (int)$row1['cantidad'],
        'unidad' => $row1['unidad_variedad'],
    );
    
}

if(isset($ven)){
$ventas = json_encode($ven);
echo $ventas;
}else{
    echo "null";
}



?>