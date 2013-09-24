<?php
/**
 * Single Project Template
 *
 *
 * @file           single-project.php
 * @package        StrapPress 
 * @author         Brad WIlliams 
 * @copyright      2003 - 2013 Brag Interactive
 * @license        license.txt
 * @version        Release: 3.0.0
 * @link           http://codex.wordpress.org/Theme_Development#Single_Post_.28single.php.29
 * @since          available since Release 1.0
 */
?>
<?php get_header(); ?>

<div class="row">
        <div class="col-lg-12">

 <div id="content-project">

       <?php if (have_posts()) : ?>

        <?php while (have_posts()) : the_post(); ?>
        
          
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="page-header">
                <h1 class="single-project-title page-title"><?php the_title(); ?></h1>
            </header>
                <section id="single-project" class="row">
                    <div class="col-lg-6">
                <?php the_post_thumbnail('port-full'); ?> 
                      </div>          
                <div class="project-entry col-lg-6">
                    
                    <?php the_content(__($more_link, 'responsive')); ?>
                    
                    <?php if ( get_the_author_meta('description') != '' ) : ?>
                    
                    <div id="author-meta">
                    <?php if (function_exists('get_avatar')) { echo get_avatar( get_the_author_meta('email'), '80' ); }?>
                        <div class="about-author"><?php _e('About','responsive'); ?> <?php the_author_posts_link(); ?></div>
                        <p><?php the_author_meta('description') ?></p>
                    </div><!-- end of #author-meta -->
                    
                    <?php endif; // no description, no author's meta ?>
                    
                    <?php wp_link_pages(array('before' => '<div class="pagination">' . __('Pages:', 'responsive'), 'after' => '</div>')); ?>
                </div><!-- end of .project-entry -->
                            
                </section>
                 <footer class="article-footer">
            <div class="post-edit"><?php edit_post_link(__('Edit', 'responsive')); ?></div>   
            </footer>          
            </article><!-- end of #post-<?php the_ID(); ?> -->
            
        <?php endwhile; ?> 

        <?php else : ?>

       <article id="post-not-found" class="hentry clearfix">
        <header>
           <h1 class="title-404"><?php _e('404 &#8212; Fancy meeting you here!', 'responsive'); ?></h1>
       </header>
       <section>
           <p><?php _e('Don&#39;t panic, we&#39;ll get through this together. Let&#39;s explore our options here.', 'responsive'); ?></p>
       </section>
       <footer>
           <h6><?php _e( 'You can return', 'responsive' ); ?> <a href="<?php echo home_url(); ?>/" title="<?php esc_attr_e( 'Home', 'responsive' ); ?>"><?php _e( '&#9166; Home', 'responsive' ); ?></a> <?php _e( 'or search for the page you were looking for', 'responsive' ); ?></h6>
           <?php get_search_form(); ?>
       </footer>

   </article>

<?php endif; ?>  
      
        </div><!-- end of #content -->
    </div>
</div>

<?php get_footer(); ?>