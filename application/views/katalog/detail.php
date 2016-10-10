<div class="row">
	<div class="col-md-3" style="padding-left: 20px;">
		<img src="<?=base_url()?>assets/img-user/<?=$detail->gambar?>" alt="Gambar Barang" class="img-thumbnail">
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
				<td><?=$detail->id_kategori?></td>
			</tr>
			<tr>
				<td>Harga Pokok</td>
				<td><?=$detail->hargaPokok?></td>
			</tr>
			<tr>
				<td>Harga Satuan</td>
				<td><?=$detail->hargaSatuan?></td>
			</tr>
			<tr>
				<td>Spesifikasi</td>
				<td><?=$detail->spesifikasi?></td>
			</tr>
		</table>
	</div>
</div>