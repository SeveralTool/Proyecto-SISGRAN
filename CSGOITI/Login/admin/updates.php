 <?php
include("../conexion_bd.php");

//ACTUALIZACIONES DE ESTADISTICAS

//PEDIMOS TOTAL DE CLIENTES EN BD
$totalclientes = "SELECT COUNT(nº_cliente) FROM cliente WHERE cliente.estado_cliente = 'aceptado';";
$res5 = mysqli_query($conexion,$totalclientes);

//PEDIMOS TOTAL CLIENTES WEB EN BD
$clientesweb = "SELECT COUNT(rol_cliente) FROM cliente WHERE rol_cliente = 'web' AND cliente.estado_cliente = 'aceptado';";
$res6 = mysqli_query($conexion,$clientesweb);

//PEDIMOS TOTAL CLIENTES EMPRESA EN BD
$clientesempresa = "SELECT COUNT(rol_cliente) FROM cliente WHERE rol_cliente = 'empresa' AND cliente.estado_cliente = 'aceptado';";
$res7 = mysqli_query($conexion,$clientesempresa);

//PEDIMOS TOTAL DE HUERTAS EN EL SISTEMA DE SISGRAN
$totalHuertas = "SELECT COUNT(estado_huerta) FROM huerta WHERE huerta.estado_huerta = 'aceptada';";
$res9 = mysqli_query($conexion,$totalHuertas);


if(isset($_GET['total'])){
    //TOTAL DE CLIENTES
    $json = array();
    while($row5 = mysqli_fetch_array($res5)){
        $jsonTotalClientes[] = array(
            (int)'total' =>(int)$row5['COUNT(nº_cliente)'],
        );
    }
$totalclientes = json_encode($jsonTotalClientes);
$total = $totalclientes;
echo $total;
}
    
if(isset($_GET['total2'])){
    //TOTAL CLIENTES WEB
    while($row6 = mysqli_fetch_array($res6)){
    $jsonTotalClientesWeb[] = array(
        (int)'total2' =>(int)$row6['COUNT(rol_cliente)'],
    );
}
$totalclientesWeb = json_encode($jsonTotalClientesWeb);
$total2 = $totalclientesWeb;
echo $total2;
}

if(isset($_GET['total3'])){
    //TOTAL CLIENTES EMPRESA
    while($row7 = mysqli_fetch_array($res7)){
    $jsonTotalClientesEmpresa[] = array(
        (int)'total3' =>(int)$row7['COUNT(rol_cliente)'],
    );
}
$totalclientesEmpresa = json_encode($jsonTotalClientesEmpresa);
$total3 = $totalclientesEmpresa;
echo $total3;
}

if(isset($_GET['total4'])){
    //TOTAL HUERTAS
    while($row9 = mysqli_fetch_array($res9)){
    $jsonHuertas[] = array(
        (int)'total4' =>(int)$row9['COUNT(estado_huerta)'],
    );
}
$Huertas = json_encode($jsonHuertas);
$total4 = $Huertas;
echo $total4;
}

?>