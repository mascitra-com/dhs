<div class="row" id="homepage">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Detail Katalog</h4>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-3" style="padding-left: 20px;">
                        <img src="<?=base_url()?>assets/img/img-barang/<?=cek_file($detail->gambar)?>" alt="Gambar Barang"
                             class="img-thumbnail">
                    </div>
                    <div class="col-md-9" style="padding-right: 100px;">
                        <table class="table">
                            <tr>
                                <td>Nama</td>
                                <td><?=$detail->nama?></td>
                            </tr>
                            <tr>
                                <td>Merk</td>
                                <td><?=$detail->merk?></td>
                            </tr>
                            <tr>
                                <td>Tipe</td>
                                <td><?=$detail->tipe?></td>
                            </tr>
                            <tr>
                                <td>Kategori</td>
                                <td><?=$detail->kode_kategori . '-' . $detail->kategori?></td>
                            </tr>
                            <tr>
                                <td>Harga</td>
                                <td><?=$detail->hargashsb?></td>
                            </tr>
                            <tr>
                                <td>Penyedia</td>
                                <td><?=$detail->keterangan?></td>
                            </tr>
                            <tr>
                                <td>Spesifikasi</td>
                                <td><?=$detail->spesifikasi?></td>
                            </tr>
                        </table>
                    </div>
                    <a class="btn btn-primary btn-fill" style="margin-left: 2em; margin-bottom: 1em" href="<?=site_url('katalog/edit/' . $detail->id)?>">Edit</a>
                    <a class="btn btn-default btn-fill" style="margin-bottom: 1em" onclick="goBack()">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
function cek_file($filename) {
	if (!file_exists('./assets/img/img-barang/' . $filename) || $filename == '') {
		$filename = 'default.png';
	}
	return $filename;
}
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Barang Terkait</h4>
            </div>
            <div class="content">
                <div class="row">
                    <?php foreach ($terkait as $key): ?>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="thumbnail" id="barang<?=$key->id?>" style="background-color: #fafafa">
                                <img src="<?=base_url()?>assets/img/img-barang/<?=cek_file($key->gambar)?>" alt="<?=$key->gambar?>">
                                <div class="caption">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <h4 style="margin-top:20px; margin-bottom: 3px"><a href="<?=site_url('katalog/detail/' . $key->id)?>" target='_blank'><?=$key->nama?></a></h4>
                                            <div style="margin-top: 10px"><h5 class="label label-default"><?=$key->kategori?></h5></div>
                                        </div>
                                    </div>
                                    <hr style="margin-top:15px;">
                                    <p style="margin-top: 20px;">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <a href="<?=site_url('katalog/detail/' . $key->id)?>" target='_blank' class="btn btn-success btn-fill btn-xs" role="button">detail</a>
                                        </div>
                                        <div class="col-md-9 text-right">
                                            <h1 style="font-size:19pt; line-height:0; margin: 0; padding-top: 10px;"><?='Rp. ' . number_format($key->hargashsb, '0', '', '.') . ',-';?></h1>
                                        </div>
                                    </div>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Paling Sering Dilihat</h4>
            </div>
            <div class="content">
                <div class="row">
                    <?php foreach ($top as $key): ?>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="thumbnail" id="barang<?=$key->id?>" style="background-color: #fafafa">
                                <img src="<?=base_url()?>assets/img/img-barang/<?=cek_file($key->gambar)?>" alt="<?=$key->gambar?>">
                                <div class="caption">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <h4 style="margin-top:20px; margin-bottom: 3px"><a href="<?=site_url('katalog/detail/' . $key->id)?>" target='_blank'><?=$key->nama?></a></h4>
                                            <div style="margin-top: 10px"><h5 class="label label-default"><?=$key->kategori?></h5></div>
                                        </div>
                                    </div>
                                    <hr style="margin-top:15px;">
                                    <p style="margin-top: 20px;">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <a href="<?=site_url('katalog/detail/' . $key->id)?>" target='_blank' class="btn btn-success btn-fill btn-xs" role="button">detail</a>
                                        </div>
                                        <div class="col-md-9 text-right">
                                            <h1 style="font-size:19pt; line-height:0; margin: 0; padding-top: 10px;"><?='Rp. ' . number_format($key->hargashsb, '0', '', '.') . ',-';?></h1>
                                        </div>
                                    </div>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
</div>
