<div class="row">
<?php $this->load->view('v_katalog_filter'); ?>
	<div class="col-md-10">
		<button class="btn btn-info btn-md btn-fill" data-toggle="modal" data-target="#mymodal">Tambah Data</button>
		<br><br>
		<div class="row">
			<?php for($i = 0; $i<8; $i++){ ?>
			<div class="col-sm-6 col-md-4 col-lg-3">
				<div class="thumbnail">
					<img src="<?=base_url()?>assets/img/sidebar-1.jpg" alt="nama-barang">
					<div class="caption">
						<h4>Nama barang</h4>
						<p>
							<table>
								<tr>
									<td>No</td>
									<td>: 001</td>
								</tr>
								<tr>
									<td>Merk</td>
									<td>: Merek Barang</td>
								</tr>
								<tr>
									<td>Tipe</td>
									<td>: Tipe Barang</td>
								</tr>
								<tr>
									<td>Spesifikasi</td>
									<td>: spek barang</td>
								</tr>
								<tr>
									<td>Harga Satuan</td>
									<td>: Rp.xxxx</td>
								</tr>
								<tr>
									<td>Kategori</td>
									<td>: Kategori barang</td>
								</tr>
								<tr>
									<td></td>
									<td></td>
								</tr>
							</table>
						</p>
						<p>
							<a href="#" class="btn btn-primary btn-xs" role="button">Button</a>
							<a href="#" class="btn btn-default btn-xs" role="button">Button</a>
						</p>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</div>