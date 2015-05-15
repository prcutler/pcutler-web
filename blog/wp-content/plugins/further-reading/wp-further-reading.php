<?php
/*
Plugin Name: Further Reading
Plugin URI: http://artplastika.ru/projects/further-reading/
Description: Display related content for further reading in most common ways to lower bounce rate of your site or blog
Version: 15.1.29
Author: Victor Glushenkov
License: MIT

Copyright 2015 Victor Glushenkov (email: dev@artplastika.ru )

Permission is hereby granted, free of charge, to any person obtaining a 
copy of this software and associated documentation files (the 
"Software"), to deal in the Software without restriction, including 
without limitation the rights to use, copy, modify, merge, publish, 
distribute, sublicense, and/or sell copies of the Software, and to 
permit persons to whom the Software is furnished to do so, subject to 
the following conditions: 

The above copyright notice and this permission notice shall be included 
in all copies or substantial portions of the Software. 

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS 
OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF 
MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. 
IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY 
CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, 
TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE 
SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE. 

*/

define('WPFR_BASENAME', plugin_basename(__FILE__));

class wpfurtherreading {

	private static $BEHAVIOURS = array(
		"slidebox-custom" => "Slide box with custom HTML content",
		"slidebox-specified" => "Slide box with specified post (in development)",
		"slidebox-similar" => "Slide box with similar post (in development)",
		"slidebox-prevnext" => "Slide boxes with previous and next posts (in development)",
		"links-prevnext" => "Links to previous and next posts (in development)",
		"tiles-specified" => "Tiles with specified posts at the end (in development)",
		"tiles-similar" => "Tiles with similar posts at the end (in development)",
		"tiles-recent" => "Tiles with recent posts at the end (in development)",
		"list-specified" => "List of specified posts at the end  (in development)",
		"list-similar" => "List of similar posts at the end  (in development)",
		"widget-similar" => "Widget with similar posts (in development)",	
		"nothing" => "Do nothing",
	);
	
	private static $SUPPORTED_BEHAVIOURS = array("slidebox-custom", "nothing");

	function wpfurtherreading() {
		add_action('wp_enqueue_scripts', array(&$this, 'enqueue_scripts'));
		add_filter('the_content', array(&$this, 'add_further_reading_navigation'));
		add_filter('plugin_action_links_' . WPFR_BASENAME, array(&$this, 'add_plugin_action_links'));
		add_filter('plugin_row_meta', array(&$this, 'add_plugin_meta_links'), 10, 2);
		add_action('admin_enqueue_scripts', array(&$this, 'admin_enqueue_scripts'));
		add_action('admin_init', array($this, 'plugin_admin_init'));
		add_action('admin_menu', array(&$this, 'add_admin_menu'));
		add_action('save_post', array(&$this, 'save_post_meta'));
		if(is_admin()) {
			add_action('wp_ajax_wpfr_get_options_form', array(&$this, 'get_options_form'));
		}
	}
	
	public function enqueue_scripts() {
		wp_enqueue_script('wp-further-reading', plugins_url('wp-further-reading.js', __FILE__), array('jquery'));
		wp_enqueue_style('wp-further-reading', plugins_url('wp-further-reading.css', __FILE__));
	}

	public function admin_enqueue_scripts() {
		wp_register_script('wp-further-reading-admin', plugins_url('wp-further-reading-admin.js', __FILE__), array('jquery'));
		wp_localize_script('wp-further-reading-admin', 'WpfrAjax', array('ajaxUrl' => admin_url('admin-ajax.php')));
		wp_enqueue_script('wp-further-reading-admin');
		wp_enqueue_style('wp-further-reading-admin', plugins_url('wp-further-reading-admin.css', __FILE__));
	}
	
	public function add_further_reading_navigation($content = '') {
		global $post, $page, $pages;
		if (is_page() || is_single())
		{
			//$options = get_post_meta($post->ID, 'wpfurtherreading_options', true);
			$options = $this->get_options($post->ID);
			if ($options && !is_null($options) && !empty($options)) {
				$behaviour = $options['behaviour'];
			}
			switch($behaviour) {
				 case 'slidebox-custom': 
					$markup = '<span id="wpfr_anchor"></span><div id="wpfr_slidebox_right" class="wpfr_slidebox"><a class="close">&times;</a>'. $options['slidebox-custom-html'] .'</div>';
					break;
				default:
					$markup = '';
			}
		}
		return $content . $markup;
	} 
	
	public function plugin_admin_init() {
		register_setting('wpfurtherreading_options', 'wpfurtherreading_options');
	}
	
	public function add_admin_menu() {
		add_options_page('Further Reading', 'Further Reading', 'manage_options', basename(__FILE__), array($this, 'add_plugin_options_page'));
		add_meta_box('Further Reading', 'Further Reading', array(&$this, 'add_plugin_meta_box'), 'post', 'normal', 'default');
		add_meta_box('Further Reading', 'Further Reading', array(&$this, 'add_plugin_meta_box'), 'page', 'normal', 'default');
		$post_types = get_post_types(array('public' => true, '_builtin' => false), 'names', 'and');
	  	foreach ($post_types  as $post_type ) {
	    	add_meta_box('Further Reading', 'Further Reading', array(&$this, 'add_plugin_meta_box'), $post_type, 'normal', 'default');
	  	}
	}
	
	public function add_plugin_action_links($links) {
		$plugin_name = array_pop(explode('/', WPFR_BASENAME));
		$options_link = '<a href="' . get_admin_url(null, "options-general.php?page=$plugin_name") . '">Settings</a>';
		array_unshift($links, $options_link);
		return $links;
	}
	
	public function add_plugin_meta_links($plugin_meta, $plugin_file) {
		if (WPFR_BASENAME == $plugin_file) {
			$plugin_meta[] = '<a href="https://wordpress.org/support/view/plugin-reviews/wp-further-reading" target="_blank">Rate plugin</a>';
		}
		return $plugin_meta;
	}
	
	public function add_plugin_options_page() {
		$options = $this->get_options();
		?>
		<div class="wrap">
			<h2>Further Reading Settings</h2>
			<form id="further-reading-options-form" method="post" action="options.php">
				<?php settings_fields('wpfurtherreading_options'); ?>
				<label>Default behaviour:</label>
				<select id="wpfr-behaviour-select" name="wpfurtherreading_options[behaviour]">
				<?php foreach (self::$BEHAVIOURS as $key => $value) { ?>
						<option value="<?php echo $key?>" <?php if (!in_array($key, self::$SUPPORTED_BEHAVIOURS)) echo 'disabled'; selected($options['behaviour'], $key); ?>><?php echo $value?></option>
				<?php } ?>
				</select>
				<div id="wpfr-behaviour-options">
					<?php echo $this->get_options_form_markup(false, $options['behaviour']); ?>
				</div>
				<?php submit_button(); ?>
			</form>
		</div>
		<?php 
	}
	
	function add_plugin_meta_box($post, $metabox) {
		$defaultOptions = $this->get_options();
		$options = $this->get_options($post->ID);
		$isDefaultBehaviour = 'on' == $options['default_behavior'];
		?>
		<div id="wpfr-defaultbahaviour-container">
			<input type="checkbox" id="wpfr-defaultbahaviour-checkbox" name="wpfurtherreading_options[default_behavior]" <?php checked($isDefaultBehaviour); ?> />
			<label for="wpfr-defaultbahaviour-checkbox">Use default behaviour</label>
		</div>
		<label>Behaviour:</label>
		<select id="wpfr-behaviour-select" name="wpfurtherreading_options[behaviour]" <?php disabled($options['default_behavior'], 'on'); ?>>
		<?php foreach (self::$BEHAVIOURS as $key => $value) { ?>
				<option value="<?php echo $key?>" <?php if (!in_array($key, self::$SUPPORTED_BEHAVIOURS)) echo 'disabled'; selected($options['behaviour'], $key); ?>><?php echo $value?></option>
		<?php } ?>
		</select>
		<input type="hidden" id="wpfr-default-bahaviour" value="<?php echo $defaultOptions['behaviour'] ?>" />
		<input type="hidden" name="wpfr-post-id" value="<?php echo $post->ID ?>" />
		<div id="wpfr-behaviour-options">
			<?php echo $this->get_options_form_markup($isDefaultBehaviour, $options['behaviour'], $post->ID); ?>
		</div>
		<?php
	}

	function save_post_meta($post_id) {
		if ('page' == $_POST['post_type']) {
			if (!current_user_can('edit_page', $post_id)) {
				return;
			}
		} else {
			if (!current_user_can('edit_post', $post_id)) {
				return;
			}
		}
		if ($the_post = wp_is_post_revision($post_id)) {
			$post_id = $the_post;
		}
		$options = $_POST['wpfurtherreading_options'];
		update_post_meta($post_id, 'wpfurtherreading_options', $options);
	}

	public function get_options_form() {
		$postId = $_POST['postId'];
		$behaviour = $_POST['behaviour'];
		$isDefaultBehaviour = $_POST['isDefaultBehaviour'];
		header( "Content-Type: text/html" );
		echo $this->get_options_form_markup($isDefaultBehaviour, $behaviour, $postId);
		exit;
	}
	
	public function get_options_form_markup($isDefaultBehaviour, $behaviour, $postId = null) {
		$options = $isDefaultBehaviour ? $this->get_options() : $this->get_options($postId);
		switch($behaviour) {
			 case 'slidebox-custom': 
				$markup = '
					<label>HTML:</label>
					<textarea name="wpfurtherreading_options[slidebox-custom-html]" rows="6" cols="70">'. $options['slidebox-custom-html'] .'</textarea>
					<div class="wpfr-options-hint">Use HTML responsibly not to break your site markup</div>
				';
				break;
		}
		return $markup;
	}
	
	public function get_options($postId = null) {
		$defaultOptions = get_option('wpfurtherreading_options');
		if ($postId) {
			$options = get_post_meta($postId, 'wpfurtherreading_options', true);
		}
		if (!$options || is_null($options) || empty($options)) {
			$options = $defaultOptions;
		}
		if ($options['default_behavior']) {
			foreach ($defaultOptions as $key => $value) {
				$options[$key] = $value;
			}
		}
		return $options;
	}
}

$wpfurtherreading = new wpfurtherreading();	