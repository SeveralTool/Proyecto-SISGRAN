const BotonUser = document.getElementById("btn-settings");
const BotonIngresos = document.getElementById("btn-ingresos");
const BotonProduccion = document.getElementById("btn-produccion");

const BotonUserResponsive = document.getElementById("btn-settings-res");
const BotonIngresosResponsive = document.getElementById("btn-ingresos-res");
const BotonProduccionResponsive = document.getElementById("btn-produccion-res");

const VentanaUser = document.getElementById("USERR");
const VentanaIngresos = document.getElementById("ingresos");
const VentanaProduccion = document.getElementById("produccion");

BotonUser.addEventListener("click", function () {
  BotonUser.style.color = "red";
  BotonIngresos.style.color = "white";
  BotonProduccion.style.color = "white";
  VentanaUser.style.display = "block";
  VentanaIngresos.style.display = "none";
  VentanaProduccion.style.display = "none";
});

BotonUserResponsive.addEventListener("click", function () {
  BotonUser.style.color = "red";
  BotonIngresos.style.color = "white";
  BotonProduccion.style.color = "white";
  VentanaUser.style.display = "block";
  VentanaIngresos.style.display = "none";
  VentanaProduccion.style.display = "none";
});

BotonIngresos.addEventListener("click", function () {
  BotonUser.style.color = "white";
  BotonIngresos.style.color = "red";
  BotonProduccion.style.color = "white";
  VentanaUser.style.display = "none";
  VentanaIngresos.style.display = "block";
  VentanaProduccion.style.display = "none";
});

BotonIngresosResponsive.addEventListener("click", function () {
  BotonUser.style.color = "white";
  BotonIngresos.style.color = "red";
  BotonProduccion.style.color = "white";
  VentanaUser.style.display = "none";
  VentanaIngresos.style.display = "block";
  VentanaProduccion.style.display = "none";
});

BotonProduccion.addEventListener("click", function () {
  BotonUser.style.color = "white";
  BotonIngresos.style.color = "white";
  BotonProduccion.style.color = "red";
  VentanaUser.style.display = "none";
  VentanaIngresos.style.display = "none";
  VentanaProduccion.style.display = "block";
});

BotonProduccionResponsive.addEventListener("click", function () {
  BotonUser.style.color = "white";
  BotonIngresos.style.color = "white";
  BotonProduccion.style.color = "red";
  VentanaUser.style.display = "none";
  VentanaIngresos.style.display = "none";
  VentanaProduccion.style.display = "block";
});

//ACTUALIZAR NOMBRE WEB
$(document).on("click", "#nombre", function (e) {
  e.preventDefault();
  let valor = $(this)[0].parentElement;
  nombre = $(valor).find("input").val();
  if (nombre.length >= 2 && nombre.length <= 20) {
    $.post("update.php", { nombre }, function (response) {});
  } else {
    $("#NOMBRE").val("Ingrese un dato");
    $("#NOMBRE").css("border-color", "red");
    setTimeout(() => {
      $("#NOMBRE").val("");
    }, 3000);
  }
});

//ACTUALIZAR CORREO WEB
$(document).on("click", "#correo", function (e) {
  e.preventDefault();
  let valor = $(this)[0].parentElement;
  correo = $(valor).find("input").val();
  if (
    correo.length >= 7 &&
    /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(
      correo
    ) == true &&
    correo.length <= 40
  ) {
    $.post("update.php", { correo }, function (response) {});
  } else {
    $("#CORREO").val("Ingrese un correo valido");
    $("#CORREO").css("border-color", "red");
    setTimeout(() => {
      $("#CORREO").val("");
    }, 3000);
  }
});

//ACTUALIZAR PASSWORD WEB
$(document).on("click", "#pass", function (e) {
  e.preventDefault();
  let valor = $(this)[0].parentElement;
  pass = $(valor).find("input").val();
  if (pass.length >= 8 && pass.length <= 32) {
    $.post("update.php", { pass }, function (response) {});
  } else {
    $("#PASS").val("");
    $("#PASS").css("border-color", "red");
    setTimeout(() => {
      $("#PASS").val("");
    }, 3000);
  }
});

//ACTUALIZAR DIRECCION WEB
$(document).on("click", "#dir", function (e) {
  e.preventDefault();
  let valor = $(this)[0].parentElement;
  dir = $(valor).find("input").val();
  if (dir.length > 5 && dir.length <= 20) {
    $.post("update.php", { dir }, function (response) {});
  } else {
    $("#DIR").val("Ingrese una direccion valida");
    $("#DIR").css("border-color", "red");
    setTimeout(() => {
      $("#DIR").val("");
    }, 3000);
  }
});

//PICK FOTO DE PERFIL

$(document).on("click", ".foto", function () {
  let foto = $(this).attr("value");
  $(".foto").css("border-color", "black");
  $(this).css("border-color", "red");
  $.post("update.php", { foto }, function (response) {
    fotoActual();
  });
});

//FOTO DE PERFIL ACTUAL

function fotoActual() {
  let fotoActual = 1;
  $.post("update.php", { fotoActual }, function (response) {
    $.ajax({
      url: "update.php",
      type: "GET",
      success: function (response) {
        let foto = JSON.parse(response);
        $(".foto-top").attr("src", foto);
      },
    });
  });
}
fotoActual();

//INGRESOS DE CULTIVOS

var chica = 12;
var mediana = 16;
//
$.ajax({
  /////////////////////////////////////////////
  url: "tamaño.php",
  type: "GET",
  dateType: "text",
  success: function (tamaño) {
    //SI ES MEDIANA
    var tamañoHuerta = tamaño;
    if (tamañoHuerta == "mediana") {
      let template = "";
      template += `
    <div id="grilla-mediana">
    </div>
    `;
      $("#grilla-huerta").html(template);
    }
    //SI ES PEQUEÑA
    else {
      let template = "";
      template += `
    <div id="grilla-pequeña">
    </div>
    `;
      $("#grilla-huerta").html(template);
    }
  },
  ////////////////////////////////////////////////
});
//

$(document).on("click", "#vegetal", function () {
  let vegetal1 = $(this).val();
  let vegetal = $(this).val();
  $.post("socios.php", { vegetal }, function (response1) {
    let variedad = JSON.parse(response1);
    let template8 = "";
    variedad.forEach((variedad) => {
      template8 += `
            <option value="${variedad.id}">${variedad.nombre}</option>
            `;
    });
    $("#variedad1").html(template8);
  });

  $.post("socios.php", { vegetal1 }, function (response) {
    let socio = JSON.parse(response);
    if (socio.length === 0) {
      template7 = "";
      template7 += `
            <option value="0">Sin asociados</option>
            `;
      $("#vegetal2").html(template7);
    } else {
      let template6 = "";
      socio.forEach((socio) => {
        template6 += `
            <option value="${socio.socio}">${socio.nombre}</option>
            `;
      });
      $("#vegetal2").html(template6);
      $("#vegetal2").append('<option value="0">No asociar</option>');
    }
    traerVariedad2();
  });
});

$(document).on("click", "#vegetal2", function () {
  let ok = $(this).val();
  traerVariedad2();
});

function traerVariedad2() {
  let vegetal2 = $("#vegetal2").val();
  $.post("socios.php", { vegetal2 }, function (response3) {
    let variedad2 = JSON.parse(response3);
    let template9 = "";
    variedad2.forEach((variedad2) => {
      template9 += `
            <option value="${variedad2.id}">${variedad2.nombre}</option>
            `;
    });
    $("#variedad2").html(template9);
  });
}

//INGRESAR CULTIVO

$(document).on("click", "#ingreso-cultivo", function () {
  if ($("#vegetal").attr("valid") == 0 || $("#vegetal2").attr("valid") == 0) {
    $("#ingreso-cultivo").attr("disabled", true);
  } else {
    let consultaEspacio = 1;
    $.post("cupo.php", { consultaEspacio }, function (response4) {
      if (response4 == "null") {
      } else {
        let cupo = JSON.parse(response4);
        var tamaño = cupo[0].tamanio;
        let cantidad = cupo[0].cantidad;

        //VERIFICAMOS EL TAMAÑO DE LA HUERTA
        if (tamaño == "mediana") {
          //VERIFICAMOS EL CUPO DISPONIBLE, SI NO LLEGO AL LIMITE, SE VA A LA FUNCION
          if (cantidad < mediana) {
            setTimeout(() => {
              ingreso();
            }, 300);
          } else {
            $("#ingreso-cultivo").html("Capacidad MAX alcanzada");
            setTimeout(() => {
              $("#ingreso-cultivo").html("INGRESAR CULTIVO");
            }, 5000);
          }
        }
        //SI NO ES MEDIANA ES PEQUEÑA
        else {
          if (cantidad < chica) {
            setTimeout(() => {
              ingreso();
            }, 300);
          } else {
            $("#ingreso-cultivo").html("Capacidad MAX alcanzada");
            setTimeout(() => {
              $("#ingreso-cultivo").html("INGRESAR CULTIVO");
            }, 5000);
          }
        }
      }
    });
  }
});

//FUNCION DE INGRESO
function ingreso() {
  let vegetal1 = $("#vegetal").val();
  let variedad1 = $("#variedad1").val();
  let cantidad1 = Number($("#cantidadVariedad1").val());
  let cant1 = $("#cantidadVariedad1").val()
  let vegetal2 = $("#vegetal2").val();
  let variedad2 = $("#variedad2").val();
  let cantidad2 = Number($("#cantidadVariedad2").val());
  let cant2 = $("#cantidadVariedad2").val()
  //SI NO SE ELIGIO UN VEGETAL
  if (vegetal1 == 0) {
    $("#vegetal").css("border", "2px solid red");
    setTimeout(() => {
      $("#vegetal").css("border", "1px solid #000");
    }, 3000);
  }
  //SI SE ELGIO VEGETAL, SEGUIR
  else {
    //SI LA PRIMERA CANTIDAD DE VARIEDAD NO CUMPLE LOS PARAMETROS
    if (cantidad1 <= 0 || cantidad1 > 5000 || cant1.length < 1 || ! Number.isInteger(cantidad1)) {
      $("#cantidadVariedad1").css("border", "2px solid red");
      setTimeout(() => {
        $("#cantidadVariedad1").css("border", "0px ");
      }, 3000);
    }
    //SI CUMPLE
    else {
      //SI NO SE ELIGIO SOCIO, SOLO ENVIAR UN CULTIVO
      if (vegetal2 == 0) {
        $.post(
          "ingresos.php",
          { vegetal1, variedad1, cantidad1 },
          function (response5) {}
        );
      }
      //SI SE ELIGIO SOCIO, ENVIAR AMBOS
      else {
        //SI LA SEGUNDA CANTIDAD DE VARIEDAD NO CUMPLE LOS PARAMETROS
        if (cantidad2 <= 0 || cantidad2 > 1000 || cant2.lenght < 1 || ! Number.isInteger(cant2)) {
          $("#cantidadVariedad2").css("border", "2px solid red");
          setTimeout(() => {
            $("#cantidadVariedad2").css("border", "0px ");
          }, 3000);
        }
        //SI LA SEGUNDA SE CUMPLE ENVIAR LOS 2
        else {
          let vegetal3 = vegetal1;
          let variedad3 = variedad1;
          $.post(
            "ingresos.php",
            { vegetal3, vegetal2, variedad3, variedad2, cantidad1, cantidad2 },
            function (response5) {
              disabled = 0;
            }
          );
        }
      }
    }
  }
  $("#grilla-mediana").html("");
  $("#grilla-pequeña").html("");
  traerCultivos();
}

function traerCultivos() {
  $.ajax({
    url: "cultivos.php",
    type: "GET",
    dateType: "text",
    success: function (response6) {
      if (response6 == "null") {
        $("#grilla-mediana").html("No hay Cultivos en su Huerta");
        $("#grilla-pequeña").html("No hay Cultivos en su Huerta");
      } else {
        let cultivo = JSON.parse(response6);
        for (var v = 0; v < cultivo.length; v++) {
          let fechaTransplantar = cultivo[v].fechaTransplante;
          let fechaCosecha = cultivo[v].fechaCosecha;
          let fechaGerminar = cultivo[v].fechaGerminar;
          let imagen = cultivo[v].imagen;
          let vegetal = cultivo[v].vegetal;
          let variedad = cultivo[v].variedad;
          let idVegetal = cultivo[v].id_vegetal;
          let cantidad = cultivo[v].cantidad;
          let estado = cultivo[v].estado;
          let unidad = cultivo[v].unidad;
          let idVariedad = cultivo[v].id_variedad;
          let metodo = cultivo[v].siembra;
          let profundidad = cultivo[v].profundidad;
          let fechaActual = cultivo[v].fechaActual;
          let fechaCultivo = cultivo[v].fecha_cultivo;
          if (fechaCosecha <= fechaActual) {
            var templateCultivo = "";
            templateCultivo += `
        <div class="cultivo">
        <i class="fas fa-times delCultivo" vegetal="${idVegetal}" variedad="${idVariedad}" fechaCultivo="${fechaCultivo}"></i>
        <img src="../../../${imagen}" alt="">
          <p class="p1-cultivo">${vegetal} ${variedad}</p>
          <p>Siembra: ${metodo}</p>
          <p>Profundidad: ${profundidad}</p>
          <p>Cantidad: ${cantidad} ${unidad}</p>
          <button class="boton-cultivo cosecha">Cosechar</button>
          <div class="cantCosechaDiv" input="">
          <input type="number" value="" class="boton-cultivo cantCosecha" min="1" max="${cantidad}" Placeholder="Cantidad de la Cosecha">
          <i class="fas fa-check boton-cultivo sendCosecha" id="sendCosecha" fechaCultivo="${fechaCultivo}" vegetal="${idVegetal}" variedad="${idVariedad}"></i>
          <i class="fas fa-times boton-cultivo stopCosecha"></i>
          </div>
        </div>
      `;
            Cultivos();
          } else if (fechaTransplantar <= fechaActual) {
            if (estado == "Transplantado") {
              var templateCultivo = "";
              templateCultivo += `
            <div class="cultivo">
            <i class="fas fa-times delCultivo" vegetal="${idVegetal}" variedad="${idVariedad}" fechaCultivo="${fechaCultivo}"></i>
              <img src="../../../${imagen}" alt="">
              <p class="p1-cultivo">${vegetal} ${variedad}</p>
              <p>Siembra: ${metodo}</p>
              <p>Profundidad: ${profundidad}</p>
              <p>Cantidad: ${cantidad} ${unidad}</p>
              <button class="boton-cultivo transplantado">Transplantado</button>
            </div>
          `;
              Cultivos();
            } else {
              var templateCultivo = "";
              templateCultivo += `
        <div class="cultivo">
        <i class="fas fa-times delCultivo" vegetal="${idVegetal}" variedad="${idVariedad}" fechaCultivo="${fechaCultivo}"></i>
        <img src="../../../${imagen}" alt="">
          <p class="p1-cultivo">${vegetal} ${variedad}</p>
          <p>Siembra: ${metodo}</p>
          <p>Profundidad: ${profundidad}</p>
          <p>Cantidad: ${cantidad} ${unidad}</p>
          <button class="boton-cultivo transplantar" fechaCultivo="${fechaCultivo}" vegetal="${idVegetal}" variedad="${idVariedad}">Transplantar</button>
        </div>
      `;
              Cultivos();
            }
          } else if (fechaGerminar <= fechaActual) {
            var templateCultivo = "";
            templateCultivo += `
        <div class="cultivo">
        <i class="fas fa-times delCultivo" vegetal="${idVegetal}" variedad="${idVariedad}" fechaCultivo="${fechaCultivo}"></i>
        <img src="../../../${imagen}" alt="">
          <p class="p1-cultivo">${vegetal} ${variedad}</p>
          <p>Siembra: ${metodo}</p>
          <p>Profundidad: ${profundidad}</p>
          <p>Cantidad: ${cantidad} ${unidad}</p>
          <button class="boton-cultivo germinado">Germinado</button>
        </div>
      `;
            Cultivos();
          } else {
            var templateCultivo = "";
            templateCultivo += `
        <div class="cultivo">
        <i class="fas fa-times delCultivo" vegetal="${idVegetal}" variedad="${idVariedad}" fechaCultivo="${fechaCultivo}"></i>
        <img src="../../../${imagen}" alt="">
          <p class="p1-cultivo">${vegetal} ${variedad}</p>
          <p>Siembra: ${metodo}</p>
          <p>Profundidad: ${profundidad}</p>
          <p>Cantidad: ${cantidad} ${unidad}</p>
          <button class="boton-cultivo proceso">En Proceso</button>
        </div>
      `;
            Cultivos();
          }
        }
        //FUNCION PARA AGREGAR LOS CULTIVOS A LAS GRILLAS
        function Cultivos() {
          $("#grilla-mediana").append(templateCultivo);
          $("#grilla-pequeña").append(templateCultivo);
        }
      }
    },
  });
}
traerCultivos();

//TRASNPLANTAR

$(document).on("click", ".transplantar", function () {
  let vegetalT = $(this).attr("vegetal");
  let variedadT = $(this).attr("variedad");
  let fechaCul = $(this).attr("fechaCultivo");
  console.log(vegetalT);
  console.log(variedadT);
  console.log(fechaCul);
  $.post(
    "updateCultivos.php",
    { vegetalT, variedadT, fechaCul },
    function (response) {
      $("#grilla-mediana").html("");
      $("#grilla-pequeña").html("");
      traerCultivos();
    }
  );
});

//COSECHAR

$(document).on("click", ".cosecha", function () {
  //LE PEDIMOS A LA HUERTA LA CANTIDAD FINAL DE LA COSECHA
  $(".cantCosechaDiv").hide();
  $(".cantCosecha").val("");
  $(".stopCosecha").css("display", "flex");
  $(".sendCosecha").css("display", "none");
  $(".cosecha").show();
  $(this).hide();
  let div = $(this)[0].parentElement;
  let div2 = $(div).find("div");
  $(div2).css("display", "flex");
});

//VERIFICACION DE VALORES PARA BOTON DE SEND COSECHA
$(document).on("keyup", ".cantCosecha", function () {
  let cant = Number($(this).val()); //VALOR DEL INGRESO
  let max = Number($(this).attr("max")); //ATRIBUTO AGREGADO AUTO QUE ES 1000 EN ESTE CASO
  if (cant <= max && cant > 0) {
    //CONDICION POSITIVA LA CUAL ME PERMITE SEGUIR CON LA COSECHA
    $(".stopCosecha").css("display", "none");
    $(".sendCosecha").css("display", "flex");
  } else {
    // CONDICION NEGATIVA
    $(".stopCosecha").css("display", "flex");
    $(".sendCosecha").css("display", "none");
  }
});

//ELIMINAR UN CULTIVO
$(document).on("click", ".delCultivo", function () {
  let delVegetal = $(this).attr("vegetal");
  let delVariedad = $(this).attr("variedad");
  let delFecha = $(this).attr("fechaCultivo");
  $.post(
    "updateCultivos.php",
    { delVegetal, delVariedad, delFecha },
    function (response) {
      $("#grilla-mediana").html("");
      $("#grilla-pequeña").html("");
      traerCultivos();
    }
  );
});

//BOTON PARA QUITAR INPUT DE COSECHA

$(document).on("click", ".stopCosecha", function () {
  $(".cantCosechaDiv").css("display", "none");
  $(".cosecha").css("display", "block");
});

//BOTON PARA ENVIAR COSECHA
$(document).on("click", "#sendCosecha", function () {
  let btn = $(this)[0].parentElement;
  let cant = Number($(btn).find("input").val());
  let max = Number($(btn).find("input").attr("max"));

  if (cant <= max && cant > 0) {
    let vegetalC = $(this).attr("vegetal");
    let variedadC = $(this).attr("variedad");
    let Fcultivo = $(this).attr("fechaCultivo");
    $.post(
      "updateCultivos.php",
      { vegetalC, variedadC, cant, Fcultivo },
      function (response) {
        $("#grilla-mediana").html("");
        $("#grilla-pequeña").html("");
        traerCultivos();
      }
    );
  } else {
    $(".sendCosecha").css("background-color", "red");
  }
});

//RECOMENDACIONES DE PLANTADO PARA CADA VEGETAL

$(document).on("click", "#vegetal, #vegetal2", function () {
  let vegRecommend = $(this).val();
  let select = $(this);
  let find = $(this)[0].parentElement;
  let span = $(find).find("span");
  if (vegRecommend == 0) {
    $(span).html("");
    $(this).css("border", "2px solid transparent");
  } else {
    $.post("cupo.php", { vegRecommend }, function (response) {
      if (response == "null") {
      } else {
        let fechas = JSON.parse(response);
        for (var m = 0; m < fechas.length; m++) {
          var Inicio = fechas[m].inicio;
          var Final = fechas[m].final;
        }
        let ob = new Date();
        let mesActual = ob.getMonth() + 1;
        const mes = [
          "",
          "Enero",
          "Febrero",
          "Marzo",
          "Abril",
          "Mayo",
          "Junio",
          "Julio",
          "Agosto",
          "Septiembre",
          "Octubre",
          "Noviembre",
          "Diciembre",
        ];

        $(span).html(
          "Se recomienda cultivar </br>" +
            "desde: " +
            mes[Inicio] +
            "</br>" +
            "hasta: " +
            mes[Final]
        );

        if (
          (Inicio <= mesActual && Final >= mesActual) ||
          (Inicio <= mesActual && Final < Inicio)
        ) {
          $(select).css("border", "3px solid #5BE506");
          $("#ingreso-cultivo").attr("disabled", false);
          $(select).attr("valid", 1);
        } else {
          $(select).css("border", "3px solid #FE7400");
          $("#ingreso-cultivo").attr("disabled", true);
          $(select).attr("valid", 0);
        }
      }
    });
  }
});

//STATS

function uno() {
  $.ajax({
    url: "STATS/prodCultivos.php",
    type: "GET",
    dateType: "text",
    success: function (response) {
      var vegetal = [];
      var cantidad = [];
      var cultivos = JSON.parse(response);
      for (var p = 0; p < cultivos.length; p++) {
        vegetal.push(cultivos[p].vegetal);
        cantidad.push(cultivos[p].cantidad);
      }
      //////
      const ctx = document.getElementById("uno");
      const myChart = new Chart(ctx, {
        type: "pie",
        data: {
          labels: vegetal,
          datasets: [
            {
              label: "SISGRAN",
              data: cantidad,
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
uno();

function dos() {
  $.ajax({
    url: "STATS/prodCosecha.php",
    type: "GET",
    dateType: "text",
    success: function (response) {
      var vegetal = [];
      var cantidad = [];
      var cultivos = JSON.parse(response);
      for (var p = 0; p < cultivos.length; p++) {
        vegetal.push(cultivos[p].vegetal);
        cantidad.push(cultivos[p].cantidad);
      }
      //////
      const ctx = document.getElementById("dos");
      const myChart = new Chart(ctx, {
        type: "doughnut",
        data: {
          labels: vegetal,
          datasets: [
            {
              label: "SISGRAN",
              data: cantidad,
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
dos();

function prodTotal() {
  $.ajax({
    url: "STATS/prodTotal.php",
    type: "GET",
    dateType: "text",
    success: function (response) {
      let prod = JSON.parse(response);
      let cultivos = prod[0].cultivos;
      let cosechas = prod[0].cosechas;
      $(".cultivos").html(cultivos);
      $(".cosechas").html(cosechas);
      let pro = Number(Math.trunc((cosechas * 100) / cultivos));
      if (pro == 100) {
        $(".total").html("+" + pro + "%");
        $(".total").css("color", "green");
      } else {
        let profit = 100 - pro;
        $(".total").html("-" + profit + "%");
        $(".total").css("color", "red");
      }
    },
  });
}
prodTotal();

$(document).on("click", "#delCuenta", function () {
  $(this).hide();
  $(".delContainer").css("display", "flex");
});

$(document).on("click", ".no", function () {
  $(".delContainer").css("display", "none");
  $("#delCuenta").show();
});

$(document).on("click", ".si", function () {
  let cliente = $(this).attr("cliente");
  console.log(cliente);
  console.log(correo);
  $.post("del.php", { cliente }, function (response) {
    window.location.href = "../../../main.php";
  });
});
