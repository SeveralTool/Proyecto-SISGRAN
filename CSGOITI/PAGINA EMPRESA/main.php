<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

    <link rel="stylesheet" href="style.css">
    <title>GREENSOFT</title>
</head>
<body>
    <header>
        <h2 class="logo">GREENSOFT</h2>
        <input type="checkbox" id="check">
        <label for="check" class="mostrar-menu">
            &#8801
        </label>
        <nav class="menu" id="MenuResponsive">
            <a href="#">Inicio</a>
            <a href="#">Nosotros</a>
            <a href="#">Contactanos</a>
            <label  for="check" class="esconder-menu" id="xCloseMenu">
                &#215
            </label>
       </nav>
    </header>
    <section id="banner">
        <div class="contenido-banner">
            <h3><span>GREENSOFT:</span> Empresa orientada a la programación de sitios webs <br> Somos una empresa que se especializa en el diseño y la programación de sitios webs para su empresa o negocio</h3>
            <a href="#" class="boton-contacto">Contactenos</a>
        </div>
    </section>
    <div class="nuestro-equipo">
        <h3><span>NUESTRO EQUIPO DE TRABAJO</span></h3>
    </div>

    <section id="personas">
        
        <div>
            <img src="imagenes/foto camilo.jpg">
            <h4>Camilo Soca</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos, dolore.</p>
            <a href="#" class="boton-saber-mas">saber mas</a>
        </div>
        <div>
            <img src="imagenes/foto nahuel.jpg">
            <h4>Nahuel Galeano</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos, dolore.</p>
            <a href="#" class="boton-saber-mas">saber mas</a>
        </div>
        <div>
            <img src="imagenes/foto julian.jpg">
            <h4>Julian Olivera</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos, dolore.</p>
            <a href="#" class="boton-saber-mas">saber mas</a>
        </div>
        <div>
            <img src="imagenes/foto fabian.jpg">
            <h4>Fabian Cardozo</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos, dolore.</p>
            <a href="#" class="boton-saber-mas">saber mas</a>
        </div>
    </section>

    <section id="nosotros">
        <div class="contenido-nosotros">
            <div> 
                <i class="fas fa-thumbs-up fa-3x"></i>
                <h6>Clientes satisfechos</h6>
                <p>Lorem ipsum dolor sit</p>               
            </div>
            <div>
                <i class="fas fa-wrench fa-3x"></i>
                <h6>Mantenimiento 24hs</h6>
                <p>Lorem ipsum dolor sit</p>   
            </div>
            <div id="icono-escudo">
                <i class="fas fa-lock fa-3x"></i>
                <h6>Mayor seguridad ante vulnerabilidades</h6>
                <p>Lorem ipsum dolor sit</p>

            </div>
        </div>
    </section>

    <section id="contacto">
        <h4>Contacta con nosotros</h4>
        <form action="#">
            <div class="datos-form">
                <div class="nombre">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" placeholder="Nombre">
                </div>
                <div class="apellido">
                    <label for="apellido">Apellido</label>
                    <input type="text" name="apellido" id="apellido" placeholder="Apellido">
                </div>
                <div class="Email">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Email">
                </div>
            </div>
            <div class="mensaje">
            <label for="mensaje">Mensaje</label>
            <textarea name="mensaje" id="mensaje" cols="30" rows="10" placeholder="Mensaje"></textarea>
        </div>
        <div class="boton-formulario">
            <a href="#" class="boton-saber-mas">Enviar Mensaje</a>
        </div>
        </form>
    </section>

    <footer>
        <p>&copy;GREENSOFT2022</p>
    </footer>
</body>
</html>