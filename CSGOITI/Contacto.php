<?php
include("Login/PHP/conexion_bd.php");
include("Login/PHP/sesion.php");
session_start();
if (isset($_SESSION['ID'])) {
    $IDUSER = $_SESSION['ID'];
    $ROL = $_SESSION['ROL'];
    //TRAEMOS LA IMAGEN DE PERFIL DEL USUARIO
    if ($ROL === "rol_web" || $ROL === "rol_empresa") {
        $consulta2 = "SELECT cliente.foto_perfil FROM cliente WHERE cliente.nº_cliente = '$IDUSER';";
        $res2 = mysqli_query($conexion, $consulta2);
        $row2 = mysqli_fetch_array($res2);
    } else if ($ROL === "rol_huerta") {
        $consulta3 = "SELECT huerta.foto_perfil FROM huerta WHERE huerta.id_huerta = '$IDUSER';";
        $res3 = mysqli_query($conexion, $consulta3);
        $row3 = mysqli_fetch_array($res3);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link rel="shortcut icon" href="Imagenes/carrot.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="CSS/all.css">
    <link rel="stylesheet" href="CSS/catalogo.css">
    <link rel="stylesheet" href="CSS/carrito.css">
    <link rel="stylesheet" href="CSS/contacto.css">
    <link rel="stylesheet" href="CSS/envio.css">
</head>

<body>
    <!--MENU-->
    <header>
        <div class="menu-container" id="arriba" value="1">
            <a href="main.php" class="logo-a">
                <div class="logo"><img src="Imagenes/Logo sisgran.png" alt="" id="logo-img"></div>
            </a>
            <div class="listas">
                <ul class="listas-ul">
                    <a href="main.php" class="listas-ul-a">
                        <li class="listas-li">Inicio</li>
                    </a>
                    <a href="Catalogo.php" class="listas-ul-a">
                        <li class="listas-li">Catalogo</li>
                    </a>
                    <a href="Nosotros.php" class="listas-ul-a">
                        <li class="listas-li">Nosotros</li>
                    </a>
                    <a href="Contacto.php" class="listas-ul-a">
                        <li class="listas-li">Contacto</li>
                    </a>
                </ul>
            </div>

            <div class="login">
                <label class="switch" id="dark-mode">
                    <span class="dark-icon"></span>
                </label>
                <ul class="login-main">
                    <!--BOTONES DE USUARIO-->
                    <div class="user">

                        <?php
                        if (isset($_SESSION['ROL'])) { ?>
                            <html>
                            <div class="perfil"><img src="<?php if (isset($ROL)) {
                                                                if ($ROL === "rol_web" || $ROL === "rol_empresa") {
                                                                    echo $row2['foto_perfil'];
                                                                } elseif ($ROL === "rol_huerta") {
                                                                    echo $row3['foto_perfil'];
                                                                }
                                                            } else {
                                                                echo "perfiles/default.png";
                                                            } ?>" class="IconUserPanel"></div>
                            <div class="settingsUserList">
                                <p class="datos-user"><?php if ($_SESSION['ROL'] === "rol_web") {
                                                            echo "Bienvenido:" . $_SESSION["NOMBREWEB"]; ?></p>
                                <a href="Login/PHP/web/ClienteWeb.php" class="UserControlWeb btn-UsersPanel">
                                    <p>PANEL DE CONTROL</p>
                                </a>
                                <a href="Login/PHP/cerrar_sesion.php" name="close-session" class="btn-CloseSesion">
                                    <p>CERRAR SESION</p>
                                </a>
                            </div>
                            </i>
                    </div>

</html>

<?php } else if ($_SESSION['ROL'] === "rol_empresa") {
                                                            echo "Bienvenido:" . $_SESSION["NOMBREEMPRESA"]; ?>
    </p>
    <a href="Login/PHP/empresa/ClienteEmpresa.php" class="UserControlEmpresa btn-UsersPanel">
        <p>PANEL DE CONTROL</p>
    </a>
    <a href="Login/PHP/cerrar_sesion.php" name="close-session" class="btn-CloseSesion">
        <p>CERRAR SESION</p>
    </a>
    </div>
    </i>
    </div>

    </html>
<?php } else if ($_SESSION['ROL'] === "rol_huerta") {
                                                            echo "Bienvenido:" . $_SESSION["NOMBREHUERTA"]; ?>
    </p>
    <a href="Login/PHP/huerta/Huerta.php" class="UserControlHuerta btn-UsersPanel">
        <p>PANEL DE CONTROL</p>
    </a>
    <a href="Login/PHP/cerrar_sesion.php" name="close-session" class="btn-CloseSesion">
        <p>CERRAR SESION</p>
    </a>
    </div>
    </i>
    </div>

    </html>
<?php } else if ($_SESSION['ROL'] === "rol_admin") {
                                                            echo "Bienvenido:" . $_SESSION["NOMBREPERSONAL"]; ?>
    </p>
    <a href="Login/PHP/admin/Administrador.php" class="UserControlAdmin btn-UsersPanel">
        <p>PANEL DE CONTROL</p>
    </a>
    <a href="Login/PHP/cerrar_sesion.php" name="close-session" class="btn-CloseSesion">
        <p>CERRAR SESION</p>
    </a>
    </div>
    </i>
    </div>

    </html>
<?php } else if ($_SESSION['ROL'] === "rol_directivo") {
                                                            echo "Bienvenido:" . $_SESSION["NOMBREPERSONAL"];  ?>
    </p>
    <a href="Login/PHP/directivo/Directivo.php" class="UserControlDirectivo btn-UsersPanel">
        <p>PANEL DE CONTROL</p>
    </a>
    <a href="Login/PHP/cerrar_sesion.php" name="close-session" class="btn-CloseSesion">
        <p>CERRAR SESION</p>
    </a>
    </div>
    </i>
    </div>

    </html>
<?php } else if ($_SESSION['ROL'] === "rol_informatico") {
                                                            echo "Bienvenido:" . $_SESSION["NOMBREPERSONAL"];  ?>
    </p>
    <a href="Login/PHP/informatico/Informatico.php" class="UserControlInformatico btn-UsersPanel">
        <p>PANEL DE CONTROL</p>
    </a>
    <a href="Login/PHP/cerrar_sesion.php" name="close-session" class="btn-CloseSesion">
        <p>CERRAR SESION</p>
    </a>
    </div>
    </i>
    </div>

    </html>
<?php } else if ($_SESSION['ROL'] === "rol_repartidor") {
                                                            echo "Bienvenido:" . $_SESSION["NOMBREPERSONAL"];  ?>
    </p>
    <a href="Login/PHP/repartidor/Repartidor.php" class="UserControlRepartidor btn-UsersPanel">
        <p>PANEL DE CONTROL</p>
    </a>
    <a href="Login/PHP/cerrar_sesion.php" name="close-session" class="btn-CloseSesion">
        <p>CERRAR SESION</p>
    </a>
    </div>
    </i>
    </div>

    </html>
<?php } else if ($_SESSION['ROL'] === "rol_vendedor") {
                                                            echo "Bienvenido:" . $_SESSION["NOMBREPERSONAL"];  ?>
    </p>
    <a href="Login/PHP/feriante/feriante.php" class="UserControlFeriante btn-UsersPanel">
        <p>PANEL DE CONTROL</p>
    </a>
    <a href="Login/PHP/cerrar_sesion.php" name="close-session" class="btn-CloseSesion">
        <p>CERRAR SESION</p>
    </a>
    </div>
    </i>
    </div>

    </html>
<?php } ?>


<?php } else { ?>
    <html>
    <a href="Login/Login.php" class="listas-ul-a inicio-sesion">
        <li class="listas-li" id="iniciar-sesi">Iniciar Sesión </li>
    </a>
    </ul>

    </html>
<?php } ?>

</div>

</div>


<!--MENU RESPONSIVE -->

<div class="menu-container-responsive" id="responsive-container arriba">
    <div class="logo-responsive">
        <a href="main.php" class="logo-a-responsive"><img src="Imagenes/Logo sisgran.png" alt="" id="logo-img-responsive"></a>
    </div>
    <div class="menu-responsive" id="menu-responsive">
        <i class="bars fas fa-bars" id="barras-menu">
            <div id="menu-listas-responsive">
                <a href="main.php">
                    <li>Inicio</li>
                </a>
                <a href="Catalogo.php">
                    <li>Catalogo</li>
                </a>
                <a href="Nosotros.php">
                    <li>Nosotros</li>
                </a>
                <a href="Contacto.php">
                    <li>Contacto</li>
                </a>
                <label class="switch" id="dark-mode">
                    <span class="dark-icon"></span>
                </label>
                <span class="cerrar-menu"><i class="far fa-times-circle" id="xClose"></i></span>
            </div>
        </i>

        <div class="login-responsive">
            <!--BOTONES DE USUARIO-->
            <div class="user-responsive">

                <?php
                if (isset($_SESSION['ROL'])) { ?>
                    <html>
                    <div class="perfil"><img src="<?php if (isset($ROL)) {
                                                        if ($ROL === "rol_web" || $ROL === "rol_empresa") {
                                                            echo $row2['foto_perfil'];
                                                        } elseif ($ROL === "rol_huerta") {
                                                            echo $row3['foto_perfil'];
                                                        }
                                                    } else {
                                                        echo "perfiles/default.png";
                                                    } ?>" class="IconUserPanel-responsive"></div>
                    <div class="settingsUserList-responsive">
                        <p class="datos-user"><?php if ($_SESSION['ROL'] === "rol_web") {
                                                    echo "Bienvenido:" . $_SESSION["NOMBREWEB"]; ?></p>
                        <a href="Login/PHP/web/ClienteWeb.php" class="UserControlWeb btn-UsersPanel">
                            <p>PANEL DE CONTROL</p>
                        </a>
                        <a href="Login/PHP/cerrar_sesion.php" name="close-session" class="btn-CloseSesion">
                            <p>CERRAR SESION</p>
                        </a>
                    </div>
                    </i>
            </div>

            </html>

        <?php } else if ($_SESSION['ROL'] === "rol_empresa") {
                                                    echo "Bienvenido:" . $_SESSION["NOMBREEMPRESA"]; ?>
            </p>
            <a href="Login/PHP/empresa/ClienteEmpresa.php" class="UserControlEmpresa btn-UsersPanel">
                <p>PANEL DE CONTROL</p>
            </a>
            <a href="Login/PHP/cerrar_sesion.php" name="close-session" class="btn-CloseSesion">
                <p>CERRAR SESION</p>
            </a>
        </div>
        </i>
    </div>

    </html>
<?php } else if ($_SESSION['ROL'] === "rol_huerta") {
                                                    echo "Bienvenido:" . $_SESSION["NOMBREHUERTA"]; ?>
    </p>
    <a href="Login/PHP/huerta/Huerta.php" class="UserControlHuerta btn-UsersPanel">
        <p>PANEL DE CONTROL</p>
    </a>
    <a href="Login/PHP/cerrar_sesion.php" name="close-session" class="btn-CloseSesion">
        <p>CERRAR SESION</p>
    </a>
</div>
</i>
</div>

</html>
<?php } else if ($_SESSION['ROL'] === "rol_admin") {
                                                    echo "Bienvenido:" . $_SESSION["NOMBREPERSONAL"]; ?>
    </p>
    <a href="Login/PHP/admin/Administrador.php" class="UserControlAdmin btn-UsersPanel">
        <p>PANEL DE CONTROL</p>
    </a>
    <a href="Login/PHP/cerrar_sesion.php" name="close-session" class="btn-CloseSesion">
        <p>CERRAR SESION</p>
    </a>
    </div>
    </i>
    </div>

    </html>
<?php } else if ($_SESSION['ROL'] === "rol_directivo") {
                                                    echo "Bienvenido:" . $_SESSION["NOMBREPERSONAL"];  ?>
    </p>
    <a href="Login/PHP/directivo/Directivo.php" class="UserControlDirectivo btn-UsersPanel">
        <p>PANEL DE CONTROL</p>
    </a>
    <a href="Login/PHP/cerrar_sesion.php" name="close-session" class="btn-CloseSesion">
        <p>CERRAR SESION</p>
    </a>
    </div>
    </i>
    </div>

    </html>
<?php } else if ($_SESSION['ROL'] === "rol_informatico") {
                                                    echo "Bienvenido:" . $_SESSION["NOMBREPERSONAL"];  ?>
    </p>
    <a href="Login/PHP/informatico/Informatico.php" class="UserControlInformatico btn-UsersPanel">
        <p>PANEL DE CONTROL</p>
    </a>
    <a href="Login/PHP/cerrar_sesion.php" name="close-session" class="btn-CloseSesion">
        <p>CERRAR SESION</p>
    </a>
    </div>
    </i>
    </div>

    </html>
<?php } else if ($_SESSION['ROL'] === "rol_repartidor") {
                                                    echo "Bienvenido:" . $_SESSION["NOMBREPERSONAL"];  ?>
    </p>
    <a href="Login/PHP/repartidor/Repartidor.php" class="UserControlRepartidor btn-UsersPanel">
        <p>PANEL DE CONTROL</p>
    </a>
    <a href="Login/PHP/cerrar_sesion.php" name="close-session" class="btn-CloseSesion">
        <p>CERRAR SESION</p>
    </a>
    </div>
    </i>
    </div>

    </html>
<?php } else if ($_SESSION['ROL'] === "rol_vendedor") {
                                                    echo "Bienvenido:" . $_SESSION["NOMBREPERSONAL"];  ?>
    </p>
    <a href="Login/PHP/feriante/feriante.php" class="UserControlFeriante btn-UsersPanel">
        <p>PANEL DE CONTROL</p>
    </a>
    <a href="Login/PHP/cerrar_sesion.php" name="close-session" class="btn-CloseSesion">
        <p>CERRAR SESION</p>
    </a>
    </div>
    </i>
    </div>

    </html>
<?php } ?>


<?php } else { ?>
    <html>
    <a href="Login/Login.php" class="listas-ul-a inicio-sesion">
        <li class="listas-li" id="iniciar-sesi">Iniciar Sesión </li>
    </a>
    </ul>

    </html>
<?php } ?>

</div>

</div>

</header>

<div class="container">

    <div class="card">
        <div class="tools">
            <div class="circle">
                <span class="red box"></span>
            </div>
            <div class="circle">
                <span class="yellow box"></span>
            </div>
            <div class="circle">
                <span class="green box"></span>
            </div>
        </div>
        <div class="card__content">
        </div>
        <h2>¡CONTACTANOS!</h2>

        <div class="form-container">
            <div class="form" id="form-contacto">
                <input id="nombre-contacto" type="text" placeholder="Nombre" minlength="2" maxlength="30">
                <input id="correo-contacto" type="email" placeholder="Email" minlength="7" maxlength="50">
                <input id="tel-contacto" type="number" placeholder="Telefono/Celular" minlength="9" maxlength="20">
                <p class="p-a">Asunto</p>
                <select name="" id="sele">
                    <option value="0" selected>Seleccione un asunto</option>
                    <option value="Modificacion de datos de usuario">Modificacion de datos de usuario</option>
                    <option value="Problemas con una compra">Problemas con una compra</option>
                    <option value="Problemas con PayPal">Problemas con PayPal</option>
                    <option value="Recuperar Contraseña">Recuperar Contraseña</option>
                    <option value="Descuentos">Descuentos</option>
                    <option value="Productos">Productos</option>
                    <option value="Ofertas de empleo">Ofertas de empleo</option>
                    <option value="Parametros de aceptacion de usuario">Parametros de aceptacion de usuario</option>
                    <option value="Unirse como Huerta asociada">Unirse como Huerta asociada</option>
                    <option value="Cerrar cuenta">Cerrar cuenta</option>
                    <option value="Otro">Otro</option>
                </select>
                <p class="p-a">Mensaje:</p>
                <textarea name="" id="mensaje-contacto" cols="30" rows="10" maxlength="600"></textarea>
                <p id="error"></p>
                <button id="sendConsulta">
                    <span>Enviar</span><i></i>
                </button>
</div>
            <div class="redes">
                <div class="iconos">
                    <a href="https://www.instagram.com/sisgranuy/"><i class="fab fa-instagram"></i></a>
                    <a href="#mail"><i class="far fa-envelope"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>






<!--FOOTER-->
<footer class="footer">
    <div class="footer-grid">
        <div class="footer-sisgran">
            <h3 class="footer-h3">REDES</h3>
            <div class="footer-redes">
                <a href="https://www.instagram.com/sisgranuy/"> <i class="fab fa-instagram"></i> </a>
            </div>
        </div>
        <div class="footer-nosotros">
            <h3 class="footer-h3">SOBRE NOSOTROS</h3>
            <p>Somos una cooperativa de Huertas ecologicas al servicio de nuestros clientes, con producción y
                distribución propia.</p>
        </div>
        <div class="footer-contacto" id="mail">
            <h3 class="footer-h3">CONTACTANOS</h3>
            <p class="p-h3"><i class="ok fas fa-envelope"></i><a href="mailto:Greensoftiti@gmail.com" class="a-mail">Greensoftiti@gmail.com</a> </p>
            <p class="p-h3"><i class="fas fa-phone-alt"></i> 099 704 597</p>

        </div>
    </div>
    <div class="footer-greensoft">
        <p>Software powered by <a href="PAGINA EMPRESA/main.php">GreenSoft</a> | Copyright&copy;
            2022 </p>
    </div>

    <?php if (isset($_SESSION['ID']) && $_SESSION['ROL'] != "rol_huerta") {  ?>

        <div class="btn-carrito" id="btn-carrito">
            <i class="fas fa-shopping-cart" class="iconoDeCarrito">
                <p class="cantidadEnCarrito"></p>
            </i>
        </div>

        <div class="ventana-carrito" id="ventana-carrito">
            <i class="fas fa-times" id="btn-cerrar-carrito"></i>
            <h4>CARRITO DE COMPRAS</h4>
            <div class="productos-container">
                <div class="box-enCarrito">
                    <!--AQUI SE VEN TODO LOS PRODUCTOS EN CARRITO-->
                </div>
            </div>
            <div class="cont-envio">
                <div class="precioTotal">Precio Total: $<p class="precioTotalPedido"></p>
                </div>
                <div class="boton-compra ir-envio "><button>Continuar Compra<i class="fas fa-check-circle"></i></button></div>
            </div>
        </div>
        <!--VENTANA DE ENVIO-->
        <div class="envio-container">
            <i class="fas fa-chevron-left" id="btn-cerrar-envio"></i>

            <div class="box-envio">
                <h3 class="h3-envio">SELECCIONE SU METODO DE ENVIO</h3>
                <?php
                if ($_SESSION['ROL'] === "rol_web" || $_SESSION['ROL'] === "rol_empresa") {
                    $consulta1 = "SELECT cliente.direccion, cliente.puerta FROM cliente WHERE cliente.nº_cliente = '$IDUSER';";
                    $res1 = mysqli_query($conexion, $consulta1);
                    $row1 = mysqli_fetch_array($res1);
                    $direccion = $row1['direccion'];
                    $puerta = $row1['puerta'];
                }
                ?>

                <h5 class="h5-envio">Envios disponibles a partir de las <p>48hs</p> despues del pago</h5>
                <h4>El pedido será entregado en: <p class="dir-entrega"><?php echo " " . $direccion . " " . $puerta; ?></p>
                </h4>

                <div class="sel-fecha-entrega"> El:
                    <select name="Seleccione el dia de Entrega" id="entrega-fecha">
                        <option value="" id="2dias"></option>
                        <option value="" id="3dias"></option>
                    </select>
                    <select name="" id="rango-hora">
                        <option value="8 a 12">de 8 a 12 hs</option>
                        <option value="12 a 16">de 12 a 16 hs</option>
                        <option value="16 a 20">de 16 a 20 hs</option>
                    </select>
                </div>

                <iframe id="gmap_canvas" src="https://maps.google.com/maps?q=<?php echo $direccion; ?>%20<?php echo $puerta; ?>&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"></iframe>

                <div class="cont-envio">
                    <div class="boton-compra datos-env"><a href="pago/pago.php">Confirmar Compra<i class="fas fa-check-circle"></i></a></div>
                </div>

            </div>
        </div>

    <?php } ?>
</footer>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="scripts/scrollreveal.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
<script type="text/javascript">
    emailjs.init('lc-wmPJ_BeodJHVyM')
</script>
<script src="carrito/carrito.js"></script>
<script src="scripts/contacto.js"></script>
<script src="scripts/envio.js"></script>
<script src="scripts/menu.js"></script>
<script src="scripts/dark.js"></script>
<script src="scripts/user.js"></script>
</body>

</html>