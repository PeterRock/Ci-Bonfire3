<div class="admin-box">
    <h3><span><?php echo lang('logs_viewing'); ?></span> <?php echo $log_file_pretty; ?></h3>
    <?php if (empty($log_content)) : ?>
        <div class="alert alert-warning fade in">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            <?php echo lang('logs_not_found'); ?>
        </div>
    <?php else : ?>
    <div class='form-inline'>
        <div class='form-group'>
            <label for='filter' class='control-label'><?php echo lang('logs_filter_label'); ?></label>
            <select id="filter" class="form-control">
                <option value="all"><?php echo lang('logs_show_all_entries'); ?></option>
                <option value="error"><?php echo lang('logs_show_errors'); ?></option>
            </select>
        </div>
    </div>
    <p>
    <div id="log">
        <?php
        foreach ($log_content as $row) :
            // Log files start with PHP guard header
            if (strpos($row, '<?php') === 0) {
                continue;
            }

            // Log files usually contain an empty row after the guard header,
            // and any whitespace around the entry doesn't need to be output
            $row = trim($row);
            if (empty($row)) {
                continue;
            }

            $class = 'log-entry';
            if (strpos($row, 'ERROR') !== false) {
                $class .= ' alert-danger';
            } elseif (strpos($row, 'DEBUG') !== false) {
                $class .= ' alert-warning';
            }
            ?>
            <div class="<?php echo $class; ?>"><?php e($row); ?></div>
        <?php endforeach; ?>
    </div>
    <?php if ($canDelete) : ?>
</div>
<div class="admin-box">
    <h3><?php echo lang('logs_delete1_button') ?></h3>
    <?php echo form_open(site_url(SITE_AREA . '/developer/logs'), array('class' => 'form-horizontal')); ?>
    <div class="alert alert-warning fade in">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        <?php echo lang('logs_delete1_note'); ?>
    </div>
    <fieldset class="form-group">
        <input type="hidden" name="checked[]" value="<?php e($log_file); ?>"/>
        <div class="col-sm-12">
            <button type="submit" name="delete" class="btn btn-danger"
                    onclick="return confirm('<?php e(js_escape(lang('logs_delete_confirm'))) ?>')"><span
                        class="glyphicon glyphicon-trash glyphicon-white"></span>&nbsp;<?php echo lang('logs_delete1_button'); ?>
            </button>
        </div>
    </fieldset>
    <?php
    echo form_close();
    endif;
    endif;
    ?>
</div>