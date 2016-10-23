<?php
$menu = $this->uri->segment(1, 1);

$dashboard_active = "";
$katalog_active = "";
$kategori_active = "";
$pengumuman_active = "";
$regulasi_active = "";
$pengguna_active = "";
$akun_active = "";
switch ($menu) {
    case 'dashboard':
        $dashboard_active = "active";
        break;
    case 'katalog':
        $katalog_active = "active";
        break;
    case 'kategori':
        $kategori_active = "active";
        break;
    case 'pengumuman':
        $pengumuman_active = "active";
        break;
    case 'regulasi':
        $regulasi_active = "active";
        break;
    case 'users':
        $pengguna_active = "active";
        break;
    case 'profil':
        $akun_active = "active";
        break;

}

?>
<div class="sidebar" data-color="orange" data-image="">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="<?= site_url() ?>" class="simple-text">
                DAFTAR HARGA SATUAN BARANG
            </a>
        </div>

        <ul class="nav">
            <li class="<?= $dashboard_active ?>">
                <a href="#">
                    <i class="fa fa-dashboard"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="<?= $katalog_active ?>">
                <a href="<?= site_url('katalog') ?>">
                    <i class="fa fa-archive"></i>
                    <p>Katalog</p>
                </a>
            </li>
            <li class="<?= $kategori_active ?>">
                <a href="<?= site_url('kategori') ?>">
                    <i class="fa fa-tags"></i>
                    <p>Kategori</p>
                </a>
            </li>
            <li class="<?= $pengumuman_active ?>">
                <a href="<?= site_url('pengumuman') ?>">
                    <i class="fa fa-bell"></i>
                    <p>Pengumuman</p>
                </a>
            </li>
            <li class="<?= $regulasi_active ?>">
                <a href="<?= site_url('regulasi') ?>">
                    <i class="fa fa-institution"></i>
                    <p>Regulasi</p>
                </a>
            </li>
            <li class="<?= $pengguna_active ?>">
                <a href="<?= site_url('users') ?>">
                    <i class="fa fa-users"></i>
                    <p>Pengguna</p>
                </a>
            </li>
            <li class="<?= $akun_active ?>">
                <a href="<?= site_url('profil') ?>">
                    <i class="fa fa-lock"></i>
                    <p>Akun</p>
                </a>
            </li>
            <li>
                <a href="<?= site_url('users/logout') ?>">
                    <i class="fa fa-power-off"></i>
                    <p>Logout</p>
                </a>
            </li>
        </ul>
    </div>
</div>