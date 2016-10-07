<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="header">
                <h4 class="title"><?php echo lang('create_group_heading'); ?></h4>
                <p><?php echo lang('create_group_subheading'); ?></p>
            </div>
            <div class="content">

                <?php echo form_open("auth/create_group"); ?>

                <p>
                    <?php echo lang('create_group_name_label', 'group_name'); ?> <br/>
                    <?php echo form_input($group_name); ?>
                </p>

                <p>
                    <?php echo lang('create_group_desc_label', 'description'); ?> <br/>
                    <?php echo form_input($description); ?>
                </p>

                <br/>
                <p>
                    <a class="btn btn-default btn-fill" href="javascript:goBack()">Kembali</a>
                    <?php echo form_submit('submit', lang('create_group_submit_btn'), 'class = "btn btn-info btn-fill pull-right"'); ?>
                </p>

                <?php echo form_close(); ?>
            </div>
        </div>
