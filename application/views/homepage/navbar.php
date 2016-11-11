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
                <img alt="SIAGA" src="<?=base_url('assets/img/icon-sm.png')?>">
            </a>
        </div>
        <div class="navbar-collapse collapse navbar-right" id="navbar-collapsible">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="<?=site_url()?>">Home</a></li>

                <?php if($this->ion_auth->logged_in()){ ?>
                     <li><a href="<?=site_url('katalog')?>">Katalog</a></li>
                <?php }else{ ?>
                     <li><a href="<?=site_url('homepage/katalog')?>">Katalog</a></li>
                <?php } ?>

               
                <li><a href="<?=site_url('homepage/regulasi')?>">Regulasi</a></li>
                <li><a href="#">Download</a></li>
                <li><a href="#">Petunjuk</a></li>
                <li><a href="<?=site_url('homepage/kontak')?>">Hubungi Kami</a></li>
                
                <?php if($this->ion_auth->logged_in()){ ?>
                    <li><a href="<?=site_url('users/logout')?>">Logout</a></li>
                <?php }else{ ?>
                    <li><a href="<?=site_url('users/login')?>">Login</a></li>
                <?php } ?>

                <li>&nbsp;</li>
            </ul>
        </div>
    </div>
</nav>