<?php
include("../Login/PHP/conexion_bd.php");
include("../Login/PHP/sesion.php");
error_reporting(0);
session_start();
$IDUSER = $_SESSION['ID'];
//PEDIMOS TODOS LOS PEDIDOS EN CARRITO DEL CLIENTE EN SESSION
    $consulta5 = "SELECT pedido.nº_pedido FROM pedido WHERE pedido.nº_pedido = (SELECT MAX(pedido.nº_pedido) FROM pedido) AND pedido.nº_cliente = '$IDUSER';";
    $res5 = mysqli_query($conexion, $consulta5);
    $row5 = mysqli_fetch_array($res5);
    $LASTpedido2 = (int)$row5['nº_pedido'];

    $pedidosenCarrito = "SELECT variedad.foto_variedad, detalle.nº_pedido, detalle.id_vegetal, detalle.id_variedad, vegetal.nombre_vegetal, variedad.nombre_variedad, detalle.cantidad FROM vegetal, variedad, detalle WHERE detalle.nº_cliente = '$IDUSER' AND detalle.nº_pedido = '$LASTpedido2' AND detalle.id_variedad = variedad.id_variedad AND detalle.id_vegetal = vegetal.id_vegetal;";
    $res1 = mysqli_query($conexion, $pedidosenCarrito);
    
    while($row1 = mysqli_fetch_array($res1)){
        $enCarrito[] = array(
            'foto' => $row1['foto_variedad'],
            'vegetal' => $row1['nombre_vegetal'],
            'variedad' => $row1['nombre_variedad'],
            'cantidad' => (int)$row1['cantidad'],
            'nº_pedido' => (int)$row1['nº_pedido'],
            'idVariedad' => (int)$row1['id_variedad'],
            'idVegetal' => (int)$row1['id_vegetal'],
        );
    }
if($enCarrito == null){
    echo "sin";
}else{
    $Carrito = json_encode($enCarrito);
    echo $Carrito;
}



// PARA ELIMINAR PRODUCTO DEL CARRITO
if(isset($_POST['IdVegetal'])>= 1 && ($_POST['IdVariedad'])){
    $consulta1 = "SELECT pedido.nº_pedido FROM pedido WHERE pedido.nº_pedido = (SELECT MAX(pedido.nº_pedido) FROM pedido) AND pedido.nº_cliente = '$IDUSER';";
    $res2 = mysqli_query($conexion, $consulta1);
    $row2 = mysqli_fetch_array($res2);
    $Npedido = intval($row2['nº_pedido']);
    $idVegetal = $_POST['IdVegetal'];
    $idVariedad = $_POST['IdVariedad'];
    $delete = "DELETE FROM detalle WHERE detalle.nº_pedido = '$Npedido' AND detalle.nº_cliente = '$IDUSER' AND detalle.id_vegetal = $idVegetal AND detalle.id_variedad = $idVariedad;";
    $res2 = mysqli_query($conexion,$delete);
    sleep(0.05);
    //ACTUALIZAMOS EL PRECIO TOTAL EN PEDIDOS
    $consulta2 = "SELECT SUM(detalle.precio_subtotal) FROM detalle WHERE detalle.nº_cliente = '$IDUSER' AND detalle.nº_pedido = '$Npedido';";
    $res3 = mysqli_query($conexion, $consulta2);
    $row3 = mysqli_fetch_array($res3);
    $montoACTUALIZADO = intval($row3['SUM(detalle.precio_subtotal)']);
    $update1 = "UPDATE pedido SET pedido.precio_total = '$montoACTUALIZADO' WHERE pedido.nº_cliente = '$IDUSER' AND pedido.nº_pedido = '$Npedido' ";
    $res4 = mysqli_query($conexion, $update1);
    if($res2 === true){
        echo "good";
    }

}




?>