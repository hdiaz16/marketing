function login()
 {


    var usuario = $("#usuario").val();
    var contrasena = $("#contrasena").val();

 


    $.ajax({
      type: 'POST',
      url:  "../Login/iniciarSesion",
      cache: false,
      async: true,
      dataType: 'json',
      data: {
        usuario: usuario,
        contrasena: contrasena
      },
      success: function(data)
      {

        console.log(data);

        if(data  == false){

          $.confirm({ icon: 'fa fa-times',title: '<strong>Error</strong><br>',theme: 'supervan',content: 'Error al iniciar sesion.',type: 'red',buttons: {
                    Aceptar: function (e,data) {

                      setTimeout(function(){window.location.reload(1);},1000);
                    } 
                }});
   
 
        }else{


           $.confirm({ icon: 'fa fa-check',title: '<strong>Realizado</strong><br>',theme: 'supervan',content: 'Gracias por iniciar sesion en el Sistema de Marketin Digital',type: 'green',buttons: {
                    Aceptar: function (e,data) {

                      window.location.href = "../Dashboard/index/";
                    } 
                }});


              

        } 

        
      }
    });

}


function registro()
 {


    var usuario1 = $(".usuario1").val();
    var contrasena1 = $(".cotrasena1").val();

    


    $.ajax({
      type: 'POST',
      url:  "../Login/registro",
      cache: false,
      async: true,
      dataType: 'json',
      data: {
        usuario1: usuario1,
        contrasena1: contrasena1
      },
      success: function(data)
      {

        console.log(data);

        if(data != true){

          $.confirm({ icon: 'fa fa-times',title: '<strong>Error</strong><br>',theme: 'supervan',content: 'Error al registrar el usuario.',type: 'red',buttons: {
                    Aceptar: function (e,data) {

                      setTimeout(function(){window.location.reload(1);},1000);
                    } 
                }});
   
 
        }else{


           $.confirm({ icon: 'fa fa-check',title: '<strong>Realizado</strong><br>',theme: 'supervan',content: 'Registro con exito',type: 'green',buttons: {
                    Aceptar: function (e,data) {

                     
                    } 
                }});


              

        } 

        
      }
    });

}







