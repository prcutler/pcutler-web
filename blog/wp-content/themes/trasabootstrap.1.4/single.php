<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

		<div class="container">
			<div class="row">

				<div class="col-md-8">
					<div id="content" role="main">

					<?php
					/* Run the loop to output the post.
					 * If you want to overload this in a child theme then include a file
					 * called loop-single.php and that will be used instead.
					 */
					get_template_part( 'loop', 'single' );
					?>

					</div><!-- #content -->
				</div><!-- .col-md-8 -->

				<div class="col-md-3 col-md-offset-1">	
					<?php get_sidebar(); ?>
				</div><!-- .col-md-3 -->
				
			</div><!-- .row -->
		</div><!-- .container -->

<?php get_footer(); ?>
