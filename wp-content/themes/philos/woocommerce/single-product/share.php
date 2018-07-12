<?php
/**
 * Single Product Share
 *
 * Sharing plugins can hook into here or you can add your own code directly.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/share.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php //do_action( 'woocommerce_share' ); // Sharing plugins can hook into here ?>

<div class="product-share">
			<span><?php _e( 'Share:', 'philos' ); ?></span>
			<ul>
				<li><a href="https://www.facebook.com/sharer.php?u=<?php echo get_permalink( get_the_ID() ); ?>&images=<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
				<li><a href="http://twitter.com/share?url=<?php echo get_permalink( get_the_ID() ); ?>&text=<?php echo get_the_title( get_the_ID());?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
				<li><a href="http://plus.google.com/share?url=<?php echo get_permalink( get_the_ID() ); ?>&text=<?php echo get_the_title( get_the_ID());?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>				
				<li><a href="http://pinterest.com/pin/create/button/?url=<?php echo get_permalink( get_the_ID() ); ?>"&media="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>"&description="<?php echo get_the_title( get_the_ID());?>" target="_blank"><i class="fa fa-pinterest"></i></a></li>
			</ul>
		</div>
		
<?php

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */