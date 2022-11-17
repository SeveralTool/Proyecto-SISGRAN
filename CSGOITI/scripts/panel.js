//DIRECTIVOS
const BotonMostrarPanel = document.getElementById('show-panel')
const BotonOcultarPanel = document.getElementById('none-panel')
const PanelBig = document.getElementById('panel-big')
const PanelSmall = document.getElementById('panel-small')
const PanelDatos = document.getElementById('panel-datos')



BotonOcultarPanel.addEventListener('click', function(){
    PanelBig.style.display = "none"
    PanelSmall.style.display = "block"
    PanelDatos.style.left = "5.5%"
    PanelDatos.style.width = "94.5%"
    PanelDatos.style.transition = "all 80ms"
})

BotonMostrarPanel.addEventListener('click', function(){
    PanelBig.style.display = "block"
    PanelSmall.style.display = "none"
    PanelDatos.style.left = "20.5%"
    PanelDatos.style.width  ="79.5%"
    PanelDatos.style.transition = "all 40ms"
})

widthStart = window.innerWidth
if(widthStart <= 1000){
    PanelBig.style.display = "none"
    PanelSmall.style.display = "block"
    PanelDatos.style.left = "5.5%"
    PanelDatos.style.width = "94.5%"
}

