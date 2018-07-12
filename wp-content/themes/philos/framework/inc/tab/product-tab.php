<?php

//This function initializes the meta box.
	 function custom_editor_meta_box() {
			   add_meta_box ( 
				  'custom_tab_editor',
				  esc_html__('Product Custom Tab Data', 'philos') , 
				  'custom_editor', 
				  'product'
			   ); 
	 }
	 //Displaying the meta box
	 function custom_editor($post) {                 
			  $content = get_post_meta($post->ID, 'customeditor', true);
			  //This function adds the WYSIWYG Editor 
			  wp_editor ( 
			   $content , 
			   'customeditor',
			   array ( "media_buttons" => true ) 
			  );
	 }

 //This function saves the data you put in the meta box
 function custom_editor_save_postdata($post_id) {       

    if( isset( $_POST['custom_editor_nonce'] ) && isset( $_POST['product'] ) ) {

        //Not save if the user hasn't submitted changes
        if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
        } 

        // Verifying whether input is coming from the proper form
        if ( ! wp_verify_nonce ( $_POST['custom_editor_nonce'] ) ) {
        return;
        } 

        // Making sure the user has permission
        if( 'post' == $_POST['product'] ) {
               if( ! current_user_can( 'edit_post', $post_id ) ) {
                    return;
               }
        } 
    } 

    if (!empty($_POST['customeditor'])) {  
        $data = $_POST['customeditor'];
        update_post_meta($post_id, 'customeditor', $data);
    }
 }

add_action('save_post', 'custom_editor_save_postdata');
add_action('admin_init', 'custom_editor_meta_box');

//custom tab
	global $tabs;
	add_filter( 'woocommerce_product_tabs', 'custom_product_tab' );	
	if(!function_exists('custom_product_tab')):
	function custom_product_tab( $tabs ) {

		/* Adds the new tab */
		$tabs['custom_tab'] = array(
			'title' 	=> esc_html__( 'Product Tab', 'philos' ),
			'priority' 	=> 50,  
			'callback' 	=> 'custom_product_tab_content'
		);
		return $tabs;  /* Return all  tabs including the new New Custom Product Tab  to display */	
	}
	endif;
	

	if(!function_exists('custom_product_tab_content')):
	function custom_product_tab_content() {
		/* The new tab content */	
		 global $post;		
		if(get_post_meta( $post->ID, 'customeditor', true )){	
			echo get_post_meta( $post->ID, 'customeditor', true );
		}
		else{	
			echo "<style>.custom_tab_tab  { display:none !important; }</style>";		
		}
	}
endif;
?>