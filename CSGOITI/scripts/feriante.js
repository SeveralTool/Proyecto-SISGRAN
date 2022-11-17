const WindowsVentas = document.getElementById("ventas-container");
const WindowsMisVentas = document.getElementById("misVentas-container");
const Ventas = document.getElementById("btn-ventas");
const MisVentas = document.getElementById("btn-misVentas");
const VentasResponsive = document.getElementById("btn-ventas-res");
const MisVentasResponsive = document.getElementById("btn-misVentas-res");

Ventas.addEventListener("click", function () {
  WindowsMisVentas.style.display = "none";
  WindowsVentas.style.display = "block";
});

MisVentas.addEventListener("click", function () {
  WindowsMisVentas.style.display = "block";
  WindowsVentas.style.display = "none";
});

VentasResponsive.addEventListener("click", function () {
  WindowsMisVentas.style.display = "none";
  WindowsVentas.style.display = "block";
});

MisVentasResponsive.addEventListener("click", function () {
  WindowsMisVentas.style.display = "block";
  WindowsVentas.style.display = "none";
});

//TRAER VARIEDADES DEL VEGETAL SELECCIONADO
var COMPRA = 0;
$(document).on("click", "#vegetal", function () {
  let vegetal = $(this).val();

  if (vegetal != 0) {
    $.post("updates.php", { vegetal }, function (response) {
      let variedad = JSON.parse(response);
      let template = "";
      variedad.forEach((variedad) => {
        template += `<option value="${variedad.id}">${variedad.nombre} | <b> $${variedad.precio}</b> c/${variedad.unidad}</option>    `;
      });
      mostrarImg();

      $("#variedad").html(template);
      $("#stock").html("");
    });
  } else {
    let template3 = "";
    template3 += `<option value="0" selected>Seleccione un Vegetal</option>`;
    $("#variedad").html(template3);
    $("#imagen-producto").html("");
    $("#stock").html("");
  }
});
///////////////
function mostrarImg() {
  let fotoVegetal = $("#vegetal").val();
  $.post("updates.php", { fotoVegetal }, function (response) {
    let ruta = JSON.parse(response);
    let template5 = "";
    ruta.forEach((ruta) => {
      template5 += `<img src="../../../${ruta.ruta}" id="foto-vegetal">`;
    });
    $("#imagen-producto").html(template5);
  });
}
///////////////
$(document).on("click", "#variedad", function () {
  let vegetal = $("#vegetal").val();
  if (vegetal != 0) {
    let variedad = $(this).val();
    $.post("updates.php", { variedad }, function (response) {
      let info = JSON.parse(response);
      let precio = "";
      let stock = "";
      info.forEach((info) => {
        precio += `${info.precio}`;
      });
      info.forEach((info) => {
        stock += `${info.stock}`;
      });
      $("#stock").html("Disponibles: " + stock);
      $("#stock").attr("value", +stock);
      $("#cantidad").attr("max", +stock);
      $("#variedad").attr("precio", +precio);
    });
  } else {
    $("#vegetal").css("border", "2px solid red");
    setTimeout(() => {
      $("#vegetal").css("border", "1px solid black");
    }, 4000);
  }
});
/////////////////////////

/////////////////
$(document).on("click", "#enviar-compra", function () {
  let vegetalF = $("#vegetal").val();
  let variedadF = $("#variedad").val();
  let cantidad = Number($("#cantidad").val());
  let stock = Number($("#stock").attr("value"));
  if (vegetalF == 0) {
    $("#vegetal").css("border", "2px solid red");
    setTimeout(() => {
      $("#vegetal").css("border", "2px solid black");
    }, 3000);
  } else if (variedadF == 0) {
    $("#variedad").css("border", "2px solid red");
    setTimeout(() => {
      $("#variedad").css("border", "2px solid black");
    }, 3000);
  } else if (cantidad > stock || cantidad <= 0 || cantidad.length == 0 || ! Number.isInteger(cantidad)) {
    $("#cantidad").css("border", "2px solid red");
    $("#stock").css("color", "red");
    setTimeout(() => {
      $("#cantidad").css("border", "none");
      $("#stock").css("color", "black");
    }, 3000);
  } else {
    let stockUpdate = stock - cantidad;
    $.post(
      "updates.php",
      { vegetalF, variedadF, cantidad, stockUpdate },
      function (response) {
        $("#stock").html("Disponibles: " + stockUpdate);
        $("#stock").attr("value", +stockUpdate);
      }
    );
    let precio = $("#variedad").attr("precio");
    COMPRA = COMPRA + cantidad * precio;
    $("#precio-total").html("$" + COMPRA);
    $("#precio-total").attr("total", +COMPRA);
    misVentas();
  }
});
//////////////////

$("#monto").keyup(function () {
  let monto = $(this).val();
  let compra = $("#precio-total").attr("total");
  let vuelto = monto - compra;
  $("#cambio").html("$" + vuelto);
});
/////////////////////////

$(document).on("click", "#end-compra", function () {
  $("#cambio").html("$0");
  $("#precio-total").html("$0");
  $("#monto").val("");
  $("#vegetal").val(0);
  $("#variedad").val(0);
  $("#stock").html("");
  COMPRA = 0;
  misVentas();
});
///////////////////HISTORIAL DE VENTAS

function misVentas() {
  $.ajax({
    url: "ventas.php",
    type: "GET",
    dateType: "text",
    success: function (response) {
      if (response == "null") {
      } else {
        let ventas = JSON.parse(response);
        let productos = "";
        ventas.forEach((ventas) => {
          productos += `
                  <div class="prod">
                      <p class="foto"><img src="../../../${ventas.foto}"></p>
                      <p class="nombre">${ventas.vegetal} ${ventas.variedad}</p>
                  </div>
                  <div><p class="cantidad">x${ventas.cantidad}</p></div>
                  <div><p class="unidad">${ventas.unidad}</p></div>
              `;
        });
        $("#PRODUCTOS").html(productos);
      }
    },
  });
}
misVentas();
