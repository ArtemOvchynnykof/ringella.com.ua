<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
				<div class="col-md-12"><?php nileforest_breadcrumbs(); ?></div>				
			</div>
		</div>
</section>
<div class="content-page">
	<div class="container">
		<div class="row">
			<div class="col-md-9 push-md-3 blog-single">				
					<?php if ( have_posts() ) : ?>
						<h3><?php printf( __( 'Search Results for: %s', 'philos' ), '<span>' . get_search_query() . '</span>' ); ?></h3>
					<?php else : ?>
						<h3><?php _e( 'Nothing Found', 'philos' ); ?></h3>
					<?php endif; ?>
				
				<?php
				if ( have_posts() ) :
					/* Start the Loop */
					while ( have_posts() ) : the_post();
		
						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'template-parts/post/content', 'excerpt' );
		
					endwhile; // End of the loop.
		
					the_posts_pagination( array(
						'prev_text' => '<i class="fa fa-angle-double-left"></i>',
						'next_text' => '<i class="fa fa-angle-double-right"></i>',
						'before_page_number' => '',
						'screen_reader_text' => ''
					) );
		
				else : ?>
		
					<p><?php  _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'philos' ); ?></p>
					<?php
						get_search_form();
		
				endif;
				?>
				
						
			</div><!-- .col-md-9 push-md-3 -->
			<div class="sidebar-container col-md-3 pull-md-9">
				<?php get_sidebar(); ?>
			</div><!-- .sidebar-container -->
		</div><!-- .row -->
	</div><!-- .container -->
</div>	<!-- .content-page -->

<?php get_footer();