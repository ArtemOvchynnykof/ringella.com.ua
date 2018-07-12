<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li <?php post_class(); ?>>
	<div class="product-item">
		<div class="product-item-inner">
			<div class="product-img-wrap">
				<?php
					/**
					 * woocommerce_before_shop_loop_item_title hook.
					 *
					 * @hooked woocommerce_show_product_loop_sale_flash - 10
					 * @hooked woocommerce_template_loop_product_thumbnail - 10
					 */
					 woocommerce_show_product_loop_sale_flash();
					 woocommerce_template_loop_product_thumbnail();
				?>
			</div><!-- product-img-wrap -->
			<div class="product-button">
				<div class="product-button-inner">
					<?php //wishlist ?>			
					<?php if (in_array( 'yith-woocommerce-wishlist/init.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ): ?>
						<div class="product-wishlist-button js_tooltip" data-mode="above" data-tip="<?php esc_attr('Add to Wishlist', 'philos'); ?>">
							<?php add_to_wishlist_in_product();	?>
						</div>
					<?php endif; ?>
					
					<?php //add to cart ?>
					<div class="product-add-button js_tooltip" data-mode="above" data-tip="<?php echo esc_attr($product->add_to_cart_text()); ?>">
						<?php woocommerce_template_loop_add_to_cart();?>
					</div>

					<?php //add to compare ?>	
					<?php if ( in_array( 'yith-woocommerce-compare/init.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ):?>
						<div class="product-compare-button js_tooltip" data-mode="above" data-tip="<?php esc_attr('Add to Compare', 'philos'); ?>">
							<?php add_to_compare_in_product();?>
						</div>
					<?php endif; ?>
				</div><!-- product-button-inner -->
			</div><!-- product-button -->
		</div><!-- product-item-inner -->
		<div class="product-detail">
			<?php
				nileforest_product_tag();
				/**
				 * woocommerce_before_shop_loop_item hook.
				 *
				 * @hooked woocommerce_template_loop_product_link_open - 10
				 */
				woocommerce_template_loop_product_link_open();
				
				//do_action( 'woocommerce_before_shop_loop_item' );

				/**
				 * woocommerce_before_shop_loop_item_title hook.
				 *
				 * @hooked woocommerce_show_product_loop_sale_flash - 10
				 * @hooked woocommerce_template_loop_product_thumbnail - 10
				 */	
				//do_action( 'woocommerce_before_shop_loop_item_title' );
			
				/**
				 * woocommerce_shop_loop_item_title hook.
				 *
				 * @hooked woocommerce_template_loop_product_title - 10
				 */
				do_action( 'woocommerce_shop_loop_item_title' );
			
				/**
				 * woocommerce_after_shop_loop_item_title hook.
				 *
				 * @hooked woocommerce_template_loop_rating - 5
				 * @hooked woocommerce_template_loop_price - 10
				 */
				//do_action( 'woocommerce_after_shop_loop_item_title' );
			
				/**
				 * woocommerce_after_shop_loop_item hook.
				 *
				 * @hooked woocommerce_template_loop_product_link_close - 5
				 * @hooked woocommerce_template_loop_add_to_cart - 10
				 */
				 woocommerce_template_loop_product_link_close();
				 woocommerce_template_loop_rating();
				 nileforest_short_description();
				 woocommerce_template_loop_price();
				//do_action( 'woocommerce_after_shop_loop_item' );
			?>
		</div><!-- product-detail -->	
	</div><!-- product-item -->	
</li>