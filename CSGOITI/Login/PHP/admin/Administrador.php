<?php
    include("../sesion.php");
session_start();
if(isset($_SESSION['PERSONAL']) && $_SESSION['ROL'] === "rol_admin"){
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
    <title>Administrador</title>
    <link rel="shortcut icon" href="../../../Imagenes/carrot.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="../../../CSS/administrador.css">
    <link rel="stylesheet" href="../../../CSS/paneles.css">
</head>
<body>
<div class="all-container">
 <!--PANEL GRANDE-->

    <div class="panel" id="panel-big">
        <i class="fas fa-angle-double-left" id="none-panel"></i>
        <div class="logo-admin"><img src="../../../Imagenes/Logo sisgran.png" alt=""></div>
        <h3 class="titulo">PANEL DE CONTROL <br> ADMINISTRADOR</h3>
        

        <div class="selector-admin">
            <button class="boton-sel" id="btn-pedidos"><i class="far fa-paper-plane"></i><p>PEDIDOS</p></button>
            <button class="boton-sel" id="btn-clientes"><i class="fas fa-house-user"></i><p>ABM CLIENTES</p></button>
            <button class="boton-sel" id="btn-huertas"><i class="fas fa-user-check"></i><p>ABM HUERTAS</p></button>
        </div>
       
        <div class="datos-directivo">
            <h3 class="subtitulo"> <?php echo $_SESSION['NOMBREPERSONAL']; ?></h3>
            <a href="../../../main.php"><i class="fas fa-home"></i></a>
            <a href="../cerrar_sesion.php"><i class="fas fa-sign-out-alt"></i></a>
        </div>

    </div>

  <!--PANEL FINO-->
     
  <div class="panel-responsive" id="panel-small">
        <i class="fas fa-angle-double-right" id="show-panel"></i>
        <div class="logo-admin-responsive"><p>SISGRAN</p></div>

        <div class="selector-admin-responsive">
            <button class="boton-sel-responsive" id="btn-pedidos-res"><i class="far fa-paper-plane"></i></button>
            <button class="boton-sel-responsive" id="btn-clientes-res"><i class="fas fa-house-user"></i></button> 
            <button class="boton-sel-responsive" id="btn-huertas-res"><i class="fas fa-user-check"></i></button>
        </div>

        <div class="datos-directivo-responsive">
            <a href="../../../main.php"><i class="fas fa-home"></i></a><br>
            <a href="../cerrar_sesion.php"><i class="fas fa-sign-out-alt"></i></a>
        </div>


    </div>


    <div class="contenedor-main" id="panel-datos">
        <!--VENTANA PARA DATOS DE LOS PEDIDOS PENDIENTES-->
        <div class="container" id="pedidos-admin">
            <h3>PEDIDOS PENDIENTES</h3> <br> <br>
            <div class="fila-pedidos">
                    <p>Nº Pedido</p>
                    <p>Nº Cliente</p>
                    <p>Productos</p>
                    <p>Fecha de compra</p>
                    <p>Entrega</p>
                    <p>Precio Total</p>
            </div>

            <div class="pedidos" id="PEDIDOS">
                <!--AQUI SE VEN LOS PEDIDOS PENDIENTES-->
            </div>
            
        </div>
        <div id="items-container"><i id="items-close" class="fas fa-times"></i><div class="items-box"></div></div>
        <div class="container" id="clientes-admin">
            <h3>CLIENTES PENDIENTES : <button class="boton-sel-1" id="btn-web">WEB</button>
             <button class="boton-sel-1" id="btn-empresa">EMPRESA</button></h3> <br>
        <div class="stats">
            <div class="totales"><i class="fas fa-people-arrows"></i><p id="clientestotales"></p></div>
            <div class="totales-web"><i class="fas fa-users"></i><p id="clientestotalesweb"></p></div>
            <div class="totales-empresa"><i class="fas fa-warehouse"></i><p id="clientestotalesempresa"></p></div>
        </div>
        
                <!--VENTANA PARA DATOS DE CLIENTES WEB-->
            <div id="web">
                <div class="fila">
                    <p>Nº Cliente</p>
                    <p>Correo</p>
                    <p>CI</p>
                    <p>Nombre</p>
                    <p>Apellido</p>
                    <p>Direccion</p>
                    <p>Nº de Puerta</p>
                    <p>Codigo <br> postal</p>
                </div>
                <br>

                <div class="web" id="cliente-web">
                    <!--AQUI SE VEN LOS DATOS DE LOS CLIENTES WEB-->  
                </div>
            </div>
                
            <div class="empresa" id="cliente-empresa">
                <div class="fila-empresa">
                        <p>Nº Cliente</p>
                        <p>Correo</p>
                        <p>RUT</p>
                        <p>Nombre</p>
                        <p>Direccion</p>
                        <p>Nº de Puerta</p>
                        <p>Codigo <br> postal</p>
                    </div>
                    <br>

                    <div id="datos-empresa">
                        <!--VENTANA PARA DATOS DE CLIENTES EMPRESA-->
                    </div>
            </div>
            
    </div>

        <!--VENTANA PARA DATOS DE HUERTAS-->
        <div class="container" id="huertas-admin">
            <h3>HUERTAS PENDIENTES</h3> <br>
            <div class="stats">
                <div class="total-huertas"><i class="fas fa-warehouse"></i><p id="totalhuertas"></p></div>
            </div>
            <div class="huerta" id="cliente-huerta">
                <div class="fila-huerta">
                        <p>Nº Cliente</p>
                        <p>Nombre</p>
                        <p>Tamaño</p>
                        <p>Correo</p>
                        <p>Direccion</p>
                    </div>
                    <br>

                    <div id="datos-huertas" class="over-js">
                       <!--VENTANA PARA DATOS DE HUERTAS-->
                    </div><br>
               
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="administrador.js"></script>
<script src="../../../scripts/panel.js"></script>

</body>
</html>
    
</html>

<?php }else{
    echo "Inicie session";
} ?>







