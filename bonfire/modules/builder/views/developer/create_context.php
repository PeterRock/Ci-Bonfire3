<p class="well"><?php echo lang('mb_context_create_intro'); ?></p>
<div class="alert alert-warning">
    <?php echo lang('mb_context_create_intro_note'); ?>
</div>
<div class="admin-box">
    <?php if (validation_errors()) : ?>
        <div class="alert alert-danger">
            <a data-dismiss="alert" class="close">&times;</a>
            <h4 class="alert-heading"><?php echo lang('mb_form_errors'); ?></h4>
            <?php echo validation_errors(); ?>
        </div>
    <?php endif; ?>
    <?php echo form_open(current_url(), 'class="form-horizontal"'); ?>
    <fieldset>
        <div class="form-group<?php echo form_error('context_name') ? ' has-error' : ''; ?>">
            <label for="context_name" class="col-sm-2 control-label"><?php echo lang('mb_context_name'); ?></label>
            <div class="col-sm-10">
                <input type="text" name="context_name" id="context_name" class="form-control"
                       value="<?php echo settings_item('context_name'); ?>"/>
                <span class="help-block"><?php
                    echo form_error('context_name') ? form_error('context_name') . '<br />' : '';
                    echo lang('mb_context_name_help');
                    ?></span>
            </div>
        </div>
        <?php if (!empty($roles) && is_array($roles)) : ?>
            <div class="form-group">
                <label class="col-sm-2 control-label" id="roles_label"><?php echo lang('mb_roles_label'); ?></label>
                <div class="col-sm-10" aria-labelledby="roles_label" role="group">
                    <?php foreach ($roles as $role) : ?>
                        <div class="checkbox">
                            <label class="control-label" for="roles_<?php echo $role->role_id; ?>">
                                <input type="checkbox" name="roles[]" id="roles_<?php echo $role->role_id; ?>"
                                       value="<?php echo $role->role_id; ?>" <?php echo set_checkbox('roles[]', $role->role_id); ?> />
                                <?php echo $role->role_name; ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
        <?php
        /* TODO: Add this in later.
        <div class="form-group">
            <div class="controls">
                <label class="checkbox" for="migrate">
                    <input type="checkbox" name="migrate" id="migrate" value="1" <?php echo set_checkbox('migrate', '1'); ?> /> <?php echo lang('mb_context_migrate'); ?>
                </label>
            </div>
        </div>
        */
        ?>
    </fieldset>
    <fieldset class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <input type="submit" name="build" class="btn btn-primary" value="<?php echo lang('mb_context_submit'); ?>"/>
            <?php
            echo anchor(
                site_url(SITE_AREA . '/developer/builder'),
                '<span class="fa fa-ban"></span>&nbsp;' . htmlspecialchars(lang('bf_action_cancel')),
                array('class' => 'btn btn-default')
            );
            ?>
        </div>
    </fieldset>
    <?php echo form_close(); ?>
</div>