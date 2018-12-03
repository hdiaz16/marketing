
function addEmpresa()
{


    var razon     = $("#razon-agregar").val();
    var nombre  = $("#nombre-agregar").val();
    var telefono  = $("#telefono-agregar").val();
    var correo  = $("#correo-agregrar").val();
    var horaInicio  = $("#hora-inicio-agregar").val();
    var horaFin  = $("#hora-fin-agregar").val();
    
    console.log(razon, nombre, telefono, correo, horaFin, horaInicio);
    
    contacto = {
      nombre: nombre,
      telefono: telefono,
      correo: correo,
      horario: horaInicio+" - "+horaFin
    };

    return;


    $.ajax({
      type: 'POST',
      url:  "../AgregarEmpresas/addEmpresa",
      cache: false,
      async: true,
      dataType: 'json',
      data: {
        razon: razon,
        contacto: contacto,
      },
      success: function(data){

        console.log(data);

        if(data == false){

          $.confirm({ icon: 'fa fa-times',title: '<strong>Error</strong><br>',theme: 'supervan',content: 'Error al registrar la Empresa.',type: 'red',buttons: {
                    Aceptar: function (e,data) {

                      setTimeout(function(){window.location.reload(1);},1000);
                    } 
                }});
   
 
        }else{


           $.confirm({ icon: 'fa fa-check',title: '<strong>Realizado</strong><br>',theme: 'supervan',content: 'Registro con éxito',type: 'green',buttons: {
                    Aceptar: function (e,data) {
                         setTimeout(function(){window.location.reload(1);},1000);
                      
                    } 
                }});


              

        } 

        
      },
      error: function(error){
        console.log(error);
      }
    });

}


function deleteEm(){
  

  $(".borrar").toggle("shake-little shake-constant");
  $(".color").toggle("danger-color");
  $(".button-borrar").toggle();


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
  $(".button-editar").toggle();


}







