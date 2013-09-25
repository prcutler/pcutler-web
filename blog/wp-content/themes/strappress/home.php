<?php
/**
 * Front Page
 *
 * Note: You can overwrite home.php as well as any other Template in Child Theme.
 * Create the same file (name) include in /child-theme/ and you're all set to go!
 * @see            http://codex.wordpress.org/Child_Themes
 *
 * @file           home.php
 * @package        StrapPress 
 * @author         Brad Williams 
 * @copyright      2011 - 2013 Brag Interactive
 * @license        license.txt
 * @version        Release: 3.0.0
 * @link           N/A
 * @since          available since Release 1.0
 */
?>
<?php get_header(); ?>

			<?php
                // get homepage selection
                $hero_unit = bi_get_data('hero_radio','no entry');       
            ?>


		 <?php if( $hero_unit === "featured") {?>

        <div class="jumbotron">
        	<div class="row">
        
        <div class="col-lg-6">

            <?php
            
			// First let's check if headline was set
			    if(bi_get_data('featured_heading', 'no entry')) {
                    echo '<h1 class="featured-title">'; 
				    echo bi_get_data('featured_heading', '' );
				    echo '</h1>'; 
			// If not display dummy headline for preview purposes
			      } else { 
			        echo '<h1 class="featured-title">';
				    echo __('Responsive!','responsive');
				    echo '</h1>';
				  }
			?>
                    
            <?php 
			// First let's check if headline was set
			    if(bi_get_data('home_subheadline', 'no entry')) {
                    echo '<h2 class="featured-subtitle">'; 
				    echo bi_get_data('home_subheadline', '');
				    echo '</h2>'; 
			// If not display dummy headline for preview purposes
			      } else { 
			        echo '<h2 class="featured-subtitle">';
				    echo __('Bootstrap WordPress Theme','responsive');
				    echo '</h2>';
				  }
			?>
            
            <?php 
			// First let's check if content is in place
			    if(bi_get_data('home_content_area', 'no entry')) {
                    echo '<p>'; 
				    echo bi_get_data('home_content_area', '');
				    echo '</p>'; 
			// If not let's show dummy content for demo purposes
			      } else { 
			        echo '<p>';
				    echo __('A responsive WordPress theme with all the Twitter Bootstrap goodies. Check out the page layouts, features,
				    	and shortcodes this theme has to offer. Feel free to look around.','responsive');
				    echo '</p>';
				  }
			?>
            
            <?php  
				$cta_btn_size = 'btn-'.bi_get_data('cta_size', '' );
				$cta_btn_text = bi_get_data('cta_text', '' );
				$cta_btn_url = bi_get_data('cta_url', '' );

				if(bi_get_data('button_block', '1')) {
					$cta_btn_block = "btn-block";
				}
            ?>
		    <?php if(bi_get_data('display_button', '1')) {?>    
            <div class="call-to-action">

            <?php
			// First let's check if button was set
			    if(bi_get_data('cta_text', 'no entry' )) {
					echo '<a href="'.$cta_btn_url.'" class="btn '.$cta_btn_block.' '.$cta_btn_size.' btn-default">'; 
					echo bi_get_data('cta_text', '' );
				    echo '</a>';
			// If not display dummy button text for preview purposes
			      } else { 
					echo '<a href="#nogo" class="btn btn-block btn-lg btn-warning">'; 
					echo __('Call to Action','responsive');
				    echo '</a>';
				  }
			?>  
            
            </div><!-- end of .call-to-action -->
            <?php } ?>           
            
        </div><!-- end of col-lg-6 -->

        <div id="hero-image" class="col-lg-6"> 
                           
            <?php 
			// First let's check if headline was set
			    if (bi_get_data('featured_content', 'no entry')) {
					echo bi_get_data('featured_content', 'no entry');
		    // If not display dummy headline for preview purposes
			      } else {             
                    echo '<img class="aligncenter" src="'.get_stylesheet_directory_uri().'/images/featured-image.png" width="440" height="300" alt="" />'; 
 				  }
			?> 
                                   
        </div><!-- end of col-lg-6 --> 
   		</div>
        </div><!-- end of .jumbotron -->
         <?php } else { ?>     
  
<div class="jumbotron">
			<?php
    $recentPosts = new WP_Query();
    $recentPosts->query('showposts=1');
?>
<?php global $more; $more = 0; ?>
<?php while ($recentPosts->have_posts()) : $recentPosts->the_post(); ?>
	<article>
		<header>
     <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'responsive'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h1>
        </header>        
                <section class="post-meta">
                <?php 
                    printf( __( '<i class="icon-time"></i> %2$s <i class="icon-user"></i> %3$s', 'responsive' ),'meta-prep meta-prep-author',
		            sprintf( '<a href="%1$s" title="%2$s" rel="bookmark">%3$s</a>',
			            get_permalink(),
			            esc_attr( get_the_time() ),
			            get_the_date()
		            ),
		            sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			            get_author_posts_url( get_the_author_meta( 'ID' ) ),
			        sprintf( esc_attr__( 'View all posts by %s', 'responsive' ), get_the_author() ),
			            get_the_author()
		                )
			        );
		        ?>
				    <?php if ( comments_open() ) : ?>
                        <span class="comments-link">
                        <span class="mdash">&mdash;</span>
                    <?php comments_popup_link(__('No Comments <i class="icon-arrow-down"></i>', 'responsive'), __('1 Comment <i class="icon-arrow-down"></i>', 'responsive'), __('% Comments <i class="icon-arrow-down"></i>', 'responsive')); ?>
                        </span>
                    <?php endif; ?> 
                </section><!-- end of .post-meta -->
                
                <section class="post-entry">
                    <?php if ( has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                    <?php the_post_thumbnail(); ?>
                        </a>
                    <?php endif; ?>
                    <?php the_content(__($more_link, 'responsive')); ?>
                       <?php custom_link_pages(array(
                            'before' => '<nav class="pagination"><ul>' . __(''),
                            'after' => '</ul></nav>',
                            'next_or_number' => 'next_and_number', # activate parameter overloading
                            'nextpagelink' => __('&rarr;'),
                            'previouspagelink' => __('&larr;'),
                            'pagelink' => '%',
                            'echo' => 1 )
                            ); ?>
                </section><!-- end of .post-entry -->           
            <div class="post-edit"><?php edit_post_link(__('Edit', 'responsive')); ?></div> 
            </article>              
            </div><!-- end of jumbotron -->

<?php endwhile; ?>

</div>

			 <?php } ?> 

<?php get_sidebar('home'); ?>
<?php get_footer(); ?>