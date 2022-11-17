function traerSoloFecha() {
  $.ajax({
    url: "envio/2day.php",
    type: "POST",
    dataType: "text",
    date: "response",
    success: function (response) {
      let DosDias = JSON.parse(response);
      $("#2dias").val(DosDias);
    },
  });
}
traerSoloFecha();

function traerSoloFecha2() {
  $.ajax({
    url: "envio/3day.php",
    type: "POST",
    dataType: "text",
    date: "response",
    success: function (response) {
      let TresDias = JSON.parse(response);
      $("#3dias").val(TresDias);
    },
  });
}
traerSoloFecha2();

function traerFecha() {
  $.ajax({
    url: "envio/envio.php",
    type: "POST",
    dataType: "text",
    date: "response",
    success: function (response) {
      let DosDias = JSON.parse(response);
      let nDIA = JSON.parse(response[1]);
      let numeroDIA1 = JSON.parse(response[3]);
      let numeroDIA2 = JSON.parse(response[4]);
      let nMES1 = JSON.parse(response[6]);
      let nMES2 = JSON.parse(response[7]);
      const dia = [
        "",
        "Lunes",
        "Martes",
        "Miercoles",
        "Jueves",
        "Viernes",
        "Sabado",
        "Domingo",
      ];
      const mes = [
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
      let d = dia[nDIA];

      if (nMES1 === 0) {
        let mess = nMES1 + nMES2;
        let m = mes[mess];
        $("#2dias").html(d + " " + numeroDIA1 + numeroDIA2 + " de " + m);
      } else {
        let mess = "" + nMES1 + nMES1;
        let m = mes[mess - 1];
        $("#2dias").html(d + " " + numeroDIA1 + numeroDIA2 + " de " + m);
      }
    },
  });
}

traerFecha();

function traerFecha2() {
  $.ajax({
    url: "envio/envio2.php",
    type: "POST",
    dataType: "text",
    date: "response",
    success: function (response) {
      let TresDias = JSON.parse(response);
      let nDIA = JSON.parse(response[1]);
      let numeroDIA1 = JSON.parse(response[3]);
      let numeroDIA2 = JSON.parse(response[4]);
      let nMES1 = JSON.parse(response[6]);
      let nMES2 = JSON.parse(response[7]);
      const dia = [
        "",
        "Lunes",
        "Martes",
        "Miercoles",
        "Jueves",
        "Viernes",
        "Sabado",
        "Domingo",
      ];
      const mes = [
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
      let d = dia[nDIA];

      if (nMES1 === 0) {
        let mess = nMES1 + nMES2;
        let m = mes[mess];
        $("#3dias").html(d + " " + numeroDIA1 + numeroDIA2 + " de " + m);
      } else {
        let mess = "" + nMES1 + nMES1;
        let m = mes[mess - 1];
        $("#3dias").html(d + " " + numeroDIA1 + numeroDIA2 + " de " + m);
      }
    },
  });
}
traerFecha2();

/*
setInterval(() => {
    traerFecha()
    traerFecha2()
}, 60000);
*/

//OBTENER VALORES DE LOS SELECT EN ENVIO

$(document).on("click", ".datos-env", function () {
  let datos = $(".datos-env")[0].parentElement.parentElement;
  let PickDia = $(datos).find("#entrega-fecha").val();
  let PickHora = $(datos).find("#rango-hora").val();
  console.log(PickDia);
  console.log(PickHora);
  $.post("envio/update.php", { PickDia, PickHora }, function (response) {
    console.log(response);
  });
});
