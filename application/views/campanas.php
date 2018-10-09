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

            <button class="btn-floating btn-lg red">
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
                            <div class="col-xl-3 col-md-6 mb-4">

                                <!--Panel-->
                                <div class="card h-100">
                                    <div class="card-header white-text success-color">
                                       <?php echo $row->nombre?>
                                    </div>

                                    <h6 class="ml-4 mt-4 dark-grey-text font-weight-bold">Objetivo</h6>
                                    <p class="ml-3 mt-3 font-small dark-grey-text"> <?php echo $row->objetivos?></p>
                                    <!--/.Card Data-->

                                    <!--Card content-->
                                    <div class="card-body">
                                        
                                        <!--Text-->
                                        <p class="font-small grey-text">Fecha de Inicio: <?php echo $row->fecha_inicio?></p>
                                        <p class="font-small grey-text">Fecha de Cierre: <?php echo $row->fecha_cierre?></p>
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
                    <div class="modal-dialog cascading-modal" role="document">
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
                                                    <div class="col">
                                                        <!-- Default input -->
                                                        <label>Nombre</label>
                                                        <input type="text" class="form-control" id="nombre">
                                                    </div>
                                                    <!-- Grid column -->

                                                    <!-- Grid column -->
                                                    <div class="col">
                                                        <!-- Default input -->
                                                        <label>Proposito</label>
                                                        <input type="text" class="form-control" id="objetivo">
                                                    </div>
                                                    <!-- Grid column -->

                                                    
                                                </div>
                                                <!-- Grid row -->
                                                <br>

                                                <div class="row">
                                                   <!-- Grid column -->
                                                    <div class="col-md-6">
                                                        <!-- Default input -->
                                                        <label>Fecha de inicio</label>
                                                        <input type="date" class="form-control" id="fechaIn">
                                                    </div>
                                                    <!-- Grid column -->

                                                    <!-- Grid column -->
                                                    <div class="col-md-6">
                                                        <!-- Default input -->
                                                        <label>Fecha de termino</label>
                                                        <input type="date" class="form-control" id="fechaFn">
                                                    </div>
                                                    <!-- Grid column -->

                                                    
                                                </div>
                                                <!-- Grid row -->


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

    <script type="text/javascript" src="<?php echo base_url();?>assets/js/dashboard.js"></script>            
    