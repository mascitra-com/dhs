<div class="row">
    <div class="col-md-7">
        <div class="card">
            <div class="header">
                <h4 class="title">Kategori barang</h4>
                <span class="category">Daftar kategori barang</span>
            </div>
            <div class="content table-responsive table-full-width" style="padding: 2em;">
                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama Kategori</th>
                        <th width="20%">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($kategori as $list): ?>
                        <tr>
                            <td><?= $list->kode_kategori ?></td>
                            <td><?= $list->nama ?></td>
                            <td>
                                <a onclick="edit('<?= $list->id ?>')" class="btn btn-fill btn-xs btn-primary"><i
                                        class="fa fa-pencil"></i></a>
                                <a href="<?= site_url('kategori/destroy/' . $list->id) ?>"
                                   class="btn btn-fill btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card">
            <div class="header">
                <h4 class="title">Form Kategori</h4>
                <span class="category">Input Kategori baru</span>
            </div>
            <div class="content">
                <form action="<?= site_url('kategori/store') ?>" method="POST">
                    <div class="form-group">
                        <label for="">Sub dari:</label>
                        <select class="form-control" name="induk" id="induk" onchange="select()">
                            <option value="">Pilih kategori</option>
                            <?php foreach ($kategori as $list): ?>
                                <option value="<?= $list->id ?>"><?= $list->kode_kategori ?>
                                    . <?= $list->nama ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="checkInduk"> <label>Kategori Induk</label>
                    </div>
                    <div class="form-group">
                        <label for="">Kode Kategori</label>
                        <input class="form-control" type="text" name="sub_kategori" id="sub_kategori"
                               placeholder="Kode Kategori" required readonly>
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
    function select() {
        var kode_kategori = $('#induk').find(":selected").val();
        $.ajax({
            type: "GET",
            url: "<?=site_url('kategori/get_kode?id=')?>" + kode_kategori,
            success: function (data) {
                console.log(data);
                $("#sub_kategori").val(data);
            }
        });
    }

    function edit(id) {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "<?=site_url('kategori/edit?id=')?>" + id,
            success: function (data) {
                console.log(data);
                $("#indukUpdate").html(data.kategori);
                $("#idUpdate").val(data.id);
                $("#indukUpdate").val(data.id_induk);
                $("#sub_kategoriUpdate").val(data.kode_kategori);
                $("#nama_kategoriUpdate").val(data.nama);
            }
        });
        $("#editModal").modal();
    }

    function refresh() {
        window.location.assign("<?=site_url('kategori')?>");
    }
</script>