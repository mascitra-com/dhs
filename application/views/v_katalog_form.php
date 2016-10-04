<div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Barang</h4>
      </div>
      <div class="modal-body">
        <form id="form_barang">
            <div class="row">
            <!-- Kiri -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama Barang" required>
                    </div>
                    <div class="form-group">
                        <label>Merk</label>
                        <input type="text" name="merk" class="form-control" placeholder="Merk Barang">
                    </div>
                    <div class="form-group">
                        <label>Tipe</label>
                        <input type="text" name="tipe" class="form-control" placeholder="Tipe Barang">
                    </div>
                    <div class="form-group">
                        <label>Spesifikasi</label>
                        <textarea name="spesifikasi" class="form-control" placeholder="Spesifikasi Barang"></textarea>
                    </div>
                </div>
                <!-- akhir kiri -->
                <!-- kanan -->
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Upload Gambar</label>
                    <input type="file" name="gambar" accept="image/">
                  </div>
                  <div class="form-group">
                    <label for="">Harga Pokok</label>
                    <input type="number" min="0" name="hargaPokok" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label for="">Harga Satuan</label>
                    <input type="number" min="0" name="hargaSatuan" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="">Kategori</label>
                    <select name="id_kategori" class="form-control">
                      <option value = "0" selected>Pilih kategori</option>
                      <option value = "1">Hardware</option>
                      <option value = "2">Software</option>
                    </select>
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