<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>DHS</title>
	<?php $this->load->view('homepage/css');?>
	<link href="<?=base_url('assets/plugin/template/css/homepage.styles.css')?>" rel="stylesheet"/>
</head>
<body>
<?php $this->load->view('homepage/navbar');?>
<div class="container-fluid" style="margin-top: 4em">
<?php if (isset($content)): $this->load->view('homepage/_' . $content);endif;?>
</div>
<?php $datestring = '%Y %F %d'; ?>
<div class="pengumuman">
    <?php foreach ($info as $data): ?>
        <span>[ <?=mdate($datestring, strtotime($data->createdAt))?> ]</span>
        <span <?= ($data->penting != 0 || $data->penting != null) ? "class='penting'" : "" ?>><?= $data->isi ?></span>
    <?php endforeach; ?>
</div>

<?php $this->load->view('homepage/_footer');?>
<?php $this->load->view('homepage/javascript');?>
</body>
</html>