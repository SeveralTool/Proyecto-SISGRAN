<?php
include '../conexion_bd.php';
session_start();
$ID =$_SESSION['ID'];

if(isset($_POST['vegetalT']) && isset($_POST['variedadT']) && isset($_POST['fechaCul'])){
    $vegetal = $_POST['vegetalT'];
    $variedad = $_POST['variedadT'];
    $fechaCul = $_POST['fechaCul'];
    $consulta1 = "UPDATE cultiva SET cultiva.estado_cultivo = 'Transplantado' WHERE 
    cultiva.id_vegetal = '$vegetal' AND cultiva.id_variedad = '$variedad' AND cultiva.id_huerta
    = '$ID' AND cultiva.fecha_cultivo = '$fechaCul';";
    $res1 = mysqli_query($conexion, $consulta1);
}


if(isset($_POST['vegetalC']) && isset($_POST['variedadC']) && isset($_POST['cant']) && isset($_POST['Fcultivo'])){
    $vegetal2 = $_POST['vegetalC'];
    $variedad2 = $_POST['variedadC'];
    $cantidad2 = $_POST['cant'];
    $fechaCultivo = $_POST['Fcultivo'];
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $fecha = date('Y-m-d');

    $consulta2 = "SELECT cosecha.cantidad FROM cosecha WHERE cosecha.id_vegetal = '$vegetal2'
    AND cosecha.id_variedad = '$variedad2' AND cosecha.id_huerta = '$ID' AND YEAR(CURRENT_DATE()) = YEAR(cosecha.fecha_cosecha);";
    $res2 = mysqli_query($conexion, $consulta2);
    $row2 = mysqli_fetch_array($res2);

    if(is_null($row2)){
        $consulta3 = "INSERT INTO cosecha VALUES('$ID','$variedad2','$vegetal2','$fecha','$cantidad2');";
        $res3 = mysqli_query($conexion,$consulta3);
    }else{
        $newCantidad = $cantidad2 + $row2['cantidad'];
        $consulta4 = "UPDATE cosecha SET cosecha.cantidad = '$newCantidad' WHERE cosecha.id_huerta = '$ID' AND cosecha.id_vegetal =
        '$vegetal2' AND cosecha.id_variedad = '$variedad2' AND YEAR(CURRENT_DATE()) = YEAR(cosecha.fecha_cosecha);";
        $res4 = mysqli_query($conexion,$consulta4);
    }

    $consulta5 = "UPDATE cultiva SET cultiva.estado_cultivo = 'Cosechado' WHERE cultiva.id_huerta = '$ID' AND cultiva.id_vegetal = '$vegetal2' 
    AND cultiva.id_variedad = '$variedad2' AND (cultiva.estado_cultivo = 'Transplantado' OR cultiva.estado_cultivo = 'En Proceso') AND cultiva.fecha_cultivo = '$fechaCultivo';";
    $res5 = mysqli_query($conexion,$consulta5);

    $consulta7 = "UPDATE stock SET stock.cantidad_stock = stock.cantidad_stock + '$cantidad2' WHERE stock.id_variedad = '$variedad2';";
    $res7 = mysqli_query($conexion, $consulta7);


}

if(isset($_POST['delVegetal']) && isset($_POST['delVariedad']) && isset($_POST['delFecha'])){
    $delV = $_POST['delVegetal'];
    $delVa = $_POST['delVariedad'];
    $delF =$_POST['delFecha'];
    $consulta6 = "DELETE FROM cultiva WHERE cultiva.id_vegetal = '$delV' AND cultiva.id_variedad = '$delVa'
    AND cultiva.fecha_cultivo = '$delF' AND cultiva.id_huerta = '$ID';";
    $res6 = mysqli_query($conexion,$consulta6);
}


?>