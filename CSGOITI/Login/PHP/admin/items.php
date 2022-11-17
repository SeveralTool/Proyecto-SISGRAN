<?php
include('../conexion_bd.php');


if(isset($_POST['pedido'])){
    $pedido = $_POST['pedido'];
    $consulta3 = "SELECT  variedad.foto_variedad, vegetal.nombre_vegetal, variedad.nombre_variedad, detalle.cantidad
    FROM vegetal, variedad, detalle
    WHERE detalle.id_vegetal = variedad.id_vegetal AND variedad.id_vegetal = vegetal.id_vegetal AND detalle.id_variedad = variedad.id_variedad AND detalle.nº_pedido = '$pedido';";
    $res3 = mysqli_query($conexion, $consulta3);
    
    while($row3 = mysqli_fetch_array($res3)){
        $items[] = array(
            'foto' => $row3['foto_variedad'],
            'vegetal' => $row3['nombre_vegetal'],
            'variedad' => $row3['nombre_variedad'],
            'cantidad' => (int)$row3['cantidad'],
        );
    }
    $Items = json_encode($items);
    echo $Items;
}


?>