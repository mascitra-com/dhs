<h3>DASHBOARD</h3>
<hr>

<!-- insight -->
<div class="row">
	<div class="col-md-3">
		<div class="card insight">
			<div class="content bg-info">
				<div class="row">
					<div class="col-md-7">
						<h5 class="title">Total Kategori</h5>
						<h3><?=number_format($jumlah['kategori'], 0, '', '.')?></h3>
					</div>
					<div class="col-md-5 flex"><i class="fa fa-tags fa-4x"></i></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card insight">
			<div class="content bg-success">
				<div class="row">
					<div class="col-md-7">
						<h5 class="title">Total Barang</h5>
						<h3><?=number_format($jumlah['barang'], 0, '', '.')?></h3>
					</div>
					<div class="col-md-5 flex"><i class="fa fa-archive fa-4x"></i></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card insight">
			<div class="content bg-warning">
				<div class="row">
					<div class="col-md-7">
						<h5 class="title">Total Pengguna</h5>
						<h3><?=$jumlah['pengguna']?></h3>
					</div>
					<div class="col-md-5 flex"><i class="fa fa-users fa-4x"></i></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card insight">
			<div class="content bg-danger">
				<div class="row">
					<div class="col-md-7">
						<h5 class="title">Total Barang 2016</h5>
						<h3><?=$jumlah['barangTahun']?></h3>
					</div>
					<div class="col-md-5 flex"><i class="fa fa-archive fa-4x"></i></div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Chart -->
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="header">
				<h4 class="title">Total Barang</h4>
				<span class="category">Banyak data dari tiap kategori induk</span>
			</div>
			<div class="content">
				<canvas id="chart1"></canvas>
			</div>
		</div>
	</div>
	<!-- <div class="col-md-6">
		<div class="card">
			<div class="header">
				<h4 class="title">Kategori Poluler</h4>
				<span class="category">Banyak barang dari kategori populer</span>
			</div>
			<div class="content">
				<canvas id="chart2"></canvas>
			</div>
		</div>
	</div> -->
</div>

<!-- newest item -->
<h4>Barang Terpopuler</h4>
<div class="row">
	<?php foreach ($populer as $key): ?>
	<div class="col-md-2">
		<a href="<?=site_url('katalog/detail/' . $key->id)?>">
			<div class="card hotlist">
				<div class="header"></div>
				<div class="content">
					<img src="<?=base_url('assets/img/img-barang/' . cek_file($key->gambar))?>" alt="">
					<div class="stats"><?=shorten($key->nama . ' ' . $key->merk . ' ' . $key->tipe)?></div>
				</div>
			</div>
		</a>
	</div>
	<?php endforeach;?>
</div>

<!-- newest list -->
<h4>Barang Terbaru</h4>
<div class="row">
	<?php foreach ($newest as $key): ?>
	<div class="col-md-2">
		<a href="<?=site_url('katalog/detail/' . $key->id)?>">
			<div class="card hotlist">
				<div class="header"></div>
				<div class="content">
					<img src="<?=base_url('assets/img/img-barang/' . cek_file($key->gambar))?>" alt="">
					<div class="stats"><?=shorten($key->nama . ' ' . $key->merk . ' ' . $key->tipe)?></div>
				</div>
			</div>
		</a>
	</div>
	<?php endforeach;?>
</div>

<script>
	var datajson1 = <?=$chart['first']?>;
</script>


<?php
function cek_file($filename) {
	if (!file_exists('./assets/img/img-barang/' . $filename) || $filename == '') {
		$filename = 'default.png';
	}
	return $filename;
}

function shorten($var) {
	if (strlen($var) > 20) {
		$var = substr($var, 0, 19) . '...';
	}
	return $var;
}

?>