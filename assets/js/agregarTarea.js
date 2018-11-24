
var req = [];

var reqString =[];

var con = [];

var conString =[];


agregarRequisitos = function(){
 

  var requ = $("#req").val();

  reqString.push(requ);


  var requisitosString

  var objets = { cumplida: false  };

  objets.nombre = req;

  req.push(objets);

  requisitosString = reqString.join("\n");

  $("#textReq").val(requisitosString);

  $("#req").val("");


}


agregarCondiciones = function(){
 

  var cond = $("#cond").val();

  conString.push(cond);


  var requisitosString

  var objets = { cumplida: false  };

  objets.nombre = con;

  con.push(objets);

  requisitosString = conString.join("\n");

  $("#textCond").val(requisitosString);

  $("#cond").val("");


}


agregarTarea = function(){

  var descripcion  = $("#desc").val();
  var fecha        = $("#fechaIn").val();



  $.ajax({
      type: 'POST',
      url:  "../AgregarTarea/agregarTarea",
      cache: false,
      async: true,
      dataType: 'json',
      data: {
        descripcion:descripcion,
        fecha:fecha,
        req:req,
        con:con
      },
      success: function(data)
      {

        console.log(data);

        if(data == false){

          $.confirm({ icon: 'fa fa-times',title: '<strong>Error</strong><br>',theme: 'supervan',content: 'Error al agregar tarea.',type: 'red',buttons: {
                    Aceptar: function (e,data) {

                      setTimeout(function(){window.location.reload(1);},1000);
                    } 
                }});
   
 
        }else{


           $.confirm({ icon: 'fa fa-check',title: '<strong>Realizado</strong><br>',theme: 'supervan',content: 'Tarea registrada con exito',type: 'green',buttons: {
                    Aceptar: function (e,data) {
                      setTimeout(function(){window.location.reload(1);},1000);
                     
                    } 
                }});


              

        } 

        
      }
    });



}







