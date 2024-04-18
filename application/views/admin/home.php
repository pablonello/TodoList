<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 Full Example</title>
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/adminlte.min.css'); ?>">
</head>

<body class="hold-transition sidebar-mini">
    <?php $this->load->view("template/nav"); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        {title}
                        <br>
                        <div class="row">
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-aqua">
                                    <div class="inner">
                                        <h3><?php echo $cantidades->cantPendiente->totalPendiente ?></h3>

                                        <p>Pendientes</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-add"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-green">
                                    <div class="inner">
                                        <h3><?php echo $cantidades->cantTest->totalTest ?></h3>
                                        <p>Desarrollo</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-pie-graph"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-yellow">
                                    <div class="inner">
                                        <h3><?php echo $cantidades->cantDesarrollo->totalDesarrollo ?></h3>
                                        <p>Test</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-edit"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-red">
                                    <div class="inner">
                                        <h3><?php echo $cantidades->cantCompletada->totalCompletada ?></h3>
                                        <p>Completada</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-stalker"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Your content goes here -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php $this->load->view("template/footer"); ?>


    <!-- jQuery -->
    <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('assets/js/adminlte.min.js'); ?>"></script>
</body>

</html>