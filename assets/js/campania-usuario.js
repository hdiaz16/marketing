function addUsuarios()
{


    var user     = $("#selUser").val();
    var campania  = $("#selCamp").val();
 
     console.log (user);


    $.ajax({
      type: 'POST',
      url:  "../AgregarUsuarios/campaniaUser",
      cache: false,
      async: true,
      dataType: 'json',
      data: {
        user: user,
        campania: campania

      },
      success: function(data)
      {

        

        if(data == false){

          $.confirm({ icon: 'fa fa-times',title: '<strong>Error</strong><br>',theme: 'supervan',content: 'Error al registrar el Usuario a la Campaña.',type: 'red',buttons: {
                    Aceptar: function (e,data) {

                      setTimeout(function(){window.location.reload(1);},1000);
                    } 
                }});
   
 
        }else{


           $.confirm({ icon: 'fa fa-check',title: '<strong>Realizado</strong><br>',theme: 'supervan',content: 'Se registro con exito al Usuario a la Campaña.',type: 'green',buttons: {
                    Aceptar: function (e,data) {
                         setTimeout(function(){window.location.reload(1);},1000);
                      
                    } 
                }});


              

        } 

        
      }
    });

}