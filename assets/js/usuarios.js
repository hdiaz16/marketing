function addUsuarios()
 {


    var razon     = $("#razon").val();
    var contacto  = $("#contacto").val();
    


    $.ajax({
      type: 'POST',
      url:  "../AgregarEmpresas/addEmpresa",
      cache: false,
      async: true,
      dataType: 'json',
      data: {
        razon: razon,
        contacto: contacto

      },
      success: function(data)
      {

        console.log(data);

        if(data == false){

          $.confirm({ icon: 'fa fa-times',title: '<strong>Error</strong><br>',theme: 'supervan',content: 'Error al registrar la Empresa.',type: 'red',buttons: {
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

function deleteUsuario (){
  




  $(".borrar").toggleClass("shake-little shake-constant");
  $(".color").toggleClass("danger-color");
  $(".button").toggle();

  



}





