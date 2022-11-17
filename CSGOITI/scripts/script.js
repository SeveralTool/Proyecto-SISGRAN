//CARRUSEL MAIN

const carrusel = document.querySelector("#carrusel-inicio");
let carruselsection = document.querySelectorAll(".carrusel-section");
let carruselsectionLast = carruselsection[carruselsection.length -1];

const btnLeft = document.querySelector("#btn-left");
const btnRight = document.querySelector("#btn-right");

carrusel.insertAdjacentElement(`afterbegin`, carruselsectionLast);

function right(){
    let carruselsectionFirst = document.querySelectorAll(".carrusel-section")[0];
    carrusel.style.marginLeft = "-200%";
    carrusel.style.transition = "all 3s";

    setTimeout(function(){
        carrusel.style.transition = "none";
        carrusel.insertAdjacentElement(`beforeend`, carruselsectionFirst);
        carrusel.style.marginLeft = "-100%";
    }, 3000);
}

btnRight.addEventListener(`click`, function(){
    right();
});

function left(){
    let carruselsection = document.querySelectorAll(".carrusel-section");
    let carruselsectionLast = carruselsection[carruselsection.length -1];
    carrusel.style.marginLeft = "0";
    carrusel.style.transition = "all 3s";
    setTimeout(function(){
        carrusel.style.transition = "none";
        carrusel.insertAdjacentElement(`afterbegin`, carruselsectionLast);
        carrusel.style.marginLeft = "-100%";
    }, 3000);
}

btnLeft.addEventListener(`click`, function(){
    left();
});

setInterval(function(){
    right();
}, 7000);

//SCROL REVEAL PARA MAIN

// window.sr = ScrollReveal()

//     sr.reveal('.menu-container',{
//         reset: true,
//         duration: 1000,
//         origin: 'bottom',
//         distance: '-100px',
        
//     })

//     sr.reveal('.carrusel-inicio',{
//         reset: true,
//         duration: 2000,
//     })

//     sr.reveal('.p-pago',{
//         reset: true,
//         duration: 1000,
//         origin: 'bottom',
//         distance: '-100px',
        
//     })
    
//     sr.reveal('.img-pago',{
//         reset: true,
//         duration: 1000,
//         origin: 'left',
//         distance: '100%',
//     })
    
//     sr.reveal('#logo-img',{
//         reset: true,
//         duration: 1000,
//         rotate:{
//             x: 0,
//             y: 180,
//         }
//     })
    
//     sr.reveal('#logo-img-responsive',{
//         reset: true,
//         delay: 0,
//         duration: 1000,
//         rotate:{
//             x: 0,
//             y: 180,
//         }
//     })

//     sr.reveal('.img-box-2',{
//         reset: true,
//         duration: 1000,
//         origin: 'left',
//         distance: '50%',
//     })        
    
//     sr.reveal('.p',{
//         reset: true,
//         duration: 1000,
//         origin: 'bottom',
//         distance: '50%',
//     }) 

   
    
    widthStart = window.innerWidth
    if(widthStart <= 1020){
        sr.clean('.p')
        sr.clean('.img-box-2')
        sr.clean('.p-pago')
        sr.clean('.img-pago')
    }

$(window).scroll(function() {
    $('.wrapper').each(function(){
    var pos = $(this).offset().top;

    var topOfWindow = $(window).scrollTop();
        if (pos < topOfWindow+400) {
            $(this).addClass("slideUp");
        }
    });
});






