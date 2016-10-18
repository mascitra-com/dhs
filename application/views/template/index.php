<!doctype html>
<html lang="en">
<head>
    <?php $this->load->view('template/header'); ?>
    <?php $this->load->view('template/styles'); ?>
</head>
<body>

<div class="wrapper">
    <?php $this->load->view('template/sidebar'); ?>

    <div class="main-panel">
        <?php $this->load->view('template/navbar'); ?>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias commodi consequuntur deserunt dolorem doloremque dolores doloribus dolorum et, excepturi, illo ipsum maxime minus necessitatibus omnis porro qui reprehenderit, sed voluptas.</p>
                    </div>
                </div>
            </div>
        </div>


        <?php $this->load->view('template/footer'); ?>

    </div>
</div>


</body>

<?php $this->load->view('template/js'); ?>


</html>
