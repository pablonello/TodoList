// Script para enviar el formulario por AJAX
$(document).ready(function () {
    $('#tareaFormulario').submit(function (e) {
        e.preventDefault(); // Evita que el formulario se envíe normalmente

        // Obtén los datos del formulario
        var formData = $(this).serialize();

        // Envía los datos por AJAX
        $.ajax({
            url: base_url + "usuarioController/guardarUsuario", // Cambia 'ruta/hacia/la/funcion/guardar_tarea' por la ruta real de tu función en el controlador
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function (response) {
                // Maneja la respuesta del servidor
                if (response.success) {
                    alert(response.message); // Muestra un mensaje de éxito
                    $('#agregarTarea').modal('hide'); // Cierra el modal
                    console.log('recarga');
                    window.location.reload();
                } else {
                    alert('Error al guardar el usuario. Por favor, inténtalo de nuevo.'); // Muestra un mensaje de error
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText); // Muestra el error en la consola del navegador
                alert('Error al procesar la solicitud. Por favor, inténtalo de nuevo.'); // Muestra un mensaje de error
            }
        });
    });

});

