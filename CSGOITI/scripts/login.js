$("#form-login").submit(function (e) {
  e.preventDefault();
  let correo = $("#email-login").val();
  let pass = $("#pass-login").val();
  $.post("../Login/PHP/sesion.php", { correo, pass }, function (response) {
    /*
        0 CONTRASEÑA INCORRECTA
        1 CORREO NO EXISTE
        2 EXITOSO WEB Y EMPRESA
        "pendiente" USUARIO PENDIENTYE
        "rechazado" USUARIO RECHAZADO
        "eliminado" USUARIO ELIMINADO
        3 EXITOSO HUERTAS
        4 EXITOSO DIRECTIVO
        5 EXITOSO ADMIN
        6 EXITOSO INFORMATICO
        7 EXITOSO REPARTIDOR
        8 EXITOSO FERIANTE
        */

    if (response === "1") {
      $("#dontExist").html("Este correo no existe en nuestra base de datos");
      $("#form-login").trigger("reset");
      setTimeout(() => {
        $("#dontExist").html("");
      }, 3000);
      ////////
    } else if (response === "0") {
      $("#invalidPass").html("Contraseña incorrecta");
      $("#pass-login").trigger("select");
      setTimeout(() => {
        $("#invalidPass").html("");
      }, 3000);
    } else if (response === "pendiente") {
      $("#dontExist").html("Usuario pendiente de aprobacion");
      $("#form-login").trigger("reset");
      setTimeout(() => {
        $("#dontExist").html("");
      }, 5000);
    } else if (response === "rechazado") {
      $("#dontExist").html("Usuario rechazado por administracion");
      $("#form-login").trigger("reset");
      setTimeout(() => {
        $("#dontExist").html("");
      }, 5000);
    } else if (response === "eliminado") {
      $("#dontExist").html("Este Usuario fue eliminado");
      $("#form-login").trigger("reset");
      setTimeout(() => {
        $("#dontExist").html("");
      }, 5000);
    }
     else if (response === "2") {
      main();
    } else if (response === "3") {
      window.location = "../Login/PHP/huerta/Huerta.php";
    } else if (response === "4") {
      window.location = "../Login/PHP/directivo/Directivo.php";
    } else if (response === "5") {
      window.location = "../Login/PHP/admin/Administrador.php";
    } else if (response === "6") {
      window.location = "../Login/PHP/informatico/Informatico.php";
    } else if (response === "7") {
      window.location = "../Login/PHP/repartidor/Repartidor.php";
    } else if (response === "8") {
      window.location = "../Login/PHP/feriante/feriante.php";
    }
  });
});

function main() {
  window.location = "../main.php";
}

//MOSTRAR Y OCULTAR PASSWORD

const ojo = document.getElementById("pass-login");
const ocultar = document.getElementById("ocultar");
const ver = document.getElementById("mostrar");

function mostrarContrasena() {
  if (ojo.type == "password") {
    ojo.type = "text";
    ocultar.style.display = "block";
    ver.style.display = "none";
  } else {
    ojo.type = "password";
    ocultar.style.display = "none";
    ver.style.display = "block";
  }
}
