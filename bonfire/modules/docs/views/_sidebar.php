<div class="bs-docs-sidebar hidden-print">
    <ul class="nav bs-docs-sidenav">
        <?php
        $start = strpos($this->uri->uri_string(), ($docsDir . "/")) + strlen($docsDir) + 1;
        $current_uri = substr($this->uri->uri_string(), $start);
        ?>
        <?php if (empty($docs) || !is_array($docs)) : ?>
            <p class="text-center"><?php echo lang('docs_not_found'); ?></p>
        <?php else : ?>
            <li>
                <div class="title"><?php e(lang('docs_title_system')); ?></div>
            </li>
            <?php
            foreach ($docs as $file => $name) :
                if (is_array($name)) :
                    ?>
                    <?php
                    $link_id = str_replace(" ", "_", $file);
                    ?>
                    <li <?php echo(array_key_exists($current_uri, $name) ? 'class="active"' : ''); ?>>
                        <?php echo anchor('#' . $link_id, $file, 'data-toggle="collapse" class="subtitle"'); ?>
                        <ul class="nav collapse" id="<?php echo $link_id; ?>">
                            <?php foreach ($name as $line => $namer) : ?>
                                <li <?php echo(($current_uri === $line) ? 'class="active"' : ''); ?>>
                                    <?php echo anchor($docsDir . '/' . str_replace($docsExt, '', $line), $namer); ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                <?php else : ?>
                    <li><?php echo anchor($docsDir . '/' . str_replace($docsExt, '', $file), $name); ?></li>
                    <?php
                endif;
            endforeach;
        endif;

        // Module-specific docs.
        if (empty($module_docs) || !is_array($module_docs)) :
            ?>
            <li><?php echo anchor(site_url($docsDir . '/' . str_replace($docsExt, '', $module)), ucwords(str_replace('_', ' ', $module))); ?></li>
        <?php else : ?>
            <li>
                <div class="title"><?php e(lang('docs_title_modules')); ?></div>
            </li>
            <?php
            foreach ($module_docs as $module => $mod_files) :
                if (count($mod_files)) :
                    ?>
                    <?php
                    $m_link_id = str_replace(" ", "_", $module);
                    $m_link_id = str_replace($docsExt, '', $m_link_id);
                    ?>
                    <?php if (count($mod_files) > 1) : ?>
                    <li <?php echo((array_key_exists($current_uri, $mod_files) OR array_key_exists($current_uri . $docsExt, $mod_files)) ? 'class="active"' : ''); ?>>
                        <?php echo anchor('#' . $m_link_id, $module, 'data-toggle="collapse" class="text-uppercase"'); ?>
                        <ul class='nav collapse' id="<?php echo $m_link_id; ?>">
                            <?php foreach ($mod_files as $fileName => $title) : ?>
                                <li <?php echo(($current_uri === str_replace($docsExt, '', $fileName)) ? 'class="active"' : ''); ?>>
                                    <?php echo anchor(site_url($docsDir . '/' . str_replace($docsExt, '', $fileName)), ucwords($title)); ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                <?php else: ?>
                    <?php foreach ($mod_files as $fileName => $title) : ?>
                        <li <?php echo(($current_uri === str_replace($docsExt, '', $fileName)) ? 'class="active"' : ''); ?>>
                            <?php echo anchor(site_url($docsDir . '/' . str_replace($docsExt, '', $fileName)), ucwords($title)); ?>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
                    <?php
                endif;
            endforeach;
        endif;
        ?>
    </ul>
</div>