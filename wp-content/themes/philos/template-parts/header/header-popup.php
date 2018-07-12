<?php

/**
 * Displays header newsletter popup
 *
 * @package WordPress
 * @subpackage Nileforest
 * @since Nileforest 1.0
 */
?>

<!-- Newsletter Popup -->
    <section id="nlpopup" class="nlpopup" data-expires="30" data-delay="10" <?php if(theme_get_option('popup_backgroud_image')){ ?>style="background-image:url('<?php echo theme_get_option('popup_backgroud_image');?>'); background-color:<?php echo theme_get_option('popup_backgroud_color'); ?>; background-repeat:<?php echo theme_get_option('popup_backgroud_repeat');?>; background-position:<?php echo theme_get_option('popup_backgroud_position');?>"<?php }?>>
        <!--Close Button-->
        <a class="nlpopup_close nlpopup_close_icon">
            <img src="<?php echo esc_url(get_template_directory_uri().'/framework/images/close-icon-white.png'); ?>" alt="<?php esc_attr('Newsletter Close', 'philos'); ?>" /></a>
        <!--End Close Button-->
		<?php if(theme_get_option('popup_heading')): ?>
        <h3 class="mb-40"><?php echo esc_html(theme_get_option('popup_heading'));?></h3>
		<?php endif; ?>
		<?php if(theme_get_option('popup_top_text')): ?>
        <p class="black mb-20">
           <?php echo theme_get_option('popup_top_text');?> 
        </p>
		<?php endif; ?>       
		<?php
			if ( in_array( 'wysija-newsletters/index.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) : 
				if(theme_get_option('popup_form_id')): 
					echo do_shortcode('[wysija_form id="'.theme_get_option('popup_form_id').'"]'); 
				endif;
			endif;
		?>
		<?php if(theme_get_option('popup_bottom_text')): ?>
        <label class="mt-20">
			<?php echo theme_get_option('popup_bottom_text');?>
        </label>
		<?php endif; ?>
        <a class="nlpopup_close nlpopup_close_link mt-40"><?php esc_html_e('&#10006; Close', 'philos'); ?></a>
    </section>
    <!-- Overlay -->
    <div id="nlpopup_overlay"></div>
    <!-- End Newsletter Popup -->
