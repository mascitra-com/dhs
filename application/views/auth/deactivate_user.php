<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="header">
                <h4 class="title"><?php echo lang('deactivate_heading'); ?></h4>
                <p><?php echo sprintf(lang('deactivate_subheading'), $user->username); ?></p>
            </div>
            <div class="content">
                <?php echo form_open("auth/deactivate/" . $user->id); ?>

                <p>
                    <?php echo lang('deactivate_confirm_y_label', 'confirm'); ?>
                    <input type="radio" name="confirm" value="yes" checked="checked"/>
                    <?php echo lang('deactivate_confirm_n_label', 'confirm'); ?>
                    <input type="radio" name="confirm" value="no"/>
                </p>

                <?php echo form_hidden($csrf); ?>
                <?php echo form_hidden(array('id' => $user->id)); ?>

                <br/>
                <p>
                    <a class="btn btn-default btn-fill" href="javascript:goBack()">Kembali</a>
                    <?php echo form_submit('submit', lang('deactivate_submit_btn'), 'class = "btn btn-info btn-fill pull-right"'); ?>
                </p>

                <?php echo form_close(); ?></div>
        </div>
    </div>
</div>