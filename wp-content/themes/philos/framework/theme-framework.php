<?php
/**
 * Nileforest Framework
 *
 * @package   Nileforest Framework
 * @author    Nileforest <http://nileforest.com>
 * 
 */


	/*
	 * Loads the Options Panel
	 *
	 * If you're loading from a child theme use stylesheet_directory
	 * instead of template_directory
	 */
	get_template_part( '/framework/options', 'framework' );		
	
	// add theme function
	get_template_part( '/framework/theme','functions');
		
	// add theme styles admin option
	get_template_part( '/framework/theme','setting');	
		
	//widget
	get_template_part( '/framework/inc/widget/followus');
	get_template_part( '/framework/inc/widget/contactus');
	get_template_part( '/framework/inc/widget/testimonial');
	get_template_part( '/framework/inc/widget/category');
	get_template_part( '/framework/inc/widget/team');
	get_template_part( '/framework/inc/widget/blog');
	get_template_part( '/framework/inc/widget/slider');
		
	//woocommerce custom tab data
	get_template_part( '/framework/inc/tab/product','tab');	
		
	//page options	
	get_template_part( '/framework/inc/admin/page','option');	
	
	/*** plugin */
	get_template_part( '/framework/plugins/theme-plugins', 'install' );	

/**** Theme Default Setting ****/
function theme_default_options()
{	
	add_option("options-framework-theme", array(
			//General Settings 
			'body_layout'=>'fullwidth',
			'body_typography'=>array('size'=>'14px','face'=>'Open Sans','style'=>'normal','color'=>'#333333'),
			'body_backgroud_color'=>'',
			'body_backgroud_image'=>'',
			'body_backgroud_repeat'=>'no-repeat',
			'body_backgroud_position'=>'center top',
			'h1_font_family'=>'plesae-select',
			'h2_font_family'=>'plesae-select',
			'h3_font_family'=>'plesae-select',
			'h4_font_family'=>'plesae-select',
			'h5_font_family'=>'plesae-select',
			'h6_font_family'=>'plesae-select',
			'btn_font_family'=>'plesae-select',
			'lbl_font_family'=>'plesae-select',
			'paragraph_font_family'=>'plesae-select',
			'alt_font_family'=>'plesae-select',
			
			//Header Settings 
			'header_style'=>'fixed',
			'phone_number_label'=>'',
			'phone_number'=>'',
			'logo_upload'=> get_stylesheet_directory_uri()."/framework/images/logo_black.png",
			'logo_alt'=>'Philos',
			'site_description'=>'no',
			'header_buy_now'=>'no',
			'buynow_label'=>'Buy Now',
			'buynow_link'=>'#',
			'header_search_btn'=>'yes',
			'header_wishlist_btn'=>'yes',
			'header_addtocart_btn'=>'yes',
			
			//Footer Settings
			'footer_address'=>'1 Wintergreen Dr. Huntley <br /> IL 60142, Usa',
			'footer_email_address'=>'info@themedemo.com',
			'footer_phone_number'=>'0123-456-789',
			'footer_fax_number'=>'0123-456-789',
			'footer_copyright'=>'NileForest',
			'footer_copyright_link'=>'http://www.nileforest.com/',
			'footer_copyright_slogan'=>'Philos Responsive Woocommerce Theme',
			'footer_payment_show_hide'=>'yes',
			'footer_payment_img'=> get_stylesheet_directory_uri()."/framework/images/payment_logos.png",
			'footer_widget'=>'yes',
			'facebook_link'=>'#',
			'twitter_link'=>'#',
			'pinterest_link'=>'#',
			'google_plus_link'=>'#',
			'instagram_link'=>'#',
			'popup_btn'=>'no',
			'popup_backgroud_color'=>'#f8f8f8',
			'popup_backgroud_image'=> get_stylesheet_directory_uri()."/framework/images/newsletter_popup_bg.png",
			'popup_backgroud_repeat'=>'no-repeat',
			'popup_backgroud_position'=>'top right',
			'popup_heading'=>'Join Our Mailing List',
			'popup_top_text'=>'But I must explain to you how all this mistaken <br /> idea of denouncing pleasure pain.',
			'popup_form_id'=>'1',
			'popup_bottom_text'=>'Sign up For Exclusive Updates, New Arrivals <br /> And Insider-Only Discount.',
			
			//Blog Settings
			'blog_single_breadcrumb'=>'yes',
			'blog_single_layout'=>'right-sidebar',
			
			//Woocommerce Settings			
			'signle_page_sidebar'=>'no-sidebar',						
			)); 
}
add_action('init', 'theme_default_options');
?>