<div class='row' id="highlight">
	<div class="col-md-5">
		<div id="desc">
			<h2>SELAMAT DATANG!</h2>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
				Explicabo eveniet maiores, blanditiis facilis nisi dolor repellat tenetur 
				consectetur omnis error eaque illo aut nemo repellendus?
			</p>
			<button class="btn btn-info btn-fill">selengkapnya</button>
		</div>
	</div>
	<div class="col-md-7">
		<div class="card">
			<div class="header">
				<h2 class="title">QUICK SEARCH</h2>
				<span class="category">Cari barang dengan cepat</span>
			</div>
			<div class="content">
				<div class="form-group">
					<select class="form-control" name="">
						<option value="">PILIH KATEGORI</option>
					</select>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" placeholder="KATA KUNCI">
				</div>
				<div class="form-group">
					<button class="btn btn-warning btn-fill btn-block">CARI</button>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $icon = array('bars','bell','beer','bullhorn','calculator','car','bus','camera');?>
<div class="row" id="kategori">
	<?php for($i=0; $i<5;$i++): ?>
		<?php for($j=0; $j<count($icon);$j++): ?>
			<div class="col-md-2 col-sm-4">
				<div class="card">
					<div class="content"><i class="fa fa-<?=$icon[$j]?>"></i>&nbspKategori</div>
				</div>
			</div>
		<?php endfor; ?>
	<?php endfor; ?>
</div>