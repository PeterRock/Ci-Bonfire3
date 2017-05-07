<?php if ($log_threshold == 0) : ?>
<div class="alert alert-warning fade in">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <?php e(lang('logs_not_enabled')); ?>
</div>
<?php
endif;
if (empty($logs) || ! is_array($logs)) :
?>
<div class="alert alert-info fade in notification">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <p><?php echo lang('logs_no_logs'); ?></p>
</div>
<?php else : ?>
<div class="admin-box container">
    <?php echo form_open(); ?>
        <table class="table table-striped logs">
            <thead>
                <tr>
                    <th class="column-check"><input class="check-all" type="checkbox" /></th>
                    <th class='date'><?php e(lang('logs_date')); ?></th>
                    <th><?php e(lang('logs_file')); ?></th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td colspan="3">
                        <?php echo lang('bf_with_selected'); ?>:
                        <input type="submit" name="delete" id="delete-me" class="btn btn-danger btn-sm" value="<?php echo lang('bf_action_delete'); ?>" onclick="return confirm('<?php e(js_escape(lang('logs_delete_confirm'))); ?>')" />
                    </td>
                </tr>
            </tfoot>
            <tbody>
                <?php
                foreach ($logs as $log) :
                    // Skip the index.html file.
                    if ($log == 'index.html') {
                        continue;
                    }
                ?>
                <tr>
                    <td class="column-check">
                        <input type="checkbox" value="<?php e($log); ?>" name="checked[]" />
                    </td>
                    <td class='date'>
                        <a href='<?php e(site_url(SITE_AREA . "/developer/logs/view/{$log}")); ?>'>
                            <?php e(date('F j, Y', strtotime(str_replace('.php', '', str_replace('log-', '', $log))))); ?>
                        </a>
                    </td>
                    <td><?php e($log); ?></td>
                </tr>
                <?php
                endforeach;
                ?>
            </tbody>
        </table>
    <?php
        echo form_close();
        echo $this->pagination->create_links();
    ?>
</div>
<!-- Purge? -->
<div class="admin-box container">
    <h3><?php echo lang('logs_delete_button'); ?></h3>
    <?php echo form_open(); ?>
        <div class="alert alert-warning fade in">
            <a class="close" data-dismiss="alert">&times;</a>
            <?php echo lang('logs_delete_note'); ?>
        </div>
        <fieldset class="form-group">
            <button type="submit" name="delete_all" class="btn btn-danger" onclick="return confirm('<?php e(js_escape(lang('logs_delete_all_confirm'))); ?>')">
                <span class="glyphicon-white glyphicon glyphicon-trash"></span>&nbsp;<?php echo lang('logs_delete_button'); ?>
            </button>
        </fieldset>
    <?php echo form_close(); ?>
</div>
<?php
endif;
