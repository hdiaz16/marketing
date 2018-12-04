    var contenedor, nodos, aristas, data;
    var redId, red = {}, network = {};
    var nodoSeleccionadoId = '';
    var ultimoNodoId = 0;
    var ocultarNodosEliminados = true;

    var options = {
      edges:{
        arrows: 'to',
        color: 'red',
        scaling:{
          label: true,
        },
        shadow: true,
        smooth: true,
      }
    };

    function clickNodo(values, id, selected, hovering){
        nodoSeleccionadoId = id;
        var nombreNodo;
        nodos.find(
            nodo => {
                if(nodo.id == nodoSeleccionadoId) {
                    nombreNodo = nodo.label;
                }
            });
        //console.log($('.nodo-nombre-modal').html());
        $('.nodo-nombre-modal').html(nombreNodo);
        $('#red_id').val(redId);
        $('#nodo_id').val(nodoSeleccionadoId);
        //console.log($('.nodo-nombre-modal').html());
    }

    function agregarNodo(){
        contenedor = document.getElementById('mynetwork');
        var nodo = {};
        var nuevoNodoId = parseInt(ultimoNodoId) + 1;
        if(nodoSeleccionadoId){
            insertarNodoRed(red, nuevoNodoId);
            ultimoNodoId = nuevoNodoId;
        }

    }

    function eliminarNodo(){
        if(nodoSeleccionadoId == 1)
            return;
        desactivarNodoRecursivo(nodoSeleccionadoId, red.hijos);
        actualizarRed(red);
    }

    function desactivarNodoRecursivo($nodoId, $hijos){
        $hijos.forEach((elem, index) => {
            if(elem.id == $nodoId){
                elem.activado = false;
            }else{
                if(elem.hasOwnProperty('hijos'))
                    desactivarNodoRecursivo($nodoId, elem.hijos);
            }
        });
    }

    function editarNodo(){

        //console.log(red);
        var nombreNodo = $('#nodo-nombre-input-editar').val();
        var idNodo = nodoSeleccionadoId;
        if(idNodo == red.id){
            red.nombre = nombreNodo;
        }else{
            actualizarNodoRecursivo(idNodo, nombreNodo, red.hijos);
        }
        actualizarRed(red);
        //console.log(red);
    }

    function actualizarNodoRecursivo($idNodo, $nombreNodo, $hijos){
        $hijos.forEach((elem, index)=>{
            if(elem.id == $idNodo){
                elem.nombre = $nombreNodo;
            }else{
                if(elem.hasOwnProperty('hijos'))
                    actualizarNodoRecursivo($idNodo, $nombreNodo, elem.hijos);
            }
        });
    }



    function insertarNodoRed($red, $nuevoNodoId){
        //console.log($red);
        var nuevoNodo = {
                nombre: $('#nodo-nombre-input').val(),
                id: $nuevoNodoId,
                activado: true,
                hijos: []
            };

        if(nodoSeleccionadoId == $red.id){
            $red.hijos.push(nuevoNodo);
        }else{
            if($red.hijos.length > 0)
                insertarNodoRedRecursivo($red.hijos, nuevoNodo);
        }
        //console.log($red);
        actualizarRed($red);
    }

    function actualizarRed($redActualizada){
        var campaniaId = document.getElementById('campania-red').value;
        //console.log(campaniaId);
        $.ajax({
            url: '../red/actualizar/'+campaniaId,
            type: 'post',
            data: {
                red: $redActualizada
            },
            success: function(data){
                redId = JSON.parse(data)[0].id;
                red = JSON.parse(JSON.parse(data)[0].red);
                armarRed(red);
            },
            error: function(error){
                console.log(error);
            }
        });
    }

    function insertarNodoRedRecursivo($hijos, $nuevoNodo){    
        $hijos.forEach((elem, index)=>{
            if(elem.id == nodoSeleccionadoId){
                if(elem.hasOwnProperty('hijos'))
                    elem.hijos.push($nuevoNodo);
                else{
                    elem.hijos = [];
                    elem.hijos.push($nuevoNodo);
                }
            }else{
                if(elem.hasOwnProperty('hijos'))
                    insertarNodoRedRecursivo(elem.hijos, $nuevoNodo);
            }
        });
    }


    function mostrarRed($select){
        //console.log(contenedor);
        fetch('../red/'+$select.value)
            .then(function(response){
                return response.json();
            })
            .then(function(jsonResponse){
                redId = jsonResponse[0].id;
                //console.log(JSON.parse(jsonResponse[0].red));
                red = JSON.parse(jsonResponse[0].red);
                //console.log(ultimoNodoId);
                armarRed(red);
                //console.log(contenedor);
                //console.log(contenedor);
            });
    }

    function mostrarRedTotal(){
        ocultarNodosEliminados = false;
        armarRed(red);
        ocultarNodosEliminados = true;

    }

    function armarRed($red){
        //console.log(red);
        nodos = [];
        aristas = [];
        data = [];
        contenedor = document.getElementById('mynetwork');
        getAristasYNodos($red);
        data = {nodes: nodos, edges: aristas};
        network = new vis.Network(contenedor, data, options);

    }

    function getAristasYNodos($red){
        var nodoPadre = {id: $red.id, label: $red.nombre, color: '#ADCCC7', chosen: {node: clickNodo}};
        //console.log(nodoPadre);
        nodos.push(nodoPadre);
        //console.log(nodos);
        if($red.hijos.length > 0){
            //console.log($red.hijos.length);
            getNodos($red.hijos, $red.id, $red.activado);
        }else{
            ultimoNodoId = nodoPadre.id;
        }
    }

    function getNodos($array, $padreID, $padreActivado){

        $array.forEach(function($hijo, $index){
            $hijo.activado = JSON.parse($hijo.activado);
            //console.log($hijo, $index);
            ultimoNodoId = $hijo.id > ultimoNodoId ? $hijo.id : ultimoNodoId;
            
            var nodo = {};
            if($hijo.hasOwnProperty('hijos') && $hijo.hijos.length > 0){
                //if($hijo.hasOwnProperty('activado') && $hijo.activado){
                    getNodos($hijo.hijos, $hijo.id, $hijo.activado);
                    nodo = {id: $hijo.id, label: $hijo.nombre, color: '#ff45A1', shape: 'box', chosen: {node: clickNodo}};
                //}
            }else{
                nodo = {id: $hijo.id, label: $hijo.nombre, color: '#00ffa1', chosen: {node: clickNodo}};
            }
            
            //console.log(nodo);
            //console.log($padreActivado, $padreID, $hijo.activado, $hijo.id, ocultarNodosEliminados);
            if($padreActivado && $hijo.activado){
                nodos.push(nodo);
                aristas.push({from: $padreID, to: $hijo.id});
            }else if(!ocultarNodosEliminados){
                nodos.push(nodo);
                aristas.push({from: $padreID, to: $hijo.id});
            }
        });
    }
    // create a network

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

        //console.log(data);

        if(data.error){

          $.confirm({ icon: 'fa fa-times',title: '<strong>Error</strong><br>',theme: 'supervan',content: 'Error al agregar tarea.',type: 'red',buttons: {
                    Aceptar: function (e,data) {
                       
                      //setTimeout(function(){window.location.reload(1);},1000);
                    } 
                }});
   
 
        }else{


           $.confirm({ icon: 'fa fa-check',title: '<strong>Realizado</strong><br>',theme: 'supervan',content: 'Tarea registrada con éxito',type: 'green',buttons: {
                    Aceptar: function (e,data) {
                      //setTimeout(function(){window.location.reload(1);},1000);
                        $('#modal').modal('hide');
                        $("#desc").val("");
                        $("#fechaIn").val("");
                        $("#nodo_id").val("");
                        $("#red_id").val("");
                    } 
                }});


              

        } 

        
      },
      error: (error) => {
        console.log(error);
      }
    });



}






