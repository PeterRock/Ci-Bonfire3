<?php

$errorClass = isset($errorClass) ? $errorClass : ' error';
$showExtendedSettings = !empty($extended_settings);
if ($showExtendedSettings) {
    $defaultCountry = 'US';
    $defaultState = '';
    $countryFieldId = false;
    $stateFieldId = false;
}

if (validation_errors()) :
    ?>
    <div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        <?php echo validation_errors(); ?>
    </div>
<?php endif; ?>
<style>
    .tab-content.main-settings {
        padding-bottom: 9px;
        border-bottom: 1px solid #ddd;
    }

    #name-change-settings input {
        text-align: center;
    }

    #password_iterations {
        width: auto;
    }
</style>
<div class="admin-box">
    <?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
    <div class="table">
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="#main-settings" data-toggle="tab"><?php echo lang('set_tab_settings'); ?></a>
            </li>
            <li><a href="#security" data-toggle="tab"><?php echo lang('set_tab_security'); ?></a></li>
            <?php if ($showDeveloperTab) : ?>
                <li><a href="#developer" data-toggle="tab"><?php echo lang('set_tab_developer'); ?></a></li>
                <?php
            endif;
            if ($showExtendedSettings) :
                ?>
                <li><a href="#extended" data-toggle="tab"><?php echo lang('set_tab_extended'); ?></a></li>
            <?php endif; ?>
        </ul>
        <div class="tab-content main-settings">
            <div class="tab-pane active" id="main-settings">
                <?php Template::block('settingsMain', 'settings/settings/index/main', array('errorClass' => $errorClass)); ?>
            </div>
            <div class="tab-pane" id="security">
                <?php Template::block('settingsSecurity', 'settings/settings/index/security', array('errorClass' => $errorClass)); ?>
            </div>
            <?php if ($showDeveloperTab) : ?>
                <div class="tab-pane" id="developer">
                    <?php Template::block('settingsDeveloper', 'settings/settings/index/developer', array('errorClass' => $errorClass)); ?>
                </div>
                <?php
            endif;
            if ($showExtendedSettings) :
                ?>
                <div class='tab-pane' id='extended'>
                    <?php
                    Template::block(
                        'settingsExtended',
                        'settings/settings/index/extended',
                        array(
                            'errorClass' => $errorClass,
                            'extendedSettings' => $extended_settings,
                            'defaultCountry' => $defaultCountry,
                            'defaultState' => $defaultState,
                            'countryFieldId' => $countryFieldId,
                            'stateFieldId' => $stateFieldId,
                        )
                    );
                    ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <fieldset class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <input type="submit" name="save" class="btn btn-primary"
                   value="<?php echo lang('bf_action_save') . ' ' . lang('bf_context_settings'); ?>"/>
        </div>
    </fieldset>
    <?php echo form_close(); ?>
</div>