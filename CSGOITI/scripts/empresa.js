const BotonUser = document.getElementById('btn-user')
const BotonHistorial = document.getElementById('btn-historial')
const BotonUserResponsive = document.getElementById('btn-user-res')
const BotonHistorialResponsive = document.getElementById('btn-historial-res')
const BotonPedidos = document.getElementById('btn-pedidos')
const BotonPedidosResponsive = document.getElementById('btn-pedidos-res')
const VentanaUser = document.getElementById('user')
const VentanaPedidos = document.getElementById('pedidos')
const VentanaHistorial = document.getElementById('historial')


BotonUser.addEventListener('click',function(){
    BotonUser.style.color = "red"
    BotonPedidos.style.color = "white"
    BotonHistorial.style.color = "white"
    BotonUserResponsive.style.color = "red"
    BotonPedidosResponsive.style.color = "white"
    BotonHistorialResponsive.style.color = "white"
    VentanaUser.style.display = "block"
    VentanaPedidos.style.display = "none"
    VentanaHistorial.style.display = "none"
})

BotonUserResponsive.addEventListener('click',function(){
    BotonUserResponsive.style.color = "red"
    BotonPedidosResponsive.style.color = "white"
    BotonHistorialResponsive.style.color = "white"
    BotonUser.style.color = "red"
    BotonPedidos.style.color = "white"
    BotonHistorial.style.color = "white"
    VentanaUser.style.display = "block"
    VentanaPedidos.style.display = "none"
    VentanaHistorial.style.display = "none"
})

BotonPedidos.addEventListener('click',function(){
    BotonUser.style.color = "white"
    BotonPedidos.style.color = "red"
    BotonHistorial.style.color = "white"
    BotonUserResponsive.style.color = "white"
    BotonPedidosResponsive.style.color = "red"
    BotonHistorialResponsive.style.color = "white"
    VentanaUser.style.display = "none"
    VentanaPedidos.style.display = "block"
    VentanaHistorial.style.display = "none"
})

BotonPedidosResponsive.addEventListener('click',function(){
    BotonUserResponsive.style.color = "white"
    BotonPedidosResponsive.style.color = "red"
    BotonHistorialResponsive.style.color = "white"
    BotonUser.style.color = "white"
    BotonPedidos.style.color = "red"
    BotonHistorial.style.color = "white"
    VentanaUser.style.display = "none"
    VentanaPedidos.style.display = "block"
    VentanaHistorial.style.display = "none"
})

BotonHistorial.addEventListener('click', function(){
    BotonUser.style.color = "white"
    BotonPedidos.style.color = "white"
    BotonHistorial.style.color = "red"
    BotonUserResponsive.style.color = "white"
    BotonPedidosResponsive.style.color = "white"
    BotonHistorialResponsive.style.color = "red"
    VentanaUser.style.display = "none"
    VentanaPedidos.style.display = "none"
    VentanaHistorial.style.display = "block"
})

BotonHistorialResponsive.addEventListener('click', function(){
    BotonUserResponsive.style.color = "white"
    BotonPedidosResponsive.style.color = "white"
    BotonHistorialResponsive.style.color = "red"
    BotonUser.style.color = "white"
    BotonPedidos.style.color = "white"
    BotonHistorial.style.color = "red"
    VentanaUser.style.display = "none"
    VentanaPedidos.style.display = "none"
    VentanaHistorial.style.display = "block"
})


$(document).on('click', '#PROD', function(){
    $('.view-productos').css("display", "flex")
})


$(document).on('click', '#close-prod-pedidos', function(){
    $('.view-productos').css("display", "none")
})


//ACTUALIZAR NOMBRE EMPRESA
$(document).on('click', '#nombre', function(e){
    e.preventDefault()
    let valor = $(this)[0].parentElement
    nombre = $(valor).find('input').val()
    if(nombre.length > 1 && nombre.length < 20){
        $.post('update.php',{nombre}, function(response){
            console.log(response)
        })
    }else{
        $('#NOMBRE').val("Ingrese un dato")
        $('#NOMBRE').css("border-color","red")
        setTimeout(() => {
            $('#NOMBRE').val("")    
        }, 3000);
    }
})

//ACTUALIZAR CORREO EMPRESA
$(document).on('click', '#correo', function(e){
    e.preventDefault()
    let valor = $(this)[0].parentElement
    correo = $(valor).find('input').val()
    if(correo.length >= 7 && /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(correo) == true ) {
        $.post('update.php',{correo}, function(response){
            console.log(response)
        })
    }else{
        $('#CORREO').val("Ingrese un correo valido")
        $('#CORREO').css("border-color","red")
        setTimeout(() => {
            $('#CORREO').val("")    
        }, 3000);
    }
})

//ACTUALIZAR PASSWORD EMPRESA
$(document).on('click', '#pass', function(e){
    e.preventDefault()
    let valor = $(this)[0].parentElement
    pass = $(valor).find('input').val()
    if(pass.length > 8 && pass.length < 32){
        $.post('update.php',{pass}, function(response){
        })
    }else{
        $('#PASS').val("")
        $('#PASS').css("border-color","red")
        setTimeout(() => {
            $('#PASS').val("")    
        }, 3000);
    }
})
//ACTUALIZAR DIRECCION EMPRESA
$(document).on('click', '#dir', function(e){
    e.preventDefault()
    let valor = $(this)[0].parentElement
    dir = $(valor).find('input').val()
    if(dir.length > 5 && dir.length < 30){
        $.post('update.php',{dir}, function(response){
        })
    }else{
        $('#DIR').val("Ingrese una direccion valida")
        $('#DIR').css("border-color","red")
        setTimeout(() => {
            $('#DIR').val("")    
        }, 3000);
    }
})
//ACTUALIZAR Nº DE PUERTA EMPRESA
$(document).on('click', '#puerta', function(e){
    e.preventDefault()
    let valor = $(this)[0].parentElement
    puerta = $(valor).find('input').val()
    if(puerta.length > 2 && puerta.length < 7){
        $.post('update.php',{puerta}, function(response){
            console.log(response)
        })
    }else{
        $('#PUERTA').val("")
        $('#PUERTA').css("border-color","red")
        setTimeout(() => {
            $('#PUERTA').val("")    
        }, 3000);
    }
})
//ACTUALIZAR CODIGO POSTAL EMPRESA
$(document).on('click', '#postal', function(e){
    e.preventDefault()
    let valor = $(this)[0].parentElement
    postal = $(valor).find('input').val()
    if(postal.length > 4 && postal.length < 6){
        $.post('update.php',{postal}, function(response){
            console.log(response)
        })
    }else{
        $('#POSTAL').val("")
        $('#POSTAL').css("border-color","red")
        setTimeout(() => {
            $('#POSTAL').val("")    
        }, 3000);
    }
})

//PICK FOTO DE PERFIL

$(document).on('click','.foto', function(){
    let foto = $(this).attr('value')
    $('.foto').css("border-color","black")
    $(this).css("border-color","red")
$.post('update.php',{foto},function(response){
    fotoActual()
})
})

//FOTO DE PERFIL ACTUAL

function fotoActual(){
    let fotoActual = 1
    $.post('update.php',{fotoActual}, function(response){
        
        $.ajax({
            url: 'update.php',
            type: 'POST',
            success: function(response){
                let foto = JSON.parse(response)
                $('.foto-top').attr('src', foto)
                
            }
        })
    })
}
fotoActual()

//TRAER PEDIDOS PENDIENTES Y ARMADOS
function traerPedidos1(){
    $.ajax({
        url: 'pedidos.php',
        type: 'POST',
        dateType: 'text',
        success: function(response){
if(response == "null"){
    $('#pedidos-box').html("Sin Pedidos pendientes")
}else{
    let pedido = JSON.parse(response)
    let template7 = ''
    pedido.forEach(pedido =>{
        template7 += `
        <div class="all-pedidos">
        <p id="pedido" class="p-switch">Nº_Pedido: ${pedido.pedido}</p>
        <div id="datos-pedido">
            <p id="realizado" class="p-switch">Realizado: ${pedido.realizado}</p>
            <p id="entrega" class="p-switch">Se entrega: ${pedido.entrega} de ${pedido.horario}hs</p>
            <p id="precio" class="p-switch">Total: $${pedido.precio}</p>
        </div>
        <p id="productos"><button class="PROD" id="PROD" value="${pedido.pedido}">Ver Productos</button></p>
        <div class="Botoness">
            <p id="estado"><button class="${pedido.estado} p">${pedido.estado}</button></p>
            <p id="canelar"><button id="cancel" value="${pedido.pedido}">Cancelar</button></p>
        </div>
        </div>
        `                
    })

    $('#pedidos-box').html(template7)
}
        }
    })
}
traerPedidos1()


//TRAER PEDIDOS EN CURSO DE ENTREGA
function traerPedidos2(){
    $.ajax({
        url: 'encurso.php',
        type: 'POST',
        dateType: 'text',
        success: function(response){
if(response == "null"){
    $('#en-curso').html("Sin Pedidos en Ruta")
}else{
    let pedido = JSON.parse(response)
    let template8 = ''
    pedido.forEach(pedido =>{
        template8 += `
        <div class="all-pedidos" id="enCurso">
        <p id="pedido" class="p-switch">Nº_Pedido: ${pedido.pedido}</p>
        <div class="datos-pedido">
            <p id="realizado" class="p-switch">Realizado: ${pedido.realizado}</p>
            <p id="entrega" class="p-switch">Se entrega: ${pedido.entrega} de ${pedido.horario}hs</p>
            <p id="precio" class="p-switch">Total: $${pedido.precio}</p>
        </div>
        <p id="productos" ><button class="PROD" id="PROD" value="${pedido.pedido}">Ver Productos</button></p>
        <p id="estado"><button class="${pedido.estado}">${pedido.estado}</button></p>
        <p></p>
        </div>
        `                
    })

    $('#en-curso').html(template8)
}
        }
    })
}
traerPedidos2()

/////////////////////
//CANCELAR PEDIDO SI ESTA PENDIENTE O ARMADO

$(document).on('click','#cancel', function(){
    let pedidoCancelar =  $(this).val()
    $.post('pedidos.php',{pedidoCancelar},function(response){
        traerPedidos1()
        traerHistorial()
    })
} )

/////////////////////
//CONSULTAR PRODUCTOS DE CADA PEDIDO
$(document).on('click', '.PROD', function(){
    let thisProductos = $(this).val()
    
    $.post('productos.php', {thisProductos}, function(response){
        let productos = JSON.parse(response)
        let template9 = ''
        productos.forEach(productos =>{
            template9 += `
            <div class="Productoss">
                <img src="../../../${productos.foto}">
                <p>${productos.vegetal} ${productos.variedad}</p>
                <p>x${productos.cantidad}</p>
            </div>
            `
        })
        $('.PRODUCTOS').html(template9)
    })
})

//////////////////
/////HISTORIAL DE PEDIDOS

function traerHistorial(){
    $.ajax({
        url: 'historial.php',
        type: 'POST',
        dateType: 'text',
        success: function(response){
if(response == "null"){
    $('.historial-pedidos').html("Sin Historial de Pedidos")
}else{
    let historial = JSON.parse(response)
    let template10 = ''
    historial.forEach(historial =>{
        template10 += `
        <div class="all-pedidos" id="enCurso">
        <p id="pedido" class="p-switch">Nº_Pedido: ${historial.pedido}</p>
        <div class="datos-pedido">
            <p id="realizado" class="p-switch">Realizado: ${historial.realizado}</p>
            <p id="entrega" class="p-switch">Se entrega: ${historial.entrega} de ${historial.horario}hs</p>
            <p id="precio" class="p-switch">Total: $${historial.precio}</p>
        </div>
        <p id="productos" ><button class="PROD" id="PROD" value="${historial.pedido}">Ver Productos</button></p>
        <p id="estado"><button class="${historial.estado}">${historial.estado}</button></p>
        <p></p>
        </div>
        ` 
    })
    $('.historial-pedidos').html(template10)
}
        }
    })
}
traerHistorial()

//DELETE ACCOUNT

//DELETE CUENTA
$(document).on('click','#delCuenta', function(){
    $(this).hide()
    $('.delContainer').css("display","flex")
})

$(document).on('click','.no',function(){
    $('.delContainer').css("display","none")
    $('#delCuenta').show()
})

$(document).on('click','.si', function(){
    let cliente = $(this).attr('cliente')
    console.log(cliente)
    console.log(correo)
    $.post('del.php',{cliente}, function(response){
        
        window.location.href='../../../main.php'
    })

})