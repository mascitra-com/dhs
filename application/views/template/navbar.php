<nav class="navbar navbar-trans navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?=site_url()?>">
                <img alt="SIAGA" src="<?=base_url('assets/img/icon-sm.png')?>">
            </a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="<?=site_url('dashboard')?>">
                    <i class="fa fa-dashboard fa-fw"></i> Dashboard
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-archive fa-fw"></i> Katalog
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="<?=site_url('katalog')?>"><i class="fa fa-bars fa-fw"></i> Daftar Barang</a></li>
                        <li><a href="<?=site_url('')?>"><i class="fa fa-upload fa-fw"></i> Import Data</a></li>
                        <!-- <li><a href="#"><i class="fa fa-th fa-fw"></i> Batch</a></li> -->
                    </ul>
                </li>
                <li>
                    <a href="<?=site_url('kategori')?>">
                        <i class="fa fa-tags fa-fw"></i> Kategori
                    </a>
                </li>
                <li>
                    <a href="<?=site_url('pengumuman')?>">
                        <i class="fa fa-bell fa-fw"></i> Pengumuman
                    </a>
                </li>
                <li>
                    <a href="<?=site_url('regulasi')?>">
                        <i class="fa fa-user fa-fw"></i> Regulasi
                    </a>
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