<!--Main layout-->
    <main>

        <section class="mt-2">
            <h3 class="text-center"><strong>Tareas </strong></h3>

            <section class="text-right">

                <button class="btn-floating  btn-lg  green" data-toggle="modal" data-target="#modalLRFormDemo">
                <i class="fa fa-plus"></i>
            </button>

            <button class="btn-floating btn-lg warning-color">
                <i class="fa fa-pencil-square-o"></i>
            </button>

            <button class="btn-floating btn-lg red " onclick="deleteTareas();" >
                <i class="fa fa-minus"></i>
            </button>
                
            </section>

             

        </section >

        <br>
 


        <div class="container-fluid">

            <!--Section: Cards color-->
            <section class="mt-2">

                <!--Grid row-->
                <div class="row">

                    <?php foreach ($tarea as $row) { ?>

                                <!--Grid column-->
                            <div class="col-xl-3 col-md-6 mb-4 borrar d-flex">

                                <!--Panel-->
                                <div class="card h-300 d-flex">

                                    <?php switch ($row['estado_tarea_id']) {
                                        case '1':
                                               $color = "info-color";
                                            break;

                                        case '2':
                                                $color = "success-color";
                                        break;

                                        case '3':
                                            $color = "danger-color";
                                            break;

                                        case '4':
                                            $color = "warning-color";
                                            break;
                                        
                                        default:
                                            # code...
                                            break;
                                    } ?>

                                    <div class="card-header white-text <?php echo $color ?> " >  
                                        <p class="font-small text-right"><?php echo $row['nombre_estado']?></p>
                                    </div>

                                    <h6 class="ml-4 mt-3 dark-grey-text font-weight-bold d-flex">Condiciones</h6>
                                    <p class="ml-4 mt-3 font-small dark-grey-text"> 
                                        <?php 
                                        $condiciones = (json_decode($row['condiciones_aceptacion'], true));
                                         ?>
                                        <?php foreach ( $condiciones as $index => $condicion ) { ?>

                                            <div class="row">

                                                <span class="ml-5 mt-1 font-small dark-grey-text "><?php echo $condicion['nombre'] ?> </span> 

                                                <span class="ml-5 mt-2 font-small dark-grey-text "> <!-- Material unchecked -->
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id=" <?php $row['tarea_id'].$index ?> " <?php echo $condicion['cumplida'] ? 'checked' : '' ?> >
                                                        <label class="form-check-label" for="materialUnchecked"></label>
                                                    </div> 
                                                </span>

                                            </div>

                                            
                                        <?php } ?>
                                    </p>

                                    <h6 class="ml-4 mt-2 dark-grey-text font-weight-bold">Descripcion</h6>
                                    <p class="ml-4 mt-3 font-small dark-grey-text"> <?php echo $row['descripcion']?></p>

                                    <!--/.Card Data-->

                                    <!--Card content-->
                                    <div class="card-body">
                                        
                                        <!--Text-->
                                        <p class="font-small grey-text">Fecha de Registro: <?php echo $row ['_create']?></p>
                                
                                    </div>
                                    <!--/.Card content-->

                                </div>
                                <!--/.Panel-->

                            </div>
                            <!--Grid column-->

                        
                   <?php  } ?>       
   
                </div>
                <!--Grid row-->

            </section>
            <!--Section: Cards color-->




            <!--Section: Panels-->
            <section>

                

            </section>
            <!--Section: Panels-->

        </div>
    </main>
    <!--Main layout-->


           


 <!--Modal: Login / Register Form-->
                <div class="modal fade" id="modalLRFormDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog cascading-modal modal-lg" role="document">
                        <!--Content-->
                        <div class="modal-content">

                            <!--Modal cascading tabs-->
                            <div class="modal-c-tabs">

                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs tabs-2 green " role="tablist">
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
                                                     <select class="mdb-select"  id="selRol">
                                                            <option value="" disabled selected>Seleccionar Nodo</option>
                                                            <?php foreach ($rol as $row) {

                                                                echo '<option value='.$row['id'].'>'.$row['nombre'].'</option>';
                                                            } ?> 
                                                    </select>
                                                    <!-- Grid column -->
                                                
                                            </div>
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
                                            <button class="btn-floating btn-lg success-color" onclick="addUsuarios();">
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
<script type="text/javascript" src="<?php echo base_url();?>assets/js/agregarTarea.js"></script>
