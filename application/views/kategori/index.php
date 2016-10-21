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
                                <button class="btn btn-fill btn-xs btn-primary"><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-fill btn-xs btn-danger"><i class="fa fa-trash"></i></button>
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
                <form>
                    <div class="form-group">
                        <label for="">Sub dari:</label>
                        <select class="form-control" name="" id="">
                            <option value="">Pilih kategori</option>
                            <?php foreach ($kategori as $list): ?>
                                <option value="<?= $list->id ?>"><?= $list->kode_kategori ?>. <?= $list->nama ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">ID Kategori</label>
                        <input class="form-control" type="text" name="" placeholder="ID Kategori" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Kategori</label>
                        <input class="form-control" type="text" name="" placeholder="Nama Kategori" required>
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