function addEmpresa()
{

    var adminID = $("#id-admin-crear").val();
    var razonSocial = $("#razon").val();
    var nombre = $("#nombre").val();
    var telefono = $("#telefono").val();
    var correo = $("#correo").val();
    
    var contacto = {
      'nombre': nombre,
      'telefono': telefono,
      'correo': correo
    };
    console.log(adminID, razonSocial, nombre, telefono, correo, contacto);

    $.ajax({
      type: 'POST',
      url:  "../AgregarEmpresas/addEmpresa",
      cache: false,
      async: true,
      dataType: 'json',
      data: {
        adminID: adminID,
        razonSocial: razonSocial,
        contacto: contacto
      },
      success: function(data)
      {

        console.log(data);        

        if(data.error){

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

        
      }
    });

}
//addempresa

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
//asignarEmpresaADMin

//editarAdmins
function editarEmpresas(){
  $(".editar").toggleClass("shake-little shake-constant");
  $(".color").toggleClass("warning-color");
  $(".button-edit").toggle();
}
//editarEmpresas

function editEmpresa($id, $razonSocial, $nombre, $telefono, $correo){
  //console.log($id, $nombres, $apellidos, $correo);
  
  $("#empresa-id").val($id);
  $("#nombres-editar").val($nombre);
  $("#razon-social-editar").val($razonSocial);
  $("#telefono-editar").val($telefono);
  $("#correo-editar").val($correo);

  $('#modal-editar').modal();

}
//editEmpresa

function editarEmpresa(){

  var empresaID = $("#empresa-id").val();
  var nombre = $("#nombres-editar").val();
  var razonSocial = $("#razon-social-editar").val();
  var telefono = $("#telefono-editar").val();
  var correo = $("#correo-editar").val();

  var contacto = {
    nombre: nombre,
    telefono: telefono,
    correo: correo
  };

  console.log(empresaID, nombre, razonSocial, correo, telefono, contacto);

  $.ajax({
      type: 'POST',
      url:  "../empresa/editar",
      cache: false,
      async: true,
      dataType: 'json',
      data: {
        empresaID: empresaID,
        contacto: contacto,
        razonSocial: razonSocial
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
    //AJAX

}
//editarEmpresa


function deleteEmpresas (){
  $(".borrar").toggleClass("shake-little shake-constant");
  $(".color").toggleClass("danger-color");
  $(".button").toggle();
}
//deleteEmpresas

function deleteEmpresa($empresaID){

  $.ajax({
    type: 'POST',
    url:  "../empresa/borrar",
    cache: false,
    async: true,
    dataType: 'json',
    data: {
      empresaID: $empresaID
    },
    success: function(data)
    {

      console.log(data);

      if(data.error){

        $.confirm({ icon: 'fa fa-times',title: '<strong>Error</strong><br>',theme: 'supervan',content: 'Error al borrar empresa.',type: 'red',buttons: {
                  Aceptar: function (e,data) {

                    setTimeout(function(){window.location.reload(1);},1000);
                  } 
              }});
 

      }else{


         $.confirm({ icon: 'fa fa-check',title: '<strong>Realizado</strong><br>',theme: 'supervan',content: 'Borrado con éxito',type: 'green',buttons: {
                  Aceptar: function (e,data) {

                    setTimeout(function(){window.location.reload(1);},1000);
                   
                  } 
              }});


            

      } 

      
    }
  });
  //AJAX

}
//deleteEmpresa
