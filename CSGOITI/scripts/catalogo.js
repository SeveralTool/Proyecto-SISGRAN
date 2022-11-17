//BUSCADOR
$('#search').keyup( function(){
    let search = $('.input').val();
    $.post('busqueda.php',{search}, function (response) {
            let response1 = JSON.parse(response)
            let template = ''
            response1.forEach(response1 => {
                template += `
                <div class="box-img-ofertas">
                    <img src="${response1.foto}" alt="" class="img-oferta">
                    <p class="nom-fruta"> ${response1.nombreVegetal} <br> ${response1.nombreVariedad} </p>
                    <p class="precio" > $${response1.precio} ${response1.unidad} </p> <br>
                    <input type="number"  value="1" min="1" max="${response1.stock}" id="cantidad-compra"> 
        
                    <p id="stock"> ${response1.stock + " disponibles"}</p> <br>
                    <div class="boton">
                        <a class="a-boton agregarCarrito" Vegetal="${response1.id_vegetal}" Variedad="${response1.id_variedad}" 
                        stock="${response1.stock}"  precio="${response1.precio}">AÑADIR
                        <i class="fas fa-cart-arrow-down"></i> <br>
                        </a>
                    </div>
                    </div>
                </div>
                `
            });
            
            $('.box-1').html(template)
        })
    })

/*
    window.sr = ScrollReveal()
    sr.reveal('.box-img-ofertas',{
        reset: true,
        duration: 500,
        origin: 'bottom',
        distance: '300px',
    })

    widthStart = window.innerWidth
    console.log(widthStart)
        if(widthStart <= 1020){
            sr.clean('.box-img-ofertas')
        }
     */

setTimeout(  (acorderon) => {
    $('.i1').css("backdrop-filter"," blur(5px)")
    setTimeout(() => {
        $('.i1').css("backdrop-filter"," blur(0px)")
    }, 1000);
    $('.i2').css("backdrop-filter"," blur(5px)")
    setTimeout(() => {
        $('.i2').css("backdrop-filter"," blur(0px)")
    }, 1400);
    $('.i3').css("backdrop-filter"," blur(5px)")
    setTimeout(() => {
        $('.i3').css("backdrop-filter"," blur(0px)")
    }, 1800);
    $('.i4').css("backdrop-filter"," blur(5px)")
    setTimeout(() => {
        $('.i4').css("backdrop-filter"," blur(0px)")
    }, 2200);
    $('.i5').css("backdrop-filter"," blur(5px)")
    setTimeout(() => {
        $('.i5').css("backdrop-filter"," blur(0px)")
    }, 2600);
    $('.i6').css("backdrop-filter"," blur(5px)")
    setTimeout(() => {
        $('.i6').css("backdrop-filter"," blur(0px)")
    },3000);
    $('.i7').css("backdrop-filter"," blur(5px)")
    setTimeout(() => {
        $('.i7').css("backdrop-filter"," blur(0px)")
    },3400);
    $('.i8').css("backdrop-filter"," blur(5px)")
    setTimeout(() => {
        $('.i8').css("backdrop-filter"," blur(0px)")
    }, 3800);
    $('.i9').css("backdrop-filter"," blur(5px)")
    setTimeout(() => {
        $('.i9').css("backdrop-filter"," blur(0px)")
    }, 4200);
    $('.i10').css("backdrop-filter"," blur(5px)")
    setTimeout(() => {
        $('.i10').css("backdrop-filter"," blur(0px)")
    },4600);
    
},1000);


    
