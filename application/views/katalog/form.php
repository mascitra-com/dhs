<div class="row">
	<form id="form-katalog" method="post" action="<?=site_url((isset($data)) ? 'katalog/update' : 'katalog/store')?>">
		<input type="hidden" name="id" value="<?=(isset($data)) ? $data->id : ''?>">
		<div class="col-md-8">
			<div class="card">
				<div class="content">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="">Kategori</label>
								<input type="text" class="form-control" name="kode_kategori" placeholder="kategori" value="<?=(isset($data)) ? $data->kode_kategori : ''?>" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="">Nama Barang</label>
								<input type="text" class="form-control" name="nama" placeholder="nama barang" value="<?=(isset($data)) ? $data->nama : ''?>" required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="">Merk Barang</label>
								<input type="text" class="form-control" name="merk" placeholder="merk barang" value="<?=(isset($data)) ? $data->merk : ''?>">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="">Tipe Barang</label>
								<input type="text" class="form-control" name="tipe" placeholder="tipe barang" value="<?=(isset($data)) ? $data->tipe : ''?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Ukuran</label>
								<input type="text" class="form-control" name="ukuran" placeholder="ukuran barang" value="<?=(isset($data)) ? $data->ukuran : ''?>">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Satuan</label>
								<input type="text" class="form-control" name="satuan" placeholder="satuan barang" value="<?=(isset($data)) ? $data->satuan : ''?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-2">
							<div class="form-group">
								<label for="">Harga Pasar</label>
								<input type="number" class="form-control" name="hargaPasar" placeholder="harga pasar" value="<?=(isset($data)) ? $data->hargaPasar : '0'?>" required>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="">Biaya Kirim</label>
								<input type="number" class="form-control" name="biayaKirim" placeholder="biaya kirim" value="<?=(isset($data)) ? $data->biayaKirim : '0'?>" required>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="">Resistensi</label>
								<input type="number" class="form-control" name="resistensi" placeholder="resistensi" value="<?=(isset($data)) ? $data->resistensi : '0'?>" required>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="">PPN 10%</label>
								<input type="number" class="form-control" name="ppn" placeholder="ppn" value="<?=(isset($data)) ? $data->ppn : '0'?>" required readonly>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="">Harga SHSB</label>
								<input type="number" class="form-control" name="hargashsb" placeholder="harga shsb" value="<?=(isset($data)) ? $data->hargashsb : '0'?>" required readonly>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="">Spesifikasi</label>
								<textarea name="spesifikasi" id="" class="form-control" placeholder="Spesifikasi"><?=(isset($data)) ? $data->spesifikasi : ''?></textarea>
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
						<img id="img-preview" src="<?=base_url('assets/img/img-barang/' . cek_file((isset($data)) ? $data->gambar : ''))?>" alt="gambar" style="width:300px;height:300px">
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
	<div class="col-md-6">
		<div class="card">
			<div class="header">
				<h4 class="title">Import Data Katalog</h4>
				<p>Mohon gunakan template yang sudah disediakan!</p>
			</div>
			<div class="content">
				<a href="<?=base_url('assets/file/import.xls')?>" class="btn btn-primary">Download Template</a>
				<br/> <br/>
				<form action="<?php echo site_url('katalog/upload'); ?>" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-12">
							<label class="control-label">Pilih File</label>
							<div class="input-group">
								<label class="input-group-btn">
									<span class="btn btn-primary">
										Browse&hellip; <input id="file" name="file" type="file" class="file-loading"
										accept="application/vnd.ms-excel" style="display: none">
									</span>
								</label>
								<input type="text" class="form-control" readonly>
							</div>
							<br/>
							<input class="btn btn-primary" type="submit" value="Upload file"/>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="card">
			<div class="header">
				<h3 class="title">PENTING!</h3>
				<span class="category">Panduan upload file</span>
			</div>
			<div class="content">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas quaerat veritatis similique, excepturi, molestias optio dolorem necessitatibus rerum quas atque ipsum neque blanditiis modi quo aliquid quae. Reprehenderit, unde. Ullam, natus non, voluptatum vitae saepe dolorum asperiores quibusdam velit voluptatem quidem rem, consequuntur illo aut, quod possimus suscipit laboriosam distinctio tempore animi nesciunt numquam. Neque recusandae voluptatem voluptate iusto dolor!</p>
				<?=$autocomplete['nama']?>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	ac_nama 	= <?=$autocomplete['nama']?>;
	ac_merk 	= <?=$autocomplete['merk']?>;
	ac_tipe 	= <?=$autocomplete['tipe']?>;
	ac_kategori = <?=$autocomplete['kategori']?>;
</script>

<?php
function cek_file($filename) {
	if (!file_exists('./assets/img/img-barang/' . $filename) || $filename == '') {
		$filename = 'default.png';
	}
	return $filename;
}
?>