<?php get_header(); ?>    
    
     
            
<div style="clear: both;"></div>  
<div class="col2 green_posts">
<h1 class="title title_green" style="color: #fff;margin: 0px 5px 0px 0px;">
<?php if ( is_day() ) : ?>
                            <?php printf( __( 'Daily Archives: %s', 'twentyeleven' ), '<span>' . get_the_date() . '</span>' ); ?>
                        <?php elseif ( is_month() ) : ?>
                            <?php printf( __( 'Monthly Archives: %s', 'twentyeleven' ), '<span>' . get_the_date( 'F Y' ) . '</span>' ); ?>
                        <?php elseif ( is_year() ) : ?>
                            <?php printf( __( 'Yearly Archives: %s', 'twentyeleven' ), '<span>' . get_the_date( 'Y' ) . '</span>' ); ?>
                        <?php elseif(is_category()) : ?>
                         <?php printf( __( 'Category Archives: %s', 'twentyeleven' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?>
                        <?php else : ?> 
                         <?php _e( 'Blog Archives', 'twentyeleven' ); ?>
                        <?php endif; ?>
</h1>

<?php 
while(have_posts()): the_post(); ?> 
<div class="post box arc">
<h3><a href="<?php the_permalink(); ?>"><nobr><?php the_title(); ?></nobr></a></h3>
<?php minimax_post_thumb('homepage-thumb'); ?>  
<p><?php minimax_post_excerpt(350); ?></p>
<div class="meta">Posted on <?php the_date(); ?> / Posted by <?php the_author(); ?></div>
</div> 
<?php endwhile; ?>               

<?php if (  $wp_query->max_num_pages > 1 ) : ?>
                <div id="nav-below" class="navigation">
                    <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentyten' ) ); ?></div>
                    <div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?></div>
                </div><!-- #nav-below -->
<?php endif; ?>

</div>
<div class="col1 sidebar">
 
<?php dynamic_sidebar('Archive Page'); ?>
</div>
      
<?php get_footer(); ?>
