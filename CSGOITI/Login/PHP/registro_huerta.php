<?php
include 'conexion_bd.php';
//Si el boton de registro se presiona
if (isset($_POST['submit_huerta'])) {

    //Toma los datos agregados por el usuario
    if (
        strlen($_POST['nombre']) >= 1 && strlen($_POST['tamaño']) >= 1 && strlen($_POST['correo']) >= 1
        && strlen($_POST['password']) >= 1 && strlen($_POST['direccion'])
    ) {

        $nombre = trim($_POST['nombre']);
        $tamaño = trim($_POST['tamaño']);
        $correo = trim($_POST['correo']);
        $pass = md5(trim($_POST['password']));
        $direccion = trim($_POST['direccion']);
        
        //COMPROBAMOS SI EXITE ESTE CORREO EN LA BD
        $checkCorreo = "SELECT usuario.correo FROM usuario WHERE usuario.correo = '$correo';";
        $res1 = mysqli_query($conexion, $checkCorreo);
        $row1 = mysqli_fetch_array($res1);
        if (is_null($row1)) {
            $agregarHuerta = "INSERT INTO huerta VALUES('','$nombre','$tamaño','$correo','$direccion','pendiente','perfiles/default.png')";
            $agregarUsuario = "INSERT INTO usuario VALUES('$correo','$pass','rol_huerta','')";

            $query = $conexion->query($agregarHuerta);
            $query2 = $conexion->query($agregarUsuario);

            echo "<script>window.location='../Login.php';</script>";
        } else {
            echo "<script> alert('Este correo ya fue registrado');window.location='../Login.php';</script>";
        }
    }
}
