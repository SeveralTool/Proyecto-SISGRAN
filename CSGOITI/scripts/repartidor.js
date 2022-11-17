function get() {
  $.ajax({
    url: "pedidos.php",
    type: "GET",
    dateType: "text",
    success: function get(response) {
      if (response == "null") {
        $(".pedidos-container").html("Sin Pedidos Armados para entregar HOY");
        $(".pedidos-container").css("color","grey");
        $(".sub-titles").css("display", "none");
      } else {
        let pedidos = JSON.parse(response);
        let template = "";
        let templateRes = "";
        pedidos.forEach((pedidos) => {
          template += `
  <div class="pedido">
      <div class="p-info">
          <p>${pedidos.pedido}</p>
          <p>${pedidos.fecha}</p>
          <p>${pedidos.hora}</p>
          <p>$${pedidos.precio}</p>
          <p>${pedidos.direccion}</p>
          <p>${pedidos.puerta}</p>
          <p>${pedidos.postal}</p>
          <button class="btn-pedido" cliente="${pedidos.cliente}" pedido="${pedidos.pedido}">TOMAR PEDIDO</button>
      </div>

  </div>
  `;
          templateRes += `
      <div class="pedido">
              <div class="p-info">
                  <p>Nº de Pedido: ${pedidos.pedido}</p>
                  <p>Fecha de Entrega: ${pedidos.fecha}</p>
                  <p>Horario de Entrega: ${pedidos.hora}</p>
                  <p>Total del Pedido: $${pedidos.precio}</p>
                  <p>Dirección: ${pedidos.direccion}</p>
                  <p>Nº de Puerta: ${pedidos.puerta}</p>
                  <p>Postal: ${pedidos.postal}</p>
                  <button class="btn-pedido" cliente="${pedidos.cliente}" pedido="${pedidos.pedido}">TOMAR PEDIDO</button>
              </div>

          </div>
      `;
        });
        function setPedidos() {
          widthStart = window.innerWidth;
          if (widthStart >= "500") {
            $(".pedidos-container").html(template);
          } else {
            $(".pedidos-container").html(templateRes);
          }
        }
        setPedidos();
        window.onresize = function set() {
          let width = window.innerWidth;
          if (width >= 500) {
            $(".pedidos-container").html(template);
          } else {
            $(".pedidos-container").html(templateRes);
          }
        };
      }
    },
  });
}
get();
//TOMAR UN PEDIDO
$(document).on("click", ".btn-pedido", function () {
  let pedido = $(this).attr("pedido");
  let cliente = $(this).attr("cliente");
  $.post("direccion.php", { pedido, cliente }, function (response) {
    if (response == "null") {
    } else {
      let direccion = JSON.parse(response);
      let template2 = "";
      let template3 = "";
      template2 += `
      <iframe  id="gmap_canvas" src="https://maps.google.com/maps?q=${direccion[0].direccion}%20${direccion[0].puerta}&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0"></iframe>
      `;
      template3 += `
          <div id="datos">
              <p>Se entrega en </br> ${direccion[0].direccion} ${direccion[0].puerta}</p>
              <p>Fecha y horario </br> El ${direccion[0].fecha} desde ${direccion[0].hora}hs</p>
          </div>
          <div id="btns">
              <button pedido="${pedido}" class="btn-map" id="entregado">ENTREGADO</button>
              <button pedido="${pedido}" cliente="${direccion[0].cliente}" class="btn-map" id="noEntregado">NO ENTREGADO</button>
              <div id="nombre">
              <input type="text" id="nombre-receptor" placeholder="Nombre del receptor">
              <i class="fas fa-check" cliente="${direccion[0].cliente}" pedido="${pedido}" id="entregar"></i>
              </div>
          </div>
      
      `;
      $("#mapa-container").css("display", "block");
      $("#mapa").html(template2);
      $("#info-mapa").html(template3);
      get();
    }
  });
});
/*
$(document).on("click", "#close-map", function () {
  $("#mapa-container").css("display", "none");
  let closePedido = $(this).attr("pedido");
  $.post("direccion.php", { closePedido }, function () {
    get();
  });
});
*/
$(document).on("click", "#entregado", function () {
  $(".btn-map").css("display", "none");
  $("#nombre").css("display", "flex");
});

$(document).on("click", "#entregar", function () {
  let pedido3 = $(this).attr("pedido");
  let cliente3 = $(this).attr("cliente");
  let nombre = $("#nombre-receptor").val();
  if (nombre.length <= 1 || nombre.length >= 20) {
    $("#nombre-receptor").css("border", "1px solid red");
    setTimeout(() => {
      $("#nombre-receptor").css("border", "0px solid red");
    }, 5000);
  } else {
    $.post("direccion.php", { pedido3, cliente3 }, function (response) {
      console.log(response);
      $("#mapa-container").css("display", "none");
      $("#EndPedido").css("display", "flex");
      setTimeout(() => {
        $("#EndPedido").css("display", "none");
      }, 4000);
    });
  }
  get();
});

$(document).on("click", "#noEntregado", function () {
  let notPedido = $(this).attr("pedido");
  let notCliente = $(this).attr("cliente");
  $.post("direccion.php", { notPedido, notCliente }, function (response) {
    console.log(response);
    $("#mapa-container").css("display", "none");
    $("#notPedido").css("display", "flex");
    setTimeout(() => {
      $("#notPedido").css("display", "none");
    }, 4000);
  });
  get();
});
