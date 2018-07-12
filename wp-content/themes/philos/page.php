<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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
			<div class="col-md-5"><?php if($page_option_title !="hide"){?><?php the_title( '<h3 class="text-right mb-0">', '</h3>' ); ?><?php  } ?></div>
		</div>
	</div>
</section>
<?php } ?>
<div class="content-page">
	<div class="container <?php if(esc_attr($page_option_sidebar) == "fullwidth"){ echo "fullwidth"; }?>">
		<div class="row">
			<div class="<?php if(esc_attr($page_option_sidebar) == "left-sidebar" || esc_attr($page_option_sidebar) == "right-sidebar"){?>col-md-9<?php echo esc_attr($page_option_sidebar) == 'left-sidebar' ? ' push-md-3' : ''; } else{ ?>col-md-12 <?php }?>">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">			
						<?php
						while ( have_posts() ) : the_post();			
							get_template_part( 'template-parts/page/content', 'page' );	
							?>
							<div class="row">
								<div class="container">
									<div class="row">
										<div class="col-md-12">
											<?php
											// If comments are open or we have at least one comment, load up the comment template.
											if ( comments_open() || get_comments_number() ) :
												comments_template();
											endif;	
											?>
										</div>
									</div>
								</div>
							</div>
						<?php										
						endwhile; // End of the loop.
						?>
					</main><!-- #main -->
				</div><!-- #primary -->
			</div><!-- .col-sm-12 -->
			
			<?php if(esc_attr($page_option_sidebar) == "left-sidebar" || esc_attr($page_option_sidebar) == "right-sidebar"){ ?>
			<div class="sidebar-container col-md-3<?php echo(esc_attr($page_option_sidebar) == 'left-sidebar' ? ' pull-md-9' : ''); ?>">
				<?php get_sidebar(); ?>
			</div>
			<?php } ?>
		</div><!-- .row -->
	</div><!-- .container -->
</div>	<!-- .content-page -->

<?php get_footer();