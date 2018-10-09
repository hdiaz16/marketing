function index() {
	

	var nombre = $("#nom").val();
    var proposito = $("#proposito").val();
    var fechaInical = $("#fechaIn").val();
    var fechaFinal = $("#fechaFn").val();


    $.ajax({
      type: 'POST',
      url:  "https://peaceful-dawn-64447.herokuapp.com/usuarios/check" ,
      cache: false,
      async: true,
      dataType: 'json',
      data: {
        nombre: nombre,
        proposito: proposito,
        fechaInical:fechaInical,
        fechaFinal,fechaFinal

      },
      success: function(data)
      {


        if(data.status != true){

          $.confirm({ icon: 'fa fa-times',title: '<strong>Error</strong><br>',theme: 'supervan',content: 'Error al incertar campaña.',type: 'red',buttons: {
                    Aceptar: function (e,data) {

                      setTimeout(function(){window.location.reload(1);},2000);
                    } 
                }});
   
 
        }else{
             $.confirm({ icon: 'fa fa-check',title: '<strong>Realizado</strong><br>',theme: 'supervan',content: '"Los datos se han incertados correctamente"',type: 'green',
            buttons: {


                    Aceptar: function () {

                      /*$.ajax({
                          type: 'POST',
                          url:  "../Dashboard/index",
                          cache: false,
                          async: true,
                          dataType: 'json',
                          data: {
                            data: data.data.id_usuario
                          },
                      });*/

                      window.location.href = "../Dashboard/index/"+data.data.id_usuario; 

                     
                       
                    } 

                }


         });  
              

        } 

        
      }
    });
}