<nav class="navbar navbar-trans navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapsible">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img alt="SIAGA" src="<?= base_url('assets/img/icon-sm.png') ?>">
            </a>
        </div>
        <div class="navbar-collapse collapse navbar-right" id="navbar-collapsible">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="<?=site_url()?>">Home</a></li>
                <li><a href="#">Katalog</a></li>
                <li><a href="#">Regulasi</a></li>
                <li><a href="#">Download</a></li>
                <li><a href="#">Petunjuk</a></li>
                <li><a href="<?=site_url('kontak')?>">Hubungi Kami</a></li>
                <li><a href="<?= site_url('users/login') ?>">Login</a></li>
                <li>&nbsp;</li>
            </ul>
        </div>
    </div>
</nav>