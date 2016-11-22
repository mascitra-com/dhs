<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title"><?php echo lang('index_heading'); ?></h4>
                <p><?php echo lang('index_subheading'); ?></p>
            </div>
            <div class="content">
                <table class="table">
                    <tr>
                        <th><?php echo lang('index_fname_th'); ?></th>
                        <th><?php echo lang('index_lname_th'); ?></th>
                        <th><?php echo lang('index_email_th'); ?></th>
                        <th><?php echo lang('index_groups_th'); ?></th>
                        <th><?php echo lang('index_status_th'); ?></th>
                        <th><?php echo lang('index_action_th'); ?></th>
                    </tr>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($user->first_name, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($user->last_name, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td>
                                <?php echo form_label(htmlspecialchars($user->groups[0]->name, ENT_QUOTES, 'UTF-8'), '', 'class="text text-info"'); ?>
                            </td>
                            <?php if ($user->id <> 1) { ?>
                                <?php if($user->id <> $this->ion_auth->get_user_id()){ ?>
                                <td><?php echo ($user->active) ? anchor("users/deactivate/" . $user->id, lang('index_active_link'), 'class = "alert alert-success"') : anchor("users/activate/" . $user->id, lang('index_inactive_link'), 'class = "alert alert-danger"'); ?></td>
                                <td><?php echo anchor("users/edit_user/" . $user->id, 'Edit', 'class="btn btn-sm btn-default"'); ?></td>
                            <?php } else {echo '<td></td><td></td>';}} else {
                                echo '<td></td><td></td>';
                            } ?>
                        </tr>
                    <?php endforeach; ?>
                </table>

                <p><?php echo anchor('users/create_user', lang('index_create_user_link'), 'class="text text-info"') ?>
            </div>
        </div>
    </div>
</div>