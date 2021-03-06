<div class="page-header">
    <h1>Reset Your Password</h1>
</div>

<div class="alert alert-info fade in">
    <h4 class="alert-heading"><?php echo lang('us_reset_password_note'); ?></h4>
</div>


<?php if (validation_errors()) : ?>
    <div class="alert alert-danger fade in">
        <?php echo validation_errors(); ?>
    </div>
<?php endif; ?>

<div class="row">
    <div class="col-md-8 col-md-offset-2">

        <?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>

        <input type="hidden" name="user_id" value="<?php echo $user->id ?>"/>

        <div class="form-group <?php echo iif(form_error('password'), 'error'); ?>">
            <label class="control-label" for="password"><?php echo lang('bf_password'); ?></label>
            <input class="form-control" type="password" name="password" id="password" value=""
                   placeholder="Password...."/>
            <span class="help-block"><?php echo lang('us_password_mins'); ?></span>
        </div>

        <div class="form-group <?php echo iif(form_error('pass_confirm'), 'error'); ?>">
            <label class="control-label" for="pass_confirm"><?php echo lang('bf_password_confirm'); ?></label>
            <input class="form-control" type="password" name="pass_confirm" id="pass_confirm" value=""
                   placeholder="<?php echo lang('bf_password_confirm'); ?>"/>
        </div>

        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="set_password" id="submit"
                   value="<?php e(lang('us_set_password')); ?>"/>
        </div>

        <?php echo form_close(); ?>

    </div>
</div>
