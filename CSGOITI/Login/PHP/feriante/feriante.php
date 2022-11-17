<?php
    include("../sesion.php");
session_start();
if(isset($_SESSION['PERSONAL']) && $_SESSION['ROL'] === "rol_vendedor"){
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
    <title>Feriante</title>
    <link rel="shortcut icon" href="../../../Imagenes/carrot.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="../../../CSS/feriante.css">
    <link rel="stylesheet" href="../../../CSS/paneles.css">
</head>
<body>
<div class="all-container">
 <!--PANEL GRANDE-->

    <div class="panel" id="panel-big">
        <i class="fas fa-angle-double-left" id="none-panel"></i>
        <div class="logo-admin"><img src="../../../Imagenes/Logo sisgran.png" alt=""></div>
        <h3 class="titulo">PANEL DE CONTROL <br> VENDEDOR</h3>
        

        <div class="selector-admin">
            <button class="boton-sel" id="btn-ventas"><i class="far fa-paper-plane"></i><p>VENTAS</p></button>
            <button class="boton-sel" id="btn-misVentas"><i class="fas fa-house-user"></i><p>MIS VENTAS</p></button>
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
            <button class="boton-sel-responsive" id="btn-ventas-res"><i class="far fa-paper-plane"></i></button>
            <button class="boton-sel-responsive" id="btn-misVentas-res"><i class="fas fa-house-user"></i></button> 
        </div>

        <div class="datos-directivo-responsive">
            <a href="../../../main.php"><i class="fas fa-home"></i></a><br>
            <a href="../cerrar_sesion.php"><i class="fas fa-sign-out-alt"></i></a>
        </div>


    </div>


    <div class="contenedor-main" id="panel-datos">
        <!--VENTANA PARA VENTAS EN EL LOCAL-->
        <div class="ventas-container" id="ventas-container">
            <h1>SISTEMA DE VENTAS SISGRAN</h1>
            <div class="stats"></div>
            <div class="ventas">
                <div class="ventas-form">
                    <div class="form">
                        <div class="producto">
                            <div id="imagen-producto"></div>
                            <p id="stock" value=""></p>
                        </div>
                        <select name="" id="vegetal">
                            <!--ACA SE VEN LOS VEGETALES-->
                            <option value="0" selected>Seleccione un Vegetal</option>
                            <option value="1">Acelga</option>
                            <option value="2">Ají</option>
                            <option value="3">Ajo</option>
                            <option value="4">Apio</option>
                            <option value="5">Arvejas</option>
                            <option value="6">Berenjena</option>
                            <option value="7">Remolacha</option>
                            <option value="8">Cebolla</option>
                            <option value="9">Cebollin</option>
                            <option value="10">Frutilla</option>
                            <option value="11">Habas</option>
                            <option value="12">Lechuga</option>
                            <option value="13">Choclo</option>
                            <option value="14">Papa</option>
                            <option value="15">Pimentón</option>
                            <option value="16">Porotos</option>
                            <option value="17">Porotos Verdes</option>
                            <option value="18">Repollo</option>
                            <option value="19">Tomate</option>
                            <option value="20">Zanahoria</option>
                        </select>
                        <select name="" id="variedad" precio="">
                            <!--ACA SE VEN LAS VARIEDADES-->
                            <option value="0" selected>Se requiere un Vegetal</option>
                        </select>
                        <div class="can"><p>Cantidad</p><input type="number" min="0" id="cantidad" value="1"></div>
                        <button id="enviar-compra"><p id="total"></p><i class="fas fa-plus"></i>GUARDAR PRODUCTO</button>
                    </div>
                    <div class="compra">
                        <p></p>
                        <input type="number" id="monto" value="">
                        <p id="precio-total" total="">$0</p>
                        <p id="cambio">$0</p>
                        <button id="end-compra"><i class="fas fa-check"></i>FINALIZAR COMPRA</button>
                    </div>
                    <div class="info">
                        <p></p>
                        <p>Monto Cliente</p>
                        <p>Precio Compra</p>
                        <p>Vuelto</p>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
                <!--AQUI SE VEN LAS VENTAS DEL VENDEDOR EN SESSION-->
    <div class="misVentas-container" id="misVentas-container">
    <h1>Historial de Ventas</h1>
        <div class="misVentas">
            <div class="info-ventas">
                <p>PRODUCTOS</p>
                <p>CANTIDAD</p>
                <p>UNIDAD</p>
            </div>
            <div class="productos" id="PRODUCTOS">
                    <!--ACA SE MUESTRAN TODAS LAS VENTAS-->
            </div>
        </div>
    </div>     
        
           
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="../../../scripts/feriante.js"></script>
<script src="../../../scripts/panel.js"></script>

</body>
</html>
    
</html>

<?php }else{
    echo "Inicie session";
} ?>







