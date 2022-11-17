<?php ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="shortcut icon" href="../Imagenes/carrot.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/all.css">
    <link rel="stylesheet" href="../CSS/registro.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
</head>

<body>
    <div class="fondo-deg"></div>
    <div class="registro">
        <i class="far fa-arrow-alt-circle-left" onclick="window.history.back()"> </i>
        <a href="../main.php" class="link"><img class="logo-registro" src="../Imagenes/Logo sisgran.png" alt=""></a>
        <h3 class="registro-h3">REGISTRO</h3>

        <!--SELECCION DE USUARIO-->
        <div class="selector">
            <ul class="usuarios">
                <button id="cliente-web" selected class="sel-li" value="web">Clientes</button>
                <button id="cliente-empresa" class="sel-li" value="empresa">Empresas</button>
                <button id="cliente-huerta" class="sel-li" value="huerta">Huertas</button>
            </ul>
        </div>

        <!--CLIENTE WEB-->
        <div class="contenedor" id="web">
            <form action="PHP/registro_web.php" method="post" id="form-registro-web" class="formularios">
                <div class="form-group">
                    <input required placeholder="Correo" id="correoWeb" class="form-field " name="correo" type="email" minlength="7" maxlength="40">
                    <label class="form-label" for="name">Correo Electronico</label>
                    <p class="correo-web correo-p">Este correo ya esta registrado</p>
                </div>

                <div class="form-group">
                    <input required placeholder="Password" class="form-field" name="pass" minlength="8" maxlength="32" type="password">
                    <label class="form-label" for="name">Contranseña</label>
                </div>

                <div class="form-group">
                    <input required placeholder="CI" class="form-field" id="ci" type="number" name="ci">
                    <label class="form-label" for="name">CI</label>
                </div>

                <div class="form-group">
                    <input required placeholder="Nombre" class="form-field" name="nombre" type="text" minlength="2" maxlength="20">
                    <label class="form-label" for="name">Nombre</label>
                </div>

                <div class="form-group">
                    <input required placeholder="Apellido" class="form-field" name="apellido" type="text" minlength="2" maxlength="20">
                    <label class="form-label" for="name">Apellido</label>
                </div>

                <div class="form-group">
                    <input required placeholder="Direccion" class="form-field" name="direccion" type="text" minlength="5" maxlength="20">
                    <label class="form-label" for="name">Direccion</label>
                </div>

                <div class="form-group">
                    <input required placeholder="Puerta" class="form-field" id="puerta-web" name="puerta" type="number" minlength="3" maxlength="6">
                    <label class="form-label" for="name">Nº Puerta</label>
                </div>

                <div class="form-group">
                    <input required placeholder="Postal" class="form-field" id="postal-web" name="postal" type="number" minlength="5" maxlength="5">
                    <label class="form-label" for="name">Codigo Postal</label>
                </div>

                <h4 class="h4-red"> Todos los campos son Obligatorios </h4>

                <input type="submit" value="Registrarse" name="submit_web" id="submitWeb" class="button submit-web">
            </form>
        </div>

        <!--CLIENTE EMPRESA-->
        <div class="contenedor" id="empresa">
            <form action="PHP/registro_empresa.php" method="post" id="form-registro-empresa" class="formularios">
                <div class="form-group">
                    <input required placeholder="RUT" class="form-field" type="number" name="rut" id="rut">
                    <label class="form-label" for="name">RUT</label>
                </div>

                <div class="form-group">
                    <input required placeholder="Nombre" class="form-field" type="text" name="nombre" minlength="2" maxlength="20">
                    <label class="form-label" for="name">Nombre de Empresa</label>
                </div>

                <div class="form-group">
                    <input required placeholder="Correo" id="correoEmpresa" class="form-field" type="email" name="correo" minlength="7" maxlength="40">
                    <label class="form-label" for="name">Correo Electronico</label>
                </div>

                <div class="form-group">
                    <input required placeholder="Password" class="form-field" type="password" minlength="8" maxlength="32" name="pass">
                    <label class="form-label" for="name">Password</label>
                </div>

                <div class="form-group">
                    <input required placeholder="Direccion" class="form-field" type="text" name="direccion" minlength="5" maxlength="20">
                    <label class="form-label" for="name">Direccion</label>
                </div>

                <div class="form-group">
                    <input required placeholder="Puerta" class="form-field" type="number" id="puerta-empresa" name="puerta" >
                    <label class="form-label" for="name">Nº de Puerta</label>
                </div>

                <div class="form-group">
                    <input required placeholder="Postal" class="form-field" type="number" name="postal" id="postal-empresa">
                    <label class="form-label" for="name">Codigo Postal</label>
                </div>

                <h4 class="h4-red"> Todos los campos son Obligatorios </h4>

                <input type="submit" value="Registrarse" name="submit_empresa" id="submitEmpresa" class="button">
            </form>
        </div>

        <!--HUERTAS-->
        <div class="contenedor" id="huerta">
            <form action="PHP/registro_huerta.php" method="post" id="form-registro-huerta" class="formularios">
                <div class="form-group">
                    <input required placeholder="Nombre Huerta" class="form-field" type="text" name="nombre" minlength="2" maxlength="20">
                    <label class="form-label" for="name">Nombre</label>
                </div>

                <div class="form-group">
                    <select required placeholder="Tamaño" class="form-field" name="tamaño">
                        <option value="pequeña">Pequeña</option>
                        <option value="mediana">Mediana</option>
                    </select>
                    <label class="form-label" for="name">Tamaño</label>
                </div>

                <div class="form-group">
                    <input required placeholder="Correo" id="correoHuerta" class="form-field" type="email" name="correo" minlength="7" maxlength="40">
                    <label class="form-label" for="name">Correo</label>
                </div>

                <div class="form-group">
                    <input required placeholder="Password" class="form-field" type="password" minlength="8" maxlength="32" name="password">
                    <label class="form-label" for="name">Contraseña</label>
                </div>

                <div class="form-group">
                    <input required placeholder="Password" class="form-field" type="text" name="direccion" minlength="6" maxlength="20">
                    <label class="form-label" for="name">Direccion</label>
                </div>

                <h4 class="h4-red"> Todos los campos son Obligatorios </h4>

                <input type="submit" value="Registrarse" name="submit_huerta" id="submitHuerta" class="button">
            </form>
        </div>

        <nav class="password">
            <p>¿Ya tienes una cuenta?<a class="link" href="Login.php">Inicia Sesión</a></p>
        </nav>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="../scripts/registro.js"></script>
</body>

</html>