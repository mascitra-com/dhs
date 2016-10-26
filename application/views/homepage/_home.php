<div class='row' id="highlight">
	<div class="col-lg-5">
		<div id="desc">
			<h2>SELAMAT DATANG!</h2>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit.
				Explicabo eveniet maiores, blanditiis facilis nisi dolor repellat tenetur
				consectetur omnis error eaque illo aut nemo repellendus?
			</p>
			<button class="btn btn-info btn-fill">Selengkapnya</button>
		</div>
	</div>
	<div class="col-lg-7">
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

<div class="row">
	<?php 
		$icon = array(array('car','bell','key','cubes','male'),array('hourglass','image','map-marker','inbox','heart'),array('plug','print','send','shield','paw'));
		$label = explode(' ', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis natus at, pariatur deleniti, dolores adipisci.');

	?>
	<?php for($i=0;$i<3;$i++): ?> 
	<div class="col-xs-1 col-md-4">
		<!-- Dropdown menu -->
		<div class="panel list-group">
			<?php for($j=0;$j<5;$j++): ?> 
			<!-- list & sublist -->
			<button class="list-group-item" data-toggle="collapse" data-target="#sm<?=$i.''.$j?>"><?=strtoupper($label[rand(0,count($label)-1)])?><i class="fa fa-<?=$icon[$i][$j]?> pull-right"></i></button>
			<div id="sm<?=$i.''.$j?>" class="sublinks collapse">
				<a class="list-group-item small"><span class="glyphicon glyphicon-chevron-right"></span> inbox</a>
				<a class="list-group-item small"><span class="glyphicon glyphicon-chevron-right"></span> sent</a>
			</div>
			<!-- batas list & sublist -->
			<?php endfor; ?>
		</div>
		<!-- Batas Dropdown menu -->
	</div>
<?php endfor; ?>
</div>

<div id="hot-list">
	<div class="row">
		<?php for ($i = 0; $i < 12; $i++) {?>
		<div class="col-sm-6 col-md-4 col-lg-3">
			<div class="thumbnail">
				<img src="<?=base_url('assets/img/kategori.gif')?>" alt="...">
				<div class="caption">
					<h3>Kategori Ke-<?=$i + 1?></h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua.</p>
						<p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
					</div>
				</div>
			</div>
			<?php }?>
		</div>
	</div>