<?php echo theme_view('header'); ?>
    <style>
        body {
            background: #f7f7f7;
        }

        #login input.form-control {
            height: 44px;
        }

        #login {
            max-width: 400px;
            background: #FFFFFF;
            padding:10px 20px;
        }

    </style>
    <div class="container"><!-- Start of Main Container -->
<?php
echo isset($content) ? $content : Template::content();

echo theme_view('footer', array('show' => false));
?>