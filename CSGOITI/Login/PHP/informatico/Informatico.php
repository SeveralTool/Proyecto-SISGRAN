<?php 
include("../conexion_bd.php");
include("ingresos.php");

    include("../sesion.php");
session_start();
if(isset($_SESSION['PERSONAL']) && $_SESSION['ROL'] === "rol_informatico"){
    $correoUSER = $_SESSION['PERSONAL'];
}    
if(!empty($correoUSER)){

?>

<html>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informatico</title>
    <link rel="shortcut icon" href="../../../Imagenes/carrot.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="../../../CSS/informatico.css">
    <link rel="stylesheet" href="../../../CSS/paneles.css">
</head>
<body>


<div class="all-container">
         <!--PANEL GRANDE-->

    <div class="panel" id="panel-big">
        <i class="fas fa-angle-double-left" id="none-panel"></i>
        <div class="logo-admin"><img src="../../../Imagenes/Logo sisgran.png" alt=""></div>
        <h3 class="titulo">PANEL DE CONTROL <br> HUERTAS</h3>
        

        <div class="selector-admin">
            <button class="boton-sel" id="btn-ingresos"><i class="fas fa-house-user"></i><p>AB PERSONAL</p></button>
            <button class="boton-sel" id="btn-stats"><i class="fas fa-chart-bar"></i><p>ESTADISTICAS</p></button>

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
            <button class="boton-sel-responsive" id="btn-ingresos-res"><i class="fas fa-house-user"></i></button> 
            <button class="boton-sel-responsive" id="btn-stats-res"><i class="fas fa-chart-bar"></i></button>

        </div>

        <div class="datos-directivo-responsive">
            <a href="../../../main.php"><i class="fas fa-home"></i></a><br>
            <a href="../cerrar_sesion.php"><i class="fas fa-sign-out-alt"></i></a>
        </div>
    </div>




                        <!--PANTALLAS DE INFORMACION-->

    <div class="contenedor-main" id="panel-datos">
            
        <div class="container" id="ingresos">
                <h3>CONTROL DE PERSONAL</h3><br>
            <div class="formus">
                <form action="ingresos.php" method="post" id="formulario-ingresos">
                <h5 id="txt-admin">INGRESO DE PERSONAL</h5>
                    
                    <select name="selector" id="selector">
                        <option selected disabled value="" required>Elge un Rol</option>
                        <option value="rol_admin" id="admin" class="opcion">Administrador</option>
                        <option value="rol_directivo" id="directivo" class="opcion">Directivo</option>
                        <option value="rol_repartidor" id="repartidor" class="opcion">Repartidor</option>
                        <option value="rol_vendedor" id="vendedor" class="opcion">Vendedor</option>
                        <option value="rol_informatico" id="informatico" class="opcion">informatico</option>
                    </select>
                    <input type="email" name="correo"  required placeholder="Correo" id="correo">
                    <input type="password" name="pass" required  minlength="8" maxlength="32" id="password" placeholder="Password">
                    <input type="text" name="nombre" required  placeholder="Nombre Completo" id="nombre">
                    <button type="submit" name="submit_informatico" id="botonIngresar">Ingresar</button>
                </form>

                <form action="deletes.php" method="post" id="formulario-delete">
                    <h5 id="txt-admin">ELIMINACION DE PERSONAL</h5>
                    <select name="sel-eliminado" class="selector2" id="selector2" required>
                    </select>
                        <button type="submit" id="submit_delete" name="submit_delete">Eliminar</button>
                </form>
        
            </div>
        </div>

            <div class="container" id="stats">
                <h3>ESTADISTICAS DEL PERSONAL</h3>

                <div class="stats-container">
                    <div class="total-personal"> </div>
                    <div class="rest">
                        <div class="admin"></div>
                        <div class="directivo"></div>
                        <div class="informatico"></div>
                        <div class="repartidor"></div>
                        <div class="vendedor"></div>
                    </div>
                    <div class="info">
                        <div class="admin-color"></div>
                        <div class="directivo-color"></div>
                        <div class="informatico-color"></div>
                        <div class="repartidor-color"></div>
                        <div class="vendedor-color"></div>
                        <p class="admin-info"></p>
                        <p class="directivo-info">Directivos</p>
                        <p class="informatico-info">Informaticos</p>
                        <p class="repartidor-info">Repartidores</p>
                        <p class="vendedor-info">Vendedores</p>
                    </div>
                </div>




            </div>


    </div>

              
</div>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="informatico.js"></script>
<script src="../../../scripts/panel.js"></script>
</body>
</html>

</html>

<?php }else{
    echo "Inicie session";
} ?>