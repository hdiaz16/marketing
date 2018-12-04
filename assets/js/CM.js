
function addCM() {
  var nombre = $("#nombre").val();
  var apellido = $("#apellido").val();
  var correo = $("#correo").val();
  var contrasena = $("#contrasena").val();
  var rol = $("#selRol").val();

  console.log(rol);

  $.ajax({
    type: 'POST',
    url: "../AgregarCM/registrarUsuario",
    cache: false,
    async: true,
    dataType: 'json',
    data: {
      nombre: nombre,
      apellido: apellido,
      correo: correo,
      contrasena: contrasena,
      rol: rol

    },
    success: function (data) {
      console.log(data);

      if (data == false) {
        $.confirm({
          icon: 'fa fa-times', title: '<strong>Error</strong><br>',
          theme: 'supervan',
          content: 'Error al registrar el usuario.',
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
          content: 'Registro con exito',
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

function delCM() {
  $(".borrar").toggleClass("shake-little shake-constant");
  $(".color").toggleClass("danger-color");
  $(".button").toggle();
}

function delCM1(id) {
  $.ajax({
    type: 'POST',
    url: "../AgregarCM/deleteCM",
    cache: false,
    async: true,
    dataType: 'json',
    data: {
      id: id
    },
    success: function (data) {
      console.log(data);

      if (data == false) {
        $.confirm({
          icon: 'fa fa-times',
          title: '<strong>Error</strong><br>', 
          theme: 'supervan',
          content: 'No se elimino.',
          type: 'red',
          buttons: {
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
          content: 'Se elimino correctamente',
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

function editadoCM  (){
  $(".editar").toggleClass("shake-little shake-constant");
  $(".color").toggleClass("warning-color");
  $(".buttonEditar").toggle();
}

function editarCM(id, nombre, apellido, correo) {
  $('#usuario_id').val(id);
  $('#nombre_update').val(nombre);
  $('#apellido_update').val(apellido);
  $('#correo_update').val(correo);

  $('#modal-editar').modal();
}

function updateCM() {
  var id = $("#usuario_id").val();
  var nombre = $("#nombre_update").val();
  var apellido = $("#apellido_update").val();
  var correo = $("#correo_update").val();
  var contrasena = $("#contrasena_update").val();
  var rol = $("#selRol_update").val();

  console.log(nombre);

  $.ajax({
    type: 'POST',
    url: "../AgregarCM/editCM",
    cache: false,
    async: true,
    dataType: 'json',
    data: {
      id: id,
      nombre: nombre,
      apellido: apellido,
      correo: correo,
      contrasena: contrasena,
      rol: rol

    },
    success: function (data) {
      console.log(data);

      if (data == false) {
        $.confirm({
          icon: 'fa fa-times', title: '<strong>Error</strong><br>',
          theme: 'supervan',
          content: 'Error al editar el usuario.',
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
          content: 'Usuario editado con exito',
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