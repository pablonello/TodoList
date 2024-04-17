<?php $this->load->view("template/headerLogin"); ?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="login-box">

    <div class="card">
        <div class="card-body login-card-body">

            <p class="login-box-msg">Iniciar Sesion</p>

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
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input name="login_pass" class="form-control" placeholder="Password" type="password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">

                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>


        </div>
        <!-- /.login-card-body -->
    </div>
</div>
