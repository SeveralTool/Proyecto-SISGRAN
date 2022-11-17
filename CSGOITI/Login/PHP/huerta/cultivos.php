<?php
include ('../conexion_bd.php');
session_start();
$ID = $_SESSION['ID'];

$consulta1 = "SELECT cultiva.fecha_cultivo, variedad.foto_variedad, vegetal.nombre_vegetal, variedad.nombre_variedad,calendario.tiempo_germinar,
calendario.tiempo_transplante, calendario.tiempo_cosecha, calendario.metodo_siembra, cultiva.fecha_cultivo,
cultiva.id_vegetal, cultiva.id_variedad, cultiva.cantidad, cultiva.estado_cultivo, variedad.unidad_variedad,
calendario.profundidad_siembra FROM vegetal, cultiva, variedad, calendario, huerta WHERE cultiva.id_vegetal = 
vegetal.id_vegetal AND cultiva.id_variedad = variedad.id_variedad AND vegetal.id_vegetal = calendario.id_vegetal AND
cultiva.id_huerta = '$ID' AND huerta.id_huerta = '$ID' AND cultiva.estado_cultivo != 'Cosechado' ORDER BY cultiva.fecha_cultivo ASC;";
$res1 = mysqli_query($conexion,$consulta1);

date_default_timezone_set('America/Argentina/Buenos_Aires');
while($row1 = mysqli_fetch_array($res1)){
    $fechaActual = date('Y-m-d');
    $fechaCultivo = $row1['fecha_cultivo'];
    $germinar = $row1['tiempo_germinar'];
    $transplante = $row1['tiempo_transplante'];
    $cosecha = $row1['tiempo_cosecha'];
    
    $fechaCosecha = strtotime("+$cosecha days", strtotime($fechaCultivo));
    $fechaCosecha = date('Y-m-d', $fechaCosecha);
    //
    $fechaGerminar = strtotime("+$germinar days", strtotime($fechaCultivo));
    $fechaGerminar = date('Y-m-d', $fechaGerminar);
    //
    $fechaTransplante = strtotime("+$transplante days", strtotime($fechaCultivo));
    $fechaTransplante = date('Y-m-d', $fechaTransplante);
    $cul[] = array(
        'imagen' => $row1['foto_variedad'],
        'vegetal' => $row1['nombre_vegetal'],
        'variedad' => $row1['nombre_variedad'],
        'cantidad' => $row1['cantidad'],
        'estado' => $row1['estado_cultivo'],
        'unidad' => $row1['unidad_variedad'],
        'id_vegetal' => $row1['id_vegetal'],
        'id_variedad' => $row1['id_variedad'],
        'siembra' => $row1['metodo_siembra'],
        'fecha_cultivo' => $row1['fecha_cultivo'],
        'profundidad' => $row1['profundidad_siembra'],
        'fechaCosecha' => $fechaCosecha,
        'fechaGerminar' => $fechaGerminar,
        'fechaTransplante' => $fechaTransplante,
        'fechaActual' => $fechaActual,
    );

}

if(empty($cul)){
    echo "null";
}else{
    $cultivos = json_encode($cul);
    echo $cultivos;
}


?>