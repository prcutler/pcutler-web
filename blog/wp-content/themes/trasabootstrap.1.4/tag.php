<?php
/**
 * The template for displaying Tag Archive pages.
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

						<h1 class="page-title"><?php
							printf( __( 'Tag Archives: %s', 'twentyten' ), '<span>' . single_tag_title( '', false ) . '</span>' );
						?></h1>

		<?php
		/* Run the loop for the tag archive to output the posts
		 * If you want to overload this in a child theme then include a file
		 * called loop-tag.php and that will be used instead.
		 */
		 get_template_part( 'loop', 'tag' );
		?>
					</div><!-- #content -->
				</div><!-- .col-md-8 -->

				<div class="col-md-3 col-md-offset-1">	
					<?php get_sidebar(); ?>
				</div><!-- .col-md-3 -->
				
			</div><!-- .row -->
		</div><!-- .container -->

<?php get_footer(); ?>
