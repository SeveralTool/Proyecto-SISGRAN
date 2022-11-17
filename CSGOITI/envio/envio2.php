<?php
include("../Login/PHP/conexion_bd.php");
session_start();
if(isset($_SESSION['ID'])){
    $IDUSER = $_SESSION['ID'];
    $ROL = $_SESSION['ROL'];
}


$fecha = date('j-m-Y');
$TresDias = strtotime('+3 day', strtotime($fecha));
$TresDias = date('N-d-m-Y', $TresDias);



$addTresDias = json_encode($TresDias);

echo $addTresDias;





?>