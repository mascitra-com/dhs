<div class="row" style="margin-top: 30px;">
	<div class="col-md-12">
		<h3>Regulasi &amp Dokumen</h3>
		<?php foreach($data as $key): ?>
		<div class="card">
			<div class="header">
				<h3 class="title"><?=$key->judul?></h3>
				<span class="category"><?=$key->dikeluarkan_oleh?> | <?=date('d-m-Y', strtotime($key->tgl_dikeluarkan))?></span>
			</div>
			<div class="content">
				<?=$key->isi?>
				<div class="footer">
					<hr>
					<div class="stats">
						<a href="<?=site_url('homepage/download_regulasi/'.$key->file)?>" class="btn btn-fill btn-primary btn-xs">unduh dokumen</a>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
	</div>
</div>