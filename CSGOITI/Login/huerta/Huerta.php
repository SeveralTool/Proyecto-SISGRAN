<?php
include("../sesion.php");
session_start();
if (isset($_SESSION['ID']) && $_SESSION['ROL'] === "rol_huerta") {
    $IDUSER = $_SESSION['ID'];
}
if (!empty($IDUSER)) {

    $consulta1 = "SELECT huerta.id_huerta, huerta.nombre_huerta, huerta.tamaño_huerta, huerta.correo, huerta.direccion, huerta.foto_perfil
    FROM huerta
    WHERE huerta.id_huerta = '$IDUSER';";
    $res1 = mysqli_query($conexion, $consulta1);
    $row1 = mysqli_fetch_array($res1);
    $correo = $row1['correo'];
    sleep(0.05);

?>


    <html>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="shortcut icon" href="../../../Imagenes/carrot.png" type="image/x-icon">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <link rel="stylesheet" href="../../../CSS/huerta.css">
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
                    <button class="boton-sel" id="btn-settings"><i class="far fa-paper-plane"></i>
                        <p>AJUSTES</p>
                    </button>
                    <button class="boton-sel" id="btn-ingresos"><i class="fas fa-house-user"></i>
                        <p>INGRESOS</p>
                    </button>
                    <button class="boton-sel" id="btn-produccion"><i class="fas fa-house-user"></i>
                        <p>PRODUCCION</p>
                    </button>

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
                <div class="logo-admin-responsive">
                    <p>SISGRAN</p>
                </div>

                <div class="selector-admin-responsive">
                    <button class="boton-sel-responsive" id="btn-settings-res"><i class="far fa-paper-plane"></i></button>
                    <button class="boton-sel-responsive" id="btn-ingresos-res"><i class="fas fa-house-user"></i></button>
                    <button class="boton-sel-responsive" id="btn-produccion-res"><i class="fas fa-house-user"></i></button>

                </div>

                <div class="datos-directivo-responsive">
                    <a href="../../../main.php"><i class="fas fa-home"></i></a><br>
                    <a href="../cerrar_sesion.php"><i class="fas fa-sign-out-alt"></i></a>
                </div>
            </div>


            <!--PANTALLAS DE INFORMACION-->

            <div class="container-main" id="panel-datos">
<div class="delContainer">
    <p class="t">¿Esta seguro que desea ELIMINAR la cuenta?</p>
    <p class="si sn" cliente="<?php echo $IDUSER;?>">SI<i class="fas fa-check-circle"></i></p>
    <p class="no sn">NO<i class="fas fa-times-circle"></i></p>
</div>
                <div class="container" id="USERR">
                    <div class="container" id="user">
                        <h3>
                            <p><?php echo $row1['nombre_huerta']; ?></p><img class="foto foto-top" src="<?php echo $row1['foto_perfil'] ?>">
                        </h3>

                        <div class="settings-container">
                            <div class="settings">
                                <div id="img-perfil">
                                    <img src="perfiles/1.jpg" alt="" class="foto" value="perfiles/1.jpg" <?php if ($row1['foto_perfil'] === "perfiles/1.jpg") echo "style='border-color: red;';" ?>>
                                    <img src="perfiles/2.png" alt="" class="foto" value="perfiles/2.png" <?php if ($row1['foto_perfil'] === "perfiles/2.png") echo "style='border-color: red;';" ?>>
                                    <img src="perfiles/3.png" alt="" class="foto" value="perfiles/3.png" <?php if ($row1['foto_perfil'] === "perfiles/3.png") echo "style='border-color: red;';" ?>>
                                    <img src="perfiles/4.jfif" alt="" class="foto" value="perfiles/4.jfif" <?php if ($row1['foto_perfil'] === "perfiles/4.jfif") echo "style='border-color: red;';" ?>>
                                    <img src="perfiles/5.jfif" alt="" class="foto" value="perfiles/5.jfif" <?php if ($row1['foto_perfil'] === "perfiles/5.jfif") echo "style='border-color: red;';" ?>>
                                    <img src="perfiles/6.jfif" alt="" class="foto" value="perfiles/6.jfif" <?php if ($row1['foto_perfil'] === "perfiles/6.jfif") echo "style='border-color: red;';" ?>>
                                    <img src="perfiles/7.jfif" alt="" class="foto" value="perfiles/7.jfif" <?php if ($row1['foto_perfil'] === "perfiles/7.jfif") echo "style='border-color: red;';" ?>>
                                    <img src="perfiles/8.jpg" alt="" class="foto" value="perfiles/8.jpg" <?php if ($row1['foto_perfil'] === "perfiles/8.jpg") echo "style='border-color: red;';" ?>>
                                    <img src="perfiles/9.jpg" alt="" class="foto" value="perfiles/9.jpg" <?php if ($row1['foto_perfil'] === "perfiles/9.jpg") echo "style='border-color: red;';" ?>>
                                    <img src="perfiles/default.png" alt="" class="foto foto-default" value="perfiles/default.png" <?php if ($row1['foto_perfil'] === "perfiles/default.png") echo "style='border-color: red;';" ?>>
                                </div>
                                <div class="ids">
                                    <p>ID</p><input type="number" value="<?php echo $IDUSER; ?>" disabled>
                                </div>
                                <div class="tamaño">
                                    <p>Tamaño</p><input type="text" value="<?php echo $row1['tamaño_huerta']; ?>" disabled>
                                </div>
                                <div class="nombre">
                                    <p>Nombre</p><input id="NOMBRE" type="text" value="<?php echo $row1['nombre_huerta']; ?>"><a id="nombre" href="">SAVE</a>
                                </div>
                                <div class="correo">
                                    <p>Correo</p><input id="CORREO" type="email" value="<?php echo $correo; ?>"><a id="correo" href="">SAVE</a>
                                </div>
                                <div class="pass">
                                    <p>Password</p><input id="PASS" class="password" type="password" value=""><a id="pass" href="">SAVE</a>
                                </div>
                                <div class="direccion">
                                    <p>Dirección</p><input id="DIR" type="text" value="<?php echo $row1['direccion'] ?>"><a id="dir" href="">SAVE</a>
                                </div>
                                <div class="delCuenta"><button id="delCuenta">ELIMINAR CUENTA<i class="fas fa-user-times"></i></button></div>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="container" id="ingresos">
                    <h3>INGRESO DE CULTIVOS</h3>

                    <div id="grid-ingresos">
                        <div id="grilla-huerta">
                            <!--VISTA DE HUERTA Y ESTADOS DE CULTIVOS-->

                        </div>
                        <div id="panel-ingresos">
                            <!--PANEL DE INGRESO DE VEGETALES Y ASOCIADOS(OPCIONAL)-->
                            <div class="div-vegetal">
                                <p>Vegetal</p>
                                <select name="" id="vegetal">
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
                                <span class="recommend"><!--ACA SE MUESTRAN LAS RECOMENDACIONES DE CULTIVO--></span>
                            </div>
                            <div>
                                <p>Variedad del Vegetal</p>
                                <div>
                                    <select name="" id="variedad1">
                                        <option value="0" selected>Eliga un vegetal</option>
                                    </select> <input type="number" placeholder="Cantidad" id="cantidadVariedad1">
                                </div>
                            </div>
                            <div class="div-vegetal">
                                <p>Vegetal asociado</p>
                                <select name="" id="vegetal2">
                                    <option value="0" selected>Sin Vegetales</option>
                                </select>
                                <span class="recommend"><!--ACA SE MUESTRAN LAS RECOMENDACIONES DE CULTIVO--></span>
                            </div>
                            <div>
                                <p>Variedad de Vegetal asociado</p>
                                <div>
                                    <select name="" id="variedad2">
                                        <option value="0" selected>Sin Vegetal socio</option>
                                    </select> <input type="number" placeholder="Cantidad" id="cantidadVariedad2">
                                </div>
                            </div>
                            <button id="ingreso-cultivo">INGRESAR CULTIVO</button>
                        </div>
                    </div>
                </div>

                <div class="container" id="produccion">
                    <h3>PRODUCCION DE CULITVOS</h3>
                    <div class="prod-container">
                        <div class="div1 can"> <div>
                            <p class="p-graphic">Vegetales Cultivados este año</p> 
                            <canvas id="uno" width="1fr" height="1fr"></canvas>
                        </div> 
                    </div>
                        <div class="div2 can">
                            <div>
                                <p class="p-graphic">Vegetales Cosechados este año</p>
                                <canvas id="dos" width="1fr" height="1fr"></canvas>
                            </div>
                        </div>
                        <div class="div3 can">
                            <div class="info-tot">
                                <p>Cultivos Totales</p>
                                <p>Cosechas Totales</p>
                                <p>Profit/Loss</p>
                            </div>
                            <div class="numeros-tot">
                                <p class="cultivos"></p>
                                <p class="cosechas"></p> 
                                <p class="total"></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>



        </div>

        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="../../../scripts/chart.min.js"></script>
        <script src="../../../scripts/huerta.js"></script>
        <script src="../../../scripts/panel.js"></script>
    </body>

    </html>

    </html>

<?php } else {
    echo "Inicie session";
} ?>