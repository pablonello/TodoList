<div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <a href="#" class="brand-link">
        </a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <img src="<?php echo base_url() ?>assets/img/logo_black.png" class="img-circle elevation-2" alt="User Image" style="width: 30px; height: 30px;">
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header"><?php echo $this->session->userdata('nombre') ?></span>
                    <div class="dropdown-divider"></div>
                    <a href="<?php echo base_url() . 'AuthController/cerrar_sesion' ?>" class="dropdown-item">
                        <i class="fas fa-sign-out-alt mr-2"></i> Cerrar Sesión
                    </a>
                </div>
            </li>
        </ul>
    </nav>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="#" class="brand-link">
            <span class="brand-text font-weight-light">ToDo List</span>
        </a>
        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="<?php echo base_url() ?>homeController" class="nav-link">
                            <i class="fa-solid fa-house-chimney"></i>
                            <p>
                                Home
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>usuarioController" class="nav-link">
                            <i class="fa-regular fa-user"></i>
                            <p>Usuarios</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>tareaController" class="nav-link">
                            <i class="fa-solid fa-list-check"></i>
                            <p>Tareas</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>