<div class="row">
	<div class="col-md-8">
		<div class="card">
			<div class="header">
				<h3 class="title">Daftar Berkas</h3>
				<span class="categori">Daftar berkas unduhan</span>
				<div class="content table-full-width table-responsive">
					<table class="table table-stripped">
						<thead>
							<tr>
								<td>Status</td>
								<td>Judul</td>
								<td>Keterangan</td>
								<td>Nama Berkas</td>
								<td>Tanggal Unggah</td>
								<td>aksi</td>
							</tr>
						</thead>
						<tbody>
							<?php foreach($data as $key): ?>
								<tr id="baris<?=$key->nomor?>">
									<td>
										<a href="<?=site_url('berkas/status/'.$key->nomor.'/'.$key->status)?>" class="btn btn-xs btn-fill <?=($key->status==1)?'btn-success':'btn-danger'?> "><i class="fa fa-circle"></i></a>
									</td>
									<td id="judul"><?=$key->judul?></td>
									<td id="keterangan"><?=$key->keterangan?></td>
									<td id="file"><a class="btn btn-xs btn-primary" href="<?=site_url('berkas/download/'.$key->nama_file)?>"><i class="fa fa-fw fa-download"></i> <span><?=$key->nama_file?></span></a></td>
									<td><?=date('d-m-Y', strtotime($key->createdAt))?></td>
									<td>
										<button type="button" class="btn btn-xs btn-primary" onclick="edit(<?=$key->nomor?>)"><i class="fa fa-pencil"></i></button>
										<a class="btn btn-xs btn-danger" href="<?=site_url('berkas/delete/'.$key->nomor)?>" onclick="return confirm('Apakah anda yakin?')"><i class="fa fa-trash"></i></a>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card">
			<div class="header">
				<h4 class="title">Form Berkas</h4>
			</div>
			<div class="content">
				<form action="<?=site_url('berkas/store')?>" method="post" enctype="multipart/form-data">
				<input type="hidden" name="nomor" value="">
					<div class="form-group">
						<label for="">Judul *</label>
						<input type="text" name="judul" class="form-control" placeholder="judul" required="">
					</div>
					<div class="form-group">
						<label for="">keterangan</label>
						<textarea name="keterangan" class="form-control" placeholder="keterangan"></textarea>
					</div>
					<div class="form-group">
						<label for="">pilih berkas *</label>
						<input type="file" name="berkas" required="">
					</div>
					<div class="form-group">
						<div class="btn-group btn-group-justified" role="group" aria-label="...">
							<div class="btn-group" role="group">
								<button type="submit" class="btn btn-block btn-fill btn-success">Simpan</button>
							</div>
							<div class="btn-group" role="group">
								<button class="btn btn-block btn-fill btn-warning" type="reset">Batal</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>