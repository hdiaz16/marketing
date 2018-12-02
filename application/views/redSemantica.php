
<style type="text/css">
        #mynetwork {
            width: 700px;
            height: 400px;
            border: 1px solid lightgray;
        }
    </style>

<main>
	

	<section class="mt-2">
            <h3 class="text-center"><strong>Red Semántica</strong></h3>

            <section class="text-right">

                <button class="btn-floating  btn-lg  green" data-toggle="modal" data-target="#modal-insertar">
                <i class="fa fa-plus"></i>
            </button>

            <button class="btn-floating btn-lg warning-color" data-toggle="modal" data-target="#modal-editar">
                <i class="fa fa-pencil-square-o"></i>
            </button>

            <button class="btn-floating btn-lg red" onclick="eliminarNodo()">
                <i class="fa fa-minus"></i>
            </button>

            <button class="btn-floating btn-lg purple" onclick="mostrarRedTotal()" tooltip="top" title="mostrar nodos eliminados">
                <i class="fa fa-eye"></i>
            </button>
                
            </section>

             

        </section >


</main>

<section id="campania-list">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <select onchange="mostrarRed(this)" class="mdb-select" name="campania-red" id="campania-red">
                    <option value="0" selected="">Elija la campaña</option>
                    <?php foreach ($campanias as $key => $campania) { ?>
                        <option value="<?php echo $campania['id'] ?>"><?php echo $campania['nombre'] ?></option>
                    <?php } ?>
                </select>
                <label for="campania-red">Campaña:</label>
            </div>
        </div>
    </div>
</section>

<section id="red">
	<div class="container">
     <div class="row">
            <div class="col-12 col-lg-6"> 
	           <div id="mynetwork"></div>
            </div>
        </div>   
    </div>

</section>


<!--Modal: insertar nodo-->
<div class="modal fade" id="modal-insertar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
        <!--Content-->
        <div class="modal-content">

            <!--Modal cascading tabs-->
            <div class="modal-c-tabs">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs tabs-2 green " role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#panel7" role="tab"><i class="fa fa-user mr-1"></i> Agregar Nodo</a>
                    </li>
                  
                </ul>

                <!-- Tab panels -->
                <div class="tab-content">
                    <!--Panel 7-->
                    <div class="tab-pane fade in show active" id="panel7" role="tabpanel">

                        <!--Body-->
                        <div class="modal-body mb-1">
                            <div class="row">
                                    <!-- Grid column -->
                                    <div class="md-form col-6">
                                        
                                        <label for="textareaBasic">Nodo: <span class="nodo-nombre-modal"></span></label>
                                    </div>
                                    <!-- Grid column -->
                                    
                                    <!-- Grid column -->
                                     <div class="col-6 md-form">
                                        <!-- Default input -->
                                        <input  type="text"  class="form-control nom" id="nodo-nombre-input" name="nodo-nombre-input">
                                        <label for="nodo-nombre-input" >Nombre del Nodo</label>
                                       
                                    </div>
                                    <!-- Grid column -->

                                    
                                </div>
                                <!-- Grid row -->
                            
                        </div>
                        <!--Footer-->
                        <div class="modal-footer">
                            <button class="btn-floating btn-lg success-color" onclick="agregarNodo();">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>

                    </div>
                    <!--/.Panel 7-->

                </div>

            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!--Modal: insertar nodo-->
 
<div class="modal fade" id="modal-editar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
        <!--Content-->
        <div class="modal-content">

            <!--Modal cascading tabs-->
            <div class="modal-c-tabs">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs tabs-2 warning-color " role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#panel7" role="tab"><i class="fa fa-user mr-1"></i> Editar Nodo</a>
                    </li>
                  
                </ul>

                <!-- Tab panels -->
                <div class="tab-content">
                    <!--Panel 7-->
                    <div class="tab-pane fade in show active" id="panel7" role="tabpanel">

                        <!--Body-->
                        <div class="modal-body mb-1">
                            <div class="row">
                                    <!-- Grid column -->
                                    <div class="md-form col-6">
                                        
                                        <label for="textareaBasic">Nodo: <span class="nodo-nombre-modal"></span></label>
                                    </div>
                                    <!-- Grid column -->
                                    
                                    <!-- Grid column -->
                                     <div class="col-6 md-form">
                                        <!-- Default input -->
                                        <input  type="text"  class="form-control nom" id="nodo-nombre-input-editar" name="nodo-nombre-input-editar">
                                        <label for="nodo-nombre-input-editar" >Nombre nuevo:</label>
                                       
                                    </div>
                                    <!-- Grid column -->

                                    
                                </div>
                                <!-- Grid row -->
                            
                        </div>
                        <!--Footer-->
                        <div class="modal-footer">
                            <button class="btn-floating btn-lg success-color" onclick="editarNodo();">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>

                    </div>
                    <!--/.Panel 7-->

                </div>

            </div>
        </div>
        <!--/.Content-->
    </div>
</div>


<script type="text/javascript">

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
            console.log($padreActivado, $padreID, $hijo.activado, $hijo.id, ocultarNodosEliminados);
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

</script>








