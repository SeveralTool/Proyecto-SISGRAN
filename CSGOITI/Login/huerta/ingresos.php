<?php
include('../conexion_bd.php');
session_start();
$ID = $_SESSION['ID'];
date_default_timezone_set('America/Argentina/Buenos_Aires');

if(isset($_POST['vegetal1']) && isset($_POST['variedad1']) && isset($_POST['cantidad1'])){
    echo "llego";
    $vegetal = $_POST['vegetal1'];
    $variedad = $_POST['variedad1'];
    $cantidad = $_POST['cantidad1'];
    $fecha = date('Y-m-d');
    $consulta1 = "INSERT INTO cultiva VALUES('$ID','$variedad','$vegetal','$fecha','$cantidad','En Proceso');";
    $res1 = mysqli_query($conexion, $consulta1);    
}

if(isset($_POST['vegetal3']) && isset($_POST['vegetal2']) && isset($_POST['variedad3']) && isset($_POST['variedad2']) && isset($_POST['cantidad1']) && isset($_POST['cantidad2'])){
    $vegetal1 = $_POST['vegetal3'];
    $vegetal2 = $_POST['vegetal2'];
    $variedad3 = $_POST['variedad3'];
    $variedad2 = $_POST['variedad2'];
    $cantidad1 = $_POST['cantidad1'];
    $cantidad2 = $_POST['cantidad2'];
    $fecha = date('Y-m-d');
    $consulta2 = "INSERT INTO cultiva VALUES ('$ID','$variedad3','$vegetal1','$fecha','$cantidad1','En Proceso')";
    $res2 = mysqli_query($conexion, $consulta2);
    $consulta3 = "INSERT INTO cultiva VALUES('$ID','$variedad2','$vegetal2','$fecha','$cantidad2','En Proceso');";
    $res3 = mysqli_query($conexion, $consulta3);
}




?>