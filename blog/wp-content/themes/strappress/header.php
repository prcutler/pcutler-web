<?php
/**
 * Header Template
 *
 *
 * @file           header.php
 * @package        StrapPress 
 * @author         Brad Williams 
 * @copyright      2011 - 2013 Brag Interactive
 * @license        license.txt
 * @version        Release: 3.0.0
 * @link           http://codex.wordpress.org/Theme_Development#Document_Head_.28header.php.29
 * @since          available since Release 1.0
 */
?>
<!doctype html>
<!--[if lt IE 7 ]> <html class="no-js ie6" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>

<meta charset="<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

<title><?php wp_title('&#124;', true, 'right'); ?><?php bloginfo('name'); ?></title>
<?php if( bi_get_data('custom_favicon') !== '' ) : ?>
        <link rel="icon" type="image/png" href="<?php echo bi_get_data('custom_favicon'); ?>" />
    <?php endif; ?>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<!--[if IE 7]>
  <link rel="stylesheet" href="<?php get_template_directory_uri();?>/css/font-awesome-ie7.min.css">
<![endif]-->

<?php wp_head(); ?> 

</head>

<body <?php body_class(); ?>>
                 
<?php responsive_container(); // before container hook ?>

         
    <?php responsive_header(); // before header hook ?>
    <header>
   
    <?php responsive_in_header(); // header hook ?>

<nav role="navigation">
    <div class="navbar navbar-default <?php if ( bi_get_data('disable_inverse_navbar', '1') == '1' ) echo 'navbar-inverse'; ?> <?php if ( bi_get_data('disable_fixed_navbar', '1') == '1' ) echo 'navbar-fixed-top'; ?>">
        <div class="container">
           <!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
            <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>

           <?php if( bi_get_data('custom_logo') !== '' ) { ?>
            <div id="logo"><a href="<?php echo home_url(); ?>/" title="<?php bloginfo( 'name' ); ?>" rel="home">
                <img src="<?php echo bi_get_data('custom_logo'); ?>" alt="<?php bloginfo( 'name' ) ?>" />
            </a></div>
            <?php } else { ?>
            <?php if (is_front_page()) { ?>
            <a class="navbar-brand" href="<?php bloginfo( 'url' ) ?>/" title="<?php bloginfo( 'name' ) ?>" rel="homepage"><?php bloginfo( 'name' ) ?></a>
            <?php } else { ?>
            <a class="navbar-brand" href="<?php bloginfo( 'url' ) ?>/" title="<?php bloginfo( 'name' ) ?>" rel="homepage"><?php bloginfo( 'name' ) ?></a>
            <?php } } ?>
        </div>
        



          <div class="navbar-collapse collapse navbar-responsive-collapse">
			   <?php

                $args = array(
                    'theme_location' => 'top-bar',
                    'depth'      => 2,
                    'container'  => false,
                    'menu_class'     => 'nav navbar-nav',
                    'walker'     => new Bootstrap_Walker_Nav_Menu()
                );

                wp_nav_menu($args);

            ?>

            <?php if( bi_get_data('enable_disable_search','1') == '1') {?>
                            <form class="navbar-form pull-right" role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
                                <input name="s" id="s" type="text" class="form-control" placeholder="<?php _e('Search','responsive'); ?>">
                            </form>
                            <?php } ?>


                            <?php
        //social output - see functions/social-output.php
        if( bi_get_data('disable_social','1') == '1') bi_display_social(); ?>


          </div>

        </div>
       
     </div>           
</nav>
           
 
    </header><!-- end of header -->
    <?php responsive_header_end(); // after header hook ?>
    
	<?php responsive_wrapper(); // before wrapper ?>
    
    <div class="container">
        <div id="wrapper" class="clearfix">
    
    <?php responsive_in_wrapper(); // wrapper hook ?>
