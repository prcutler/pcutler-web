<?php
/**
 * This file loads the CSS and JS necessary for your shortcodes display
 * @package Twitter Bootstrap Shortcodes Plugin
 * @since 1.0
 * @author Brad Williams : http://bragthemes.com
 * @copyright Copyright (c) 2013, Brad Williams
 * @link http://bragthemes.com
 * @License: GNU General Public License version 3.0
 * @License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */
if( !function_exists ('tboot_shortcodes_scripts') ) :
	function tboot_shortcodes_scripts() {
		wp_enqueue_script('jquery');
		wp_register_script( 'tboot_tabs', plugin_dir_url( __FILE__ ) . 'js/tboot_tabs.js', array ( 'jquery', 'jquery-ui-tabs'), '1.0', true );
		wp_register_script( 'tboot_toggle', plugin_dir_url( __FILE__ ) . 'js/tboot_toggle.js', 'jquery', '1.0', true );
		wp_register_script( 'tboot_accordion', plugin_dir_url( __FILE__ ) . 'js/tboot_accordion.js', array ( 'jquery', 'jquery-ui-accordion'), '1.0', true );
		wp_enqueue_style('tboot_shortcode_styles', plugin_dir_url( __FILE__ ) . 'css/tboot_shortcodes_styles.css');
	}
	add_action('wp_enqueue_scripts', 'tboot_shortcodes_scripts');
endif;