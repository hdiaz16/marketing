
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

                <button class="btn-floating  btn-lg  blue" data-toggle="modal" data-target="#modal">
                    <i class="fa fa-plus"></i>
                </button>

                <button class="btn-floating  btn-lg  green" data-toggle="modal" data-target="#modalLRFormDemo">
                    <i class="fa fa-plus"></i>
                </button>

                <button class="btn-floating btn-lg warning-color">
                    <i class="fa fa-pencil-square-o"></i>
                </button>

                <button class="btn-floating btn-lg red" onclick="">
                    <i class="fa fa-minus"></i>
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


<!--Modal: Login / Register Form-->
                <div class="modal fade" id="modalLRFormDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                                        
                                                        <label for="textareaBasic">Nodo: <span id="nodo-nombre-modal"></span></label>
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
                <!--Modal: Login / Register Form-->


<!--Modal: Login / Register Form-->
                <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog cascading-modal modal-lg" role="document">
                        <!--Content-->
                        <div class="modal-content">

                            <!--Modal cascading tabs-->
                            <div class="modal-c-tabs">

                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs tabs-2 blue " role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#panel7" role="tab"><i class="fa fa-user mr-1"></i> Agregar Tarea</a>
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
                                                     <div class="col-4 md-form">
                                                        <!-- Default input -->
                                                        
                                                        <h4 for="form3"> Nodo:</h4>
                                                        <p id="nodo_select"> </p>
                                                    

                                                    </div>
                                                    <!-- Grid column -->

                                                    <!-- Grid column -->
                                                     <div class="col-4 md-form" hidden>
                                                        <!-- Default input -->
                                                        
                                                        <label for="form3" >ID Nodo</label>
                                                        <input  type="text"  class="form-control" 
                                                         id="nodo_id">
                                                    </div>
                                                    <!-- Grid column -->

                                                    <!-- Grid column -->
                                                     <div class="col-4 md-form" hidden>
                                                        <!-- Default input -->
                                                        
                                                        <label for="form3" >ID Red</label>
                                                        <input  type="text"  class="form-control" 
                                                         id="red_id">
                                                    </div>
                                                    <!-- Grid column -->
                                                
                                            </div>
                                            <br>
                                            <div class="row">
                                                    <!-- Grid column -->
                                                     <div class="col-6 md-form">
                                                        <!-- Default input -->
                                                        <input  type="text"  class="form-control " id="desc" name="desc">
                                                        <label for="form3" >Descripcion de la tarea</label>
                                                       
                                                    </div>
                                                    <!-- Grid column -->


                                                    <div class="md-form col-6">
                                                        <input  type="text"  class="form-control datepicker" id="fechaIn" name="fechaIn">
                                                        <label for="date-picker-example">Fecha de entrega</label>
                                                    </div>
                                                    
                                             

                                                    <!-- Grid column -->
                                                    <div class="md-form col-6">
                                                        <input  type="text"  class="form-control " id="req">
                                                        <label for="form3">Requisitos de la tarea</label>
                                                        <button type="button" class="btn btn-danger btn-sm waves-effect waves-light" onclick="agregarRequisitos();">Agregar</button>
                                                    </div>

                                                    <!-- Grid column -->

                                                    <!-- Grid column -->
                                                    <div class="md-form col-6">
                                                        <textarea type="text" id="textReq" class="md-textarea form-control" rows="3"></textarea>
                                                        <label for="form10">Requisitos Agregados</label>
                                                    </div>
                                                    <!-- Grid column -->

                                                     <!-- Grid column -->
                                                    <div class="md-form col-6">
                                                        <input  type="text"  class="form-control text" id="cond">
                                                        <label for="form3">Condiciones de Aceptacion</label>
                                                        <button type="button" class="btn btn-danger btn-sm waves-effect waves-light" onclick="agregarCondiciones();">Agregar</button>
                                                    </div>

                                                    <!-- Grid column -->

                                                    <!-- Grid column -->
                                                    <div class="md-form col-6">
                                                        <textarea type="text" id="textCond" class="md-textarea form-control" rows="3"></textarea>
                                                        <label for="form10">Condiciones Agregados</label>
                                                    </div>
                                                    <!-- Grid column -->


                                                    
                                                </div>
                                                <!-- Grid row -->
                                            
                                        </div>
                                        <!--Footer-->
                                        <div class="modal-footer">
                                            <button class="btn-floating btn-lg info-color" onclick="agregarTarea();">
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
                <!--Modal: Login / Register Form-->



 


<script type="text/javascript">

    var contenedor, nodos, aristas, data;
    var redId, red = {}, network = {};
    var nodoSeleccionadoId = '';
    var ultimoNodoId = 0;

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

        document.getElementById('nodo-nombre-modal').innerHTML = nombreNodo;
        $("#nodo_select").html(nombreNodo);
        $("#nodo_id").val(nodoSeleccionadoId);
        $("#red_id").val(redId);

    }

    function agregarNodo(){
        contenedor = document.getElementById('mynetwork');
        var nodo = {};
        if(nodoSeleccionadoId){
            nodo = {id: ultimoNodoId+1, label: $('#nodo-nombre-input').val(), color: '#ff45A1', shape: 'box', chosen: {node: clickNodo}};
            
            data.nodes.push(nodo);
            data.edges.push({from: nodoSeleccionadoId, to: nodo.id});
            network = new vis.Network(contenedor, data, options);
        }
    }


    function mostrarRed($select){
        contenedor = document.getElementById('mynetwork');
        nodos = [];
        aristas = [];
        data = [];
        //console.log(contenedor);
        fetch('../red/'+$select.value)
            .then(function(response){
                return response.json();
            })
            .then(function(jsonResponse){
                redId = jsonResponse[0].id;
                //console.log(JSON.parse(jsonResponse[0].red));
                red = JSON.parse(jsonResponse[0].red);
                getAristasYNodos(red);
                console.log(ultimoNodoId);

                data = {nodes: nodos, edges: aristas};
                //console.log(contenedor);
                network = new vis.Network(contenedor, data, options);
                //console.log(contenedor);
            });

    }

    function getAristasYNodos($red){
        var nodoPadre = {id: $red.id, label: $red.nombre, color: '#ADCCC7', chosen: {node: clickNodo}};
        //console.log(nodoPadre);
        nodos.push(nodoPadre);
        //console.log(nodos);
        if($red.hijos.length > 0){
            //console.log($red.hijos.length);
            getNodos($red.hijos, $red.id);
        }else{
            ultimoNodoId = nodoPadre.id;
        }
    }

    function getNodos($array, $padreID){

        $array.forEach(function($hijo, $index){
            //console.log($hijo, $index);
            var nodo = {};
            if($hijo.hasOwnProperty('hijos') && $hijo.hijos.length > 0){
                //if($hijo.hasOwnProperty('activado') && $hijo.activado){
                    nodo = {id: $hijo.id, label: $hijo.nombre, color: '#ff45A1', shape: 'box', chosen: {node: clickNodo}};
                    getNodos($hijo.hijos, $hijo.id);
                //}
            }else{
                nodo = {id: $hijo.id, label: $hijo.nombre, color: '#00ffa1', chosen: {node: clickNodo}};
            }
            
            ultimoNodoId = nodo.id > ultimoNodoId ? nodo.id : ultimoNodoId; 
            
            nodos.push(nodo);
            aristas.push({from: $padreID, to: $hijo.id});
        });
    }


    // create a network

</script>



<script type="text/javascript" src="<?php echo base_url();?>assets/js/redSemantica.js"></script>








