/*
var requisitos = [];

var requisitosString =[];

var condiciones = [];

var condicionesString =[];


agregarRequisitos = function(){
 

  var requisito = $("#req").val();
  var requisitosEnString;
  var objeto = { estado: false, nombre: requisito };
  requisitos.push(objeto);

  requisitosString.push(requisito);
  requisitosEnString = requisitosString.join("\n");
  $("#textReq").val(requisitosString);
  $("#req").val("");


}


agregarCondiciones = function(){
 
  var condicion = $("#cond").val();
  var condicionesEnString;
  condicionesString.push(condicion);
  var objeto = { estado: false, nombre: condicion };


  condiciones.push(objeto);
  condicionesEnString = condicionesString.join("\n");

  $("#textCond").val(requisitosString);

  $("#cond").val("");


}


agregarTareaDos = function(){

  var descripcion  = $("#desc").val();
  var fecha        = $("#fechaIn").val();
  console.log(req, con);
  return;


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
*/

function editTareas(){
  $(".editar").toggleClass("shake-little shake-constant");
  $(".color").toggleClass("warning-color");
  $(".button-editar").toggle();
}

function deleteTareas(){
  console.log("algo");
  $(".borrar").toggleClass("shake-little shake-constant");
  $(".color").toggleClass("danger-color");
  $(".button-borrar").toggle();
}

function editTarea($tareaId){
  console.log(requisitos, condiciones);
  requisitos = [], condiciones = [], requisitosString = [], condicionesString = [];
  console.log($tareaId);
  $('#modal-editar-tarea').modal();
}

/*
, $nodoId, $descripcion, $condiciones, $requisitos, $estadoTarea
  console.log($tareaId, $nodo, $descripcion, $condiciones, $requisitos, $estadoTarea);
, 
                                                            <?php echo "'".$row['requisitos']."'" ?>
*/
