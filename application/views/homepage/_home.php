<div class='row' id="highlight-container">
    <div class="col-md-12" id="highlight">
        <h1>SISAGA LUMAJANG</h1>
        <h4>Sistem informasi daftar harga satuan barang Kabupaten Lumajang</h4>
        <form action="<?= site_url('homepage/katalog') ?>" method="get">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Kata Kunci">
                <span class="input-group-btn"></span>
                <select class="form-control" name="kategori">
                    <option value="">Pilih Kategori...</option>
                    <?php foreach ($kategori as $kat): ?>
                        <option
                            value="<?= $kat->kode_kategori ?>" <?= ($kat->status == '0') ? 'disabled' : '' ?>><?= $kat->nama ?></option>
                    <?php endforeach; ?>
                </select>
                <span class="input-group-btn"></span>
                <span class="input-group-btn">
                    <button class="btn btn-primary btn-fill" type="button"><i class="fa fa-search"></i> cari</button>
                </span>
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
                <?php for ($i = 0; $i < $row; $i++) { ?>
                    <div class="row">
                        <?php for ($j = 0; $j < 2; $j++) { ?>
                            <?php if ($x == $parent) {
                                break;
                            } ?>
                            <div class="col-md-6">
                                <button class="list-group-item" data-toggle="collapse" data-target="#sx<?= $x ?>">
                                    <?= $hotlist[$x]->kode_kategori ?>. <?= $hotlist[$x]->nama ?><span
                                        class="caret"></span></button>
                                <div id="sx<?= $x ?>" class="sublinks collapse">
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
                        <div class="col-sm-6 col-md-4 col-lg-2">
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