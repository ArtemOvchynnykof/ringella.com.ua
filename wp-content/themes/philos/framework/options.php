<?php

/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 */

function nileforest_framework_option_name() {
	// Change this to use your theme slug
	return 'options-framework-theme';
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'Nileforest'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	require get_parent_theme_file_path( '/framework/theme-array.php' );
	$options = array();

	//General Settings
	$options[] = array(
		'name' => esc_html__( 'General Settings', 'philos' ),
		'type' => 'heading'
	);	

	//Layout Option Fullwidth/Fixed
	$options[] = array(
		'name' 		=> esc_html__( 'Layout Option', 'philos' ),
		'desc' 		=> esc_html__( 'Define theme Layout option.', 'philos' ),
		'id'   		=> 'body_layout',
		'std'		=> $layout_default,
		'type'   	=> 'select',
		'options' 	=> $options_layout	
	);

	//Body Fonts
	$options[] = array(
		'name' 	    => esc_html__( 'Body Typography', 'philos' ),
		'desc'      => esc_html__( 'Define body typography options.', 'philos' ),
		'id'      	=> "body_typography",
		'std' 		=> $typography_defaults,
		'type'      => 'typography',
		'options'   => $typography_options
	);

	//Backgroud Color
	$options[] = array(
		'name' => esc_html__( 'Body Background Color', 'philos' ),
		'desc' => esc_html__( 'Define body color here.', 'philos' ),
		'id'   => 'body_backgroud_color',
		'type' => 'color'
	);

	//Backgroud Image
	$options[] = array(

		'name' => esc_html__( 'Body Background Image', 'philos' ),
		'desc' => esc_html__( 'Upload body backgroud image.', 'philos' ),
		'id'   => 'body_backgroud_image',
		'type' => 'upload'
	);

	//Backgroud Repeat
	$options[] = array(
		'name' 		=> esc_html__( 'Body Background Repeat', 'philos' ),
		'desc' 		=> esc_html__( 'Define body backgroud image repeat.', 'philos' ),
		'id'   		=> 'body_backgroud_repeat',
		'type' 		=> 'select',
		'options' 	=> $options_backgroud_repeat	
	);

	//Backgroud Position
	$options[] = array(
		'name' 		=> esc_html__( 'Body Background Position', 'philos' ),
		'desc' 		=> esc_html__( 'Define body backgroud image position.', 'philos' ),
		'id'   		=> 'body_backgroud_position',
		'type' 		=> 'select',
		'options' 	=> $options_backgroud_position	
	);	

	$options[] = array(
		'name' => esc_html__( 'Font Settings', 'philos' ),
		'type' => 'info'
	);

	//H1 Font Family
	$options[] = array(
		'name' 		=> esc_html__( 'H1 Tag Font Family', 'philos' ),
		'desc' 		=> esc_html__( 'Define theme heading H1 tag font family.', 'philos' ),
		'id'   		=> 'h1_font_family',
		'type'   	=> 'select',
		'options' 	=> $google_fonts_list	
	);

	//H2 Font Family
	$options[] = array(
		'name' 		=> esc_html__( 'H2 Tag Font Family', 'philos' ),
		'desc' 		=> esc_html__( 'Define theme heading H2 tag font family.', 'philos' ),
		'id'   		=> 'h2_font_family',
		'type'   	=> 'select',
		'options' 	=> $google_fonts_list	
	);

	//H3 Font Family
	$options[] = array(
		'name' 		=> esc_html__( 'H3 Tag Font Family', 'philos' ),
		'desc' 		=> esc_html__( 'Define theme heading H3 tag font family.', 'philos' ),
		'id'   		=> 'h3_font_family',
		'type'   	=> 'select',
		'options' 	=> $google_fonts_list	
	);

	//H4 Font Family
	$options[] = array(
		'name' 		=> esc_html__( 'H4 Tag Font Family', 'philos' ),
		'desc' 		=> esc_html__( 'Define theme heading H4 tag font family.', 'philos' ),
		'id'   		=> 'h4_font_family',
		'type'   	=> 'select',
		'options' 	=> $google_fonts_list
	);

	//H5 Font Family
	$options[] = array(
		'name' 		=> esc_html__( 'H5 Tag Font Family', 'philos' ),
		'desc' 		=> esc_html__( 'Define theme heading H5 tag font family.', 'philos' ),
		'id'   		=> 'h5_font_family',
		'type'   	=> 'select',
		'options' 	=> $google_fonts_list
	);

	//H6 Font Family
	$options[] = array(
		'name' 		=> esc_html__( 'H6 Tag Font Family', 'philos' ),
		'desc' 		=> esc_html__( 'Define theme heading H6 tag font family.', 'philos' ),
		'id'   		=> 'h6_font_family',
		'type'   	=> 'select',
		'options' 	=> $google_fonts_list	
	);

	//Button Font Family
	$options[] = array(
		'name' 		=> esc_html__( 'Button Font Family', 'philos' ),
		'desc' 		=> esc_html__( 'Define theme Button font family.', 'philos' ),
		'id'   		=> 'btn_font_family',
		'type'   	=> 'select',
		'options' 	=> $google_fonts_list	
	);

	//label Font Family
	$options[] = array(
		'name' 		=> esc_html__( 'Label Font Family', 'philos' ),
		'desc' 		=> esc_html__( 'Define theme Label font family.', 'philos' ),
		'id'   		=> 'lbl_font_family',
		'type'   	=> 'select',
		'options' 	=> $google_fonts_list	
	);

	//Paragraph Font Family
	$options[] = array(
		'name' 		=> esc_html__( 'Paragraph Font Family', 'philos' ),
		'desc' 		=> esc_html__( 'Define theme Paragraph font family.', 'philos' ),
		'id'   		=> 'paragraph_font_family',		
		'type'   	=> 'select',
		'options' 	=> $google_fonts_list	
	);

	//Alt/Sub Font Family
	$options[] = array(
		'name' 		=> esc_html__( 'Alt/Sub Font Family', 'philos' ),
		'desc' 		=> esc_html__( 'Define theme alt/sub font family.', 'philos' ),
		'id'   		=> 'alt_font_family',		
		'type'   	=> 'select',
		'options' 	=> $google_fonts_list	
	);	

	//Header Settings
	$options[] = array(
		'name' => esc_html__( 'Header Settings', 'philos' ),
		'type' => 'heading'
	);

	//Header Style
	$options[] = array(
		'name' 		=> esc_html__( 'Header Style', 'philos' ),
		'desc' 		=> esc_html__( 'Define header style.', 'philos' ),
		'id'   		=> 'header_style',
		'type' 		=> 'select',
		'options' 	=> $header_style	
	);	

	//Phone Number Label
	$options[] = array(
		'name' => esc_html__( 'Header Phone Number Label', 'philos' ),
		'desc' => esc_html__( 'Define your phone number Label.', 'philos' ),
		'id'   => 'phone_number_label',
		'std'  => $phone_label,		
		'type' => 'text'
	);

	//Phone Number
	$options[] = array(
		'name' => esc_html__( 'Header Phone Number', 'philos' ),
		'desc' => esc_html__( 'Define your phone number.', 'philos' ),
		'id'   => 'phone_number',
		'std'  => $phone_number,	
		'type' => 'text'
	);

	//Upload Logo
	$options[] = array(
		'name' => esc_html__( 'Upload Logo', 'philos' ),
		'desc' => esc_html__( 'Upload your logo.', 'philos' ),
		'id'   => 'logo_upload',
		'std'  => $logo_default,
		'type' => 'upload'
	);

	//Logo Alt tag
	$options[] = array(
		'name' => esc_html__( 'Logo Image Alt', 'philos' ),
		'desc' => esc_html__( 'Define logo image alt here.', 'philos' ),
		'id'   => 'logo_alt',
		'std'  => $logoalt_default,
		'type' => 'text'
	);	

	//Display Site Description
	$options[] = array(
		'name' => esc_html__( 'Display Site Description?', 'philos' ),
		'desc' => esc_html__( 'Show/hide Site Description.', 'philos' ),
		'id'   => 'site_description',		
		'options' 	=> $options_site_description,	
		'type' => 'select'
	);	

	//Show/Hide BuyNow Button
	$options[] = array(
		'name' 		=> esc_html__( 'Display Buy Now Button', 'philos' ),
		'desc' 		=> esc_html__( 'Show/hide buy now button.', 'philos' ),
		'id'   		=> 'header_buy_now',
		'type'   	=> 'select',
		'std'  		=> $buynowbtn_option,
		'options' 	=> $options_footer_show_hide
	);
	
	//BuyNow Button Text
	$options[] = array(
		'name' 		=> esc_html__( 'Buy Now Button Label', 'philos' ),
		'desc' 		=> esc_html__( 'Define buy now button label.', 'philos' ),
		'id'   		=> 'buynow_label',
		'std'  		=> $buynowbtn_label,
		'type' 		=> 'text'
	);

	//BuyNow Button link
	$options[] = array(
		'name' 		=> esc_html__( 'Buy Now Button Link', 'philos' ),
		'desc' 		=> esc_html__( 'Define buy now button link.', 'philos' ),
		'id'  		=> 'buynow_link',
		'std'  		=> $buynowbtn_link,
		'type' 		=> 'text'
	);

	//Show/Hide Search Button
	$options[] = array(
		'name' 		=> esc_html__( 'Display Search Button', 'philos' ),
		'desc' 		=> esc_html__( 'Show/hide search button.', 'philos' ),
		'id'   		=> 'header_search_btn',
		'type'   	=> 'select',
		'std'  		=> $searchbtn_option,
		'options' 	=> $options_footer_show_hide	
	);

	//Show/Hide Wishlist Button
	$options[] = array(
		'name' 		=> esc_html__( 'Display Wishlist Button', 'philos' ),
		'desc' 		=> esc_html__( 'Show/hide wishlist button.', 'philos' ),
		'id'   		=> 'header_wishlist_btn',
		'type'   	=> 'select',
		'std'  		=> $wishlistbtn_option,
		'options' 	=> $options_footer_show_hide	
	);

	//Show/Hide Cart
	$options[] = array(
		'name' 		=> esc_html__( 'Display AddToCart Button', 'philos' ),
		'desc' 		=> esc_html__( 'Show/hide addtocart button.', 'philos' ),
		'id'   		=> 'header_addtocart_btn',
		'type'   	=> 'select',
		'std'  		=> $addtocartbtn_option,
		'options' 	=> $options_footer_show_hide	
	);

	//Footer option
	$options[] = array(
		'name' => esc_html__( 'Footer Settings', 'philos' ),
		'type' => 'heading'
	);

	//footer address
	$options[] = array(
		'name' 		=> esc_html__( 'Footer Address', 'philos' ),
		'desc' 		=> esc_html__( 'Define address.', 'philos' ),
		'id'   		=> 'footer_address',
		'type' 		=> 'textarea',
		'std'  		=> $footeraddress_default,
		'rows' 		=> 5
	);

	//Email Address
	$options[] = array(
		'name' 		=> esc_html__( 'Footer Email Address', 'philos' ),
		'desc' 		=> esc_html__( 'Define email address.', 'philos' ),
		'id' 		=> 'footer_email_address',
		'std'  		=> $footeremail_default,
		'type' 		=> 'text'
	);

	//footer phone number
	$options[] = array(
		'name' => esc_html__( 'Footer Phone Number', 'philos' ),
		'desc' => esc_html__( 'Define phone number.', 'philos' ),
		'id'   => 'footer_phone_number',
		'std'  => $footerphone_default,
		'type' => 'text'
	);
	
	//fax  number
	$options[] = array(
		'name' => esc_html__( 'Footer Fax Number', 'philos' ),
		'desc' => esc_html__( 'Define fax number.', 'philos' ),
		'id'   => 'footer_fax_number',
		'std'  => $footerfax_default,
		'type' => 'text'
	);

	//footer copyrights
	$options[] = array(
		'name' => esc_html__( 'Footer Copyrights', 'philos' ),
		'desc' => esc_html__( 'Define copyrights text.', 'philos' ),
		'id'   => 'footer_copyright',
		'std'  => $footercopyright_default,
		'type' => 'text'
	);

	//footer copyrights link
	$options[] = array(
		'name' => esc_html__( 'Footer Copyrights Link', 'philos' ),
		'desc' => esc_html__( 'Define copyrights Link.', 'philos' ),
		'id'   => 'footer_copyright_link',
		'std'  => $footercopyright_default_link,
		'type' => 'text'
	);
	
	//footer copyrights slogan
	$options[] = array(
		'name' => esc_html__( 'Footer Copyrights Slogan', 'philos' ),
		'desc' => esc_html__( 'Define copyrights Slogan', 'philos' ),
		'id'   => 'footer_copyright_slogan',
		'std'  => $footercopyright_default_slogan,
		'type' => 'text'
	);

	//footer payment image
	$options[] = array(
		'name' 		=> esc_html__( 'Display Footer Payment Image', 'philos' ),
		'desc' 		=> esc_html__( 'Show/hide footer payment image.', 'philos' ),
		'id'   		=> 'footer_payment_show_hide',
		'type'   	=> 'select',
		'std'  		=> $footerpaymentoption_default,
		'options' 	=> $options_footer_show_hide	
	);
	
	$options[] = array(
		'name' => esc_html__( 'Footer Payment Image', 'philos' ),
		'desc' => esc_html__( 'Upload payment image.', 'philos' ),
		'id'   => 'footer_payment_img',
		'std'  => $footerpayment_default,
		'type' => 'upload'
	);

	//show/hide footer widget
	$options[] = array(
		'name' 		=> esc_html__( 'Display Footer Widget', 'philos' ),
		'desc' 		=> esc_html__( 'Show/hide footer Widget.', 'philos' ),
		'id'   		=> 'footer_widget',
		'type'   	=> 'select',
		'std'  		=> $footeroption_default,
		'options' 	=> $options_footer_show_hide	
	);

	//Social Settings
	$options[] = array(
		'name' => esc_html__( 'Social Media Links', 'philos' ),
		'type' => 'info'
	);

	//Facebook URL
	$options[] = array(
		'name' => esc_html__( 'Facebook URL', 'philos' ),
		'desc' => esc_html__( 'Define your facebook link.', 'philos' ),
		'id'   => 'facebook_link',
		'std'  => $facebook_default,
		'type' => 'text'
	);

	//Twitter URL
	$options[] = array(
		'name' => esc_html__( 'Twitter URL', 'philos' ),
		'desc' => esc_html__( 'Define your twitter link.', 'philos' ),
		'id'   => 'twitter_link',
		'std'  => $twitter_default,
		'type' => 'text'
	);

	//Pinterest URL
	$options[] = array(
		'name' => esc_html__( 'Pinterest URL', 'philos' ),
		'desc' => esc_html__( 'Define your pinterest link.', 'philos' ),
		'id'   => 'pinterest_link',
		'std'  => $pinterest_default,
		'type' => 'text'
	);

	//Google Plus URL
	$options[] = array(
		'name' => esc_html__( 'Google Plus URL', 'philos' ),
		'desc' => esc_html__( 'Define your google plus link.', 'philos' ),
		'id'   => 'google_plus_link',
		'std'  => $google_plus_default,
		'type' => 'text'
	);

	//Instagram URL
	$options[] = array(
		'name' => esc_html__( 'Instagram URL', 'philos' ),
		'desc' => esc_html__( 'Define your instagram link.', 'philos' ),
		'id'   => 'instagram_link',
		'std'  => $instagram_default,
		'type' => 'text'
	);

	//Social Settings
	$options[] = array(
		'name' => esc_html__( 'Popup Setting', 'philos' ),
		'type' => 'info'
	);

	//Show/Hide Search Button
	$options[] = array(
		'name' 		=> esc_html__( 'Display Popup', 'philos' ),
		'desc' 		=> esc_html__( 'Show/hide popup.', 'philos' ),
		'id'   		=> 'popup_btn',
		'type'   	=> 'select',
		'std'  		=> $popupoption_default,
		'options' 	=> $options_footer_show_hide
	);

	//Backgroud Color
	$options[] = array(
		'name' => esc_html__( 'Popup Background Color', 'philos' ),
		'desc' => esc_html__( 'Define popup color here.', 'philos' ),
		'id'   => 'popup_backgroud_color',
		'std'  => $popupcolor_default,
		'type' => 'color'
	);

	//Backgroud Image
	$options[] = array(
		'name' => esc_html__( 'Popup Background Image', 'philos' ),
		'desc' => esc_html__( 'Upload popup backgroud image.', 'philos' ),
		'id'   => 'popup_backgroud_image',
		'std'  => $popupbackgroud_default,
		'type' => 'upload'
	);

	//Backgroud Repeat
	$options[] = array(
		'name' 		=> esc_html__( 'Popup Background Repeat', 'philos' ),
		'desc' 		=> esc_html__( 'Define popup backgroud image repeat.', 'philos' ),
		'id'   		=> 'popup_backgroud_repeat',
		'type' 		=> 'select',
		'std'  		=> $popupbackgroud_repeat_default,
		'options' 	=> $options_backgroud_repeat
	);

	//Backgroud Position
	$options[] = array(
		'name' 		=> esc_html__( 'Popup Background Position', 'philos' ),
		'desc' 		=> esc_html__( 'Define popup backgroud image position.', 'philos' ),
		'id'   		=> 'popup_backgroud_position',
		'type' 		=> 'select',
		'std'  		=> $popupbackgroud_position_default,
		'options' 	=> $options_backgroud_position	
	);	

	$options[] = array(
		'name' => esc_html__( 'Popup Heading', 'philos' ),
		'desc' => esc_html__( 'Define your popup heading text.', 'philos' ),
		'id'   => 'popup_heading',
		'std'  => $popupheading_default,
		'type' => 'text'
	);

	//Instagram URL
	$options[] = array(
		'name' => esc_html__( 'Popup Top Text', 'philos' ),
		'desc' => esc_html__( 'Define your popup top text.', 'philos' ),
		'id'   => 'popup_top_text',
		'std'  => $popuptoptext_default,
		'type' => 'textarea'
	);

	//Instagram URL
	$options[] = array(
		'name' => esc_html__( 'Popup Form ID', 'philos' ),
		'desc' => esc_html__( 'Define your popup form id.', 'philos' ),
		'id'   => 'popup_form_id',
		'std'  => $popupformid_default,
		'type' => 'text'
	);

	//Instagram URL
	$options[] = array(
		'name' => esc_html__( 'Popup Bottom Text', 'philos' ),
		'desc' => esc_html__( 'Define your popup bottom text.', 'philos' ),
		'id'   => 'popup_bottom_text',
		'std'  => $popupbottomtext_default,
		'type' => 'textarea'
	);

	//Blog setting
	$options[] = array(
		'name' => esc_html__( 'Blog Settings', 'philos' ),
		'type' => 'heading'
	);

	$options[] = array(
		'name' 		=> esc_html__( 'Show/Hide Breadcrumb on Blog Single page', 'philos' ),
		'desc' 		=> esc_html__( 'Show/hide Breadcrumb on Blog Single page.', 'philos' ),
		'id'   		=> 'blog_single_breadcrumb',
		'type' 		=> 'select',
		'std'  		=> $options_singleblog_breadcrumb_default,
		'options' 	=> $options_singleblog_breadcrumb
	);

	$options[] = array(
		'name' 		=> esc_html__( 'Display Side on Blog Single page', 'philos' ),
		'desc' 		=> esc_html__( 'Define blog single page layout option.', 'philos' ),
		'id'   		=> 'blog_single_layout',
		'type' 		=> 'select',
		'std'  		=> $options_singleblog_sidebar_default,
		'options' 	=> $options_singleblog_sidebar	
	);	

	//woocommerce setting
	$options[] = array(
		'name' => esc_html__( 'WooCommerce Settings', 'philos' ),
		'type' => 'heading'
	);	

	//display sidebar product page
	$options[] = array(
		'name'  	=>  esc_html__( 'Display Sidebar on Product Page?', 'philos' ),
		'desc' 		=> esc_html__( 'Show or Hide Product Sidebar.', 'philos' ),
		'id'    	=> 'signle_page_sidebar',
		'type'  	=> 'select',
		'std'  		=> $productsidebar_default,
		'options' 	=> $options_sidebar
	);	

	return $options;
}