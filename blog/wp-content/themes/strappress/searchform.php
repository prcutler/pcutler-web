<?php
/**
 * Search Form Template
 *
 *
 * @file           searchform.php
 * @package        StrapPress 
 * @author         Brad Williams 
 * @copyright      2011 - 2013 Brag Interactive
 * @license        license.txt
 * @version        Release: 3.0.0
 * @link           http://codex.wordpress.org/Function_Reference/get_search_form
 * @since          available since Release 1.0
 */
?>
	<form method="get" class="form-search" action="<?php echo home_url( '/' ); ?>">
		<div class="row">
			<div class="col-lg-12">
				<div class="input-group">
		<input type="text" class="form-control search-query" name="s" placeholder="<?php esc_attr_e('search here &hellip;', 'responsive'); ?>" />
		<span class="input-group-btn">
		<button type="submit" class="btn btn-default" name="submit" id="searchsubmit" value="<?php esc_attr_e('Go', 'responsive'); ?>">Search</button>
		</span>
	</div>
</div>
	</form>