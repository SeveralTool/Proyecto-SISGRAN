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
    //TRAEMOS TODAS LAS OFERTAS CON STOCK DISPONIBLES
    $ofertas = "SELECT variedad.foto_variedad, variedad.nombre_variedad, variedad.id_variedad, variedad.id_vegetal, vegetal.nombre_vegetal, variedad.descuento, variedad.unidad_variedad, variedad.precio, stock.cantidad_stock FROM variedad, stock, vegetal WHERE variedad.descuento > 0 AND variedad.id_variedad = stock.id_variedad AND variedad.id_vegetal = vegetal.id_vegetal;";
    $res1 = mysqli_query($conexion, $ofertas);

    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="pagina principal de SISGRAN" content="ofertas de SISGRAN">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SISGRAN</title>
        <link rel="shortcut icon" href="Imagenes/carrot.png" type="image/x-icon">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <link rel="stylesheet" href="CSS/main.css">
        <link rel="stylesheet" href="CSS/all.css">
        <link rel="stylesheet" href="CSS/carrito.css">
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
                                                                echo "Bienvenido " . $_SESSION["NOMBREWEB"]; ?></p>
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
                                                                echo "Bienvenido " . $_SESSION["NOMBREEMPRESA"]; ?>
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
                                                                echo "Bienvenido " . $_SESSION["NOMBREHUERTA"]; ?>
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
                                                                echo "Bienvenido " . $_SESSION["NOMBREPERSONAL"]; ?>
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
                                                                echo "Bienvenido " . $_SESSION["NOMBREPERSONAL"];  ?>
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
                                                                echo "Bienvenido " . $_SESSION["NOMBREPERSONAL"];  ?>
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
                                                                echo "Bienvenido " . $_SESSION["NOMBREPERSONAL"];  ?>
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
                                                                echo "Bienvenido " . $_SESSION["NOMBREPERSONAL"];  ?>
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
            <p>CERRAR SESIssON</p>
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

    <!--CUERPO-->

    <div class="inicio">
        <div class="carrusel-inicio" id="carrusel-inicio">
            <div class="carrusel-section"><img src="Imagenes/fondologin.jpg" alt="" class="carrusel-img"></div>
            <div class="carrusel-section"><img src="Imagenes/frutas.jpg" alt="" class="carrusel-img"></div>
            <div class="carrusel-section"><img src="Imagenes/perfilsisgran.png" alt="" class="carrusel-img"></div>
            <div class="carrusel-section"><img src="Imagenes/Lechugas.jpg" alt="" class="carrusel-img"></div>
            <div class="carrusel-section"><img src="Imagenes/inicio.jpg" alt="" class="carrusel-img"></div>
        </div>
        <div class="boton-carrusel btn-left" id="btn-left">&#60</div>
        <div class="boton-carrusel btn-right" id="btn-right">&#62</div>
        <div class="btn-down">
            <p class="of">OFERTAS</p> <br>
            <a href="#ofer"><i class="fas fa-angle-double-down"></i></a>
        </div>
    </div>

    <div class="div-banner">
        <p class="p-banner" id="ofer">¡ LAS MEJORES OFERTAS, AL MEJOR PRECIO !</p>
    </div>

    <div class="box-1">

        <?php while ($row1 = mysqli_fetch_array($res1)) { ?>
            <?php $precioAnterior = $row1['precio'] + $row1['precio'] * $row1['descuento'] / 100;  ?>
            <div class="box-img-ofertas" task1="dalee">
                <p class="LIMITE" lim="1" style="color: red; width: 100%; height: 20px;"></p>
                <div class="descuento">
                    <p class="p-descuento" descuento="<?php $descuento = $row1['precio'] * $row1['descuento'] / 100; ?>"> <?php echo $row1['descuento'] . "% OFF"; ?></p>
                </div>
                <img src="<?php echo $row1['foto_variedad']; ?>" alt="" class="img-oferta">
                <p class="nom-fruta"> <?php echo $row1['nombre_vegetal'] ?> <br> <?php echo $row1['nombre_variedad']; ?> </p>
                <p class="precio-anterior"><del> <?php echo "$" . intval($precioAnterior); ?> </del></p>
                <p class="precio"> <?php echo "$" . $row1['precio'] . " c/" . $row1['unidad_variedad']; ?> </p> <br>
                <input type="number" class="cantidad-compra" maxlength="3" value="1" min="1" max="<?php echo $row1['cantidad_stock']; ?>" id="cantidad-compra">

                <p id="stock"> <?php echo $row1['cantidad_stock'] . " disponibles"; ?> </p> <br>
                <div class="boton">
                    <a class="a-boton agregarCarrito" <?php if (isset($_SESSION['ROL'])) {
                                                            if ($_SESSION['ROL'] === "rol_web" || "rol_empresa") {
                                                                echo "style='pointer-events: auto;'";
                                                            } else {
                                                                echo "style='pointer-events: none;'";
                                                                echo "noLogin='3'";
                                                            }
                                                        }
                                                        ?> Vegetal="<?php echo $row1['id_vegetal']; ?>" stock="<?php echo $row1['cantidad_stock']; ?>" Variedad="<?php echo $row1['id_variedad']; ?>" precio="<?php echo $row1['precio'] ?>">AÑADIR
                                    
                    </a>
                </div>
            </div>

        <?php }; ?>

    </div>

    <div class="pago-container">
        <p class="p-pago">¡ COMPRAS SEGURAS Y GARANTIZADAS !</p>
        <img src="Imagenes/pay.png" class="img-pago">
    </div>
    <!--BOX 2-->
    <br><br>
    <div class="box-2">
        <img class="anim1 an" src="Imagenes/todaslasfrutas/frutilla.png"></img>
        <img class="anim2 an" src="Imagenes/todaslasfrutas/lechuga.png"></img>
        <img class="anim3 an" src="Imagenes/todaslasfrutas/zanahoria.png"></img>
        <img class="anim5 an" src="Imagenes/todaslasfrutas/papa.png"></img>
        <div class="envios">
            <img src="Imagenes/envios2.png" class="img-box-2">
            <p class="p"> Hacemos envios a todo el pais, 24 hs despues de hacer la compra, tu pedido irá hacia tí lo
                mas rapido posible para que disfrutes de tu alimentos.</p>
        </div>

        <div class="almacen">
            <p class="p">Contamos con excelentes instalaciones para la venta de nuestros productos, para que tu y tu
                familia compren los mejores alimentos saludables. <br> <a href="https://goo.gl/maps/1RQ68Gnqa5zjXDq76"> ¡Ven a conocernos!</a></p>
            <img src="Imagenes/inicio2.png" class="img-box-2">
        </div>

        <div class="almacen-responsive">
            <img src="Imagenes/inicio2.png" class="img-box-2">
            <p class="p">Contamos con excelentes instalaciones para la venta de nuestros productos, para que tu y tu
                familia compren los mejores alimentos saludables. <br> <a href="https://goo.gl/maps/1RQ68Gnqa5zjXDq76"> ¡Ven a conocernos!</a></p>
        </div>

        <div class="Productos">
            <img src="Imagenes/tractor.png" class="img-box-2">
            <p class="p">Todos nuestros vegetales estan cosechados por nuestras propias huertas, con los mejores
                productos y cuidados, también disponemos de stock ilimitado ya que trabajamos todo el año. </p>
        </div>

    </div>

    <div class="carrito">
        <i class="fas fa-cart-arrow-down"></i>
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
            <div class="footer-contacto">
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

                            <iframe  id="gmap_canvas" src="https://maps.google.com/maps?q=<?php echo $direccion; ?>%20<?php echo $puerta; ?>&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"></iframe>

                    <div class="cont-envio">
                        <div class="boton-compra datos-env"><a href="pago/pago.php">Confirmar Compra<i class="fas fa-check-circle"></i></a></div>
                    </div>

                </div>

            </div>

        <?php } ?>
    </footer>

    <script src="scripts/scrollreveal.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="scripts/script.js"></script>
    <script src="carrito/carrito.js"></script>
    <script src="scripts/envio.js"></script>
    <script src="scripts/dark.js"></script>
    <script src="scripts/menu.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
    <script src="scripts/user.js"></script>
    </body>

    </html>

    














































































































































































































<!--                 GreenSoft
                    SeveraloTool
-->