<main>
<section class="mt-2">
  <h3 class="text-center"><strong>Subtareas</strong></h3>
  <section class="text-right">

    <button class="btn-floating btn-lg green"
      data-toggle="modal" data-target="#subtareaForm">
      <i class="fa fa-plus"></i>
    </button>

    <button class="btn-floating btn-lg warning-color"
            onclick="toggleEdit()">
      <i class="fa fa-pencil-square-o"></i>
    </button>

    <button class="btn-floating btn-lg red"
            onclick="toggleDelete()">
      <i class="fa fa-minus"></i>
    </button>
  </section>
</section >

<br>

<div class="container-fluid">

  <section class="mt-2">

    <div class="row">

      <?php foreach ($subtareas as $row) { ?>
        <div class="col-xl-3 col-md-6 mb-4 borrar editar d-flex">
          <div class="card h-300 w-100 d-flex">
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
            } ?>
        
            <div class="card-header white-text <?php echo $color ?> color" >  
              <p class="font-small text-right">
                <?php echo $row['estado']?>
              </p>

              <h5 class="ml-4 mt-2 dark-grey-text font-weight-bold">
                <?php echo $row['nombres'] ?>
              </h5>

              <div>
                <button class="btn btn-sm float-right button-borrar black"
                        onclick="deleteSubtarea(<?php echo $row['id'] ?>)"
                        style="display: none;">
                  <i class="fa fa-times " aria-hidden="true" ></i>
                </button>
                <input type="hidden" value="<?php echo $row['id'] ?>" />
                <button class="btn btn-sm black float-right button-editar" 
                        data-toggle="modal" data-target="#modal_edit"
                        onclick="setTareaId(<?php echo $row['id'] ?>)"
                        style="display: none;">
                  <i class="fa fa-pencil" aria-hidden="true" ></i>
                </button>

              </div>

            </div>
            
            <div class="card-body">
              <div class="card-text">
                <h6 class="ml-4 mt-2 dark-grey-text font-weight-bold">
                  <?php echo $row['descripcion'] ?>
                </h6>
              </div>
            </div>

          </div>

        </div>
      <?php  } ?>       
    </div>

  </section>

</div>

<!--Modal: Login / Register Form-->
<div class="modal fade" 
     id="subtareaForm" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">

  <div class="modal-dialog cascading-modal modal-lg" role="document">
    <!--Content-->
    <div class="modal-content">

      <!--Modal cascading tabs-->
      <div class="modal-c-tabs">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs tabs-2 green " role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab"
               href="#panel7" role="tab">Agregar Tarea</a>
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
                <select class="mdb-select"  id="selectEmpleado"
                        onchange="setEmpleadoId()">
                  <option value="" disabled selected>Seleccionar Empleado</option>
                  <?php foreach ($empleados as $row) {
                    echo '<option value='.$row['id'].'>'.$row['nombres'].'</option>';
                  } ?> 
                </select>
                <!-- Grid column -->

              </div>

              <div class="row">
                <!-- Grid column -->
                <div class="col-6 md-form">
                  <!-- Default input -->
                  <input  type="text"  class="form-control " id="desc"
                  name="desc">
                  <label for="form3" >Descripción de la tarea</label>

                </div>
                <!-- Grid column -->


                <div class="md-form col-6">
                  <input  type="text"  class="form-control datepicker"
                  id="fechaIn" name="fechaIn">
                  <label for="date-picker-example">Fecha de entrega</label>
                </div>

              </div>
            </div>

            <div class="modal-footer">
              <button class="btn-floating btn-lg success-color" 
                onclick="addSubtarea(<?php echo $subtareas[0]['tarea_id'] ?>);">
                <i class="fa fa-plus"></i>
              </button>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" 
     id="modal_edit" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">

  <div class="modal-dialog cascading-modal modal-lg" role="document">
    <!--Content-->
    <div class="modal-content">

      <!--Modal cascading tabs-->
      <div class="modal-c-tabs">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs tabs-2 green " role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab"
               href="#panel7" role="tab">Editar Tarea</a>
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
                <div class="col-6 md-form">
                  <!-- Default input -->
                  <input  type="text"  class="form-control " id="edit_desc"
                  name="desc">
                  <label for="form3" >Descripción de la tarea</label>

                </div>
                <!-- Grid column -->


                <div class="md-form col-6">
                  <input  type="text"  class="form-control datepicker"
                  id="edit_fechaIn" name="fechaIn">
                  <label for="date-picker-example">Fecha de entrega</label>
                </div>

              </div>
            </div>

            <div class="modal-footer">
              <button class="btn-floating btn-lg success-color" 
                onclick="editSubtarea()">
                <i class="fa fa-plus"></i>
              </button>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</main>

<script type="text/javascript"
        src="<?php echo base_url();?>assets/js/subtarea.js">
</script>
