<?php
include("../conexion_bd.php");

//PEDIMOS DATOS DESDE HUERTA
$huertas = "SELECT huerta.id_huerta, huerta.nombre_huerta, huerta.tamaño_huerta, huerta.correo, huerta.direccion FROM huerta WHERE huerta.estado_huerta = 'aprobada';";
$res8 = mysqli_query($conexion,$huertas);

$json = array();
while($row2 = mysqli_fetch_array($res8)){
    $json[] = array(
    'id_huerta' => $row2['id_huerta'],
    'nombre' => $row2['nombre_huerta'],
    'tamaño' => $row2['tamaño_huerta'],
    'correo' => $row2['correo'],
    'direccion' => $row2['direccion'],
    );
}
$jsonstring = json_encode($json);
    echo $jsonstring;


//ACEPTAR O DENEGAR Y ELIMINAR
if(isset($_POST['idAceptar3'])){
    $idAceptar3 = $_POST['idAceptar3'];
    $aceptar3 = "UPDATE huerta SET huerta.estado_huerta = 'aceptada' WHERE huerta.id_huerta = '$idAceptar3';";
    $res = mysqli_query($conexion,$aceptar3);

}
    
if(isset($_POST['idDecline3']) >= 1 && ($_POST['CorreoDecline3'])){
    $idDecline3 = $_POST['idDecline3'];
    $CorreoDecline3 = $_POST['CorreoDecline3'];
    $decline3 = "UPDATE huerta SET huerta.estado_huerta = 'rechazada' WHERE huerta.id_huerta = '$idDecline3';";
    $res = mysqli_query($conexion,$decline3);
    $DeleteUser3 = "DELETE FROM usuario WHERE usuario.correo = '$CorreoDecline3';";
    $res2 = mysqli_query($conexion,$DeleteUser3);
}


?>