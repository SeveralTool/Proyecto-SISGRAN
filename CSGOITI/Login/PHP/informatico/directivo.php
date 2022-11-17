<?php
include('../conexion_bd.php');

$consulta = "SELECT COUNT(usuario.rol) FROM usuario
WHERE usuario.rol = 'rol_admin' OR usuario.rol = 'rol_directivo' 
OR usuario.rol = 'rol_vendedor' OR usuario.rol = 'rol_repartidor' 
OR usuario.rol = 'rol_informatico';";
$res1 = mysqli_query($conexion, $consulta);

$row1 = mysqli_fetch_array($res1);
$total = (int)$row1['COUNT(usuario.rol)'];
/////////////////////////////////////////
$consulta1 = "SELECT COUNT(usuario.rol) FROM usuario
WHERE usuario.rol = 'rol_directivo';";
$res2 = mysqli_query($conexion, $consulta1);
$row2 = mysqli_fetch_array($res2);
$admin = (int)$row2['COUNT(usuario.rol)'];

$stat =  $admin * 100 / $total;
$tot = json_encode($stat);
echo intval($tot);

?>