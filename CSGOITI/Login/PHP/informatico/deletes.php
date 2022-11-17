<?php
include("../conexion_bd.php");

//CONSULTAS VARIAS
$ShowAdministradores = "SELECT usuario.nombre_personal, usuario.correo from usuario WHERE usuario.rol = 'rol_admin' OR usuario.rol = 'rol_directivo' OR usuario.rol = 'rol_informatico' OR usuario.rol = 'rol_vendedor' OR usuario.rol = 'rol_repartidor' ORDER BY usuario.rol;";
$res1 = mysqli_query($conexion,$ShowAdministradores);


//USUARIOS
$json = array();
while($row1 = mysqli_fetch_array($res1)){
    $json[] = array(
    'nombre_personal' => $row1['nombre_personal'],
    'correo' => $row1['correo'],
    );
    
}
$jsonstring = json_encode($json);
    echo $jsonstring;

//ELIMINACION DE USUARIOS
    
    if(isset($_POST['correo'])){
        $correo = $_POST['correo'];

        $eliminar = "DELETE FROM usuario WHERE usuario.correo = '$correo';";
        $res3 = mysqli_query($conexion,$eliminar);
        if($res3 === true){
            echo "<script> alert('Ingreso exitoso')</script>";
        }else{
            echo "<script>alert('Ocurrio un error');</script>";
        }
    }





?>