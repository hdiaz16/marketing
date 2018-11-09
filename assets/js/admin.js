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
                    setTimeout(function(){window.location.reload(1);},1000);
                   
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
  var $adminID = $('select[name=administradores]')[0].selectedOptions[0].value;
  var $empresaID = $('select[name=empresas]')[0].selectedOptions[0].value;
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
                    setTimeout(function(){window.location.reload(1);},1000);
                   
                  } 
              }});


            

      } 

      
    }
  });
  //AJAX
}

function editAdmins(){
  $(".editar").toggleClass("shake-little shake-constant");
  $(".color").toggleClass("warning-color");
  $(".button").toggle();
}

function editAdmin($id, $nombres, $apellidos, $correo){
  //console.log($id, $nombres, $apellidos, $correo);
  
  $("#usuario-id").val($id);
  $("#nombres-editar").val($nombres);
  $("#apellidos-editar").val($apellidos);
  $("#correo-editar").val($correo);

  $('#modal-editar').modal();

}
//editAdmin

function editarAdmin(){
  var usuarioID = $("#usuario-id").val();
  var nombres = $("#nombres-editar").val();
  var apellidos = $("#apellidos-editar").val();
  var correo = $("#correo-editar").val();
  var contrasenia = $("#contrasenia-editar").val();
  console.log(usuarioID, nombres, apellidos, correo, contrasenia);

  $.ajax({
      type: 'POST',
      url:  "../usuario/editar",
      cache: false,
      async: true,
      dataType: 'json',
      data: {
        usuarioID: usuarioID,
        nombres: nombres,
        apellidos: apellidos,
        correo: correo,
        contrasenia: contrasenia
      },
      success: function(data)
      {

        console.log(data);

        if(data.error){

          $.confirm({ icon: 'fa fa-times',title: '<strong>Error</strong><br>',theme: 'supervan',content: 'Error al editar administrador.',type: 'red',buttons: {
                    Aceptar: function (e,data) {

                      setTimeout(function(){window.location.reload(1);},1000);
                    } 
                }});
   
 
        }else{

           $.confirm({ icon: 'fa fa-check',title: '<strong>Realizado</strong><br>',theme: 'supervan',content: 'Administrador editado con éxito',type: 'green',buttons: {
                    Aceptar: function (e,data) {
                      setTimeout(function(){window.location.reload(1);},1000);
                     
                    } 
                }});


              

        } 

        
      }
    });
}
//editar admin

/*





*/




