<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <title><?=(isset($title))?$title:'SI DHSB Lumajang'; ?></title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>

    <!-- Load CSS -->
    <?php $this->load->view('template/css'); ?>

</head>
<body>

    <div class="wrapper">
        <?php $this->load->view('template/sidebar'); ?>

        <div class="main-panel">
            <?php $this->load->view('template/navbar'); ?>


            <div class="content">
                <div class="container-fluid">
                    <?php if(isset($content)) $this->load->view($content) ?>
                </div>
            </div>

            <!-- Load footer   -->
            <?php $this->load->view('template/footer'); ?>

        </div>
    </div>
    <div class="pengumuman">
        <?php foreach($pengumuman as $data): ?>
            <span>[ <?=date('d-m-Y', strtotime($data->createdAt))?> ]</span>
            <span <?=($data->penting != 0 || $data->penting != null)?"class='penting'":""?>><?=$data->isi?></span>
        <?php endforeach; ?>
    </div>


</body>

<!-- Load JS -->
<?php $this->load->view('template/js'); ?>

</html>
