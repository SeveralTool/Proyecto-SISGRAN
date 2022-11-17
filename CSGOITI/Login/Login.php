<?php

?>


<!DOCTYPE html>
<html lang="es">

<head>
        <meta charset="UTF-8">
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../CSS/all.css">
        <link rel="stylesheet" href="../CSS/Login.css">
        <link rel="shortcut icon" href="../Imagenes/carrot.png" type="image/x-icon">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">


</head>

<body>
<div class="fondo-deg"></div>
<i class="far fa-arrow-alt-circle-left" onclick="window.history.back()"> </i>

        <div class="login-container">
                <div class="login">
                        <a href="../main.php" class="link"><img class="logo-login" src="../Imagenes/Logo sisgran.png" alt=""></a>
                        <h3 class="login-h1">LOGIN</h3>
                        <div class="contenedor">
                                <form action="PHP/sesion.php" method="post" id="form-login">
                                        <div class="form__group">
                                                <input required placeholder="Sisgran@example.com" class="form__field" name="email" type="email" id="email-login" autofocus minlength="7" maxlength="50">
                                                <label class="form__label" for="name">Sisgran@example.com</label>
                                                <p id="dontExist"></p>
                                        </div>
                                        <p></p>
                                        <div class="form__group">
                                                <input required placeholder="Password" minlength="8" maxlength="32" class="form__field" name="password" id="pass-login" type="password"><span id="ojo"><i class="far fa-eye-slash" id="ocultar" onclick="mostrarContrasena()"></i><i class="far fa-eye" id="mostrar" onclick="mostrarContrasena()"></i></span>
                                                <label class="form__label" for="name">Password</label>
                                                <p id="invalidPass"></p>
                                        </div>

                                        <input type="submit" value="Iniciar Sesion" name="loginSisgran" id="submit-Login" class="button">
                                        <div class="password">
                                                <p>¿Aún no tienes cuenta? <a class="link-a" href="Registro.php">Regístrate</a></p>
                                        </div>
                                </form>
                        </div>
                </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

        <script src="../scripts/login.js"></script>

</body>

</html>