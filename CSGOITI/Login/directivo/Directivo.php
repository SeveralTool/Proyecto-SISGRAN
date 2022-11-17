<?php
include("../conexion_bd.php");

include("../sesion.php");
session_start();
if (isset($_SESSION['PERSONAL']) && $_SESSION['ROL'] === "rol_directivo") {
    $correoUSER = $_SESSION['PERSONAL'];
}
if (!empty($correoUSER)) {

    //PEDIMOS TOTAL DE HUERTAS EN EL SISTEMA DE SISGRAN
    $totalHuertas = "SELECT COUNT(estado_huerta) FROM huerta WHERE huerta.estado_huerta = 'aceptada';";
    $res2 = mysqli_query($conexion, $totalHuertas);
    $row2 = mysqli_fetch_array($res2);
    //TRAEMOS DATOS DESDE USUARIO Y LOS GUARDAMOS EN ARRAY
    $usuario = "SELECT nombre_personal FROM usuario WHERE rol = 'rol_directivo';";
    $res3 = mysqli_query($conexion, $usuario);
    $row3 = mysqli_fetch_array($res3);

?>

    <html>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Directivo</title>
        <link rel="shortcut icon" href="../../../Imagenes/carrot.png" type="image/x-icon">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <link rel="stylesheet" href="../../../CSS/directivo.css">
        <link rel="stylesheet" href="../../../CSS/paneles.css">
    </head>

    <body>


        <div class="all-container">
            <!--PANEL GRANDE-->

            <div class="panel" id="panel-big">
                <i class="fas fa-angle-double-left" id="none-panel"></i>
                <div class="logo-admin"><img src="../../../Imagenes/Logo sisgran.png" alt=""></div>
                <h3 class="titulo">PANEL DE CONTROL <br> CUERPO DIRECTIVO</h3>


                <div class="selector-admin">
                    <button class="boton-sel" id="btn-pedidos"><i class="far fa-paper-plane"></i>
                        <p>PEDIDOS</p>
                    </button>
                    <button class="boton-sel" id="btn-produccion"><i class="fas fa-house-user"></i>
                        <p>PRODUCCION</p>
                    </button>
                    <button class="boton-sel" id="btn-huertas"><i class="fas fa-user-check"></i>
                        <p>ABM HUERTAS</p>
                    </button>
                    <button class="boton-sel" id="btn-stats"><i class="fas fa-chart-bar"></i>
                        <p>ESTADISTICAS</p>
                    </button>
                    <button class="boton-sel" id="btn-metas"><i class="fas fa-chart-line"></i>
                        <P>METAS</P>
                    </button>
                </div>

                <div class="datos-directivo">
                    <h3 class="subtitulo"><?php echo $row3['nombre_personal']; ?></h3>
                    <a href="../../../main.php"><i class="fas fa-home"></i></a>
                    <a href="../cerrar_sesion.php"><i class="fas fa-sign-out-alt"></i></a>
                </div>

            </div>

            <!--PANEL FINO-->

            <div class="panel-responsive" id="panel-small">
                <i class="fas fa-angle-double-right" id="show-panel"></i>
                <div class="logo-admin-responsive">
                    <p>SISGRAN</p>
                </div>

                <div class="selector-admin-responsive">
                    <button class="boton-sel-responsive" id="btn-pedidos-res"><i class="far fa-paper-plane"></i></button>
                    <button class="boton-sel-responsive" id="btn-produccion-res"><i class="fas fa-house-user"></i></button>
                    <button class="boton-sel-responsive" id="btn-huertas-res"><i class="fas fa-user-check"></i></button>
                    <button class="boton-sel-responsive" id="btn-stats-res"><i class="fas fa-chart-bar"></i></button>
                    <button class="boton-sel-responsive" id="btn-metas-res"><i class="fas fa-chart-line"></i></button>
                </div>

                <div class="datos-directivo-responsive">
                    <a href="../../../main.php"><i class="fas fa-home"></i></a><br>
                    <a href="../cerrar_sesion.php"><i class="fas fa-sign-out-alt"></i></a>
                </div>


            </div>


            <!--PANTALLAS DE INFORMACION-->

            <!--VENTANA CONTROL DE PEDIDOS-->
            <div class="contenedor-main" id="panel-datos">
                
                <div class="container" id="pedidos-directivo">
                    <h3>CONTROL DE PEDIDOS</h3>
                    <div id="pedidos">
                        <canvas id="graficaPedidos" width="50%" height="50%"></canvas>
                    </div>
                </div>

                <!--VENTANA PRODUCCION DE HUERTAS-->
                <div class="container" id="produccion-directivo">
                    <h3>CONTROL DE PRODUCCION POR HUERTAS</h3>
                    <div id="produ-container">
                        <div id="select-container">
                            <select name="" id="select-produ">
                                <!--HUERTAS EN SISGRAN-->
                                <option value="0">Seleccionar Huerta</option>
                            </select>
                        </div>
                        <div id="datos-container">
                            <div id="p1">
                                <P class="s1">CULTIVÓ</P>
                                <span>
                                    <p id="c1"></p>
                                    <p id="ATAcultivos"></p>
                                    <p id="KGcultivos"></p>
                                    <p id="UNIcultivos"></p>
                                </span>
                            </div>
                            <div id="p2">
                            <P class="s1">COSECHÓ</P>
                                <span>
                                    <p id="c2"></p>
                                    <p id="ATAcosecha"></p>
                                    <p id="KGcosecha"></p>
                                    <p id="UNIcosecha"></p>
                                </span>
                            </div>
                            <div id="p3"> </div>
                            <div id="p4"></div>
                        </div>
                    
                    </div>

                </div>

                <!--VENTANA PARA DATOS DE HUERTAS-->
                <div class="container" id="huertas-directivo">
                    <h3>HUERTAS PENDIENTES</h3> <br>
                    <div class="stats-huertas">
                        <div class="total-huertas"><i class="fas fa-warehouse"></i>
                            <p>Huertas totales<?php echo " " . $row2['COUNT(estado_huerta)']; ?></p> 
                        </div>
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

                        <div class="datos-huertas">
                            <!--ACA SE VERAN LAS HUERTAS-->
                        </div><br>
                    </div>
                </div>

                <!--VENTANA DE ESTADISTICAS-->
                <div class="container" id="stats-directivo">
                    <h3>ESTADISTICAS DE SISGRAN</h3>
                    <div class="statsGraficas">
                        <div class="div1">
                            <h4>Stock de Vegetales</h4><canvas id="cuatro" width="1fr" height="1fr"></canvas>
                        </div>
                        <div class="div2">
                            <h4>Ventas en el Almacen</h4><canvas id="cinco" width="1fr" height="1fr"></canvas>
                        </div>
                        <div class="div3">
                            <h4>Estado de clientes</h4><canvas id="dos" width="1fr" height="1fr"></canvas>
                        </div>
                        <div class="div4">
                            <h4>Estado de Huertas</h4><canvas id="uno" width="1fr" height="1fr"></canvas>
                        </div>
                        <div class="div5">
                            <h4>Ventas Web este año</h4><canvas id="tres" width="1fr" height="1fr"></canvas>
                        </div>
                        <div class="div6">
                            <p>GANANCIAS TOTALES<br></p>
                            <p id="profit"></p>
                        </div>
                    </div>
                </div>


                <!--VENTANA INGRESO DE METAS-->
                <div class="container" id="metas-directivo">
                    <h3>METAS DE PRODUCCION</h3>
                    <div class="metas-container">
                        <div class="div1">
                            <p>Total <br> Cultivado</p>
                            <span id="p-2-cultivos">
                                <p id="m1"></p>
                                <p class="m1" id="kgCultivos"></p>
                                <p class="m1" id="atadoCultivos"></p>
                                <p class="m1" id="unidadCultivos"></p>
                            </span>
                        </div>
                        <div class="div2"> 
                            <span id="p-3-cultivos">
                                <p id="m2"></p>
                                <p class="m2" id="kgCosechado"></p>
                                <p class="m2" id="atadoCosechado"></p>
                                <p class="m2" id="unidadCosechado"></p>
                            </span>
                            <p>Total <br> Cosechado</p>
                        </div>
                        <div class="div3">
                        <p id="m3">Ganancias y perdidas de produccion total</p>    
                        <p class="m3">4534</p>
                        </div>
                        <div class="div4"> 
                            <p id="m4">Metas Huertas Pequeñas</p>
                            <p class="m4"></p>
                        </div>
                        <div class="div5">
                            <p class="m5"></p>    
                            <p id="m5">Metas Huertas Medianas</p>
                        </div>
                    </div>

                </div>


            </div>

        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="../../../scripts/chart.min.js"></script>
        <script src="directivo.js"></script>
        <script src="../../../scripts/panel.js"></script>
    </body>

    </html>

    </html>

<?php } else {
    echo "Inicie session";
} ?>