<div class="row">
	<form action="<?=site_url('katalog/update')?>" method="post">
	<div class="col-md-7">
		<div class="form-group">
			<label for="">ID BARANG</label>
			<input type="text" name="id" class="form-control" value="<?=$data->id?>" readonly>
		</div>
		<div class="form-group">
			<label for="">NAMA BARANG</label>
			<input type="text" name="nama" class="form-control" value="<?=$data->nama?>" required>
		</div>
		<div class="form-group">
			<label for="">MERK BARANG</label>
			<input type="text" name="merk" class="form-control" value="<?=$data->merk?>">
		</div>
		<div class="form-group">
			<label for="">TIPE BARANG</label>
			<input type="text" name="tipe" class="form-control" value="<?=$data->tipe?>">
		</div>
		<div class="form-group">
			<label for="">KATEGORI BARANG</label>
			<select name="id_kategori" class="form-control">
				<option value="0" selected>Pilih Kategori</option>
				<?php foreach($kategori as $key): ?>
					<option value="<?=$key->id?>" <?=($data->id_kategori == $key->id)?'selected':''?>><?=$key->nama?></option>
				<?php endforeach ?>
			</select>
		</div>
		<div class="form-group">
			<label for="">HARGA POKOK</label>
			<input type="number" min="0" name="hargaPokok" class="form-control" value="<?=$data->hargaPokok?>" required>
		</div>
		<div class="form-group">
			<label for="">TIPE BARANG</label>
			<input type="number" min="0" name="hargaSatuan" class="form-control" value="<?=$data->hargaSatuan?>">
		</div>
		<div class="form-group">
			<button class="btn btn-info" type="submit">Simpan</button>
			<button class="btn btn-warning" type="reset">Bersihkan</button>
		</div>
	</div>
	<div class="col-md-5">
		<div class="form-group">
			<input type="file" name="gambar">
		</div>
		<img src="<?=base_url()?>assets/img-user/<?=cek_file($data->gambar)?>" alt="Gambar Barang" class="img-fit" id="img-preview" width="300px" height="200px">
	</div>
	</form>
</div>

<?php
function cek_file($filename){
	if (! file_exists('./assets/img-user/'.$filename) || $filename == '') {
		$filename = 'default.png';
	}
	return $filename;
}
?>