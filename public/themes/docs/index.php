<!doctype html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Docs - <?php e($this->settings_lib->item('site.title')); ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    $highlightScript = '$("pre code").each(function(i, e) {hljs.highlightBlock(e)});';

    Assets::add_js('bootstrap.min.js');
    Assets::add_js('highlight.min.js');
    Assets::add_js($highlightScript, 'inline');

    echo Assets::css(array('bootstrap.css', 'highlight/github.css', 'custom-docs.css'), 'screen', TRUE);
    ?>
</head>
<body>
    <nav class="navbar bs-docs-nav navbar-inverse">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">DOCS</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="main-nav-collapse">
                <ul class="nav navbar-nav">
                    <li role="separator" class="divider"></li>
                    <?php if (config_item('docs.show_app_docs')) :?>
                        <li <?php echo check_segment(2, 'application') ?>>
                            <a href="<?php echo site_url('docs/application'); ?>"><?php echo lang('docs_title_application') ?></a>
                        </li>
                    <?php endif; ?>

                    <li role="separator" class="divider"></li>

                    <?php if (config_item('docs.show_dev_docs')) : ?>
                        <li <?php echo check_segment(2, 'developer') ?>>
                            <a href="<?php echo site_url('docs/developer'); ?>"><?php echo lang('docs_title_bonfire') ?></a>
                        </li>
                    <?php endif; ?>
                </ul>
                <!-- Search Form -->
                <ul class="nav navbar-nav navbar-right">
                    <?php echo form_open( site_url('docs/search'), 'class="navbar-form navbar-right"' ); ?>
                    <div class="form-group">
                        <input type="text" class="form-control" name="search_terms" placeholder="<?php echo lang('docs_search_for') ?>"/>
                    </div>
                    <input type="submit" name="submit" class="btn btn-outline-inverse" value="<?php echo lang('docs_search') ?>">
                    </form>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <!-- Content Area -->
    <div class="container bs-docs-container">

        <?php echo Template::message(); ?>

        <div class="row">

            <div class="col-md-3"role="complementary">
                <?php if (isset($sidebar)) : ?>
                    <?php echo $sidebar; ?>
                <?php endif; ?>
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