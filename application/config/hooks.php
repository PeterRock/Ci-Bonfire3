<?php defined('BASEPATH') || exit('No direct script access allowed');
/**
 * Define "hooks" to extend CI without hacking the core files. Please see the
 * user guide for info:
 *
 * @link https://www.codeigniter.com/user_guide/general/hooks.html
 */

// Store the requested URL, which will sometimes be different from previous URL.
$hook['pre_controller'][] = array(
    'class'    => 'App_hooks',
    'function' => 'saveRequested',
    'filename' => 'App_hooks.php',
    'filepath' => 'hooks',
    'params'   => ''
);

// Allow performance of good redirects to previous pages.
$hook['post_controller'][] = array(
    'class'    => 'App_hooks',
    'function' => 'prepRedirect',
    'filename' => 'App_hooks.php',
    'filepath' => 'hooks',
    'params'   => ''
);

// Check whether the site is in maintenance mode.
$hook['post_controller_constructor'][] = array(
    'class'    => 'App_hooks',
    'function' => 'checkSiteStatus',
    'filename' => 'App_hooks.php',
    'filepath' => 'hooks',
    'params'   => ''
);

// Compress output
$hook['display_override'][] = array(
	'class' => '',
	'function' => 'Compress',
	'filename' => 'Compress.php',
	'filepath' => 'hooks'
);
