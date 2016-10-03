<!doctype html>
<html lang="en">
<head>
    <?php $this->load->view('template/_header'); ?>
    <?php $this->load->view('template/_styles'); ?>
</head>
<body>

<div class="wrapper">

    <!-- LOAD SIDEBAR -->
    <?php $this->load->view('template/_sidebar'); ?>

    <div class="main-panel">
        <!-- LOAD NAVBAR -->
        <nav class="navbar navbar-default navbar-fixed">
            <?php $this->load->view('template/_navbar'); ?>
        </nav>
        <div class="content">
            <div class="container-fluid">
                <?php $this->load->view($content); ?>
            </div>
        </div>
    <?php $this->load->view('template/_footer'); ?>
    </div>
</div>
<!-- Load modal -->
<?php $this->load->view($modal); ?>

</body>
<?php $this->load->view('template/_javascript'); ?>
</html>