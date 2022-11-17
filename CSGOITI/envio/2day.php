<?php
include("../Login/PHP/conexion_bd.php");
session_start();
if(isset($_SESSION['ID'])){
    $IDUSER = $_SESSION['ID'];
    $ROL = $_SESSION['ROL'];

}

$fecha = date('Y-m-j');
$DosDias = strtotime('+2 day', strtotime($fecha));
$DosDias = date('Y-m-j', $DosDias);



$addDosDias = json_encode($DosDias);
echo $addDosDias;





?>