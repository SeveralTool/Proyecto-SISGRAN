<?php
include('../conexion_bd.php');
session_start();
$IDUSER = $_SESSION['ID'];
$CORREO = $_SESSION['CORREO'];

if(isset($_POST['nombre'])){
    $newNombre = $_POST['nombre'];
    $update1 = "UPDATE huerta SET huerta.nombre_huerta = '$newNombre' WHERE huerta.id_huerta = '$IDUSER';";
    $res1 = mysqli_query($conexion, $update1);
}

if(isset($_POST['correo'])){
    $newCorreo = $_POST['correo'];
    $update2 = "UPDATE huerta SET huerta.correo = '$newCorreo' WHERE huerta.id_huerta = '$IDUSER';";
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
    $update5 = "UPDATE huerta SET huerta.direccion = '$newDir' WHERE huerta.id_huerta = '$IDUSER';";
    $res5 = mysqli_query($conexion, $update5);
}

if(isset($_POST['foto'])){
    $newFoto = $_POST['foto'];
    $update9 = "UPDATE huerta SET huerta.foto_perfil = '$newFoto' WHERE huerta.id_huerta = '$IDUSER';";
    $res9 = mysqli_query($conexion, $update9);
}

$consulta0 = "SELECT huerta.foto_perfil FROM huerta WHERE huerta.id_huerta = '$IDUSER';";
$res0 = mysqli_query($conexion, $consulta0);
$row3 = mysqli_fetch_array($res0);
$foto = $row3['foto_perfil'];

$fotoActual = json_encode($foto);
echo $fotoActual;


?>