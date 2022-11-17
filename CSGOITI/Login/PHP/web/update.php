<?php
include('../conexion_bd.php');
session_start();
$IDUSER = $_SESSION['ID'];
$CORREO = $_SESSION['CORREO'];

if(isset($_POST['nombre'])){
    $newNombre = $_POST['nombre'];
    $update1 = "UPDATE cliente_web SET cliente_web.nombre = '$newNombre' WHERE cliente_web.nº_cliente = '$IDUSER';";
    $res1 = mysqli_query($conexion, $update1);
}

if(isset($_POST['apellido'])){
    $newApellido = $_POST['apellido'];
    $update8 = "UPDATE cliente_web SET cliente_web.apellido = '$newApellido' WHERE cliente_web.nº_cliente = '$IDUSER';";
    $res8 = mysqli_query($conexion, $update8);
}

if(isset($_POST['correo'])){
    $newCorreo = $_POST['correo'];
    $update2 = "UPDATE cliente SET cliente.correo = '$newCorreo' WHERE cliente.nº_cliente = '$IDUSER';";
    $res2 = mysqli_query($conexion, $update2);
    $update3 = "UPDATE usuario SET usuario.correo = '$newCorreo' WHERE usuario.correo = '$CORREO';";
    $res3 = mysqli_query($conexion, $update3);
}

if(isset($_POST['pass'])){
    $newPass = md5($_POST['pass']);
    $update4 = "UPDATE usuario SET usuario.password = '$newPass' WHERE usuario.correo = '$CORREO';";
    $res2 = mysqli_query($conexion, $update4);
}

if(isset($_POST['dir'])){
    $newDir = $_POST['dir'];
    $update5 = "UPDATE cliente SET cliente.direccion = '$newDir' WHERE cliente.nº_cliente = '$IDUSER';";
    $res5 = mysqli_query($conexion, $update5);
}

if(isset($_POST['puerta'])){
    $newPuerta = $_POST['puerta'];
    $update6 = "UPDATE cliente SET cliente.puerta = '$newPuerta' WHERE cliente.nº_cliente = '$IDUSER';";
    $res6 = mysqli_query($conexion, $update6);
}

if(isset($_POST['postal'])){
    $newPostal = $_POST['postal'];
    $update7 = "UPDATE cliente SET cliente.postal = '$newPostal' WHERE cliente.nº_cliente = '$IDUSER';";
    $res7 = mysqli_query($conexion, $update7);
}

if(isset($_POST['foto'])){
    $newFoto = $_POST['foto'];
    $update9 = "UPDATE cliente SET cliente.foto_perfil = '$newFoto' WHERE cliente.nº_cliente = '$IDUSER';";
    $res9 = mysqli_query($conexion, $update9);
}

$consulta0 = "SELECT cliente.foto_perfil FROM cliente WHERE cliente.nº_cliente = '$IDUSER';";
$res0 = mysqli_query($conexion, $consulta0);
$row3 = mysqli_fetch_array($res0);
$foto = $row3['foto_perfil'];

$fotoActual = json_encode($foto);
echo $fotoActual;

?>