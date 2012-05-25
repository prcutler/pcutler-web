<?php
/*
Plugin Name: Stop SOPA Ribbon
Plugin URI: http://kovshenin.com/wordpress/plugins/stop-sopa-ribbon/
Description: When activated, this plugin will put a Stop SOPA ribbon on the top right corner of your website.
Author: Konstantin Kovshenin
Version: 1.0
License: GPLv2
Author URI: http://kovshenin.com
*/

function render_stop_sopa_ribbon() {
	$ribbon_url = plugins_url( 'stop-sopa-ribbon.png', __FILE__ );
	echo "<a target='_blank' class='stop-sopa-ribbon' href='http://americancensorship.org/'><img src='{$ribbon_url}' alt='Stop SOPA' style='position: fixed; top: 0; right: 0; z-index: 100000; cursor: pointer;' /></a>";
}
add_action( 'wp_footer', 'render_stop_sopa_ribbon' );