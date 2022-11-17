//DECLARAMOS LAS VARIABLES
const BotonPedidos = document.getElementById("btn-pedidos");
const BotonClientes = document.getElementById("btn-clientes");
const BotonHuertas = document.getElementById("btn-huertas");
const VentanaClientes = document.getElementById("clientes-admin");
const VentanaPedidos = document.getElementById("pedidos-admin");
const VentanaHuertas = document.getElementById("huertas-admin");
const BotonClienteWeb = document.getElementById("btn-web");
const BotonClienteEmpresa = document.getElementById("btn-empresa");
const VentanaClienteWeb = document.getElementById("web");
const VentanaClienteEmpresa = document.getElementById("cliente-empresa");
const BotonPedidosResponsive = document.getElementById("btn-pedidos-res");
const BotonClientesResponsive = document.getElementById("btn-clientes-res");
const BotonHuertasResponsive = document.getElementById("btn-huertas-res");

//PANEL LATERAL
BotonClientes.addEventListener("click", function () {
  BotonHuertas.style.color = "white";
  BotonClientes.style.color = "red";
  BotonClientes.style.border.Bottom = "1px solid black";
  BotonPedidos.style.color = "white";
  VentanaClientes.style.display = "block";
  VentanaPedidos.style.display = "none";
  VentanaHuertas.style.display = "none";
});

BotonClientesResponsive.addEventListener("click", function () {
  BotonHuertas.style.color = "white";
  BotonClientes.style.color = "red";
  BotonClientes.style.border.Bottom = "1px solid black";
  BotonPedidos.style.color = "white";
  VentanaClientes.style.display = "block";
  VentanaPedidos.style.display = "none";
  VentanaHuertas.style.display = "none";
});

BotonPedidos.addEventListener("click", function () {
  BotonClientes.style.color = "white";
  BotonHuertas.style.color = "white";
  BotonPedidos.style.color = "red";
  VentanaClientes.style.display = "none";
  VentanaPedidos.style.display = "block";
  VentanaHuertas.style.display = "none";
});

BotonPedidosResponsive.addEventListener("click", function () {
  BotonClientes.style.color = "white";
  BotonHuertas.style.color = "white";
  BotonPedidos.style.color = "red";
  VentanaClientes.style.display = "none";
  VentanaPedidos.style.display = "block";
  VentanaHuertas.style.display = "none";
});

BotonHuertas.addEventListener("click", function () {
  BotonHuertas.style.color = "red";
  BotonClientes.style.color = "white";
  BotonPedidos.style.color = "white";
  VentanaClientes.style.display = "none";
  VentanaPedidos.style.display = "none";
  VentanaHuertas.style.display = "block";
});

BotonHuertasResponsive.addEventListener("click", function () {
  BotonHuertas.style.color = "red";
  BotonClientes.style.color = "white";
  BotonPedidos.style.color = "white";
  VentanaClientes.style.display = "none";
  VentanaPedidos.style.display = "none";
  VentanaHuertas.style.display = "block";
});

//VENTANA CLIENTES
BotonClienteWeb.addEventListener("click", function web() {
  BotonClienteWeb.style.color = "red";
  BotonClienteEmpresa.style.color = "black";
  VentanaClienteWeb.style.display = "block";
  VentanaClienteEmpresa.style.display = "none";
});

BotonClienteEmpresa.addEventListener("click", function empresa() {
  BotonClienteWeb.style.color = "black";
  BotonClienteEmpresa.style.color = "red";
  VentanaClienteWeb.style.display = "none";
  VentanaClienteEmpresa.style.display = "block";
});

/////////////////////////////////////////////////////////////////////

function obtenerClientesWeb() {
  $.ajax({
    url: "web.php",
    type: "GET",
    success: function (response) {
      let UsuariosWeb = JSON.parse(response);
      let template1 = "";
      UsuariosWeb.forEach((UsuariosWeb) => {
        template1 += `
            <div class="datos" taskid="${UsuariosWeb.nº_cliente}" taskcorreo="${UsuariosWeb.correo}">
                <p>${UsuariosWeb.nº_cliente}</p>
                <p>${UsuariosWeb.correo}</p>
                <p>${UsuariosWeb.ci}</p>
                <p>${UsuariosWeb.nombre}</p>
                <p>${UsuariosWeb.apellido}</p>
                <p>${UsuariosWeb.direccion}</p>
                <p>${UsuariosWeb.puerta}</p>
                <p>${UsuariosWeb.postal} </p>
                <p>
                <a href="#" class="a-boton-Accept" ><i class="fas fa-check-circle"></i></a>
                <a href="#" class="a-boton-Decline" ><i class="fas fa-times-circle"></i></a>
                </p>
            </div><br>
            `;
      });
      $("#cliente-web").html(template1);
    },
  });
}

$(document).on("click", ".a-boton-Accept", function () {
  let Aceptar = $(this)[0].parentElement.parentElement;
  let idAceptar = $(Aceptar).attr("taskid");
  $.post("web.php", { idAceptar }, function (response) {
    obtenerClientesWeb();
    ClientesTotales();
    ClientesTotalesWeb();
  });
});

$(document).on("click", ".a-boton-Decline", function () {
  let Decline = $(this)[0].parentElement.parentElement;
  let idDecline = $(Decline).attr("taskid");
  let CorreoDecline = $(Decline).attr("taskcorreo");
  $.post("web.php", { idDecline, CorreoDecline }, function (response) {
    obtenerClientesWeb();
    ClientesTotales();
    ClientesTotalesWeb();
  });
});

obtenerClientesWeb();

////////////////////////////////////////////////////////////////////
function obtenerClientesEmpresa() {
  $.ajax({
    url: "empresa.php",
    type: "GET",
    success: function (response) {
      let UsuariosEmpresa = JSON.parse(response);
      let template2 = "";
      UsuariosEmpresa.forEach((UsuariosEmpresa) => {
        template2 += `
            <div class="datos-empresa" taskid="${UsuariosEmpresa.nº_cliente}" taskcorreo="${UsuariosEmpresa.correo}">
                <p>${UsuariosEmpresa.nº_cliente}</p>
                <p>${UsuariosEmpresa.correo}</p>
                <p>${UsuariosEmpresa.rut}</p>
                <p>${UsuariosEmpresa.nombre}</p>
                <p>${UsuariosEmpresa.direccion}</p>
                <p>${UsuariosEmpresa.puerta}</p>
                <p>${UsuariosEmpresa.postal} </p>
                <p>
                <a href="#" class="a-boton-Accept-Empresa a-boton-Accept" ><i class="fas fa-check-circle"></i></a>
                <a href="#" class="a-boton-Decline-Empresa a-boton-Decline" ><i class="fas fa-times-circle"></i></a>
                </p>
            </div><br>
            `;
      });
      $("#datos-empresa").html(template2);
    },
  });
}

$(document).on("click", ".a-boton-Accept-Empresa", function () {
  let Aceptar2 = $(this)[0].parentElement.parentElement;
  let idAceptar2 = $(Aceptar2).attr("taskid");
  $.post("empresa.php", { idAceptar2 }, function (response) {
    obtenerClientesEmpresa();
    ClientesTotales();
    ClientesTotalesEmpresa();
  });
});

$(document).on("click", ".a-boton-Decline-Empresa", function () {
  let Decline2 = $(this)[0].parentElement.parentElement;
  let idDecline2 = $(Decline2).attr("taskid");
  let CorreoDecline2 = $(Decline2).attr("taskcorreo");
  $.post("empresa.php", { idDecline2, CorreoDecline2 }, function (response) {
    obtenerClientesEmpresa();
    ClientesTotales();
    ClientesTotalesEmpresa();
  });
});
obtenerClientesEmpresa();
////////////////////////////////////////////////////////
function obtenerHuertas() {
  $.ajax({
    url: "huertas.php",
    type: "GET",
    success: function (response) {
      let Huertas = JSON.parse(response);
      let template3 = "";
      Huertas.forEach((Huertas) => {
        template3 += `
            <div class="datos-huertas" taskid="${Huertas.id_huerta}" taskcorreo="${Huertas.correo}">
                <p>${Huertas.id_huerta}</p>
                <p>${Huertas.nombre}</p>
                <p>${Huertas.tamaño}</p>
                <p>${Huertas.correo}</p>
                <p>${Huertas.direccion}</p>
                <p>
                <a href="#" class="a-boton-Accept-Huerta a-boton-Accept" ><i class="fas fa-check-circle"></i></a>
                <a href="#" class="a-boton-Decline-Huerta a-boton-Decline" ><i class="fas fa-times-circle"></i></a>
                </p>
            </div><br>
            `;
      });
      $("#datos-huertas").html(template3);
    },
  });
}
/////////////////////////////
function ClientesTotales() {
  $.ajax({
    url: "updates.php",
    type: "GET",
    dataType: "text",
    data: "total",
    success: function (total) {
      let clientesTotales = JSON.parse(total);
      $("#clientestotales").html("Clientes totales" + " " + clientesTotales);
    },
  });
}
ClientesTotales();
///////////////////////////////
function ClientesTotalesWeb() {
  $.ajax({
    url: "updates.php",
    type: "GET",
    dataType: "text",
    data: "total2",
    success: function (total2) {
      let clientesTotalesWeb = JSON.parse(total2);
      $("#clientestotalesweb").html("Clientes Web" + " " + clientesTotalesWeb);
    },
  });
}
ClientesTotalesWeb();
//////////////////////////////
function ClientesTotalesEmpresa() {
  $.ajax({
    url: "updates.php",
    type: "GET",
    dataType: "text",
    data: "total3",
    success: function (total3) {
      let clientesTotalesEmpresa = JSON.parse(total3);
      $("#clientestotalesempresa").html(
        "Clientes Empresa" + " " + clientesTotalesEmpresa
      );
    },
  });
}
ClientesTotalesEmpresa();
///////////////////////////////
function HuertasTotales() {
  $.ajax({
    url: "updates.php",
    type: "GET",
    dataType: "text",
    data: "total4",
    success: function (total4) {
      let huertastotales = JSON.parse(total4);
      $("#totalhuertas").html("Huertas Totales" + " " + huertastotales);
    },
  });
}
HuertasTotales();
////////////////////////////
$(document).on("click", ".a-boton-Accept-Huerta", function () {
  let Aceptar3 = $(this)[0].parentElement.parentElement;
  let idAceptar3 = $(Aceptar3).attr("taskid");
  $.post("huertas.php", { idAceptar3 }, function (response) {
    obtenerHuertas();
    HuertasTotales();
  });
});

$(document).on("click", ".a-boton-Decline-Huerta", function () {
  let Decline3 = $(this)[0].parentElement.parentElement;
  let idDecline3 = $(Decline3).attr("taskid");
  let CorreoDecline3 = $(Decline3).attr("taskcorreo");
  $.post("huertas.php", { idDecline3, CorreoDecline3 }, function (response) {
    obtenerHuertas();
    HuertasTotales();
  });
});
obtenerHuertas();

// TRAER TODOS LOS PEDIDOS PENDIENTES DE ARMAR

function TraerPedidos() {
  $.ajax({
    url: "pedidos.php",
    type: "GET",
    success: function (response) {
      if (response == "null") {
        $("#PEDIDOS").html("Sin pedidos para armar");
      } else {
        let Pedidos = JSON.parse(response);
        let template5 = "";
        let template6 = "";
        Pedidos.forEach((Pedidos) => {
          template5 += `
        <div class="datos-pedidos">
            <p>${Pedidos.nº_pedido}</p>
            <p>${Pedidos.nº_cliente}</p>
            <p><span value="${Pedidos.nº_pedido}" class="view-items">Ver Productos</span></p>
            <p>${Pedidos.realizado}</p>
            <p>${Pedidos.entrega} de ${Pedidos.horario}</p>
            <p>$${Pedidos.total}</p>
            <button class="btn-armar" cliente="${Pedidos.nº_cliente}" pedido="${Pedidos.nº_pedido}"><i class="fab fa-dropbox"></i>Preparar</button>
        </div>
        `;
        });
        $("#PEDIDOS").html(template5);
      }
    },
  });
}
TraerPedidos();

//MOSTRAR PRODUCTOS DE CADA PEDIDO
const WindowsItems = document.getElementById("items-container");

$(document).on("click", ".view-items", function () {
  let pedido = $(this).attr("value");
  $.post("items.php", { pedido }, function (response) {
    let items = JSON.parse(response);
    let template7 = "";
    items.forEach((items) => {
      template7 += `
                <img src="../../../${items.foto}">
                <p>${items.vegetal}  ${items.variedad}</p>
                <p>x${items.cantidad}</p>
            `;
    });
    $(".items-box").html(template7);
  });
  WindowsItems.style.display = "flex";
});

$(document).on("click", "#items-close", function () {
  WindowsItems.style.display = "none";
});

//ARMAR PEDIDO

$(document).on("click", ".btn-armar", function () {
  let pedidoArmado = $(this).attr('pedido');
  let cliente = $(this).attr('cliente');
  $.post("pedidos.php", { pedidoArmado, cliente }, function (response) {
    TraerPedidos();
  });
});
