<div class="col-md-2">
<form action="<?=site_url("katalog")?>" method="get">
    <div class="side-group">
        <div class="form-group">
            <label>Urutkan</label>
            <select name="order" class="form-control">
                <option value="0" <?=(isset($filter['order']) && $filter['order']==0)?'selected':''?> >Terbaru</option>
                <option value="1" <?=(isset($filter['order']) && $filter['order']==1)?'selected':''?> >Terlama</option>
                <option value="2" <?=(isset($filter['order']) && $filter['order']==2)?'selected':''?> >Termahal</option>
                <option value="3" <?=(isset($filter['order']) && $filter['order']==3)?'selected':''?> >Termurah</option>
                <option value="4" <?=(isset($filter['order']) && $filter['order']==4)?'selected':''?> >Nama A-Z</option>
                <option value="5" <?=(isset($filter['order']) && $filter['order']==5)?'selected':''?> >Nama Z-A</option>
                <option value="6" <?=(isset($filter['order']) && $filter['order']==6)?'selected':''?> >Merk A-Z</option>
                <option value="7" <?=(isset($filter['order']) && $filter['order']==7)?'selected':''?> >Merek Z-A</option>
                <option value="8" <?=(isset($filter['order']) && $filter['order']==8)?'selected':''?> >Tipe A-Z</option>
                <option value="9" <?=(isset($filter['order']) && $filter['order']==9)?'selected':''?> >Tipe Z-A</option>
            </select>
        </div>
        <div class="form-group"><button class="btn btn-primary btn-block btn-xs"><i class="fa fa-sort"></i></button></div>
    </div>
    <div class="side-group">
        <div class="form-group">
            <label>Nama Barang</label>
            <input type="text" class="form-control input-sm" name="nama" placeholder="Nama Barang" value="<?=(isset($filter['nama'])?$filter['nama']:'')?>">
        </div>
    </div>
    <div class="side-group">
        <div class="form-group">
            <label>Merk</label>
            <input type="text" class="form-control input-sm" name="merk" placeholder="Merk Barang" value="<?=(isset($filter['merk'])?$filter['merk']:'')?>">
        </div>
    </div>
    <div class="side-group">
        <div class="form-group">
            <label>Tipe</label>
            <input type="text" class="form-control input-sm" name="tipe" placeholder="Tipe Barang" value="<?=(isset($filter['tipe'])?$filter['tipe']:'')?>">
        </div>
    </div>
    <div class="side-group">
        <label>Harga Pokok</label>
        <div class="form-inline">
            <div class="form-group">
                <input type="number" min="0" class="form-control input-sm" style="width: 48%" name="hargaPokok[0]" placeholder="Min" value="<?=(isset($filter['hargaPokok'])?$filter['hargaPokok'][0]:'')?>">
                <input type="number" min="0" class="form-control input-sm" style="width: 48%" name="hargaPokok[1]" placeholder="Max" value="<?=(isset($filter['hargaPokok'])?$filter['hargaPokok'][1]:'')?>">
            </div>
        </div>
    </div>
    <div class="side-group">
        <label>Harga Satuan</label>
        <div class="form-inline">
            <div class="form-group">
                <input type="number" min="0" class="form-control input-sm" style="width: 48%" name="hargaSatuan[0]" placeholder="Min" value="<?=(isset($filter['hargaSatuan'])?$filter['hargaSatuan'][0]:'')?>">
                <input type="number" min="0" class="form-control input-sm" style="width: 48%" name="hargaSatuan[1]" placeholder="Max" value="<?=(isset($filter['hargaSatuan'])?$filter['hargaSatuan'][1]:'')?>">
            </div>
        </div>
    </div>
    <br/>
    <div class="side-group">
        <button class="btn btn-success btn-fill btn-block">Filter</button>
    </div>
</form>
</div>