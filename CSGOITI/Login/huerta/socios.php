<?php
include('../conexion_bd.php');
session_start();
$IDUSER = $_SESSION['ID'];



if(isset($_POST['vegetal'])){
    $vegetal = $_POST['vegetal'];
    $consulta12 = "SELECT variedad.nombre_variedad, variedad.id_variedad FROM variedad WHERE variedad.id_vegetal = '$vegetal';";
    $res12 = mysqli_query($conexion,$consulta12);
    $var = array();
    while($row12 = mysqli_fetch_array($res12)){
        $var[] = array(
            'nombre' => $row12['nombre_variedad'],
            'id' => $row12['id_variedad'],
        );

    }
    $variedad = json_encode($var);
    echo $variedad;
}


if(isset($_POST['vegetal1'])){
    $vegetal1 = $_POST['vegetal1'];
    $consulta11 = "SELECT vegetal.nombre_vegetal, asocia.id_vegetal_socio FROM asocia, vegetal WHERE asocia.id_vegetal = '$vegetal1' AND asocia.id_vegetal_socio = vegetal.id_vegetal;";
    $res11 = mysqli_query($conexion,$consulta11);
    $soc = array();
    while($row11 = mysqli_fetch_array($res11)){
        $soc[] = array(
            'nombre' => $row11['nombre_vegetal'],
            'socio' => $row11['id_vegetal_socio'],
        );

    }
    $socio = json_encode($soc);
    echo $socio;
}


if(isset($_POST['vegetal2'])){
    $vegetal2 = $_POST['vegetal2'];
    $consulta13 = "SELECT variedad.nombre_variedad, variedad.id_variedad FROM variedad WHERE variedad.id_vegetal = '$vegetal2';";
    $res13 = mysqli_query($conexion,$consulta13);
    $var2 = array();
    while($row13 = mysqli_fetch_array($res13)){
        $var2[] = array(
            'nombre' => $row13['nombre_variedad'],
            'id' => $row13['id_variedad'],
        );

    }
    $variedad2 = json_encode($var2);
    echo $variedad2;
}




?>