<div class="row">
	<div class="col-md-9">
		<div class="card">
			<div class="header">
				<h3 class="title"><i class="fa fa-bell fa-fw"></i> Daftar Pengumuman</h3>
			</div>
			<div class="content table-responsive table-full-width">
				<table class="table table-striped">
					<tbody>
						<?php for($i=0;$i<3;$i++): ?>
							<tr>
								<td><button class="btn btn-fill btn-xs btn-st btn-info">aktif</button></td>
								<td>
									<h4>Judul Pengumuman</h4>
									<p>Lorem ipsum dolor sit amet, consectetur 
										adipisicing elit. Optio provident ducimus doloremque 
										ut laudantium voluptates quo libero sunt dolor soluta, voluptatum, 
										fuga dignissimos cum inventore?</p>
										<b class="badge">Berlaku sampai: 16-12-2016</b>
									</td>
									<td>
										<button class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></button>
										<button class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
									</td>
								</tr>
							<?php endfor; ?>
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
					<form>
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
							<input type="date" name="masaAktif" class="form-control" placeholder="Masa Aktif">
						</div>
						<div class="form-group">
							<label>Status</label>
							<select name="status" class="form-control">
								<option value="1" selected>aktif</option>
								<option value="0">non-aktif</option>
							</select>
						</div>
						<div class="form-group">
							<button class="btn btn-block btn-fill btn-success">simpan</button>
							<button class="btn btn-block btn-fill btn-warning" type="reset">batal</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>