function addAdmin($sysAdminID){
  var nombres = $("input[name=nombres]").val();
  var correo = $("input[name=correo]").val();
  var contrasenia = $("input[name=contrasenia]").val();

  $.ajax({
    type: 'POST',
    url:  "../AgregarAdmin/addAdmin",
    cache: false,
    async: true,
    dataType: 'json',
    data: {
      sysAdminID: $sysAdminID,
      nombres: nombres,
      correo: correo,
      contrasenia: contrasenia

    },
    success: function(data)
    {

      console.log(data);

      if(data.error){

        $.confirm({ icon: 'fa fa-times',title: '<strong>Error</strong><br>',theme: 'supervan',content: 'Error al registrar administrador.',type: 'red',buttons: {
                  Aceptar: function (e,data) {

                    setTimeout(function(){window.location.reload(1);},1000);
                  } 
              }});
 

      }else{


         $.confirm({ icon: 'fa fa-check',title: '<strong>Realizado</strong><br>',theme: 'supervan',content: 'Registro con éxito',type: 'green',buttons: {
                  Aceptar: function (e,data) {

                   
                  } 
              }});


            

      } 

      
    }
  });
  //AJAX

}
//addADMIN
function deleteAdmins (){
  $(".borrar").toggleClass("shake-little shake-constant");
  $(".color").toggleClass("danger-color");
  $(".button").toggle();
}
//deleteADMINS

function deleteAdmin($adminID){

  $.ajax({
    type: 'POST',
    url:  "../AgregarAdmin/deleteAdmin",
    cache: false,
    async: true,
    dataType: 'json',
    data: {
      adminID: $adminID
    },
    success: function(data)
    {

      console.log(data);

      if(data.error){

        $.confirm({ icon: 'fa fa-times',title: '<strong>Error</strong><br>',theme: 'supervan',content: 'Error al borrar administrador.',type: 'red',buttons: {
                  Aceptar: function (e,data) {

                    setTimeout(function(){window.location.reload(1);},1000);
                  } 
              }});
 

      }else{


         $.confirm({ icon: 'fa fa-check',title: '<strong>Realizado</strong><br>',theme: 'supervan',content: 'Borrado con éxito',type: 'green',buttons: {
                  Aceptar: function (e,data) {

                   
                  } 
              }});


            

      } 

      
    }
  });
  //AJAX

}
//deleteADmin

function asignarAdminEmpresa(){
  var $adminID = $('select[name=administradores]')[0].options.selectedIndex;
  var $empresaID = $('select[name=empresas]')[0].options.selectedIndex;
  
  $.ajax({
    type: 'POST',
    url:  "../AgregarAdmin/asignarAdminEmpresa",
    cache: false,
    async: true,
    dataType: 'json',
    data: {
      adminID: $adminID,
      empresaID: $empresaID
    },
    success: function(data)
    {

      console.log(data);

      if(data.error){

        $.confirm({ icon: 'fa fa-times',title: '<strong>Error</strong><br>',theme: 'supervan',content: 'Error al asignar administrador.',type: 'red',buttons: {
                  Aceptar: function (e,data) {

                    setTimeout(function(){window.location.reload(1);},1000);
                  } 
              }});
 

      }else{


         $.confirm({ icon: 'fa fa-check',title: '<strong>Realizado</strong><br>',theme: 'supervan',content: 'Asignación con éxito',type: 'green',buttons: {
                  Aceptar: function (e,data) {

                   
                  } 
              }});


            

      } 

      
    }
  });
  //AJAX
}

/*function addEmpresa()
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

function deleteEmpresa (){
  




  $(".borrar").toggleClass("shake-little shake-constant");
  $(".color").toggleClass("danger-color");
  $(".button").toggle();

  



}
*/





