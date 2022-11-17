<?php
include('../conexion_bd.php');

$consulta = "SELECT COUNT(usuario.rol) FROM usuario
WHERE usuario.rol = 'rol_admin' OR usuario.rol = 'rol_directivo' 
OR usuario.rol = 'rol_vendedor' OR usuario.rol = 'rol_repartidor' 
OR usuario.rol = 'rol_informatico';";
$res1 = mysqli_query($conexion, $consulta);

$row1 = mysqli_fetch_array($res1);
$total = (int)$row1['COUNT(usuario.rol)'];

$tot = json_encode($total);
echo intval($tot);

?>