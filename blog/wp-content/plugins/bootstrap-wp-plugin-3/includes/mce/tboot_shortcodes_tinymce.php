<?php
/**
 * This file has all the main shortcode functions
 * @package Twitter Bootstrap Shortcodes Plugin
 * @since 1.0
 * @author Brad Williams : http://bragthemes.com
 * @copyright Copyright (c) 2013, Brad Williams
 * @link http://bragthemes.com
 * @License: GNU General Public License version 3.0
 * @License URI: http://www.gnu.org/licenses/gpl-3.0.html
 *
 */
class TBOOT_TinyMCE_Buttons {
	function __construct() {
    	add_action( 'init', array(&$this,'init') );
    }
    function init() {
		if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
			return;		
		if ( get_user_option('rich_editing') == 'true' ) {  
			add_filter( 'mce_external_plugins', array(&$this, 'add_plugin') );  
			add_filter( 'mce_buttons', array(&$this,'register_button') ); 
			wp_localize_script( 'jquery', 'tbootShortcodesVars', array('template_url' => plugin_dir_url( __FILE__ ) ) );
		}  
    }  
	function add_plugin($plugin_array) {  
	   $plugin_array['tboot_shortcodes'] = plugin_dir_url( __FILE__ ) .'js/tboot_shortcodes_tinymce.js';
	   return $plugin_array; 
	}
	function register_button($buttons) {  
	   array_push($buttons, "tboot_shortcodes_button");
	   return $buttons; 
	} 	
}
$tbootshortcode = new TBOOT_TinyMCE_Buttons;