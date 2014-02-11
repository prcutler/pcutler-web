<?php
/*
Plugin Name: The Day We Fight Back
Plugin URI: http://thedaywefightback.org
Description: Add a banner to your site in opposition to mass surveillance on 02/11 thedaywefightback.org
Text Domain: apppresser
Domain Path: /languages
Version: 1.1
Author: modemlooper
Author URI: http://twitter.com/modemlooper
License: GPLv2
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

require( dirname( __FILE__ ) . '/admin.php');

function tdwfb_footer_script() {
	global $tdwfb_options;

	$tdwfb_options = get_option('tdwfb_plugin_options');

	$greeting = !empty( $tdwfb_options['greeting'] ) ? $tdwfb_options['greeting'] : 'Dear Internet Users';
	$greeting = addslashes(html_entity_decode($greeting, ENT_QUOTES));
	$date = !empty( $tdwfb_options['date'] ) ? true : false;
	$call = !empty( $tdwfb_options['call'] ) ? true : false;
	$inter = !empty( $tdwfb_options['inter'] ) ? true : false;
	$intertext = json_encode($inter);
?>
	<!--[if !(lte IE 8)]><!-->
	<script type="text/javascript">
	  // The defaults are set below
	  var tdwfb_config = {
		 greeting: '<?php echo $greeting;  ?>', // Sets the salutation at the top left
		 disableDate: <?php echo json_encode($date) ; ?>, // If true, the banner shows even if the date is not yet 02/11/2014
		 callOnly: <?php echo json_encode($call) ; ?>, // If true, the banner only displays a form for calling congress
		 overrideLocation: '<?php if ((json_encode($inter)) == 'true') { echo 'international'; } else { echo 'usa'; } ?>' // Can be either "usa", "international", or none (default)
	  };
	  (function(){
		 var e = document.createElement('script'); e.type='text/javascript'; e.async = true;
		 e.src = document.location.protocol + '//d1agz031tafz8n.cloudfront.net/thedaywefightback.js/widget.min.js';
		 var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(e, s);
	  })();
	</script>
	<!--<![endif]-->

<?php
}
add_action('wp_footer', 'tdwfb_footer_script');