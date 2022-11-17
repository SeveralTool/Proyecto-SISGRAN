//DECLARAMOS LAS VARIABLES
const BotonPedidos = document.getElementById("btn-pedidos");
const BotonProduccion = document.getElementById("btn-produccion");
const BotonHuertas = document.getElementById("btn-huertas");
const BotonStats = document.getElementById("btn-stats");
const BotonMetas = document.getElementById("btn-metas");
const BotonPedidosResponsive = document.getElementById("btn-pedidos-res");
const BotonProduccionResponsive = document.getElementById("btn-produccion-res");
const BotonHuertasResponsive = document.getElementById("btn-huertas-res");
const BotonStartsResponsive = document.getElementById("btn-stats-res");
const BotonMetasResponsive = document.getElementById("btn-metas-res");
const VentanaPedidos = document.getElementById("pedidos-directivo");
const VentanaProduccion = document.getElementById("produccion-directivo");
const VentanaHuertas = document.getElementById("huertas-directivo");
const VentanaStats = document.getElementById("stats-directivo");
const VentanaMetas = document.getElementById("metas-directivo");
const body = document.querySelector("body");

//PANEL LATERAL

BotonPedidos.addEventListener(
  "click",
  function () {
    BotonPedidos.style.color = "red";
    BotonProduccion.style.color = "white";
    BotonHuertas.style.color = "white";
    BotonStats.style.color = "white";
    BotonMetas.style.color = "white";
    VentanaPedidos.style.display = "block";
    VentanaProduccion.style.display = "none";
    VentanaHuertas.style.display = "none";
    VentanaStats.style.display = "none";
    VentanaMetas.style.display = "none";
    body.style.backgroundColor = "white";
  },
  1000
);

BotonPedidosResponsive.addEventListener(
  "click",
  function () {
    BotonPedidosResponsive.style.color = "red";
    BotonProduccionResponsive.style.color = "white";
    BotonHuertasResponsive.style.color = "white";
    BotonStartsResponsive.style.color = "white";
    BotonMetasResponsive.style.color = "white";
    VentanaPedidos.style.display = "block";
    VentanaProduccion.style.display = "none";
    VentanaHuertas.style.display = "none";
    VentanaStats.style.display = "none";
    VentanaMetas.style.display = "none";
    body.style.backgroundColor = "white";
  },
  1000
);

BotonProduccion.addEventListener(
  "click",
  function () {
    BotonPedidos.style.color = "white";
    BotonProduccion.style.color = "red";
    BotonHuertas.style.color = "white";
    BotonStats.style.color = "white";
    BotonMetas.style.color = "white";
    VentanaPedidos.style.display = "none";
    VentanaProduccion.style.display = "block";
    VentanaHuertas.style.display = "none";
    VentanaStats.style.display = "none";
    VentanaMetas.style.display = "none";
    body.style.backgroundColor = "white";
  },
  1000
);

BotonProduccionResponsive.addEventListener(
  "click",
  function () {
    BotonPedidosResponsive.style.color = "white";
    BotonProduccionResponsive.style.color = "red";
    BotonHuertasResponsive.style.color = "white";
    BotonStartsResponsive.style.color = "white";
    BotonMetasResponsive.style.color = "white";
    VentanaPedidos.style.display = "none";
    VentanaProduccion.style.display = "block";
    VentanaHuertas.style.display = "none";
    VentanaStats.style.display = "none";
    VentanaMetas.style.display = "none";
    body.style.backgroundColor = "white";
  },
  1000
);

BotonHuertas.addEventListener(
  "click",
  function () {
    BotonPedidos.style.color = "white";
    BotonProduccion.style.color = "white";
    BotonHuertas.style.color = "red";
    BotonStats.style.color = "white";
    BotonMetas.style.color = "white";
    VentanaPedidos.style.display = "none";
    VentanaProduccion.style.display = "none";
    VentanaHuertas.style.display = "block";
    VentanaStats.style.display = "none";
    VentanaMetas.style.display = "none";
    body.style.backgroundColor = "white";
  },
  1000
);

BotonHuertasResponsive.addEventListener(
  "click",
  function () {
    BotonPedidosResponsive.style.color = "white";
    BotonProduccionResponsive.style.color = "white";
    BotonHuertasResponsive.style.color = "red";
    BotonStartsResponsive.style.color = "white";
    BotonMetasResponsive.style.color = "white";
    VentanaPedidos.style.display = "none";
    VentanaProduccion.style.display = "none";
    VentanaHuertas.style.display = "block";
    VentanaStats.style.display = "none";
    VentanaMetas.style.display = "none";
    body.style.backgroundColor = "white";
  },
  1000
);

BotonStats.addEventListener(
  "click",
  function () {
    BotonPedidos.style.color = "white";
    BotonProduccion.style.color = "white";
    BotonHuertas.style.color = "white";
    BotonStats.style.color = "red";
    BotonMetas.style.color = "white";
    VentanaPedidos.style.display = "none";
    VentanaProduccion.style.display = "none";
    VentanaHuertas.style.display = "none";
    VentanaStats.style.display = "block";
    VentanaMetas.style.display = "none";
    body.style.backgroundColor = "rgba(33, 25, 100, 0.904)";
  },
  1000
);

BotonStartsResponsive.addEventListener(
  "click",
  function () {
    BotonPedidosResponsive.style.color = "white";
    BotonProduccionResponsive.style.color = "white";
    BotonHuertasResponsive.style.color = "white";
    BotonStartsResponsive.style.color = "red";
    BotonMetasResponsive.style.color = "white";
    VentanaPedidos.style.display = "none";
    VentanaProduccion.style.display = "none";
    VentanaHuertas.style.display = "none";
    VentanaStats.style.display = "block";
    VentanaMetas.style.display = "none";
    body.style.backgroundColor = "rgba(33, 25, 100, 0.904)";
  },
  1000
);

BotonMetas.addEventListener(
  "click",
  function () {
    BotonPedidos.style.color = "white";
    BotonProduccion.style.color = "white";
    BotonHuertas.style.color = "white";
    BotonStats.style.color = "white";
    BotonMetas.style.color = "red";
    VentanaPedidos.style.display = "none";
    VentanaProduccion.style.display = "none";
    VentanaHuertas.style.display = "none";
    VentanaStats.style.display = "none";
    VentanaMetas.style.display = "block";
    body.style.backgroundColor = "white";
  },
  1000
);

BotonMetasResponsive.addEventListener(
  "click",
  function () {
    BotonPedidosResponsive.style.color = "white";
    BotonProduccionResponsive.style.color = "white";
    BotonHuertasResponsive.style.color = "white";
    BotonStartsResponsive.style.color = "white";
    BotonMetasResponsive.style.color = "red";
    VentanaPedidos.style.display = "none";
    VentanaProduccion.style.display = "none";
    VentanaHuertas.style.display = "none";
    VentanaStats.style.display = "none";
    VentanaMetas.style.display = "block";
    body.style.backgroundColor = "white";
  },
  1000
);

///TRAEMOS HUERTAS PENDIENTES DE APROBACION

function traerHuertas() {
  $.ajax({
    url: "updates.php",
    type: "GET",
    dateType: "text",
    success: function (response) {
      if (response == "sin") {
        $(".datos-huertas").html("Sin Huertas Pendientes");
      } else {
        let huerta = JSON.parse(response);
        let template1 = "";
        huerta.forEach((huerta) => {
          template1 += `
                <div class="huertas">
                <p>${huerta.id}</p>
                <p>${huerta.nombre}</p>
                <p>${huerta.size}</p>
                <p style="overflow-x: hidden;">${huerta.correo}</p>
                <p>${huerta.direccion}</p>
                <p class="botones">
                    <button class="a-boton-Accept ACEPTAR" id="${huerta.id}"><i class="fas fa-check-circle ACEPTAR" id="${huerta.id}"></i></button>
                    <button class="a-boton-Decline DENEGAR" id="${huerta.id}"><i class="fas fa-times-circle DENEGAR" id="${huerta.id}"></i></button>
                </p>
                </div>
                `;
        });
        $(".datos-huertas").html(template1);
      }
    },
  });
}
traerHuertas();
//CANTIDAD DE HUERTAS

//APROBAR HUERTAS O DENEGAR HUERTAS

$(document).on("click", ".ACEPTAR", function () {
  let idAcept = $(this).attr("id");
  console.log(idAcept);
  $.post("updates.php", { idAcept }, function (response) {
    traerHuertas();
    uno();
  });
});

$(document).on("click", ".DENEGAR", function () {
  let idDecline = $(this).attr("id");
  console.log(idDecline);
  $.post("updates.php", { idDecline }, function (response) {
    traerHuertas();
    uno();
  });
});

//GRAFICASS DE PEDIDOS

function graficoPedidos() {
  $.ajax({
    url: "pedidos.php",
    type: "GET",
    success: function (response) {
      var nombre = [];
      var num = [];
      var pedidos = JSON.parse(response);
      for (var p = 0; p < pedidos.length; p++) {
        nombre.push(pedidos[p][1] + "s");
        num.push(pedidos[p][0]);
      }
      //////
      const ctx = document.getElementById("graficaPedidos");
      const myChart = new Chart(ctx, {
        type: "doughnut",
        data: {
          labels: nombre,
          datasets: [
            {
              label: "SISGRAN",
              data: num,
              backgroundColor: [
                "rgba(255, 150, 45, 0.7)",
                "rgba(54, 162, 235, 0.7)",
                "rgba(249, 243, 68, 0.7)",
                "rgba(168, 237, 89, 0.7)",
                "rgba(153, 102, 255, 0.7)",
                "rgba(237, 79, 79, 0.7)",
              ],
              borderColor: [
                "rgba(255, 150, 45, 1)",
                "rgba(54, 162, 235, 1)",
                "rgba(249, 243, 68)",
                "rgba(168, 237, 89)",
                "rgba(153, 102, 255, 1)",
                "rgba(237, 79, 79)",
              ],
              borderWidth: 3,
            },
          ],
        },
        options:{
          borderRadius: 10,
        } 

      });
      ////////
    },
  });
}
graficoPedidos();

///////////////////

function uno() {
  $.ajax({
    url: "STATS/huertas.php",
    type: "GET",
    success: function (response) {
      var estado = [];
      var num = [];
      var huertas = JSON.parse(response);
      for (var p = 0; p < huertas.length; p++) {
        estado.push(huertas[p][0] + "s");
        num.push(huertas[p][1]);
      }
      //////
      const ctx = document.getElementById("uno");
      const myChart = new Chart(ctx, {
        type: "doughnut",
        data: {
          labels: ["Pendientes", "Aceptadas", "Aprobadas", "Rechazadas"],
          datasets: [
            {
              label: "SISGRAN",
              data: num,
              backgroundColor: [
                "rgba(255, 150, 45, 0.7)",
                "rgba(54, 162, 235, 0.7)",
                "rgba(249, 243, 68, 0.7)",
                "rgba(168, 237, 89, 0.7)",
                "rgba(153, 102, 255, 0.7)",
                "rgba(237, 79, 79, 0.7)",
              ],
              borderColor: [
                "rgba(255, 150, 45, 1)",
                "rgba(54, 162, 235, 1)",
                "rgba(249, 243, 68)",
                "rgba(168, 237, 89)",
                "rgba(153, 102, 255, 1)",
                "rgba(237, 79, 79)",
              ],
              borderWidth: 3,
            },
          ],
        },
      });
      ////////
    },
  });
}
uno();

//////////////

function dos() {
  $.ajax({
    url: "STATS/clientes.php",
    type: "GET",
    success: function (response) {
      var estado = [];
      var num = [];
      var clientes = JSON.parse(response);
      for (var p = 0; p < clientes.length; p++) {
        estado.push(clientes[p][0]);
        num.push(clientes[p][1]);
      }
      //////
      const ctx = document.getElementById("dos");
      const myChart = new Chart(ctx, {
        type: "polarArea",
        data: {
          labels: estado,
          datasets: [
            {
              label: "SISGRAN",
              data: num,
              backgroundColor: [
                "rgba(255, 150, 45, 0.7)",
                "rgba(54, 162, 235, 0.7)",
                "rgba(249, 243, 68, 0.7)",
                "rgba(168, 237, 89, 0.7)",
                "rgba(153, 102, 255, 0.7)",
                "rgba(237, 79, 79, 0.7)",
              ],
              borderColor: [
                "rgba(255, 150, 45, 1)",
                "rgba(54, 162, 235, 1)",
                "rgba(249, 243, 68)",
                "rgba(168, 237, 89)",
                "rgba(153, 102, 255, 1)",
                "rgba(237, 79, 79)",
              ],
              borderWidth: 3,
            },
          ],
        },
      });
      ////////
    },
  });
}
dos();

///////

function tres() {
  $.ajax({
    url: "STATS/ventas.php",
    type: "GET",
    success: function (response) {
      var num = [];
      var ventas = JSON.parse(response);
      for (var p = 0; p < ventas.length; p++) {
        num.push(ventas[p][0]);
      }
      //////
      const ctx = document.getElementById("tres");
      const myChart = new Chart(ctx, {
        type: "line",
        data: {
          labels: ["Septiembre", "Octubre", "Noviembre", "Diciembre"],
          datasets: [
            {
              label: "$/2022",
              data: num,
              backgroundColor: [
                "rgba(255, 150, 45, 0.7)",
                "rgba(54, 162, 235, 0.7)",
                "rgba(249, 243, 68, 0.7)",
                "rgba(168, 237, 89, 0.7)",
                "rgba(153, 102, 255, 0.7)",
                "rgba(153, 102, 100, 0.7)",
                "rgba(153, 102, 200, 0.7)",
                "rgba(153, 200, 150, 0.7)",
                "rgba(153, 102, 50, 0.7)",
                "rgba(153, 30, 200, 0.7)",
                "rgba(153, 200, 60, 0.7)",
                "rgba(237, 79, 79, 0.7)",
              ],
              borderColor: [
                "rgba(255, 150, 45, 0.7)",
                "rgba(54, 162, 235, 0.7)",
                "rgba(249, 243, 68, 0.7)",
                "rgba(168, 237, 89, 0.7)",
                "rgba(153, 102, 255, 0.7)",
                "rgba(153, 102, 100, 0.7)",
                "rgba(153, 102, 200, 0.7)",
                "rgba(153, 200, 150, 0.7)",
                "rgba(153, 102, 50, 0.7)",
                "rgba(153, 30, 200, 0.7)",
                "rgba(153, 200, 60, 0.7)",
                "rgba(237, 79, 79, 0.7)",
              ],
              borderWidth: 3,
            },
          ],
        },
      });
      ////////
    },
  });
}
tres();

////////////

//RECAUDADO
function profit() {
  $.ajax({
    url: "STATS/profit.php",
    type: "GET",
    success: function (response) {
      $("#profit").html('<i class="fas fa-dollar-sign"></i>' + response);
    },
  });
}
profit();

////////////////////////

function cuatro() {
  $.ajax({
    url: "STATS/stock.php",
    type: "GET",
    success: function (response) {
      var vegetal = [];
      var num = [];
      var stock = JSON.parse(response);
      for (var p = 0; p < stock.length; p++) {
        vegetal.push(stock[p][0]);
        num.push(stock[p][1]);
      }
      //////
      const ctx = document.getElementById("cuatro");
      const myChart = new Chart(ctx, {
        type: "pie",
        data: {
          labels: vegetal,
          datasets: [
            {
              label: "SISGRAN",
              data: num,
              backgroundColor: [
                "rgba(255, 150, 45, 0.7)",
                "rgba(54, 162, 235, 0.7)",
                "rgba(249, 243, 68, 0.7)",
                "rgba(168, 237, 89, 0.7)",
                "rgba(153, 102, 255, 0.7)",
                "rgba(153, 102, 100, 0.7)",
                "rgba(153, 102, 200, 0.7)",
                "rgba(153, 200, 150, 0.7)",
                "rgba(153, 102, 50, 0.7)",
                "rgba(153, 30, 200, 0.7)",
                "rgba(153, 200, 60, 0.7)",
                "rgba(237, 79, 79, 0.7)",
                "rgba(180, 10, 159, 0.7)",
                "rgba(50, 50, 79, 0.7)",
                "rgba(20, 170, 130, 0.7)",
                "rgba(20, 50, 2, 0.7)",
                "rgba(237, 200, 240, 0.7)",
                "rgba(200, 150, 180, 0.7)",
                "rgba(100, 60, 90, 0.7)",
                "rgba(177, 88, 40, 0.7)",
              ],
              borderColor: [
                "rgba(255, 150, 45, 0.7)",
                "rgba(54, 162, 235, 0.7)",
                "rgba(249, 243, 68, 0.7)",
                "rgba(168, 237, 89, 0.7)",
                "rgba(153, 102, 255, 0.7)",
                "rgba(153, 102, 100, 0.7)",
                "rgba(153, 102, 200, 0.7)",
                "rgba(153, 200, 150, 0.7)",
                "rgba(153, 102, 50, 0.7)",
                "rgba(153, 30, 200, 0.7)",
                "rgba(153, 200, 60, 0.7)",
                "rgba(237, 79, 79, 0.7)",
                "rgba(180, 10, 159, 0.7)",
                "rgba(50, 50, 79, 0.7)",
                "rgba(20, 170, 130, 0.7)",
                "rgba(20, 50, 2, 0.7)",
                "rgba(237, 200, 240, 0.7)",
                "rgba(200, 150, 180, 0.7)",
                "rgba(100, 60, 90, 0.7)",
                "rgba(177, 88, 40, 0.7)",
              ],
              borderWidth: 3,
            },
          ],
        },
      });
      ////////
    },
  });
}
cuatro();

////////////////

function cinco() {
  $.ajax({
    url: "STATS/ventasFisicas.php",
    type: "GET",
    success: function (response) {
      console.log(response)
      if(response == "null"){
        $('.statsGraficas .div2').html("SIN VENTAS EN EL ALMACEN")
      }else{
        var vegetal = [];
        var num = [];
        var ventas = JSON.parse(response);
        for (var p = 0; p < ventas.length; p++) {
          vegetal.push(ventas[p][0]);
          num.push(ventas[p][1]);
        }
        if(vegetal == null && num == null){
          vegetal = "Total"
          num = 0
        }
        //////
        const ctx = document.getElementById("cinco");
        const myChart = new Chart(ctx, {
          type: "doughnut",
          data: {
            labels: vegetal,
            datasets: [
              {
                label: "SISGRAN",
                data: num,
                backgroundColor: [
                  "rgba(255, 150, 45, 0.7)",
                  "rgba(54, 162, 235, 0.7)",
                  "rgba(249, 243, 68, 0.7)",
                  "rgba(168, 237, 89, 0.7)",
                  "rgba(153, 102, 255, 0.7)",
                  "rgba(153, 102, 100, 0.7)",
                  "rgba(153, 102, 200, 0.7)",
                  "rgba(153, 200, 150, 0.7)",
                  "rgba(153, 102, 50, 0.7)",
                  "rgba(153, 30, 200, 0.7)",
                  "rgba(153, 200, 60, 0.7)",
                  "rgba(237, 79, 79, 0.7)",
                  "rgba(180, 10, 159, 0.7)",
                  "rgba(50, 50, 79, 0.7)",
                  "rgba(20, 170, 130, 0.7)",
                  "rgba(20, 50, 2, 0.7)",
                  "rgba(237, 200, 240, 0.7)",
                  "rgba(200, 150, 180, 0.7)",
                  "rgba(100, 60, 90, 0.7)",
                  "rgba(177, 88, 40, 0.7)",
                ],
                borderColor: [
                  "rgba(255, 150, 45, 0.7)",
                  "rgba(54, 162, 235, 0.7)",
                  "rgba(249, 243, 68, 0.7)",
                  "rgba(168, 237, 89, 0.7)",
                  "rgba(153, 102, 255, 0.7)",
                  "rgba(153, 102, 100, 0.7)",
                  "rgba(153, 102, 200, 0.7)",
                  "rgba(153, 200, 150, 0.7)",
                  "rgba(153, 102, 50, 0.7)",
                  "rgba(153, 30, 200, 0.7)",
                  "rgba(153, 200, 60, 0.7)",
                  "rgba(237, 79, 79, 0.7)",
                  "rgba(180, 10, 159, 0.7)",
                  "rgba(50, 50, 79, 0.7)",
                  "rgba(20, 170, 130, 0.7)",
                  "rgba(20, 50, 2, 0.7)",
                  "rgba(237, 200, 240, 0.7)",
                  "rgba(200, 150, 180, 0.7)",
                  "rgba(100, 60, 90, 0.7)",
                  "rgba(177, 88, 40, 0.7)",
                ],
                borderWidth: 3,
              },
            ],
          },
        });
        ////////
      }
    },
  });
}
cinco();

////////////////////
//METAS

$.ajax({
  url: "STATS/metas.php",
  type: "GET",
  dateType: "text",
  success: function (response) {
    let metas = JSON.parse(response);
    Object.keys(metas[0]).forEach((key) => {
      if (metas[0][key] === null) {
        metas[0][key] = 0;
      }
    });
    let cultivo = metas[0].totalCultivado;
    let cosecha = metas[0].totalCosechado;
    let diferencia = metas[0].diferencia;
    let metasChicas = metas[0].metasChicas;
    let metasMedianas = metas[0].metasMedianas;
    let cultivoKG = metas[0].KGcultivados;
    let cultivoATADO = metas[0].ATADOScultivados;
    let cultivoUNIDAD = metas[0].UNIDADEScultivadas;
    let cosechaKG = metas[0].KGcosechados;
    let cosechaATADO = metas[0].ATADOScosechados;
    let cosechaUNIDAD = metas[0].UNIDADEScosechadas;

    $("#m1").html(cultivo);
    $("#kgCultivos").html(cultivoKG + " kg");
    $("#atadoCultivos").html(cultivoATADO + " atados");
    $("#unidadCultivos").html(cultivoUNIDAD + " unidades");
    $("#m2").html(cosecha);
    $("#kgCosechado").html(cosechaKG + " kg");
    $("#atadoCosechado").html(cosechaATADO + " atados");
    $("#unidadCosechado").html(cosechaUNIDAD + " unidades");
    $(".m3").html(diferencia);
    if (diferencia < 0) {
      $(".m3").css("color", "red");
    }else if(diferencia > 0){
        $(".m3").css("color", "green");
    }

    $(".m4").html(metasChicas);
    if (metasChicas < 0) {
      $(".m4").css("color", "red");
    }else if(metasChicas > 0){
        $(".m4").css("color", "green");
    }

    $(".m5").html(metasMedianas);
    if (metasMedianas < 0) {
      $(".m5").css("color", "red");
    }else if(metasMedianas > 0){
        $(".m5").css("color", "green");
    }
  },
});

//PRODUCCION POR HUERTAS

$.ajax({
  url: "STATS/produccion.php",
  type: "GET",
  dateType: "text",
  success: function (response) {
    let datos = JSON.parse(response);
    let options = "";
    datos.forEach((datos) => {
      options += `
            <option value="${datos.id}">${datos.nombre}</option>
            `;
    });
    $("#select-produ").append(options);
  },
});

$(document).on("click", "#select-produ", function () {
  let id = $(this).val();
  if (id == 0) {
  } else {

    $.post("STATS/datos-produ.php", { id }, function (response) {
      let produccion = JSON.parse(response);
      Object.keys(produccion[0]).forEach((key) => {
        if (produccion[0][key] === null) {
          produccion[0][key] = 0;
        }
      });
      $("#c1").html(produccion[0].totalCultivado);
      $("#ATAcultivos").html(produccion[0].totalAtadosCultivados + " atados");
      $("#UNIcultivos").html(
        produccion[0].totalUnidadesCultivadas + " unidades"
      );
      $("#KGcultivos").html(produccion[0].totalKgCultivados + " kg");
      $("#c2").html(produccion[0].totalCosechado);
      $("#ATAcosecha").html(produccion[0].totalAtadosCosechados + " atados");
      $("#KGcosecha").html(produccion[0].totalKgCosechados + " kg");
      $("#UNIcosecha").html(
        produccion[0].totalUnidadesCosechadas + " unidades"
      );
      var cosechas = {
        kg: produccion[0].totalKgCosechados,
        unidades: produccion[0].totalUnidadesCosechadas,
        atados: produccion[0].totalAtadosCosechados,
      };
      var cultivos = {
        kg: produccion[0].totalKgCultivados,
        unidades: produccion[0].totalUnidadesCultivadas,
        atados: produccion[0].totalAtadosCultivados,
      };
      $('#p3').html('<canvas id="cultivo" width="1fr" height="1fr"></canvas>')
      $('#p4').html('<canvas id="cosecha" width="1fr" height="1fr"></canvas>')


      function verCultivoHuerta() {
        const ctx = document.getElementById("cultivo");
        const myChart = new Chart(ctx, {
          type: "doughnut",
          data: {
            labels: ["Kg", "Unidades", "Atados"],
            datasets: [
              {
                label: "SISGRAN",
                data: [cultivos.kg, cultivos.unidades, cultivos.atados],
                backgroundColor: [
                  "rgba(255, 150, 45, 0.7)",
                  "rgba(54, 162, 235, 0.7)",
                  "rgba(249, 243, 68, 0.7)",
                  "rgba(168, 237, 89, 0.7)",
                  "rgba(153, 102, 255, 0.7)",
                  "rgba(153, 102, 100, 0.7)",
                  "rgba(153, 102, 200, 0.7)",
                  "rgba(153, 200, 150, 0.7)",
                  "rgba(153, 102, 50, 0.7)",
                  "rgba(153, 30, 200, 0.7)",
                  "rgba(153, 200, 60, 0.7)",
                  "rgba(237, 79, 79, 0.7)",
                  "rgba(180, 10, 159, 0.7)",
                  "rgba(50, 50, 79, 0.7)",
                  "rgba(20, 170, 130, 0.7)",
                  "rgba(20, 50, 2, 0.7)",
                  "rgba(237, 200, 240, 0.7)",
                  "rgba(200, 150, 180, 0.7)",
                  "rgba(100, 60, 90, 0.7)",
                  "rgba(177, 88, 40, 0.7)",
                ],
                borderColor: [
                  "rgba(255, 150, 45, 0.7)",
                  "rgba(54, 162, 235, 0.7)",
                  "rgba(249, 243, 68, 0.7)",
                  "rgba(168, 237, 89, 0.7)",
                  "rgba(153, 102, 255, 0.7)",
                  "rgba(153, 102, 100, 0.7)",
                  "rgba(153, 102, 200, 0.7)",
                  "rgba(153, 200, 150, 0.7)",
                  "rgba(153, 102, 50, 0.7)",
                  "rgba(153, 30, 200, 0.7)",
                  "rgba(153, 200, 60, 0.7)",
                  "rgba(237, 79, 79, 0.7)",
                  "rgba(180, 10, 159, 0.7)",
                  "rgba(50, 50, 79, 0.7)",
                  "rgba(20, 170, 130, 0.7)",
                  "rgba(20, 50, 2, 0.7)",
                  "rgba(237, 200, 240, 0.7)",
                  "rgba(200, 150, 180, 0.7)",
                  "rgba(100, 60, 90, 0.7)",
                  "rgba(177, 88, 40, 0.7)",
                ],
                borderWidth: 3,
              },
            ],
          },
        });
      }
      verCultivoHuerta();

      function verCosechaHuerta() {
        const ctx = document.getElementById("cosecha");
        const myChart = new Chart(ctx, {
          type: "doughnut",
          data: {
            labels: ["Kg", "Unidades", "Atados"],
            datasets: [
              {
                label: "SISGRAN",
                data: [cosechas.kg, cosechas.unidades, cosechas.atados],
                backgroundColor: [
                  "rgba(255, 150, 45, 0.7)",
                  "rgba(54, 162, 235, 0.7)",
                  "rgba(249, 243, 68, 0.7)",
                  "rgba(168, 237, 89, 0.7)",
                  "rgba(153, 102, 255, 0.7)",
                  "rgba(153, 102, 100, 0.7)",
                  "rgba(153, 102, 200, 0.7)",
                  "rgba(153, 200, 150, 0.7)",
                  "rgba(153, 102, 50, 0.7)",
                  "rgba(153, 30, 200, 0.7)",
                  "rgba(153, 200, 60, 0.7)",
                  "rgba(237, 79, 79, 0.7)",
                  "rgba(180, 10, 159, 0.7)",
                  "rgba(50, 50, 79, 0.7)",
                  "rgba(20, 170, 130, 0.7)",
                  "rgba(20, 50, 2, 0.7)",
                  "rgba(237, 200, 240, 0.7)",
                  "rgba(200, 150, 180, 0.7)",
                  "rgba(100, 60, 90, 0.7)",
                  "rgba(177, 88, 40, 0.7)",
                ],
                borderColor: [
                  "rgba(255, 150, 45, 0.7)",
                  "rgba(54, 162, 235, 0.7)",
                  "rgba(249, 243, 68, 0.7)",
                  "rgba(168, 237, 89, 0.7)",
                  "rgba(153, 102, 255, 0.7)",
                  "rgba(153, 102, 100, 0.7)",
                  "rgba(153, 102, 200, 0.7)",
                  "rgba(153, 200, 150, 0.7)",
                  "rgba(153, 102, 50, 0.7)",
                  "rgba(153, 30, 200, 0.7)",
                  "rgba(153, 200, 60, 0.7)",
                  "rgba(237, 79, 79, 0.7)",
                  "rgba(180, 10, 159, 0.7)",
                  "rgba(50, 50, 79, 0.7)",
                  "rgba(20, 170, 130, 0.7)",
                  "rgba(20, 50, 2, 0.7)",
                  "rgba(237, 200, 240, 0.7)",
                  "rgba(200, 150, 180, 0.7)",
                  "rgba(100, 60, 90, 0.7)",
                  "rgba(177, 88, 40, 0.7)",
                ],
                borderWidth: 3,
              },
            ],
          },
        });
      }
      verCosechaHuerta();
    });
  }
});
