<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SISAGA | LOGIN</title>
	<link rel="icon" type="image/png" href="<?=base_url('assets/img/favicon.png')?>">
	<meta content='width=device-width, initial-scale=0.9, maximum-scale=1.0, user-scalable=0' name='viewport'/>
</head>
<link href="<?=base_url('assets/plugin/template/css/light-bootstrap-dashboard.css')?>" rel="stylesheet"/>
<link href="<?=base_url('assets/plugin/bootstrap/css/bootstrap.min.css')?>" rel='stylesheet' type='text/css' />
<link href="<?=base_url('assets/plugin/login/css/style.css')?>" rel='stylesheet' type='text/css' />
<body>
	<div id="wrapper" class="container-fluid flex">
		<div class="row flex">
			<div class="col-md-12 flex">
				<div class="card">
					<div class="header">
						<h2 class="title">LOGIN<b class="text-warning">SISAGA</b></h2>
					</div>
					<div class="content">
						<?php if(isset($message)): ?>
                        <p class="alert alert-warning"><?=$message?></p>
                        <?php endif; ?>
						<form action="<?=site_url('users/login')?>" method="post">
							<div class="form-group">
								<input type="text" class="form-control input-lg" name="identity" placeholder="E-mail" required>
							</div>
							<div class="form-group">
								<input type="password" class="form-control input-lg" name="password" placeholder="Password" required>
							</div>
							<div class="form-group">
								<div class="btn-group btn-group-justified" role="group" aria-label="...">
									<div class="btn-group" role="group">
										<button type="submit" class="btn btn-lg btn-primary">MASUK</button>
									</div>
									<div class="btn-group" role="group">
										<button type="reset" class="btn btn-lg btn-warning">RESET</button>
									</div>
								</div>
							</div>
						</form>
						<div class="stats text-center">
							copyright &copy <a href="http://www.mascitra.com">MasCitra.com</a> <?=date('Y')?>, All rights reserved 
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>