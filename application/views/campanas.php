

<!--Main layout-->
    <main>

        <section class="mt-2">
            <h3 class="text-center"><strong>Campañas</strong></h3>

            <section class="text-right">

                <button class="btn-floating  btn-lg  green" data-toggle="modal" data-target="#modalLRFormDemo">
                <i class="fa fa-plus"></i>
            </button>

            <button class="btn-floating btn-lg warning-color">
                <i class="fa fa-pencil-square-o"></i>
            </button>

            <button class="btn-floating btn-lg red" onclick="deleteCampanas();">
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

                

                    <?php foreach ($campanas as $row) { ?>

                                <!--Grid column-->
                            <div class="col-xl-3 col-md-6 mb-4 borrar">

                                <!--Panel-->
                                <div class="card h-100">
                                    <div class="card-header white-text success-color color">
                                        <button   class="btn btn-sm  black float-right button" style="display: none;"><i class="fa fa-times " aria-hidden="true" ></i></button> 
                                       <?php echo $row['nombre']?>
                                    </div>

                                    <h6 class="ml-4 mt-2 dark-grey-text font-weight-bold">Objetivo</h6>
                                    <p class="ml-3 mt-1 font-small dark-grey-text"> <?php echo $row['objetivos']?></p>

                                    <h6 class="ml-4 mt-2 dark-grey-text font-weight-bold">Proposito</h6>
                                    <p class="ml-3 mt-1 font-small dark-grey-text"> <?php echo $row['propositos']?></p>
                                    <!--/.Card Data-->

                                    <!--Card content-->
                                    <div class="card-body">
                                        
                                        <!--Text-->
                                        <p class="font-small grey-text">Fecha de Inicio: <?php echo $row['fecha_inicio']?></p>
                                        <p class="font-small grey-text">Fecha de Cierre: <?php echo $row['fecha_cierre']?></p>
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


           



        <!--Modal: Login / Register Form Demo-->

                <div class="modal fade" id="modalLRFormDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog cascading-modal modal-lg"  role="document">
                        <!--Content-->
                        <div class="modal-content">

                            <!--Modal cascading tabs-->
                            <div class="modal-c-tabs">

                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs tabs-2 green " role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab"  role="tab"><i class="fa fa-user mr-1"></i> Agregar Campaña</a>
                                    </li>
                                    
                                </ul>

                                

                                <!-- Tab panels -->
                                <div class="tab-content">
                                    <!--Panel 17-->
                                    <div class="tab-pane fade in show active" id="panel17" role="tabpanel">

                                        <!--Body-->
                                        <div class="modal-body mb-1">
                                            <!-- Default form grid -->
                                            <form>

                                                <!-- Grid row -->
                                                <div class="row">
                                                    <!-- Grid column -->
                                                     <div class="col-12 md-form">
                                                        <!-- Default input -->
                                                        <input  type="text"  class="form-control nom">
                                                        <label for="form3" >Nombre</label>
                                                       
                                                    </div>
                                                    <!-- Grid column -->

                                                    <!-- Grid column -->
                                                    <div class="md-form col-6">
                                                        <textarea type="text" id="objetivo" class="form-control md-textarea" rows="3"></textarea>
                                                        <label for="textareaBasic">Objetivo de la campaña</label>
                                                    </div>
                                                    <!-- Grid column -->

                                                     <!-- Grid column -->
                                                    <div class="md-form col-6">
                                                        <textarea type="text" id="proposito"  class="form-control md-textarea " rows="3"></textarea>
                                                        <label for="textareaBasic">Proposito de la campaña</label>
                                                    </div>
                                                    <!-- Grid column -->

                                                    
                                                </div>
                                                <!-- Grid row -->
                                                <br>

                                                <div class="d-flex justify-content-between">
                                                    <div class="md-form">
                                                        <input  type="text"  class="form-control datepicker" id="fechaIn">
                                                        <label for="date-picker-example">Inico</label>
                                                    </div>
                                                    <div class="md-form">
                                                        <input  type="text"  class="form-control datepicker" id="fechaFn">
                                                        <label for="date-picker-example">Fin</label>
                                                    </div>
                                                </div>


                                            </form>


                                        </div>

                                        <div class="modal-footer">
                                                
                                                <button class="btn-floating btn-lg success-color" onclick="addCampanas();">
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
                <!--Modal: Login / Register Form Demo-->

    <script type="text/javascript" src="<?php echo base_url();?>assets/js/campanas.js"></script>   


    