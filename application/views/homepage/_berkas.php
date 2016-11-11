<div class="row" style="margin-top: 30px;">
	<div class="col-md-12">
		<h3>Download Berkas</h3>
		<?php foreach($data as $key): ?>
		<div class="card">
			<div class="header">
				<h3 class="title"><?=$key->judul?></h3>
				<span class="category">tanggal unggah : <?=date('d-m-Y', strtotime($key->createdAt))?></span>
			</div>
			<div class="content">
				<?=$key->keterangan?>
				<div class="footer">
					<hr>
					<div class="stats">
						<a href="<?=site_url('homepage/download_berkas/'.$key->nama_file)?>" class="btn btn-fill btn-primary btn-xs">unduh dokumen</a>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
	</div>
</div>