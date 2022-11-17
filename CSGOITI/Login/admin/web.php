<?php

include("../conexion_bd.php");

//TRAEMOS DATOS DESDE CLIENTE WEB Y LOS GUARDAMOS EN ARRAY
$cliente_web = "SELECT cliente.nº_cliente, cliente.correo, cliente_web.ci, cliente_web.nombre, cliente_web.apellido, cliente.direccion, cliente.puerta, cliente.postal FROM cliente_web, cliente WHERE cliente.rol_cliente = 'web' AND cliente.nº_cliente = cliente_web.nº_cliente AND cliente.estado_cliente = 'pendiente';";
$res2 = mysqli_query($conexion, $cliente_web);

$json = array();
while($row2 = mysqli_fetch_array($res2)){
    $json[] = array(
    'nº_cliente' => $row2['nº_cliente'],
    'correo' => $row2['correo'],
    'ci' => $row2['ci'],
    'nombre' => $row2['nombre'],
    'apellido' => $row2['apellido'],
    'direccion' => $row2['direccion'],
    'puerta' => $row2['puerta'],
    'postal' => $row2['postal'],
    );
}
$jsonstring = json_encode($json);
    echo $jsonstring;


//ACEPTAR CLIENTE WEB
if(isset($_POST['idAceptar'])){
    $idAceptar = $_POST['idAceptar'];
    $aceptar1 = "UPDATE cliente SET cliente.estado_cliente = 'aceptado' WHERE cliente.nº_cliente = '$idAceptar';";
    $res = mysqli_query($conexion,$aceptar1);

}
    
if(isset($_POST['idDecline']) >= 1 && ($_POST['CorreoDecline'])){
    $idDecline = $_POST['idDecline'];
    $CorreoDecline = $_POST['CorreoDecline'];
    $decline1 = "UPDATE cliente SET cliente.estado_cliente = 'rechazado' WHERE cliente.nº_cliente = '$idDecline';";
    $res = mysqli_query($conexion,$decline1);
    $DeleteUser = "DELETE FROM usuario WHERE usuario.correo = '$CorreoDecline';";
    $res2 = mysqli_query($conexion,$DeleteUser);
}

?>

