<?php
/*
Plugin Name: Bootstrap Shortcodes
Plugin URI: http://bragthemes.com
Description: A Twitter Bootstrap 3 shortcodes plugin
Author: Brad Williams
Author URI: http://braginteractive.com
Version: 3.0.0
License: GNU General Public License version 3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html



Include functions */
require_once( dirname(__FILE__) . '/includes/scripts.php' ); // Adds plugin JS and CSS
require_once( dirname(__FILE__) . '/includes/shortcode-functions.php'); // Main shortcode functions
require_once( dirname(__FILE__) . '/includes/mce/tboot_shortcodes_tinymce.php'); // Add mce buttons to post editor