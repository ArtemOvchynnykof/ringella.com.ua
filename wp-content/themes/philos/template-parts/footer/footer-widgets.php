<?php

/**
 * Displays footer widgets if assigned
 *
 * @package WordPress
 * @subpackage Nileforest
 * @since Nileforest 1.0
 */



?>
<?php

if(theme_get_option('footer_widget') != 'no'):
	?>
<aside class="widget-area" role="complementary" aria-label="<?php esc_attr( 'Footer', 'philos' ); ?>">
  <?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' )  || is_active_sidebar( 'footer-5' ) ) :	?>  
  <div class="container">
    <div class="row">
      <?php
		if ( is_active_sidebar( 'footer-1' ) ) { ?>
		  <div class="col-lg-3 col-md-12 col-sm-12 mb-sm-45">
			<div class="footer-block about-us-block">
			  <?php dynamic_sidebar( 'footer-1' ); ?>
			</div>
		  </div>
      	<?php }
		if ( is_active_sidebar( 'footer-2' ) ) { ?>
		  <div class="col-lg-2 col-md-4 col-sm-4 mb-sm-45">
			<div class="footer-block information-block">
			  <?php dynamic_sidebar( 'footer-2' ); ?>
			</div>
		  </div>
      <?php } 
		if ( is_active_sidebar( 'footer-3' ) ) { ?>
		  <div class="col-lg-2 col-md-4 col-sm-4 mb-sm-45">
			<div class="footer-block links-block">
			  <?php dynamic_sidebar( 'footer-3' ); ?>
			</div>
		  </div>
      <?php }
		if ( is_active_sidebar( 'footer-4' ) ) { ?>
		  <div class="col-lg-2 col-md-4 col-sm-4 mb-sm-45">
			<div class="footer-block extra-block">
			  <?php dynamic_sidebar( 'footer-4' ); ?>
			</div>
		  </div>
      <?php }
		if ( is_active_sidebar( 'footer-5' ) ) { ?>
		  <div class="col-lg-3 col-md-12 col-sm-12">
			<div class="footer-block contact-block">
			  <?php dynamic_sidebar( 'footer-5' ); ?>
			</div>
		  </div>
		  <?php }
		?>
    </div>
  </div> <!-- #Footer Info -->
  <?php endif; ?>
  <?php if ( is_active_sidebar( 'footer-bottom' ) ) : ?>
  <?php if ( in_array( 'wysija-newsletters/index.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) : ?>
  <div class="container">
    <div class="footer-newsletter">
      <?php dynamic_sidebar( 'footer-bottom' ); ?>
    </div>
  </div>  <!-- #Footer Newsletter -->
  <?php endif; ?>
  <?php endif; ?>
</aside><!-- .widget-area -->
<?php endif; ?>