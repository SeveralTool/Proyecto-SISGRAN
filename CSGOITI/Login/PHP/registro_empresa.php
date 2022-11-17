<?php
include 'conexion_bd.php';


//Si el boton de registro se presiona
if (isset($_POST['submit_empresa'])) {

    //Toma los datos agregados por el usuario
    if (strlen($_POST['rut']) >= 1 && strlen($_POST['nombre']) >= 1 && strlen($_POST['correo']) >= 1 && strlen($_POST['pass']) >= 1 && strlen($_POST['direccion']) >= 1 && strlen($_POST['puerta']) >= 1 && strlen($_POST['postal']) >= 1) {

        $rut = trim($_POST['rut']);
        $nombre = trim($_POST['nombre']);
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
            $agregarCliente = "INSERT INTO cliente VALUES('','$correo','$direccion','$puerta','$postal','empresa','pendiente','perfiles/default.png')";
            $query = $conexion->query($agregarCliente);
            sleep(0.5);

            $lastCliente = "SELECT cliente.nº_cliente FROM cliente WHERE cliente.nº_cliente = (SELECT MAX(cliente.nº_cliente) FROM cliente);";
            $res = mysqli_query($conexion, $lastCliente);
            $array = mysqli_fetch_array($res);
            $numeroCliente = intval($array['nº_cliente']);

            $agregarClienteEmpresa = "INSERT INTO cliente_empresa VALUES('$numeroCliente','$rut','$nombre');";
            $agregarUsuario = "INSERT INTO usuario VALUES('$correo','$pass','rol_empresa','')";
            $query2 = $conexion->query($agregarClienteEmpresa);
            $query3 = $conexion->query($agregarUsuario);
            echo "<script>window.location='../Login.php';</script>";
        } else {
            echo "<script> alert('Este correo ya fue registrado');window.location='../Login.php';</script>";
        }
    }
}
