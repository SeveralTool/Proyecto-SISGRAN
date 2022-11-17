<?php
include('../conexion_bd.php');
session_start();
$vendedor = $_SESSION['NOMBREPERSONAL'];

if(isset($_POST['vegetal'])){
    $vegetal = $_POST['vegetal'];
    $consulta1 = "SELECT variedad.id_variedad, variedad.nombre_variedad, variedad.foto_variedad, variedad.precio, variedad.unidad_variedad
    FROM variedad
    WHERE variedad.id_vegetal = '$vegetal';";
    $res1 = mysqli_query($conexion, $consulta1);

    while($row1 = mysqli_fetch_array($res1)){
        $vari[] = array(
            'id' => (int)$row1['id_variedad'],
            'foto' => $row1['foto_variedad'],
            'nombre' => $row1['nombre_variedad'],
            'precio' => (int)$row1['precio'],
            'unidad' => $row1['unidad_variedad'],
        );
    }
    $variedad = json_encode($vari);
    echo $variedad;

}

if(isset($_POST['fotoVegetal'])){
    $foto = $_POST['fotoVegetal'];
    $consulta2 = "SELECT variedad.foto_variedad FROM variedad WHERE variedad.id_vegetal = '$foto' LIMIT 0,1;";
    $res2 = mysqli_query($conexion, $consulta2);
    $row2 =mysqli_fetch_array($res2);
    $ruta[] = array(
        'ruta' => $row2['foto_variedad'],
    );
    $variedad = "";
    $RUTA = json_encode($ruta);
    echo $RUTA;
}

if(isset($_POST['variedad'])){
    $IDvariedad = $_POST['variedad'];
    $consulta3 = "SELECT stock.cantidad_stock, variedad.precio FROM stock, variedad WHERE stock.id_variedad = '$IDvariedad' AND variedad.id_variedad = '$IDvariedad';";
    $res3 = mysqli_query($conexion, $consulta3);
    $row3 = mysqli_fetch_array($res3);
    $info[] = array(
        'stock' => (int)$row3['cantidad_stock'],
        'precio' => (int)$row3['precio'],
    );
    $INFO = json_encode($info);
    echo $INFO;
}

if(isset($_POST['vegetalF'])>= 1 && isset($_POST['variedadF'])>= 1 && isset($_POST['cantidad'])>= 1 && isset($_POST['stockUpdate'])){
    $vegetalFinal = $_POST['vegetalF'];
    $variedadFinal = $_POST['variedadF'];
    $cantidad = $_POST['cantidad'];
    $stockUpdate = $_POST['stockUpdate'];
    $fecha = date('Y-m-d');
    $consulta6 = "SELECT vende.id_variedad, vende.cantidad FROM vende WHERE vende.nombre_vendedor = '$vendedor' AND vende.id_variedad = '$variedadFinal';";
    $res6 = mysqli_query($conexion,$consulta6);
    $row6 = mysqli_fetch_array($res6);

    if(is_null($row6)){
        
            $consulta4 = "INSERT INTO vende VALUES('$vegetalFinal','$variedadFinal','$vendedor','$fecha','$cantidad');";
            $res4 = mysqli_query($conexion, $consulta4);
            $consulta5 = "UPDATE stock SET stock.cantidad_stock = '$stockUpdate' WHERE stock.id_variedad = '$variedadFinal';";
            $res5 = mysqli_query($conexion, $consulta5);
            echo "OKEYYYY";
        
    }else{
        $var = (int)$row6['id_variedad'];
        $cant = (int)$row6['cantidad'];
        if($var == $variedadFinal){
            $cantidadUpdate = $cant + $cantidad;
            $consulta7 = "UPDATE vende SET vende.cantidad = '$cantidadUpdate'  WHERE vende.nombre_vendedor = '$vendedor' AND vende.id_variedad = '$variedadFinal';";
            $res7 = mysqli_query($conexion, $consulta7);            
            $consulta5 = "UPDATE stock SET stock.cantidad_stock = '$stockUpdate' WHERE stock.id_variedad = '$variedadFinal';";
            $res5 = mysqli_query($conexion, $consulta5);
        }
    }
}



?>