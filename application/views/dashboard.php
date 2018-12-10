<main>




            <h1>Bienvenido al Sistema de Marketing Digital<strong>, <?php echo $this->session->userdata['usuario']['nombres']." ".$this->session->userdata['usuario']['apellidos'] ?></strong></h1>

        <section class="mt-2">
            <h3 class="text-center"><strong>Dashboard</strong></h3>

        </section >

        <br>

        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Tareas Atrasadas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Grafica Tareas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Empleados NO Asignados</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">

          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

            <?php foreach ($tareaAtrasadas as $row) {?>
                <?php if ($row['estado_tarea_id'] == "4") {?>
                 
                 <ul class="list-group list-group-flush">
                  <li class="list-group-item">Descripción:  <?php echo $row['descripcion']  ?> <button type="btn" class="btn btn-danger btn-sm float-right" data-toggle="modal" data-target="#modalLRFormDemo">Ver</button></li>
                </ul>

                <?php }else{ ?>
                    <h3 class="text-danger text-center">NO HAY TAREA ATRASADAS, BUEN TRABAJO.</h3>
                <?php } ?>

            <?php } ?>

          </div>

          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

             <canvas id="myChart" ></canvas>
          
          </div>

            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

                <div class="row">

                <?php foreach ($empleados as $row) { ?>
          
                        <!--Grid column-->
                    <div class="col-xl-3 col-md-6 mb-4">

                        <!--Panel-->
                        <div class="card h-100">
                            <div class="card-header white-text danger-color" >                  
                            </div>
                            
                            <h6 class="ml-4 mt-4 dark-grey-text font-weight-bold">Datos</h6>

                            <p class="ml-3 mt-3 font-small dark-grey-text"> 
                                Nombre: <?php echo $row['nombres']?>
                                <?php echo $row['apellidos']?>
                            </p>

                            <p class="ml-3 mt-1 font-small dark-grey-text"> 
                                Correo: <?php echo $row['correo']?>                             
                            </p>
                            <!--/.Card Data-->

                            <!--Card content-->
                            <div class="card-body">
                                
                                <!--Text-->
                                <p class="font-small grey-text">Fecha de Registro, no asignado desde <?php echo strftime("%e de %B de %Y, %H:%M", strtotime($row['_create'])) ?></p>
                            </div>
                            <!--/.Card content-->
                        </div>
                        <!--/.Panel-->
                    </div>
                    <!--Grid column-->
                    <?php } ?>
                </div>
            </div>
        </div>


    
    <section id="bienvenida" class="mt-2 text-center">

            
        <br>
 
        <?php if($this->session->userdata['perfil-actual']['rol_id'] == 1) {?>
            <section id="resumen-administrador">
            </section>
        <?php } ?>
 
        <?php if($this->session->userdata['perfil-actual']['rol_id'] == 1) {?>
        <section id="resumen-root">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="administradores card-header white-text font-weight-bold">
                            <h3>Administradores</h3>
                        </div>
                        <div class="row">
                            <?php foreach ($administradores as $posicion => $administrador) { ?>
                                <div class="col-12">
                                    <div class="card">
                                        <div class="row">
                                            <div class="mx-4 mt-2 col-12">
                                                <p class="mr-5  font-weight-bold">
                                                <?php  echo $administrador['nombres']." ".$administrador['apellidos'];?> > <i class="font-weight-bold"><?php echo $administrador['correo'] ?></i>
                                                </p>
                                                <p class="mb-2">Editado por última vez: <span class="blue-text"><?php echo strftime("%e de %B de %Y, %H:%M", strtotime($administrador['_update'])) ?></span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="empresas card-header white-text font-weight-bold">
                            <h3>Empresas</h3>
                        </div>

                        <div class="row">
                            <?php foreach ($empresas as $posicion => $empresa) { ?>
                                <div class="col-12">
                                    <div class="card">
                                        <div class="row">
                                            <div class="mx-4 mt-2 col-12">
                                                <p class="m-0 mr-4 font-weight-bold">
                                                <?php  echo $empresa['razon_social'];?> > 
                                                <?php
                                                $contacto = json_decode($empresa['contacto']);  
                                                ?>

                                                <?php if(isset($contacto)) {?>
                                                    <span>{ <i><?php echo (isset($contacto->nombre) ? $contacto->nombre : "").", ".(isset($contacto->correo) ? $contacto->correo : "").", ".(isset($contacto->telefono) ? $contacto->telefono : "") ?></i> }</span>
                                                 <?php }?>
                                                </p>
                                                <p>Editado por última vez: <span class="blue-text"><?php echo strftime("%e de %B de %Y, %H:%M", strtotime($empresa['_update'])) ?></span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php } ?>

    </section>










		<!--Modal: Login / Register Form Demo-->
    <div class="modal fade" id="modalLRFormDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog cascading-modal modal-lg" role="document">
            <!--Content-->
            <div class="modal-content">

                <!--Modal cascading tabs-->
                <div class="modal-c-tabs">

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs tabs-2 red " role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab"  role="tab"><i class="fa fa-times mr-1"></i> Tareas Atrasadas</a>
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

                                         <!--Grid column-->
                                        <div class="md-form col-6">
                                            <input  type="text"  class="form-control " id="asig" name="asig">
                                            <label for="form3" >Asignado a la Tarea</label>

                                        </div>
                                        <!--Grid column-->

                                         <!--Grid column-->
                                        <div class="md-form col-6">

                                            <input  type="text"  class="form-control " id="desc" name="desc">
                                            <label for="form3" >Descripcion de la tarea</label>

                                        </div>
                                        <!--Grid column-->

                                        <!--Grid column-->
                                        <div class="md-form col-6">

                                            <input  type="text"  class="form-control " id="desc" name="desc">
                                            <label for="form3" >Fecha Registrada</label>

                                        </div>
                                        <!--Grid column-->
                                        
                                    </div>
                                    <!-- Grid row -->
                                </form>

                            </div>

                            <div class="modal-footer">
   
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


       



</main>



<script>
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ["En proceso", "Aceptadas", "Cancelada", "Atrasada"],
        datasets: [{
            label: 'Estados de las Tareas ',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>