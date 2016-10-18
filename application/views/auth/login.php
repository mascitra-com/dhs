<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login | Daftar Harga Satuan</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/kustom.css">
</head>
<body style="background-color: #ecf0f1">
    <div class="container">
        <div class="row">
            <div class="col-md-12 form-login">
                <form action="<?=site_url('users/login')?>" method="post">
                    <div class="form-title">
                        <b>SISTEM INFORMASI</b>
                        <h2>DATA HARGA SATUAN BARANG</h2>
                        
                    </div>
                    <div class="form-group">
                        <label for="">EMAIL</label>
                        <input type="email" name="identity" placeholder="email" class="form-control input-lg" tabindex="1" required>
                    </div>
                    <div class="form-group">
                        <label for="">PASSWORD</label>
                        <input type="password" name="password" placeholder="password" class="form-control input-lg" tabindex="2" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info btn-fill btn-block btn-lg">LOGIN</button>
                    </div>
                </form>
                <p style="margin-top: 15px">copyright &copy <?php echo date('Y') ?> <a href="http://www.mascitra.com" target="_blank">MasCitra.com</a> . All rights reserved.</p>
            </div>
        </div>
    </div>
</body>
</html>