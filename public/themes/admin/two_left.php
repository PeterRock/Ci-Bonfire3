<?php

echo theme_view('header');

?>
    <div class="body">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <?php Template::block('sidebar'); ?>
                </div>
                <div class="col-md-10">
                    <?php
                    echo Template::message();
                    echo isset($content) ? $content : Template::content();
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php echo theme_view('footer'); ?>