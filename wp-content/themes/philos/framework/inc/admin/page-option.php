<?php

/**
 * Nileforest Framework
 *
 * @package   Nileforest Framework
 * @author    Nileforest <http://nileforest.com>
 * 
 */

if( ! function_exists( 'add_page_custom_meta_box' ) ):
	function add_page_custom_meta_box()
	{
		add_meta_box("page-custom-meta-box", "Page Custom Options", "page_custom_meta_box_markup", "page", "normal", "high", null);
	}
	add_action("add_meta_boxes", "add_page_custom_meta_box");
endif;

if( ! function_exists( 'page_custom_meta_box_markup' ) ):
	function page_custom_meta_box_markup($object)
	{
		wp_nonce_field(basename(__FILE__), "meta-box-nonce");	

		?>
			<div class="page_custom_options">
				<label for="meta-box-page-title"><?php esc_html__( 'Show Page Title', 'philos' ); ?></label>
				<select name="meta-box-page-title">
					<?php 
						$page_title_values = array("show"=>"Show Page Title", "hide"=>"Hide Page Title");	

						foreach($page_title_values as $key => $value) {
							if($key == get_post_meta($object->ID, "meta-box-page-title", true)){
								?>									
								<option selected value="<?php echo esc_attr($key); ?>"><?php echo esc_attr($value); ?></option>
								<?php 
							}
							else{
								?>									
								<option value="<?php echo esc_attr($key); ?>"><?php echo esc_attr($value); ?></option>
								<?php
							}
						}
					?>
				</select>
				<br><br>
				<label for="meta-box-breadcrumb"><?php esc_html__( 'Show Breadcrumb', 'philos' ); ?></label>
				<select name="meta-box-breadcrumb">
					<?php 
						$breadcrumb_values = array("show"=>"Show Breadcrumb","hide"=>"Hide Breadcrumb");
						foreach($breadcrumb_values as $key => $value) {
							if($key == get_post_meta($object->ID, "meta-box-breadcrumb", true)){
								?>
									<option value="<?php echo esc_attr($key); ?>" selected><?php echo esc_attr($value); ?></option>
								<?php  
							}
							else{
								?>
									<option value="<?php echo esc_attr($key); ?>"><?php echo esc_attr($value); ?></option>
								<?php
							}
						}
					?>
				</select>          
				<br><br>
				<label for="meta-box-theme-sidebar"><?php esc_html__( 'Page Sidebar', 'philos' ); ?></label>
				<select name="meta-box-theme-sidebar">
					<?php
						$sidebar_values = array("no-sidebar"=>"No Sidebar", "left-sidebar"=>"Left Sidebar", "right-sidebar"=>"Right Sidebar", "fullwidth"=>"Full Width");
						foreach($sidebar_values as $key => $value) {
							if($key == get_post_meta($object->ID, "meta-box-theme-sidebar", true)){
								?>
									<option value="<?php echo esc_attr($key); ?>" selected><?php echo esc_attr($value); ?></option>
								<?php    
							}
							else{
								?>
									<option value="<?php echo esc_attr($key); ?>"><?php echo esc_attr($value); ?></option>
								<?php
							}
						}
					?>
				</select>
			</div>
		<?php  
	}
endif;

if( ! function_exists( 'save_page_custom_meta_box' ) ):
	function save_page_custom_meta_box($post_id, $post, $update)
	{
		if (!isset($_POST["meta-box-nonce"]) || !wp_verify_nonce($_POST["meta-box-nonce"], basename(__FILE__))){
			return $post_id;
		}

		if(!current_user_can("edit_post", $post_id)){
			return $post_id;
		}	

		if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE){
			return $post_id;
		}	

		$slug = "page";
		if($slug != $post->post_type){
			return $post_id;
		}
		

		$meta_box_page_title_value = "";
		$meta_box_breadcrumb_value = "";
		$meta_box_sidebar_value = "";
		

	   //page title

		if(isset($_POST["meta-box-page-title"])){
			$meta_box_page_title_value = $_POST["meta-box-page-title"];
		}   
		update_post_meta($post_id, "meta-box-page-title", $meta_box_page_title_value);		

		//page breadcrumb
		if(isset($_POST["meta-box-breadcrumb"])){
			$meta_box_breadcrumb_value = $_POST["meta-box-breadcrumb"];
		} 
		update_post_meta($post_id, "meta-box-breadcrumb", $meta_box_breadcrumb_value);	   

	   //page sidebar
		if(isset($_POST["meta-box-theme-sidebar"])){
			$meta_box_sidebar_value = $_POST["meta-box-theme-sidebar"];
		}   
		update_post_meta($post_id, "meta-box-theme-sidebar", $meta_box_sidebar_value);

	}
	add_action("save_post", "save_page_custom_meta_box", 10, 3);
endif;
?>