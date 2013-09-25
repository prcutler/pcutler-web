<?php
/**
 * Adds custom CSS to the wp_head() hook.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Office
 * @since Office 1.0
 */


if ( !function_exists( 'bi_custom_css' ) ) {
	
	add_action('wp_head', 'bi_custom_css');
	function bi_custom_css() {
			
			$custom_css ='';
			
			/**custom css field**/
			if(bi_get_data('custom_css_box')) {
				$custom_css .= bi_get_data('custom_css_box');
			}
			
			//background image
			$custom_background = bi_get_data('custom_bg');
			if( $custom_background == '' || $custom_background == get_template_directory_uri().'/images/bg/bg0.png' ) {
			} elseif( $custom_background !== '' && $custom_background !== get_template_directory_uri().'/images/bg/bg_20.png') {
				$custom_css .= 'body{background-image: url('. $custom_background .');}';
			} else {
				$custom_css .= 'body{background-image: none;}';
			}
			
			//background color
			if( bi_get_data('background_color', '#d9d9d9') !== '#d9d9d9') {
				$custom_css .= 'body{background-color: '.bi_get_data('background_color').';}';
			}
			
			//header padding
			if(bi_get_data('header_padding') && bi_get_data('header_padding') !==  '25px'){
				$custom_css .= 'header{padding-top: '.bi_get_data('header_padding').'; padding-bottom: '.bi_get_data('header_padding').';}';
			}	
			
			//header
			if(bi_get_data('header_background') !== '#FFF') {
				$custom_css .= 'header { background: '.bi_get_data('header_background').';}';
			}

			if(bi_get_data('disable_fixed_navbar') == '1') {
				$custom_css .= 'body { padding-top: 70px; }';
			}

			//body text color
			if(bi_get_data('main_text_color') !== '#333333') {
				$custom_css .= 'body { color: '.bi_get_data('main_text_color').';}';
			}
			
			//body link color
			if(bi_get_data('main_link_color') !== '#428bca') {
				$custom_css .= 'a { color: '.bi_get_data('main_link_color').';}';
			}

			//body link hover color
			if(bi_get_data('main_link_hover_color') !== '#2a6496') {
				$custom_css .= 'a:hover, a:focus { color: '.bi_get_data('main_link_hover_color').';}';
			}
			
			//navbar color
			if(bi_get_data('navbar_color') !== '#eeeeee') {
				$custom_css .= '.navbar {background-color: '.bi_get_data('navbar_color').' !important;}';
			}

			//navbar brand
			if(bi_get_data('navbar_brand_color') !== '#777777') {
				$custom_css .= '.navbar-brand {color: '.bi_get_data('navbar_brand_color').' !important;}';
			}

			//navbar brand
			if(bi_get_data('navbar_brand_color_hover') !== '#5e5e5e') {
				$custom_css .= '.navbar-brand:hover, .navbar-brand:focus {color: '.bi_get_data('navbar_brand_color_hover').' !important;}';
			}

			//navbar menu links
			if(bi_get_data('navbar_menu_links') !== '#777777') {
				$custom_css .= '.navbar-nav > li > a, .navbar-nav > .active > a, .navbar-nav > .active > a:hover, .navbar-nav > .active > a:focus 
				 {color: '.bi_get_data('navbar_menu_links').' !important;}';
			}

			//navbar menu links hover
			if(bi_get_data('navbar_menu_links_hover') !== '#333333') {
				$custom_css .= '.navbar-nav > li > a:hover, .navbar-nav > li > a:focus 
				 {color: '.bi_get_data('navbar_menu_links_hover').' !important;}';
			}

			//navbar menu link background color
			if(bi_get_data('navbar_menu_link_bg') !== '#d5d5d5') {
				$custom_css .= '.navbar-nav > .open > a, .navbar-nav > .open > a:hover, .navbar-nav > .open > a:focus, .navbar-nav > .active > a, .navbar-nav > .active > a:hover, .navbar-nav > .active > a:focus 
				 {background-color: '.bi_get_data('navbar_menu_link_bg').' !important;}';
			}

			//navbar dropdown menu link color
			if(bi_get_data('navbar_dd_link') !== '#333333') {
				$custom_css .= '.dropdown-menu > li > a 
				 {color: '.bi_get_data('navbar_dd_link').' !important;}';
			}

			//navbar dropdown menu link hover color
			if(bi_get_data('navbar_dd_hover_link') !== '#FFFFFF') {
				$custom_css .= '.dropdown-menu > li > a:hover, .dropdown-menu > li > a:focus 
				 {color: '.bi_get_data('navbar_dd_hover_link').' !important;}';
			}

			//navbar dropdown menu link background color
			if(bi_get_data('navbar_bg_hover_link') !== '#357ebd') {
				$custom_css .= '.dropdown-menu > li > a:hover, .dropdown-menu > li > a:focus 
				 {background-color: '.bi_get_data('navbar_bg_hover_link').' !important;
					background-image: -webkit-gradient(linear, left 0%, left 100%, from('.bi_get_data('navbar_bg_hover_link').'), to('.bi_get_data('navbar_bg_hover_link').'));
					background-image: -webkit-linear-gradient(top, '.bi_get_data('navbar_bg_hover_link').', 0%, '.bi_get_data('navbar_bg_hover_link').', 100%);
					background-image: -moz-linear-gradient(top, '.bi_get_data('navbar_bg_hover_link').' 0%, '.bi_get_data('navbar_bg_hover_link').' 100%);
					background-image: linear-gradient(to bottom, '.bi_get_data('navbar_bg_hover_link').' 0%, '.bi_get_data('navbar_bg_hover_link').' 100%);}';
			}

			//jumbotron background color
			if(bi_get_data('jumbotron_bg') !== '#eeeeee') {
				$custom_css .= '.jumbotron 
				 {background-color: '.bi_get_data('jumbotron_bg').' !important;}';
			}

			//jumbotron text color
			if(bi_get_data('jumbotron_text_color') !== '#333333') {
				$custom_css .= '.jumbotron h1, .jumbotron h2, .jumbotron p 
				 {color: '.bi_get_data('jumbotron_text_color').' !important;}';
			}

			//jumbotron button color
			if(bi_get_data('jumbotron_button_color') !== '#474949') {
				$custom_css .= '.jumbotron .btn-default
				 {background-color: '.bi_get_data('jumbotron_button_color').' !important;
				 border-color: '.bi_get_data('jumbotron_button_color').' !important; 
				color: #ffffff;}';
			}

			//jumbotron button hover color
			if(bi_get_data('jumbotron_button_hover_color') !== '#3a3c3c') {
				$custom_css .= '.jumbotron .btn-default:hover, .jumbotron .btn-default:focus, .jumbotron .btn-default:active, .jumbotron .btn-default.active
				 {background-color: '.bi_get_data('jumbotron_button_hover_color').' !important;
				 border-color: '.bi_get_data('jumbotron_button_hover_color').' !important; }';
			}

			//homepage heading color
			if(bi_get_data('home_widget_heading') !== '#333333') {
				$custom_css .= '.home-widgets h3 
				 {color:'.bi_get_data('home_widget_heading').' !important;}';
			}

			//homepage text color
			if(bi_get_data('home_widget_text') !== '#333333') {
				$custom_css .= '.home #widgets ul, .home #widgets .textwidget, .home #widgets .tagcloud, .home #widgets #searchform, .home #widgets #calendar_wrap 
				 {color:'.bi_get_data('home_widget_text').' !important;}';
			}

			//read more button color
			if(bi_get_data('read_more_button_color') !== '#474949') {
				$custom_css .= '.readmore.btn-default
				 {background-color: '.bi_get_data('read_more_button_color').' !important;
				 border-color: '.bi_get_data('read_more_button_color').' !important;
				 color: #ffffff; }';
			}

			//read more button hover color
			if(bi_get_data('read_more_button_hover_color') !== '#3a3c3c') {
				$custom_css .= '.readmore.btn-default:hover, .readmore.btn-default:focus, .readmore.btn-default:active, .readmore.btn-default.active
				 {background-color: '.bi_get_data('read_more_button_hover_color').' !important;
				 border-color: '.bi_get_data('read_more_button_hover_color').' !important; }';
			}

			//breadcrumb bg color
			if(bi_get_data('breadcrumb_bg') !== '#f5f5f5') {
				$custom_css .= '.breadcrumb 
				 {background-color: '.bi_get_data('breadcrumb_bg').' !important;}';
			}

			//breadcrumb link color
			if(bi_get_data('breadcrumb_link') !== '#428bca') {
				$custom_css .= '.breadcrumb a
				 {color: '.bi_get_data('breadcrumb_link').' !important;}';
			}

			//breadcrumb link active
			if(bi_get_data('breadcrumb_active') !== '#999999') {
				$custom_css .= '.breadcrumb > .active 
				 {color: '.bi_get_data('breadcrumb_active').' !important;}';
			}

			//breadcrumb link active
			if(bi_get_data('breadcrumb_sep') !== '#cccccc') {
				$custom_css .= '.breadcrumb > li + li:before 
				 {color: '.bi_get_data('breadcrumb_sep').' !important;}';
			}

			//sidebar bg color
			if(bi_get_data('sidebar_bg') !== '#f5f5f5') {
				$custom_css .= '.well 
				 {background-color: '.bi_get_data('sidebar_bg').' !important;}';
			}

			//sidebar border color
			if(bi_get_data('sidebar_border') !== '#e3e3e3') {
				$custom_css .= '.well 
				 {border: 1px solid '.bi_get_data('sidebar_border').' !important;}';
			}

			//sidebar heading color
			if(bi_get_data('sidebar_heading') !== '#333333') {
				$custom_css .= '.well .widget-title 
				 {color:'.bi_get_data('sidebar_heading').' !important;}';
			}

			//sidebar text color
			if(bi_get_data('sidebar_text') !== '#333333') {
				$custom_css .= '#widgets ul, #widgets .textwidget, #widgets .tagcloud, #widgets #searchform, #widgets #calendar_wrap 
				 {color:'.bi_get_data('sidebar_text').' !important;}';
			}

			//sidebar link color
			if(bi_get_data('sidebar_link') !== '#428bca') {
				$custom_css .= '.well a 
				 {color:'.bi_get_data('sidebar_link').' !important;}';
			}

			//sidebar link hover color
			if(bi_get_data('sidebar_link_hover') !== '#2a6496') {
				$custom_css .= '.well a:hover, .well a:focus
				 {color:'.bi_get_data('sidebar_link_hover').' !important;}';
			}

			//social link color
			if(bi_get_data('social_link') !== '#428bca') {
				$custom_css .= '.social-icons a 
				 {color:'.bi_get_data('social_link').' !important;}';
			}

			//social link hover color
			if(bi_get_data('social_link_hover') !== '#2a6496') {
				$custom_css .= '.social-icons a:hover, .social-icons a:focus
				 {color:'.bi_get_data('social_link_hover').' !important;}';
			}

			//portfolio filter button color
			if(bi_get_data('filter_button_color') !== '#474949') {
				$custom_css .= '#portfolio-filter .btn-default
				 {background-color: '.bi_get_data('filter_button_color').' !important;
				 border-color: '.bi_get_data('filter_button_color').' !important; 
				color: #ffffff;}';
			}

			//portfolio filter button hover color
			if(bi_get_data('filter_button_hover_color') !== '#3a3c3c') {
				$custom_css .= '#portfolio-filter .btn-default:hover, #portfolio-filter .btn-default:focus, #portfolio-filter .btn-default:active, #portfolio-filter .btn-default.active
				 {background-color: '.bi_get_data('filter_button_hover_color').' !important;
				 border-color: '.bi_get_data('filter_button_hover_color').' !important; 
				color: #ffffff;}';
			}

				//portfolio button color
			if(bi_get_data('portfolio_button_color') !== '#474949') {
				$custom_css .= '.project-links .btn-default
				 {background-color: '.bi_get_data('portfolio_button_color').' !important;
				 border-color: '.bi_get_data('portfolio_button_color').' !important; 
				color: #ffffff;}';
			}

			//portfolio button hover color
			if(bi_get_data('portfolio_button_hover_color') !== '#3a3c3c') {
				$custom_css .= '.project-links .btn-default:hover, .project-links .btn-default:focus, .project-links .btn-default:active, .project-links .btn-default.active
				 {background-color: '.bi_get_data('portfolio_button_hover_color').' !important;
				 border-color: '.bi_get_data('portfolio_button_hover_color').' !important; }';
			}
		
			//brand typography
			if(bi_get_data('brand_font_size') !== '13px') {
				$custom_css .= '.navbar-brand { font-size: '.bi_get_data('brand_font_size').'; }';
			}
			if(bi_get_data('brand_font_style') == 'normal') {
				$custom_css .= '.navbar-brand { font-weight: normal; }';
			}
			if(bi_get_data('brand_font_style') == 'italic') {
				$custom_css .= '.navbar-brand { font-style: italic; font-weight: normal; }';
			}
			if(bi_get_data('brand_font_style') == 'bold italic') {
				$custom_css .= '.navbar-brand { font-style: italic; }';
			}


			//navbar typography
			if(bi_get_data('navigation_font_size') !== '13px') {
				$custom_css .= '.navbar-nav > li > a, .dropdown-menu > li > a { font-size: '.bi_get_data('navigation_font_size').'; }';
			}
			if(bi_get_data('navigation_font_style') == 'normal') {
				$custom_css .= '.navbar-nav > li > a, .dropdown-menu > li > a { font-weight: normal; }';
			}
			if(bi_get_data('navigation_font_style') == 'italic') {
				$custom_css .= '.navbar-nav > li > a, .dropdown-menu > li > a { font-style: italic; font-weight: normal; }';
			}
			if(bi_get_data('navigation_font_style') == 'bold italic') {
				$custom_css .= '.navbar-nav > li > a, .dropdown-menu > li > a { font-style: italic; }';
			}
					
			
			//trim white space for faster page loading
			$custom_css_trimmed =  preg_replace( '/\s+/', ' ', $custom_css );
		
			//echo css
			$css_output = "<!-- Custom CSS -->\n<style type=\"text/css\">\n" . $custom_css_trimmed . "\n</style>";
			
			if(!empty($custom_css)) {
				echo $css_output;
			}
	}
	
}