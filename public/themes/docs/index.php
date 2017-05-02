<!doctype html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Docs - <?php e($this->settings_lib->item('site.title')); ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <?php
    $highlightScript = '$("pre code").each(function(i, e) {hljs.highlightBlock(e)});';

    Assets::add_js('bootstrap.min.js');
    Assets::add_js('highlight.min.js');
    Assets::add_js($highlightScript, 'inline');

    Assets::add_css('bootstrap.css');
    Assets::add_css('docs.css');
    Assets::add_css('highlight/github.css');
    echo Assets::css(null, 'screen', TRUE);
    ?>
</head>
<body style="padding-top: 70px;">

    <!-- Navbar -->
    <header class="navbar navbar-inverse navbar-fixed-top" role="banner">
        <div class="container">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="glyphicon-bar"></span>
                    <span class="glyphicon-bar"></span>
                    <span class="glyphicon-bar"></span>
                </button>
            </div>


            <div class="collapse navbar-collapse" id="main-nav-collapse">
                <ul class="nav navbar-left">
                    <?php if (config_item('docs.show_app_docs')) :?>
                    <li <?php echo check_segment(2, 'application') ?>>
                        <a href="<?php echo site_url('docs/application'); ?>"><?php echo lang('docs_title_application') ?></a>
                    </li>
                    <?php endif; ?>

                    <?php if (config_item('docs.show_dev_docs')) : ?>
                    <li <?php echo check_segment(2, 'developer') ?>>
                        <a href="<?php echo site_url('docs/developer'); ?>"><?php echo lang('docs_title_bonfire') ?></a>
                    </li>
                    <?php endif; ?>
                </ul>

                <!-- Search Form -->
                <?php echo form_open( site_url('docs/search'), 'class="navbar-form navbar-right"' ); ?>
                    <div class="form-group">
                        <input type="text" class="form-control" name="search_terms" placeholder="<?php echo lang('docs_search_for') ?>"/>
                    </div>
                    <input type="submit" name="submit" class="btn btn-default" value="<?php echo lang('docs_search') ?>">
                </form>
            </div>

        </div>
    </header>

    <!-- Content Area -->
    <div class="container">

        <?php echo Template::message(); ?>

        <div class="row">

            <div class="col-md-3 sidebar">
                <div class="inner">
                    <?php if (isset($sidebar)) : ?>
                        <?php echo $sidebar; ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-md-9 main">
                <div class="inner">
                    <?php echo Template::content(); ?>
                </div>
            </div>

        </div>

    </div>

    <?php echo Assets::js("jquery-1.12.4.min.js"); ?>
    <?php echo Assets::js(); ?>
</body>
</html>