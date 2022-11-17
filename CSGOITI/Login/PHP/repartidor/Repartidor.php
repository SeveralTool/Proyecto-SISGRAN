<?php
include("../sesion.php");
session_start();
if (isset($_SESSION['NOMBREPERSONAL']) && $_SESSION['ROL'] === "rol_repartidor") {
    $IDUSER = $_SESSION['NOMBREPERSONAL'];
}
if (!empty($IDUSER)) {

?>
    <html>
   <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Repartidor</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <link rel="shortcut icon" href="../../../Imagenes/carrot.png" type="image/x-icon">
        <link rel="stylesheet" href="../../../CSS/repartidor.css">
        <link rel="stylesheet" href="../../../CSS/paneles.css">
    </head>

    <body>
        <div class="all-container">
            <!--PANEL GRANDE

            <div class="panel" id="panel-big">
                <i class="fas fa-angle-double-left" id="none-panel"></i>
                <div class="logo-admin"><img src="../../../Imagenes/Logo sisgran.png" alt=""></div>
                <h3 class="titulo">PANEL DE CONTROL</h3>


                <div class="selector-admin">
                    <button class="boton-sel" id="btn-user"><i class="far fa-paper-plane"></i>
                        <p>USUARIO</p>
                    </button>
                    <button class="boton-sel" id="btn-pedidos"><i class="fas fa-house-user"></i>
                        <p>PEDIDOS</p>
                    </button>
                    <button class="boton-sel" id="btn-historial"><i class="fas fa-house-user"></i>
                        <p>HISTORIAL</p>
                    </button>
                </div>

                <div class="datos-directivo">
                    <h3 class="subtitulo"> <?php echo $_SESSION['NOMBREPERSONAL']; ?></h3>
                    <a href="../../../main.php"><i class="fas fa-home"></i></a>
                    <a href="../cerrar_sesion.php"><i class="fas fa-sign-out-alt"></i></a>
                </div>
            </div>
-->
            <!--PANEL FINO-->

            <div class="panel-responsive" id="panel-small">
                <!--<i class="fas fa-angle-double-right" id="show-panel"></i>-->
                <div class="logo-admin-responsive">
                    <p>SISGRAN</p>
                </div>

                <div class="selector-admin-responsive">
                    <button class="boton-sel-responsive" id="btn-user-res"><i class="far fa-paper-plane"></i></button>
                </div>

                <div class="datos-directivo-responsive">
                    <a href="../../../main.php"><i class="fas fa-home"></i></a><br>
                    <a href="../cerrar_sesion.php"><i class="fas fa-sign-out-alt"></i></a>
                </div>
            </div>

            <!--PANTALLAS DE INFORMACION-->
<div id="EndPedido">
<i class="fas fa-check"  id="i-end"> <br> ENTREGADO</i>
</div>
<div id="notPedido">
<i class="fas fa-times"  id="i-end"> <br>NO ENTREGADO</i>
</div>
            <div class="contenedor-main" id="panel-datos">

                <div class="container" id="armados">

                    <h3>PEDIDOS ARMADOS PARA ENTREGAR</h3>
                    <div class="sub-titles">
                        <p>Nº Pedido</p>
                        <p>Entrega</p>
                        <p>Horario</p>
                        <p>Precio Total</p>
                        <p>Dirección</p>
                        <p>Puerta</p>
                        <p>Codigo Postal</p>
                    </div>
                    <div class="pedidos-container">
                        <!--ACA SE VERAN LOS PEDIDOS ARRMADOS-->
                    </div>

                </div>

                <div id="mapa-container">
                    <!--ACA SE MOSTRARA EL MAPA-->
                    <div id="mapa">

                    </div>
                    <div id="info-mapa">
                        <!--ACA SE MOSTRARA LA INFO DEL PEDIDO A ENTREGAR-->
                    </div>
                </div>


            </div>

        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="../../../scripts/repartidor.js"></script>
        <script src="../../../scripts/panel.js"></script>


    </body>

    </html>

    </html>

<?php } else {
    echo "Inicie session";
} ?>