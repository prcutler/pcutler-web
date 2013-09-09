<!doctype html>  

<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?>class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
  
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    
    <title><?php wp_title( '|', true, 'right' ); ?></title>
        
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    <!-- media-queries.js (fallback) -->
    <!--[if lt IE 9]>
      <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>      
    <![endif]-->

    <!-- html5.js -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
      <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <!-- wordpress head functions -->
    <?php wp_head(); ?>
    <!-- end of wordpress head -->

    <!-- theme options from options panel -->
    <?php get_wpbs_theme_options(); ?>

    <!-- typeahead plugin - if top nav search bar enabled -->
    <?php require_once('library/typeahead.php'); ?>
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">  

  </head>
  
  <body <?php body_class(); ?>>
      <!--facebook-->
    <div id="fb-root"></div>
    <script>
      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=164950143540443";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
    <!--end facebook-->  
    <header role="banner">
    
    
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
          
<div class="container">
          <div class="navbar-header">
          
                              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" id="logo" title="<?php echo get_bloginfo('description'); ?>" href="<?php echo home_url(); ?>">
                                
                  <?php if(of_get_option('navbar-branding_logo','')!='') { ?>
                    <img src="<?php echo of_get_option('navbar-branding_logo'); ?>" alt="<?php echo get_bloginfo('description'); ?>">
                    <?php }
                    if(of_get_option('site_name','1')) bloginfo('name'); ?></a>
                

                </div>
                <div class="navbar-collapse collapse">
                  <?php bones_main_nav(); // Adjust using Menus in Wordpress Admin ?>
                
                
            
              <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 pull-right">
              <?php if(of_get_option('search_bar', '1')) {?>
              <form class="navbar-form navbar-right" role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
                            <div class="input-group">
                <input name="s" id="s" type="text" class="form-control" autocomplete="off" placeholder="<?php _e('Search','bonestheme'); ?>" data-provide="typeahead" data-items="4" data-source='<?php echo $typeahead_data; ?>'>
                                <span class="input-group-btn">
                                <button type="submit" class="btn btn-default">Submit</button></span>
</div>
              </form>
              <?php } ?>
              </div>
          
</div>
        </nav> <!-- end .navbar -->

    
    </header> <!-- end header -->
    
    <div class="container">
