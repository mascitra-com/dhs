<!-- CSS -->
<!-- Bootstrap core CSS     -->
<link href="<?=base_url('assets/plugin/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet" />
<!-- Animation library for notifications   -->
<link href="<?=base_url('assets/plugin/template/css/animate.min.css')?>" rel="stylesheet"/>
<!-- jQuery UI -->
<link href="<?=base_url('assets/plugin/jquery-ui/jquery-ui.min.css')?>" rel="stylesheet"/>
<!--  Light Bootstrap Table core CSS    -->
<link href="<?=base_url('assets/plugin/template/css/light-bootstrap-dashboard.css')?>" rel="stylesheet"/>
<!--  Fonts and icons  -->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
<!--  Load font -->
<link href="<?=base_url('assets/plugin/fontawesome/css/font-awesome.min.css')?>" rel="stylesheet" />
<!--  Load custom CSS  -->
<?php if(isset($css) && $css != ''): ?>
	<link href="<?=base_url()?>assets/css/_<?=$css?>.css" rel="stylesheet" />
<?php endif ?>

<style type="text/css">
	.wrapper{padding-bottom: 15px;}
	.pengumuman{
		width: 100%;
		height: 27px;
		position: fixed;
		padding: 5px;
		bottom: 0px;
		z-index: 9999;
		background-color: rgba(1,1,1,0.7);
		border-top: 1px black solid;
		opacity: 0.7;
	}

	.pengumuman span{
		font-size: 11pt;
		margin-right:5px;
		color: #fff;
	}
	.pengumuman .penting{
		color: yellow;
	}
</style>

