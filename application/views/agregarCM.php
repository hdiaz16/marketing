<!--Main layout-->
<main>
    <section class="mt-2">
        <h3 class="text-center"><strong>Agregar Usuarios </strong></h3>
        <section class="text-right">
            <button class="btn-floating  btn-lg  green"
            data-toggle="modal" data-target="#modalLRFormDemo">
                <i class="fa fa-plus"></i>
            </button>

            <button class="btn-floating btn-lg warning-color" onclick="editar()">
                <i class="fa fa-pencil-square-o"></i>
            </button>

            <button class="btn-floating btn-lg red " onclick="delCM();">
                <i class="fa fa-minus"></i>
            </button>
        </section>
    </section>

    <br>

    <div class="container-fluid">
        <!--Section: Cards color-->
        <section class="mt-2">
            <!--Grid row-->
            <div class="row">
                <?php foreach ($CM as $row) { ?>
                    <?php if ($row['_erase'] == null) { ?>
                    <!--Grid column-->
                    <div class="col-xl-3 col-md-6 mb-4 borrar editar">
                        <!--Panel-->
                        <div class="card h-100">
                            <div class="card-header white-text success-color color">
                                <button onclick="delCM1( <?php echo $row['perfil_id']; ?> )"
                                class="btn btn-sm  black float-right button"
                                style="display: none;">
                                    <i class="fa fa-times " aria-hidden="true"></i>
                                </button>

                                <button class="btn btn-sm  black float-right buttonEdit " 
                                style="display: none;" data-toggle="modal"
                                onclick="editarCM(
                                    <?php echo isset($row['perfil_id']) ? $row['perfil_id'] : 0; ?>,
                                    <?php echo isset($row['nombres']) ? "'".$row['nombres']."'" : "''"; ?>,
                                    <?php echo isset($row['apellidos']) ? "'".$row['apellidos']."'" : "''"; ?>,
                                    <?php echo isset($row['correo']) ? "'".$row['correo']."'" : "''"; ?>
                                )">
                                    <i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i>
                                </button>

                                <?php echo $row['nombres']." ".$row['apellidos']?>

                            </div>

                            <h6 class="ml-4 mt-4 dark-grey-text font-weight-bold">Datos</h6>
                            <p class="ml-3 mt-3 font-small dark-grey-text">
                                <?php echo $row['correo']?>
                            </p>
                            <!--/.Card Data-->

                            <!--Card content-->
                            <div class="card-body">

                                <!--Text-->
                                <p class="font-small grey-text">Fecha de Inicio:
                                    <?php echo $row['_create']?>
                                </p>

                            </div>
                            <!--/.Card content-->

                        </div>
                        <!--/.Panel-->

                    </div>
                    <!--Grid column-->
                    <?php  }  ?>
                <?php  }  ?>
            </div>
            <!--Grid row-->
        </section>
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
                        <a class="nav-link active" data-toggle="tab" role="tab">
                            <i class="fa fa-user mr-1"></i> Agregar Usuarios</a>
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
                                    <div class="md-form col-6">
                                        <label for="form1" class="">Nombre</label>
                                        <input type="text" id="nombre" class="form-control">
                                    </div>
                                    <div class="md-form col-6">
                                        <label for="form1" class="">Apellido</label>
                                        <input type="text" id="apellido" class="form-control">
                                    </div>
                                    <!-- Grid column -->
                                </div>

                                <br>

                                <div class="row">
                                    <!-- Grid column -->
                                    <div class="md-form col-6">
                                        <label for="form1" class="">Correo</label>
                                        <input type="email" id="correo" class="form-control">
                                    </div>

                                    <!-- Grid column -->
                                    <div class="md-form col-6">
                                        <label for="form1" class="">Contraseña</label>
                                        <input type="password" id="contrasena" class="form-control">
                                    </div>
                                    <!-- Grid column -->
                                </div>

                                <br>

                                <div class="row">
                                    <!--Grid column-->
                                    <div class="col-12">
                                        <!--Name-->
                                        <select class="mdb-select" id="selRol">
                                            <option value="" disabled selected>Seleccionar Rol</option>
                                            <?php foreach ($rol as $row) {
                                                echo '<option value='.$row['id'].'>'.$row['nombre'].'</option>';
                                            } ?>
                                        </select>
                                        <button type="button" class="btn-save btn btn-primary btn-sm">Guardar</button>
                                    </div>
                                    <!--Grid column-->
                                </div>
                            </form>
                        </div>

                        <div class="modal-footer">
                            <button class="btn-floating btn-lg success-color" onclick="addCM();">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Modal: Login / Register Form Demo-->

<div class="modal fade" id="modal-editar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Modal cascading tabs-->
            <div class="modal-c-tabs">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs tabs-2 warning-color " role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" role="tab">
                            <i class="fa fa-user mr-1"></i> Editar Usuarios</a>
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
                                <input id="usuario_id" type="hidden" value="">
                                <!-- Grid row -->
                                <div class="row">
                                    <!-- Grid column -->
                                    <div class="md-form col-6">
                                        <label for="form1" class="">Nombre</label>
                                        <input type="text" id="nombre_update" class="form-control">
                                    </div>
                                    <div class="md-form col-6">
                                        <label for="form1" class="">Apellido</label>
                                        <input type="text" id="apellido_update" class="form-control">
                                    </div>
                                    <!-- Grid column -->
                                </div>

                                <br>

                                <div class="row">
                                    <!-- Grid column -->
                                    <div class="md-form col-6">
                                        <label for="form1" class="">Correo</label>
                                        <input type="email" id="correo_update" class="form-control">
                                    </div>

                                    <!-- Grid column -->
                                    <div class="md-form col-6">
                                        <label for="form1" class="">Contraseña</label>
                                        <input type="password" id="contrasena_update" class="form-control">

                            <!--Modal cascading tabs-->
                            <div class="modal-c-tabs">

                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs tabs-2 green " role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab"  role="tab"><i class="fa fa-user mr-1"></i> Agregar Usuarios</a>
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

                                                    <div class="md-form col-6">
                                                         <label for="form1" class="">Nombre</label>
                                                        <input type="text" id="nombre" class="form-control">
                                                    </div>
                                                    <!-- Grid column -->

                                                    <!-- Grid column -->
                                                    

                                                    <div class="md-form col-6">
                                                         <label for="form1" class="">Apellido</label>
                                                        <input type="text" id="apellido" class="form-control">
                                                    </div>
                                                    <!-- Grid column -->

                                                    
                                                </div>
                                                <!-- Grid row -->
                                                <br>

                                                <div class="row">
                                                   <!-- Grid column -->
                                                    <div class="md-form col-6">
                                                         <label for="form1" class="">Correo</label>
                                                        <input type="email" id="correo" class="form-control">
                                                    </div>
                                                    <!-- Grid column -->

                                                    <!-- Grid column -->
                                                    <div class="md-form col-6">
                                                         <label for="form1" class="">Contraseña</label>
                                                        <input type="password" id="contrasena" class="form-control">
                                                    </div>
                                                    <!-- Grid column -->
 
                                                </div>
                                                <!-- Grid row -->
                                                  
                                                  <br>
                     
                                                <div class="row">


                                                    <!--Grid column-->
                                                    <div class="col-12">

                                                        <!--Name-->
                                                        <select class="mdb-select"  id="selRol">
                                                            <option value="" disabled selected>Seleccionar Rol</option>
                                                            <?php foreach ($rol as $row) {

                                                                if ($row['id'] != 2) {
                                                                    echo '<option value='.$row['id'].'>'.$row['nombre'].'</option>';
                                                                }

                                                                
                                                            } ?>
                                                            
                                                        </select>
                                                        <button  type="button" class="btn-save btn btn-primary btn-sm">Guardar</button>

                                                    </div>
                                                    <!--Grid column-->
                                                    

                                                </div>


                                            </form>


                                        </div>

                                        <div class="modal-footer">
                                                
                                                <button class="btn-floating btn-lg success-color" onclick="addCM();">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                        </div>
        
>>>>>>> Stashed changes
                                    </div>
                                    <!-- Grid column -->
                                </div>

                                <br>

                                <div class="row">
                                    <!--Grid column-->
                                    <div class="col-12">
                                        <!--Name-->
                                        <select class="mdb-select" id="selRol_update">
                                            <option value="" disabled selected>Seleccionar Rol</option>
                                            <?php foreach ($rol as $row) {
                                                echo '<option value='.$row['id'].'>'.$row['nombre'].'</option>';
                                            } ?>
                                        </select>
                                        <button type="button" class="btn-save btn btn-primary btn-sm">Guardar</button>
                                    </div>
                                    <!--Grid column-->
                                </div>
                            </form>
                        </div>

                        <div class="modal-footer">
                            <button class="btn-floating btn-lg warning-color" onclick="updateCM()">
                                <i class="fa fa-pencil-square-o"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Modal: Login / Register Form Demo-->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/CM.js"></script>