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

            <button onclick="editarAdmins()" class="btn-floating btn-lg warning-color">
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
                    <?php foreach ($adminsNoAsignados as $row) { ?>
                                <!--Grid column-->
                            <div <?php echo $row['perfil_id'] == $this->session->userdata['perfil-actual']['perfil_id'] ? "hidden" : "" ?> class="col-xl-4 col-md-6 mb-4 borrar editar">

                                <!--Panel-->
                                <div class="card h-100">
                                    <div class="card-header white-text success-color color borrar editar" >

                                        <button onclick="deleteAdmin(<?php echo $row['perfil_id'] ?>)" class="btn btn-sm float-right button black" style="display: none;"><i class="fa fa-times " aria-hidden="true" ></i></button>
                                        
                                            
                                        <button onclick="editAdmin(
                                            <?php echo isset($row['usuario_id']) ? $row['usuario_id'] : 0; ?>,
                                            <?php echo isset($row['nombres']) ? "'".$row['nombres']."'" : "''"; ?>,
                                            <?php echo isset($row['apellidos']) ? "'".$row['apellidos']."'" : "''"; ?>,
                                            <?php echo isset($row['correo']) ? "'".$row['correo']."'" : "''"; ?>
                                        )" class="btn btn-sm  black float-right button-editar" style="display: none;"><i class="fa fa-pencil" aria-hidden="true" ></i></button>
                                       <?php echo $row['nombres']?>
                                       
                                    </div>
       
                                    <div class="ml-3 mt-1">
                                        <p><span class="font-weight-bold">Apellidos: </span><i><?php echo $row['apellidos'] ?></i></p>
                                        <p><span class="font-weight-bold">Correo: </span><i><?php echo $row['correo'] ?></i></p>
                                    </div>
                                    <!--/.Card Data-->

                                    <!--Card content-->
                                    <div class="card-body">
                                        
                                        <!--Text-->
                                        <p class="font-small grey-text">Fecha de Registro: <?php echo explode(" ", $row['_create'])[0]?></p>
                                        <p class="font-small grey-text">Última actualización: <?php echo explode(" ", $row['_update'])[0]?></p>
                                
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
            <!--Section: Cards color-->
            <section class="mt-2">

                <!--Grid row-->
                <div class="row">
                    <?php foreach ($admins as $row) { ?>
                            
                                <!--Grid column-->
                            <div <?php echo $row['perfil_id'] == $this->session->userdata['perfil-actual']['perfil_id'] ? "hidden" : "" ?> class="col-xl-4 col-md-6 mb-4 borrar editar">

                                <!--Panel-->
                                <div class="card h-100">
                                    <div class="card-header white-text blue-color color" >

                                        <button onclick="deleteAdmin(<?php echo $row['perfil_id'] ?>)" class="btn btn-sm  black float-right button" style="display: none;"><i class="fa fa-times " aria-hidden="true" ></i></button> 
                                        <button onclick="editAdmin(
                                            <?php echo isset($row['perfil_id']) ? $row['perfil_id'] : 0; ?>,
                                            <?php echo isset($row['nombres']) ? "'".$row['nombres']."'" : "''"; ?>,
                                            <?php echo isset($row['apellidos']) ? "'".$row['apellidos']."'" : "''"; ?>,
                                            <?php echo isset($row['correo']) ? "'".$row['correo']."'" : "''"; ?>
                                        )" class="btn btn-sm  black float-right button-edit" style="display: none;"><i class="fa fa-pencil" aria-hidden="true" ></i></button> 
                                       <i class="font-weight-bold"><?php echo $row['nombres']?></i>
                                       <sup><?php echo $row['empresa_nombre']?></sup>
                                       
                                    </div>
                                    

                                    
                                    <div class="ml-3 mt-1">
                                        <p><span class="font-weight-bold">Apellidos: </span><i><?php echo $row['apellidos'] ?></i></p>
                                        <p><span class="font-weight-bold">Correo: </span><i><?php echo $row['correo'] ?></i></p>
                                    </div>
                                    <!--/.Card Data-->

                                    <!--Card content-->
                                    <div class="card-body">
                                        
                                        <p class="font-small grey-text">Fecha de Registro: <?php echo explode(" ",$row['_create'])[0]?></p>
                                        <p class="font-small grey-text">Última actualización: <?php echo explode(" ", $row['_update'])[0]?></p>
                                
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
                                    <!--Panel 20-->
                                    <div class="tab-pane fade in show active" id="panel20" role="tabpanel">

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
        <!--modal editar -->
                <div class="modal fade" id="modal-editar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog cascading-modal" role="document">
                        <!--Content-->
                        <div class="modal-content">

                            <!--Modal cascading tabs-->
                            <div class="modal-c-tabs">

                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs tabs-2 green " role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab"  role="tab"><i class="fa fa-user mr-1"></i> Editar Administrador</a>
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
                                                <input id="usuario-id" type="hidden" value="">
                                                <!-- Grid row -->
                                                <div class="row">
                                                    <!-- Grid column -->
                                                    <div class="col">
                                                        <!-- Default input -->
                                                        <label>Nombres</label>

                                                        <input type="text" class="form-control" id="nombres-editar" name="nombres-editar">
                                                    </div>
                                                    <!-- Grid column -->
                                                    <!-- Grid column -->
                                                    <div class="col">
                                                        <!-- Default input -->
                                                        <label>Apellidos</label>
                                                        <input type="text" class="form-control" id="apellidos-editar" name="apellidos-editar">
                                                    </div>
                                                    <!-- Grid column -->
                                                </div>
                                                <!-- Grid row -->
                                                <br>
                                                <!-- Grid row -->
                                                <div class="row">
                                                    <!-- Grid column -->

                                                    <div class="col">
                                                        <!-- Default input -->
                                                        <label>Correo</label>
                                                        <input type="email" class="form-control" id="correo-editar" name="correo-editar">
                                                    </div>
                                                    <!-- Grid column -->

                                                    <!-- Grid column -->
                                                    <div class="col-6">
                                                        <!-- Default input -->
                                                        <label>Contraseña</label>
                                                        <input type="text" class="form-control" id="contrasenia-editar" name="contrasenia-editar">
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
                                                <button class="btn-floating btn-lg success-color" onclick="editarAdmin()"><i class="fa fa-plus"></i>
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
                <!--modal editar -->

        <!--Modal asignar-->
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
                                    <!--Panel 19-->
                                    <div class="tab-pane fade in show active" id="panel19" role="tabpanel">

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
                                                          <?php foreach ($adminsNoAsignados as $row) { ?>
                                                            <option value="<?php echo  $row['perfil_id']?>"><?php echo $row['perfil_id']." ".$row['nombres'] ?></option>
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

                                                          <?php foreach ($empresasNoAsignadas as $row) { ?>
                                                            <option value="<?php echo  $row['id']?>"><?php echo $row['id']." ".$row['razon_social'] ?></option>
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
                <!--Modal asignar-->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/admin.js"></script>