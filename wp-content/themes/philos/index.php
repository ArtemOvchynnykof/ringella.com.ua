<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Nileforest
 * @since Nileforest 1.0
 */

get_header();
//page option value
global $wp_query;
$page_id = $wp_query->get_queried_object_id();
//page Title
$page_option_title = get_post_meta( $page_id, 'meta-box-page-title', true ); 
//page Breadcrumb
$page_option_breadcrumb = get_post_meta( $page_id, 'meta-box-breadcrumb', true );
//page Sidebar
$page_option_sidebar = get_post_meta( $page_id, 'meta-box-theme-sidebar', true );
?>
<?php if($page_option_breadcrumb !="hide" || $page_option_title !="hide"){ ?>
<section class="breadcrumb" itemprop="breadcrumb">
	<div class="container">
		<div class="row">
			<div class="col-md-7"><?php if($page_option_breadcrumb !="hide"){ nileforest_breadcrumbs(); }?></div>
			<div class="col-md-5"><?php if($page_option_title !="hide"):?>
				<?php if ( is_home() && ! is_front_page() ) : ?>
					<h3 class="text-right mb-0"><?php single_post_title(); ?></h3>						
				<?php else : ?>					
					<h3 class="text-right mb-0"><?php esc_html__( 'Posts', 'philos' ); ?></h3>
				<?php endif; 			
				endif; ?>
			</div>
		</div>
	</div>
</section>
<?php } ?>
<div class="content-page">
	<div class="container">
		<div class="row">
			<div class="<?php if(esc_attr($page_option_sidebar) == "left-sidebar" || esc_attr($page_option_sidebar) == "right-sidebar" || is_front_page()){ echo esc_attr($page_option_sidebar) == 'left-sidebar' ? ' push-md-3 ' : ''; ?>col-md-9<?php } else{?>col-md-8 offset-md-2<?php }?> blog-entry style-1">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
						<?php
						if ( have_posts() ) :
			
							/* Start the Loop */
							while ( have_posts() ) : the_post();
							/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
							?>
											
							<?php 	get_template_part( 'template-parts/post/content', get_post_format() ); ?>
									
							<?php
							endwhile;
							?>
							
							<?php
							the_posts_pagination(array(					
								'prev_text' => '<i class="fa fa-angle-double-left"></i>',
								'next_text' => '<i class="fa fa-angle-double-right"></i>',
								'before_page_number' => '',
								'screen_reader_text' => ''
							));
							?>
								
							<?php
						else :
			
							get_template_part( 'template-parts/post/content', 'none' );
			
						endif;
						?>
						</main><!-- #main -->
				</div><!-- #primary -->	
			</div><!-- .col-md-12 -->
			<?php if(esc_attr($page_option_sidebar) == "left-sidebar" || esc_attr($page_option_sidebar) == "right-sidebar" || is_front_page()){ ?>
				<div class="sidebar-container col-md-3<?php echo(esc_attr($page_option_sidebar) == 'left-sidebar' ? ' pull-md-9' : ''); ?>">
					<?php get_sidebar(); ?>
				</div>
			<?php } ?>
		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- .content-page -->

<?php get_footer();