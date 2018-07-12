<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Nileforest
 * @since Nileforest 1.0
 */

get_header(); 
?>
<section class="breadcrumb" itemprop="breadcrumb">
	<div class="container">
		<div class="row">
			<div class="col-md-7"><?php nileforest_breadcrumbs();?></div>
			<div class="col-md-5"><h3 class="text-right mb-0"><?php echo _e('404 Page', 'philos') ?></h3></div>
		</div>
	</div>
</section>
<div class="content-page">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="error-404 not-found">
					
					<h2 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'philos' ); ?></h2>
					
					<div class="search-content text-center">
						<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'philos' ); ?></p>
	
						<?php get_search_form(); ?>
	
					</div><!-- .page-content -->
				</div><!-- .error-404 -->
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- .content-page -->
</div>
<?php get_footer();