<?php
include ('../conexion_bd.php');
session_start();
$ID = $_SESSION['ID'];

$consulta1 = "SELECT tamaño_huerta FROM huerta WHERE id_huerta = '$ID';";
$res1 = mysqli_query($conexion, $consulta1);
$row1 = mysqli_fetch_array($res1);
$tamaño = $row1['tamaño_huerta'];
echo $tamaño;

if(isset($_POST['consultaEspacio'])){
    $consulta2 = "SELECT huerta.tamaño_huerta, COUNT(cultiva.estado_cultivo) FROM huerta, cultiva WHERE huerta.id_huerta
    = '$ID' AND cultiva.estado_cultivo != 'cosechado';";
    $res2 = mysqli_query($conexion, $consulta2);
    while($row2 = mysqli_fetch_array($res2)){
        $cup[] = array(
            'tamanio' => $row2['tamaño_huerta'],
            'cantidad' => (int)$row2['COUNT(cultiva.estado_cultivo)'],
        );
    }
    $cupo = json_encode($cup);
    echo $cupo;
}

?>