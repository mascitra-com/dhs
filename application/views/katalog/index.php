<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="content">
                <div class="row">
                    <div class="col-md-6">
                        <a class="btn btn-warning btn-fill" href="#"><i class="fa fa-plus"></i> Tambah Data</a>
                        <a class="btn btn-danger btn-fill" href="<?=site_url('export/katalog')?>"><i class="fa fa-download"></i> Export Data</a>
                        <a class="btn btn-success btn-fill" href="<?=site_url('katalog/import')?>"><i class="fa fa-upload"></i> Import Data</a>

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
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group"><input type="text" class="form-control" id="ip-nama"
                                                       value="<?= (isset($filter['nama'])) ? $filter['nama'] : '' ?>"
                                                       placeholder="Nama"></div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group"><input type="text" class="form-control" id="ip-merk"
                                                       value="<?= (isset($filter['merk'])) ? $filter['merk'] : '' ?>"
                                                       placeholder="Merk"></div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group"><input type="text" class="form-control" id="ip-tipe"
                                                       value="<?= (isset($filter['tipe'])) ? $filter['tipe'] : '' ?>"
                                                       placeholder="Tipe"></div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-inline">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="harga min">
                                <input type="text" class="form-control" placeholder="harga max">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                            <button class="btn btn-info btn-fill" id="bt-filter"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
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
                                    <a href="#"><span class="badge">Kategori</span></a>
                                    <i class="fa fa-angle-double-right"></i>
                                    <a href="#"><span class="badge"><?= $brg->kategori ?></span></a>
                                </h5>
                                <h5><a href="<?= site_url('katalog/detail/' . $brg->id) ?>"><b class="text-muted">Kode
                                            Barang - <?= str_replace('.', '', $brg->kode_barang) ?></b></a></h5>
                                <h4>
                                    <a href="<?= site_url('katalog/detail/' . $brg->id) ?>"><b><?= $brg->nama . ' ' . $brg->merk . ' ' . $brg->tipe ?></b></a>
                                </h4>
                            </td>
                            <td width="25%">
                                <p><i class="fa fa-tag fa-fw"></i> Harga Pasar :
                                    Rp.<?= number_format($brg->hargaPasar, '0', '', '.') ?>,-</p>
                                <p><i class="fa fa-tags fa-fw"></i> Harga SHSB :
                                    Rp.<?= number_format($brg->hargashsb, '0', '', '.') ?>,-</p>
                                <p><i class="fa fa-paper-plane fa-fw"></i> Penyedia :<!--   ABC --></p>
                                <p><i class="fa fa-calendar fa-fw"></i> Harga Pada Tanggal
                                    : <?php echo mdate('%d-%m-%Y', strtotime(str_replace('-', '/', $brg->createdAt))); ?>
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
                                    <li><a style="cursor: pointer;">Banyak Data</a></li>
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