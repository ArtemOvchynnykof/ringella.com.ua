<?php

/**
 * Displays footer site info
 *
 * @package WordPress
 * @subpackage Nileforest
 * @since Nileforest 1.0
 */

?>
<?php if(theme_get_option('footer_widget') != 'no'): ?>

<div class="container">
  <div class="copyrights">
    <?php if(theme_get_option('footer_copyright') != ''): ?>
    <p class="copyright">
      <?php esc_html__( 'Copyright', 'philos' ); ?>
      &copy; <a href="<?php echo esc_url(theme_get_option('footer_copyright_link')); ?>" target="_blank"  title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php echo theme_get_option('footer_copyright'); ?></a> <?php echo esc_attr(theme_get_option('footer_copyright_slogan'));?> <?php echo esc_attr(date('Y')); ?></p>
    <?php endif; ?>
	<?php if(theme_get_option('footer_payment_show_hide') != 'no'): ?>
		<?php if(theme_get_option('footer_payment_img') != ''): ?>
			<p class="payment"><img src="<?php echo esc_url(theme_get_option('footer_payment_img')); ?>" alt="<?php esc_attr( 'payment', 'philos' ); ?>" /></p>
		<?php endif; ?>
	<?php endif; ?>
  </div>
</div><!-- #Footer Copyright -->
<?php endif; ?>