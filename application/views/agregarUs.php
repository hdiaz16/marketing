<!--Main layout-->
    <main>

        <section class="mt-2">
            <h3 class="text-center"><strong>Agregar Usuarios </strong></h3>

            <section class="text-right">

                <button class="btn-floating  btn-lg  green" data-toggle="modal" data-target="#modalLRFormDemo">
                <i class="fa fa-plus"></i>
            </button>

            <button class="btn-floating btn-lg warning-color">
                <i class="fa fa-pencil-square-o"></i>
            </button>

            <button class="btn-floating btn-lg red " onclick="deleteUs();" >
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

                    <?php foreach ($Empresa as $row) { ?>

                                <!--Grid column-->
                            <div class="col-xl-3 col-md-6 mb-4 borrar">

                                <!--Panel-->
                                <div class="card h-100">
                                    <div class="card-header white-text success-color color" >

                                        <button   class="btn btn-sm  black float-right button" style="display: none;"><i class="fa fa-times " aria-hidden="true" ></i></button> 
                                       <?php echo $row->razon_social ?>
                                       
                                    </div>
                                    

                                    <h6 class="ml-4 mt-4 dark-grey-text font-weight-bold">Datos</h6>
                                    <p class="ml-3 mt-3 font-small dark-grey-text"> <?php echo $row->contacto?></p>
                                    <!--/.Card Data-->

                                    <!--Card content-->
                                    <div class="card-body">
                                        
                                        <!--Text-->
                                        <p class="font-small grey-text">Fecha de Registro: <?php echo $row->_create?></p>
                                
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
                    <div class="modal-dialog cascading-modal modal-lg" role="document">
                        <!--Content-->
                        <div class="modal-content">

                            <!--Modal cascading tabs-->
                            <div class="modal-c-tabs">

                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs tabs-2 green " role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab"  role="tab"><i class="fa fa-user mr-1"></i> Agregar Usuario</a>
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
                                                     <div class="col-4 md-form">
                                                        <!-- Default input -->
                                                        <input  type="text"  class="form-control nom">
                                                        <label for="form3" >Nombres</label>
                                                       
                                                    </div>
                                                    <!-- Grid column -->

                                                    <!-- Grid column -->
                                                     <div class="col-4 md-form">
                                                        <!-- Default input -->
                                                        <input  type="text"  class="form-control ape">
                                                        <label for="form3" >Apellidos</label>
                                                       
                                                    </div>
                                                    <!-- Grid column -->

                                                    <!-- Grid column -->
                                                    <div class="col-4 md-form">
                                                        <!-- Default input -->
                                                        <input  type="text"  class="form-control ape">
                                                        <label for="form3" >Correo</label>
                                                       
                                                    </div>
                                                    <!-- Grid column -->

                                                     <!-- Grid column -->
                                                    <div class="col-4 md-form">
                                                        <!-- Default input -->
                                                        <input  type="password"  class="form-control ape">
                                                        <label for="form3" >Contraseña</label>
                                                       
                                                    </div>
                                                    <!-- Grid column -->

                                                    <!-- Grid column -->
                                                    <div class="col-4 md-form">
                                                         <!--Name-->
                                                        <select class="mdb-select" multiple>
                                                            <option value="" disabled selected>Basic select</option>
                                                            <option value="1">USA</option>
                                                            <option value="2">Germany</option>
                                                            <option value="3">France</option>
                                                            <option value="3">Poland</option>
                                                            <option value="3">Japan</option>
                                                        </select>

                                                       
                                                    </div>
                                                    <!-- Grid column -->

                                                    
                                                </div>
                                                <!-- Grid row -->

                                               
                                                
                                              

                                                <div class="row">
                                                   <!-- Grid column -->
                                                   

                                                    
                                                </div>
                                                <!-- Grid row -->


                                            </form>


                                        </div>

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
                <!--Modal: Login / Register Form Demo-->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/Empresa.js"></script>
