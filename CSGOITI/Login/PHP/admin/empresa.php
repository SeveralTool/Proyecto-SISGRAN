<?php

include("../conexion_bd.php");

//TRAEMOS DATOS DESDE CLIENTE EMPRESA Y LOS GUARDAMOS EN ARRAY
$cliente_empresa = "SELECT  cliente.nº_cliente, cliente.correo, cliente_empresa.rut, cliente_empresa.nombre, cliente.direccion, cliente.puerta, cliente.postal FROM cliente_empresa, cliente WHERE cliente.rol_cliente = 'empresa' AND cliente.nº_cliente = cliente_empresa.nº_cliente AND cliente.estado_cliente = 'pendiente';";
$res3 = mysqli_query($conexion,$cliente_empresa);

$json = array();
while($row3 = mysqli_fetch_array($res3)){
    $json[] = array(
    'nº_cliente' => $row3['nº_cliente'],
    'correo' => $row3['correo'],
    'rut' => $row3['rut'],
    'nombre' => $row3['nombre'],
    'direccion' => $row3['direccion'],
    'puerta' => $row3['puerta'],
    'postal' => $row3['postal'],
    );
}
$jsonstring = json_encode($json);
    echo $jsonstring;

//ACEPTAR CLIENTE WEB
if(isset($_POST['idAceptar2'])){
    $idAceptar2 = $_POST['idAceptar2'];
    $aceptar2 = "UPDATE cliente SET cliente.estado_cliente = 'aceptado' WHERE cliente.nº_cliente = '$idAceptar';";
    $res = mysqli_query($conexion,$aceptar1);

}
    
if(isset($_POST['idDecline2']) >= 1 && ($_POST['CorreoDecline2'])){
    $idDecline2 = $_POST['idDecline2'];
    $CorreoDecline2 = $_POST['CorreoDecline2'];
    $decline2 = "UPDATE cliente SET cliente.estado_cliente = 'rechazado' WHERE cliente.nº_cliente = '$idDecline2';";
    $res = mysqli_query($conexion,$decline1);
    $DeleteUser2 = "DELETE FROM usuario WHERE usuario.correo = '$CorreoDecline2';";
    $res2 = mysqli_query($conexion,$DeleteUser);
}




?>