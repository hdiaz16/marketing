function addCampanas()
 {




    var nombre    = $(".nom").val();
    var objetivo  = $("#objetivo").val();
    var proposito = $("#proposito").val();
    var fechaIn   = $("#fechaIn").val();
    var fechaFn   = $("#fechaFn").val();

  

    $.ajax({
      type: 'POST',
      url:  "../Campanas/addCampanas",
      cache: false,
      async: true,
      dataType: 'json',
      data: {
        nombre: nombre,
        objetivo: objetivo,
        proposito:proposito,
        fechaIn:fechaIn,
        fechaFn: fechaFn
      },
      success: function(data)
      {

        console.log(data);

        if(data  == false){

          $.confirm({ icon: 'fa fa-times',title: '<strong>Error</strong><br>',theme: 'supervan',content: 'Error al agregar la Campaña',type: 'red',buttons: {
                    Aceptar: function (e,data) {

                      setTimeout(function(){window.location.reload(1);},1000);
                    } 
                }});
   
 
        }else{


           $.confirm({ icon: 'fa fa-check',title: '<strong>Realizado</strong><br>',theme: 'supervan',content: 'La Campaña de agrego correctamente.',type: 'green',buttons: {
                    Aceptar: function (e,data) {
                      
                          setTimeout(function(){window.location.reload(1);},1000);
                      
                    } 
                }});


              

        } 

        
      }
    });

}




function deleteCampanas (){
  




  $(".borrar").toggleClass("shake-little shake-constant");
  $(".color").toggleClass("danger-color");
  $(".button").toggle();

  



}