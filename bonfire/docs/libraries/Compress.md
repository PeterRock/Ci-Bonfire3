# Compress HTML
The system will compress the html output file by default;

If you want to stop it, you can follow the doc bellow and undo it.
It's works as this way:
[Compress HTML output](https://github.com/bcit-ci/CodeIgniter/wiki/Compress-HTML-output)

# `Doc info`

##### Step 1: Enable Hooks in config/config.php
```php
$config['enable_hooks'] = TRUE;
```

##### Step 2: Add in the compress hook to config/hooks.php
```php
// Compress output
$hook['display_override'][] = array(
	'class' => '',
	'function' => 'compress',
	'filename' => 'compress.php',
	'filepath' => 'hooks'
);
```

##### Step 3: define a 'display_override' hook:
....