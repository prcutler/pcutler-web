<?php
/*
Plugin Name: Stop SOPA
Description: Plugin adds small protest box to your website and switch it to "Blackout Day" mode.
Plugin URI: http://www.icprojects.net/stop-sopa.html
Version: 1.07
Author: Ivan Churakov
Author URI: http://www.freelancer.com/affiliates/ichurakov/
*/
wp_enqueue_script("jquery");
define('PD_VERSION', 1.07);

class stopsopa_class
{
	var $options;
	var $error;
	
	var $exists;
	var $version;
	var $enable_blackout;
	var $protest_position;
	
	var $protest_position_list = array("bottom-right", "middle-right", "none");
	var $default_options;

	function __construct() {
		$this->options = array(
		"exists",
		"version",
		"enable_blackout",
		"protest_position"
		);
		$this->default_options = array (
			"exists" => 1,
			"version" => PD_VERSION,
			"enable_blackout" => "on",
			"protest_position" => "middle-right"
		);

		if (!empty($_COOKIE["stopsopa_error"]))
		{
			$this->error = stripslashes($_COOKIE["stopsopa_error"]);
			setcookie("stopsopa_error", "", time()+30, "/", ".".str_replace("www.", "", $_SERVER["SERVER_NAME"]));
		}

		$this->get_settings();
		$this->handle_versions();

		if (is_admin()) {
			add_action('admin_menu', array(&$this, 'admin_menu'));
			add_action('init', array(&$this, 'admin_request_handler'));
			add_action('admin_head', array(&$this, 'admin_header'), 15);
		} else {
			if ($this->enable_blackout == "on") {
				add_action("init", array(&$this, "blackout_day"));
			}
			$browser = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
			if (strpos($browser, 'Mobile') === false && strpos($browser, 'Symbian') === false && strpos($browser, 'Opera M') === false && strpos($browser, 'Android') === false && stripos($browser, 'HTC_') === false && strpos($browser, 'Fennec/') === false && stripos($browser, 'Blackberry') === false) {
				if ($this->protest_position == "bottom-right") {
					add_action("wp_footer", array(&$this, "front_header_br"));
					add_action("wp_footer", array(&$this, "front_footer_br"));
				} else if ($this->protest_position == "middle-right") {
					add_action("wp_footer", array(&$this, "front_header_mr"));
					add_action("wp_footer", array(&$this, "front_footer_mr"));
				}
			}
		}
	}

	function handle_versions() {
		global $wpdb;
		if (floatval($this->version) < PD_VERSION) {
			$this->version = PD_VERSION;
			$this->update_settings();
		}
	}

	function get_settings() {
		$exists = get_option('stopsopa_exists');
		if ($exists != 1) {
			foreach ($this->options as $option) {
				$this->$option = $this->default_options[$option];
			}
		} else {
			foreach ($this->options as $option) {
				$this->$option = get_option('stopsopa_'.$option);
			}
		}
	}

	function update_settings() {
		//if (current_user_can('manage_options')) {
			foreach ($this->options as $option) {
				update_option('stopsopa_'.$option, $this->$option);
			}
		//}
	}

	function populate_settings() {
		foreach ($this->options as $option) {
			if (isset($_POST['stopsopa_'.$option])) {
				$this->$option = stripslashes($_POST['stopsopa_'.$option]);
			}
		}
	}

	function check_settings() {
		return true;
	}

	function admin_menu() {
		if (get_bloginfo('version') >= 3.0) define("STOPSOPA_PERMISSION", "add_users");
		else define("STOPSOPA_PERMISSION", "edit_themes");
		add_menu_page(
			"STOP SOPA!"
			, "STOP SOPA!"
			, STOPSOPA_PERMISSION
			, "stop-sopa"
			, array(&$this, 'admin_settings')
		);
	}

	function admin_settings() {
		global $wpdb;
		$message = "";
		$errors = array();
		if (!empty($this->error)) $message = "<div class='error'><p>".$this->error."</p></div>";
		else {
			$errors = $this->check_settings();
			if (is_array($errors)) echo "<div class='error'><p>The following error(s) exists:<br />- ".implode("<br />- ", $errors)."</p></div>";
		}
		if ($_GET["updated"] == "true")
		{
			$message = '<div class="updated"><p>Plugin settings successfully <strong>updated</strong>.</p></div>';
		}
		if (!in_array($this->protest_position, $this->protest_position_list)) $this->protest_position = $this->protest_position_list[0];
		print ('
		<div class="wrap admin_stopsopa_wrap">
			<div id="icon-options-general" class="icon32"><br /></div><h2>STOP SOPA!</h2><br /> 
			'.$message.'
			<form enctype="multipart/form-data" method="post" style="margin: 0px" action="'.get_bloginfo('wpurl').'/wp-admin/admin.php">
			
			<div class="postbox-container" style="width: 100%;">
				<div class="metabox-holder">
					<div class="meta-box-sortables ui-sortable">
						<div class="postbox">
							<!--<div class="handlediv" title="Click to toggle"><br></div>-->
							<h3 class="hndle" style="cursor: default;"><span>General Settings</span></h3>
							<div class="inside">
								<table class="stopsopa_useroptions">
									<tr>
										<th>Blackout Day:</th>
										<td style="padding-left: 12px;"><input type="checkbox" id="stopsopa_enable_blackout" name="stopsopa_enable_blackout" '.($this->enable_blackout == "on" ? 'checked="checked"' : '').'> Enable Blackout Day mode<br /><em>On 18th January 2012, 8:00AM - 8:00PM (server time) website will show black screen like below and return 503 status (no problems with search engines):<br/><img src="'.get_bloginfo("wpurl").'/wp-content/plugins/'.basename(dirname(__FILE__)).'/blackout.png" border="0" width="480">.</em></td>
									</tr>
									<tr>
										<th style="padding-top: 10px;">Protest box position:</th>
										<td>
											<table style="border: 0px; padding: 0px;">
											<tr><td style="padding-top: 6px; width: 20px;"><input type="radio" name="stopsopa_protest_position" value="bottom-right"'.($this->protest_position == "bottom-right" ? ' checked="checked"' : '').'></td><td>Bottom right corner</td></tr>
											<tr><td style="padding-top: 6px; width: 20px;"><input type="radio" name="stopsopa_protest_position" value="middle-right"'.($this->protest_position == "middle-right" ? ' checked="checked"' : '').'></td><td>Middle right side</td></tr>
											<tr><td style="padding-top: 6px; width: 20px;"><input type="radio" name="stopsopa_protest_position" value="none"'.($this->protest_position == "none" ? ' checked="checked"' : '').'></td><td>Do not display protest box</td></tr>
											</table>
										</td>
									</tr>
								</table>
								<div class="alignright">
								<input type="hidden" name="ak_action" value="stopsopa_update_settings" />
								<input type="hidden" name="stopsopa_exists" value="1" />
								<input type="submit" class="paiddownoads_button button-primary" name="submit" value="Update Settings »">
								</div>
								<br class="clear">
							</div>
						</div>
					</div>
				</div>
			</div>
			</form>
		</div>
		');
	}
	
	function admin_request_handler() {
		global $wpdb;
		if (!empty($_POST['ak_action'])) {
			switch($_POST['ak_action']) {
				case 'stopsopa_update_settings':
					$this->populate_settings();
					if (isset($_POST["stopsopa_enable_blackout"])) $this->enable_blackout = "on";
					else $this->enable_blackout = "off";
					$errors = $this->check_settings();
					if ($errors === true) {
						$this->update_settings();
						header('Location: '.get_bloginfo('wpurl').'/wp-admin/admin.php?page=stop-sopa&updated=true');
						die();
					} else {
						$message = "";
						if (is_array($errors)) $message = "The following error(s) occured:<br />- ".implode("<br />- ", $errors);
						setcookie("stopsopa_error", $message, time()+30, "/", ".".str_replace("www.", "", $_SERVER["SERVER_NAME"]));
						header('Location: '.get_bloginfo('wpurl').'/wp-admin/admin.php?page=stop-sopa');
						die();
					}
					break;
				default:
					break;
			}
		}
	}

	function admin_header() {
		global $wpdb;
		echo '
		<link rel="stylesheet" type="text/css" href="'.get_bloginfo("wpurl").'/wp-content/plugins/'.basename(dirname(__FILE__)).'/style.css?ver='.PD_VERSION.'" media="screen" />';
	}
	
	function blackout_day() {
		$begin = mktime(8, 0, 0, 1, 18, 2012);
		$end = mktime(20, 0, 0, 1, 18, 2012);
		$current_time = time();
		if ($current_time >= $begin && $current_time <= $end) {
			header("HTTP/1.0 503 Service Unavailable");
			echo '
<html>
<head>
	<title>Stop SOPA! - Blackout Day: 18th January 2012, 8:00AM - 8:00PM</title>
	<style type="text/css">
		body {
			margin: 0px;
			padding: 0px;
			font-family: Arial;
			background: #000;
			background-color: #000;
			position: relative;
		}
		div.sopa-box {
			width: 800px;
			min-height: 200px;
			position: absolute;
			overflow: auto;
			left: 50%;
			top: 50%;
			margin-left: -400px;
			margin-top: -100px;
		}
		h1 {
			font-size: 112px;
			text-align: center;
			font-weight: bold;
			margin: 0px;
			padding: 0px;
			color: #CCC;
		}
		a {
			font-weight: bold;
			color: #CCC;
			text-decoration: none;
		}
		h2 {
			font-size: 24px;
			text-align: center;
			font-weight: bold;
			margin: 0px;
			padding: 0px;
			color: #888;
		}
		div#countdown {
			position: absolute;
			right: 5px;
			top: 5px;
			color: #555;
			font-size: 16px;
		}
		div#title {
			position: absolute;
			left: 5px;
			top: 5px;
			color: #555;
			font-size: 16px;
		}
	</style>
	<script type="text/javascript">
		var time_diff = '.($end - $current_time).';
		var now = new Date();
		var end_time = parseInt(now.getTime()/1000) + time_diff;
		function countdown() {
			now = new Date();
			current_time = parseInt(now.getTime()/1000);
			time_diff = end_time - current_time;
			if (time_diff < 0) {
				location.reload();
			} else {
				hours = parseInt(Math.floor(time_diff/3600));
				time_diff = time_diff - hours*3600;
				minutes = parseInt(Math.floor(time_diff/60));
				seconds = time_diff - minutes*60;
				if (hours < 10) countdown_value = "0" + hours;
				else countdown_value = hours;
				countdown_value = countdown_value + ":";
				if (minutes < 10) countdown_value = countdown_value + "0" + minutes;
				else countdown_value = countdown_value + minutes;
				countdown_value = countdown_value + ":";
				if (seconds < 10) countdown_value = countdown_value + "0" + seconds;
				else countdown_value = countdown_value + seconds;
				document.getElementById("countdown").innerHTML = countdown_value;
			}
		}
		self.setInterval("countdown()",1000);
	</script>
</head>
<body>
	<div class="sopa-box">
		<h1><a target="_blank" href="http://americancensorship.org/">STOP SOPA!</a></h1>
		<h2>Blackout Day: 18th January 2012, 8:00AM - 8:00PM</h2>
	</div>
	<div id="countdown"></div>
	<div id="title">'.get_bloginfo('name').'</div>
</body>
</html>';
			exit;
		}
	}
	
	function front_header_br()
	{
		echo '
<style type="text/css">
.stop-sopa-box {
	width: 345px;
	height: 27px;
	position: fixed;
	bottom: 0px;
	right: 20px;
	overflow: hidden;
	z-index: 9999;
}
.stop-sopa-content {
	width: 335px;
	height: 115px;
	background-color: #000;
	-moz-box-shadow: 0 0 5px #000;
	-webkit-box-shadow: 0 0 5px #000;
	box-shadow: 0 0 5px #000;
	-moz-border-radius: 5px 0px 0px 0px;
	border-radius: 5px 0px 0px 0px;
	margin-top: 32px;
	margin-left: 5px;
	position: relative;
}
.stop-sopa-tab {
	height: 27px;
	background: #000 url('.get_bloginfo("wpurl").'/wp-content/plugins/'.basename(dirname(__FILE__)).'/arrow_up.png) 10px 4px no-repeat;
	-moz-box-shadow: 0 0 5px #000;
	-webkit-box-shadow: 0 0 5px #000;
	box-shadow: 0 0 5px #000;
	-moz-border-radius: 5px 5px 0px 0px;
	border-radius: 5px 5px 0px 0px;
	cursor: pointer;
	float: right;
	margin-top: 5px;
	margin-right: 5px;
	color: #CCC;
	font-family: verdana;
	font-weight: normal;
	font-size: 12px;
	padding-left: 30px;
	padding-right: 10px;
	padding-top: 3px;
}
img.stop-sopa-foto {
	margin: 10px 13px 10px 10px;
	float: left;
}
p.stop-sopa-quote {
	color: white;
	font-family: arial;
	font-size: 13px;
	text-align: left;
	padding: 10px 15px 4px 10px;
	margin: 0px;
	line-height: 20px;
}
p.stop-sopa-quote em {font-size: 13px;}
p.stop-sopa-text {
	color: #CCC;
	font-family: arial;
	font-size: 13px;
	text-align: left;
	padding: 10px;
	margin: 0px 3px 0px 0px;
	text-align: right;
	line-height: 20px;
}
a.stop-sopa-link {
	text-decoration: none;
}
</style>
<!--[if lt IE 7]>
<style type="text/css">
.stop-sopa-box {
	display: none;
}
</style>
<![endif]-->
<script type="text/javascript">
	jQuery(document).ready(function() {
		var stop_sopa_box_height_min = jQuery(".stop-sopa-tab").height();
		var stop_sopa_box_height_max = jQuery(".stop-sopa-tab").height() + jQuery(".stop-sopa-content").height();
		var stop_sopa_box_height_next = stop_sopa_box_height_max;
		jQuery(".stop-sopa-tab").click(function() {
			jQuery(".stop-sopa-box").animate({
				height: stop_sopa_box_height_next
			}, 300, function() {
				if (stop_sopa_box_height_next <= stop_sopa_box_height_min) {
					stop_sopa_box_height_next = stop_sopa_box_height_max;
					jQuery(".stop-sopa-tab").css("backgroundImage", "url('.get_bloginfo("wpurl").'/wp-content/plugins/'.basename(dirname(__FILE__)).'/arrow_up.png)");
				}
				else {
					jQuery(".stop-sopa-tab").css("backgroundImage", "url('.get_bloginfo("wpurl").'/wp-content/plugins/'.basename(dirname(__FILE__)).'/arrow_down.png)");
					stop_sopa_box_height_next = stop_sopa_box_height_min;
				}
			});
		});
	});
</script>
';
	}

	function front_footer_br()
	{
		echo '
<div class="stop-sopa-box">
	<div class="stop-sopa-tab">STOP SOPA!</div>
	<div class="stop-sopa-content">
	<a class="stop-sopa-link" target="_blank" href="http://americancensorship.org/"><img class="stop-sopa-foto" src="'.get_bloginfo("wpurl").'/wp-content/plugins/'.basename(dirname(__FILE__)).'/stopsopa.png" height="90" alt="Stop SOPA!"></a>
	<p class="stop-sopa-quote">
		SOPA breaks our internet freedom!<br />
		Any site can be shut down whether or not we\'ve done anything wrong.
	</p>
	<p class="stop-sopa-text">Stop SOPA!</p>
	</div>
</div>
';
	}

	function front_header_mr()
	{
		echo '
<style type="text/css">
.stop-sopa-box {
	width: 27px;
	height: 125px;
	position: fixed;
	right: 0px;
	top: 50%;
	margin-top: -57px;
	overflow: hidden;
	z-index: 9999;
}
.stop-sopa-content {
	width: 355px;
	height: 115px;
	background-color: #000;
	-moz-box-shadow: 0 0 5px #000;
	-webkit-box-shadow: 0 0 5px #000;
	box-shadow: 0 0 5px #000;
	-moz-border-radius: 5px 0px 0px 5px;
	border-radius: 5px 0px 0px 5px;
	margin-top: 5px;
	margin-left: 5px;
	position: relative;
	background: #000 url('.get_bloginfo("wpurl").'/wp-content/plugins/'.basename(dirname(__FILE__)).'/arrow_left.png) 4px 92px no-repeat;
}

.stop-sopa-tab {
	background: transparent url('.get_bloginfo("wpurl").'/wp-content/plugins/'.basename(dirname(__FILE__)).'/stopsopa-v.png) 3px 8px no-repeat;
	padding: 0px 0px 0px 20px;
	cursor: pointer;
}
img.stop-sopa-foto {
	margin: 10px 13px 10px 10px;
	float: left;
}
p.stop-sopa-quote {
	color: white;
	font-family: arial;
	font-size: 13px;
	text-align: left;
	padding: 10px 15px 4px 10px;
	margin: 0px;
	line-height: 20px;
}
p.stop-sopa-quote em {font-size: 13px;}
p.stop-sopa-text {
	color: #CCC;
	font-family: arial;
	font-size: 13px;
	text-align: left;
	padding: 10px;
	margin: 0px 10px 0px 0px;
	text-align: right;
	line-height: 20px;
}
a.stop-sopa-link {
	text-decoration: none;
}
</style>
<!--[if lt IE 7]>
<style type="text/css">
.stop-sopa-box {
	display: none;
}
</style>
<![endif]-->
<script type="text/javascript">
	jQuery(document).ready(function() {
		var stop_sopa_box_width_min = 27;
		var stop_sopa_box_width_max = jQuery(".stop-sopa-content").width();
		var stop_sopa_box_width_next = stop_sopa_box_width_max;
		jQuery(".stop-sopa-tab").click(function() {
			jQuery(".stop-sopa-box").animate({
				width: stop_sopa_box_width_next
			}, 300, function() {
				if (stop_sopa_box_width_next <= stop_sopa_box_width_min) {
					stop_sopa_box_width_next = stop_sopa_box_width_max;
					jQuery(".stop-sopa-content").css("backgroundImage", "url('.get_bloginfo("wpurl").'/wp-content/plugins/'.basename(dirname(__FILE__)).'/arrow_left.png)");
				}
				else {
					jQuery(".stop-sopa-content").css("backgroundImage", "url('.get_bloginfo("wpurl").'/wp-content/plugins/'.basename(dirname(__FILE__)).'/arrow_right.png)");
					stop_sopa_box_width_next = stop_sopa_box_width_min;
				}
			});
		});
	});
</script>
';
	}

	function front_footer_mr()
	{
		echo '
<div class="stop-sopa-box">
	<div class="stop-sopa-content">
		<div class="stop-sopa-tab">
	<a class="stop-sopa-link" target="_blank" href="http://americancensorship.org/"><img class="stop-sopa-foto" src="'.get_bloginfo("wpurl").'/wp-content/plugins/'.basename(dirname(__FILE__)).'/stopsopa.png" height="90" alt="Stop SOPA!"></a>
	<p class="stop-sopa-quote">
		SOPA breaks our internet freedom!<br />
		Any site can be shut down whether or not we\'ve done anything wrong.
	</p>
	<p class="stop-sopa-text">Stop SOPA!</p>
		</div>
	</div>
</div>
';
	}
	
	
}
$stopsopa = new stopsopa_class();
?>