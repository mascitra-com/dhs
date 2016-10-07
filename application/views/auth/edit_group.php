<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="header">
                <h4 class="title"><?php echo lang('edit_group_heading'); ?></h4>
                <p><?php echo lang('edit_group_subheading'); ?></p>
            </div>
            <div class="content">
                <div id="infoMessage"><?php echo $message; ?></div>

                <?php echo form_open(current_url()); ?>

                <p>
                    <?php echo lang('edit_group_name_label', 'group_name'); ?> <br/>
                    <?php echo form_input($group_name); ?>
                </p>

                <p>
                    <?php echo lang('edit_group_desc_label', 'description'); ?> <br/>
                    <?php echo form_input($group_description); ?>
                </p>
                <br/>
                <p>
                    <a class="btn btn-default btn-fill" href="javascript:goBack()">Kembali</a>
                    <?php echo form_submit('submit', lang('edit_group_submit_btn'), 'class="btn btn-info btn-fill pull-right"'); ?>
                </p>
                <div class="clearfix"></div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>