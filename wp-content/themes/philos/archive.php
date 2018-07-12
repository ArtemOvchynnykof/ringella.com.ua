<?php
/**
 * The template for displaying archive pages
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
<?php if($page_option_breadcrumb !="hide" || $page_option_title !="hide"): ?>
<section class="breadcrumb" itemprop="breadcrumb">
	<div class="container">
		<div class="row">
			<div class="col-md-7">
				<?php if($page_option_breadcrumb !="hide"): 
					 nileforest_breadcrumbs(); 
				endif; ?>
			</div>
			<?php if ( have_posts() ) : ?>
				<div class="col-md-5"><?php if($page_option_title !="hide"): ?>
					<?php the_archive_title( '<h3 class="text-right mb-0">', '</h3>' );	?>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
<?php endif; ?>
	<?php if ( have_posts() ) : ?>
		<header class="page-header">
			<?php				
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
			?>
		</header><!-- .page-header -->
	<?php endif; ?>
<div class="content-page">
	<div class="container">
		<div class="row">
			<div class="<?php if(esc_attr($page_option_sidebar) == "left-sidebar" || esc_attr($page_option_sidebar) == "right-sidebar"){?>col-md-9<?php echo esc_attr($page_option_sidebar) == 'left-sidebar' ? ' push-md-3' : ''; } else{  ?>col-md-8 offset-md-2<?php }?> blog-entry style-1">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">	
						<?php
							if ( have_posts() ) : ?>
								<?php
								/* Start the Loop */
								while ( have_posts() ) : the_post();
					
									/*
									 * Include the Post-Format-specific template for the content.
									 * If you want to override this in a child theme, then include a file
									 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
									 */
									get_template_part( 'template-parts/post/content', get_post_format() );
					
								endwhile;
					
								the_posts_pagination( array(
									'prev_text' => '<i class="fa fa-angle-double-left"></i>',
									'next_text' => '<i class="fa fa-angle-double-right"></i>',
									'before_page_number' => '',
									'screen_reader_text' => ''
								) );
					
							else :
					
								get_template_part( 'template-parts/post/content', 'none' );
					
							endif; ?>
					</main><!-- #main -->
				</div><!-- #primary -->
			</div><!-- .col-md-12 -->
			<?php if(esc_attr($page_option_sidebar) == "left-sidebar" || esc_attr($page_option_sidebar) == "right-sidebar"){ ?>
				<div class="sidebar-container col-md-3<?php echo(esc_attr($page_option_sidebar) == 'left-sidebar' ? ' pull-md-9' : ''); ?>">
					<?php get_sidebar(); ?>
				</div>
			<?php } ?>
		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- .content-page -->
		
<?php get_footer();