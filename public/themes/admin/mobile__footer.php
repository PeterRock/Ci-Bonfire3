	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-6">
                    <a href="<?php echo site_url(SITE_AREA . '/settings/users/edit/' . $this->auth->user_id()); ?>">My Account</a>
				</div>
				<div class="col-md-6">
					<p>{elapsed_time} seconds. {memory_usage}<br/>
                        Built with <a href="http://cibonfire.com" target="_blank"><span class="glyphicon-fire"></span>&nbsp;Bonfire</a>
					</p>
				</div>
			</div>
		</div>
	</footer>
	<div id="debug"><!-- Stores the Profiler Results --></div>
    <?php echo Assets::js("jquery-1.12.4.min.js"); ?>
	<?php echo Assets::js(); ?>
</body>
</html>