function login()
 {

    var correo      = $("#correo").val();
    var contrasena  = $("#contrasena").val();



    $.ajax({
      method: 'POST',
      type: 'POST',
      url:  "index.php/Login/iniciarSesion",
      cache: false,
      async: true,
      contentType: 'application/json',
      dataType: 'json',
      data: {
        correo: correo,
        contrasena: contrasena
      },
      success: function(data)
      {

        console.log('success: ', data);

        
      },
      error: function(err){
        console.log('error: ', err);
      }
    });

}


function registro()
 {

    var nombre        = $(".nombre").val();
    var apellido      = $(".apellido").val();
    var correo1       = $("#correo").val();
    var contrasena1   = $("#contrasena").val();

    alert(nombre);
   

  
    $.ajax({
      type: 'POST',
      url:  "../Login/registro",
      cache: false,
      async: true,
      dataType: 'json',
      data: {
        
        nombre:nombre,
        apellido:apellido,
        correo1: correo1,
        contrasena1: contrasena1
      },
      success: function(data)
      {

        console.log(data);

        if(data == false){

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







