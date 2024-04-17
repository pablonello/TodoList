<table class="table table-condensed">
    <tbody>
        <tr>
            <th style="width: 10px">#</th>
            <th>Usario</th>
            <th>Passrowd</th>
            <th>acciones</th>
        </tr>
        <?php foreach ($listUsuarios as $key => $p) : ?>
            <tr>
                <td><?php echo $p->id ?></td>
                <td><?php echo $p->usuarioNombre ?></td>
                <td><?php echo $p->usuarioPassword ?></td>

                <td>
                    <a class="btn btn-sm btn-primary" 
                       href="<?php echo base_url() . 'Usuarios/user_crud/add' . $p->id ?>">
                        <i class="fa fa-pencil"></i> Editar
                    </a>

                    <a class="btn btn-sm btn-danger" 
                       data-toggle="modal" 
                       data-target="#deleteUsuario"
                       href="#"
                       data-proveedorid="<?php echo $p->id ?>">
                        <i class="fa fa-remove"></i> Eliminar
                    </a>
                </td>

            </tr>
        <?php endforeach; ?>

    </tbody>
</table>