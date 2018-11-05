<script type="text/javascript" src="<?php echo base_url();?>assets/js/Empresa.js"></script>

<!--Main layout-->
    <main>

        <section class="mt-2">
            <h3 class="text-center"><strong>Empresas </strong></h3>

            <section class="text-right">

            <button class="btn-floating  btn-lg blue" data-toggle="modal" data-target="#modal-asignar">
            <i class="fa fa-check"></i>
            </button>
                <button class="btn-floating  btn-lg green" data-toggle="modal" data-target="#modalLRFormDemo">
                <i class="fa fa-plus"></i>
            </button>

            <button onclick="editarEmpresas();" class="btn-floating btn-lg warning-color" >
                <i class="fa fa-pencil-square-o"></i>
            </button>

            <button onclick="deleteEmpresas();" class="btn-floating btn-lg red ">
                <i class="fa fa-minus"></i>
            </button>
                
            </section>

             

        </section >

        <br>
 


        <div class="container-fluid">

            <!--Section: Cards color-->
            <section id="empresas-no-asignadas" class="mt-2">

                <!--Grid row-->
                <div class="row">

                    

                    <?php foreach ($empresasNoAsignadas as $row) { ?>
                        <?php if ($row['_erase'] == null) { ?>

                                <!--Grid column-->
                            <div class="col-xl-4 col-md-6 mb-4 borrar editar">

                                <!--Panel-->
                                <div class="card h-100">
                                    <div class="card-header white-text success-color color" >


                                        <button  onclick="deleteEmpresa(<?php echo $row['id']?>);" class="btn btn-sm  black float-right button" style="display: none;" >
                                            <i class="fa fa-times " aria-hidden="true" ></i>
                                        </button> 

                                        <button  onclick="editarEmp(<?php echo $row['id']?>);" class="btn btn-sm  black float-right button1" style="display: none;" >
                                            <i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="modal" data-target="#modalLRFormDemo1" ></i>
                                        </button>
                                        <?php $row['contacto'] = json_decode($row['contacto']); ?>
                                        <button onclick="editEmpresa(
                                            <?php echo $row['id'] ?>,
                                            <?php echo "'".$row['razon_social']."'" ?>,
                                            <?php echo isset($row['contacto']->nombre) ? "'".$row['contacto']->nombre."'" : "''"; ?>,
                                            <?php echo isset($row['contacto']->telefono) ? "'".$row['contacto']->telefono."'" : "''"; ?>,
                                            <?php echo isset($row['contacto']->correo) ? "'".$row['contacto']->correo."'" : "''"; ?>
                                        )" class="btn btn-sm  black float-right button-edit" style="display: none;"><i class="fa fa-pencil" aria-hidden="true" ></i></button>
                                       <?php echo $row['razon_social']?>
                                    </div>
                                    

                                    <!--/.Card Data-->

                                    <!--Card content-->
                                    <div class="card-body">
                                        <div class="blue font-weight-bold white-text text-center">
                                            Datos de contacto
                                        </div>

                                        <div class="ml-1 mt-1">
                                            <p><span class="font-weight-bold">Nombre: </span><i><?php echo isset($row['contacto']->nombre) ? $row['contacto']->nombre : ""; ?></i></p>
                                            <p><span class="font-weight-bold">Correo: </span><i><?php echo isset($row['contacto']->correo) ? $row['contacto']->correo : "" ?></i></p>
                                            <p><span class="font-weight-bold">telefono: </span><i><?php echo isset($row['contacto']->telefono) ? $row['contacto']->telefono : "" ?></i></p>
                                        </div>
                                        
                                        <!--Text-->
                                        <p class="font-small grey-text">Fecha de Registro: <?php echo explode(" ", $row['_create'])[0]; ?></p>
                                
                                    </div>
                                    <!--/.Card content-->

                                </div>
                                <!--/.Panel-->

                            </div>
                            <!--Grid column-->

                        
                   <?php  } ?>
                   <?php  } ?>


                   
                   

                   
   
                </div>
                <!--Grid row-->

            </section>
            <!--Section: Cards color-->

<!--Section: Cards color-->
            <section id="empresas-asignadas" class="mt-2">

                <!--Grid row-->
                <div class="row">

                    

                    <?php foreach ($empresas as $row) { ?>
                        <?php if ($row['_erase'] == null) { ?>

                                <!--Grid column-->
                            <div class="col-xl-4 col-md-6 mb-4 borrar editar">

                                <!--Panel-->
                                <div class="card h-100">
                                    <div class="card-header white-text blue-color color" >


                                        <button  onclick="delEmpresa1(<?php echo $row['id']?>);" class="btn btn-sm  black float-right button" style="display: none;" >
                                            <i class="fa fa-times " aria-hidden="true" ></i>
                                        </button> 

                                        <?php $row['contacto'] = json_decode($row['contacto']); ?>
                                        <button onclick="editEmpresa(
                                            <?php echo $row['id'] ?>,
                                            <?php echo "'".$row['razon_social']."'" ?>,
                                            <?php echo isset($row['contacto']->nombre) ? "'".$row['contacto']->nombre."'" : "''"; ?>,
                                            <?php echo isset($row['contacto']->telefono) ? "'".$row['contacto']->telefono."'" : "''"; ?>,
                                            <?php echo isset($row['contacto']->correo) ? "'".$row['contacto']->correo."'" : "''"; ?>
                                        )" class="btn btn-sm  black float-right button-edit" style="display: none;"><i class="fa fa-pencil" aria-hidden="true" ></i></button>
                                       <?php echo $row['razon_social']?>
                                       <sup><?php echo $row['nombres']?></sup>
                                    </div>
                                    

                                    <!--/.Card Data-->

                                    <!--Card content-->
                                    <div class="card-body">
                                        <div class="blue font-weight-bold text-center">
                                            Datos de contacto
                                        </div>

                                        <div class="ml-1 mt-1">
                                            <p><span class="font-weight-bold">Nombre: </span><i><?php echo isset($row['contacto']->nombre) ? $row['contacto']->nombre : ""; ?></i></p>
                                            <p><span class="font-weight-bold">Correo: </span><i><?php echo isset($row['contacto']->correo) ? $row['contacto']->correo : "" ?></i></p>
                                            <p><span class="font-weight-bold">telefono: </span><i><?php echo isset($row['contacto']->telefono) ? $row['contacto']->telefono : "" ?></i></p>
                                        </div>
                                        
                                        <!--Text-->
                                        <p class="font-small grey-text">Fecha de Registro: <?php echo explode(" ", $row['_create'])[0]; ?></p>
                                
                                    </div>
                                    <!--/.Card content-->

                                </div>
                                <!--/.Panel-->

                            </div>
                            <!--Grid column-->

                        
                   <?php  } ?>
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
                                        <a class="nav-link active" data-toggle="tab"  role="tab"><i class="fa fa-user mr-1"></i>Editar Campaña</a>
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
                                            <input type="hidden" id="empresa-id" value="">
                                                <!-- Grid row -->
                                                <div class="row">
                                                    <div class="text-center font-weight-bold">Empresa</div>
                                                    <!-- Grid column -->
                                                    <div class="col-12">
                                                        <!-- Default input -->
                                                        <label>Razón Social</label>
                                                        <input type="text" class="form-control" id="razon-social-editar" name="razon-social-editar">
                                                    </div> 
                                                    <!-- Grid column -->

                                                    <div class="text-center font-weight-bold">Contacto</div>
                                                    <!-- Grid column -->
                                                    <div class="col-12">
                                                        <!-- Default input -->
                                                        <label>Nombre</label>
                                                        <input type="text" class="form-control" id="nombres-editar" name="nombres-editar">
                                                    </div>
                                                    <!-- Grid column -->

                                                    <!-- Grid column -->
                                                    <div class="col-6">
                                                        <!-- Default input -->
                                                        <label>Teléfono</label>
                                                        <input type="text" class="form-control" id="telefono-editar" name="telefono-editar">
                                                    </div>
                                                    <!-- Grid column -->
                                                    <!-- Grid column -->
                                                    <div class="col-6">
                                                        <!-- Default input -->
                                                        <label>Correo electrónico</label>
                                                        <input type="text" class="form-control" id="correo-editar" name="correo-editar">
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
                                                
                                                <button class="btn-floating btn-lg warning-color" onclick="editarEmpresa()">
                                                    <i class="fa fa-pencil"></i>
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



        
        <!--modal-asignar Form Demo-->
                <div class="modal fade" id="modal-asignar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog cascading-modal" role="document">
                        <!--Content-->
                        <div class="modal-content">

                            <!--Modal cascading tabs-->
                            <div class="modal-c-tabs">

                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs tabs-2 green " role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab"  role="tab"><i class="fa fa-user mr-1"></i> Asignar Empresa</a>
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
                                                        <select class="mdb-select md-form" name="empresas" id="empresas" name="empresas">
                                                          <option value="" disabled selected>Elige empresa</option>
                                                          <?php foreach ($empresasNoAsignadas as $row) { ?>
                                                            <option value=" <?php echo  $row['id']?> "><?php echo $row['id']." ".$row['razon_social'] ?></option>
                                                          <?php } ?>
                                                        </select>
                                                        <label>Empresa</label>

                                                    </div>
                                                    <!-- Grid column -->
                                                    <!-- Grid column -->
                                                    <div class="col">
                                                        <!-- Default input -->
                                                        <select class="mdb-select md-form" name="administradores" id="administradores" name="administradores">
                                                          <option value="" disabled selected>Elige administrador</option>
                                                          <?php foreach ($adminsNoAsignados as $row) { ?>
                                                            <option value=" <?php echo  $row['perfil_id']?> "><?php echo $row['perfil_id']." ".$row['nombres'] ?></option>
                                                          <?php } ?>
                                                        </select>
                                                        <label for="administradores">Administrador</label>
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
                <!--modal-asignar Form Demo-->
        <!--modal-crear Form Demo-->
                <div class="modal fade" id="modalLRFormDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog cascading-modal" role="document">
                        <!--Content-->
                        <div class="modal-content">

                            <!--Modal cascading tabs-->
                            <div class="modal-c-tabs">

                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs tabs-2 green " role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab"  role="tab"><i class="fa fa-user mr-1"></i> Agregar Empresa</a>
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
                                            <input type="hidden" id="id-admin-crear" value="<?php echo $this->session->userdata['perfil-actual']['perfil_id'] ?>">
                                                <!-- Grid row -->
                                                <div class="row">
                                                    <div class="text-center font-weight-bold">Empresa</div>
                                                    <!-- Grid column -->
                                                    <div class="col-12">
                                                        <!-- Default input -->
                                                        <label>Razón Social</label>
                                                        <input type="text" class="form-control" id="razon" name="razon">
                                                    </div> 
                                                    <!-- Grid column -->

                                                    <div class="text-center font-weight-bold">Contacto</div>
                                                    <!-- Grid column -->
                                                    <div class="col-12">
                                                        <!-- Default input -->
                                                        <label>Nombre</label>
                                                        <input type="text" class="form-control" id="nombre" name="nombre">
                                                    </div>
                                                    <!-- Grid column -->

                                                    <!-- Grid column -->
                                                    <div class="col-6">
                                                        <!-- Default input -->
                                                        <label>Teléfono</label>
                                                        <input type="text" class="form-control" id="telefono" name="telefono">
                                                    </div>
                                                    <!-- Grid column -->
                                                    <!-- Grid column -->
                                                    <div class="col-6">
                                                        <!-- Default input -->
                                                        <label>Correo electrónico</label>
                                                        <input type="text" class="form-control" id="correo" name="correo">
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
                                                
                                                <button class="btn-floating btn-lg success-color" onclick="addEmpresa();">
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
                <!--modal-crear Form Demo-->


 
<script type="text/javascript" src="<?php echo base_url();?>assets/js/Empresa.js"></script>
