<!-- CSS -->
<!-- Bootstrap core CSS     -->
<link href="<?=base_url()?>/assets/plugin/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<!-- Animation library for notifications   -->
<link href="<?=base_url()?>/assets/plugin/template/css/animate.min.css" rel="stylesheet"/>
<!--  Light Bootstrap Table core CSS    -->
<link href="<?=base_url()?>/assets/plugin/template/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
<!--  Fonts and icons  -->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
<!--  Load font -->
<link href="<?=base_url()?>/assets/plugin/fontawesome/css/font-awesome.min.css" rel="stylesheet" />
<!--  Load custom CSS  -->
<?php if(isset($css) && $css != ''): ?>
<link href="<?=base_url()?>assets/css/_<?=$css?>.css" rel="stylesheet" />
<?php endif ?>

