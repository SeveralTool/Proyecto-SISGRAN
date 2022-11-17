<?php
include("../../conexion_bd.php");

$consulta1 = 
"SELECT vegetal.nombre_vegetal, SUM(stock.cantidad_stock) FROM vegetal, stock WHERE stock.id_vegetal = vegetal.id_vegetal GROUP BY stock.id_vegetal;";
$res1 = mysqli_query($conexion,$consulta1);

$contador = array();

while($row1 = mysqli_fetch_array($res1)){
    $contador[] = $row1;
    $conteo = json_encode($contador);
}
    echo $conteo;

?>