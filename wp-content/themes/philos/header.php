<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Nileforest
 * @since Nileforest 1.0 
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>    
</head>

<body <?php body_class(); ?>>
<!-- Newsletter Popup -->
<?php if(theme_get_option('popup_btn') != 'no'):
	//nileforest_header_popup();
	get_template_part( 'template-parts/header/header', 'popup' );
endif; ?>
<!-- End Newsletter Popup -->	
<!-- Sidebar Menu (Cart Menu) -->
<?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) : ?>
	<?php if(theme_get_option('header_addtocart_btn') == 'yes'):
		//nileforest_header_cart_popup();
		get_template_part( 'template-parts/header/header', 'cartpopup' );
	endif; ?>
<?php endif; ?>
<!-- End Sidebar Menu (Cart Menu) -->
<!-- Search Overlay Menu -->
<?php
	if(theme_get_option('header_search_btn') == 'yes'):
		//nileforest_header_search();
		get_template_part( 'template-parts/header/header', 'search' );
	endif;
?>
<!-- End Search Overlay Menu -->
<div id="page" class="wraper">	
	<?php 
		$custom_header = get_custom_header_markup(); 
    	if ( !empty( $custom_header ) ):
		?>
		<div class="custom-header">
			<div class="custom-header-media">
				<?php the_custom_header_markup(); ?>
			</div>
		</div><!-- .custom-header -->
		<?php endif; ?>
	<header class="header">
		<?php get_template_part( 'template-parts/header/header', 'image' ); ?>
	</header><!-- #masthead -->
	
	<div class="site-content-contain">
		<div id="content" class="page-content-wraper">