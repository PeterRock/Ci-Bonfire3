	<footer class="container-fluid footer">
		<p class="pull-right">
			Executed in {elapsed_time} seconds, using {memory_usage}.<br />
			Powered by <a href="http://cibonfire.com" target="_blank"><span class="glyphicon-fire"></span>&nbsp;Bonfire</a> <?php echo BONFIRE_VERSION; ?>
		</p>
	</footer>
	<div id="debug"><!-- Stores the Profiler Results --></div>
    <?php echo Assets::external_js("jquery-1.12.4.min.js", false, false, true, true); ?>
    <?php echo Assets::external_js("bootstrap.min.js", false, false, true, true); ?>
    <?php echo Assets::external_js("jwerty.js", false, false, true, true); ?>

	<?php echo Assets::js(); ?>
</body>
</html>