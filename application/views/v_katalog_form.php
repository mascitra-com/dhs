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
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama Barang">
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
                
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>