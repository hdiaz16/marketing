
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
                <button class="btn-floating  btn-lg  blue" data-toggle="modal" data-target="#modal" tooltip="top" title="agregar tarea a nodo">
                    <i class="fa fa-list"></i>
                </button>
                <button class="btn-floating  btn-lg  green" data-toggle="modal" data-target="#modal-insertar" tooltip="top" title="insertar nodo">
                <i class="fa fa-plus"></i>
            </button>

            <button class="btn-floating btn-lg warning-color" data-toggle="modal" data-target="#modal-editar" tooltip="top" title="editar nodo">
                <i class="fa fa-pencil-square-o"></i>
            </button>

            <button class="btn-floating btn-lg red" onclick="eliminarNodo()" tooltip="top" title="eliminar nodo">
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
                                                        
                                                        <h4 for="form3"> Nodo: <spanid="nodo_select" class="nodo-nombre-modal"></span></h4>
                                                    

                                                    </div>
                                                    <!-- Grid column -->

                                                    <!-- Grid column -->
                                                     <div class="col-4 md-form">
                                                        <!-- Default input -->
                                                        
                                                        <input  type="hidden"  class="form-control" id="nodo_id">

                                                    </div>
                                                    <!-- Grid column -->

                                                    <!-- Grid column -->
                                                     <div class="col-4 md-form">
                                                        <!-- Default input -->
                                                        
                                                        <input  type="hidden"  class="form-control" id="red_id">

                                                    </div>
                                                    <!-- Grid column -->
                                                
                                            </div>
                                            <br>
                                            <div class="row">
                                                    <!-- Grid column -->
                                                     <div class="col-6 md-form">
                                                        <!-- Default input -->
                                                        <input  type="text"  class="form-control " id="desc" name="desc">
                                                        <label for="form3" >Descripción de la tarea</label>
                                                       
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
                            <button class="btn-floating btn-lg warning-color" onclick="editarNodo();">
                                <i class="fa fa-edit"></i>
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
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/redSemantica.js"></script>
