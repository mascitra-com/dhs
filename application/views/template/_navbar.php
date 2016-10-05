<div class="container-fluid" id="navbar">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"><?= $title ?></a>
    </div>
    <div class="collapse navbar-collapse">
        <!-- <ul class="nav navbar-nav navbar-left">

        </ul> -->

        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-globe"></i>
                    <b class="caret"></b>
                    <span class="notification">5</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="#">Notification 1</a></li>
                    <li><a href="#">Notification 2</a></li>
                    <li><a href="#">Notification 3</a></li>
                    <li><a href="#">Notification 4</a></li>
                    <li><a href="#">Another notification</a></li>
                </ul>
            </li>
            <li><a href="<?= site_url('users') ?>">Kelola Pengguna</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    Akun
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="<?= site_url('users/edit') ?>">Edit Profil</a></li>
                    <li><a href="<?= site_url('users/change_password') ?>">Ganti Password</a></li>

                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                </ul>
            </li>
            <li>
                <a href="<?= site_url('users/logout') ?>">Log out</a>
            </li>
        </ul>
    </div>
</div>