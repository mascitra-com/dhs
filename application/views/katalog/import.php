<div class="row" xmlns="http://www.w3.org/1999/html">
    <div class="col-md-8">
        <div class="card">
            <div class="header">
                <h4 class="title">Import Data Katalog</h4>
                <p>Mohon gunakan template yang sudah disediakan!</p>
            </div>
            <div class="content">
                <a href="<?=base_url('assets/file/import.xls')?>" class="btn btn-primary">Download Template</a>
                <br/> <br/>
                <form action="<?php echo site_url('katalog/upload'); ?>" method="post" enctype="multipart/form-data">
                    <label class="control-label">Pilih File</label>
                    <div class="input-group">
                        <label class="input-group-btn">
                    <span class="btn btn-primary">
                        Browse&hellip; <input id="file" name="file" type="file" class="file-loading"
                                              accept="application/vnd.ms-excel" style="display: none">
                    </span>
                        </label>
                        <input type="text" class="form-control" readonly>
                    </div>
                    <br/>
                    <input class="btn btn-primary" type="submit" value="Upload file"/>
                </form>
            </div>
        </div>
    </div>
</div>