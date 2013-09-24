<?php
/**
 Template Name: Project
 *
 *
 * @file           page.php
 * @package        StrapPress 
 * @author         Brad Williams
 * @copyright      2003 - 2013 Brag Interactive
 * @license        license.txt
 * @version        Release: 3.0.0
 * @link           http://codex.wordpress.org/Theme_Development#Pages_.28page.php.29
 * @since          available since Release 1.0
 */
?>
<?php get_header(); ?>

<div class="row">
        <div class="col-lg-12">

        <div id="content">

            <?php $btn_color = 'btn-'.bi_get_data('p_btn_color', '' ); 
            $btn_size = 'btn-'.bi_get_data('p_btn_size', '' );
            ?>

           <?php if(bi_get_data('filter_btns', '1')) {?> 
            <?php
                 $terms = get_terms("tagportfolio");
                 $count = count($terms);
                 $fbtn_color = 'btn-'.bi_get_data('f_btn_color', '' );
                 $fbtn_size = 'btn-'.bi_get_data('f_btn_size', '' );
                 echo '<div id="portfolio-filter" class="btn-group" data-toggle="buttons">';
                 echo '<a class="btn '.$fbtn_color.' '.$fbtn_size.' active" href="#all" data-filter="*" title="">All</a>';
                 if ( $count > 0 ){

                        foreach ( $terms as $term ) {

                            $termname = strtolower($term->name);
                            $termname = str_replace(' ', '-', $termname);
                            echo '<a data-filter=".'.$termname.'" class="btn '.$fbtn_color.' '.$fbtn_size.'" href="#'.$termname.'" title="" rel="'.$termname.'">'.$term->name.'</a>';
                        }
                 }
                 echo "</div>";
            ?>
             <?php } ?>

            <?php
                // get portfolio column count
                $portfolio_count = bi_get_data('portfolio_column', 'three' );
                if ( $portfolio_count == "two") {
                    $pcount = '6';
                } elseif ($portfolio_count == "three") {
                    $pcount = '4';
                } elseif ($portfolio_count == "four") {
                     $pcount = '3';
                }
            ?>

            <?php
                $loop = new WP_Query(array('post_type' => 'project', 'posts_per_page' => -1));
                $count =0;
            ?>

               <div id="portfolio-wrapper portfolio-<?php echo $portfolio_count ?>-column">
                <div id="portfolio-list" class="row">

                <?php if ( $loop ) : 

                    while ( $loop->have_posts() ) : $loop->the_post(); ?>

                        <?php
                        $terms = get_the_terms( $post->ID, 'tagportfolio' );

                        if ( $terms && ! is_wp_error( $terms ) ) :
                            $links = array();

                            foreach ( $terms as $term )
                            {
                                $links[] = $term->name;
                            }
                            $links = str_replace(' ', '-', $links);
                            $tax = join( " ", $links );
                        else :
                            $tax = '';
                        endif;
                        ?>

                        <?php 

                        ?>

                        
                        <div class="col-lg-<?php echo ($pcount); ?> <?php echo strtolower($tax); ?> block">
                            <a class="thumbnail" href="<?php the_permalink() ?>"><?php the_post_thumbnail('port-full'); ?></a>
                            <?php if(bi_get_data('project_title', '1')) {?>

                            <h4><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
                            <?php } ?>
                            <?php if(bi_get_data('project_btns', '1')) {?> 
                            <?php
                                $btn_color = 'btn-'.bi_get_data('p_btn_color', '' );
                                $btn_size = 'btn-'.bi_get_data('p_btn_size', '' );
                                if(bi_get_data('p_button_block', '1')) {
                                    $btn_block = "btn-block";
                                 }
                            ?>
                               
                            <p class="project-links"><a class="btn <?php echo ($btn_block); ?> btn-default <?php echo ($btn_size); ?>" href="<?php the_permalink() ?>"> <?php
                              echo bi_get_data('p_button_text', 'View Project' );  ?></a></p>
                            <?php } ?>
                        </div>
                  

                    <?php endwhile; else: ?>

                    <div class="error-not-found">Sorry, no portfolio entries for while.</div>

                <?php endif; ?>

                </div>

                <div class="clearboth"></div>

            </div> <!-- end #portfolio-wrapper-->
      
        </div><!-- end of #content -->
    </div><!-- end of col-lg-12 -->
</div><!-- end of row -->

<?php get_footer(); ?>