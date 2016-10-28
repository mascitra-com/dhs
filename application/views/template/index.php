<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <title>SIAGA | <?= (isset($title)) ? $title : 'SI DHSB Lumajang'; ?></title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>

    <!-- Load CSS -->
    <?php $this->load->view('template/css'); ?>
    <style type="text/css">
        html, body, #main {
            background-color: #f9f9f9
        }
        body {
            margin-top: 6em;
        }
    </style>

</head>
<body>

<?php $this->load->view('template/navbar'); ?>
<div class="container-fluid" id="main">
    <?php if (isset($content)) $this->load->view($content) ?>
</div>

<!-- Load footer   -->
<?php $this->load->view('template/footer'); ?>

<?php
$datestring = '%Y %F %d';
?>
<div class="pengumuman">
    <?php foreach ($info as $data): ?>
        <span>[ <?= mdate($datestring, strtotime($data->createdAt)) ?> ]</span>
        <span <?= ($data->penting != 0 || $data->penting != null) ? "class='penting'" : "" ?>><?= $data->isi ?></span>
    <?php endforeach; ?>
</div>


</body>

<!-- Load JS -->
<?php $this->load->view('template/js'); ?>

</html>
