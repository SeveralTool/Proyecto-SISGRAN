<?php
include '../conexion_bd.php';
date_default_timezone_set('America/Argentina/Buenos_Aires');

if (isset($_POST['pedido']) && isset($_POST['cliente'])) {
    $pedido = $_POST['pedido'];
    $cliente = $_POST['cliente'];
    $consulta2 = "SELECT cliente.direccion, cliente.puerta,cliente.nº_cliente,
    pedido.fecha_entrega_pedido, pedido.rango_hora_entrega_pedido FROM cliente,esta, pedido 
    WHERE pedido.nº_pedido = '$pedido' AND pedido.nº_cliente = cliente.nº_cliente AND
    esta.id_estado_pedido = '3' AND pedido.nº_pedido = esta.nº_pedido AND 
    (esta.fecha_final_estado = '0000-00-00 00:00:00' OR esta.fecha_final_estado IS NULL);";
    $res2 = mysqli_query($conexion, $consulta2);
    $row2 = mysqli_fetch_array($res2);
    if (is_null($row2)) {
        echo "null";
    } else {
        $dir[] = array(
            'cliente' => $row2['nº_cliente'],
            'direccion' => $row2['direccion'],
            'puerta' => $row2['puerta'],
            'fecha' => $row2['fecha_entrega_pedido'],
            'hora' => $row2['rango_hora_entrega_pedido'],
        );
        $direccion = json_encode($dir);
        echo $direccion;


        $fechaHora = date('Y-m-d h:i:s');
        $consulta2 = "UPDATE esta SET esta.fecha_final_estado = '$fechaHora' WHERE esta.nº_pedido = '$pedido' AND esta.id_estado_pedido = '3';";
        $res2 = mysqli_query($conexion, $consulta2);
        $consulta6 = "INSERT INTO esta VALUES('$pedido','$cliente','$fechaHora','','4');";
        $res6 = mysqli_query($conexion, $consulta6);
    }
}

/*
if(isset($_POST['closePedido'])){
    $pedido2 = $_POST['closePedido'];
    $consulta3 = "UPDATE esta SET esta.id_estado_pedido = '3' WHERE esta.nº_pedido = '$pedido2';";
    $res3 = mysqli_query($conexion,$consulta3);
}
*/

if (isset($_POST['pedido3']) && isset($_POST['cliente3'])) {
    $fechaHora2 = date('Y-m-d h:i:s');
    $endPedido = $_POST['pedido3'];
    $endCliente = $_POST['cliente3'];
    $consulta4 = "UPDATE esta SET esta.fecha_final_estado = '$fechaHora2' WHERE esta.nº_pedido = '$endPedido' AND
    esta.id_estado_pedido = '4';";
    $res4 = mysqli_query($conexion, $consulta4);
    $consulta7 = "INSERT INTO esta VALUES('$endPedido','$endCliente','$fechaHora2','$fechaHora2','5');";
    $res7 = mysqli_query($conexion, $consulta7);
}

if (isset($_POST['notPedido']) && isset($_POST['notCliente'])) {
    $fechaHora3 = date('Y-m-d h:i:s');
    $Pedido3 = $_POST['notPedido'];
    $notCliente = $_POST['notCliente'];
    $consulta5 = "UPDATE esta SET esta.fecha_final_estado = '$fechaHora3' WHERE esta.nº_pedido = '$Pedido3' AND
    esta.id_estado_pedido = '4';";
    $res5 = mysqli_query($conexion, $consulta5);
    $consulta8  = "INSERT INTO esta VALUES('$Pedido3','$notCliente','$fechaHora3','','6');";
    $res8 = mysqli_query($conexion, $consulta8);
}
