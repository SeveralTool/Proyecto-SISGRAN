// BOTON PARA CERRAR MENU RESPONSIVE (LISTAS)

let botonCerrarMenu = document.getElementById('xClose');
let menuResponsive = document.getElementById('menu-listas-responsive');
let botonAbrirMenu = document.getElementById('barras-menu');

//EVENTO ABRIR
botonAbrirMenu.addEventListener('click',function open(){
    menuResponsive.style.display = "grid"
})
//EVENTO CERRAR
$(document).on('click','.cerrar-menu',function(){
    $('#menu-listas-responsive').css("display","none")
})
