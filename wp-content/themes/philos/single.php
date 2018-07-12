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
<?php if(theme_get_option('blog_single_breadcrumb') !="no"): ?>
	<section class="breadcrumb" itemprop="breadcrumb">
		<div class="container">
			<div class="row">
				<div class="col-md-12"><?php nileforest_breadcrumbs(); ?></div>			
			</div>
		</div>
	</section>
<?php endif; ?>
<div class="content-page">
	<div class="container">
		<div class="row">
			<div class="<?php if(theme_get_option('blog_single_layout') == "no-sidebar"){ ?>col-md-12<?php } else{?>col-md-9<?php echo(theme_get_option('blog_single_layout') == 'left-sidebar' ? ' push-md-3' : ''); ?><?php }?> blog-single style-1">
				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();
	
					get_template_part( 'template-parts/post/content-blog', get_post_format() );
	
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
	
					the_post_navigation( array(
						'prev_text' => esc_html__( 'Previous Post', 'philos' ),
						'next_text' =>  esc_html__( 'Next Post', 'philos' ),
					) );
	
				endwhile; // End of the loop.
				?>
			</div><!-- .col-md-12 -->
			<?php if(theme_get_option('blog_single_layout') != "no-sidebar"){ ?>
			<div class="sidebar-container col-md-3<?php echo(theme_get_option('blog_single_layout') == 'left-sidebar' ? ' pull-md-9' : ''); ?>">
				<?php get_sidebar(); ?>
			</div>
			<?php } ?>		
		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- .content-page -->

<?php get_footer();