<?php
include("../../conexion_bd.php");

$consulta1 = 
"SELECT vegetal.nombre_vegetal, SUM(vende.cantidad) FROM vegetal, vende WHERE vende.id_vegetal = vegetal.id_vegetal GROUP BY vende.id_vegetal;";
$res1 = mysqli_query($conexion,$consulta1);

while($row1 = mysqli_fetch_array($res1)){
        $contador[] = $row1;
}

if(isset($contador)){
    $conteo = json_encode($contador);
    echo $conteo;
}else{
    echo "null";
}

?>