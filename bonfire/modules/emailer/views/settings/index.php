<div class="admin-box">
    <?php echo form_open(SITE_AREA . '/settings/emailer', 'class="form-horizontal"'); ?>
    <fieldset>
        <legend><?php echo lang('emailer_general_settings'); ?></legend>
        <div class="form-group<?php echo form_error('sender_email') ? ' has-error' : ''; ?>">
            <label class="col-sm-2 control-label" for="sender_email"><?php echo lang('emailer_system_email'); ?></label>
            <div class="col-sm-10">
                <input type="email" name="sender_email" id="sender_email" class="form-control"
                       value="<?php echo set_value('sender_email', $sender_email); ?>"/>
                <span class='help-block'><?php echo form_error('sender_email'); ?></span>
                <p class="help-block"><?php echo lang('emailer_system_email_note'); ?></p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="mailtype"><?php echo lang('emailer_email_type'); ?></label>
            <div class="col-sm-10">
                <select name="mailtype" id="mailtype" class="form-control">
                    <option value="text" <?php echo set_select('mailtype', 'text', $mailtype == 'text'); ?>><?php echo lang('emailer_mailtype_text'); ?></option>
                    <option value="html" <?php echo set_select('mailtype', 'html', $mailtype == 'html'); ?>><?php echo lang('emailer_mailtype_html'); ?></option>
                </select>
            </div>
        </div>
        <div class="form-group<?php echo form_error('protocol') ? ' has-error' : ''; ?>">
            <label class="col-sm-2 control-label" for="server_type"><?php echo lang('emailer_email_server'); ?></label>
            <div class="col-sm-10">
                <select name="protocol" id="server_type" class="form-control">
                    <option value='mail' <?php echo set_select('protocol', 'mail', $protocol == 'mail'); ?>><?php echo lang('emailer_protocol_mail'); ?></option>
                    <option value='sendmail' <?php echo set_select('protocol', 'sendmail', $protocol == 'sendmail'); ?>><?php echo lang('emailer_protocol_sendmail'); ?></option>
                    <option value='smtp' <?php echo set_select('protocol', 'smtp', $protocol == 'smtp'); ?>><?php echo lang('emailer_protocol_smtp'); ?></option>
                </select>
                <span class="help-block"><?php echo form_error('protocol'); ?></span>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend><?php echo lang('emailer_settings'); ?></legend>
        <?php /* PHP Mail */ ?>
        <div id="mail" class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <p class="well"><?php echo lang('emailer_settings_note'); ?></p>
            </div>
        </div>
        <?php /* Sendmail */ ?>
        <div id="sendmail" class='subsection'>
            <div class="form-group<?php echo form_error('mailpath') ? ' has-error' : ''; ?>">
                <label class="col-sm-2 control-label"
                       for="mailpath"><?php echo lang('emailer_sendmail_path'); ?></label>
                <div class="col-sm-10">
                    <input type="text" name="mailpath" id="mailpath" class="form-control"
                           value="<?php echo set_value('mailpath', $mailpath) ?>"/>
                    <span class="help-block"><?php echo form_error('mailpath'); ?></span>
                </div>
            </div>
        </div>
        <?php /* SMTP */ ?>
        <div id="smtp" class='subsection'>
            <div class="form-group<?php echo form_error('smtp_host') ? ' has-error' : ''; ?>">
                <label class="col-sm-2 control-label"
                       for="smtp_host"><?php echo lang('emailer_smtp_address'); ?></label>
                <div class="col-sm-10">
                    <input type="text" name="smtp_host" id="smtp_host" class="form-control"
                           value="<?php echo set_value('smtp_host', $smtp_host) ?>"/>
                    <span class="help-block"><?php echo form_error('smtp_host'); ?></span>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label"
                       for="smtp_user"><?php echo lang('emailer_smtp_username'); ?></label>
                <div class="col-sm-10">
                    <input type="text" name="smtp_user" id="smtp_user" class="form-control"
                           value="<?php echo set_value('smtp_user', $smtp_user) ?>"/>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label"
                       for="smtp_pass"><?php echo lang('emailer_smtp_password'); ?></label>
                <div class="col-sm-10">
                    <input type="password" name="smtp_pass" id="smtp_pass" class="form-control"
                           value="<?php echo set_value('smtp_pass', $smtp_pass) ?>"/>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="smtp_port"><?php echo lang('emailer_smtp_port'); ?></label>
                <div class="col-sm-10">
                    <input type="text" name="smtp_port" id="smtp_port" class="form-control"
                           value="<?php echo set_value('smtp_port', $smtp_port) ?>"/>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label"
                       for="smtp_timeout"><?php echo lang('emailer_smtp_timeout_secs'); ?></label>
                <div class="col-sm-10">
                    <input type="text" name="smtp_timeout" id="smtp_timeout" class="form-control"
                           value="<?php echo set_value('smtp_timeout', $smtp_timeout) ?>"/>
                </div>
            </div>
        </div>
    </fieldset>
    <fieldset class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <input type="submit" name="save" class="btn btn-primary"
                   value="<?php e(lang('emailer_save_settings')); ?>"/>
        </div>
    </fieldset>
    <?php echo form_close(); ?>
</div>
<?php /* Test Settings */ ?>
<div class="admin-box">
    <h3><?php echo lang('emailer_test_header'); ?></h3>
    <?php echo form_open(SITE_AREA . '/settings/emailer/test', array('class' => 'form-horizontal', 'id' => 'test-form')); ?>
    <fieldset>
        <legend><?php echo lang('emailer_test_settings') ?></legend>
        <div class='form-group'>
            <div class="col-sm-offset-2 col-sm-10">
                <p class="well"><?php echo lang('emailer_test_intro'); ?></p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="test-email"><?php echo lang('bf_email'); ?></label>
            <div class="col-sm-10">
                <input type="email" name="email" id="test-email" class="form-control"
                       value="<?php echo set_value('test_email', settings_item('site.system_email')); ?>"/>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" name="test" class="btn btn-primary"
                       value="<?php echo lang('emailer_test_button'); ?>"/>
            </div>
        </div>
    </fieldset>
    <?php echo form_close(); ?>
    <div id="test-ajax"></div>
</div>