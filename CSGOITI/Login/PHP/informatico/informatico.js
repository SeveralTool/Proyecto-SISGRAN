var SelectAdmin = document.getElementById("selector");
var Seleccion = SelectAdmin.options[SelectAdmin.selectedIndex].value;
const Opcion = document.querySelectorAll("opcion");
const admin = document.getElementById("admin");
const directivo = document.getElementById("directivo");
const TxtAdmin = document.getElementById("txt-admin");
const TxtDirectivo = document.getElementById("txt-directivo");
const VentanaIngresos = document.getElementById("ingresos");
const VentanaStats = document.getElementById("stats");
const BotonIngresos = document.getElementById("btn-ingresos");
const BotonStats = document.getElementById("btn-stats");
const BotonIngresosResponsive = document.getElementById("btn-ingresos-res");
const BotonStatsResponsive = document.getElementById("btn-stats-res");

BotonIngresos.addEventListener("click", function () {
  BotonIngresos.style.color = "red";
  BotonStats.style.color = "white";
  VentanaIngresos.style.display = "block";
  VentanaStats.style.display = "none";
});

BotonIngresosResponsive.addEventListener("click", function () {
  BotonIngresos.style.color = "red";
  BotonStats.style.color = "white";
  VentanaIngresos.style.display = "block";
  VentanaStats.style.display = "none";
});

BotonStats.addEventListener("click", function () {
  BotonIngresos.style.color = "white";
  BotonStats.style.color = "red";
  VentanaIngresos.style.display = "none";
  VentanaStats.style.display = "block";
});

BotonStatsResponsive.addEventListener("click", function () {
  BotonIngresos.style.color = "white";
  BotonStats.style.color = "red";
  VentanaIngresos.style.display = "none";
  VentanaStats.style.display = "block";
});

///////////////////////////////////////////////////////////////////
//OBTENER DATOS DEL FORM AL DAR SUBMIT Y GUARDARLOS EN OBJETO
$("#formulario-ingresos").submit(function (e) {
  const DatosIngreso = {
    rol: $("#selector").val(),
    correo: $("#correo").val(),
    pass: $("#password").val(),
    nombrePersonal: $("#nombre").val(),
  };
  $.post("ingresos.php", DatosIngreso, function (response) {
    obtenerUsuarios();
    Stats();
    $("#formulario-ingresos").trigger("reset");
  });

  e.preventDefault();
});

//MOSTRAR LOS USUARIOS Y ELIMINARLOS
function obtenerUsuarios() {
  $.ajax({
    url: "deletes.php",
    type: "GET",
    success: function (response) {
      let usuarios = JSON.parse(response);
      let template = "";
      template += '<option value="">Eliga una opcion</option>';
      usuarios.forEach((usuarios) => {
        template += `
                <option value="${usuarios.correo}"> ${usuarios.nombre_personal} || ${usuarios.correo}</option>
                
                `;
      });
      $("#selector2").html(template);
    },
  });
}

obtenerUsuarios();

$("#formulario-delete").submit(function (e) {
  const EliminarUsuario = {
    correo: $("#selector2").val(),
  };
  $.post("deletes.php", EliminarUsuario, function (response) {
    obtenerUsuarios();
    Stats();
    $("#formulario-delete").trigger("reset");
  });

  e.preventDefault();
});

//ESTADISTICAS

function Stats() {

  $.ajax({
    url: "personal.php",
    type: "GET",
    success: function total(response) {
      let totalPersonal = JSON.parse(response);
      $(".total-personal").html(
        "Total de personal en SISGRAN:" + " " + totalPersonal
      );
    },
  });

  //ADMIN
  $.ajax({
    url: "admin.php",
    type: "GET",
    success: function (response1) {
      let totaladmin = JSON.parse(response1);
      $(".admin").width(totaladmin + "%");
      $(".admin-info").html(totaladmin + "%" + "</br>" + "Administradores");
      console.log(response1);
    },
  });
  //DIRECTIVO
  $.ajax({
    url: "directivo.php",
    type: "GET",
    success: function (response1) {
      let totaladmin = JSON.parse(response1);
      $(".directivo").width(totaladmin + "%");
      $(".directivo-info").html(totaladmin + "%" + "</br>" + "Directivos");
    },
  });
  //INFORMATICO
  $.ajax({
    url: "info.php",
    type: "GET",
    success: function (response1) {
      let totaladmin = JSON.parse(response1);
      $(".informatico").width(totaladmin + "%");
      $(".informatico-info").html(totaladmin + "%" + "</br>" + "Informaticos");
    },
  });
  ///REPARTIDOR
  $.ajax({
    url: "repartidor.php",
    type: "GET",
    success: function (response1) {
      let totaladmin = JSON.parse(response1);
      $(".repartidor").width(totaladmin + "%");
      $(".repartidor-info").html(totaladmin + "%" + "</br>" + "Repartidores");
    },
  });
  //VENDEDOR
  $.ajax({
    url: "vendedor.php",
    type: "GET",
    success: function (response1) {
      let totaladmin = JSON.parse(response1);
      $(".vendedor").width(totaladmin + "%");
      $(".vendedor-info").html(totaladmin + "%" + "</br>" + "Vendedores");
    },
  });
}

Stats();
