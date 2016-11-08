<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="header">
                <h3 class="title">Kategori Barang</h3>
            </div>
            <div class="content">
                <!-- Dropdown menu -->
                <div class="list-group">
                    <?php $i = 1 ?>
                    <?php foreach ($list as $data): ?>
                        <?php $j = count($data); ?>
                        <!-- list & sublist -->
                        <?php if ($j > 3) { ?>
                        <button class="list-group-item" data-toggle="collapse" data-target="#sm<?= $i ?>">
                            <?= $data[1] ?> (<?= $data[2] ?>)
                            <span class="caret"></span>
                        </button>

                        <div id="sm<?= $i ?>" class="sublinks collapse">
                            <?php if (isset($data[3])): ?>
                                <?php for ($k = 3; $k < $j; $k++): ?>
                                    <a class="list-group-item small"
                                    href="<?= site_url('katalog?kategori=') . $data[$k++] ?>"><?= $data[$k++] ?>
                                    (<?= $data[$k] ?>)</a>
                                <?php endfor; ?>
                            <?php endif; ?>
                        </div>
                        <?php } ?>
                        <!-- batas list & sublist -->
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </div>
                <!-- Batas Dropdown menu -->
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="card">
            <div class="content">
                <div class="row">
                    <div class="col-md-6">
                        <a class="btn btn-warning btn-fill" href="<?= site_url('katalog/add') ?>"><i
                            class="fa fa-plus"></i> Tambah Data</a>
                            <a class="btn btn-danger btn-fill" href="<?= site_url('export/katalog') ?>"><i
                                class="fa fa-download"></i> Export Data</a>

                            </div>
                            <div class="col-md-3 pull-right">
                                <select name="order" id="sl-urut" class="form-control">
                                    <option
                                    value="0" <?= (isset($filter['order']) && $filter['order'] == 0) ? 'selected' : '' ?> >
                                    Terbaru
                                </option>
                                <option
                                value="1" <?= (isset($filter['order']) && $filter['order'] == 1) ? 'selected' : '' ?> >
                                Terlama
                            </option>
                            <option
                            value="2" <?= (isset($filter['order']) && $filter['order'] == 2) ? 'selected' : '' ?> >
                            Termahal
                        </option>
                        <option
                        value="3" <?= (isset($filter['order']) && $filter['order'] == 3) ? 'selected' : '' ?> >
                        Termurah
                    </option>
                    <option
                    value="4" <?= (isset($filter['order']) && $filter['order'] == 4) ? 'selected' : '' ?> >
                    Nama A-Z
                </option>
                <option
                value="5" <?= (isset($filter['order']) && $filter['order'] == 5) ? 'selected' : '' ?> >
                Nama Z-A
            </option>
            <option
            value="6" <?= (isset($filter['order']) && $filter['order'] == 6) ? 'selected' : '' ?> >
            Merk A-Z
        </option>
        <option
        value="7" <?= (isset($filter['order']) && $filter['order'] == 7) ? 'selected' : '' ?> >
        Merek Z-A
    </option>
    <option
    value="8" <?= (isset($filter['order']) && $filter['order'] == 8) ? 'selected' : '' ?> >
    Tipe A-Z
</option>
<option
value="9" <?= (isset($filter['order']) && $filter['order'] == 9) ? 'selected' : '' ?> >
Tipe Z-A
</option>
</select>
</div>
</div>
</div>
</div>
<div class="card">
    <div class="header">
        <div class="input-group">
          <input type="text" class="form-control" id="ip-nama" value="<?= (isset($filter['nama'])) ? $filter['nama'] : '' ?>" placeholder="Nama">
          <span class="input-group-btn" style="width:0px;"></span>
          <input type="text" class="form-control" id="ip-merk" value="<?= (isset($filter['merk'])) ? $filter['merk'] : '' ?>" placeholder="Merk" style="margin-left:-2px">
          <span class="input-group-btn" style="width:0px;"></span>
          <input type="text" class="form-control" id="ip-tipe" value="<?= (isset($filter['tipe'])) ? $filter['tipe'] : '' ?>" placeholder="Tipe" style="margin-left:-2px">
          <span class="input-group-btn" style="width:0px;"></span>
          <input type="text" class="form-control" id="ip-hargamin" value="<?= (isset($filter['hargamin'])) ? $filter['hargamin'] : '' ?>" placeholder="hargashsb min" style="margin-left:-2px">
          <span class="input-group-btn" style="width:0px;"></span>
          <input type="text" class="form-control" id="ip-hargamax" value="<?= (isset($filter['hargamax'])) ? $filter['hargamax'] : '' ?>" placeholder="hargashsb max" style="margin-left:-2px">
          <span class="input-group-btn">
            <button class="btn btn-info btn-fill" id="bt-filter"><i class="fa fa-search"></i></button>
          </span>
        </div>
    </div>
    <div class="content table-responsive table-full-width">
        <table class="table table-hover">
            <tbody>
                <?php foreach ($barang as $brg): ?>
                    <tr id="brg<?= $brg->id ?>">
                        <td width="20%">
                            <img class="table-img"
                            src="<?= base_url() ?>assets/img/img-barang/<?= cek_file($brg->gambar) ?>" alt="">
                        </td>
                        <td>
                            <h5>
                                <a href="<?=site_url('katalog')?>"><span class="badge">Kategori</span></a>
                                <i class="fa fa-angle-double-right"></i>
                                <a href="<?=site_url('katalog?kategori='.$brg->kode_kategori);?>"><span class="badge"><?= $brg->kategori ?></span></a>
                            </h5>
                            <h5>
                                <a href="<?= site_url('katalog/detail/' . $brg->id) ?>"><b
                                    class="text-muted"><?= $brg->kode_kategori . '.' . $brg->id ?></b></a>
                                </h5>
                                <h4>
                                    <a href="<?= site_url('katalog/detail/' . $brg->id) ?>"><b><?= $brg->nama . ' ' . $brg->merk . ' ' . $brg->tipe ?></b></a>
                                </h4>
                            </td>
                            <td width="25%">
                                <p><i class="fa fa-tag fa-fw"></i> Harga Pasar :
                                    Rp.<?= number_format($brg->hargaPasar, '0', '', '.') ?>,-</p>
                                    <p><i class="fa fa-tags fa-fw"></i> Harga SHSB :
                                        Rp.<?= number_format($brg->hargashsb, '0', '', '.') ?>,-</p>
                                        <p><i class="fa fa-paper-plane fa-fw"></i> Penyedia : <?=substr($brg->keterangan,0,14)?></p>
                                        <p><i class="fa fa-calendar fa-fw"></i> Harga Pada
                                            Tanggal : <?php echo mdate('%d-%m-%Y', strtotime(str_replace('-', '/', $brg->createdAt))); ?>
                                        </p>
                                    </td>
                                    <td width="15%" align="center">
                                        <a href="<?= site_url('katalog/edit/' . $brg->id) ?>"
                                           class="btn btn-info btn-fill btn-xs"><i class="fa fa-pencil"></i> Ubah</a>
                                           <button class="btn btn-danger btn-fill btn-xs"
                                           onclick="hapus(<?= $brg->id ?>, '<?= $brg->gambar ?>')"><i
                                           class="fa fa-trash"></i> Hapus
                                       </button>
                                   </td>
                               </tr>
                           <?php endforeach; ?>
                           <tr>
                            <td colspan="2" align="left">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination">
                                        <li><a style="cursor: pointer;">Tampilkan</a></li>
                                        <li><a style="cursor: pointer;" onclick="offset(5)">5</a></li>
                                        <li><a style="cursor: pointer;" onclick="offset(10)">10</a></li>
                                        <li><a style="cursor: pointer;" onclick="offset(20)">20</a></li>
                                        <li><a style="cursor: pointer;" onclick="offset(50)">50</a></li>
                                        <li><a style="cursor: pointer;" onclick="offset(100)">100</a></li>
                                    </ul>
                                </nav>
                            </td>
                            <td colspan="2" align="right">
                                <?php
                                if (!isset($filter['pg'])):
                                    $filter['pg'] = 1;
                                endif;
                                $pg = $filter['pg'];
                                ?>
                                <nav aria-label="Page navigation">
                                    <ul class="pagination">
                                        <li><a style="cursor: pointer;" onclick="pagination(1)">awal</a></li>
                                        <li><a style="cursor: pointer;" onclick="pagination(<?= $pg - 1 ?>)"><i
                                            class="fa fa-arrow-left"></i></a></li>
                                            <li><a style="cursor: pointer;" onclick="pagination(<?= $pg + 1 ?>)"><i
                                                class="fa fa-arrow-right"></i></a></li>
                                            </ul>
                                        </nav>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <?php
        function cek_file($filename)
        {
            if (!file_exists('./assets/img/img-barang/' . $filename) || $filename == '') {
                $filename = 'default.png';
            }
            return $filename;
        }

        ?>