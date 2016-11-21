<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="header">
                <h3 class="title">Katalog Barang</h3>
            </div>
            <div class="content">
                <!-- Dropdown menu -->
                <div class="list-group" id="kategori">
                    <?php if (!$list_kategori = $this->cache->get('list_kategori')) { ?>
                        <?php $list_kategori = $this->load->view('homepage/list_kategori', array($hotlist, $jml_hotlist, $kategori), TRUE);
                        $this->cache->save('list_kategori', $list_kategori, 3600);
                        echo $list_kategori; ?>
                    <?php } else {
                        echo $list_kategori;
                    } ?>
                </div>
                <!-- Batas Dropdown menu -->
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="content">
                <div class="row">
                    <div class="col-md-6">
                        <h5>DAFTAR KATALOG BARANG</h5>
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
                    <input type="text" class="form-control" id="ip-nama"
                           value="<?= (isset($filter['nama'])) ? $filter['nama'] : '' ?>" placeholder="Nama">
                    <span class="input-group-btn" style="width:0px;"></span>
                    <input type="text" class="form-control" id="ip-merk"
                           value="<?= (isset($filter['merk'])) ? $filter['merk'] : '' ?>" placeholder="Merk"
                           style="margin-left:-2px">
                    <span class="input-group-btn" style="width:0px;"></span>
                    <input type="text" class="form-control" id="ip-tipe"
                           value="<?= (isset($filter['tipe'])) ? $filter['tipe'] : '' ?>" placeholder="Tipe"
                           style="margin-left:-2px">
                    <span class="input-group-btn" style="width:0px;"></span>
                    <input type="text" class="form-control" id="ip-hargamin"
                           value="<?= (isset($filter['hargamin'])) ? $filter['hargamin'] : '' ?>"
                           placeholder="hargashsb min" style="margin-left:-2px">
                    <span class="input-group-btn" style="width:0px;"></span>
                    <input type="text" class="form-control" id="ip-hargamax"
                           value="<?= (isset($filter['hargamax'])) ? $filter['hargamax'] : '' ?>"
                           placeholder="hargashsb max" style="margin-left:-2px">
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
                                <a href="<?= site_url('homepage/detail/' . $brg->id) ?>">
                                    <img class="table-img"
                                         src="<?= base_url() ?>assets/img/img-barang/<?= cek_file($brg->gambar) ?>"
                                         alt="">
                                </a>
                            </td>
                            <td>
                                <h5>
                                    <span class="badge">Kategori</span>
                                    <i class="fa fa-angle-double-right"></i>
                                    <a href="<?= site_url('homepage/katalog?kategori=' . $brg->kode_kategori); ?>"><span
                                            class="badge"><?= $brg->kategori ?></span></a>
                                </h5>
                                <h5>
                                    <a href="<?= site_url('homepage/detail/' . $brg->id) ?>"><b
                                            class="text-muted"><?= $brg->kode_kategori . '.' . $brg->id ?></b></a>
                                </h5>
                                <h4>
                                    <a href="<?= site_url('homepage/detail/' . $brg->id) ?>"><b><?= $brg->nama . ' ' . $brg->merk . ' ' . $brg->tipe ?></b></a>
                                </h4>
                            </td>
                            <td width="35%">
                                <p><i class="fa fa-tag fa-fw"></i> Harga Pasar :
                                    Rp.<?= number_format($brg->hargaPasar, '0', '', '.') ?>,-</p>
                                <p><i class="fa fa-tags fa-fw"></i> Harga SHSB :
                                    Rp.<?= number_format($brg->hargashsb, '0', '', '.') ?>,-</p>
                                <p><i class="fa fa-paper-plane fa-fw"></i> Penyedia
                                    : <?= substr($brg->keterangan, 0, 14) ?></p>
                                <p><i class="fa fa-calendar fa-fw"></i> Harga Pada
                                    Tanggal
                                    : <?php echo mdate('%d-%m-%Y', strtotime(str_replace('-', '/', $brg->createdAt))); ?>
                                </p>
                            </td>
                            <td align="center">
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
<script>
    ac_nama = <?=$autocomplete['nama']?>;
    ac_merk = <?=$autocomplete['merk']?>;
    ac_tipe = <?=$autocomplete['tipe']?>;
</script>

<?php
function cek_file($filename)
{
    if (!file_exists('./assets/img/img-barang/' . $filename) || $filename == '') {
        $filename = 'default.png';
    }
    return $filename;
}

?>