<div class="row">
<?php $this->load->view('katalog/filter');?>
	<div class="col-md-10">
		<div class="row">
			<div class="col-md-8">
				<button class="btn btn-info btn-md btn-fill" data-toggle="modal" data-target="#mymodal"><i class="fa fa-plus"></i>Tambah Data</button>
				<button class="btn btn-success btn-md btn-fill" onclick="location.reload()"><i class="fa fa-refresh"></i>Segarkan Tabel <span class="badge"></span></button>
			</div>
			<div class="col-md-4 text-right">
				<a class="btn btn-success btn-fill" href="<?=site_url("export/katalog/excel5")?>"><i class="fa fa-file-excel-o"></i> Export to Excel</a>
				<a class="btn btn-danger btn-fill"  href="<?=site_url("export/katalog/pdf")?>"><i class="fa fa-file-pdf-o"></i> Export to PDF</a>
			</div>
		</div>
		<br><br>
		<div class="row">
			<?php foreach ($data as $key): ?>
			<div class="col-sm-6 col-md-4 col-lg-3">
				<div class="thumbnail" id="barang<?=$key->id?>" style="background-color: #fafafa">
					<div class="thumbnail-action" style="position:absolute; top:10px; right:25px">
						<a href="<?=site_url('katalog/edit/'.$key->id)?>" class="btn btn-primary btn-fill btn-xs" role="button"><i class="fa fa-pencil"></i></a>
						<button type="button" class="btn btn-danger btn-fill btn-xs btn-round" role="button" onclick="hapus(<?=$key->id?>, '<?=$key->gambar?>')"><i class="fa fa-trash"></i></button>
					</div>
					<img src="<?=base_url()?>assets/img-user/<?=cek_file($key->gambar)?>" alt="<?=$key->gambar?>">
					<div class="caption">
						<div class="row">
							<div class="col-md-8">
								<h4 style="margin-top:20px; margin-bottom: 3px"><a href="<?=site_url('katalog/detail/' . $key->id)?>" target='_blank'><?=$key->nama?></a></h4>
							</div>
							<div class="col-md-4">
								<div style="margin-top: 10px"><i class="label label-default"><?=$key->kategori?></i></div>
							</div>
						</div>
						<hr style="margin-top:15px;">
						<p>
							<table>
								<tr>
									<td>No</td>
									<td>&nbsp: <?=$key->id?></td>
								</tr>
								<tr>
									<td>Merk</td>
									<td>&nbsp: <a href="<?=site_url('katalog?merk=' . $key->merk)?>"><?=$key->merk?></a></td>
								</tr>
								<tr>
									<td>Tipe</td>
									<td>&nbsp: <?=$key->tipe?></td>
								</tr>
							</table>
						</p>
						<p style="margin-top: 20px;">
						<div class="row">
							<div class="col-md-3">
								<a href="<?=site_url('katalog/detail/' . $key->id)?>" target='_blank' class="btn btn-success btn-fill btn-xs" role="button">detail</a>
							</div>
							<div class="col-md-9 text-right">
								<h1 style="font-size:19pt; line-height:0; margin: 0; padding-top: 10px;">Rp.<?=$key->hargaSatuan?></h1>
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

<?php
function cek_file($filename) {
	if (!file_exists('./assets/img-user/' . $filename) || $filename == '') {
		$filename = 'default.png';
	}
	return $filename;
}

?>