<div class="admin-box">
    <p class="well"><?php echo lang('emailer_template_note'); ?></p>
    <?php echo form_open(SITE_AREA . '/settings/emailer/template'); ?>
    <fieldset>
        <legend><?php echo lang('emailer_header'); ?></legend>
        <div class="form-group">
            <div class="input">
                <textarea name="header" rows="15"
                          class="form-control"><?php echo htmlspecialchars_decode($this->load->view('email/_header', null, true)); ?></textarea>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend><?php echo lang('emailer_footer'); ?></legend>
        <div class="form-group">
            <div class="input">
                <textarea name="footer" rows="15"
                          class="form-control"><?php echo htmlspecialchars_decode($this->load->view('email/_footer', null, true)); ?></textarea>
            </div>
        </div>
    </fieldset>
    <fieldset class="form-group">
        <input type="submit" name="save" id="submit" class="btn btn-primary"
               value="<?php e(lang('emailer_save_template')); ?>"/>
        <?php echo ' ' . lang('bf_or') . ' ' . anchor(SITE_AREA . '/settings/emailer', lang('bf_action_cancel')); ?>
    </fieldset>
    <?php echo form_close(); ?>
</div>