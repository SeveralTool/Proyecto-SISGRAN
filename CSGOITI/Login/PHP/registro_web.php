<?php
include("conexion_bd.php");


//Si el boton de registro se presiona
if (isset($_POST['submit_web'])) {

    //Toma los datos agregados por el usuario
    if (
        strlen($_POST['ci']) >= 1 && strlen($_POST['nombre']) >= 1 && strlen($_POST['apellido']) >= 1
        && strlen($_POST['correo']) >= 1 && strlen($_POST['pass']) >= 1 && strlen($_POST['direccion']) >= 1
        && strlen($_POST['puerta']) >= 1 && strlen($_POST['postal']) >= 1
    ) {

        $ci = trim($_POST['ci']);
        $nombre = trim($_POST['nombre']);
        $apellido = trim($_POST['apellido']);
        $correo = trim($_POST['correo']);
        $pass = md5(trim($_POST['pass']));
        $direccion = trim($_POST['direccion']);
        $puerta = trim($_POST['puerta']);
        $postal = trim($_POST['postal']);

        //COMPROBAS SI EXISTE EL USUARIO EN LA BD
        $checkCorreo = "SELECT usuario.correo FROM usuario WHERE usuario.correo = '$correo';";
        $res1 = mysqli_query($conexion, $checkCorreo);
        $row1 = mysqli_fetch_array($res1);
        if (is_null($row1)) {

            //SQL comandos para agregar usuario a las tablas
            $agregarCliente = "INSERT INTO cliente VALUES('','$correo','$direccion','$puerta','$postal','web','pendiente','perfiles/default.png')";
            $query = $conexion->query($agregarCliente);
            sleep(0.5);
            //INGRESAMOS LOS DATOS A USUARIO Y CLIENTE WEB

            $lastCliente = "SELECT cliente.nº_cliente FROM cliente WHERE cliente.nº_cliente = (SELECT MAX(cliente.nº_cliente) FROM cliente);";
            $res = mysqli_query($conexion, $lastCliente);
            $array = mysqli_fetch_array($res);
            $numeroCliente = intval($array['nº_cliente']);
            $agregarClienteWeb = "INSERT INTO cliente_web VALUES('$numeroCliente','$ci','$nombre','$apellido');";
            $agregarUsuario = "INSERT INTO usuario VALUES('$correo','$pass','rol_web','')";
            $query2 = $conexion->query($agregarClienteWeb);
            $query3 = $conexion->query($agregarUsuario);

            echo "<script>window.location='../Login.php';</script>";
        } else {
            echo "<script>
            alert('Este correo ya fue registrado');
            window.location='../Registro.php';
            </script>";
        }
    }
}
