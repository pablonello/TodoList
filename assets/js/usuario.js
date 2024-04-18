$(document).ready(function () {
    $('#tareaFormulario').submit(function (e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            url: base_url + "usuarioController/guardarUsuario",
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

