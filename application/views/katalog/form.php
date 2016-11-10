<div class="row">
    <form id="form-katalog" method="post" action="<?= site_url((isset($data)) ? 'katalog/update' : 'katalog/store') ?>">
        <input type="hidden" name="id" value="<?= (isset($data)) ? $data->id : '' ?>">
        <input type="hidden" name="createdAt" value="<?= (isset($data)) ? $data->createdAt : '' ?>">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title"><i class="fa fa-archive fa-fw"></i> Tambah Katalog</h4>
                </div>
                <div class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Kategori</label>
                                <!-- <input type="text" name="kategori" class="form-control" placeholder="pilih kategori" > -->
                                <input type="text" class="form-control" name="kode_kategori" placeholder="kategori" list="listkategori" value="<?= (isset($data)) ? $data->kode_kategori . '-' . $data->kategori : '' ?>" required>
                                <datalist id="listkategori">
                                    <?php foreach($kategori as $kat): ?>
                                    <option value="<?=$kat->kode_kategori.'-'.$kat->nama?>"><?=$kat->kode_kategori.'-'.$kat->nama?></option>
                                    <?php endforeach; ?>
                                </datalist>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Nama Barang</label>
                                <input type="text" class="form-control" name="nama" placeholder="nama barang"
                                       value="<?= (isset($data)) ? $data->nama : '' ?>" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Merk Barang</label>
                                <input type="text" class="form-control" name="merk" placeholder="merk barang"
                                       value="<?= (isset($data)) ? $data->merk : '' ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Tipe Barang</label>
                                <input type="text" class="form-control" name="tipe" placeholder="tipe barang"
                                       value="<?= (isset($data)) ? $data->tipe : '' ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Ukuran</label>
                                <input type="text" class="form-control" name="ukuran" placeholder="ukuran barang"
                                       value="<?= (isset($data)) ? $data->ukuran : '' ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Satuan</label>
                                <input type="text" class="form-control" name="satuan" placeholder="satuan barang"
                                       value="<?= (isset($data)) ? $data->satuan : '' ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">Harga Pasar</label>
                                <input type="number" class="form-control" name="hargaPasar" placeholder="harga pasar" value="<?= (isset($data)) ? $data->hargaPasar : '0' ?>" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">Biaya Kirim</label>
                                <input type="number" class="form-control" name="biayaKirim" placeholder="biaya kirim" value="<?= (isset($data)) ? $data->biayaKirim : '0' ?>" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">Resistensi</label>
                                <input type="number" class="form-control" name="resistensi" placeholder="resistensi" value="<?= (isset($data)) ? $data->resistensi : '0' ?>" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">PPN 10%</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><input type="checkbox" id="ppn" checked></span>
                                    <input type="number" class="form-control" name="ppn" placeholder="ppn" value="<?= (isset($data)) ? $data->ppn : '0' ?>" required readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Harga SHSB</label>
                                <input type="number" class="form-control" name="hargashsb" placeholder="harga shsb" value="<?= (isset($data)) ? $data->hargashsb : '0' ?>" required readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Keterangan Harga</label>
                                <input type="text" class="form-control" name="keterangan" placeholder="keterangan harga" value="<?= (isset($data)) ? $data->keterangan : '' ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="">Spesifikasi</label>
                                <textarea name="spesifikasi" class="form-control" id="spesifikasi"><?= (isset($data)) ? $data->spesifikasi : '' ?></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-fill btn-primary" type="submit">Simpan</button>
                                <button class="btn btn-fill btn-warning" type="reset">Reset</button>
                                <a href="<?=site_url('katalog')?>" class="btn btn-fill btn-default">Kembali</a>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="">Gambar</label>
                                <input type="file" name="gambar" placeholder="Upload Gambar" accept="image/*" style="margin-bottom: 1em">
                                <img id="img-preview" src="<?= base_url('assets/img/img-barang/' . cek_file((isset($data)) ? $data->gambar : '')) ?>" alt="gambar" style="width:180px;height:180px">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="header">
                <h4 class="title">Import Data Katalog</h4>
            </div>
            <div class="content">
                <a href="<?= base_url('assets/file/Import.xls') ?>" class="btn btn-primary">Download Template</a>
                <a href="<?= site_url('export/kategori') ?>" class="btn btn-primary">Download Daftar Kategori</a>
                <br/> <br/>
                <form action="<?php echo site_url('katalog/upload'); ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="control-label">Pilih File</label>
                            <div class="input-group">
                                <label class="input-group">
                                    <input id="file" name="import" type="file" accept="application/vnd.ms-excel">
                                </label>
                            </div>
                            <br/>
                            <input class="btn btn-primary" type="submit" value="Upload file"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="header">
                <h3 class="title">PENTING!</h3>
                <span class="category">Panduan upload file</span>
            </div>
            <div class="content">
                <p>
                    Mohon gunakan template yang sudah disediakan!<br/>
                    Untuk kolom kategori, silahkan download Daftar Kategori dan gunakan kode kategori saat proses
                    pengisian data yang akan di import.
                </p>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    ac_nama = <?=$autocomplete['nama']?>;
    ac_merk = <?=$autocomplete['merk']?>;
    ac_tipe = <?=$autocomplete['tipe']?>;
</script>

<?php
function cek_file($filename)
{
    if (!file_exists('./assets/img/img-barang/' . $filename) || $filename == '') {
        $filename = 'default.png';
    }
    return $filename;
}

?>