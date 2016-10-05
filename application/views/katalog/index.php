<div class="row">
<?php $this->load->view('katalog/filter'); ?>
	<div class="col-md-10">
		<button class="btn btn-info btn-md btn-fill" data-toggle="modal" data-target="#mymodal">Tambah Data</button>
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
								<tr>
									<td>Tanggal Input</td>
									<td>&nbsp: <?=date('d M Y', strtotime($key->createdAt))?></td>
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