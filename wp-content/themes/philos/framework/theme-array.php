<?php

/**
 * Nileforest Framework
 *
 * @package   Nileforest Framework
 * @author    http://nileforest.com/
 * 
 */
// ARRAYS - For Nileforest Framework

/**** Google Fonts Array ****/
$google_fonts_list = array( 
	'plesae-select' 		=> '--Plesae Select--', 
	'Montserrat' 			=> 'Montserrat',  
	'Cookie' 				=> 'Cookie',    
	'Droid Sans' 			=> 'Droid Sans',   
	'Lato' 					=> 'Lato',    
	'Lobster' 				=> 'Lobster',
	'Open Sans' 		  	=> 'Open Sans',	
	'Oswald' 				=> 'Oswald',  
	'PT Sans' 				=> 'PT Sans', 
	'Pacifico' 				=> 'Pacifico',
	'Poppins'				=> 'Poppins', 
	'Roboto' 				=> 'Roboto',
	'Roboto Condensed' 		=> 'Roboto Condensed',    
	'Ubuntu' 				=> 'Ubuntu',
	'Ubuntu Condensed' 		=> 'Ubuntu Condensed'   
);

// Typography Defaults
	$typography_defaults = array(
		'size' => '14px',
		'face' => 'Open Sans',
		'style' => 'normal',
		'color' => '#333333' 
	);

	// Typography Options
	$typography_options = array(
		'sizes' => array( '12','13','14','15','16','16','18','19','20'),
		'faces' => $google_fonts_list,
		'styles' => array( 'normal' => 'Normal','italic' => 'Italic'),				
		'color' => true
	);	

	// Single Product Sidebar Option
	$options_sidebar = array(
		'left-sidebar' => esc_html__( 'Left Sidebar', 'philos'),
		'right-sidebar' => esc_html__( 'Right Sidebar', 'philos'),				
		'no-sidebar'  => esc_html__( 'No Sidebar', 'philos')				
	);

	//Blog Single Sidebar Option
	$options_singleblog_sidebar = array(
		'left-sidebar' => esc_html__( 'Left Sidebar', 'philos'),
		'right-sidebar' => esc_html__( 'Right Sidebar', 'philos'),
		'no-sidebar'  => esc_html__( 'No Sidebar', 'philos')		
	);

	// Footer Bloack Show/Hide
	$options_singleblog_breadcrumb = array(
		'yes' => esc_html__( 'Yes', 'philos'),		
		'no'  => esc_html__( 'No', 'philos')
	);

	// Footer Bloack Show/Hide
	$options_footer_show_hide = array(
		'yes' => esc_html__( 'Yes', 'philos'),	
		'no'  => esc_html__( 'No', 'philos')
	);

	// Footer Bloack Show/Hide
	$options_site_description = array(
		'no'  => esc_html__( 'No', 'philos'),
		'yes' => esc_html__( 'Yes', 'philos')		
	);		
	
	//Body Background Repeat
	$options_backgroud_repeat = array(
		'no-repeat' => esc_html__( 'no-repeat', 'philos'),
		'repeat'  => esc_html__( 'repeat', 'philos'),
		'repeat-x' => esc_html__( 'repeat-x', 'philos'),
		'repeat-y'  => esc_html__( 'repeat-y', 'philos')
	);

	//Body Background Position
	$options_backgroud_position = array(
		'center top' => esc_html__( 'center top', 'philos'),				
		'center center'  => esc_html__( 'center center', 'philos'),
		'center bottom' => esc_html__( 'center bottom', 'philos'),
		'center left'  => esc_html__( 'center left', 'philos'),
		'bottom center' => esc_html__( 'bottom center', 'philos'),				
		'bottom top'  => esc_html__( 'bottom top', 'philos'),
		'bottom left' => esc_html__( 'bottom left', 'philos'),				
		'bottom right'  => esc_html__( 'bottom right', 'philos'),
		'top right'  => esc_html__( 'top right', 'philos'),
		'top bottom'  => esc_html__( 'top bottom', 'philos'),
		'top left'  => esc_html__( 'top left', 'philos'),
	);

	//Body Background Repeat
	$options_layout = array(
		'fullwidth' => esc_html__( 'Full Width', 'philos'),			
		'boxed'  	=> esc_html__( 'Boxed', 'philos')
	);

	//Header Style
	$header_style = array(	
		'fixed' 	=> esc_html__( 'Fixed', 'philos'),				
		'normal'  	=> esc_html__( 'Normal', 'philos')
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}

	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages( 'sort_column=post_parent,menu_order' );
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	//default option
	// If using image radio buttons, define a directory path
	
	$imagepath =  THEME_FRAMEWORK_DIR.'images/';
	//general setting
	$layout_default = 'fullwidth'; 					//set default value of layout
	//header setting
	$phone_label = ''; 				//set default value of phone label
	$phone_number = ''; 				//set default value of phone number
	$logo_default = $imagepath."logo_black.png"; 	//set default value of logo image
	$logoalt_default = "Philos"; 					//set default value of logo alt tag	
	$buynowbtn_option = "no"; 						//set default value of buy now button show/hide option
	$buynowbtn_label = "Buy Now"; 					//set default value of buy now button text
	$buynowbtn_link = "#"; 							//set default value of buy now button link
	$searchbtn_option = "yes"; 						//set default value of search button show/hide option
	$wishlistbtn_option = "yes"; 					//set default value of wishlist button show/hide option
	$addtocartbtn_option = "yes"; 					//set default value of addtcart button show/hide option

	//footer setting
	$footeraddress_default  = '1 Wintergreen Dr. Huntley <br/> IL 60142, Usa';  //set default value of address
	$footeremail_default = "info@themedemo.com"; 										//set default value of email address
	$footerphone_default = "0123-456-789"; 											//set default value of phone number
	$footerfax_default = "0123-456-789"; 										//set default value of fax number
	$footercopyright_default = 'NileForest';									//set default value of copyrights text 
	$footercopyright_default_link = 'http://www.nileforest.com/';				//set default value of copyrights link 
	$footercopyright_default_slogan = ' Philos Responsive Woocommerce Theme';	//set default value of copyrights slogan 
	$footerpayment_default = $imagepath."payment_logos.png"; 					//set default value of payment image
	$footeroption_default = "yes"; 												//set default value of footer show/hide option
	$footerpaymentoption_default = "yes"; 										//set default value of footer payment images show/hide option

	//social setting
	$facebook_default = "#"; 													//set default value of facebook link
	$twitter_default = "#"; 													//set default value of twitter link
	$pinterest_default = "#"; 													//set default value of pinterest link
	$google_plus_default = "#"; 												//set default value of google plus link
	$instagram_default = "#"; 													//set default value of instagram link

	//popup setting
	$popupoption_default = "no"; 														//set default value of popup show/hide option
	$popupbackgroud_default = $imagepath."newsletter_popup_bg.png";  					//set default value of popup backgroud image
	$popupcolor_default = "#f8f8f8";  													//set default value of popup backgroud color
	$popupbackgroud_position_default = "top right";  									//set default value of popup backgroud position
	$popupbackgroud_repeat_default = "no-repeat";  										//set default value of popup backgroud repeat
	$popupheading_default = "Join Our Mailing List";  									//set default value of popup heading text	
	$popuptoptext_default = "But I must explain to you how all this mistaken <br/> idea of denouncing pleasure pain.";  		//set default value of popup top text
	$popupformid_default = "1";  														//set default value of popup form id
	$popupbottomtext_default = "Sign up For Exclusive Updates, New Arrivals <br/> And Insider-Only Discount.";  				//set default value of popup bottom text

	//woocommerce setting	
	$productsidebar_default  = "no-sidebar"; 					//set default value of product page sidebar show/hide option		
	$options_singleblog_sidebar_default = "right-sidebar";		//set default value of blog single page sidebar show/hide option
	$options_singleblog_breadcrumb_default = "yes"; 			//set default value of popup show/hide option

?>