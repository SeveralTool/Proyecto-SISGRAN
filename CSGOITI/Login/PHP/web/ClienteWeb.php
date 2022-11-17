<?php
    include("../sesion.php");
session_start();
if(isset($_SESSION['ID']) && $_SESSION['ROL'] === "rol_web"){
    $IDUSER = $_SESSION['ID'];
}    
if(!empty($IDUSER)){

    $consulta1 = "SELECT cliente_web.ci, cliente_web.nombre, cliente_web.apellido, cliente.correo, cliente.direccion, cliente.puerta, cliente.foto_perfil, cliente.postal
    FROM cliente, cliente_web
    WHERE cliente.nº_cliente = '$IDUSER' AND cliente.nº_cliente = cliente_web.nº_cliente;";
    $res1 = mysqli_query($conexion, $consulta1);
    $row1 = mysqli_fetch_array($res1);
    $correo = $row1['correo'];


?>


<html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente Web</title>
    <link rel="shortcut icon" href="../../../Imagenes/carrot.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="../../../CSS/web.css">
    <link rel="stylesheet" href="../../../CSS/paneles.css">
</head>
<body>


<div class="all-container">
         <!--PANEL GRANDE-->

    <div class="panel" id="panel-big">
        <i class="fas fa-angle-double-left" id="none-panel"></i>
        <div class="logo-admin"><img src="../../../Imagenes/Logo sisgran.png" alt=""></div>
        <h3 class="titulo">PANEL DE CONTROL</h3>
        

        <div class="selector-admin">
            <button class="boton-sel" id="btn-user"><i class="far fa-paper-plane"></i><p>USUARIO</p></button>
            <button class="boton-sel" id="btn-pedidos"><i class="fas fa-house-user"></i><p>PEDIDOS</p></button>
            <button class="boton-sel" id="btn-historial"><i class="fas fa-house-user"></i><p>HISTORIAL</p></button>
        </div>
       
        <div class="datos-directivo">
            <h3 class="subtitulo"></h3>
            <a href="../../../main.php"><i class="fas fa-home"></i></a>
            <a href="../cerrar_sesion.php"><i class="fas fa-sign-out-alt"></i></a>
        </div>

    </div>

    <!--PANEL FINO-->
     
    <div class="panel-responsive" id="panel-small">
        <i class="fas fa-angle-double-right" id="show-panel"></i>
        <div class="logo-admin-responsive"><p>SISGRAN</p></div>

        <div class="selector-admin-responsive">
            <button class="boton-sel-responsive" id="btn-user-res"><i class="far fa-paper-plane"></i></button>
            <button class="boton-sel-responsive" id="btn-pedidos-res"><i class="fas fa-house-user"></i></button>
            <button class="boton-sel-responsive" id="btn-historial-res"><i class="fas fa-house-user"></i></button> 
        </div>

        <div class="datos-directivo-responsive">
            <a href="../../../main.php"><i class="fas fa-home"></i></a><br>
            <a href="../cerrar_sesion.php"><i class="fas fa-sign-out-alt"></i></a>
        </div>
    </div>




                        <!--PANTALLAS DE INFORMACION-->

    <div class="contenedor-main" id="panel-datos">
            <div class="delContainer">
                <p class="t">¿Esta seguro que desea ELIMINAR la cuenta?</p>
                <p class="si sn" correo="<?php echo $correo ?>" cliente="<?php echo $IDUSER;?>">SI<i class="fas fa-check-circle"></i></p>
                <p class="no sn">NO<i class="fas fa-times-circle"></i></p>
            </div>
            <div class="container" id="user">
                <h3><p><?php echo $row1['nombre'] . " " . $row1['apellido']; ?></p><img class="foto foto-top" src="<?php echo $row1['foto_perfil']?>"> </h3>
                
                <div class="settings-container">
                    <div class="settings">
                        <div id="img-perfil">
                            <img src="perfiles/1.jpg" alt="" class="foto" value="perfiles/1.jpg" <?php if($row1['foto_perfil'] === "perfiles/1.jpg") echo "style='border-color: red;';" ?>>
                            <img src="perfiles/2.png" alt="" class="foto" value="perfiles/2.png" <?php if($row1['foto_perfil'] === "perfiles/2.png") echo "style='border-color: red;';" ?>>
                            <img src="perfiles/3.png" alt="" class="foto" value="perfiles/3.png" <?php if($row1['foto_perfil'] === "perfiles/3.png") echo "style='border-color: red;';" ?>>
                            <img src="perfiles/4.jfif" alt="" class="foto" value="perfiles/4.jfif" <?php if($row1['foto_perfil'] === "perfiles/4.jfif") echo "style='border-color: red;';" ?>>
                            <img src="perfiles/5.jfif" alt="" class="foto" value="perfiles/5.jfif" <?php if($row1['foto_perfil'] === "perfiles/5.jfif") echo "style='border-color: red;';" ?>>
                            <img src="perfiles/6.jfif" alt="" class="foto" value="perfiles/6.jfif" <?php if($row1['foto_perfil'] === "perfiles/6.jfif") echo "style='border-color: red;';" ?>>
                            <img src="perfiles/7.jfif" alt="" class="foto" value="perfiles/7.jfif" <?php if($row1['foto_perfil'] === "perfiles/7.jfif") echo "style='border-color: red;';" ?>>
                            <img src="perfiles/8.jpg" alt="" class="foto" value="perfiles/8.jpg" <?php if($row1['foto_perfil'] === "perfiles/8.jpg") echo "style='border-color: red;';" ?>>
                            <img src="perfiles/9.jpg" alt="" class="foto" value="perfiles/9.jpg" <?php if($row1['foto_perfil'] === "perfiles/9.jpg") echo "style='border-color: red;';" ?>>
                            <img src="perfiles/default.png" alt="" class="foto foto-default" value="perfiles/default.png" <?php if($row1['foto_perfil'] === "perfiles/default.png") echo "style='border-color: red;';" ?>>
                        </div>
                        <div class="ci"><p>CI</p><input type="number" value="<?php echo $row1['ci']; ?>" disabled></div>
                        <div class="nombre"><p>Nombre</p><input id="NOMBRE" type="text" value="<?php echo $row1['nombre']; ?>"><a id="nombre" href="">SAVE</a></div>
                        <div class="apellido"><p>Apellido</p><input id="APELLIDO" type="text" value="<?php echo $row1['apellido']; ?>"><a id="apellido" href="">SAVE</a></div>
                        <div class="correo"><p>Correo</p><input id="CORREO" type="email" value="<?php echo $correo; ?>"><a id="correo" href="">SAVE</a></div>
                        <div class="pass"><p>Password</p><input id="PASS" class="password" type="password" value=""><a id="pass" href="">SAVE</a></div>
                        <div class="direccion"><p>Dirección</p><input id="DIR" type="text" value="<?php echo $row1['direccion'] ?>"><a id="dir" href="">SAVE</a></div>
                        <div class="puerta"><p>Puerta</p><input id="PUERTA" class="num" type="number" value="<?php echo $row1['puerta']; ?>"><a id="puerta" href="">SAVE</a></div>
                        <div class="postal"><p>Postal</p><input id="POSTAL" class="num" type="number" value="<?php echo $row1['postal']; ?>"><a id="postal" href="">SAVE</a></div>
                        <div class="delCuenta"><button id="delCuenta">ELIMINAR CUENTA<i class="fas fa-user-times"></i></button></div>
                    </div>
                </div>

            </div>


            <div class="view-productos" id="view-productos">
                <i class="fas fa-times" id="close-prod-pedidos"></i>
                <div class="PRODUCTOS">
                    <!--ACA SE MOSTRARAN LOS PRODUCTOS DE CADA PEDIDO-->
                </div>
            </div>
        <div class="container" id="pedidos">
                <div id="en-curso">
                    <h4>Pedidos en Ruta</h4>

                    <!--ACA SE MOSTRARAN TODOS LOS PEDIDS EN CURSO-->
                    <p class="sin">Sin pedidos en Ruta</p>
                </div>
             
                <hr>

                <div id="pedidos-box">
                    <h4>Pedidos Pendientes</h4>    
                    <p class="sin">Sin pedidos pendientes</p>

                    <!--ACA SE MOSTRARAN TODOS LOS PEDIDS EN PENDIENTES Y ARMADOS-->
                </div>
        </div>


            <div class="container" id="historial">
                <h2>HISTORIAL DE PEDIDOS</h2>
                <div class="historial-pedidos">

                </div>
            </div>

    </div>


</div>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="../../../scripts/web.js"></script>
<script src="../../../scripts/panel.js"></script>
<script src="../../../scripts/dark.js"></script>
</body>
</html>

</html>

<?php }else{
    echo "Inicie session";
} ?>