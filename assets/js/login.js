function login()
 {


    var usuario = $("#correo").val();
    var contrasena = $("#contrasena").val();


    $.ajax({
      type: 'POST',
      url:  "inicioSesion" ,
      cache: false,
      async: true,
      dataType: 'html',
      data: {
        usuario: usuario,
        contrasena: contrasena
      },
      success: function(html)
      {
        console.log(html);
        
        var respuesta = JSON.parse(html);

        switch(respuesta.error){

          case true:
         
            $.confirm({ icon: 'fa fa-times',title: '<strong>Error</strong><br>',theme: 'supervan',content: 'Error al iniciar sesion.',type: 'red',buttons: {
            				Aceptar: function (e,data) {

						     	setTimeout(function(){window.location.reload(1);},2000);
            				} 
        				}});
            break;  

          case false:
            //$.notify({title:"<strong>Realizado</strong><br>", message:"Gracias por iniciar sesion, <br> ahora puede ver sus productos seleccionados.",icon: 'fa fa-check'}, {type:"info",z_index:5000});
		      $.confirm({ icon: 'fa fa-check',title: '<strong>Realizado</strong><br>',theme: 'supervan',content: '"Gracias por iniciar sesion, <br> ahora puede ver sus productos seleccionados."',type: 'green',
		      	buttons: {
            				Aceptar: function (e,data) {

								setTimeout(function(){window.location.reload(1);},2000);
            				} 
        				}
          });

            break;
        }
      }
    });

}