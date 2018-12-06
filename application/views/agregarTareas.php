<!--Main layout-->
    <main>

        <section class="mt-2">
            <h3 class="text-center"><strong>Tareas </strong></h3>

            <section class="text-right">


            <button onclick="editTareas();" class="btn-floating btn-lg warning-color">
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
                            <div class="col-xl-3 col-md-6 mb-4 borrar editar d-flex">

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

                                    <div class="card-header white-text <?php echo $color; ?> color" >  
                                        <div class="row">
                                            <div class="col">
                                                
                                                <p class="font-small text-left m-0 p-0"><?php echo $row['nombre_campania'];?></p>
                                            </div>
                                            <div class="col">
                                                <p class="font-small text-right m-0 p-0 font-italic"><?php echo $row['nombre_estado'];?></p>
                                            </div>
                                        </div>
                                                <button onclick="deleteTarea(<?php echo $row['tarea_id']; ?>)" class="btn btn-sm float-right button-borrar black" style="display: none;"><i class="fa fa-times " aria-hidden="true" ></i></button>
                                                
                                                <button onclick="editTarea(
                                                <?php echo $row['tarea_id']; ?>,
                                                <?php echo "'".$row['descripcion']."'"; ?>,
                                                <?php echo "'".htmlspecialchars($row['requisitos'], ENT_QUOTES, 'UTF-8')."'"; ?>,
                                                <?php echo "'".htmlspecialchars($row['condiciones_aceptacion'], ENT_QUOTES, 'UTF-8')."'";?>,
                                                <?php echo "'".$row['fecha_entrega']."'";?>,
                                                <?php echo "'".$row['estado_tarea_id']."'";?>
                                                );" 
                                                class="btn btn-sm  black float-right button-editar" style="display: none;"><i class="fa fa-pencil" aria-hidden="true" ></i></button>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <h6 class="ml-4 mt-2 dark-grey-text font-weight-bold"><?php echo $row['descripcion'];?></h6>
                                            
                                        </div>
                                        <div class="col-12">
                                            <p class="ml-4 my-0 font-small text-muted"> Entrega en 
                                            <?php echo strftime("%e de %B de %Y, %H:%M", strtotime($row['fecha_entrega'])); ?>
                                                
                                            </p>
                                        </div>
                                    </div>
                                    
                                    <div class="container">
                                        <hr>
                                    </div>
                                    
                                    <h6 class=" dark-grey-text font-weight-bold text-center">Requisitos </h6>
                                        <?php 
                                        $condiciones = (json_decode($row['condiciones_aceptacion'], true));
                                        $requisitos = (json_decode($row['requisitos'], true));
                                         ?>
                                        <?php foreach ( $requisitos as $index => $requisito ) { ?>

                                            <div class="row">
                                                <div class="col">
                                                    <span class="ml-3 mt-1 font-small dark-grey-text "><?php echo $requisito['nombre']; ?> </span> 
                                                </div>          
                                                <div class="col-3 mr-2">
                                                    <div class="form-check mt-0">
                                                        <input type="checkbox" disabled class="form-check-input" id="<?php echo $row['tarea_id'].$index ?>" <?php echo $requisito['estado'] ? 'checked' : '' ?> >
                                                        <label class="form-check-label" for="<?php echo $row['tarea_id'].$index; ?>"></label>
                                                <div class="col-3">
                                                    <div class="form-check">
                                                        <label for="<?php echo $row['tarea_id'].$index ?>"></label>
                                                    </div>
                                                </div>

                                            </div>

                                            
                                        <?php } ?>

                                
                                    
                                    <h6 class="dark-grey-text font-weight-bold text-center">Condiciones de aceptación</h6>
                                    <?php foreach ( $condiciones as $index => $condicion ) { ?>
                                            <div class="row">
                                                <div class="col">
                                                    <span class="ml-3 font-small dark-grey-text "><?php echo $condicion['nombre'];?> </span> 
                                                </div>

                                            </div>

                                            
                                        <?php } ?>


                                    <!--/.Card Data-->

                                    <!--Card content-->
                                    <div class="container">
                                        <hr>
                                    </div>
                                    <div class="card-body pt-0 ">
                                        
                                        <!--Text-->
                                        <p class="mt-0 font-small grey-text">Fecha de Registro: <?php echo strftime("%e de %B de %Y, %H:%M", strtotime($row['_create'])); ?></p>
                                        <div class="row">
                                            <div class="col-12 text-right">
                                                <a href="<?php echo base_url().'/index.php/Subtareas/'.$row['tarea_id'] ?>">Ir a subtareas</a>
                                            </div>
                                        </div>
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
 <!--editar-->
                <div class="modal fade" id="modal-editar-tarea" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog cascading-modal modal-lg" role="document">
                        <!--Content-->
                        <div class="modal-content">

                            <!--Modal cascading tabs-->
                            <div class="modal-c-tabs">

                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs tabs-2 warning-color " role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#panel7" role="tab"><i class="fa fa-user mr-1"></i>Editar Tarea</a>
                                    </li>
                                </ul>

                                <!-- Tab panels -->
                                <div class="tab-content">
                                    <!--Panel 7-->
                                    <div class="tab-pane fade in show active" id="panel7" role="tabpanel">

                                        <!--Body-->
                                        <div class="modal-body mb-1">
                                            <div class="row">
                                                <input type="hidden" id="tarea_id">
                                                    <!-- Grid column -->
                                                <div class="col-12">
                                                    <div class="row">
                                                        
                                                        <div class="col-6 p-0">
                                                            <div class="md-form">
                                                                
                                                                <input  type="text"  class="form-control " id="desc-editar" name="desc-editar">
                                                                <label for="desc-editar" >Descripción de la tarea</label>
                                                            </div>
                                                            
                                                        </div>
                                                        <!-- Default input -->
                                                        <div class="col-6 p-0">
                                                            <div class="md-form">
                                                                
                                                                <input  type="text"  class="form-control datepicker" id="fecha-entrega-editar" name="fecha-entrega-editar">
                                                                <label for="fecha-entrega-editar" >Fecha de Entrega</label>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    <!-- Default input -->

                                                </div>
                                                <!-- Grid column -->


                                                <div class="md-form col-6">
                                                    <div class="row">
                                                        <div class="col-12">    
                                                            Condiciones de aceptación                
                                                        </div>
                                                        <div class="col-12" id="condiciones-editar">
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="md-form col-6">
                                                    <div class="row">
                                                        <div class="col-12">    
                                                            Requisitos de la tarea              
                                                        </div>
                                                        <div class="col-12" id="requisitos-editar">
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="md-form col-6">
                                                    <div class="row">
                                                        <div class="col-12">    
                                                            Estado de la tarea              
                                                        </div>
                                                        <div class="col-12">
                                                            <select name="estado-tarea-editar" id="estado-tarea-editar">
                                                                <?php foreach ($estadosTarea as $index => $estado): ?>
                                                                    <option value="<?php echo $estado['id'] ?>"><?php echo $estado['nombre'] ?></option>
                                                                <?php endforeach ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>
                                                    

                                                    
                                            </div>
                                                <!-- Grid row -->
                                            
                                        </div>
                                        <!--Footer-->
                                        <div class="modal-footer">
                                            <button class="btn-floating btn-lg warning-color" onclick="editarTarea();">
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
                <!--editar-->
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/agregarTarea.js"></script>