<?php
if ($this->session->flashdata('mensaje')) { ?>
    <script>
        alert("<?php echo $this->session->flashdata('mensaje'); ?>");
    </script>
<?php } ?>

<div style="display: flex; justify-content: space-between; align-items: center; margin: 10px 0;">
    <a class="btn btn-primary" data-toggle="modal" data-target="#agregarUsuario" href="#">
        <i class="fa-regular fa-floppy-disk"></i></i> Agregar Usuario
    </a>

</div>

<?php if ($listUsuarios == NULL) {
    echo 'No hay usuarios cargados';
} else {
?>
    <table id="tablaUsuarios" class="table table-striped">
        <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th>Usario</th>
                <th>Passrowd</th>
                <th>acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listUsuarios as $key => $usuario) : ?>
                <tr>
                    <td><?php echo $usuario->id ?></td>
                    <td><?php echo $usuario->usuarioNombre ?></td>
                    <td><?php echo $usuario->usuarioPassword ?></td>

                    <td>
                        <div class="btn-group" style="display: flex;">
                            <a class="btn btn-sm btn-danger" href="<?php echo base_url() . 'usuarioController/eliminarUsuario/' . $usuario->id ?>">
                                <i class="fa fa-remove"></i>
                            </a>
                        </div>
                    </td>

                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>

<?php } ?>


<div class="modal fade" id="agregarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="tareaFormulario">
                    <div class="form-group">
                        <?php
                        echo form_label('Nombre Usuario', 'usuarioNombre');
                        ?>
                        <?php
                        $text_input = array(
                            'name' => 'usuarioNombre',
                            'id' => 'usuarioNombre',
                            'value' => $usuarioNombre,
                            'class' => 'form-control input-lg',
                        );
                        echo form_input($text_input);
                        ?>
                        <?php
                        echo form_error('usuarioNombre', '<div class="text-error">', '</div>')
                        ?>
                    </div>
                    <div>
                        <?php
                        echo form_label('Password', 'usuarioPassword');
                        ?>
                        <?php
                        $text_input = array(
                            'name' => 'usuarioPassword',
                            'id' => 'usuarioPassword',
                            'value' => $usuarioPassword,
                            'type' => 'password',
                            'class' => 'form-control input-lg',
                        );
                        echo form_input($text_input);
                        ?>
                        <?php
                        echo form_error('usuarioPassword', '<div class="text-error">', '</div>')
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        echo form_label('Email', 'email');
                        ?>
                        <?php
                        $text_input = array(
                            'name' => 'email',
                            'id' => 'email',
                            'value' => $email,
                            'type' => 'test',
                            'class' => 'form-control input-lg',
                        );
                        echo form_input($text_input);
                        ?>
                        <?php
                        echo form_error('email', '<div class="text-error">', '</div>')
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