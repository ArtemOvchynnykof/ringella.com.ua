<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header( 'shop' );

//page option value
global $wp_query;
$page_id = wc_get_page_id('shop');
//page Title
$page_option_title = get_post_meta( $page_id, 'meta-box-page-title', true ); 
//page Breadcrumb
$page_option_breadcrumb = get_post_meta( $page_id, 'meta-box-breadcrumb', true );
//page Sidebar
$page_option_sidebar = get_post_meta( $page_id, 'meta-box-theme-sidebar', true );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
//do_action( 'woocommerce_before_main_content' );
	woocommerce_output_content_wrapper();
		if($page_option_breadcrumb !="hide"){
			nileforest_woocommerce_breadcrumbs();
		}

?>
<div class="content-page">
	<div class="container">
		<div class="row">
			<div class="<?php if(esc_attr($page_option_sidebar) == "left-sidebar" || esc_attr($page_option_sidebar) == "right-sidebar"){?>col-md-9<?php echo esc_attr($page_option_sidebar) == 'left-sidebar' ? ' push-md-3' : ''; } else{ ?>col-md-12 <?php }?>">
				<header class="woocommerce-products-header">
					<?php if($page_option_title !="hide"){ ?>
						<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
							<div class="list-page-title">
								<h2><?php woocommerce_page_title(); ?></h2>
							</div>
						<?php endif; ?>
					<?php } ?>
				
					<?php
					/**
					 * Hook: woocommerce_archive_description.
					 *
					 * @hooked woocommerce_taxonomy_archive_description - 10
					 * @hooked woocommerce_product_archive_description - 10
					 */
					do_action( 'woocommerce_archive_description' );
					?>
				</header>
				<?php if ( have_posts() ) { ?>
					<div class="product-filter-content <?php if(get_option( 'woocommerce_shop_page_display' ) =="subcategories"){ echo "only-subcategories"; }?>">
						<div class="product-filter-content-inner">
							<?php do_action( 'woocommerce_before_shop_loop' ); ?>
							<div class="product-view-switcher">
								<label class="hidden-sm-down"><?php esc_html__('View', 'philos'); ?></label>
								<div class="product-view-icon product-grid-switcher product-view-icon-active">
									<a href="javascript:void(0);"><i class="fa fa-th" aria-hidden="true"></i></a>
								</div>
								<div class="product-view-icon product-list-switcher">
									<a  href="javascript:void(0);"><i class="fa fa-th-list" aria-hidden="true"></i></a>
								</div>
							</div>
						</div>
					</div>
					
					<div class="row product-list-item">
						<?php woocommerce_product_loop_start(); ?>
						<?php	if ( wc_get_loop_prop( 'total' ) ) {
							while ( have_posts() ) {
								the_post();
					
								/**
								 * Hook: woocommerce_shop_loop.
								 *
								 * @hooked WC_Structured_Data::generate_product_data() - 10
								 */
								do_action( 'woocommerce_shop_loop' );
					
								wc_get_template_part( 'content', 'product' );
							}
						}
					
						woocommerce_product_loop_end();
						?>
					</div>
					<?php
						/**
						 * Hook: woocommerce_after_shop_loop.
						 *
						 * @hooked woocommerce_pagination - 10
						 */
						do_action( 'woocommerce_after_shop_loop' );
					?>
					
				<?php } else {
					/**
					 * Hook: woocommerce_no_products_found.
					 *
					 * @hooked wc_no_products_found - 10
					 */
					do_action( 'woocommerce_no_products_found' );
				}?>
			</div>
			<?php if(esc_attr($page_option_sidebar) == "left-sidebar" || esc_attr($page_option_sidebar) == "right-sidebar"): ?>
				<div class="sidebar-container col-md-3<?php echo(esc_attr($page_option_sidebar) == 'left-sidebar' ? ' pull-md-9' : ''); ?>">
					<?php
						/**
						* Hook: woocommerce_sidebar.
						*
						* @hooked woocommerce_get_sidebar - 10
						*/
						do_action( 'woocommerce_sidebar' );
					?>
				</div>
			<?php endif; ?>
		</div><!-- /.row -->
	</div><!-- /.container -->
</div><!-- /.content-page -->
<?php 
/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );
get_footer( 'shop' );