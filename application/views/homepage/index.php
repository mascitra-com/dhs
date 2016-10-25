<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>DHS</title>
	<?php $this->load->view('homepage/css');?>
</head>
<body>
<?php $this->load->view('homepage/navbar');?>
<div class="container-fluid">
<?php if (isset($content)): $this->load->view('homepage/_'.$content); endif; ?>
</div>
<?php $this->load->view('homepage/javascript');?>
</body>
</html>