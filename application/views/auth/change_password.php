<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="header">
                <h4 class="title"><?php echo lang('change_password_heading'); ?></h4>
            </div>
            <div class="content">
                <?php echo form_open("auth/change_password"); ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="old_password">Password Lama</label>
                            <input type="password" name="old" id="old" class="form-control" placeholder="Password Lama"
                                   value="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="new_password">Password Baru</label>
                            <input type="password" name="new" id="new" class="form-control" placeholder="Password Baru"
                                   pattern="^.{8}.*$" value="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="new_password_confirm">Konfirmasi Password Baru</label>
                            <input type="password" name="new_confirm" id="new_confirm" class="form-control"
                                   placeholder="Konfirmasi Password Baru" pattern="^.{8}.*$" value="">
                        </div>
                    </div>
                </div>
                <?php echo form_input($user_id); ?>
                <a class="btn btn-default btn-fill" href="javascript:goBack()">Kembali</a>
                <button type="submit" class="btn btn-info btn-fill pull-right">Simpan Profil</button>
                <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>