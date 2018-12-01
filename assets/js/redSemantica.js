
var req = [];

var requisitosStringArray =[];

var con = [];

var conString =[];


agregarRequisitos = function(){
 

  var requisito = $("#req").val();

  requisitosStringArray.push(requisito);

  var requisitosString = requisitosStringArray.join('\n');

  var requisitoObjeto = { cumplida: false, nombre: requisito};


  req.push(requisitoObjeto);

  $("#textReq").val(requisitosString);
  
  $("#req").val("");


}


agregarCondiciones = function(){
 

  var cond = $("#cond").val();

  conString.push(cond);


  var condicionesString = conString.join("\n") ;

  var objets = { cumplida: false, nombre: cond  };

  con.push(objets);

  con.push(objets);

  $("#textCond").val(condicionesString);

  $("#cond").val("");


}


agregarTarea = function(){


  var descripcion  = $("#desc").val();
  var fecha        = $("#fechaIn").val();
  var nodo         = $("#nodo_id").val();
  var red          = $("#red_id").val();
  

  console.log(red, nodo, descripcion, fecha, JSON.stringify(req),
   JSON.stringify(con));

  $.ajax({
      type: 'POST',
      url:  "../AgregarTareas/agregarTarea",
      cache: false,
      //async: true,
      dataType: 'json',
      data: {
        red:red,
        nodo:nodo,
        descripcion:descripcion,
        fecha:fecha,
        req:JSON.stringify(req),
        con:JSON.stringify(con)
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

        
      },
      error: (error) => {
        console.log(error);
      }
    });



}







