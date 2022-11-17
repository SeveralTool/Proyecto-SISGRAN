<?php

$conexion = new mysqli('localhost','root','','greensoft');
    if($conexion-> connect_error){ 
        die("Conexion errada" . $conexion->connect_error);
    }else{
   // echo "<script> alert('¡Conexion exitoso!');</script>";
    }
?>