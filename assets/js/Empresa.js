function addEmpresa()
{


    var razon     = $("#razon").val();
    var contacto  = $("#contacto").val();
    var telefono  = $("#telefono").val();
    


    $.ajax({
      type: 'POST',
      url:  "../AgregarEmpresas/addEmpresa",
      cache: false,
      async: true,
      dataType: 'json',
      data: {
        razon: razon,
        contacto: contacto,
        telefono:telefono

      },
      success: function(data)
      {

        

        if(data == false){

          $.confirm({ icon: 'fa fa-times',title: '<strong>Error</strong><br>',theme: 'supervan',content: 'Error al registrar la Empresa.',type: 'red',buttons: {
                    Aceptar: function (e,data) {

                      setTimeout(function(){window.location.reload(1);},1000);
                    } 
                }});
   
 
        }else{


           $.confirm({ icon: 'fa fa-check',title: '<strong>Realizado</strong><br>',theme: 'supervan',content: 'Registro con exito',type: 'green',buttons: {
                    Aceptar: function (e,data) {
                         setTimeout(function(){window.location.reload(1);},1000);
                      
                    } 
                }});


              

        } 

        
      }
    });

}


function deleteEm(){
  

  $(".borrar").toggle("shake-little shake-constant");
  $(".color").toggle("danger-color");
  $(".button").toggle();


}





function delEmpresa1 (id) {

  
  var id = id;

    $.ajax({
          type: 'POST',
          url:  "../AgregarEmpresas/deleteEmpresa",
          cache: false,
          async: true,
          dataType: 'json',
          data: {
           id:id

          },
          success: function(data)
          {

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



function editarEmp() {
  
}



function editar(){
  

  $(".borrar1").toggle("shake-little shake-constant");
  $(".color").toggle("warning-color");
  $(".button1").toggle();


}







