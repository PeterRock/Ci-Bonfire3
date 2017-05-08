<div class="admin-box container backup">
    <?php if (validation_errors()) : ?>
        <div class="alert alert-block alert-danger fade in">
            <a class="close" data-dismiss="alert">&times;</a>
            <h4 class='alert-heading'><?php echo lang('database_validation_errors_heading'); ?></h4>
            <p><?php echo validation_errors(); ?></p>
        </div>
        <?php
    endif;
    if (empty($tables) || !is_array($tables)) :
        ?>
        <div class="alert alert-danger">
            <p><?php echo lang('database_backup_no_tables'); ?></p>
        </div>
        <?php
    else :
        echo form_open(SITE_AREA . '/developer/database/backup', 'class="form-horizontal"');
        ?>
        <fieldset>
            <?php foreach ($tables as $table) : ?>
                <input type="hidden" name="tables[]" value="<?php e($table); ?>"/>
            <?php endforeach; ?>
            <div class="alert alert-info">
                <p><?php echo lang('database_backup_warning'); ?></p>
            </div>
            <div class="form-group<?php echo form_error('file_name') ? ' has-error' : ''; ?>">
                <label for="file_name" class="col-sm-2 control-label"><?php echo lang('database_filename'); ?></label>
                <div class="col-sm-10">
                    <input type="text" name="file_name" id="file_name" class="form-control"
                           value="<?php echo set_value('file_name', empty($file) ? '' : $file); ?>"/>
                    <span class="help-block"><?php echo form_error('file_name'); ?></span>
                </div>
            </div>
            <div class="form-group<?php echo form_error('drop_tables') ? ' has-error' : ''; ?>">
                <label for="drop_tables"
                       class="col-sm-2 control-label"><?php echo lang('database_drop_question'); ?></label>
                <div class="col-sm-10">
                    <select name="drop_tables" id="drop_tables" class="form-control">
                        <option value="0" <?php echo set_select('drop_tables', '0'); ?>><?php echo lang('bf_no'); ?></option>
                        <option value="1" <?php echo set_select('drop_tables', '1'); ?>><?php echo lang('bf_yes'); ?></option>
                    </select>
                    <span class="help-block"><?php echo form_error('drop_tables'); ?></span>
                </div>
            </div>
            <div class="form-group<?php echo form_error('add_inserts') ? ' has-error' : ''; ?>">
                <label for="add_inserts"
                       class="col-sm-2 control-label"><?php echo lang('database_insert_question'); ?></label>
                <div class="col-sm-10">
                    <select name="add_inserts" id="add_inserts" class="form-control">
                        <option value="0" <?php echo set_select('add_inserts', '0'); ?>><?php echo lang('bf_no'); ?></option>
                        <option value="1" <?php echo set_select('add_inserts', '1', true); ?>><?php echo lang('bf_yes'); ?></option>
                    </select>
                    <span class="help-block"><?php echo form_error('add_inserts'); ?></span>
                </div>
            </div>
            <div class="form-group<?php echo form_error('file_type') ? ' has-error' : ''; ?>">
                <label for="file_type"
                       class="col-sm-2 control-label"><?php echo lang('database_compress_question'); ?></label>
                <div class="col-sm-10">
                    <select name="file_type" id="file_type" class="form-control">
                        <option value="txt" <?php echo set_select('file_type', 'txt', true); ?>><?php echo lang('bf_none'); ?></option>
                        <option value="gzip" <?php echo set_select('file_type', 'gzip'); ?>><?php echo lang('database_gzip'); ?></option>
                        <option value="zip" <?php echo set_select('file_type', 'zip'); ?>><?php echo lang('database_zip'); ?></option>
                    </select>
                    <span class="help-block"><?php echo form_error('file_type'); ?></span>

                    <div class="alert alert-warning">
                        <?php echo lang('database_restore_note'); ?>
                    </div>
                </div>
            </div>
            <div class="small form-group<?php echo form_error('tables') ? ' has-error' : ''; ?>">
                <label class="col-sm-2 control-label"
                       for='table_names'><?php echo lang('database_backup_tables'); ?></label>
                <div id='table_names' class='col-sm-10'>
                    <span class='form-control uneditable-input'><?php e(implode(', ', $tables)); ?></span>
                </div>
            </div>
        </fieldset>
        <fieldset class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" name="backup"
                        class="btn btn-primary"><?php echo lang('database_backup'); ?></button>
                <?php echo ' ' . lang('bf_or') . ' ' . anchor(SITE_AREA . '/developer/database', lang('bf_action_cancel')); ?>
            </div>
        </fieldset>
        <?php
        echo form_close();
    endif;
    ?>
</div>