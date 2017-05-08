<div class="page-header">
    <h1><?php echo lang('us_activate'); ?></h1>
</div>

<?php if (validation_errors()) : ?>
    <div class="alert alert-danger fade in">
        <?php echo validation_errors(); ?>
    </div>
<?php endif; ?>

<div class="alert alert-info fade in">
    <?php echo lang('us_user_activate_note'); ?>
</div>


<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <?php echo form_open($this->uri->uri_string(), array('class' => "form-horizontal", 'autocomplete' => 'off')); ?>

        <div class="form-group <?php echo iif(form_error('code'), 'error'); ?>">
            <label class="control-label" for="code"><?php echo lang('us_activate_code'); ?></label>
            <input type="text" id="code" class="form-control" required name="code"
                   value="<?php echo set_value('code') ?>"/>
        </div>

        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="activate"
                   value="<?php echo lang('us_confirm_activate_code') ?>"/>
        </div>

        <?php echo form_close(); ?>

    </div>
</div>
