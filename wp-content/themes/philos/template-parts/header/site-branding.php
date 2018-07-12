<?php

/**
 * Displays header site branding
 *
 * @package WordPress
 * @subpackage Nileforest
 * @since Nileforest 1.0
 */
?>
<!-- Header Container -->

<div <?php if(theme_get_option('header_style') == 'fixed'): ?> id="header-sticky"  <?php endif; ?> class="header-main">
  <div class="header-main-inner">
    <!-- Logo -->
    <div class="logo">
      <?php if(theme_get_option('logo_upload') != ''): ?>
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>"  title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"> <img src="<?php echo theme_get_option('logo_upload'); ?>" alt="<?php echo esc_attr(theme_get_option('logo_alt')); ?>" /> </a>
      <?php else: ?>
      <h2 class="site-title"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
        <?php bloginfo( 'name' ); ?>
        </a> </h2>
      <?php endif; ?>
      <?php 

	  if(theme_get_option('site_description') == 'yes'):
		 $description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
      <p class="site-description"><?php echo esc_html($description); ?></p>
      <?php endif;

	 endif; ?>
    </div><!-- End Logo -->
    <!-- Right Sidebar Nav -->
    <div class="header-rightside-nav">
      <!-- Buy Now Link -->
      <?php if(theme_get_option('header_buy_now') == 'yes'): ?>
      <div class="header-btn-link hidden-lg-down"> <a href="<?php echo esc_url(theme_get_option('buynow_link')); ?>" class="btn btn-sm btn-color"><?php echo esc_attr(theme_get_option('buynow_label')); ?></a></div>
      <?php endif; ?>
      <!-- End Buy Now Link -->
      <!-- Sidebar Icon -->
      <?php if(theme_get_option('header_search_btn') != 'no' || (theme_get_option('header_wishlist_btn') != 'no' || theme_get_option('header_addtocart_btn') != 'no')): ?>
      <div class="sidebar-icon-nav">
        <ul class="list-none-ib">
          <!-- Search-->
          <?php if(theme_get_option('header_search_btn') == 'yes'): ?>
          <li><a id="search-overlay-menu-btn"><i aria-hidden="true" class="fa fa-search"></i></a></li>
          <?php endif; ?>
          <!-- Whishlist-->
          <?php if ( in_array( 'yith-woocommerce-wishlist/init.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) : ?>
          <?php if(theme_get_option('header_wishlist_btn') == 'yes'): ?>
          <li><a class="js_whishlist-btn" href="<?php echo esc_url( home_url( '/' ) )."wishlist"; ?>"><i aria-hidden="true" class="fa fa-heart"></i><span class="countTip">
            <?php 
				$wishlist_count = YITH_WCWL()->count_products();
				echo esc_html($wishlist_count); 
			?>
            </span></a> </li>
          <?php endif; ?>
          <?php endif; ?>
          <!-- Cart-->
          <?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) : ?>
          <?php if(theme_get_option('header_addtocart_btn') == 'yes'): ?>
          <li>
            <?php 
				global $fragments;
				$cart_data = woocommerce_header_add_to_cart_fragment($fragments); 
				echo wp_kses_post($cart_data["a.cart-contents"]); 
			?>			
          </li>
          <?php endif; ?>
          <?php endif; ?>
        </ul>
      </div>
      <?php endif; ?>
      <!-- End Sidebar Icon -->
    </div><!-- End Right Sidebar Nav -->
    <!-- Navigation Menu -->
    <?php if ( has_nav_menu( 'top' ) ) : ?>
    <div class="navigation-top">
      <?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
    </div><!-- .navigation-top -->
    <?php endif; ?>
    <!-- End Navigation Menu -->
  </div>
</div><!-- End Header Container -->