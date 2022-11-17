// //ENVIAR CORREO EN PAG DE CONTACTO

$(document).on('click','#sendConsulta',()=>{
  if($("#nombre-contacto").val().length < 2 || $("#nombre-contacto").val().length > 20){
    $("#error").html("Nombre entre 2 y 20 caracteres")
    setTimeout(() => {
    $("#error").html("")
    }, 5000);
  }else{
    if(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/.test( $("#correo-contacto").val()) == true){
      if($('#tel-contacto').val().length == 9){
        if(Number($("#sele").val()) == 0){
        $("#error").html("Seleccione un asunto")
        setTimeout(() => {
        $("#error").html("")
        }, 5000); 
        }else{
          if($("#mensaje-contacto").val().length < 10){
            $("#error").html("Describa su mensaje detalladamente")
            setTimeout(() => {
            $("#error").html("")
            }, 5000); 
          }else{
            const DatosUsuario = {
            name: $("#nombre-contacto").val(),
            from_email: $("#correo-contacto").val(),
            temaa: $("#sele").val(),
            message: $("#mensaje-contacto").val(),
            contact: $('#tel-contacto').val(),
            };
            var userid = "lc-wmPJ_BeodJHVyM";
            emailjs.init(userid);
            emailjs.send("service_opdgfo6","template_ylqeb5i",{
            from_name: DatosUsuario.name,
            tema: DatosUsuario.temaa,
            message: DatosUsuario.message,
            from_email: DatosUsuario.from_email,
            contact: DatosUsuario.contact,
            })
            .then(
            function (response) {
            console.log("SUCCESS!", response.status, response.text);
            $('#sendConsulta').html("ENVIADO")
            $("#nombre-contacto").val("")
            $("#correo-contacto").val("")
            $("#sele").val(0)
            $("#mensaje-contacto").val("")
            $('#tel-contacto').val("")
              setTimeout(() => {
            $('#sendConsulta').hide()
              }, 5000);
            setTimeout(() => {
              $('#sendConsulta').html("ENVIAR")
              $('#sendConsulta').param("disabled", false)
            }, 200000);
            },
            function (error) {
            console.log("FAILED...", error);
            $('#sendConsulta').html("ERROR")
            $("#nombre-contacto").val("")
            $("#correo-contacto").val("")
            $("#sele").val(0)
            $("#mensaje-contacto").val("")
            $('#tel-contacto').val("")
            setTimeout(() => {
              $('#sendConsulta').html("ENVIAR")
            }, 200000);
            }
            );
          }
        }
      }else{
        $("#error").html("Telefono incorrecto")
        setTimeout(() => {
        $("#error").html("")
        }, 5000);  
      }
    }else{
      $("#error").html("Email invalido")
      setTimeout(() => {
      $("#error").html("")
      }, 5000);
    }
  }
  })
















// const btn = document.getElementById('sendConsulta');

// document.getElementById('form')
//  .addEventListener('submit', function(event) {
//    event.preventDefault();

//    btn.value = 'Sending...';

//    const serviceID = 'default_service';
//    const templateID = 'template_ylqeb5i';

//    emailjs.sendForm(serviceID, templateID, this)
//     .then(() => {
//       btn.value = 'Send Email';
//       alert('Sent!');
//     }, (err) => {
//       btn.value = 'Send Email';
//       alert(JSON.stringify(err));
//     });
// });



// $("#form-contacto").submit(function (e) {
//   console.log("acaa")
//     var DatosUsuario = {
//         name: $("#nombre-contacto").val(),
//    from_name: $("#correo-contacto").val(),
//   temaa: $("#sele").val(),
//  message: $("#mensaje-contacto").val(),
//  tel: $('#contact').val(),
//   };
//   const email = "greensoftiti@gmail.com";
// function sendMessage(DatosUsuario,email, callback) {
//   // Using the js-base64 library for encoding:
//   // https://www.npmjs.com/package/js-base64
//   var base64EncodedEmail = Base64.encodeURI(email);
//   var request = gapi.client.gmail.users.messages.send({
//     'userId': userId,
//     'resource': {
//       'from_name': DatosUsuario[0],
//       'from_email':DatosUsuario[1],
//       'tema': DatosUsuario[2],
//       'mensaje':DatosUsuario[3],
//       'contact':DatosUsuario[4],
//     }
//   });
//   request.execute(callback);
// }

// })