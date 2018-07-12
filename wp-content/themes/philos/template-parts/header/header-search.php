<?php

/**
 * Displays header search
 *
 * @package WordPress
 * @subpackage Nileforest
 * @since Nileforest 1.0
 */
?>

<section class="search-overlay-menu">
	<a class="search-overlay-close"></a>
	<div class="container"> 
		<form role="search" id="searchform" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
			<div class="search-icon-lg">
				<img src="<?php echo esc_url(get_template_directory_uri().'/framework/images/search-icon-lg.png'); ?>" alt="<?php echo esc_attr( 'Search Button', 'philos' ); ?>" />
			</div>
			<label class="h6 normal search-input-label"><?php echo esc_html__('Enter keywords to Search Product', 'philos'); ?></label>
			<?php
				if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) { 
					?><input name="post_type" value="product" type="hidden"><?php
				}else{ 
					?><input name="post_type" value="post" type="hidden"><?php
				}
			?>
			<input class="search-field"  type="search" placeholder="<?php echo esc_attr( 'Search...' ,'philos' );?>"
				value="<?php echo esc_attr(get_search_query());?>" name="s"
				title="<?php echo esc_attr( 'Search...', 'philos' );?>" />
			<input type="submit" class="search-submit" value="<?php echo esc_attr( 'Search', 'philos' );?>" />
		</form>
	</div>
</section>