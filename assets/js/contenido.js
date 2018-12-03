var subtarea_id = '';
var tarea_id = '';
var publicacion_id = '';


// Obtener el id de la tarea a la que se le va subir el contenido
$('#select_subtarea').on('change', function() {
  subtarea_id = $('#select_subtarea' ).val();
  tarea_id = $("#select_subtarea")[0].selectedOptions[0].getAttribute("tarea_id");
  publicacion_id = $("#select_subtarea")[0].selectedOptions[0].getAttribute("publicacion_id");
  setValues();
});

function setValues() {
  $.ajax({
    type: 'POST',
    url: "../Contenido/mostrarContenido",
    cache: false,
    async: true,
    dataType: 'json',
    data: {
      publicacion_id,
    },
    success: function (data) {
      console.log(data[0].link);
      $('#post_body').val(data[0].body);
      $('#post_link').val(data[0].link);
    }
  });
}

function editarContenido() {
  body = $('#post_body').val();
  link = $('#post_link').val();

  console.log(body, link);

  $.ajax({
    type: 'POST',
    url: "../Contenido/editarContenido",
    cache: false,
    async: true,
    dataType: 'json',
    data: {
      publicacion_id,
      contenido: JSON.stringify({body: body, link: link})
    },
    success: function (data) {
      console.log(data);

      if (data == false) {
        $.confirm({
          icon: 'fa fa-times', title: '<strong>Error</strong><br>',
          theme: 'supervan',
          content: 'Error al registrar del contenido.',
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
