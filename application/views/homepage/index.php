<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SISAGA | Sistem Informasi Standar Harga Barang Pemerintah Kab. Lumajang</title>
	<link rel="icon" type="image/png" href="<?=base_url('assets/img/favicon.png')?>">
	<?php $this->load->view('homepage/css');?>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
</head>
<body>
	<?php $this->load->view('homepage/navbar');?>
	<div class="container-fluid" id="content" style="margin-top: 5em">
		<?php if (isset($content)): $this->load->view('homepage/_' . $content);endif;?>
	</div>

	<?php $this->load->view('homepage/footer');?>

	<?php $datestring = '%Y %F %d';?>
	<div class="pengumuman">
		<?php foreach ($info as $data): ?>
			<span>[ <?=mdate($datestring, strtotime($data->createdAt))?> ]</span>
			<span <?=($data->penting != 0 || $data->penting != null) ? "class='penting'" : ""?>><?=$data->isi?></span>
		<?php endforeach;?>
	</div>

	<?php $this->load->view('homepage/javascript');?>
</body>
</html>