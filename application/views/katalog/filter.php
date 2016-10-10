<div class="col-md-2">
<form action="<?=site_url()?>/katalog" method="get">
    <div class="side-group">
        <div class="form-group">
            <label>Urutkan</label>
            <select name="urutan" class="form-control">
                <option value="0" <?=(isset($filter) && $filter['urutan']==0)?'selected':''?> >Terbaru</option>
                <option value="1" <?=(isset($filter) && $filter['urutan']==1)?'selected':''?> >Terlama</option>
                <option value="2" <?=(isset($filter) && $filter['urutan']==2)?'selected':''?> >Termahal</option>
                <option value="3" <?=(isset($filter) && $filter['urutan']==3)?'selected':''?> >Termurah</option>
                <option value="4" <?=(isset($filter) && $filter['urutan']==4)?'selected':''?> >Nama A-Z</option>
                <option value="5" <?=(isset($filter) && $filter['urutan']==5)?'selected':''?> >Nama Z-A</option>
                <option value="6" <?=(isset($filter) && $filter['urutan']==6)?'selected':''?> >Merk A-Z</option>
                <option value="7" <?=(isset($filter) && $filter['urutan']==7)?'selected':''?> >Merek Z-A</option>
                <option value="8" <?=(isset($filter) && $filter['urutan']==8)?'selected':''?> >Tipe A-Z</option>
                <option value="9" <?=(isset($filter) && $filter['urutan']==9)?'selected':''?> >Tipe Z-A</option>
            </select>
        </div>
        <div class="form-group"><button class="btn btn-primary btn-block btn-xs"><i class="fa fa-sort"></i></button></div>
    </div>
    <div class="side-group">
        <div class="form-group">
            <label>Nama Barang</label>
            <input type="text" class="form-control" name="nama" placeholder="Nama Barang" value="<?=(isset($filter['nama'])?$filter['nama']:'')?>">
        </div>
    </div>
    <div class="side-group">
        <div class="form-group">
            <label>Merk</label>
            <input type="text" class="form-control" name="merk" placeholder="Merk Barang" value="<?=(isset($filter['merk'])?$filter['merk']:'')?>">
        </div>
    </div>
    <div class="side-group">
        <div class="form-group">
            <label>Tipe</label>
            <input type="text" class="form-control" name="tipe" placeholder="Tipe Barang" value="<?=(isset($filter['tipe'])?$filter['tipe']:'')?>">
        </div>
    </div>
    <div class="side-group">
        <div class="form-group">
            <label>Harga Pokok</label>
            <input type="number" min="0" class="form-control" name="hargaPokok[0]" placeholder="Harga Minimum" value="<?=(isset($filter['hargaPokok'])?$filter['hargaPokok'][0]:'')?>">
            <input type="number" min="0" class="form-control" name="hargaPokok[1]" placeholder="Harga Maximum" value="<?=(isset($filter['hargaSatuan'])?$filter['hargaPokok'][1]:'')?>">
        </div>
    </div>
    <div class="side-group">
        <div class="form-group">
            <label>Harga Satuan</label>
            <input type="number" min="0" class="form-control" name="hargaSatuan[0]" placeholder="Harga Minimum" value="<?=(isset($filter)?$filter['hargaSatuan'][0]:'')?>">
            <input type="number" min="0" class="form-control" name="hargaSatuan[1]" placeholder="Harga Maximum" value="<?=(isset($filter)?$filter['hargaSatuan'][1]:'')?>">
        </div>
    </div>
    <div class="side-group">
        <button class="btn btn-success btn-fill btn-block">Filter</button>
    </div>
</form>
</div>