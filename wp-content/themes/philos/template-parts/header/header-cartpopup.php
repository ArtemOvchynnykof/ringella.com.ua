<?php

/**
 * Displays header cart popup
 *
 * @package WordPress
 * @subpackage Nileforest
 * @since Nileforest 1.0
 */
?>
<section id="sidebar-right" class="sidebar-menu sidebar-right">
  <div class="cart-sidebar-wrap">
    <div class="cart-widget-heading">
      <h4><?php echo esc_html('Shopping Cart', 'philos'); ?></h4>
      <a id="sidebar_close_icon" class="close-icon-white"></a> </div>
    <div class="widget shopping-cart-sidebar woocommerce widget_shopping_cart">
      <div class="widget_shopping_cart_content"></div>
    </div>
  </div>
</section>
<div class="sidebar_overlay"></div>
