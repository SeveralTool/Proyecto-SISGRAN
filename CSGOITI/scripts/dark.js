//Codigo para leer el modo actual al iniciar la pagina
let modo = localStorage.getItem("mode");

if (modo == 2) {
  noche();
} else {
  dia();
}

$(document).on("click", "#dark-mode", function () {
  console.log(modo);
  if (modo == 1) {
    noche();
    setTimeout(() => {
      modo = 2;
    }, 200);
  } else {
    dia();
    setTimeout(() => {
      modo = 1;
    }, 200);
  }
});

//DARKL MODE

function dia() {
  $("body").css("background", "#000");
  $(".menu-container").css("background", "#000");
  $(".listas-li").css("color", "#fff");
  $("body").css("background", "#000");
  $(".btn-down").css("background", "#000");
  $(".of").css("color", "#fff");
  $(".p-banner").css("color", "#fff");
  $(".box-img-ofertas").css("background", "#000");
  $(".p-pago").css("color", "#fff");
  $(".p").css("color", "#fff");
  $(".settingsUserList").css("background", "#000");
  $(".settingsUserList p").css("color", "#fff");
  $(".settingsUserList-responsive").css("background", "#000");
  $(".settingsUserList-responsive p").css("color", "#fff");
  $(".ventana-carrito").css("background", "#000");
  $("#btn-cerrar-carrito").css("color", "#fff");
  $(".footer-h3").css("color", "#fff");
  $(".footer-nosotros p").css("color", "#fff");
  $(".footer-contacto p").css("color", "#fff");
  $(".footer-contacto p a").css("color", "#fff");
  $(".footer-contacto i").css("color", "#fff");
  $(".mision-h2").css("color", "#fff");
  $(".div1").css("color", "#fff");
  $(".parent2 div").css("color", "#fff");
  $(".card h2").css("color", "#fff");
  $("#form-contacto #sele").css("background", "#000");
  $("#form-contacto #sele").css("color", "#fff");
  $("#mensaje-contacto").css("background", "#000");
  $("#mensaje-contacto").css("color", "#fff");
  $("#form-contacto input").css("color", "#fff");
  $(".producto-carrito").css("color", "#fff");
  $(".precioTotalPedido").css("color", "#fff");
  $(".productos p").css("color", "#fff");
  $(".precioTotal").css("color", "#fff");
  $(".precioTotal p").css("color", "#fff");
  $(".envio-container").css("background", "#000");
  $("#btn-cerrar-envio").css("color", "#fff");
  $(".h3-envio").css("color", "#fff");
  $(".h5-envio").css("color", "#fff");
  $(".box-envio h4").css("color", "#fff");
  $(".sel-fecha-entrega select").css("background", "#000");
  $(".sel-fecha-entrega select").css("color", "#fff");
  $(".nom-fruta").css("color", "#fff");
  $(".cantidad-compra").css("color", "#fff");
  $(".cantidad-compra").css("border", "1px solid #fff");
  $(".p-banner-p").css("color", "#fff");
  $("#barras-menu").css("color", "#fff");
  $("#menu-listas-responsive").css("background", "#000");
  $("#menu-listas-responsive a li").css("color", "#fff");
  $(".input").css("color", "#fff");
  $(".cantidad-compra-catalogo").css("background", "#000");
  $(".cantidad-compra-catalogo").css("color", "#fff");
  $(".cantidad-compra-catalogo").css("border-color", "#fff");
  $(".dark-icon").css("transform", "translateX(15px)");
  $(".dark-icon").css("background", "#aaa998");
  $("#dark-mode").css("background", "#151242");
  $(".box-enCarrito").css("color", "#fff");
  $(".ventana-carrito h4").css("color", "#fff");
  $(".p-a").css("color", "#fff");
  $(".settings div p").css("color", "#fff");
  $(".settings div input").css("color", "#fff");
  $("#user h3 p").css("color", "#fff");
  $("#historial h2").css("color", "#fff");
  $("#pedidos-box").css("color", "#fff");
  $("#en-curso").css("color", "#fff");
  $(".view-productos").css("background", "#000");
  $("#close-prod-pedidos").css("color", "#fff");
  localStorage.setItem("mode", 1);
}

function noche() {
  $("body").css("background", "#000");
  $(".menu-container").css("background-color", "#fff");
  $(".listas-li").css("color", "#000");
  $("body").css("background", "#fff");
  $(".btn-down").css("background", "#fff");
  $(".of").css("color", "#000");
  $(".p-banner").css("color", "#000");
  $(".box-img-ofertas").css("background", "#fff");
  $(".p-pago").css("color", "#000");
  $(".p").css("color", "#000");
  $(".settingsUserList").css("background", "#fff");
  $(".settingsUserList p").css("color", "#000");
  $(".settingsUserList-responsive").css("background", "#fff");
  $(".settingsUserList-responsive p").css("color", "#000");
  $(".ventana-carrito").css("background", "#fff");
  $("#btn-cerrar-carrito").css("color", "#000");
  $(".footer-h3").css("color", "#000");
  $(".footer-nosotros p").css("color", "#000");
  $(".footer-contacto p").css("color", "#000");
  $(".footer-contacto p a").css("color", "#000");
  $(".footer-contacto i").css("color", "#000");
  $(".mision-h2").css("color", "#000");
  $(".div1").css("color", "#000");
  $(".parent2 div").css("color", "#000");
  $(".card h2").css("color", "#000");
  $("#form-contacto #sele").css("background", "#fff");
  $("#form-contacto #sele").css("color", "#000");
  $("#mensaje-contacto").css("background", "#fff");
  $("#mensaje-contacto").css("color", "#000");
  $("#form-contacto input").css("color", "#000");
  $(".producto-carrito").css("color", "#000");
  $(".precioTotalPedido").css("color", "#000");
  $(".productos p").css("color", "#000");
  $(".nombre-vegetal-carrito").css("color", "#000");
  $(".precioTotal").css("color", "#000");
  $(".envio-container").css("background", "#fff");
  $("#btn-cerrar-envio").css("color", "#000");
  $(".h3-envio").css("color", "#000");
  $(".h5-envio").css("color", "#000");
  $(".box-envio h4").css("color", "#000");
  $(".sel-fecha-entrega select").css("background", "#fff");
  $(".sel-fecha-entrega select").css("color", "#000");
  $(".nom-fruta").css("color", "#000");
  $(".cantidad-compra").css("color", "#000");
  $(".p-banner-p").css("color", "#000");
  $("#barras-menu").css("color", "#000");
  $("#menu-listas-responsive").css("background", "#fff");
  $("#menu-listas-responsive a li").css("color", "#000");
  $(".input").css("color", "#000");
  $(".cantidad-compra-catalogo").css("background", "#fff");
  $(".cantidad-compra-catalogo").css("color", "#000");
  $(".cantidad-compra-catalogo").css("border-color", "#000");
  $(".cantidad-compra").css("border", "1px solid #000");
  $(".dark-icon").css("transform", "translateX(-15px)");
  $(".dark-icon").css("background", "#cec23c");
  $("#dark-mode").css("background", "#69e7e7");
  $(".box-enCarrito").css("color", "#000");
  $(".ventana-carrito h4").css("color", "#000");
  $(".p-a").css("color", "#000");
  $(".settings div p").css("color", "#000");
  $(".settings div input").css("color", "#000");
  $("#user h3 p").css("color", "#000");
  $("#historial h2").css("color", "#000");
  $("#pedidos-box").css("color", "#000");
  $("#en-curso").css("color", "#000");
  $(".view-productos").css("background", "#fff");
  $("#close-prod-pedidos").css("color", "#000");
  localStorage.setItem("mode", 2);
}
