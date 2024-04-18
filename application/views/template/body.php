<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Challenge ToDoList</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/adminlte.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/all.min.css'); ?>">
</head>

<body class="hold-transition sidebar-mini">
    <?php $this->load->view("template/nav"); ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> {title} </h1>
                        <br>
                        {body}
                    </div>
                </div>
        </section>
        <section class="content">
        </section>
    </div>
    <?php $this->load->view("template/footer"); ?>
    <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
    <?php if (isset($scripts)) echo $scripts; ?>
    <script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/adminlte.min.js'); ?>"></script>
</body>

</html>