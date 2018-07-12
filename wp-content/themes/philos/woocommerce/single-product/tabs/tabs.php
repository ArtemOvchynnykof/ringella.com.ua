<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $tabs ) ) : ?>

	<div class="product-tabs-wrapper">
		<ul class="product-content-tabs nav nav-tabs" role="tablist">
			<?php $tab_count = 0; ?>
			<?php foreach ( $tabs as $key => $tab ) : ?>
				<li class="nav-item">
					<a id="tab-title-<?php echo esc_attr( $key ); ?>" class="<?php echo esc_attr( $key ); ?>_tab<?php if($tab_count==0){echo " active"; }?>" role="tab" data-toggle="tab" href="#tab-<?php echo esc_attr( $key ); ?>"><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', esc_html( $tab['title'] ), $key ); ?></a>
				</li>
			<?php $tab_count++;?>
			<?php endforeach; ?>
		</ul>
		<div class="product-content-Tabs_wraper tab-content">
			<?php $tab_count_content = 0; ?>
			<?php foreach ( $tabs as $key => $tab ) : ?>
				<div id="tab-<?php echo esc_attr( $key ); ?>"  role="tabpanel" class="tab-pane fade <?php if($tab_count_content==0){echo " in active"; }?>">
					<!-- Accordian Title -->			
					<h6 class="product-collapse-title <?php echo esc_attr( $key ); ?>_tab" data-toggle="collapse" data-target="#tab-<?php echo esc_attr( $key ); ?>-col"><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', esc_html( $tab['title'] ), $key ); ?></h6>			
					<!-- End Accordian Title -->
					<!-- Accordian Content -->
					<div id="tab-<?php echo esc_attr( $key ); ?>-col" class="<?php echo esc_attr( $key ); ?> product-collapse collapse">
						<?php if ( isset( $tab['callback'] ) ) { call_user_func( $tab['callback'], $key, $tab ); } ?>
					</div>
					<!-- Accordian Content -->
				</div>
				<?php $tab_count_content++;?>
			<?php endforeach; ?>
		</div>
	</div>

<?php endif; ?>
