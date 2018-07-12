<?php

/**
 * Displays header media
 *
 * @package WordPress
 * @subpackage Nileforest
 * @since Nileforest 1.0
 */
?>

<div class="header-topbar">
  <div class="header-topbar-inner">
    <!--Topbar Left-->
    <div class="topbar-left hidden-sm-down">
      <?php if(theme_get_option('phone_number')): ?>
      <div class="phone"> <i class="fa fa-phone left" aria-hidden="true"></i><?php echo esc_attr(theme_get_option('phone_number_label')); ?>
        <?php esc_html__( ':', 'philos' ); ?>
        <b><?php echo esc_attr(theme_get_option('phone_number')); ?></b> </div>
      <?php endif; ?>
    </div> <!--End Topbar Left-->
    <!--Topbar Right-->
    <div class="topbar-right">
      <?php
			if ( has_nav_menu( 'header_top_menu' ) ) : 
				wp_nav_menu(array(
				'theme_location' => 'header_top_menu', // menu slug from step 1
				'container' 	 => false, // 'div' container will not be added
				'menu_class' 	 => 'list-none', // <ul class="nav"> 
				'depth'          => 1,
				'link_before'    => '',
				'link_after'     => '',
				'fallback_cb' 	 => false,
			));
			endif;
		?>
    </div><!-- End Topbar Right -->
  </div> <!--header-topbar-inner-->
</div><!--header-topbar-->
<?php get_template_part( 'template-parts/header/site', 'branding' ); ?>