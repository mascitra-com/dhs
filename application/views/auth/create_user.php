<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="header">
                <h4 class="title"><?php echo lang('create_user_heading'); ?></h4>
                <p><?php echo lang('create_user_subheading'); ?></p>
            </div>
            <div class="content">

                <div id="infoMessage"><?php echo $message; ?></div>

                <?php echo form_open("auth/create_user"); ?>

                <div>
                    <?php echo lang('create_user_fname_label', 'first_name'); ?> <br/>
                    <?php echo form_input($first_name); ?>
                </div>

                <div>
                    <?php echo lang('create_user_lname_label', 'last_name'); ?> <br/>
                    <?php echo form_input($last_name); ?>
                </div>

                <?php
                if ($identity_column !== 'email') {
                    echo '<p>';
                    echo lang('create_user_identity_label', 'identity');
                    echo '<br />';
                    echo form_error('identity');
                    echo form_input($identity);
                    echo '</p>';
                }
                ?>

                <div>
                    <?php echo lang('create_user_company_label', 'company'); ?> <br/>
                    <?php echo form_input($company); ?>
                </div>

                <div>
                    <?php echo lang('create_user_email_label', 'email'); ?> <br/>
                    <?php echo form_input($email); ?>
                </div>

                <div>
                    <?php echo lang('create_user_phone_label', 'phone'); ?> <br/>
                    <?php echo form_input($phone); ?>
                </div>

                <div>
                    <?php echo lang('create_user_password_label', 'password'); ?> <br/>
                    <?php echo form_input($password); ?>
                </div>

                <div>
                    <?php echo lang('create_user_password_confirm_label', 'password_confirm'); ?> <br/>
                    <?php echo form_input($password_confirm); ?>
                </div>

                <br/>
                <p>
                    <a class="btn btn-default btn-fill" href="javascript:goBack()">Kembali</a>
                    <?php echo form_submit('submit', lang('create_user_submit_btn'), 'class = "btn btn-info btn-fill pull-right"'); ?>
                </p>
                <div class="clearfix"></div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>