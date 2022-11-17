
const btn = document.querySelector('.user');
const box = document.getElementsByClassName('settingsUserList')
var op = 0;
$(btn).on('click', ()=>{
   if(op == 0){
    $(box).css("display","block")
    op = 1
   }else{
    $(box).css("display","none")
    op = 0
   }
})


