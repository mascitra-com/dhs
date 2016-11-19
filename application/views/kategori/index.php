<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="header">
                <h4 class="title">Kategori barang</h4>
                <span class="category">Daftar kategori barang</span>
            </div>
            <div class="content table-responsive table-full-width" style="padding: 2em;">
                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Status</th>
                        <th>Kode</th>
                        <th>Nama Kategori</th>
                        <th width="20%">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td></td>
                        <td>
                            <select id="ip-status" name="status" class="form-control">
                                <option value="" <?= (!isset($filter['status'])) ? 'selected' : '' ?>>Semua</option>
                                <option
                                    value="1" <?= (isset($filter['status']) && $filter['status'] == "1") ? 'selected' : '' ?>>
                                    Aktif
                                </option>
                                <option
                                    value="0" <?= (isset($filter['status']) && $filter['status'] == "0") ? 'selected' : '' ?>>
                                    Nonaktif
                                </option>
                            </select>
                        </td>
                        <td><input type="text" class="form-control input-sm" id="ip-kode"
                                   value="<?= (isset($filter['kode_kategori'])) ? $filter['kode_kategori'] : '' ?>"
                                   placeholder="Kode Kategori" list="kodekategori">
                            <datalist id="kodekategori">
                                <?php foreach ($allKategori as $kat): ?>
                                    <option value="<?= $kat->kode_kategori ?>"><?= $kat->kode_kategori ?></option>
                                <?php endforeach; ?>
                            </datalist>
                        </td>
                        <td><input type="text" class="form-control input-sm" id="ip-nama"
                                   value="<?= (isset($filter['nama'])) ? $filter['nama'] : '' ?>"
                                   placeholder="Nama Kategori" list="namakategori">
                            <datalist id="namakategori">
                                <?php foreach ($allKategori as $kat): ?>
                                    <option value="<?= $kat->nama ?>"><?= $kat->nama ?></option>
                                <?php endforeach; ?>
                            </datalist>
                        </td>
                        <td>
                            <button class="btn btn-info btn-fill btn-block" id="btn-filter" style="text-align: left"><i
                                    class="fa fa-search"></i> Cari
                            </button>
                        </td>
                    </tr>
                    <?php if (!empty($kategori)): ?>
                        <?php $no = 1 + $page; ?>
                        <?php foreach ($kategori as $list): ?>
                            <tr>
                                <td><?=$no++;?></td>
                                <td><?php if ($list->status == 1) { ?>
                                        <a href="<?= site_url('kategori/destroy/' . $list->id) ?>"
                                           class="btn btn-fill btn-xs btn-success"><i class="fa fa-check"></i>Aktif</a>
                                    <?php } else { ?>
                                        <a href="<?= site_url('kategori/activate/' . $list->id) ?>"
                                           class="btn btn-fill btn-xs btn-default"><i
                                                class="fa fa-circle-o"></i>Nonaktif</a>
                                    <?php } ?></td>
                                <td><?= $list->kode_kategori ?></td>
                                <td><?= $list->nama ?></td>
                                <td>
                                    <a onclick="edit('<?= $list->id ?>')" class="btn btn-fill btn-sm btn-primary"><i
                                            class="fa fa-pencil"></i></a>
                                    <a href="<?= site_url('kategori/destroy/' . $list->id) ?>"
                                       class="btn btn-fill btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-md-10 text-center">
                        <?php echo $pagination; ?>
                    </div>
                    <div class="col-md-2">
                        <?php if($segment == 0): ?>
                        <label>Per Page</label>
                        <select name="page" id="page" class="form-control">
                            <option value="10" <?= ($per_page == 10) ? 'selected' : '' ?>>10</option>
                            <option value="25" <?= ($per_page == 25) ? 'selected' : '' ?>>25</option>
                            <option value="50" <?= ($per_page == 50) ? 'selected' : '' ?>>50</option>
                            <option value="100" <?= ($per_page == 100) ? 'selected' : '' ?>>100</option>
                            <option value="200" <?= ($per_page == 200) ? 'selected' : '' ?>>200</option>
                        </select>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="header">
                <h4 class="title">Form Kategori</h4>
                <span class="category">Input Kategori baru</span>
            </div>
            <div class="content">
                <form action="<?= site_url('kategori/store') ?>" method="POST">
                    <div class="form-group">
                        <label for="">Sub dari:</label>
                        <input type="text" class="form-control" id="induk"
                               value="<?= (isset($filter['kategori'])) ? $filter['kategori'] : '' ?>"
                               placeholder="Nama Kategori" list="formkategori">
                        <datalist id="formkategori">
                            <?php foreach ($allKategori as $kat): ?>
                                <option value="<?= $kat->kode_kategori ?>"><?= $kat->nama ?></option>
                            <?php endforeach; ?>
                        </datalist>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="checkInduk"> <label for="checkInduk">Kategori Induk</label>
                    </div>
                    <div class="form-group">
                        <label for="">Kode Kategori</label>
                        <input class="form-control" type="text" name="sub_kategori" id="sub_kategori"
                               placeholder="Kode Kategori" required readonly="">
                    </div>
                    <div class="form-group">
                        <label for="">Nama Kategori</label>
                        <input class="form-control" type="text" name="nama_kategori" placeholder="Nama Kategori"
                               required>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-fill btn-block btn-success"><i class="fa fa-save"></i> Simpan</button>
                        <button class="btn btn-fill btn-block btn-danger"><i class="fa fa-repeat"></i> Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="editModal" class="modal fade" role='dialog' data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Edit Kategori</h4>
            </div>
            <form action="<?= site_url('kategori/update') ?>" method="POST" style="margin: 1em">
                <div class="form-group">
                    <input name="idUpdate" id="idUpdate" hidden>
                </div>
                <div class="form-group">
                    <label for="">Kode Kategori</label>
                    <input class="form-control" type="text" name="sub_kategoriUpdate" id="sub_kategoriUpdate"
                           placeholder="Kode Kategori" required readonly>
                </div>
                <div class="form-group">
                    <label for="">Nama Kategori</label>
                    <input class="form-control" type="text" name="nama_kategoriUpdate" id="nama_kategoriUpdate"
                           placeholder="Nama Kategori" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-info">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function edit(id) {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "<?=site_url('kategori/edit?id=')?>" + id,
            success: function (data) {
                $("#indukUpdate").html(data.kategori);
                $("#idUpdate").val(data.id);
                $("#indukUpdate").val(data.id_induk);
                $("#sub_kategoriUpdate").val(data.kode_kategori);
                $("#nama_kategoriUpdate").val(data.nama);
            }
        });
        $("#editModal").modal();
    }

    function kategoriInduk() {
        $.ajax({
            type: "GET",
            url: "<?=site_url('kategori/get_kode_induk')?>",
            success: function (data) {
                $("#sub_kategori").val(data);
            }
        });
    }

    function refresh() {
        window.location.assign("<?=site_url('kategori')?>");
    }
</script>