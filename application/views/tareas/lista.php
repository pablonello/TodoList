<div style="display: flex; justify-content: space-between; align-items: center; margin: 10px 0;">
    <a class="btn btn-primary" data-toggle="modal" data-target="#agregarTarea" href="#">
        <i class="fa-regular fa-floppy-disk"></i></i> Agregar Tarea
    </a>

    <div style="margin: 0 10px;"></div> <!-- Espacio entre botones -->

    <button class="btn btn-primary" id="eliminarSeleccionados">
        <i class="fa-solid fa-trash"></i>
        Eliminar tareas seleccionadas</button>
    <div style="margin: 0 10px;"></div> <!-- Espacio entre botones -->

    <button class="btn btn-primary" id="completarSeleccionados">
        <i class="fa-solid fa-check"></i>
        Completar tareas seleccionadas</button>
</div>


<?php if ($listTareas == NULL) {
    echo 'No hay tareas asignadas a este usuario';
} else {
?>

    <table id="tablaTareas" class="table table-striped">
        <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th><input type="checkbox" id="checkAll"></th>
                <th>Titulo</th>
                <th>Descripcion</th>
                <th>Fecha Inicio</th>
                <th>Fecha Finalizacion</th>
                <th>Estado</th>
                <th>Usuario</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($listTareas as $key => $tarea) : ?>
                <?php
                switch ($tarea->estado) {
                    case "pendiente":
                        $color = "red";
                        break;
                    case "desarrollo":
                        $color = "yellow";
                        break;
                    case "test":
                        $color = "orange";
                        break;
                    case "completada":
                        $color = "green";
                        break;
                    default:
                        $color = "inherit";
                        break;
                }
                ?>
                <tr>
                    <td><?php echo $tarea->id ?></td>
                    <td><input type="checkbox" class="checkbox" value="<?= $tarea->id ?>"></td>
                    <td><?php echo $tarea->titulo ?></td>
                    <td><?php echo $tarea->descripcion ?></td>
                    <td><?php echo $tarea->fechaCreacion ?></td>
                    <td><?php

                        $fechaFin = $tarea->fechaFin;

                        // Convertir la fecha a un objeto DateTime
                        $fechaFinDateTime = new DateTime($fechaFin);

                        // Comparar con "0000-00-00 00:00:00"
                        $fechaLimite = new DateTime("0000-00-00 00:00:00");

                        if ($fechaFinDateTime > $fechaLimite) {
                            // Si la fecha es mayor que "0000-00-00 00:00:00", mostrar la fecha con la hora
                            echo $fechaFin;
                        } else {
                            // Si no, mostrar un guión
                            echo "-";
                        }
                        ?></td>
                    <td style="color: <?= $color ?>;"><?= $tarea->estado ?></td>
                    <td><?php
                        $usuarioId = $tarea->usuarioId;
                        $this->load->model('Usuario');
                        $usuarioNombre = $this->Usuario->buscarPorId($usuarioId);
                        echo $usuarioNombre->usuarioNombre;
                        ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php } ?>

<div class="modal fade" id="agregarTarea" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Tarea</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="tareaFormulario">
                    <div class="form-group">
                        <?php
                        echo form_label('Titulo', 'titulo');
                        ?>
                        <?php
                        $text_input = array(
                            'name' => 'titulo',
                            'id' => 'titulo',
                            'value' => $titulo,
                            'class' => 'form-control input-lg',
                        );
                        echo form_input($text_input);
                        ?>
                        <?php
                        echo form_error('titulo', '<div class="text-error">', '</div>')
                        ?>
                    </div>
                    <div>
                        <?php
                        echo form_label('Descripcion', 'descripcion');
                        ?>
                        <?php
                        $text_input = array(
                            'name' => 'descripcion',
                            'id' => 'descripcion',
                            'value' => $descripcion,
                            'class' => 'form-control input-lg',
                        );
                        echo form_input($text_input);
                        ?>
                        <?php
                        echo form_error('descripcion', '<div class="text-error">', '</div>')
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        echo form_label('Fecha Terminacion', 'fechaFin');
                        ?>
                        <?php
                        $text_input = array(
                            'name' => 'fechaFin',
                            'id' => 'fechaFin',
                            'value' => $fechaFin,
                            'type' => 'datetime-local',
                            'class' => 'form-control input-lg',
                        );
                        echo form_input($text_input);
                        ?>
                        <?php
                        echo form_error('fechaFin', '<div class="text-error">', '</div>')
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        //armo el arreglo con las opciones de los tipos de usuario
                        $estado = array(
                            'pendiente' => 'pendiente',
                            'desarrollo' => 'Desarrollo',
                            'test' => 'test',
                            'finalizada' => 'finalizada'
                        );

                        //lista desplegable
                        echo form_label('Estado', 'estado');
                        echo form_dropdown('estado', $estado, 'pendiente', 'class="form-control input-lg"');
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        $this->load->model('Usuario');
                        $usuarios = $this->Usuario->obtenerUsuarios();

                        $usuarios_dropdown = array();
                        foreach ($usuarios as $usuario) {
                            $usuarios_dropdown[$usuario->id] = $usuario->usuarioNombre; // Suponiendo que el campo id y nombre son los apropiados
                        }

                        // Mostramos la etiqueta del formulario
                        echo form_label('Usuario', 'usuarioId');

                        // Mostramos el dropdown con todos los usuarios
                        echo form_dropdown('usuarioId', $usuarios_dropdown, '', 'class="form-control input-lg"');
                        ?>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"> Guardar </button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>


<script>
    // Pasar la URL base desde PHP a JavaScript
    const base_url = "<?php echo base_url(); ?>";
</script>