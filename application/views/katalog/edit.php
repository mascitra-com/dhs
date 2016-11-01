<div class="row">
	<form id="form-katalog" method="post" action="<?=site_url('katalog/store')?>">
		<div class="col-md-8">
			<div class="card">
				<div class="content">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="">Kategori</label>
								<input type="text" class="form-control" name="id_kategori" placeholder="kategori" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="">Nama Barang</label>
								<input type="text" class="form-control" name="nama" placeholder="nama barang" required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="">Merk Barang</label>
								<input type="text" class="form-control" name="merk" placeholder="merk barang">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="">Tipe Barang</label>
								<input type="text" class="form-control" name="tipe" placeholder="tipe barang">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Ukuran</label>
								<input type="text" class="form-control" name="ukuran" placeholder="ukuran barang">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Satuan</label>
								<input type="text" class="form-control" name="satuan" placeholder="satuan barang">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-2">
							<div class="form-group">
								<label for="">Harga Pasar</label>
								<input type="number" class="form-control" name="hargaPasar" placeholder="harga pasar" required>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="">Biaya Kirim</label>
								<input type="number" class="form-control" name="biayaKirim" placeholder="biaya kirim" required>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="">Resistensi</label>
								<input type="number" class="form-control" name="resitensi" placeholder="resistensi" required>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="">PPN</label>
								<input type="number" class="form-control" name="ppn" placeholder="ppn" required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="">Harga SHSB</label>
								<input type="number" class="form-control" name="hargashsb" placeholder="harga shsb" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="">Spesifikasi</label>
								<textarea name="spesifikasi" id="" class="form-control"></textarea>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card">
				<div class="content">
					<div class="form-group">
						<label for="">Gambar</label>
						<input type="file" name="gambar" placeholder="Upload Gambar">
						<img id="img-preview" src="<?=base_url('assets/img/img-barang/'.cek_file(''))?>" alt="gambar" style="width:300px;height:300px">
					</div>
					<div class="form-group">
						<button class="btn btn-fill btn-primary" type="submit">Simpan</button>
						<button class="btn btn-fill btn-warning" type="reset">Reset</button>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="header">
				<h3 class="title">Import</h3>
			</div>
			<div class="content">
				
			</div>
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