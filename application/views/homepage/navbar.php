<nav class="navbar navbar-trans navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapsible">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?= site_url() ?>">
                <img alt="SIAGA" src="<?= base_url('assets/img/icon-sm.png') ?>">
            </a>
        </div>
        <div class="navbar-collapse collapse navbar-right" id="navbar-collapsible">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?= site_url() ?>">Home</a></li>
                <li><a href="<?= site_url('homepage/katalog') ?>">Katalog</a></li>
                <li><a href="<?= site_url('homepage/regulasi') ?>">Regulasi</a></li>
                <li><a href="<?= site_url('homepage/download') ?>">Download</a></li>
                <li><a href="<?= site_url('homepage/petunjuk') ?>">Petunjuk</a></li>
                <li><a href="<?= site_url('homepage/kontak') ?>">Hubungi Kami</a></li>

                <?php if ($this->ion_auth->logged_in()) { ?>
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            Akun
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <?php if ($this->ion_auth->is_admin()): ?>
                                <li><a href="<?= site_url('dashboard') ?>">Dashboard Admin</a></li>
                            <?php endif; ?>
                            <li><a href="<?= site_url('homepage/change_password') ?>">Ganti Password</a></li>
                            <li><a href="<?= site_url('homepage/edit') ?>">Edit Akun</a></li>
                            <li><a href="<?= site_url('logout') ?>">Logout</a></li>
                        </ul>
                    </li>
                <?php } else { ?>
                    <li><a href="<?= site_url('users/login') ?>">Login</a></li>
                <?php } ?>

                <li>&nbsp;</li>
            </ul>
        </div>
    </div>
</nav>