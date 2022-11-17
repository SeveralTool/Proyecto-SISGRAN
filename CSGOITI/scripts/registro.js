//VENTANAS PARA REGISTRO DE CLIENTES

const ventanaWeb = document.getElementById("form-registro-web");
const ventanaEmpresa = document.getElementById("form-registro-empresa");
const ventanaHuerta = document.getElementById("form-registro-huerta");
const botonWeb = document.getElementById("cliente-web");
const botonEmpresa = document.getElementById("cliente-empresa");
const botonHuerta = document.getElementById("cliente-huerta");

botonWeb.addEventListener("click", function () {
  botonEmpresa.style.color = "white";
  botonHuerta.style.color = "white";
  botonWeb.style.color = "red";
  ventanaWeb.style.display = "grid";
  ventanaEmpresa.style.display = "none";
  ventanaHuerta.style.display = "none";
});

botonEmpresa.addEventListener("click", function () {
  botonWeb.style.color = "white";
  botonHuerta.style.color = "white";
  botonEmpresa.style.color = "red";
  ventanaEmpresa.style.display = "grid";
  ventanaWeb.style.display = "none";
  ventanaHuerta.style.display = "none";
});

botonHuerta.addEventListener("click", function () {
  botonEmpresa.style.color = "white";
  botonWeb.style.color = "white";
  botonHuerta.style.color = "red";
  ventanaHuerta.style.display = "grid";
  ventanaWeb.style.display = "none";
  ventanaEmpresa.style.display = "none";
});
var correoWeb = 0;
var webPuerta = 0;
var webCi = 0;
var webPostal = 0;

$("#correoWeb").keyup(function () {
  let corr = $(this).val();
  if (
    /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(
      corr
    )
  ) {
    $(this).css("color", "#fff");
    correoWeb = 1;
    btnWeb();
  } else {
    $(this).css("color", "red");
    correoWeb = 0;
    btnWeb();
  }
});

$("#ci").keyup(function () {
  let thiss = $(this);
  let input = Number($(this).val());
  let input1 = $(this).val();
  if (input1.length > 8 || input1.length < 8 || !Number.isInteger(input)) {
    $(thiss).css("color", "red");
    webCi = 0;
    btnWeb();
  } else {
    $(this).css("color", "white");
    webCi = 1;
    btnWeb();
  }
});

$("#puerta-web").keyup(function () {
  let thiss = $(this);
  let input = Number($(this).val());
  let input1 = $(this).val();
  if (input1.length > 5 || input1.length < 3 || !Number.isInteger(input)) {
    $(thiss).css("color", "red");
    webPuerta = 0;
    btnWeb();
  } else {
    $(thiss).css("color", "white");
    webPuerta = 1;
    btnWeb();
  }
});

$("#postal-web").keyup(function () {
  let thiss = $(this);
  let input = Number($(this).val());
  let input1 = $(this).val();
  if (input1.length < 5 || input1.length > 5 || !Number.isInteger(input)) {
    $(this).css("color", "red");
    webPostal = 0;
    btnWeb();
  } else {
    $(this).css("color", "white");
    webPostal = 1;
    btnWeb();
  }
});

function btnWeb() {
  if (webPuerta == 0 || webCi == 0 || webPostal == 0 || correoWeb == 0) {
    $("#submitWeb").prop("disabled", true);
  } else {
    $("#submitWeb").prop("disabled", false);
  }
}

var correoEmpresa = 0;
var rut = 0;
var emPuerta = 0;
var emPostal = 0;

$("#correoEmpresa").keyup(function () {
  let corr = $(this).val();
  if (
    /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(
      corr
    )
  ) {
    $(this).css("color", "#fff");
    correoEmpresa = 1;
    btnempresa();
  } else {
    $(this).css("color", "red");
    correoEmpresa = 0;
    btnempresa();
  }
});

$("#rut").keyup(function () {
  let thiss = $(this);
  let input = Number($(this).val());
  let input1 = $(this).val();
  if (input1.length > 12 || input1.length < 12 || !Number.isInteger(input)) {
    $(thiss).css("color", "red");
    rut = 0;
    btnempresa();
  } else {
    $(this).css("color", "white");
    rut = 1;
    btnempresa();
  }
});

$("#puerta-empresa").keyup(function () {
  let thiss = $(this);
  let input = Number($(this).val());
  let input1 = $(this).val();
  if (input1.length > 6 || input1.length < 3 || !Number.isInteger(input)) {
    $(thiss).css("color", "red");
    emPuerta = 0;
    btnempresa();
  } else {
    $(thiss).css("color", "white");
    emPuerta = 1;
    btnempresa();
  }
});

$("#postal-empresa").keyup(function () {
  let thiss = $(this);
  let input = Number($(this).val());
  let input1 = $(this).val();
  if (input1.length < 5 || input1.length > 5 || !Number.isInteger(input)) {
    $(this).css("color", "red");
    emPostal = 0;
    btnempresa();
  } else {
    $(this).css("color", "white");
    emPostal = 1;
    btnempresa();
  }
});

function btnempresa() {
  if (rut == 0 || emPuerta == 0 || emPostal == 0 || correoEmpresa == 0) {
    $("#submitEmpresa").prop("disabled", true);
  } else {
    $("#submitEmpresa").prop("disabled", false);
  }
}

var correoHuerta = 0;

$("#correoHuerta").keyup(function () {
  let corr = $(this).val();
  if (
    /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(
      corr
    )
  ) {
    $(this).css("color", "#fff");
    correoHuerta = 1;
    btnHuerta();
  } else {
    $(this).css("color", "red");
    correoHuerta = 0;
    btnHuerta();
  }
});

function btnHuerta() {
  if (correoHuerta == 0) {
    $("#submitHuerta").prop("disabled", true);
  } else {
    $("#submitHuerta").prop("disabled", false);
  }
}
