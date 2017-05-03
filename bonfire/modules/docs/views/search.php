<h2><?php echo lang('docs_search_results') ?></h2>
<div class="panel panel-default">
    <div class="panel-body">
        <?php echo form_open(current_url(), 'class="form-inline"'); ?>
        <input type="text" name="search_terms" class="form-control" style="width: 85%"
               value="<?php echo set_value('search_terms', $search_terms) ?>"/>
        <input type="submit" name="submit" class="btn btn-default" value="<?php echo lang('docs_search'); ?>"/>
        <?php echo form_close(); ?>
    </div>
    <div class="panel-footer">
        <?php echo isset($results) ? count($results) : 0; ?> results found in <?php echo $search_time; ?> seconds.
    </div>
</div>

<?php if (empty($results) || !is_array($results)) : ?>
    <div class="alert alert-warning">
        <?php echo sprintf(lang('docs_no_results'), $search_terms); ?>
    </div>
<?php else : ?>
    <ol class="container-fluid">
    <?php
    foreach ($results as $result) :
        ?>
        <li class="result-item">
            <h4 class="text-primary">
                <?php echo anchor(site_url($result['url']), $result['title'], 'class="text-info"'); ?>
            </h4>
            <p class="text-success"><?php echo $result['url']; ?></p>
            <p class="text-muted">
                <?php echo $result['extract']; ?>
            </p>
        </li>
        <?php
    endforeach; ?>

    </ol>
    <?php
endif;
