$(document).ready(function () {
    $('#tareaFormulario').submit(function (e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            url: base_url + "tareaController/guardarTarea",
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    alert(response.message);
                    $('#agregarTarea').modal('hide');
                    console.log('recarga');
                    window.location.reload();
                } else {
                    alert('Error al guardar la tarea. Por favor, inténtalo de nuevo.');
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
                alert('Error al procesar la solicitud. Por favor, inténtalo de nuevo.');
            }
        });
    });

    $('#tablaTareas tbody tr').each(function () {
        var fechaFinStr = $(this).find('td:eq(5)').text();
        if (fechaFinStr !== "-") {
            var fechaFin = new Date(fechaFinStr);
            var today = new Date();
            var difference = fechaFin.getTime() - today.getTime();
            var daysDifference = Math.ceil(difference / (1000 * 3600 * 24));
            console.log(daysDifference);
            var threshold = 3;
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

