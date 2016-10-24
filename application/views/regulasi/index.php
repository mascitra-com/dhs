<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="header">
                <h3 class="title"><i class="fa fa-institution fa-fw"></i> Daftar Regulasi</h3>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-striped">
                    <tbody>
                    <?php foreach ($regulasi as $list): ?>
                        <tr>
                            <td>
                                <h4><b><?= $list->judul ?></b></h4>
                                <p><?= $list->isi ?></p>
                                <p class="text text-warning"><?php echo date('d-m-Y', strtotime(str_replace('-', '/', $list->tgl_dikeluarkan))); ?></p>
                                <b class="badge">Dikeluarkan Oleh: <?= $list->dikeluarkan_oleh ?></b>
                            </td>
                            <td>
                                <a href="<?= base_url('assets/regulasi/' . $list->file) ?>"
                                   class="btn btn-xs btn-warning" download><i class="fa fa-file-pdf-o"></i></a>
                                <a onclick="edit('<?= $list->id ?>')" class="btn btn-xs btn-info"><i
                                        class="fa fa-pencil"></i></a>
                                <a href="<?= site_url('regulasi/destroy/' . $list->id) ?>"
                                   class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="header">
                <h4 class="title">Form Regulasi</h4>
                <hr>
            </div>
            <div class="content">
                <form action="<?= site_url('regulasi/store') ?>" method="post">
                    <div class="form-group">
                        <label>Judul Regulasi</label>
                        <input type="text" name="judul" class="form-control" placeholder="Judul regulasi" required>
                    </div>
                    <div class="form-group">
                        <label>Isi Regulasi</label>
                        <textarea name="isi" class="form-control" placeholder="Isi regulasi" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Dikeluarkan pada</label>
                        <input type="date" name="tgl_dikeluarkan" class="form-control" placeholder="Masa Aktif">
                    </div>
                    <div class="form-group">
                        <label>Dikeluarkan oleh</label>
                        <input type="text" name="dikeluarkan_oleh" class="form-control" placeholder="Dikeluarkan oleh"
                               required>
                    </div>
                    <div class="form-group">
                        <label>File</label>
                        <input type="file" name="file" class="form-control" value="Browse" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-fill btn-success">Simpan</button>
                        <button class="btn btn-block btn-fill btn-warning" type="reset">Batal</button>
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
                <h4 class="modal-title">Edit Regulasi</h4>
            </div>
            <form action="<?= site_url('regulasi/update') ?>" method="post" style="margin: 1em">
                <input name="id" id="idUpdate" hidden>
                <div class="form-group">
                    <label>Judul Regulasi</label>
                    <input type="text" name="judul" id="judulUpdate" class="form-control" placeholder="Judul regulasi"
                           required>
                </div>
                <div class="form-group">
                    <label>Isi Regulasi</label>
                    <textarea name="isi" id="isiUpdate" class="form-control" placeholder="Isi regulasi"
                              required></textarea>
                </div>
                <div class="form-group">
                    <label>Dikeluarkan pada</label>
                    <input type="date" name="tgl_dikeluarkan" id="tgl_dikeluarkanUpdate" class="form-control"
                           placeholder="Masa Aktif">
                </div>
                <div class="form-group">
                    <label>Dikeluarkan oleh</label>
                    <input type="text" name="dikeluarkan_oleh" id="dikeluarkan_olehUpdate" class="form-control"
                           placeholder="Dikeluarkan oleh" required>
                </div>
                <div class="form-group">
                    <label>File</label><br/>
                    <p id="fileUpdate"></p>
                    <input type="file" name="file" class="form-control" value="Browse" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-fill btn-success">Simpan</button>
                    <button class="btn btn-block btn-fill btn-warning" data-dismiss="modal">Batal</button>
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
            url: "<?=site_url('regulasi/edit?id=')?>" + id,
            success: function (data) {
                $("#idUpdate").val(data.id);
                $("#judulUpdate").val(data.judul);
                $("#isiUpdate").val(data.isi);
                $("#tgl_dikeluarkanUpdate").val(data.tgl_dikeluarkan);
                $("#dikeluarkan_olehUpdate").val(data.dikeluarkan_oleh);
                $("#fileUpdate").text(data.file);
            }
        });
        $("#editModal").modal();
    }
</script>