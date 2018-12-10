
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



function deleteTareas(){
  $(".borrar").toggleClass("shake-little shake-constant");
  $(".color").toggleClass("danger-color");
  $(".button-borrar").toggle();
}

function deleteTarea($id){

  $.ajax({
    url: "../AgregarTareas/eliminarTarea",
    type: "post",
    data: {
      id: $id
    },
    success: function(data){

      if(JSON.parse(data).error){

        $.confirm({ icon: 'fa fa-times',title: '<strong>Error</strong><br>',theme: 'supervan',content: 'Error al eliminar la tarea.',type: 'red',buttons: {
                  Aceptar: function (e,data) {

                    setTimeout(function(){window.location.reload(1);},1000);
                  } 
              }});
 

      }else{


         $.confirm({ icon: 'fa fa-check',title: '<strong>Realizado</strong><br>',theme: 'supervan',content: 'Eliminación con éxito',type: 'green',buttons: {
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



function editTarea($tareaId, $descripcion, $requisitos, $condiciones, $fechaEntrega, $estado){
  //console.log($tareaId, $descripcion, $requisitos, $condiciones, $fechaEntrega);
  var requisitos = JSON.parse($requisitos);
  var condiciones = JSON.parse($condiciones);

  requisitos.forEach((requisito, index) => {
    var checkbox = $('<input data-nombre="'+requisito.nombre+'" name="requisitos" id="req'+index+'" type="checkbox" class="form-check-input" '+(requisito.estado ? "checked": "")+' />');
    var label = $('<label for="req'+index+'"></label>');
    var requisitoTexto = $('<div class="col-8 mt-2">'+requisito.nombre+'</div>');
    var colRequisito = $('<div class="col text-right"></div>').append(checkbox, label);
    var row = $('<div class="row"></div>').append(requisitoTexto, colRequisito);
    $('#requisitos-editar').append(row);
    //console.log(row);
  });
  
  condiciones.forEach((condicion, index) => {
    var checkbox = $('<input data-nombre="'+condicion.nombre+'" name="condiciones" id="con'+index+'" type="checkbox" class="form-check-input" '+(condicion.estado ? "checked": "")+' />');
    var label = $('<label for="con'+index+'"></label>');
    var condicionTexto = $('<div class="col-8 mt-2">'+condicion.nombre+'</div>');
    var colCondicion = $('<div class="col text-right"></div>').append(checkbox, label);
    var row = $('<div class="row"></div>').append(condicionTexto, colCondicion);
    $('#condiciones-editar').append(row);
    //console.log(row);
  });

  //console.log(requisitos, condiciones);
  $('#desc-editar').val($descripcion);
  $('#tarea_id').val($tareaId);
  $('#fecha-entrega-editar').val($fechaEntrega.split(' ')[0]);
  $('#estado-tarea-editar').val($estado).material_select();
  $('#modal-editar-tarea').modal();
}

function editTareas(){
  $(".editar").toggleClass("shake-little shake-constant");
  $(".color").toggleClass("warning-color");
  $(".button-editar").toggle();
}

function editarTarea(){
  var descripcion = $('#desc-editar').val();
  var id = $('#tarea_id').val();
  var fechaEntrega = $('#fecha-entrega-editar').val();
  var estadoTarea = $('#estado-tarea-editar').val();

  var condiciones = $("input[name^=condiciones]");
  var requisitos = $("input[name^=requisitos]");

  var condicionesData = [];
  var requisitosData = [];
  //console.log(condiciones, requisitos);
  condiciones.each((index, elem)=>{
    condicionesData.push( {nombre: elem.getAttribute('data-nombre'), estado: elem.checked} );
  });
  requisitos.each((index, elem)=>{
    requisitosData.push( {nombre: elem.getAttribute('data-nombre'), estado: elem.checked} );
    //console.log(elem.getAttribute('data-nombre'));

  });


  $.ajax({
    url: "../AgregarTareas/editarTarea",
    type: "post",
    data: {
      id: id,
      descripcion: descripcion,
      fechaEntrega: fechaEntrega,
      estadoTarea: estadoTarea,
      condiciones: JSON.stringify(condicionesData),
      requisitos: JSON.stringify(requisitosData)
    },
    success: function(data){

      //console.log(data);
      if(JSON.parse(data).error){

        $.confirm({ icon: 'fa fa-times',title: '<strong>Error</strong><br>',theme: 'supervan',content: 'Error al editar la tarea.',type: 'red',buttons: {
                  Aceptar: function (e,data) {

                    setTimeout(function(){window.location.reload(1);},1000);
                  } 
              }});
 

      }else{


         $.confirm({ icon: 'fa fa-check',title: '<strong>Realizado</strong><br>',theme: 'supervan',content: 'Edición con éxito',type: 'green',buttons: {
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
  //console.log(condicionesData, requisitosData);
}

/*
, $nodoId, $descripcion, $condiciones, $requisitos, $estadoTarea
  console.log($tareaId, $nodo, $descripcion, $condiciones, $requisitos, $estadoTarea);
, 
                                                            <?php echo "'".$row['requisitos']."'" ?>
*/
