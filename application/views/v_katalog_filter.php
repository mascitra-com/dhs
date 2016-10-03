<div class="col-md-2">
<form>
    <div class="side-group">
        <div class="form-group">
            <label>Nama Barang</label>
            <input type="text" class="form-control" name="filter['nama']" placeholder="Nama Barang">
        </div>
    </div>
    <div class="side-group">
        <div class="form-group">
            <label>Merk</label>
            <input type="text" class="form-control" name="filter['merk']" placeholder="Merk Barang">
        </div>
    </div>
    <div class="side-group">
        <div class="form-group">
            <label>Tipe</label>
            <input type="text" class="form-control" name="filter['tipe']" placeholder="Tipe Barang">
        </div>
    </div>
    <div class="side-group">
        <div class="form-group">
            <label>Harga Pokok</label>
            <input type="number" min="0" class="form-control" name="filter['hargaPokokAwal']" placeholder="Harga Awal">
            <input type="number" min="0" class="form-control" name="filter['hargaPokokAkhir']" placeholder="Harga Akhir">
        </div>
    </div>
    <div class="side-group">
        <div class="form-group">
            <label>Harga Satuan</label>
            <input type="number" min="0" class="form-control" name="filter['hargaSatuanAwal']" placeholder="Harga Awal">
            <input type="number" min="0" class="form-control" name="filter['hargaSatuanAkhir']" placeholder="Harga Akhir">
        </div>
    </div>
    <div class="side-group">
        <button class="btn btn-success btn-fill btn-block">Filter</button>
    </div>
</form>
</div>