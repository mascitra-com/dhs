<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="content">
				<marquee>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, ex, velit. Porro id ipsa quasi voluptate! Error recusandae porro explicabo!</marquee>
			</div>
		</div>
		<div class="card">
			<div class="header">
				<div class="row">
					<div class="col-md-9">
						<!-- Dropdown Kategori -->
						<div class="dropdown">
							<!-- judul kategori -->
							<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
								<i class="fa fa-navicon"></i> Kategori Barang
								<span class="caret"></span>
							</button>
							<!-- list dropdown -->
							<ul class="dropdown-menu">
								<li><a tabindex="-1" href="#">Kategori A</a></li>
								<li><a tabindex="-1" href="#">Kategori B</a></li>
								<!-- sub-list -->
								<li class="dropdown-submenu">
									<!-- judul sub-list -->
									<a class="test" tabindex="-1" href="#">Kategori C <span class="caret"></span></a>
									<ul class="dropdown-menu">
										<!-- list dropdown sublist -->
										<li><a tabindex="-1" href="#">Kategori C-1</a></li>
										<li><a tabindex="-1" href="#">Kategori C-2</a></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-md-3 pull-right">
						<select name="urut" class="form-control">
							<option value="0" selected>urutkan berdasar...</option>
						</select>
					</div>
				</div>
			</div>
			<div class="content table-responsive table-full-width">
				<table class="table table-hover">
					<tbody>
						<?php for($i=1; $i<=5; $i++): ?>
							<tr>
								<td width="15%">
									<img class="table-img" src="<?=base_url()?>assets/img/default-avatar.png" alt="">
								</td>
								<td>
									<h5>
										<a href="#"><span class="badge">Kategori</span></a> 
										<i class="fa fa-angle-double-right"></i> 
										<a href="#"><span class="badge">subkategori</span></a>
									</h5>
									<h5><a href="#"><b class="text-muted">IDBARANG012345</b></a></h5>
									<h4><a href="#"><b>JUDUL BARANG DAN NAMA MERK ABCDEFG</b></a></h4>
								</td>
								<td width="30%">
									<p><i class="fa fa-tag fa-fw"></i> Harga: Rp.100.000</p>
									<p><i class="fa fa-tags fa-fw"></i> Update Harga: n/a</p>
									<p><i class="fa fa-paper-plane fa-fw"></i> Penyedia: ABC</p>
									<p><i class="fa fa-calendar fa-fw"></i> Berlaku sd: 31 Oktober 2017</p>
								</td>
								<td width="15%" align="center">
									<button class="btn btn-info btn-fill btn-xs"><i class="fa fa-pencil"></i> ubah</button>
									<button class="btn btn-danger btn-fill btn-xs"><i class="fa fa-trash"></i> hapus</button>
								</td>
							</tr>
						<?php endfor; ?>
						<tr>
							<td colspan="4" align="center">
								<nav aria-label="Page navigation">
									<ul class="pagination">
										<li>
											<a href="#" aria-label="Previous">
												<span aria-hidden="true">&laquo;</span>
											</a>
										</li>
										<li><a href="#">1</a></li>
										<li><a href="#">2</a></li>
										<li><a href="#">3</a></li>
										<li><a href="#">4</a></li>
										<li><a href="#">5</a></li>
										<li>
											<a href="#" aria-label="Next">
												<span aria-hidden="true">&raquo;</span>
											</a>
										</li>
									</ul>
								</nav>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>