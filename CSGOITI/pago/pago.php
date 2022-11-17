<?php
include("../Login/PHP/conexion_bd.php");
include("../Login/PHP/sesion.php");
session_start();
$IDUSER = $_SESSION['ID'];
$rol = $_SESSION['ROL'];
//CONSULTAS PARA LA FACTURA FINAL

if ($rol === "rol_empresa") {
  $consultaEmpresa = "SELECT cliente.direccion, cliente.puerta, cliente.postal, cliente_empresa.rut, cliente_empresa.nombre, cliente.rol_cliente
    FROM cliente, cliente_empresa WHERE cliente.nº_cliente = '$IDUSER' AND cliente_empresa.nº_cliente = '$IDUSER';";
  $res1 = mysqli_query($conexion, $consultaEmpresa);
  $row1 = mysqli_fetch_array($res1);
} else {
  $consultaWeb = "SELECT cliente.direccion, cliente.puerta, cliente.postal, cliente_web.ci, cliente_web.nombre, cliente.rol_cliente
    FROM cliente, cliente_web WHERE cliente.nº_cliente = '$IDUSER' AND cliente_web.nº_cliente = '$IDUSER';";
  $res2 = mysqli_query($conexion, $consultaWeb);
  $row2 = mysqli_fetch_array($res2);
}
//
$consulta3 = "SELECT pedido.nº_pedido FROM pedido WHERE pedido.nº_pedido = (SELECT MAX(pedido.nº_pedido) FROM pedido) AND pedido.nº_cliente = '$IDUSER';";
$res3 = mysqli_query($conexion, $consulta3);
$row3 = mysqli_fetch_array($res3);
$pedido = $row3['nº_pedido'];
//
$consulta4 = "SELECT detalle.cantidad, detalle.precio_subtotal, variedad.nombre_variedad, vegetal.nombre_vegetal
FROM variedad, vegetal, detalle
WHERE detalle.id_vegetal = variedad.id_vegetal AND detalle.id_variedad = variedad.id_variedad AND detalle.nº_cliente = '$IDUSER' AND detalle.nº_pedido = '$pedido' AND variedad.id_vegetal = vegetal.id_vegetal;";
$res4 = mysqli_query($conexion, $consulta4);
//
$consulta5 = "SELECT pedido.precio_total FROM pedido WHERE pedido.nº_pedido = '$pedido' AND pedido.nº_cliente = '$IDUSER';";
$res5 = mysqli_query($conexion, $consulta5);
$row5 = mysqli_fetch_array($res5);
$total = $row5['precio_total'];
$Descuento = $total * 22 / 100;
$total2 = $total - $Descuento;

if (isset($_SESSION['ID'])) {
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <link rel="stylesheet" href="../CSS/pago.css">
  </head>

  <body>



    <div class="parent">
      <div class="div1">
        Nº Cliente: <?php echo $IDUSER; ?> <br>
        Nº Pedido: <?php echo $pedido; ?> <br>
        Fecha: <?php echo date('Y-m-d') ?> <br> <br>
      </div> <br>
      <div class="div2">
        <p>Nombre</p>
        <p>CI / RUT</p>
        <p>Direccion</p>
        <p>Postal</p>
        <p>Cliente</p>
      </div>
      <div class="div3">
        <p><?php if ($rol === "rol_empresa") {
              echo $row1['nombre'];
            } else {
              echo $row2['nombre'];
            }  ?></p>
        <p><?php if ($rol === "rol_empresa") {
              echo $row1['rut'];
            } else {
              echo $row2['ci'];
            }  ?></p>
        <p style="color: red;"><?php if ($rol === "rol_empresa") {
                                  echo $row1['direccion'] . " " . $row1['puerta'];
                                } else {
                                  echo $row2['direccion'] . " " . $row2['puerta'];
                                }  ?></p>
        <p><?php if ($rol === "rol_empresa") {
              echo $row1['postal'];
            } else {
              echo $row2['postal'];
            }  ?></p>
        <p><?php if ($rol === "rol_empresa") {
              echo $row1['rol_cliente'];
            } else {
              echo $row2['rol_cliente'];
            }  ?></p>
      </div>
      <div class="div4">
        <p>Nº Pedido</p>
        <p>Descripcion</p>
        <p>Cantidad</p>
        <p>Precio</p>
        <p>Descuento</p>
      </div>
      <div class="div5">
        <p><?php echo $pedido; ?></p>
        <div class="datos">
          <?php while ($row4 = mysqli_fetch_array($res4)) { ?>
            <p><?php echo $row4['nombre_vegetal'] . " " . $row4['nombre_variedad'] . "</br>"; ?></p>
            <p><?php echo "x" . $row4['cantidad'] . "</br>";  ?></p>
            <p> <?php echo $row4['precio_subtotal'] . ".00"; ?></p>
            <p><?php if ($rol === "rol_empresa") {
                  echo "22%";
                } else {
                  echo "0.00";
                } ?></p>
          <?php } ?>
        </div><br> <br> <br> <br> <br> <br> <br> <br> <br>
      </div>
      <div class="div6">
        <p>Total a pagar: <span id="tot-pago-factura"> <?php if ($_SESSION['ROL'] === "rol_empresa") {
                            echo "$" . $total2;
                          } else {
                            echo "$" . $total;
                          }; ?></span></p>
        <p>Metodo de Pago: PayPal</p>
        <p>SISGRAN || Montevideo, Uruguay</p>
      </div>
      <div class="div7"> <img src="../Imagenes/Logo sisgran.png" alt=""></div>
      <div class="div8">
        <div class="sub1"><img src="https://storage.googleapis.com/support-forums-api/attachment/thread-13090132-506909745012483037.png" alt=""></div>
        <div class="sub2">
          <p>Codigo de seguridad: MFP9enIG0451Npgo</p>
          <p>IVA al dia</p>
          <p>CAE: 94232235</p>
        </div>
      </div>
    </div>

    <div id="smart-button-container">
      <div style="text-align: center;">
        <div id="paypal-button-container"></div>
      </div>
    </div>
    <script src="https://www.paypal.com/sdk/js?client-id=sb&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>
    <script>
      function initPayPalButton() {
        paypal.Buttons({
          style: {
            shape: 'rect',
            color: 'gold',
            layout: 'horizontal',
            label: 'pay',

          },

          createOrder: function(data, actions) {
            return actions.order.create({
              purchase_units: [{
                "amount": {
                  "currency_code": "USD",
                  "value": 0
                }
              }]
            });
          },

          onApprove: function(data, actions) {
            return actions.order.capture().then(function(orderData) {

              // Full available details
              console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

              // Show a success message within this page, e.g.
              const element = document.getElementById('paypal-button-container');
              element.innerHTML = '';
              element.innerHTML = '<h3>Thank you for your payment!</h3>';


            });
          },

          onError: function(err) {
            console.log(err);
            //COLOCAMOS LA VERIFICACION DE LA COMPRA EN EL ERROR YA QUE NO SE EJECUTARA LA COMPRA POR MEDIO DE PAYPAL PORQUE EL MONTO ES $0
            //YA QUE EL MONTO EL 0, POR LO CUAL PAYPAL LANZA EL ERROR
            let ver = 1;
            let restar = 2;

            $.post('validarPago.php', {
              ver
            }, function(response) {
              console.log(response)
              let succes = document.getElementById('window-succes')
              succes.style.display = "flex"
            })

            setTimeout(() => {
              window.location = "../main.php"
            }, 5000)


          }

        }).render('#paypal-button-container');
      }
      initPayPalButton();
    </script> <br> <br>
    <div class="boton"><a href="../Catalogo.php"><button>Cancelar y Volver</button></a></div>
    <div id="window-succes">
      <!--AQUI SE VE EL MENSAJE AL VALIDARSE LA COMPRA-->
      <div class="succes">
        <p><i class="far fa-check-circle" id="icono-succes"></i></p>
        <p>¡ GRACIAS POR SU COMPRA ! <br>
          Su pedido esta siendo precesado, en el panel de control podrá ver su estado. <br>
          ¡ Coma sano con SISGRAN !
        </p>
        <p></p>
        <p id="load"></p>
      </div>
    </div>
  </body>


  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="../scripts/pago.js"></script>

  </html>

<?php } else {
  echo "Inicie session";
} ?>