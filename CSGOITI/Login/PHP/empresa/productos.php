<?php
include('../conexion_bd.php');
session_start();
$ID = $_SESSION["ID"];

if(isset($_POST['thisProductos'])){
    $num = $_POST['thisProductos'];
    $consulta3 = "SELECT variedad.foto_variedad, vegetal.nombre_vegetal, variedad.nombre_variedad, detalle.cantidad
    FROM vegetal, variedad, detalle
    WHERE detalle.id_vegetal = vegetal.id_vegetal AND detalle.id_variedad = variedad.id_variedad
    AND detalle.nº_pedido = '$num' AND detalle.nº_cliente = '$ID';";
    $res3 = mysqli_query($conexion,$consulta3);
 
    while($row3 = mysqli_fetch_array($res3)){
        $pro[] = array(
            'foto' => strval($row3['foto_variedad']),
            'vegetal' => $row3['nombre_vegetal'],
            'variedad' => $row3['nombre_variedad'],
            'cantidad' => (int)$row3['cantidad'],
        );
    }
    $productos = json_encode($pro);
    echo $productos;

}


?>