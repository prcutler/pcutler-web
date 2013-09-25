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
 */


/*
 * Allow shortcodes in widgets
 * @since v1.0
 */
add_filter('widget_text', 'do_shortcode');


/*
 * Clear Floats
 * @since v1.0
 */
if( !function_exists('tboot_clear_floats_shortcode') ) {
	function tboot_clear_floats_shortcode() {
		return '<div class="tboot-clear-floats"></div>';
	}
	add_shortcode( 'tboot_clear_floats', 'tboot_clear_floats_shortcode' );
}



/*
 * Spacing
 * @since v1.0
 */
if( !function_exists('tboot_spacing_shortcode') ) {
	function tboot_spacing_shortcode( $atts ) {
		extract( shortcode_atts( array(
			'size' => '20px',
			),
		$atts ) );
		return '<hr class="tboot-spacing" style="height: '. $size .'"></hr>';
	}
	add_shortcode( 'tboot_spacing', 'tboot_spacing_shortcode' );
}




/*
 * Fix Shortcodes
 * @since v1.0
 */
if( !function_exists('tboot_fix_shortcodes') ) {
	function tboot_fix_shortcodes($content){   
		$array = array (
			'<p>[' => '[', 
			']</p>' => ']', 
			']<br />' => ']'
			);
		$content = strtr($content, $array);
		return $content;
	}
	add_filter('the_content', 'tboot_fix_shortcodes');
}



/*
 * Panels
 * @since v3.0.0
 */
if( !function_exists('tboot_panel_shortcode') ) {
	function tboot_panel_shortcode( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'color' => '',
			'title' => '',
			'footer' => '',
			), $atts ) );

		$color = ($color <> '') ? "panel-$color" : '';
		$title = ($title <> '') ? "<div class='panel-heading'><h3 class='panel-title'>$title</h3></div>" : '';
		$footer = ($footer <> '') ? "<div class='panel-footer'>$footer</div>" : '';
		
		return '<div class="panel ' . $color . '">'. $title .'' .do_shortcode($content). '' .$footer. '</div>';
	}
	add_shortcode('tboot_panel', 'tboot_panel_shortcode');
}


//Highlight
if ( !function_exists( 'tboot_highlight_shortcode' ) ) {
	function tboot_highlight_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'color' => 'yellow',
			),
		$atts ) );
		return '<span class="tboot-highlight-'. $color .'">' . do_shortcode( $content ) . '</span>';

	}
	add_shortcode('tboot_highlight', 'tboot_highlight_shortcode');
}


/*
 * Buttons
 * @since v1.0
 */
if( !function_exists('tboot_button_shortcode') ) {
	function tboot_button_shortcode( $atts, $content = null ) {

		wp_enqueue_script('bootstrap_js');

		extract( shortcode_atts( array(
			'color' => 'default',
			'size' => '',
			'url' => 'http://bragthemes.com',
			'title' => '',
			'target' => 'self',
			'rel' => '',
			'block' => '',
			'poptitle' => '',
			'popcontent' => '',
			'popplacement' => ''
			), $atts ) );

		$block = ($block == 'yes') ? "btn-block " : '';
		$poptitle = ($poptitle <> '') ? "rel='popover' data-original-title='$poptitle'" : '';
		$popcontent = ($popcontent <> '') ? "data-content='$popcontent'" : '';
		$popplacement = ($popplacement <> '') ? "data-placement='$popplacement'" : '';
		
		return '<a ' . $popplacement . '' . $poptitle . '' . $popcontent . ' href="' . $url . '" class="btn btn-' . $size .' btn-' . $color . ' ' . $block . '" target="_'.$target.'" title="'. $title .'" rel="'.$rel.'">' .do_shortcode($content). '</a>';
	}
	add_shortcode('tboot_button', 'tboot_button_shortcode');
}


/*
 * Button Group
 * @since v1.0
 */
if ( !function_exists( 'tboot_button_group_shortcode' ) ) {
	function tboot_button_group_shortcode( $atts, $content = null) {

		wp_enqueue_script('bootstrap_js');

			extract(shortcode_atts(array(
			'vertical' => '',
			'justified' => '',
			'size' => '',
			), $atts));


			$vertical = ($vertical == 'yes') ? "btn-group-vertical" : '';
			$justified = ($justified == 'yes') ? "btn-group-justified" : '';

			

		return '<div class="btn-group btn-group-'. $size .' '. $vertical .' '. $justified .'">' .do_shortcode($content). '</div>';
	}
	add_shortcode('tboot_button_group', 'tboot_button_group_shortcode');
}

/*
 * Button Group Vertical
 * @since v1.0
 */
if ( !function_exists( 'tboot_button_group_vertical_shortcode' ) ) {
	function tboot_button_group_vertical_shortcode( $atts, $content = null) {

		wp_enqueue_script('bootstrap_js');

			extract(shortcode_atts(array(
			'justified' => '',
			'size' => '',
			), $atts));


			$justified = ($justified == 'yes') ? "btn-group-justified" : '';

			

		return '<div class="btn-group-'. $size .' btn-group-vertical '. $justified .'">' .do_shortcode($content). '</div>';
	}
	add_shortcode('tboot_button_group_vertical', 'tboot_button_group_vertical_shortcode');
}


/*
 * Button Split Dropdown
 * @since v1.0
 */
if ( !function_exists( 'tboot_button_split_dropdown_shortcode' ) ) {
	function tboot_button_split_dropdown_shortcode( $atts, $content = null ) {

		wp_enqueue_script('bootstrap_js');

		extract(shortcode_atts(array(
			'label' => '',
			'color' => '',
			'size' => '',
			'url' => '',
			'target' => 'self',
			'icon' => '',
			'iconsize' => '',
			'dropup' => '',
			'rightdropup' => '',
			), $atts));

		
		$color = ($color <> '') ? "btn-$color" : '';
		$size = ($size <> '') ? "btn-$size " : '';
		$iconsize = ($iconsize <> '') ? "icon-$iconsize" : '';
		$icon = ($icon <> '') ? "icon-$icon" : '';
		$dropup = ($dropup == 'yes') ? "dropup" : '';
		$rightdropup = ($rightdropup == 'yes') ? "pull-right" : '';

		$output = '
		<div class="btn-group ' . $dropup . ' ">
		<a target="_'.$target.'" class="btn ' . $size . '' . $color. '" href="'. $url .'"><i class="' . $icon . ' ' . $iconsize. '"></i> ' .$label. ' </a><a class="btn ' . $size . '' . $color . ' dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
		<ul class="dropdown-menu ' . $rightdropup . '">
		'.do_shortcode($content).'
		</ul>
		</div>';

		return $output;
	}
	add_shortcode('tboot_button_split_dropdown', 'tboot_button_split_dropdown_shortcode');
}


/*
 * Button Dropdown
 * @since v1.0
 */
if ( !function_exists( 'tboot_button_dropdown_shortcode' ) ) {
	function tboot_button_dropdown_shortcode( $atts, $content = null ) {

		wp_enqueue_script('bootstrap_js');

		extract(shortcode_atts(array(
			'label' => '',
			'color' => 'primary',
			'size' => '',
			'target' => 'self',
			'icon' => '',
			'iconsize' => '',
			'dropup' => '',
			'rightdropup' => '',
			), $atts));

		
		$color = ($color <> '') ? "btn-$color" : '';
		$size = ($size <> '') ? "btn-$size " : '';
		$iconsize = ($iconsize <> '') ? "icon-$iconsize" : '';
		$icon = ($icon <> '') ? "icon-$icon" : '';
		$dropup = ($dropup == 'yes') ? "dropup" : '';
		$rightdropup = ($rightdropup == 'yes') ? "pull-right" : '';

		$output = '
		<div class="btn-group ' . $dropup . ' ">
		<a class="btn ' . $size . '' . $color. ' dropdown-toggle" data-toggle="dropdown" href="#"><i class="' . $icon . ' ' . $iconsize. '"></i> ' .$label. ' <span class="caret"></span></a>
		<ul class="dropdown-menu ' . $rightdropup . '">
		'.do_shortcode($content).'
		</ul>
		</div>';

		return $output;
	}
	add_shortcode('tboot_button_dropdown', 'tboot_button_dropdown_shortcode');
}


//Button Dropdown Link
if ( !function_exists( 'tboot_dropdown_link_shortcode' ) ) {
	function tboot_dropdown_link_shortcode( $atts, $content = null ) {

		wp_enqueue_script('bootstrap_js');

		extract(shortcode_atts(array(
			'url' => '',
			'target' => '',
			'icon' => '',
			'iconsize' => '',
			), $atts));

		$iconsize = ($iconsize <> '') ? "icon-$iconsize" : '';
		$icon = ($icon <> '') ? "icon-$icon" : '';

		$output = '
		<li><a target="_'.$target.'" href="'. $url .'"><i class="' . $icon . ' ' . $iconsize. '"></i> '.do_shortcode($content).'</a></li>';

		return $output;
	}
	add_shortcode('tboot_dropdown_link', 'tboot_dropdown_link_shortcode');
}

//Dropdown Divider
if ( !function_exists( 'tboot_dropdown_divider_shortcode' ) ) {
	function tboot_dropdown_divider_shortcode( $atts, $content = null ) {

		$output = '
		<li class="divider"></li>';

		return $output;
	}
	add_shortcode('tboot_dropdown_divider', 'tboot_dropdown_divider_shortcode');
}


/*
 * Carousel
 * @since v1.0
 */
if ( !function_exists( 'tboot_carousel_shortcode' ) ) {
	function tboot_carousel_shortcode( $atts, $content = null ) {

		wp_enqueue_script('bootstrap_js');

		extract(shortcode_atts(array(
			'name' => '',
			), $atts));

		$output = '
		<div id="'.$name.'" class="carousel slide">
		<div class="carousel-inner">
		'.do_shortcode($content).'
		</div><a class="left carousel-control" href="#'.$name.'" data-slide="prev"><span class="icon-prev"></span></a><a class="right carousel-control" href="#'.$name.'" data-slide="next"><span class="icon-next"></span></a>
		</div>';

		return $output;
	}
	add_shortcode('tboot_carousel', 'tboot_carousel_shortcode');
}


//Single Carousel Image
if ( !function_exists( 'tboot_carousel_image_shortcode' ) ) {
	function tboot_carousel_image_shortcode( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'first' => '',
			'title' => '',
			'link' => '',
			'caption' => '',
			), $atts));

		$first = ($first == 'yes') ? ' active' : '';
		$caption = ($caption <> '') ? "<div class='carousel-caption'><h3>$title</h3><p>$caption</p></div>" : '';

		$out = '<div class="item' .$first. '"><img src="'  .$link. '">' .$caption. '</div>';

		return $out;


	}
	add_shortcode('tboot_carousel_image', 'tboot_carousel_image_shortcode');
}


/*
 * Icons
 * @since v1.0
 *
 */
if( !function_exists('tboot_icon_shortcode') ) {
	function tboot_icon_shortcode( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'icon' => '',
			'size'  => '',
			'spin'  => '',
			'border'  => '',
			'align'  => '',
			'muted'  => '',
			'rotate'  => '',
			'flip'  => '',
			), $atts));

		$size = ($size <> '') ? "icon-$size" : '';
		$spin = ($spin == 'yes') ? "icon-spin" : '';
		$border = ($border == 'yes') ? "icon-border" : '';
		$align = ($align <> '') ? "pull-$align" : '';
		$muted = ($muted == 'yes') ? "icon-muted" : '';
		$rotate = ($rotate <> '') ? "icon-$rotate" : '';
		$flip = ($flip <> '') ? "icon-flip-$flip" : '';

		$out = '<i class="icon-' . $icon . ' ' . $size. ' ' . $spin. ' ' . $border. ' ' . $align. ' ' . $muted. ' ' . $rotate. ' ' . $flip. '"></i>';

		return $out;
	}
	add_shortcode('tboot_icon', 'tboot_icon_shortcode');
}


/*
 * Icon Stacked 
 * @since v3.0.0
 *
 */
if( !function_exists('tboot_iconstack_shortcode') ) {
	function tboot_iconstack_shortcode( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'icon' => '',
			'top'  => '',
			
			), $atts));

		$out = '<span class="icon-stack"><i class="icon-' . $icon . ' icon-stack-base"></i><i class="icon-' . $top . '"></i></span>';

		return $out;
	}
	add_shortcode('tboot_iconstack', 'tboot_iconstack_shortcode');
}


/*
 * Icon List
 * @since v3.0.0
 *
 */
if( !function_exists('tboot_iconlist_shortcode') ) {
	function tboot_iconlist_shortcode( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'icon' => '',
			'top'  => '',
			
			), $atts));

		$out = '<ul class="icons-ul"> '.do_shortcode($content).'</ul>';

		return $out;
	}
	add_shortcode('tboot_iconlist', 'tboot_iconlist_shortcode');
}

/*
 * Icon List Item
 * @since v3.0.0
 *
 */
if( !function_exists('tboot_iconitem_shortcode') ) {
	function tboot_iconitem_shortcode( $atts, $content = null ) {
		extract(shortcode_atts(array(
					'icon' => '',
			), $atts));

		$out = '<li><i class="icon-li icon-' . $icon . '"></i>'.do_shortcode($content).'</li>';

		return $out;
	}
	add_shortcode('tboot_iconitem', 'tboot_iconitem_shortcode');
}


/*
 * Well
 * @since v1.0
 *
 */
if( !function_exists('tboot_well_shortcode') ) { 
	function tboot_well_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'width' => ''
			), $atts ) );


		return '<div class="well" style="width:'. $width .';">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('tboot_well', 'tboot_well_shortcode');
}


/*
 * Alerts
 * @since v1.0
 *
 */
if( !function_exists('tboot_alert_shortcode') ) { 
	function tboot_alert_shortcode( $atts, $content = null ) {

		wp_enqueue_script('bootstrap_js');

		extract( shortcode_atts( array(
			'color' => '',
			'heading' => '',
			'width' => ''
			), $atts ) );

		$color = ($color <> '') ? "alert-$color" : '';
		$heading = ($heading <> '') ? "<h4 class='alert-heading'>$heading</h4>" : '';

		$alert_content = '';
		$alert_content .= '<div class="alert ' . $color . '" style="width:'. $width .';">';
		$alert_content .= '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
		$alert_content .= ' '. $heading .' ';
		$alert_content .= ' <p>'. do_shortcode($content) .'</p></div>';
		return $alert_content;
	}
	add_shortcode('tboot_alert', 'tboot_alert_shortcode');
}



/*
 * Testimonial
 * @since v1.0
 *
 */
if( !function_exists('tboot_testimonial_shortcode') ) { 
	function tboot_testimonial_shortcode( $atts, $content = null  ) {
		extract( shortcode_atts( array(
			'by' => ''
			), $atts ) );
		$testimonial_content = '';
		$testimonial_content .= '<div class="tboot-testimonial"><div class="tboot-testimonial-content">';
		$testimonial_content .= $content;
		$testimonial_content .= '</div><div class="tboot-testimonial-author">';
		$testimonial_content .= $by .'</div></div>';	
		return $testimonial_content;
	}
	add_shortcode( 'tboot_testimonial', 'tboot_testimonial_shortcode' );
}



/*
 * Column Wrap
 * @since v1.0
 *
 */
if( !function_exists('tboot_column_wrap_shortcode') ) {
	function tboot_column_wrap_shortcode( $atts, $content = null ){
		extract( shortcode_atts( array(
			
			), $atts ) );
		return '<div class="row">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('tboot_column_wrap', 'tboot_column_wrap_shortcode');
}

/*
 * Columns
 * @since v1.0
 *
 */
if( !function_exists('tboot_column_shortcode') ) {
	function tboot_column_shortcode( $atts, $content = null ){
		extract( shortcode_atts( array(
			'size' => '4',
			), $atts ) );
		return '<div class="col-lg-' . $size . '">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('tboot_column', 'tboot_column_shortcode');
}



/*
 * Toggle
 * @since v1.0
 */
if( !function_exists('tboot_toggle_shortcode') ) {
	function tboot_toggle_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array( 'title' => 'Toggle Title' ), $atts ) );

		// Enque scripts
		wp_enqueue_script('tboot_toggle');
		
		// Display the Toggle
		return '<div class="tboot-toggle"><h3 class="tboot-toggle-trigger">'. $title .'</h3><div class="tboot-toggle-container">' . do_shortcode($content) . '</div></div>';
	}
	add_shortcode('tboot_toggle', 'tboot_toggle_shortcode');
}


/*
 * Accordion
 * @since v1.0
 *
 */

// Main
if( !function_exists('tboot_accordion_main_shortcode') ) {
	function tboot_accordion_main_shortcode( $atts, $content = null  ) {
		
		// Enque scripts
		wp_enqueue_script('jquery-ui-accordion');
		wp_enqueue_script('tboot_accordion');
		
		// Display the accordion	
		return '<div class="tboot-accordion">' . do_shortcode($content) . '</div>';
	}
	add_shortcode( 'tboot_accordion', 'tboot_accordion_main_shortcode' );
}


// Section
if( !function_exists('tboot_accordion_section_shortcode') ) {
	function tboot_accordion_section_shortcode( $atts, $content = null  ) {
		extract( shortcode_atts( array(
			'title' => 'Title',
			), $atts ) );

		return '<h3 class="tboot-accordion-trigger"><a href="#">'. $title .'</a></h3><div>' . do_shortcode($content) . '</div>';
	}
	
	add_shortcode( 'tboot_accordion_section', 'tboot_accordion_section_shortcode' );
}


/*
 * Accordion Bootstrap
 * @since v1.0
 *
 */
if( !function_exists('tboot_accordion_bootstrap_shortcode') ) {
	function tboot_accordion_bootstrap_shortcode( $atts, $content = null ) {

		wp_enqueue_script('bootstrap_js');

		extract(shortcode_atts(array(
			'name' => '',
			), $atts));

		$output = '
		<div class="panel-group" id="'.$name.'">
		'.do_shortcode($content).'
		</div>';

		return $output;
	}
	add_shortcode('tboot_accordion_bootstrap', 'tboot_accordion_bootstrap_shortcode');
}

//Accordion Bootstrap Content
if( !function_exists('tboot_accordion_bootstrap_section_shortcode') ) {
	function tboot_accordion_bootstrap_section_shortcode( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'name' => '',
			'heading' => '',
			'number' => '',
			'color' => '',
			'open' => '',
			), $atts));

		$open = ($open == 'yes') ? 'in' : '';

		$output = '

		<div class="panel panel-'.$color.'">
		<div class="panel-heading">
		<h4 class="panel-title">
		<a class="accordion-toggle" data-toggle="collapse" data-parent="#'.$name.'" href="#collapse'.$number.'">'. $heading .'</a>
		</h4>
		</div>
		<div id="collapse'.$number.'" class="panel-collapse collapse ' .$open. '">
		<div class="panel-body"> 
		'.do_shortcode($content).'
		</div>
		</div>
		</div>

		';

		return $output;
	}
	add_shortcode('tboot_accordion_bootstrap_section', 'tboot_accordion_bootstrap_section_shortcode');
}


/*
 * Tabs
 * @since v1.0
 *
 */
if (!function_exists('tboot_tabgroup_shortcode')) {
	function tboot_tabgroup_shortcode( $atts, $content = null ) {
		
		//Enque scripts
		wp_enqueue_script('jquery-ui-tabs');
		wp_enqueue_script('tboot_tabs');
		
		// Display Tabs
		$defaults = array();
		extract( shortcode_atts( $defaults, $atts ) );
		preg_match_all( '/tab title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );
		$tab_titles = array();
		if( isset($matches[1]) ){ $tab_titles = $matches[1]; }
		$output = '';
		if( count($tab_titles) ){
			$output .= '<div id="tboot-tab-'. rand(1, 100) .'" class="tboot-tabs">';
			$output .= '<ul class="ui-tabs-nav tboot-clearfix">';
			foreach( $tab_titles as $tab ){
				$output .= '<li><a href="#tboot-tab-'. sanitize_title( $tab[0] ) .'">' . $tab[0] . '</a></li>';
			}
			$output .= '</ul>';
			$output .= do_shortcode( $content );
			$output .= '</div>';
		} else {
			$output .= do_shortcode( $content );
		}
		return $output;
	}
	add_shortcode( 'tboot_tabgroup', 'tboot_tabgroup_shortcode' );
}
if (!function_exists('tboot_tab_shortcode')) {
	function tboot_tab_shortcode( $atts, $content = null ) {
		$defaults = array( 'title' => 'Tab' );
		extract( shortcode_atts( $defaults, $atts ) );
		return '<div id="tboot-tab-'. sanitize_title( $title ) .'" class="tab-content">'. do_shortcode( $content ) .'</div>';
	}
	add_shortcode( 'tboot_tab', 'tboot_tab_shortcode' );
}


/*
 * Tabs Bootstrap
 * @since v1.0
 *
 */
if (!function_exists('tboot_tab_bootstrap_shortcode')) {
	function tboot_tab_bootstrap_shortcode( $atts, $content = null ) {

		wp_enqueue_script('bootstrap_js');

		extract(shortcode_atts(array(
			'location' => '',
			), $atts));

		$output = '
		<div class="tabbable ' .$location. '">
		'.do_shortcode($content).'
		</div>';

		return $output;
	}
	add_shortcode('tboot_tab_bootstrap', 'tboot_tab_bootstrap_shortcode');
}

//Tab Title Section
if (!function_exists('tboot_tab_titlesection_shortcode')) {
	function tboot_tab_titlesection_shortcode( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'type' => '',
			), $atts));

		$output = '
		<ul class="nav nav-' .$type. '">
		'.do_shortcode($content).'
		</ul>';

		return $output;
	}
	add_shortcode('tboot_tab_titlesection', 'tboot_tab_titlesection_shortcode');
}

//Tab Titles
if (!function_exists('tboot_tab_tabtitle_shortcode')) {
	function tboot_tab_tabtitle_shortcode( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'active' => '',
			'number' => '',
			), $atts));

		$active = ($active == 'yes') ? "class='active'" : '';

		$output = '
		<li ' .$active. '><a href="#' .$number. '" data-toggle="tab">'.do_shortcode($content).'</a></li>';

		return $output;
	}
	add_shortcode('tboot_tab_tabtitle', 'tboot_tab_tabtitle_shortcode');
}

//Tab Title Section
if (!function_exists('tboot_tab_contentsection_shortcode')) {
	function tboot_tab_contentsection_shortcode( $atts, $content = null ) {


		$output = '
		<div class="tab-content">
		'.do_shortcode($content).'
		</div>';

		return $output;
	}
	add_shortcode('tboot_tab_contentsection', 'tboot_tab_contentsection_shortcode');
}

//Tab Content
if (!function_exists('tboot_tab_tabcontent_shortcode')) {
	function tboot_tab_tabcontent_shortcode( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'active' => '',
			'number' => '',
			), $atts));

		$active = ($active == 'yes') ? "active" : '';

		$output = '

		<div class="tab-pane ' .$active. '" id="' .$number. '">
		<p>'.do_shortcode($content).'</p>
		</div>';

		return $output;
	}
	add_shortcode('tboot_tab_tabcontent', 'tboot_tab_tabcontent_shortcode');
}


/*
 * Labels
 * @since v1.0
 *
 */
if( !function_exists('tboot_label_shortcode') ) {
	function tboot_label_shortcode( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'color' => 'default',
			), $atts));

		$out = '<span class="label label-' . $color . '">' .do_shortcode($content). '</span>';

		return $out;
	}
	add_shortcode('tboot_label', 'tboot_label_shortcode');
}

/*
 * Jumbotron
 * @since v3.0.0
 *
 */
if( !function_exists('tboot_jumbotron_shortcode') ) {
	function tboot_jumbotron_shortcode( $atts, $content = null ) {
		

		$out = '<div class="jumbotron">' .do_shortcode($content). '</div>';

		return $out;
	}
	add_shortcode('tboot_jumbotron', 'tboot_jumbotron_shortcode');
}

/*
 * Badge
 * @since v1.0
 *
 */
if( !function_exists('tboot_badge_shortcode') ) {
	function tboot_badge_shortcode( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'color' => '',
			), $atts));

		$out = '<span class="badge badge-' . $color . '">' .do_shortcode($content). '</span>';

		return $out;
	}
	add_shortcode('tboot_badge', 'tboot_badge_shortcode');
}


/*
 * Progress Bars
 * @since v1.0
 *
 */
if( !function_exists('tboot_progress_bar_shortcode') ) {
	function tboot_progress_bar_shortcode( $atts, $content = null ) {

		wp_enqueue_script('bootstrap_js');

		extract(shortcode_atts(array(
			'width' => '',
			'strip' => '',
			'animate' => '',
			'style' => '',
			), $atts));

		$strip = ($strip == 'yes') ? 'progress-striped' : '';
		$animate = ($animate == 'yes') ? 'active' : '';
		$style = ($style <> '') ? "progress-bar-$style" : '';

		$out = '<div class="progress ' . $strip . ' ' . $animate . '"><div class="progress-bar ' . $style . '"  style="width:' . $width . '%">' .do_shortcode($content). '</div></div>';

		return $out;
	}
	add_shortcode('tboot_progress_bar', 'tboot_progress_bar_shortcode');
}


//Stacked Progress Bars Container
if( !function_exists('tboot_stacked_progress_bar_shortcode') ) {
	function tboot_stacked_progress_bar_shortcode( $atts, $content = null ) {

		wp_enqueue_script('bootstrap_js');

		$out = '<div class="progress">' .do_shortcode($content). '</div>';

		return $out;
	}
	add_shortcode('tboot_stacked_progress_bar', 'tboot_stacked_progress_bar_shortcode');
}

//Single Progress Bars
if( !function_exists('tboot_single_stacked_bar_shortcode') ) {
	function tboot_single_stacked_bar_shortcode( $atts, $content = null ) {

		wp_enqueue_script('bootstrap_js');

		extract(shortcode_atts(array(
			'width' => '',
			'style' => '',
			), $atts));


		$style = ($style <> '') ? "progress-bar-$style" : '';

		$out = '<div class="progress-bar ' . $style .' " style="width:' . $width . '%">' .do_shortcode($content). '</div>';

		return $out;
	}
	add_shortcode('tboot_single_stacked_bar', 'tboot_single_stacked_bar_shortcode');
}


/*
 * Tooltip
 * @since v1.0
 *
 */
if( !function_exists('tboot_tooltip_shortcode') ) {
	function tboot_tooltip_shortcode( $atts, $content = null ) {

		wp_enqueue_script('bootstrap_js');
		wp_enqueue_script('tboot_bootstrap');

		extract(shortcode_atts(array(
			'text' => '',
			'placement' => 'top',
			'color' => '',
			'size' => '',
			), $atts));

		$color = ($color <> '') ? "btn btn-$color" : '';
		$size = ($size <> '') ? "btn-$size" : '';

		$out = '<a class="' . $color . ' ' .$size. '" href="#" data-toggle="tooltip" rel="tooltip" data-placement="'. $placement .'" data-original-title="' . $text .'">' .do_shortcode($content). '</a>';

		return $out;
	}
	add_shortcode('tboot_tooltip', 'tboot_tooltip_shortcode');
}

/*
 * Popover
 * @since v1.0
 *
 */
if( !function_exists('tboot_popover_shortcode') ) {
	function tboot_popover_shortcode( $atts, $content = null ) {

		wp_enqueue_script('bootstrap_js');
		wp_enqueue_script('tboot_bootstrap');

		extract(shortcode_atts(array(
			'title' => '',
			'popcontent' => '',
			'placement' => 'top',
			), $atts));

		$out = '<a href="#" rel="popover" data-placement="'. $placement .'" data-content="' . $popcontent . '" data-original-title="' . $title .'">' .do_shortcode($content). '</a>';

		return $out;
	}
	add_shortcode('tboot_popover', 'tboot_popover_shortcode');
}


/*
 * Table
 * @since v1.0
 *
 */
if( !function_exists('tboot_table_shortcode') ) {
	function tboot_table_shortcode( $atts ) {
		extract( shortcode_atts( array(
			'cols' => 'none',
			'data' => 'none',
			'strip' => '',
			'style' => '',
			'border' => '',
			'condense' => '',
			'hover' => '',
			), $atts ) );

		$strip = ($strip == 'yes') ? 'table-striped' : '';
		$border = ($border == 'yes') ? 'table-bordered' : '';
		$condense = ($condense == 'yes') ? 'table-condensed' : '';
		$hover = ($hover == 'yes') ? 'table-hover' : '';

		$cols = explode(',',$cols);
		$data = explode(',',$data);
		$total = count($cols);
		$output = '<table class="table ' . $strip . ' ' . $border . ' ' . $condense . ' ' . $hover . '"><tr>';
		foreach($cols as $col):
			$output .= '<th>'. $col . '</th>';
		endforeach;
		$output .= '</tr><tr>';
		$counter = 1;
		foreach($data as $datum):
			$output .= '<td>'. $datum .'</td>';
		if($counter%$total==0):
			$output .= '</tr>';
		endif;
		$counter++;
		endforeach;
		$output .= '</table>';
		return $output;
	}
	add_shortcode( 'tboot_table', 'tboot_table_shortcode' );
}

/**
* Highlights
* @since 1.0
*/
if ( !function_exists( 'tboot_highlight_shortcode' ) ) {
	function tboot_highlight_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'color' => 'yellow',
			'class' => '',
		  ),
		  $atts ) );
		  return '<span class="tboot-highlight tboot-highlight-'. $color .' '. $class .'">' . do_shortcode( $content ) . '</span>';
	
	}
	add_shortcode('tboot_highlight', 'tboot_highlight_shortcode');
}


/**
* Modal
* @since 3.0
*/
if ( !function_exists( 'tboot_modal_shortcode' ) ) {
	function tboot_modal_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'id' => '1',
			'header' => '',
			'color' => 'primary',
			'size' => 'lg',
			'text' => 'Click Here',
		  ),
		  $atts ) );
		  return '<div class="modal fade" id="myModal'. $id .'" style="display: none;" tabindex="-1" role="dialog"><div class="modal-dialog"><div class="modal-content"><div class="modal-header">

					<button class="close" type="button" data-dismiss="modal">×</button>
					<h4 class="modal-title" id="myModalLabel">'. $header .'</h4>
					</div>
					<div class="modal-body">
					' . do_shortcode( $content ) . '
					</div>
					<div class="modal-footer"><button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
					</div>
					</div>
					<!-- /.modal-content -->

					</div>
					<!-- /.modal-dialog -->

					</div><a class="btn btn-'. $color .' btn-'. $size .'" href="#myModal'. $id .'" data-toggle="modal">'. $text .'</a>';
	
	}
	add_shortcode('tboot_modal', 'tboot_modal_shortcode');
}





/*
 * Pricing Table
 * @since v1.0
 *
 */

/*main*/
if( !function_exists('tboot_pricing_table_shortcode') ) {
	function tboot_pricing_table_shortcode( $atts, $content = null  ) {
		return '<div class="tboot-pricing-table"><div class="row">' . do_shortcode($content) . '</div></div><div class="tboot-clear-floats"></div>';
	}
	add_shortcode( 'tboot_pricing_table', 'tboot_pricing_table_shortcode' );
}

/*section*/
if( !function_exists('tboot_pricing_shortcode') ) {
	function tboot_pricing_shortcode( $atts, $content = null  ) {
		
		extract( shortcode_atts( array(
			'size' => '4',
			'position' => '',
			'featured' => 'no',
			'plan' => 'Basic',
			'cost' => '$20',
			'per' => 'month',
			'button_url' => 'http://bragthemes.com',
			'button_text' => 'Purchase',
			'button_color' => 'blue',
			'button_target' => 'self',
			'button_rel' => 'nofollow'
			), $atts ) );
		
		//set variables
		$featured_pricing = ( $featured == 'yes' ) ? 'featured' : NULL;
		
		//start content  
		$pricing_content ='';
		$pricing_content .= '<div class="col-lg-'. $size .'">';
		$pricing_content .= '<div class="tboot-pricing '. $featured_pricing .'">';
		$pricing_content .= '<div class="tboot-pricing-header">';
		$pricing_content .= '<h5>'. $plan. '</h5>';
		$pricing_content .= '<div class="tboot-pricing-cost">'. $cost .'</div><div class="tboot-pricing-per">'. $per .'</div>';
		$pricing_content .= '</div>';
		$pricing_content .= '<div class="tboot-pricing-content">';
		$pricing_content .= ''. $content. '';
		$pricing_content .= '</div>';
		if( $button_text ) {
			$pricing_content .= '<div class="tboot-pricing-button"><a href="'. $button_url .'" class="btn btn-large btn-'. $button_color .'" target="_'. $button_target .'" rel="'. $button_rel .'">'. $button_text .'</a></div>';
		}
		$pricing_content .= '</div>';
		$pricing_content .= '</div>';  
		return $pricing_content;
	}
	
	add_shortcode( 'tboot_pricing', 'tboot_pricing_shortcode' );
}