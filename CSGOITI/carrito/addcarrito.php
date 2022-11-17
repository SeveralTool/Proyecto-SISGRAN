<?php
include("../Login/PHP/conexion_bd.php");
include("../Login/PHP/sesion.php");
session_start();
$IDUSER = $_SESSION['ID'];
//AGREGA PRODUCTOS AL CARRITO

if (
    isset($_POST['idVegetalalCarrito']) >= 1 && ($_POST['idVariedadalCarrito']) >= 1 && ($_POST['CantidadtotalalCarrito']) >= 1
    && ($_POST['stock']) >= 1 && ($_POST['precioalCarrito']) >= 1 && ($_POST['precioTotalalCarrito'])
) {

    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $fecha = date('d/m/Y');
    $fechaHora = date('d/m/Y h:i');
    $idvegetal = $_POST['idVegetalalCarrito'];
    $idvariedad = $_POST['idVariedadalCarrito'];
    $cantidadtotal = $_POST['CantidadtotalalCarrito'];
    $precio = $_POST['precioalCarrito'];
    $stock = $_POST['stock'];
    $precioSUBtotal = $_POST['precioTotalalCarrito'];
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $fecha = date('Y-m-d');
    $fechaHora = date('Y-m-d H:i:s');

    $consulta4 = "SELECT stock.cantidad_stock FROM stock WHERE stock.id_variedad = '$idvariedad';";
    $res4 = mysqli_query($conexion, $consulta4);
    $row4 = mysqli_fetch_array($res4);

    if ($cantidadtotal <= (int)$row4['cantidad_stock']) {

        //SELECCIONAMOS EL ULTIMO PEDIDO DEL CLIENTE(PRODUCTOS DEL CARRITO ACTUAL)
        $selPedidoActual = "SELECT pedido.nº_pedido FROM pedido WHERE pedido.nº_pedido = (SELECT MAX(pedido.nº_pedido) FROM pedido) AND pedido.nº_cliente = '$IDUSER';";
        $res1 = mysqli_query($conexion, $selPedidoActual);
        $row1 = mysqli_fetch_array($res1);
        //SI ES NULA LA VARIABLE NO HAY NINGUN REGISTRO DE PEDIDOS DEL CLIENTE, POR LO TANTO LE ASIGNAREMOS EL PRIMERO
        if (is_null($row1)) {
            $primerPedido = "INSERT INTO pedido VALUES('','$IDUSER','','','PayPal','$fecha','$precioSUBtotal');";
            $res2 = mysqli_query($conexion, $primerPedido);
            sleep(0.05);
            $selLastPedido = "SELECT pedido.nº_pedido FROM pedido WHERE pedido.nº_pedido = (SELECT MAX(pedido.nº_pedido) FROM pedido) AND pedido.nº_cliente = '$IDUSER';";
            $res3 = mysqli_query($conexion, $selLastPedido);
            $row3 = mysqli_fetch_array($res3);
            $primero = intval($row3['nº_pedido']);
            $primerProducto = "INSERT INTO detalle VALUES('$primero','$IDUSER','$idvegetal','$idvariedad','$cantidadtotal','$precio','$precioSUBtotal');";
            $res4 = mysqli_query($conexion, $primerProducto);
            $addEstado = "INSERT INTO esta VALUES('$primero','$IDUSER','$fechaHora','','1');";
            $res5 = mysqli_query($conexion, $addEstado);
        } else {
            //SELECCIONAMOS EL ULTIMO PEDIDO ACTIVO DEL CLIENTE
            $LastPedido = "SELECT pedido.nº_pedido FROM pedido WHERE pedido.nº_pedido = (SELECT MAX(pedido.nº_pedido) FROM pedido) AND pedido.nº_cliente = '$IDUSER';";
            $res6 = mysqli_query($conexion, $LastPedido);
            $row6 = mysqli_fetch_array($res6);
            $lastPEDIDO = intval($row6['nº_pedido']);

            //(1)AGREGAMOS EL PRODUCTO JUNTO CON ESE ULTIMO NUMERO DE PEDIDO ACTIVO

            //ANTES VERIFICAMOS SI YA TIENE ESE PRODUCTO EN EL CARRITO EN ESTE PEDIDO
            $verProducto = "SELECT detalle.cantidad FROM detalle WHERE detalle.nº_cliente = '$IDUSER' AND detalle.nº_pedido = '$lastPEDIDO' AND detalle.id_vegetal = '$idvegetal' AND detalle.id_variedad = '$idvariedad';";
            $res7 = mysqli_query($conexion, $verProducto);
            $row7 = mysqli_fetch_array($res7);
            $VERp = $row7['cantidad'];
            if (!empty($VERp)) {
                $cantidadACTUALIZADA = $VERp + $cantidadtotal;
                //ACTUALIZAMOS LA CANTIDAD QUE AGREGO EL CLIENTE 
                $update1 = "UPDATE detalle SET detalle.cantidad = '$cantidadACTUALIZADA' WHERE detalle.nº_cliente = '$IDUSER' AND detalle.nº_pedido = '$lastPEDIDO' AND detalle.id_vegetal = '$idvegetal' AND detalle.id_variedad = '$idvariedad';";
                $res8 = mysqli_query($conexion, $update1);
                sleep(0.05);
                //TRAEMOS LA CANTIDAD ACTUALIZADA Y EL PRECIO DE CADA PRODUCTO, PARA ACTUALIZAR EL SUB TOTAL Y EL TOTAL EN PEDIDOS
                $consulta1 = "SELECT detalle.cantidad, detalle.precio_unidad FROM detalle WHERE detalle.nº_cliente = '$IDUSER' AND detalle.nº_pedido = '$lastPEDIDO' AND detalle.id_vegetal = '$idvegetal' AND detalle.id_variedad = '$idvariedad';";
                $res9 = mysqli_query($conexion, $consulta1);
                $row9 = mysqli_fetch_array($res9);
                $consultaCANTIDAD = intval($row9['cantidad']);
                $consultaPRECIOUNIDAD = intval($row9['precio_unidad']);
                $SUBtotal = $consultaCANTIDAD * $consultaPRECIOUNIDAD;
                //AHORA SI ACTUALIZAMOS EN DETALLE Y PEDIDO
                $update4 = "UPDATE detalle SET detalle.precio_subtotal = '$SUBtotal' WHERE detalle.nº_cliente = '$IDUSER' AND detalle.nº_pedido = '$lastPEDIDO' AND detalle.id_vegetal = '$idvegetal' AND detalle.id_variedad = '$idvariedad';";
                $res10 = mysqli_query($conexion, $update4);
                sleep(0.08);
                $consulta2 = "SELECT SUM(detalle.precio_subtotal) FROM detalle WHERE detalle.nº_cliente = '$IDUSER' AND detalle.nº_pedido = '$lastPEDIDO';";
                $res11 = mysqli_query($conexion, $consulta2);
                $row11 = mysqli_fetch_array($res11);
                $totalPEDIDOactual = intval($row11['SUM(detalle.precio_subtotal)']);
                $update2 = "UPDATE pedido SET pedido.precio_total = '$totalPEDIDOactual' WHERE pedido.nº_cliente = '$IDUSER' AND pedido.nº_pedido = '$lastPEDIDO';";
                $res14 = mysqli_query($conexion, $update2);
            } else {
                //(1)ACA AGREGAMOS OTRO PRODUCTO SI NO ESTABA EN EL PEDIDO ACTIVO
                $addProducto = "INSERT INTO detalle VALUES('$lastPEDIDO','$IDUSER','$idvegetal','$idvariedad','$cantidadtotal','$precio','$precioSUBtotal');";
                $res12 = mysqli_query($conexion, $addProducto);
                //SUMAMOS NUEVAMENTE EL TOTAL DEL PEDIDO ACTIVO
                $consulta3 = "SELECT SUM(detalle.precio_subtotal) FROM detalle WHERE detalle.nº_cliente = '$IDUSER' AND detalle.nº_pedido = '$lastPEDIDO';";
                $res13 = mysqli_query($conexion, $consulta3);
                $row13 = mysqli_fetch_array($res13);
                $totalPEDIDOactual2 = intval($row13['SUM(detalle.precio_subtotal)']);
                //ACTUALIZAMOS AHORA SI EL TOTAL DEL PEDIDO ACTUAL
                $update3 = "UPDATE pedido SET pedido.precio_total = '$totalPEDIDOactual2' WHERE pedido.nº_cliente = '$IDUSER' AND pedido.nº_pedido = '$lastPEDIDO';";
                $res15 = mysqli_query($conexion, $update3);
            }
        }
        //ACA TERMINA EL IF DE VERIFICAR EL STOCK
    } else {
        echo 100;
    }
}
