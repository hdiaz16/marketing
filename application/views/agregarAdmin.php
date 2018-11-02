<!--Main layout-->
    <main>

        <section class="mt-2">
            <h3 class="text-center"><strong>Administradores </strong></h3>

            <section class="text-right">

              <button class="btn-floating  btn-lg  blue" data-toggle="modal" data-target="#modal-asignar">
                <i class="fa fa-check"></i>
              </button>

              <button class="btn-floating  btn-lg  green" data-toggle="modal" data-target="#modalLRFormDemo">
                <i class="fa fa-plus"></i>
              </button>

            <button class="btn-floating btn-lg warning-color">
                <i class="fa fa-pencil-square-o"></i>
            </button>

            <button class="btn-floating btn-lg red " onclick="deleteAdmins();" >
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

                    <?php foreach ($admins as $row) { ?>

                                <!--Grid column-->
                            <div <?php echo $row['perfil_id'] == $this->session->userdata['perfil-actual']['perfil_id'] ? "hidden" : "" ?> class="col-xl-3 col-md-6 mb-4 borrar">

                                <!--Panel-->
                                <div class="card h-100">
                                    <div class="card-header white-text success-color color" >

                                        <button onclick="deleteAdmin(<?php echo $row['perfil_id'] ?>)" class="btn btn-sm  black float-right button" style="display: none;"><i class="fa fa-times " aria-hidden="true" ></i></button> 
                                       <?php echo $row['nombres']?>
                                       
                                    </div>
                                    

                                    <h6 class="ml-4 mt-4 dark-grey-text font-weight-bold">Datos</h6>
                                    <p class="ml-3 mt-3 font-small dark-grey-text"> <?php echo $row['correo'] ?></p>
                                    <!--/.Card Data-->

                                    <!--Card content-->
                                    <div class="card-body">
                                        
                                        <!--Text-->
                                        <p class="font-small grey-text">Fecha de Registro: <?php echo $row['_create']?></p>
                                        <p class="font-small grey-text">Última actualización: <?php echo $row['_update']?></p>
                                
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
                                        <a class="nav-link active" data-toggle="tab"  role="tab"><i class="fa fa-user mr-1"></i> Agregar Administrador</a>
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
                                                        <label>Nombres</label>
                                                        <input type="text" class="form-control" id="nombres" name="nombres">
                                                    </div>
                                                    <!-- Grid column -->

                                                    <!-- Grid column -->
                                                    <div class="col">
                                                        <!-- Default input -->
                                                        <label>Correo</label>
                                                        <input type="email" class="form-control" id="correo" name="correo">
                                                    </div>
                                                    <!-- Grid column -->

                                                    
                                                </div>
                                                <!-- Grid row -->
                                                <br>
                                                <!-- Grid row -->
                                                <div class="row">
                                                    <!-- Grid column -->
                                                    <div class="col-6">
                                                        <!-- Default input -->
                                                        <label>Contraseña</label>
                                                        <input type="text" class="form-control" id="contrasenia" name="contrasenia">
                                                    </div>
                                                    <!-- Grid column -->


                                                    
                                                </div>
                                                <!-- Grid row -->
                                                <br>

                                                <div class="row">
                                                   <!-- Grid column -->
                                                   

                                                    
                                                </div>
                                                <!-- Grid row -->


                                            </form>


                                        </div>

                                        <div class="modal-footer">
                                                
                                                <button class="btn-floating btn-lg success-color" onclick="addAdmin(<?php echo $this->session->userdata['perfil-actual']['perfil_id'] ?>);">
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
        <!--Modal: Login / Register Form Demo-->
                <div class="modal fade" id="modal-asignar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog cascading-modal" role="document">
                        <!--Content-->
                        <div class="modal-content">

                            <!--Modal cascading tabs-->
                            <div class="modal-c-tabs">

                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs tabs-2 green " role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab"  role="tab"><i class="fa fa-user mr-1"></i> Asignar Administrador</a>
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
                                                        <select class="mdb-select md-form" name="administradores" id="administradores" name="administradores">
                                                          <option value="" disabled selected>Elige administrador</option>
                                                          <?php foreach ($admins as $row) { ?>
                                                            <option value=" <?php echo  $row['perfil_id']?> "><?php echo $row['perfil_id']." ".$row['nombres'] ?></option>
                                                          <?php } ?>
                                                        </select>
                                                        <label for="administradores">Administrador</label>
                                                    </div>
                                                    <!-- Grid column -->

                                                    <!-- Grid column -->
                                                    <div class="col">
                                                        <!-- Default input -->
                                                        <select class="mdb-select md-form" name="empresas" id="empresas" name="empresas">
                                                          <option value="" disabled selected>Elige empresa</option>
                                                          <?php foreach ($empresas as $row) { ?>
                                                            <option value=" <?php echo  $row['id']?> "><?php echo $row['id']." ".$row['razon_social'] ?></option>
                                                          <?php } ?>
                                                        </select>
                                                        <label>Empresa</label>

                                                    </div>
                                                    <!-- Grid column -->

                                                    
                                                </div>
                                                <!-- Grid row -->
                                                <br>
                                              
                                                <br>

                                                <div class="row">
                                                   <!-- Grid column -->
                                                   

                                                    
                                                </div>
                                                <!-- Grid row -->


                                            </form>


                                        </div>

                                        <div class="modal-footer">
                                                
                                                <button class="btn-floating btn-lg success-color" onclick="asignarAdminEmpresa();">
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
<script type="text/javascript" src="<?php echo base_url();?>assets/js/admin.js"></script>
<script>
  

</script>