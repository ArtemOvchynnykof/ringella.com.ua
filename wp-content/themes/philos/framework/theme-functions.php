<?php

/**
 * Nileforest Framework
 *
 * @package   Nileforest Framework
 * @author    Nileforest <http://nileforest.com>
 * 
 */ 

//WooCommerce function

//ajax cart update
if ( ! function_exists( 'woocommerce_header_add_to_cart_fragment' ) ) :
function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;	
	ob_start();	
	?>
	<a class="cart-contents" id="sidebar_toggle_btn" title="<?php echo esc_html__('View your shopping cart', 'philos');?>">
		<div class="cart-icon"><i aria-hidden="true" class="fa fa-shopping-bag"></i></div>
		<?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'philos'), $woocommerce->cart->cart_contents_count); ?>
		<?php echo wp_kses_post($woocommerce->cart->get_cart_total()); ?>
	</a>
	<?php
	$fragments['a.cart-contents'] = ob_get_clean();	
	return $fragments;
}

endif;
add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');


// Breadcrumbs for common page
if ( ! function_exists( 'nileforest_breadcrumbs' ) ) :
function nileforest_breadcrumbs() {	
	if(!is_front_page()){
		if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb('<nav class="breadcrumb-link">','</nav>');
		}
	}

}
endif;

/*****************Woocommerce*******************/
//Woocommerce Breadcrumbs

// Remove WooCommerce Breadcrumbs
remove_action( 'init', 'woocommerce_breadcrumb', 20 );
remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20 );
//Add Yoast Breadcrumbs
add_action( 'woocommerce_before_main_content','nileforest_woocommerce_breadcrumbs', 20, 0 );

if (!function_exists('nileforest_woocommerce_breadcrumbs') ) {
  function nileforest_woocommerce_breadcrumbs() {
    yoast_breadcrumb('<section class="breadcrumb" itemprop="breadcrumb"><div class="container"><div class="row"><div class="col-md-12"><nav class="breadcrumb-link">','</nav></div></div></div></section>');
  }
}

//Remove PostClass(first,last) From Product
add_filter( 'post_class', 'prefix_post_class', 21, 3 ); //woocommerce use priority 20, so if you want to do something after they finish be more lazy
function prefix_post_class( $classes ) {
	if ( 'product' == get_post_type() ) {
		$classes = array_diff( $classes, array( 'last','first' ) );
	}
	return $classes;
}

// shortcode for wishlist in product
if ( in_array( 'yith-woocommerce-wishlist/init.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ):
	if( ! function_exists( 'add_to_wishlist_in_product' ) ){
		function add_to_wishlist_in_product(){
			echo do_shortcode( "[yith_wcwl_add_to_wishlist]" );
		}
	}
add_action( 'woocommerce_after_shop_loop_item', 'add_to_wishlist_in_product', 12 );
endif;

// shortcode for compare product block 
if ( in_array( 'yith-woocommerce-compare/init.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ):
	if( ! function_exists( 'add_to_compare_in_product' ) ){
    	function add_to_compare_in_product(){
        	echo do_shortcode( "[yith_compare_button]" );
    	}
	}
add_action( 'woocommerce_after_shop_loop_item', 'add_to_compare_in_product', 12 );
endif;

// Add Your Menu Locations
if( ! function_exists( 'register_nileforest_menus' ) ):
	function register_nileforest_menus() {
	  register_nav_menus(
		array(  
			'header_top_menu' => esc_html__( 'Header Top Menus', 'philos' )    	
		)
	  );
	} 
add_action( 'init', 'register_nileforest_menus' );
endif;

// Ajax add to cart count
if( defined( 'YITH_WCWL' ) && ! function_exists( 'yith_wcwl_ajax_update_count' ) ){
	function yith_wcwl_ajax_update_count(){
		wp_send_json( array(
			'count' => yith_wcwl_count_all_products()
		) );
	}
	add_action( 'wp_ajax_yith_wcwl_update_wishlist_count', 'yith_wcwl_ajax_update_count' );
	add_action( 'wp_ajax_nopriv_yith_wcwl_update_wishlist_count', 'yith_wcwl_ajax_update_count' );
}

//Read more
if( ! function_exists( 'nileforest_excerpt_more' ) ):
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @since Nileforest 1.0
 *
 * @param string $link Link to single post/page.
 * @return string 'Continue reading' link prepended with an ellipsis.
 */

function nileforest_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}
	$link = sprintf( '<p class="link-more"><a href="%1$s" class="more-link btn btn-xs btn-gray ">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Read More <i class="fa fa-long-arrow-right right" aria-hidden="true"></i>', 'philos' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'nileforest_excerpt_more' );
endif;

//add category page description
if( ! function_exists( 'nileforest_short_description' ) ):
function nileforest_short_description() {    
   ?>
	<div class="product-description">
		<?php echo the_excerpt(); ?>
	</div>
	<?php	
}
endif;

//add category page tag
if( ! function_exists( 'nileforest_product_tag' ) ):
function  nileforest_product_tag(){
	// get product_tags of the current product
	$current_tags = get_the_terms( get_the_ID(), 'product_tag' );
	
	//for each tag we create a list item
	//only start if we have some tags
	if ( $current_tags && ! is_wp_error( $current_tags ) ) { 
		 //create a list to hold our tags		
		echo '<div class="product_tags">';
		
		foreach ($current_tags as $tag) {
			$tag_title = $tag->name; // tag name
			$tag_link = get_term_link( $tag );// tag archive link
			echo '<a class="tag" href="'.esc_url($tag_link).'">'.$tag_title.'</a>';
		}
		echo '</div>';		
	}
}
endif;
//remove cross sell Products
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');
?>