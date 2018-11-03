function addCM()
 {


    var nombre    = $("#nombre").val();
    var apellido  = $("#apellido").val();
    var correo    = $("#correo").val();
    var contrasena    = $("#contrasena").val();

    


    $.ajax({
      type: 'POST',
      url:  "../AgregarCM/addCM",
      cache: false,
      async: true,
      dataType: 'json',
      data: {
        nombre: nombre,
        apellido: apellido,
        correo:correo,
        contrasena:contrasena

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

function delCM (){
  
   
  $(".borrar").toggleClass("shake-little shake-constant");
  $(".color").toggleClass("danger-color");
  $(".button").toggle();



}

function delCM1(id) {

  
  var id = id;



$.ajax({
      type: 'POST',
      url:  "../AgregarCM/deleteCM",
      cache: false,
      async: true,
      dataType: 'json',
      data: {
       id:id

      },
      success: function(data)
      {

        console.log(data);

        if(data == false){

          $.confirm({ icon: 'fa fa-times',title: '<strong>Error</strong><br>',theme: 'supervan',content: 'No se elimino.',type: 'red',buttons: {
                    Aceptar: function (e,data) {

                      setTimeout(function(){window.location.reload(1);},1000);
                    } 
                }});
   
 
        }else{


           $.confirm({ icon: 'fa fa-check',title: '<strong>Realizado</strong><br>',theme: 'supervan',content: 'Se elimino correctamente',type: 'green',buttons: {
                    Aceptar: function (e,data) {
                         setTimeout(function(){window.location.reload(1);},1000);
                     
                    } 
                }});


              

        } 

        
      }
    });



}









