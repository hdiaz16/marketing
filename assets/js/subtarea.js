var empleado_id = ''
var tarea_id = ''

function setEmpleadoId() {
  empleado_id = $('#selectEmpleado').val();
  console.log(empleado_id);
}

function setTareaId(id) {
  tarea_id = id;
  console.log(tarea_id);
}

function toggleDelete() {
  $(".borrar").toggleClass("shake-little shake-constant");
  $(".color").toggleClass("danger-color");
  $(".button-borrar").toggle();
}

function toggleEdit(){
  $(".editar").toggleClass("shake-little shake-constant");
  $(".color").toggleClass("warning-color");
  $(".button-editar").toggle();
}

function addSubtarea(tarea_id) {
  var descripcion = $('#desc').val();
  var entrega = $('#fecahIn').val();

  $.ajax({
    type: 'POST',
    url: "../Subtareas/create",
    cache: false,
    async: true,
    dataType: 'json',
    data: {
      tarea_id,
      empleado_id,
      descripcion,
      entrega
    },
    success: function (data) {
      console.log(data);

      if (data == false) {
        $.confirm({
          icon: 'fa fa-times', title: '<strong>Error</strong><br>',
          theme: 'supervan',
          content: 'Error al registrar',
          type: 'red', buttons: {
            Aceptar: function (e, data) {
              setTimeout(function () { window.location.reload(1); }, 1000);
            }
          }
        });
      } else {
        $.confirm({
          icon: 'fa fa-check',
          title: '<strong>Realizado</strong><br>',
          theme: 'supervan',
          content: 'Registro con éxito',
          type: 'green',
          buttons: {
            Aceptar: function (e, data) {
              setTimeout(function () { window.location.reload(1); }, 1000);
            }
          }
        });
      }
    }
  });
}

function editSubtarea() {
  console.log(tarea_id);
  var descripcion = $('#edit_desc').val();
  var entrega = $('#edit_fecahIn').val();

  $.ajax({
    type: 'POST',
    url: "../Subtareas/update",
    cache: false,
    async: true,
    dataType: 'json',
    data: {
      tarea_id,
      descripcion,
      entrega
    },
    success: function (data) {
      console.log(data);

      if (data == false) {
        $.confirm({
          icon: 'fa fa-times', title: '<strong>Error</strong><br>',
          theme: 'supervan',
          content: 'Error al registrar',
          type: 'red', buttons: {
            Aceptar: function (e, data) {
              setTimeout(function () { window.location.reload(1); }, 1000);
            }
          }
        });
      } else {
        $.confirm({
          icon: 'fa fa-check',
          title: '<strong>Realizado</strong><br>',
          theme: 'supervan',
          content: 'Registro con éxito',
          type: 'green',
          buttons: {
            Aceptar: function (e, data) {
              setTimeout(function () { window.location.reload(1); }, 1000);
            }
          }
        });
      }
    }
  });
}

function deleteSubtarea(tarea_id) {
  $.ajax({
    type: 'POST',
    url: "../Subtareas/delete",
    cache: false,
    async: true,
    dataType: 'json',
    data: { tarea_id },
    success: function (data) {
      console.log(data);

      if (data == false) {
        $.confirm({
          icon: 'fa fa-times', title: '<strong>Error</strong><br>',
          theme: 'supervan',
          content: 'Error al borrar',
          type: 'red', buttons: {
            Aceptar: function (e, data) {
              setTimeout(function () { window.location.reload(1); }, 1000);
            }
          }
        });
      } else {
        $.confirm({
          icon: 'fa fa-check',
          title: '<strong>Realizado</strong><br>',
          theme: 'supervan',
          content: 'Registro con éxito',
          type: 'green',
          buttons: {
            Aceptar: function (e, data) {
              setTimeout(function () { window.location.reload(1); }, 1000);
            }
          }
        });
      }
    }
  });
}
