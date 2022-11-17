<?php
include('../conexion_bd.php');
session_start();
$ID = $_SESSION["ID"];

$consulta1 = "SELECT pedido.nº_pedido, pedido.fecha_realizado, pedido.fecha_entrega_pedido,
rango_hora_entrega_pedido, pedido.precio_total, esta.id_estado_pedido, estado_pedido.nombre_estado_pedido
FROM pedido, esta, estado_pedido
WHERE pedido.nº_pedido = esta.nº_pedido AND esta.id_estado_pedido = estado_pedido.id_estado_pedido 
AND pedido.nº_cliente
= '$ID' AND esta.nº_cliente = '$ID' AND (esta.id_estado_pedido = 2 OR esta.id_estado_pedido = 3) 
AND esta.fecha_final_estado = '0000-00-00 00:00:00' ORDER BY esta.id_estado_pedido ASC;";
$res1 = mysqli_query($conexion, $consulta1);

if($res1 == false){
    echo "null";
}else{
    while($row1 = mysqli_fetch_array($res1)){
        $ped[] = array(
            'pedido' => (int)$row1['nº_pedido'],
            'realizado' => $row1['fecha_realizado'],
            'entrega' => $row1['fecha_entrega_pedido'],
            'horario' => $row1['rango_hora_entrega_pedido'],
            'precio' => $row1['precio_total'],
            'IDestado' => (int)$row1['id_estado_pedido'],
            'estado' => $row1['nombre_estado_pedido'],
        );
    }
    if(empty($ped)){
        echo "null";
    }else{
        $pedidos = json_encode($ped);
        echo $pedidos;
    }


}

if(isset($_POST['pedidoCancelar'])){
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $fecha = date('Y-m-d');
    $fechaHora = date('Y-m-d H:i:s');
    $Pcanelar = $_POST['pedidoCancelar'];
    $consulta2 = "UPDATE esta SET esta.fecha_final_estado = '$fechaHora' WHERE esta.nº_pedido = '$Pcanelar' AND esta.nº_cliente = '$ID' AND (esta.id_estado_pedido = '2' OR esta.id_estado_pedido = '3') AND 
    esta.fecha_final_estado = '0000-00-00 00:00:00';";
    $res2 = mysqli_query($conexion, $consulta2);
    $consulta4 = "INSERT INTO esta VALUES('$Pcanelar','$ID','$fechaHora','$fechaHora','7');";
    $res4 = mysqli_query($conexion,$consulta4);

    //RESTAURAR STOCK DEL PEDIDO CANCELADO
    $consulta5 = "SELECT detalle.id_variedad, detalle.cantidad FROM detalle WHERE detalle.nº_pedido = '$Pcanelar' AND detalle.nº_cliente = '$ID';";
    $res5 = mysqli_query($conexion, $consulta5);
    while($row5 = mysqli_fetch_array($res5)){
    $vari = $row5['id_variedad'];
    $cant = $row5['cantidad'];
    $consulta6 = "UPDATE stock SET stock.cantidad_stock = stock.cantidad_stock + $cant WHERE stock.id_variedad = '$vari';";
    $res6 = mysqli_query($conexion, $consulta6);
    }
}

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
    $productos = json_encode($pro, JSON_FORCE_OBJECT);
    echo $productos;

}


?>