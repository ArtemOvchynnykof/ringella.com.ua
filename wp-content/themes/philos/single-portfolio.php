<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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

<div class="content-page portfolio-single-post">
	<div class="container">
		<div class="row">			
			<div class="col-md-12">
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/post/content-portfolio', get_post_format() );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

				the_post_navigation( array(
					'prev_text' =>  esc_html__( 'Previous Post', 'philos' ),
					'next_text' => esc_html__( 'Next Post', 'philos' ),
					'screen_reader_text' => ''
				) );

			endwhile; // End of the loop.
			?>
			</div>	
		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- .content-page -->

<?php get_footer();