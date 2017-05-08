<div class='admin-box drop-table'>
    <h3><?php echo lang('database_drop_title'); ?></h3>
    <?php if (empty($tables) || !is_array($tables)) : ?>
        <div class="alert alert-danger">
            <?php echo lang('database_drop_none'); ?>
        </div>
        <?php
    else :
        echo form_open(SITE_AREA . '/developer/database/drop');
        ?>
        <h4><?php echo lang('database_drop_confirm'); ?></h4>
        <ol>
            <?php foreach ($tables as $table) : ?>
                <li><?php e($table); ?>
                    <input type="hidden" name="tables[]" value="<?php e($table); ?>"/>
                </li>
            <?php endforeach; ?>
        </ol>
        <div class="alert alert-danger">
            <?php echo lang('database_drop_attention'); ?>
        </div>
        <fieldset class="form-group">
            <button type="submit" name="drop" class="btn btn-danger"><?php e(lang('database_drop_button')); ?></button>
            <?php echo ' ' . lang('bf_or') . ' ' . anchor(SITE_AREA . '/developer/database', lang('bf_action_cancel'), 'class="btn btn-default"'); ?>
        </fieldset>
        <?php
        echo form_close();
    endif;
    ?>
</div>