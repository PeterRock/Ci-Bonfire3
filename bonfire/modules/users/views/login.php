<?php
$site_open = $this->settings_lib->item('auth.allow_register');
?>
<p>
    <br/><a href="<?php echo site_url(); ?>">&larr; <?php echo lang('us_back_to') . $this->settings_lib->item('site.title'); ?></a>
</p>

<div id="login" class="center-block">
    <h2><?php echo lang('us_login'); ?></h2>

    <?php echo Template::message(); ?>

    <?php
    if (validation_errors()) :
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger fade in">
                    <a data-dismiss="alert" class="close">&times;</a>
                    <?php echo validation_errors(); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php echo form_open(LOGIN_URL, array('autocomplete' => 'off')); ?>

    <div class="form-group <?php echo iif(form_error('login'), 'error'); ?>">
        <input class="form-control" type="text" name="login" id="login_value" value="<?php echo set_value('login'); ?>"
               tabindex="1"
               placeholder="<?php echo $this->settings_lib->item('auth.login_type') == 'both' ? lang('bf_username') . '/' . lang('bf_email') : ucwords($this->settings_lib->item('auth.login_type')) ?>"/>
    </div>

    <div class="form-group <?php echo iif(form_error('password'), 'error'); ?>">
        <div class="controls">
            <input class="form-control" type="password" name="password" id="password" value="" tabindex="2"
                   placeholder="<?php echo lang('bf_password'); ?>"/>
        </div>
    </div>

    <?php if ($this->settings_lib->item('auth.allow_remember')) : ?>
        <div class="checkbox">
            <label for="remember_me">
                <input type="checkbox" name="remember_me" id="remember_me" value="1" tabindex="3"/>
                <?php echo lang('us_remember_note'); ?>
            </label>
        </div>
    <?php endif; ?>

    <div class="form-group">
        <input class="btn btn-primary form-control" type="submit" name="log-me-in" id="submit"
               value="<?php e(lang('us_let_me_in')); ?>" tabindex="5"/>
    </div>
    <?php echo form_close(); ?>

    <?php // show for Email Activation (1) only
    if ($this->settings_lib->item('auth.user_activation_method') == 1) : ?>
        <!-- Activation Block -->
        <p class="well">
            <?php echo lang('bf_login_activate_title'); ?><br/>
            <?php
            $activate_str = str_replace('[ACCOUNT_ACTIVATE_URL]', anchor('/activate', lang('bf_activate')), lang('bf_login_activate_email'));
            $activate_str = str_replace('[ACTIVATE_RESEND_URL]', anchor('/resend_activation', lang('bf_activate_resend')), $activate_str);
            echo $activate_str; ?>
        </p>
    <?php endif; ?>

    <p class="text-center">
        <?php if ($site_open) : ?>
            <?php echo anchor(REGISTER_URL, lang('us_sign_up'), 'class="btn btn-link"'); ?>
        <?php endif; ?>

        <br/>
        <?php echo anchor('/forgot_password', lang('us_forgot_your_password'), 'class="btn btn-link"'); ?>
    </p>

</div>