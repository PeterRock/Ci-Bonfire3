<?php

$hasPermissionDeleteDate = isset($hasPermissionDeleteDate) ? $hasPermissionDeleteDate : false;
$hasPermissionDeleteModule = isset($hasPermissionDeleteModule) ? $hasPermissionDeleteModule : false;
$hasPermissionDeleteUser = isset($hasPermissionDeleteUser) ? $hasPermissionDeleteUser : false;

$activitiesReportsPage = SITE_AREA . '/reports/activities';
$activitiesReportsUrl = site_url($activitiesReportsPage);

?>
    <style>
        .row.icons .media {
            margin-bottom: 10px;
        }

        td.button-column {
            text-align: right;
        }
    </style>
    <div class="admin-box container">
        <div class="row icons">
            <?php if ($hasPermissionViewOwn) : ?>
                <div class="col-md-3 col-sm-6">
                    <div class="media">
                        <div class="media-left">
                            <a href='<?php echo "{$activitiesReportsUrl}/{$pages['own']}"; ?>'>
                                <span class="media-object"><i class="fa fa-user-circle fa-2x text-muted"></i></span>
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><?php echo lang(str_replace('activity_', 'activities_', $pages['own'])); ?></h4>
                            <?php echo lang(str_replace('activity_', 'activities_', "{$pages['own']}_description")); ?>
                        </div>
                    </div>
                </div>
                <?php
            endif;
            if ($hasPermissionViewUser) :
                ?>
                <div class="col-md-3 col-sm-6">
                    <div class="media">
                        <div class="media-left">
                            <a href='<?php echo "{$activitiesReportsUrl}/{$pages['user']}"; ?>'>
                                <span class="media-object"><i class="fa fa-users fa-2x text-muted"></i></span>
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><?php echo lang(str_replace('activity_', 'activities_', $pages['user'] . 's')); ?></h4>
                            <?php echo lang(str_replace('activity_', 'activities_', "{$pages['user']}s_description")); ?>
                        </div>
                    </div>
                </div>
                <?php
            endif;
            if ($hasPermissionViewModule) :
                ?>
                <div class="col-md-3 col-sm-6">
                    <div class="media">
                        <div class="media-left">
                            <a href='<?php echo "{$activitiesReportsUrl}/{$pages['module']}"; ?>'>
                                <span class="media-object"><i class="fa fa-puzzle-piece fa-2x text-muted"></i></span>
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><?php echo lang(str_replace('activity_', 'activities_', $pages['module'])); ?></h4>
                            <?php echo lang(str_replace('activity_', 'activities_', "{$pages['module']}_description")); ?>
                        </div>
                    </div>
                </div>
                <?php
            endif;
            if ($hasPermissionViewDate) :
                ?>
                <div class="col-md-3 col-sm-6">
                    <div class="media">
                        <div class="media-left">
                            <a href='<?php echo "{$activitiesReportsUrl}/{$pages['date']}"; ?>'>
                                <span class="media-object"><i class="fa fa-calendar fa-2x text-muted"></i></span>
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><?php echo lang(str_replace('activity_', 'activities_', $pages['date'])); ?></h4>
                            <?php echo lang(str_replace('activity_', 'activities_', "{$pages['date']}_description")); ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <!-- Active Modules -->
                <h3><?php echo lang('activities_top_modules'); ?></h3>
                <?php if (empty($top_modules) || !is_array($top_modules)) : ?>
                    <p><?php echo lang('activities_no_top_modules'); ?></p>
                <?php else : ?>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th><?php echo lang(str_replace('activity_', 'activities_', $pages['module'])); ?></th>
                            <th><?php echo lang('activities_logged'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($top_modules as $topModule) : ?>
                            <tr>
                                <td><strong><?php echo ucwords($topModule->module); ?></strong></td>
                                <td><?php echo $topModule->activity_count; ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
            <div class="col-sm-6">
                <!-- Active Users -->
                <h3><?php echo lang('activities_top_users'); ?></h3>
                <?php if (empty($top_users) || !is_array($top_users)) : ?>
                    <p><?php echo lang('activities_no_top_users'); ?></p>
                <?php else : ?>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th><?php echo lang(str_replace('activity_', 'activities_', $pages['user'])); ?></th>
                            <th><?php echo lang('activities_logged'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($top_users as $topUser) : ?>
                            <tr>
                                <td>
                                    <strong><?php e($topUser->username == '' ? lang('activities_username_not_found') : $topUser->username); ?></strong>
                                </td>
                                <td><?php echo $topUser->activity_count; ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>
    </div>

<?php
if ($hasPermissionDeleteOwn
    || $hasPermissionDeleteUser
    || $hasPermissionDeleteModule
    || $hasPermissionDeleteDate
) :
    ?>
    <div class="admin-box container">
        <h3><?php echo lang('activities_cleanup'); ?></h3>
        <table class="table table-striped">
            <tbody>
            <?php if ($hasPermissionDeleteOwn) : ?>
                <tr>
                    <?php echo form_open("{$activitiesReportsPage}/delete", array('id' => 'activity_own_form', 'class' => 'form-inline')); ?>
                    <td class='label-column'><label
                                for="activity_own_select"><?php echo lang('activities_delete_own_note'); ?></label></td>
                    <td>
                        <input type="hidden" name="action" value="activity_own"/>
                        <select name="which" id="activity_own_select" class="form-control col-sm-2">
                            <option value="<?php echo $current_user->id; ?>"><?php e($current_user->username); ?></option>
                        </select>
                    </td>
                    <td class='button-column'>
                        <button type="button" class="btn btn-danger" id="delete-activity_own">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                    <?php echo form_close(); ?>
                </tr>
                <?php
            endif;
            if ($hasPermissionDeleteUser) :
                ?>
                <tr>
                    <?php echo form_open("{$activitiesReportsPage}/delete", array('id' => 'activity_user_form', 'class' => 'form-inline')); ?>
                    <td class='label-column'>
                        <label for="activity_user_select"><?php echo lang('activities_delete_user_note'); ?></label>
                    </td>
                    <td>
                        <input type="hidden" name="action" value="activity_user"/>
                        <select name="which" id="activity_user_select" class="form-control">
                            <option value="all"><?php echo lang('activities_all_users'); ?></option>
                            <?php foreach ($users as $au) : ?>
                                <option value="<?php echo $au->id; ?>"><?php e($au->username); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td class='button-column'>
                        <button type="button" class="btn btn-danger" id="delete-activity_user">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                    <?php echo form_close(); ?>
                </tr>
                <?php
            endif;

            if ($hasPermissionDeleteModule) :
                ?>
                <tr>
                    <?php echo form_open("{$activitiesReportsPage}/delete", array('id' => 'activity_module_form', 'class' => 'form-inline')); ?>
                    <td class='label-column'>
                        <label for="activity_module_select"><?php echo lang('activities_delete_module_note'); ?></label>
                    </td>
                    <td>
                        <input type="hidden" name="action" value="activity_module"/>
                        <select name="which" id="activity_module_select" class="form-control">
                            <option value="all"><?php echo lang('activities_all_modules'); ?></option>
                            <option value="core"><?php echo lang('activities_core'); ?></option>
                            <?php foreach ($modules as $mod) : ?>
                                <option value="<?php echo $mod; ?>"><?php echo $mod; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td class='button-column'>
                        <button type="button" class="btn btn-danger" id="delete-activity_module">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                    <?php echo form_close(); ?>
                </tr>
                <?php
            endif;

            if ($hasPermissionDeleteDate) :
                ?>
                <tr>
                    <?php echo form_open("{$activitiesReportsPage}/delete", array('id' => 'activity_date_form', 'class' => 'form-inline')); ?>
                    <td class='label-column'>
                        <label for="activity_date_select"><?php echo lang('activities_delete_date_note'); ?></label>
                    </td>
                    <td>
                        <input type="hidden" name="action" value="activity_date"/>
                        <select name="which" id="activity_date_select" class="form-control">
                            <option value="all"><?php echo lang('activities_all_dates'); ?></option>
                            <?php foreach ($activities as $activity) : ?>
                                <option value="<?php echo $activity->activity_id; ?>"><?php echo $activity->created_on; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td class='button-column'>
                        <button type="button" class="btn btn-danger" id="delete-activity_date">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                    <?php echo form_close(); ?>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
    <?php
endif;
