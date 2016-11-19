<nav class="navbar navbar-trans navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?=site_url()?>">
                <img alt="SIAGA" src="<?=base_url('assets/img/icon-sm.png')?>">
            </a>
        </div>
        <div class="collapse navbar-collapse" id="nav-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="<?=site_url('dashboard')?>">
                        <i class="fa fa-dashboard fa-fw"></i> Dashboard
                    </a>
                </li>
                <li class="dropdown">
                    <a href="<?=site_url('katalog')?>">
                        <i class="fa fa-archive fa-fw"></i> Katalog
                    </a>
                </li>
                <li>
                    <a href="<?=site_url('kategori?status=1')?>">
                        <i class="fa fa-tags fa-fw"></i> Kategori
                    </a>
                </li>
                <li>
                    <a href="<?=site_url('pengumuman')?>">
                        <i class="fa fa-bell fa-fw"></i> Pengumuman
                    </a>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-archive fa-fw"></i> Berkas
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="<?=site_url('regulasi')?>"><i class="fa fa-clipboard fa-fw"></i> Regulasi</a></li>
                        <li><a href="<?=site_url('berkas')?>"><i class="fa fa-clipboard fa-fw"></i> Berkas Unduh</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?=site_url('users')?>">
                        <i class="fa fa-users fa-fw"></i> Pengguna
                    </a>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-user fa-fw"></i> Akun
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="<?=site_url('profil/change_password')?>">Ganti Password</a></li>
                        <li><a href="<?=site_url('profil/edit')?>">Edit Akun</a></li>
                        <li><a href="<?=site_url('logout')?>">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>