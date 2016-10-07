<div class="row">
<?php $this->load->view('katalog/filter'); ?>
	<div class="col-md-10">
		<button class="btn btn-info btn-md btn-fill" data-toggle="modal" data-target="#mymodal"><i class="fa fa-plus"></i>Tambah Data</button>
		<a href="<?=site_url('katalog')?>"><button class="btn btn-success btn-md btn-fill"><i class="fa fa-refresh"></i>Segarkan Tabel</button></a>
		<br><br>
		<div class="row">
			<?php foreach($data as $key): ?>
			<div class="col-sm-6 col-md-4 col-lg-3">
				<div class="thumbnail">
					<img src="<?=base_url()?>assets/img-user/<?=$key->gambar?>" alt="<?=$key->nama?>">
					<div class="caption">
						<h4><?=$key->nama?></h4>
						<p>
							<table>
								<tr>
									<td>No</td>
									<td>&nbsp: <?=$key->id?></td>
								</tr>
								<tr>
									<td>Merk</td>
									<td>&nbsp: <?=$key->merk?></td>
								</tr>
								<tr>
									<td>Tipe</td>
									<td>&nbsp: <?=$key->tipe?></td>
								</tr>
								<tr>
									<td>Spesifikasi</td>
									<td>&nbsp: <?=$key->spesifikasi?></td>
								</tr>
								<tr>
									<td>Harga Satuan</td>
									<td>&nbsp: <?=$key->hargaSatuan?></td>
								</tr>
								<tr>
									<td>Kategori</td>
									<td>&nbsp: <?=$key->kategori?></td>
								</tr>
							</table>
						</p>
						<p>
							<a href="#" class="btn btn-primary btn-xs" role="button">edit</a>
							<a href="#" class="btn btn-danger btn-xs" role="button">hapus</a>
						</p>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>