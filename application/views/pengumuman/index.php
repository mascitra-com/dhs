<div class="row">
	<div class="col-md-9">
		<div class="card">
			<div class="header">
				<h3 class="title"><i class="fa fa-bell fa-fw"></i> Daftar Pengumuman</h3>
			</div>
			<div class="content table-responsive table-full-width">
				<table class="table table-striped">
					<tbody>
						<?php foreach($pengumuman as $data): ?>
							<tr id="tr<?=$data->id?>">
								<td>
									<?php if($data->status != 0): ?>
									<button onclick="set_status(this, '<?=$data->id?>')" id="dt-status" class="btn btn-fill btn-xs btn-st btn-info">aktif</button>
									<?php else: ?>
									<button onclick="set_status(this, '<?=$data->id?>')" id="dt-status" class="btn btn-fill btn-xs btn-st btn-danger">non-aktif</button>
									<?php endif; ?>
								</td>
								<td>
									<h4 id="dt-judul"><?=$data->judul?></h4>
									<p id="dt-isi"><?=$data->isi?></p>
										<b class="badge">Berlaku sampai: <i id="dt-masaaktif"><?=($data->masa_aktif != null)?date('d-m-Y', strtotime($data->masa_aktif)):'-'?></i></b>
										<b class="badge badge-danger" id="dt-penting"><?=($data->penting != 0 || $data->penting != null)?'penting':''?></b>
									</td>
									<td>
										<button class="btn btn-xs btn-info" onclick="edit('<?=$data->id?>')"><i class="fa fa-pencil"></i></button>
										<button class="btn btn-xs btn-danger" onclick="hapus('<?=$data->id?>')"><i class="fa fa-trash"></i></button>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card">
				<div class="header">
					<h4 class="title">Form Pengumuman</h4>
					<hr>
				</div>
				<div class="content">
					<form action="<?=site_url('pengumuman/store')?>" method="post">
						<input type="hidden" name="id" value="">
						<div class="form-group">
							<label>Judul Pengumuman</label>
							<input type="text" name="judul" class="form-control" placeholder="judul pengumuman" required>
						</div>
						<div class="form-group">
							<label>Isi Pengumuman</label>
							<textarea name="isi" class="form-control" placeholder="Isi pengumuman" required></textarea>
						</div>
						<div class="form-group">
							<label>Masa Aktif</label>
							<input type="date" name="masa_aktif" class="form-control" placeholder="Masa Aktif">
						</div>
						<div class="form-group form-inline">
							<label>Status</label><br>
							<label class="radio">
	                            <input type="radio" name="status" value="1" data-toggle="radio" checked><span>Aktif</span>
	                        </label>&nbsp
	                        <label class="radio">
	                            <input type="radio" name="status" value="0" data-toggle="radio"><span>Non-Aktif</span>
	                        </label>
						</div>
						<div class="form-group">
							<label class="checkbox">
								<input type="checkbox" name="penting" data-toggle="checkbox"><span>Pengumuman Penting</span>
							</label>
							<span id="helpBlock" class="help-block">* Pengumuman penting akan diberi penekanan.</span>
						</div>
						<div class="form-group form-inline text-center">
							<button class="btn btn-fill btn-success" style="width:65%">simpan</button>
							<button class="btn btn-fill btn-warning" style="width:30%" type="reset"><i class="fa fa-refresh"></i></button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>