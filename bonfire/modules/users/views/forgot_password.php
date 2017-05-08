<div class="page-header">
    <h1><?php echo lang('us_reset_password'); ?></h1>
</div>

<?php if (validation_errors()) : ?>
    <div class="alert alert-danger fade in">
        <?php echo validation_errors(); ?>
    </div>
<?php endif; ?>

<div class="alert alert-info fade in">
    <?php echo lang('us_reset_note'); ?>
</div>

<div class="row">
    <div class="col-md-8 col-md-offset-2">

        <?php echo form_open($this->uri->uri_string(), array('class' => "form-horizontal", 'autocomplete' => 'off')); ?>

        <div class="form-group <?php echo iif(form_error('email'), ' has-error'); ?>">
            <label class="control-label required" for="email"><?php echo lang('bf_email'); ?></label>
            <input class="form-control" type="email" required name="email" id="email" value="<?php echo set_value('email') ?>"/>
        </div>

        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="send" value="<?php e(lang('us_send_password')); ?>"/>
        </div>

        <?php echo form_close(); ?>

    </div>
</div>
