<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="header">
                <h4 class="title"><?php echo lang('edit_user_heading'); ?></h4>
                <p><?php echo lang('edit_user_subheading'); ?></p>
            </div>
            <div class="content">
                <?php echo form_open(uri_string()); ?>
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label><?php echo lang('edit_user_fname_label', 'first_name'); ?></label>
                            <?php echo form_input($first_name, '', array('class' => 'form-control')); ?>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <label><?php echo lang('edit_user_lname_label', 'last_name'); ?></label>
                            <?php echo form_input($last_name, '', array('class' => 'form-control')); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label><?php echo lang('edit_user_company_label', 'company'); ?></label>
                            <?php echo form_input($company, '', array('class' => 'form-control')); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label><?php echo lang('edit_user_phone_label', 'phone'); ?></label>
                            <?php echo form_input($phone, '', array('class' => 'form-control')); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label><?php echo lang('edit_user_password_label', 'password'); ?></label>
                            <?php echo form_input($password, '', array('class' => 'form-control')); ?>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <label><?php echo lang('edit_user_password_confirm_label', 'password_confirm'); ?></label>
                            <?php echo form_input($password_confirm, '', array('class' => 'form-control')); ?>
                        </div>
                    </div>
                </div>
                <?php if ($this->ion_auth->is_admin()): ?>
                    <h4><?php echo lang('edit_user_groups_heading'); ?></h4>
                    <?php foreach ($groups as $group): ?>
                        <?php
                        $gID = $group['id'];
                        $checked = null;
                        $item = null;
                        foreach ($currentGroups as $grp) {
                            if ($gID == $grp->id) {
                                $checked = ' checked="checked"';
                                break;
                            }
                        }
                        ?>
                        <input type="checkbox" name="groups[]"
                               value="<?php echo $group['id']; ?>"<?php echo $checked; ?>>
                        <?php echo htmlspecialchars($group['name'], ENT_QUOTES, 'UTF-8'); ?>
                        </label>
                    <?php endforeach ?>

                <?php endif ?>

                <?php echo form_hidden('id', $user->id); ?>
                <?php echo form_hidden($csrf); ?><br/>
                <br/>
                <?php echo form_submit('submit', lang('edit_user_submit_btn'), array('class' => "btn btn-info btn-fill")); ?>
                <a class="btn btn-default btn-fill" href="javascript:goBack()">Kembali</a>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-user">
            <div class="image">
                <img
                    src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400"
                    alt="..."/>
            </div>
            <div class="content">
                <div class="author">
                    <div>
                        <img class="avatar border-gray" src="<?= base_url('assets/img/avatar.png') ?>" alt="..."/>

                        <h4 class="title"><?= $user->first_name ?> <?= $user->last_name ?><br/>
                            <a href="mailto:<?= $user->email ?>?Subject=Kepada%20Yth.%20<?= $user->first_name ?> <?= $user->last_name ?> E-Katalog DHS Lumajang">
                                <small><?= $user->email ?></small>
                            </a>
                        </h4>
                    </div>
                </div>
            </div>
            <hr>
            <div class="text-center">
                <button href="#" class="btn btn-simple"><i class="fa fa-facebook-square"></i></button>
                <button href="#" class="btn btn-simple"><i class="fa fa-twitter"></i></button>
                <button href="#" class="btn btn-simple"><i class="fa fa-google-plus-square"></i></button>
            </div>
        </div>
    </div>
</div>
