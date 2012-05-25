<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
 <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php
    /*
     * Print the <title> tag based on what is being viewed.
     */
    global $page, $paged;

    wp_title( '|', true, 'right' );

    // Add the blog name.
    bloginfo( 'name' );

    // Add the blog description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
        echo " | $site_description";

    // Add a page number if necessary:
    if ( $paged >= 2 || $page >= 2 )
        echo ' | ' . sprintf( __( 'Page %s', 'wpeden' ), max( $paged, $page ) );

    ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />   
<link rel="shortcut icon" href="<?php echo get_template_directory_uri() ;?>/images/favicon.png" type="image/x-icon"/> 
        <link rel="stylesheet" href="<?php echo get_template_directory_uri() ;?>/css/style.css" type="text/css" media="screen"/>
        
        <style type="text/css">
          span.reference a{
            text-shadow:1px 1px 1px #fff;
            color:#999;
            text-transform:uppercase;
            text-decoration:none;
            position:fixed;
            right:10px;
            top:10px;
            font-size:13px;
            font-weight:bold;
          }
          span.reference a:hover{
            color:#555;
          }
          h1.title{
              color:#777;
              font-size:30px;
              margin:10px;
              font-weight:normal;
              text-shadow:1px 1px 1px #fff;
            }
      </style>
      
        <?php wp_head(); ?>
 
</head>
<body <?php body_class($class); ?>>

<div id="container">
<div id="header">
        <h1>
            <a href='<?php echo home_url('/'); ?>'><?php bloginfo('sitename'); ?></a>
        </h1>
    </div>
    <div id="navigation">
        
        <?php wp_nav_menu( array( 'container_class' => 'menu', 'theme_location' => 'primary','depth'=>1 ) ); ?>
    </div>
    <div id="nav-footer">  
    <form action="<?php echo home_url('/'); ?>" method="get">
    <input type="text" name="s" class="text" size="70" /> <input class="button" type="submit" value="Search" />
    </form>
        </div>
        <br />