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
            <a class="btn btn-info btn-fill" href="<?=site_url('homepage/kontak')?>">Selengkapnya</a>
        </div>
    </div>
    <div class="col-lg-7">
        <form action="<?=site_url('homepage/katalog')?>" method="get">
            <div class="card">
                <div class="header">
                    <h2 class="title">QUICK SEARCH</h2>
                    <span class="category">Cari barang dengan cepat</span>
                </div>
                <div class="content">
                    <div class="form-group">
                    <input type="text" class="form-control" name="kategori" placeholder="Nama Kategori" list="formkategori"
                    list="formkategori">
                        <datalist id="formkategori">
                                    <?php foreach ($kategori as $kat): ?>
                                    <option value="<?=$kat->kode_kategori?>"><?=$kat->nama?></option>
                                    <?php endforeach;?>
                                    </datalist>
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
$row = ceil(count($daftar) / 3);
$countList = count($daftar);
$listNumber = 0;
?>
<div class="row">
    <?php for ($i = 0; $i < 3; $i++): ?>
        <?php if ($listNumber == $countList) {
	goto end;
}
?>
        <div class="col-xs-6 col-md-4">
            <!-- Dropdown menu -->
            <div class="panel list-group">
                <?php for ($j = 0; $j < $row; $j++): ?>
                    <?php if ($listNumber < $countList) {?>
                        <?php $total = count($daftar[$listNumber]);?>

                        <!-- list & sublist -->
                        <?php if ($total > 3) {?>
                            <button class="list-group-item" data-toggle="collapse"
                                    data-target="#sm<?=$i . '' . $j?>"><?=$daftar[$listNumber][0];?>. <?=$daftar[$listNumber][1]?>
                                <i class="fa fa-caret-down pull-right"></i>
                            </button>
                        <?php } else {?>
                            <a class="list-group-item"
                               href="<?=site_url('daftar?kategori=') . $daftar[$listNumber][0]?>"><?=$daftar[$listNumber][1]?>

                            </a>
                        <?php }?>
                        <div id="sm<?=$i . '' . $j?>" class="sublinks collapse">
                            <?php for ($k = 3; $k < $total; $k++): ?>
                                <a class="list-group-item small" style="background-color: #eaeaea;"
                                   href="<?=site_url('homepage/katalog?kategori=') . $daftar[$listNumber][$k]?>">
                                    <span class="glyphicon glyphicon-circle-arrow-right"></span>&nbsp;
                                    <?=$daftar[$listNumber][$k++];?>. <?=$daftar[$listNumber][$k++];?></a>
                            <?php endfor;?>
                        </div>
                        <!-- batas list & sublist -->
                        <?php $listNumber++;?>
                    <?php }?>
                <?php endfor;?>
            </div>
            <!-- Batas Dropdown menu -->
        </div>
    <?php endfor;
end: ?>
</div>

<div class="container-fluid" id="hot-list">
    <div class="row card">
        <div class="header">
            <h4 class="title">Hot List</h4>
        </div>
        <div class="content">
            <?php $i = 1;?>
            <?php foreach ($hotlist as $list): ?>
                <a href="<?=site_url('homepage/katalog?kategori=') . $list->kode_kategori?>">
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="thumbnail">
                            <img src="<?=base_url('assets/img/kategori.gif')?>" alt="...">
                            <div class="caption">
                                <h3><?=$list->nama?></h3>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endforeach;?>
        </div>
    </div>
</div>