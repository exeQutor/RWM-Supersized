<?php

/*
Plugin Name: RWM Supersized
Plugin URI: http://www.realworldmedia.com.au/
Description: A jQuery Supersized plugin for WordPress by Real World Media.
Author: Real World Media
Version: 1.0
Author URI: http://www.realworldmedia.com.au/
*/

/**
 * @package RWM Supersized
 * @subpackage RWM Framework
 * @author Randolph
 */

define('RWMss_VERSION', '1.0');
define('RWMss_DIR', trailingslashit(plugin_dir_path(__FILE__)));
define('RWMss_URL', trailingslashit(plugin_dir_url(__FILE__)));
define('RWMss_FILE', __FILE__);
define('RWMss_NAME', 'RWM Supersized!');
define('RWMss_SLUG', 'rmw_supersized');
define('RWMss_PREFIX', 'RWMss_');

require_once(RWMss_DIR . 'controllers/main.php'); new RWMss_Main;
require_once(RWMss_DIR . 'api.php');

/**
 * @filesource ./rwm-supersized.php
 */