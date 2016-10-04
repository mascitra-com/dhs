<!doctype html>
<html lang="en">
<head>
    <?php $this->load->view('template/_header'); ?>
    <?php $this->load->view('template/_styles'); ?>
</head>
<body>

<div class="wrapper">
    <!-- LOAD NAVBAR -->
    <nav class="navbar navbar-default navbar-fixed">
        <?php $this->load->view('template/_navbar'); ?>
    </nav>
    <div class="container-fluid">
        <?php $this->load->view($content); ?>
    </div>
</div>
<?php $this->load->view('template/_footer'); ?>
<!-- Load modal -->
<?php if(isset($modal)){$this->load->view($modal);} ?>

</body>
<?php $this->load->view('template/_javascript'); ?>
</html>