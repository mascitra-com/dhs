<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link rel="icon" type="image/png" href="<?= base_url() ?>assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <title><?= $title ?></title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>

    <!-- Bootstrap core CSS     -->
    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet"/>
    <!-- Animation library for notifications   -->
    <link href="<?= base_url() ?>assets/css/animate.min.css" rel="stylesheet"/>

    <link rel="stylesheet" href="<?= base_url() ?>assets/css/kustom.css">
</head>
<body>
<div class="login-body">
    <article class="container-login center-block">
        <section>
            <ul id="top-bar" class="nav nav-tabs nav-justified">
                <li class="active"><a href="#"><?php echo lang('login_heading'); ?></a></li>
            </ul>
            <div class="tab-content tabs-login col-lg-12 col-md-12 col-sm-12 cols-xs-12">
                <div id="login-access" class="tab-pane fade active in">
                    <h2><i class="glyphicon glyphicon-log-in"> </i> <?php echo lang('login_subheading'); ?></h2>
                    <br/>
                    <!--                    Message -->
                    <?php if (isset($message)): ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $message ?>
                        </div>
                    <?php endif; ?>
                    <!--                    End of Message -->
                    <form action="<?= site_url('auth/login'); ?>" method="post" accept-charset="utf-8"
                          autocomplete="off" role="form" class="form-horizontal">
                        <div class="form-group ">
                            <label for="login"
                                   class="sr-only">
                                <?php echo lang('login_identity_label', 'identity'); ?>
                            </label>
                            <?php echo form_input('identity', '', array('class' => 'form-control', 'id' => 'login_value', 'placeholder' => 'Email', 'tabIndex' => '1')); ?>
                        </div>
                        <div class="form-group ">
                            <label for="password"
                                   class="sr-only"><?php echo lang('login_password_label', 'password'); ?></label>
                            <?php echo form_password('password', '', array('class' => 'form-control', 'id' => 'password', 'placeholder' => 'Password', 'tabIndex' => '2')); ?>
                        </div>
                        <div class="checkbox">
                            <label class="control-label" for="remember_me">
                                <?php echo form_checkbox('remember', '1', FALSE, array('id' => 'remember', 'tabindex' => '3')); ?><?php echo lang('login_remember_label', 'remember'); ?>
                            </label>
                        </div>
                        <br/>
                        <div class="form-group ">
                            <?php echo form_submit('submit', lang('login_submit_btn'), array('class' => 'btn btn-lg btn-primary', 'tabindex' => '5')); ?>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </article>
</div>
</body>
</html>