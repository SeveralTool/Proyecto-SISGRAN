const BotonCarrito = document.getElementById("btn-carrito");
const VentanaCarrito = document.getElementById("ventana-carrito");
const BotonCerrarCarrito = document.getElementById("btn-cerrar-carrito");
const BtnMostrarEnvio = document.querySelector(".ir-envio");
const VentanaEnvio = document.querySelector(".envio-container");
const BtnCerrarEnvio = document.getElementById("btn-cerrar-envio");

if (BotonCarrito == undefined) {
} else {
  BtnCerrarEnvio.addEventListener("click", function () {
    VentanaEnvio.style.display = "none";
    VentanaCarrito.style.display = "block";
  });

  BtnMostrarEnvio.addEventListener("click", function () {
    if (
      $(".cantidadEnCarrito").val() == 0 ||
      $(".cantidadEnCarrito").val() == null
    ) {
    } else {
      VentanaCarrito.style.display = "none";
      VentanaEnvio.style.display = "block";
    }
  });

  BotonCarrito.addEventListener("click", function () {
    BotonCarrito.style.display = "none";
    VentanaCarrito.style.display = "block";
  });

  BotonCerrarCarrito.addEventListener("click", function () {
    VentanaCarrito.style.display = "none";
    BotonCarrito.style.display = "block";
  });
}

//NUMERO DE PEDIDOS EN CARRITO

function cantEnCarrito() {
  $.ajax({
    url: "carrito/cantEnCarrito.php",
    type: "POST",
    dataType: "text",
    date: "cantproductos",
    success: function (cantproductos) {
      if (cantproductos === "sin" || cantproductos == undefined) {
        $(".cantidadEnCarrito").html("0");
        $(".cantidadEnCarrito").val(0);
      } else {
        $("#btn-carrito").show();
        let cantidadP = JSON.parse(cantproductos);
        $(".cantidadEnCarrito").html(cantidadP);
        $(".cantidadEnCarrito").val(cantidadP);
      }
    },
  });
}
cantEnCarrito();

//TRAER LOS PRODUCTOS ALA PANTALLA DEL CARRITO

function enCarrito() {
  $.ajax({
    url: "carrito/carrito.php",
    type: "POST",
    dateType: "text" + "number",
    date: "Carrito",
    success: function (Carrito) {
      if (Carrito == "sin") {
        $(".box-enCarrito").html("Carrito Vacio");
      } else {
        let enCarrito = JSON.parse(Carrito);
        let template = "";
        enCarrito.forEach((enCarrito) => {
          template += `
                    <div class="productos">
                        <div class="box-img-carrito" >
                            <img src="${enCarrito.foto}">
                        </div>
                        <p class="producto-carrito">${enCarrito.vegetal} ${enCarrito.variedad}</p>
                        <p class="nombre-vegetal-carrito">x${enCarrito.cantidad} </p>
                        <a class="eliminarDeCarrito" idVegetal="${enCarrito.idVegetal}" idVariedad="${enCarrito.idVariedad}"><i class="fas fa-times-circle"></i></a>
                    </div>
                    `;
        });
        $(".box-enCarrito").html(template);
      }
    },
  });
}
enCarrito();

//TRAER PRECIO TOTAL DEL PEDIDO EN CARRITO
function precioTotal() {
  $.ajax({
    url: "carrito/montoCarrito.php",
    type: "POST",
    dateType: "text",
    date: "total",
    success: function (total) {
      if (total == "null") {
        $(".precioTotalPedido").html("0");
      } else {
        let montoTotal = JSON.parse(total);
        $(".precioTotalPedido").html(montoTotal);
      }
    },
  });
}
precioTotal();

// AGREGAR PRODUCTOS AL CARRITO
$(document).on("click", ".agregarCarrito", function () {
  let agregar = $(this);
  let idVegetalalCarrito = $(agregar).attr("Vegetal");
  let idVariedadalCarrito = $(agregar).attr("Variedad");
  let precioalCarrito = $(agregar).attr("precio");
  let stock = Number($(agregar).attr("stock"));
  let cantidadalCarrito = $(this)[0].parentElement.parentElement;
  let CantidadtotalalCarrito = Number($(cantidadalCarrito).find("input").val());
  let precioTotalalCarrito = precioalCarrito * CantidadtotalalCarrito;
  let limite = $(this)[0].parentElement.parentElement;
  let lim = $(limite).find("p.LIMITE").val("");
  let ok = 1;
  let che = $(this)[0].parentElement.parentElement
  var check = $(che).find("i");
  $.post("carrito/ver-session.php", { ok }, (response11) => {
    if (response11 == "no") {
      $(lim).html("Debes Logearte para comprar");
      setTimeout(() => {
        $(lim).html("");
      }, 5000);
    } else {
      if (CantidadtotalalCarrito > stock || CantidadtotalalCarrito <= 0) {
        $(lim).html("No hay ese stock disponible");
        setTimeout(() => {
          $(lim).html("");
        }, 3000);
      } else {
        if (Number.isInteger(CantidadtotalalCarrito)) {
          $.post(
            "carrito/verificarStock.php",
            { idVariedadalCarrito },
            function (res) {
              let cant = JSON.parse(res);
              if (
                res == "null" ||
                cant + Number(CantidadtotalalCarrito) <= stock
              ) {
                $.post(
                  "carrito/addcarrito.php",
                  {
                    idVegetalalCarrito,
                    idVariedadalCarrito,
                    CantidadtotalalCarrito,
                    stock,
                    precioalCarrito,
                    precioTotalalCarrito,
                  },
                  function (response) {
                    $(agregar).html('<i class="far fa-check-circle check-producto"></i>')
                    setTimeout(() => {
                      $(agregar).html("AÑADIR")
                    }, 2000);
                    enCarrito();
                    cantEnCarrito();
                    precioTotal();
                    if (response > 10) {
                      $(lim).html("No hay ese stock disponible");
                      setTimeout(() => {
                        $(lim).html("");
                      }, 4000);
                    }
                  }
                );
              } else {
                $(lim).html("Cantidad MAX alcanzada");
                setTimeout(() => {
                  $(lim).html("");
                }, 4000);
              }
              /*console.log("holaaaaa")
        if(('.agregarCarrito').attr('noLogin') == 3){
            $(lim).html("Debes logearte para comprar")
        */
            }
          );
        } else {
          $(lim).html("Formato de cantidad invalida");
          setTimeout(() => {
            $(lim).html("");
          }, 3000);
        }
      }
    }
  });
});
//ELIMINAMOS PRODUCTOS DEL CARRITO
$(document).on("click", ".eliminarDeCarrito", function () {
  let delete2 = $(this);
  let IdVegetal = $(delete2).attr("idVegetal");
  let IdVariedad = $(delete2).attr("idVariedad");
  $.post("carrito/carrito.php", { IdVegetal, IdVariedad }, function (response) {
    enCarrito();
    cantEnCarrito();
    precioTotal();
  });
});
