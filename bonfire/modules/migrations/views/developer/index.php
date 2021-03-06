<div class="admin-box">
    <p class="well"><?php echo lang('migrations_intro'); ?></p>
    <ul class="nav nav-tabs">
        <li class="active"><a href="#app-tab" data-toggle="tab"><?php echo lang('migrations_tab_app'); ?></a></li>
        <li><a href="#mod-tab" data-toggle="tab"><?php echo lang('migrations_tab_mod'); ?></a></li>
        <li><a href="#core-tab" data-toggle="tab"><?php echo lang('migrations_tab_core'); ?></a></li>
    </ul>
    <div class="tab-content">
        <!-- Application Migrations -->
        <div class="tab-pane active" id="app-tab">
            <?php echo form_open($this->uri->uri_string(), 'class="constrained"'); ?>
            <fieldset>
                <legend><?php echo lang('migrations_app_migrations'); ?></legend>
                <div class="alert alert-info fade in">
                    <a class="close" data-dismiss="alert">&times;</a>
                    <?php echo sprintf(lang('migrations_installed_version'), $installed_version); ?> /
                    <?php echo sprintf(lang('migrations_latest_version'), $latest_version); ?>
                </div>
                <?php if (count($app_migrations)) : ?>
                <input type="hidden" name="core_only" value="0"/>
                <label class='col-sm-2 control-label'
                       for='app_migration'><?php echo lang('migrations_choose_migration'); ?></label>
                <select name="migration" id='app_migration' class="col-sm-10">
                    <?php foreach ($app_migrations as $migration) : ?>
                        <option value="<?php echo (int)substr($migration, 0, 3); ?>" <?php echo ((int)substr($migration, 0, 3) == $this->uri->segment(5)) ? 'selected="selected"' : ''; ?>><?php echo $migration; ?></option>
                    <?php endforeach; ?>
                </select>
            </fieldset>
            <fieldset class="form-group">
                <input type="submit" name="migrate" value="<?php echo lang('migrations_migrate_button'); ?>"/>
                <?php
                echo ' ' . lang('bf_or') . ' ' . anchor(SITE_AREA . '/developer/migrations', lang('bf_action_cancel'), 'class="btn btn-default"');
                else :
                    ?>
                    <div class="alert alert-warning fade in">
                        <a class="close" data-dismiss="alert">&times;</a>
                        <?php echo lang('migrations_no_migrations'); ?>
                    </div>
                <?php endif; ?>
            </fieldset>
            <?php echo form_close(); ?>
        </div>
        <!-- Module Migrations -->
        <div id="mod-tab" class="tab-pane">
            <fieldset>
                <legend><?php echo lang('migrations_mod_migrations'); ?></legend>
                <?php if (isset($mod_migrations) && is_array($mod_migrations)) : ?>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="module-name"><?php e(lang('migrations_tbl_module')); ?></th>
                            <th class='version'><?php e(lang('migrations_tbl_installed_ver')); ?></th>
                            <th class='version'><?php e(lang('migrations_tbl_latest_ver')); ?></th>
                            <th class='migrate'><?php e(lang('migrations_migrate_module')); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($mod_migrations as $module => $migrations) : ?>
                            <tr>
                                <td><?php echo ucfirst($module); ?></td>
                                <td><?php echo $migrations['installed_version']; ?></td>
                                <td><?php echo $migrations['latest_version']; ?></td>
                                <td class='migrate'>
                                    <?php echo form_open(site_url(SITE_AREA . "/developer/migrations/migrate_module/{$module}"), 'class="form-inline"'); ?>
                                    <input type="hidden" name="is_module" value="1"/>
                                    <select name="version" class="form-control">
                                        <option value=""><?php echo lang('migrations_choose_migration'); ?></option>
                                        <option value="uninstall"><?php echo lang('migrations_uninstall'); ?></option>
                                        <?php
                                        foreach ($migrations as $migration) :
                                            if (is_array($migration)) :
                                                foreach ($migration as $filename) :
                                                    ?>
                                                    <option><?php echo $filename; ?></option>
                                                    <?php
                                                endforeach;
                                            endif;
                                        endforeach;
                                        ?>
                                    </select>
                                    <input type="submit" name="migrate" class="btn btn-primary"
                                           value="<?php echo lang('migrations_migrate_module'); ?>"/>
                                    <?php echo form_close(); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <div class="alert alert-info fade in">
                        <a class="close" data-dismiss="alert">&times;</a>
                        <?php echo lang('migrations_no_migrations') ?>
                    </div>
                <?php endif; ?>
            </fieldset>
        </div>
        <!-- Bonfire Migrations -->
        <div id="core-tab" class="tab-pane">
            <?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
            <fieldset>
                <legend><?php echo lang('migrations_core_migrations'); ?></legend>
                <div class="alert alert-info fade in">
                    <a class="close" data-dismiss="alert">&times;</a>
                    <?php echo sprintf(lang('migrations_installed_version'), $core_installed_version); ?> /
                    <?php echo sprintf(lang('migrations_latest_version'), $core_latest_version); ?>
                </div>
                <input type="hidden" name="core_only" value="1"/>
                <?php if (count($core_migrations)) : ?>
                <div class="form-group">
                    <label class="col-sm-2 control-label"
                           for="migration"><?php echo lang('migrations_choose_migration'); ?></label>
                    <div class="col-sm-10">
                        <select name="migration" id="migration" class="form-control">
                            <option value=""></option>
                            <?php foreach ($core_migrations as $migration) : ?>
                                <option value="<?php echo (int)substr($migration, 0, 3) ?>" <?php echo ((int)substr($migration, 0, 3) == $this->uri->segment(5)) ? 'selected="selected"' : '' ?>><?php echo $migration ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </fieldset>
            <fieldset class='form-group'>
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" name="migrate" class="btn btn-primary"
                           value="<?php echo lang('migrations_migrate_button'); ?>"/>
                    <?php
                    echo ' ' . lang('bf_or') . ' ' . anchor(SITE_AREA . '/developer/migrations', lang('bf_action_cancel'), 'class="btn btn-default"');
                    else:
                        ?>
                        <div class="alert alert-warning fade in">
                            <a class="close" data-dismiss="alert">&times;</a>
                            <?php echo lang('migrations_no_migrations'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </fieldset>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>