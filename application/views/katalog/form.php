<div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Barang</h4>
      </div>
      <div class="modal-body">
        <form id="form_barang" action="<?=site_url("katalog/store")?>" method="POST">
          <div class="row">
            <!-- Kiri -->
            <div class="col-md-6">

              <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                    <label>Nama Barang <span class="text-danger">*</span></label>
                    <input type="text" name="nama" class="form-control" placeholder="Nama Barang" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Merk</label>
                    <input type="text" name="merk" class="form-control" placeholder="Merk Barang">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Tipe</label>
                    <input type="text" name="tipe" class="form-control" placeholder="Tipe Barang">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Kategori <span class="text-danger">*</span></label>
                    <select name="id_kategori" class="form-control">
                      <option value = "0" selected>Pilih kategori</option>
                      <?php foreach($kategori as $key): ?>
                        <option value = "<?=$key->id?>"><?=$key->nama?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Harga Pokok <span class="text-danger">*</span></label>
                    <input type="number" min="0" name="hargaPokok" value="0" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Harga Satuan</label>
                    <input type="number" min="0" name="hargaSatuan" value="0" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Upload Gambar</label>
                    <input type="file" name="gambar" accept="image/">
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="">Preview Gambar</label>
                  <img src="<?=base_url()?>assets/img-user/default.png" alt="preview" width="180px" height="180px" id="img-preview" class="img-fit" style="border:1px grey solid">
                </div>
              </div>

          </div>
          <!-- akhir kiri -->
          <!-- kanan -->
          <div class="col-md-6">    
            <div class="form-group">
              <label>Spesifikasi</label>
              <textarea name="spesifikasi" id="tx-spesifikasi" class="form-control" placeholder="Spesifikasi Barang"></textarea>
              <p class="help-block"><i class="fa fa-asterisk text-danger"></i> Wajib diisi</p>
            </div>
          </div>
          <!-- akhir kanan -->
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" id="btn-reset-barang">Batal</button>
        <button type="submit" class="btn btn-primary" id="btn-simpan-barang">Simpan</button>
      </form>
    </div>
  </div>
</div>
</div>

<script type="text/javascript">
  var data_nama = <?=(! empty($autocomplete['nama']))?$autocomplete['nama']:'[]'?>;
  var data_tipe = <?=(! empty($autocomplete['tipe']))?$autocomplete['tipe']:'[]'?>;
  var data_merk = <?=(! empty($autocomplete['merk']))?$autocomplete['merk']:'[]'?>;
</script>