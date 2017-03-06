<?php
/*
Plugin Name: ImageLint
Text Domain: imagelint
Description: One-stop hassle-free no-config ImageLint WordPress integration
Author: Sopamo GmbH
Author URI: https://www.imagelint.com
License: UNLICENSED
Version: 1.0.0
*/

defined('ABSPATH') or die();

define('IMAGELINT_FILE', __FILE__);
define('IMAGELINT_DIR', dirname(__FILE__));
define('IMAGELINT_BASE', plugin_basename(__FILE__));

require_once(IMAGELINT_DIR . '/inc/imagelint_parser.class.php');


add_action('template_redirect', array('ImageLint_Parser', 'parseHook'));

?>
