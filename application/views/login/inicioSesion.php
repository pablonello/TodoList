<?php $this->load->view("template/headerLogin"); ?>
<style>
    body {
        background-image: url("<?php echo base_url(); ?>assets/img/fondo.jpg");
        background-size: cover;
        background-position: center;
    }

    .login-box {
        margin: auto;
        width: 400px;
        padding: 20px;
        background: rgba(255, 255, 255, 0.8);
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .login-box-msg {
        font-size: 24px;
        text-align: center;
        margin-bottom: 30px;
    }

    .form-control {
        border: 1px solid #ced4da;
        border-radius: 4px;
    }

    .input-group-text {
        background-color: #f8f9fa;
        border: 1px solid #ced4da;
        border-radius: 4px;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
</style>
<br><br><br><br><br><br><br>

<body>
    <div class="login-box">
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Iniciar Sesión</p>
                <?php if ($error = $this->session->flashdata('Login_fallido')) { ?>
                    <div class="row">
                        <div>
                            <div class="alert alert-dismissible alert-danger">
                                <?php echo $error ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <form action="<?php echo base_url(); ?>authController/validarUsuario" method="post">
                    <div class="input-group mb-3">
                        <input name="login_string" class="form-control" placeholder="Nombre de Usuario o Correo" type="text">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fa-solid fa-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input name="login_pass" class="form-control" placeholder="Contraseña" type="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fa-solid fa-lock"></i>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
    <?php if (isset($scripts)) echo $scripts; ?>
    <script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/adminlte.min.js'); ?>"></script>
</body>

</html>