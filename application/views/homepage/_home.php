<div class='row' id="highlight">
    <div class="col-lg-5">
        <div id="desc">
            <h1>
                <b>SISAGA</b><br>
                <small style="color: #fff">Kabupaten Lumajang</small>
            </h1>
            <p>
                Sistem Informasi Standar Harga Barang
                Pemerintah Kabupaten Lumajang
            </p>
            <a class="btn btn-info btn-fill" href="<?= site_url('homepage/kontak') ?>">Selengkapnya</a>
        </div>
    </div>
    <div class="col-lg-7">
        <form action="<?= site_url('homepage/katalog') ?>" method="get">
            <div class="card">
                <div class="header">
                    <h2 class="title">QUICK SEARCH</h2>
                    <span class="category">Cari barang dengan cepat</span>
                </div>
                <div class="content">
                    <div class="form-group">
                        <select id="listkategori" data-placeholder="Pilih Kategori..." class="form-control" name="kategori">
                            <option value="">Pilih Kategori...</option>
                            <?php foreach ($kategori as $kat): ?>
                                <option value="<?= $kat->kode_kategori ?>" <?=($kat->status=='0')?'disabled':''?>><?= $kat->nama ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="nama" class="form-control" placeholder="KATA KUNCI">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-warning btn-fill btn-block" type="submit">CARI</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
$parent = count($daftar);
$row = ceil($parent / 2);
$x = 0;
?>
<div class="row" id="kategori">
    <div class="container-fluid" id="hot-list">
        <div class="row card">
            <div class="header">
                <h4 class="title">Hot List</h4>
            </div>
            <div class="content">
                <?php for($i = 0; $i < $row; $i++){ ?>
                <div class="row">
                    <?php for($j = 0; $j < 2; $j++){ ?>
                    <div class="col-md-6">
                        <button class="list-group-item" data-toggle="collapse" data-target="#sx<?=$x?>">
                            <?=$hotlist[$x]->kode_kategori?>. <?=$hotlist[$x]->nama?><span class="caret"></span></button>
                        <div id="sx<?=$x?>" class="sublinks collapse">
                            <?= $daftar[$x++] ?>
                            <br>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="container-fluid" id="hot-list">
        <div class="row card">
            <div class="header">
                <h4 class="title">Hot List</h4>
            </div>
            <div class="content">
                <?php foreach ($hotlist as $list): ?>
                    <a href="<?= site_url('homepage/katalog?kategori=') . $list->kode_kategori ?>">
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="thumbnail">
                                <img src="<?= base_url('assets/img/kategori.gif') ?>" alt="...">
                                <div class="caption">
                                    <h3><?= $list->nama ?></h3>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>