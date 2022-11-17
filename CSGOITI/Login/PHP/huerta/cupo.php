<?php
include ('../conexion_bd.php');
session_start();
$ID = $_SESSION['ID'];


if(isset($_POST['consultaEspacio'])){
    $consulta2 = "SELECT huerta.tamaño_huerta, COUNT(cultiva.estado_cultivo) FROM huerta, cultiva WHERE huerta.id_huerta
    = '$ID' AND cultiva.id_huerta = '$ID';";
    $res2 = mysqli_query($conexion, $consulta2);
    $row2 = mysqli_fetch_array($res2);
    $t = $row2['tamaño_huerta'];
    $c = $row2['COUNT(cultiva.estado_cultivo)'];

    if(is_null($c)){
        $cup[] = array(
            'tamanio' => $row2['tamaño_huerta'],
            'cantidad' => 0,
        );
    }else{
        $cup[] = array(
            'tamanio' => $row2['tamaño_huerta'],
            'cantidad' => (int)$row2['COUNT(cultiva.estado_cultivo)'],
        );
    }
        

    $cupo = json_encode($cup);
    echo $cupo;
}



if(isset($_POST['vegRecommend'])){
    $rec = $_POST['vegRecommend'];
    $consulta3 = "SELECT MONTH(calendario.fecha_inicio), MONTH(calendario.fecha_final)
    FROM calendario WHERE calendario.id_vegetal = '$rec';";
    $res3 = mysqli_query($conexion, $consulta3);
    $row3 = mysqli_fetch_array($res3);

    if(is_null($row3)){
        echo "null";
    }else{
        $reco[] = array(
            'inicio' => $row3['MONTH(calendario.fecha_inicio)'],
            'final' => $row3['MONTH(calendario.fecha_final)'],
        );
    
        $recommend = json_encode($reco);
        echo $recommend;
    }
}
