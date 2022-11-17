<?php 
include("../conexion_bd.php");



    //Toma los datos agregados por el usuario
    if(isset($_POST['rol']) >= 1 && isset($_POST['correo']) >= 1 && isset($_POST['pass']) >= 1 && isset($_POST['nombrePersonal'])){
        
        $rol =$_POST['rol'];
        $correo =$_POST['correo'];
        $pass =md5($_POST['pass']);
        $nombre =$_POST['nombrePersonal'];


        $verificarExistencia = "SELECT usuario.correo FROM usuario WHERE usuario.correo = '$correo';";
        $res1 = mysqli_query($conexion,$verificarExistencia);
        $row1 = mysqli_fetch_array($res1);
        if($row1['correo'] === $correo){
            echo "<script> alert('Ya existe este usuario')</script>";
        }else{
            if($rol === "rol_vendedor"){
                $consulta1 = "INSERT INTO vendedor VALUES('$nombre');";
                $res1 = mysqli_query($conexion, $consulta1);
                $ingreso = "INSERT INTO usuario VALUES('$correo','$pass','$rol','$nombre');";
                $res2 = mysqli_query($conexion,$ingreso);
            }else{
                $ingreso = "INSERT INTO usuario VALUES('$correo','$pass','$rol','$nombre');";
                $res2 = mysqli_query($conexion,$ingreso);
            if($res2 === true){
                echo "<script> alert('Ingreso exitoso')</script>";
            }else{
                echo "<script>alert('Ocurrio un error')</script>";
            }

            }
        }
        
    }
   

?>