<div class='row' id="highlight">
    <div class="col-lg-5">
        <div id="desc">
            <h1><b>SiSAGA</b></h1>
            <p>
                Sistem Informasi Stadar Harga Barang
                Pemerintah Kabupaten Lumajang
            </p>
            <button class="btn btn-info btn-fill">Selengkapnya</button>
        </div>
    </div>
    <div class="col-lg-7">
        <div class="card">
            <div class="header">
                <h2 class="title">QUICK SEARCH</h2>
                <span class="category">Cari barang dengan cepat</span>
            </div>
            <div class="content">
                <div class="form-group">
                    <select class="form-control" name="">
                        <option value="">Semua Kategori</option>
                        <?php foreach ($kategori as $list): ?>
                            <option value="<?=$list->id?>"><?=$list->nama?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="KATA KUNCI">
                </div>
                <div class="form-group">
                    <button class="btn btn-warning btn-fill btn-block">CARI</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <?php
$row = ceil(count($daftar) / 3);
$countList = count($daftar);
$listNumber = 0;
?>
    <?php for ($i = 0; $i < 3; $i++): ?>
        <?php if ($listNumber == $countList) {
	goto end;
}
?>
        <div class="col-xs-6 col-md-4">
            <!-- Dropdown menu -->
            <div class="panel list-group">
                <?php for ($j = 0; $j < 2; $j++): ?>
                    <?php if ($listNumber < $countList) {?>
                        <?php $row = count($daftar[$listNumber]);?>

                        <!-- list & sublist -->
                        <?php if ($row > 3) {?>
                            <button class="list-group-item" data-toggle="collapse"
                                    data-target="#sm<?=$i . '' . $j?>"><?=$daftar[$listNumber][1]?> (<?=$daftar[$listNumber][2]?>)<i class="fa fa-caret-down pull-right"></i>
                            </button>
                        <?php } else {?>
                            <a class="list-group-item" href="<?=site_url('daftar?kategori=') . $daftar[$listNumber][0]?>"><?=$daftar[$listNumber][1]?> (<?=$daftar[$listNumber][2]?>)
                            </a>
                        <?php }?>
                        <div id="sm<?=$i . '' . $j?>" class="sublinks collapse">
                            <?php for ($k = 3; $k < $row; $k++): ?>
                                <a class="list-group-item small" href="<?=site_url('daftar?kategori=') . $daftar[$listNumber][$k++]?>">
                                    <span class="glyphicon glyphicon-circle-arrow-right"></span>&nbsp;
                                    <?=$daftar[$listNumber][$k];?> (<?=$daftar[$listNumber][++$k];?>)</a>
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
            <?php foreach ($kategori as $list): ?>
                <a href="<?=site_url('daftar?kategori=') . $list->id?>">
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