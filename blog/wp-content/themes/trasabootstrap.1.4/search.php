<?php
/**
 * The template for displaying Search Results pages.
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

		<?php if ( have_posts() ) : ?>
						<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentyten' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
						<?php
						/* Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called loop-search.php and that will be used instead.
						 */
						 get_template_part( 'loop', 'search' );
						?>
		<?php else : ?>
						<div id="post-0" class="post no-results not-found">
							<h2 class="entry-title"><?php _e( 'Nothing Found', 'twentyten' ); ?></h2>
							<div class="entry-content">
								<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'twentyten' ); ?></p>
								<?php get_search_form(); ?>
							</div><!-- .entry-content -->
						</div><!-- #post-0 -->
		<?php endif; ?>
					</div><!-- #content -->
				</div><!-- .col-md-8 -->

				<div class="col-md-3 col-md-offset-1">	
					<?php get_sidebar(); ?>
				</div><!-- .col-md-3 -->
				
			</div><!-- .row -->
		</div><!-- .container -->

<?php get_footer(); ?>
