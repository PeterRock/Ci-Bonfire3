<?php

Assets::add_css(array('bootstrap.min.css', 'font-awesome.min.css' ), null, true);
Assets::add_css('jquery.datatables/datatables.min.css');

if (isset($shortcut_data) && is_array($shortcut_data['shortcut_keys'])) {
    Assets::add_js($this->load->view('ui/shortcut_keys', $shortcut_data, true), 'inline');
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php
        echo isset($toolbar_title) ? "{$toolbar_title} : " : '';
        e($this->settings_lib->item('site.title'));
        ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex"/>
    <?php
    /* Modernizr is loaded before CSS so CSS can utilize its features */
    ?>
    <script src="<?php echo js_path(); ?>modernizr-2.8.3.js"></script>
    <?php echo Assets::css(null, 'screen', TRUE); ?>
</head>
<body class="desktop">
<!--[if lt IE 7]>
<p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different
    browser</a> or
    <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.
</p>
<![endif]-->
<noscript>
    <p>Javascript is required to use Bonfire's admin.</p>
</noscript>
<nav class="navbar navbar-default navbar-inverse admin-top-navbar">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#main-top-navbar" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <?php
                echo anchor('/', html_escape($this->settings_lib->item('site.title')), 'class="navbar-brand"');
            ?>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="navbar-collapse collapse" id="main-top-navbar">
            <?php echo Contexts::render_menu('text', 'normal'); ?>
            <ul class="nav navbar-nav navbar-right" style="padding: 8px 0;" id="tb_email">
                <div class="btn-group">
                    <a href="<?php echo site_url('users/profile'); ?>" class="btn btn-default"
                       title="<?php echo lang('bf_user_settings'); ?>">
                        <?php
                        $userDisplayName = isset($current_user->display_name) && !empty($current_user->display_name) ? $current_user->display_name : ($this->settings_lib->item('auth.use_usernames') ? $current_user->username : $current_user->email);
                        echo $userDisplayName;
                        ?>
                    </a>
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu pull-right toolbar-profile">
                        <li>
                            <div class="inner">
                                <div class="toolbar-profile-img">
                                    <?php echo gravatar_link($current_user->email, 96, null, $userDisplayName); ?>
                                </div>

                                <div class="toolbar-profile-info">
                                    <p><strong><?php echo $userDisplayName; ?></strong><br/>
                                        <?php e($current_user->email); ?>
                                        <br/>
                                    </p>
                                    <a href="<?php echo site_url(SITE_AREA . '/settings/users/edit'); ?>"><?php echo lang('bf_user_settings'); ?></a>
                                    <a href="<?php echo site_url('logout'); ?>"><?php echo lang('bf_action_logout'); ?></a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <?php
                if (isset($shortcut_data) && is_array($shortcut_data['shortcuts'])
                    && is_array($shortcut_data['shortcut_keys']) && count($shortcut_data['shortcut_keys'])
                ) :
                    ?>
                    <!-- Shortcut Menu -->
                    <div class="btn-group">
                        <a class="dropdown-toggle btn btn-link" data-toggle="dropdown" href="#">
                            <i class="fa fa-keyboard-o"></i>
                        </a>
                        <ul class="dropdown-menu pull-right toolbar-keys">
                            <li>
                                <div class="container-fluid inner">
                                    <h4><?php echo lang('bf_keyboard_shortcuts'); ?></h4>
                                    <ul class="list-group">
                                        <?php foreach ($shortcut_data['shortcut_keys'] as $key => $data) : ?>
                                            <li class="list-group-item"><span><?php e($data); ?></span>
                                                : <?php echo $shortcut_data['shortcuts'][$key]['description']; ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                    <?php if (has_permission('Bonfire.UI.View') && has_permission('Bonfire.UI.Manage')): ?>
                                        <a href="<?php echo site_url(SITE_AREA . '/settings/ui'); ?>"><?php echo lang('bf_keyboard_shortcuts_edit'); ?></a>
                                    <?php endif; ?>
                                </div>
                            </li>
                        </ul>
                    </div>
                <?php endif; ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="subnav">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="navbar-header title">

                    <?php if (isset($toolbar_title)) : ?>
                        <h4><?php echo $toolbar_title; ?></h4>
                    <?php endif; ?>
                </div>
                <div class="subnav-menu list">
                    <?php Template::block('sub_nav', ''); ?>
                </div>
            </div>
        </div>
    </div>
</div>
