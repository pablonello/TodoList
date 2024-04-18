// Script para enviar el formulario por AJAX
$(document).ready(function () {
    $('#tareaFormulario').submit(function (e) {
        e.preventDefault(); // Evita que el formulario se envíe normalmente

        // Obtén los datos del formulario
        var formData = $(this).serialize();

        // Envía los datos por AJAX
        $.ajax({
            url: base_url + "tareaController/guardarTarea", // Cambia 'ruta/hacia/la/funcion/guardar_tarea' por la ruta real de tu función en el controlador
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
                    alert('Error al guardar la tarea. Por favor, inténtalo de nuevo.'); // Muestra un mensaje de error
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText); // Muestra el error en la consola del navegador
                alert('Error al procesar la solicitud. Por favor, inténtalo de nuevo.'); // Muestra un mensaje de error
            }
        });
    });

    $('#tablaTareas tbody tr').each(function () {
        var fechaFinStr = $(this).find('td:eq(5)').text(); // Obtiene el texto de la sexta celda (índice 5)
        if (fechaFinStr !== "-") {
            var fechaFin = new Date(fechaFinStr);
            var today = new Date();
            var difference = fechaFin.getTime() - today.getTime();
            var daysDifference = Math.ceil(difference / (1000 * 3600 * 24));
            console.log(daysDifference);
            var threshold = 3; // Umbral de días
            if (daysDifference <= threshold && daysDifference >= 0) {
                alert("La fecha de finalización de una tarea se acerca: " + fechaFinStr);
            }
        }
    });

    document.getElementById("checkAll").addEventListener("change", function () {

        var checkboxes = document.querySelectorAll("#tablaTareas tbody input[type='checkbox']");
        checkboxes.forEach(function (checkbox) {
            checkbox.checked = this.checked;
        }, this);
    });

    document.getElementById("eliminarSeleccionados").addEventListener("click", function () {
        var checkboxes = document.querySelectorAll("#tablaTareas tbody input[type='checkbox']:checked");
        if (checkboxes.length > 0) {
            var confirmar = confirm("¿Estás seguro de que deseas eliminar las tareas seleccionadas?");
            if (confirmar) {
                var ids = [];
                checkboxes.forEach(function (checkbox) {
                    ids.push(checkbox.value);
                });
                // Envía los datos por AJAX
                $.ajax({
                    url: base_url + "tareaController/eliminarTarea",
                    type: 'POST',
                    data: { ids: ids },
                    dataType: 'json',
                    success: function (response) {
                        if (response.success) {
                            alert(response.message);
                            window.location.reload();
                        } else {
                            alert('Error: ' + response.message);
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                        alert('Error al procesar la solicitud. Por favor, inténtalo de nuevo.');
                    }
                });
            }
        } else {
            alert("Selecciona al menos una tarea para eliminar.");
        }
    });


    document.getElementById("completarSeleccionados").addEventListener("click", function () {
        var checkboxes = document.querySelectorAll("#tablaTareas tbody input[type='checkbox']:checked");
        if (checkboxes.length > 0) {
            var confirmar = confirm("¿Estás seguro de que deseas completar las tareas seleccionadas?");
            if (confirmar) {
                var ids = [];
                checkboxes.forEach(function (checkbox) {
                    ids.push(checkbox.value);
                });
                // Envía los datos por AJAX
                $.ajax({
                    url: base_url + "tareaController/completarTarea",
                    type: 'POST',
                    data: { ids: ids },
                    dataType: 'json',
                    success: function (response) {
                        if (response.success) {
                            alert(response.message);
                            window.location.reload();
                        } else {
                            alert('Error: ' + response.message);
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                        alert('Error al procesar la solicitud. Por favor, inténtalo de nuevo.');
                    }
                });
            }
        } else {
            alert("Selecciona al menos una tarea para completar su proceso.");
        }
    });



});

