<?php
/** 
 * Plugin Name:       Nileforest Custom Post
 * Plugin URI:        http://nileforest.com
 * Description:       Nileforest Custom Taxonomy(Brand, Testimonial, Portfolio, Team, Slider) for Wordpress themes.
 * Version:           1.0.0
 * Author:            Nileforest
 * Author URI:        http://nileforest.com
 * Text Domain:       nileforest-custom-post
 * Reference:  		  https://codex.wordpress.org/Shortcode_API
 */
 
 //theme brand logo 
 function theme_logo_custom_post() {
 	$labels = array(
		'name'                           => _x('Brands','brands','philos'),
		'singular_name'                  => _x('Brand','brand','philos'),
		'add_new' 						 => _x('Add New', 'brand item','philos'),
		'add_new_item'                   => __('Add New Brand','philos'),
		'search_items'                   => __('Search Brands','philos'),
		'all_items'                      => __('All Brands','philos'),
		'edit_item'                      => __('Edit Brand','philos'),
		'update_item'                    => __('Update Brand','philos'),		
		'new_item_name'                  => __('New Brand Name','philos'),
		'menu_name'                      => __('Brand','philos'),
		'view_item'                      => __('View Brand','philos'),
		'popular_items'                  => __('Popular Brand','philos'),
		'separate_items_with_commas'     => __('Separate brands with commas','philos'),
		'add_or_remove_items'            => __('Add or remove brands','philos'),
		'choose_from_most_used'          => __('Choose from the most used brands','philos'),
		'not_found'                      => __('No brands found','philos')
	);
	
	 $args = array(
		'labels' 				=> $labels,
		'public' 			 	=> true,
		'publicly_queryable' 	=> true,
		'show_ui' 				=> true,		
		'query_var' 			=> true,
		'rewrite' 				=> array('slug'=>'brand','with_front'=>''),
		'capability_type' 		=> 'post',
		'menu_position' 		=> null,
		'menu_icon' 			=> 'dashicons-lightbulb',
		'supports' 				=> array('title','editor','author','thumbnail')
	  );
	  
	  register_post_type('brand',$args);
	  
	  function brand_meta_init()
	  {		
		add_meta_box('brand_meta', 'Logo Link', 'brand_meta_setup', 'brand', 'side', 'low');	 		
		add_action('save_post','brand_meta_save');
	  }
	  add_action('admin_init','brand_meta_init');
	  
	  function brand_meta_setup()
	 {
		global $post;	 	 
		?>
			<div class="brand_meta_control">
				<label><?php echo esc_html_e('URL', 'philos') ?></label>
				<p>
					<input class="widefat" type="text" name="logo_url" id="logo_url"  value="<?php echo get_post_meta($post->ID,'logo_url',TRUE); ?>" />
				</p>
			</div>
		<?php
		// create for validation
		echo '<input type="hidden" name="meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';
	 }
	 function brand_meta_save($post_id) 
	{
		// check nonce
		if (!isset($_POST['meta_noncename']) || !wp_verify_nonce($_POST['meta_noncename'], __FILE__)) {
		return $post_id;
		}

		// check capabilities
		if ('post' == $_POST['post_type']) {
		if (!current_user_can('edit_post', $post_id)) {
		return $post_id;
		}
		} elseif (!current_user_can('edit_page', $post_id)) {
		return $post_id;
		}

		// exit on autosave
		if (defined('DOING_AUTOSAVE') == DOING_AUTOSAVE) {
		return $post_id;
		}

		if(isset($_POST['logo_url'])) 
		{
			update_post_meta($post_id, 'logo_url', $_POST['logo_url']);
		} else 
		{
			delete_post_meta($post_id, 'logo_url');
		}
	}	
 }
 //hook function 
 add_filter('init','theme_logo_custom_post');
 
 //Theme Testimonial
 function theme_testimonial_custom_post(){
 	$labels = array(
		'name'                           => _x('Testimonials','testimonials','philos'),
		'singular_name'                  => _x('Testimonial','testimonial','philos'),
		'add_new' 						 => _x('Add New', 'testimonial item','philos'),
		'add_new_item'                   => __('Add New Testimonial','philos'),
		'search_items'                   => __('Search Testimonials','philos'),
		'all_items'                      => __('All Testimonials','philos'),
		'edit_item'                      => __('Edit Testimonial','philos'),
		'update_item'                    => __('Update Testimonial','philos'),		
		'new_item_name'                  => __('New Testimonial Name','philos'),
		'menu_name'                      => __('Testimonial','philos'),
		'view_item'                      => __('View Testimonial','philos'),
		'popular_items'                  => __('Popular Testimonial','philos'),
		'separate_items_with_commas'     => __('Separate testimonials with commas','philos'),
		'add_or_remove_items'            => __('Add or remove testimonials','philos'),
		'choose_from_most_used'          => __('Choose from the most used testimonials','philos'),
		'not_found'                      => __('No testimonials found','philos')
	);
	
	 $args = array(
		'labels' 				=> $labels,
		'public' 			 	=> true,
		'publicly_queryable' 	=> true,
		'show_ui' 				=> true,		
		'query_var' 			=> true,
		'rewrite' 				=> array('slug'=>'testimonial','with_front'=>''),
		'capability_type' 		=> 'post',
		'menu_position' 		=> null,
		'menu_icon' 			=> 'dashicons-testimonial',
		'supports' 				=> array('title','editor','author','thumbnail')
	  );
	   // The following is the main step where we register the post.
	  register_post_type('testimonial',$args);
	  
	  function testimonial_meta_init(){		
		add_meta_box('testimonial_meta', 'Author Link', 'testimonial_meta_setup', 'testimonial', 'side', 'low');
		add_action('save_post','testimonial_meta_save');
	}	  
	add_action('admin_init','testimonial_meta_init');
	
	function testimonial_meta_setup(){
		global $post;	 	 
		?>
			<p>
				<label><?php echo esc_html_e('Author Link', 'philos') ?></label>				
				<input class="widefat" type="text" name="author_url" id="author_url"  value="<?php echo esc_attr(get_post_meta($post->ID,'author_url',TRUE)); ?>"/>
			</p>			
		<?php
		// create for validation
		echo '<input type="hidden" name="meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';
	}
	
	function testimonial_meta_save($post_id){
		// check nonce
		if (!isset($_POST['meta_noncename']) || !wp_verify_nonce($_POST['meta_noncename'], __FILE__)) {
		return $post_id;
		}

		// check capabilities
		if ('post' == $_POST['post_type']) {
		if (!current_user_can('edit_post', $post_id)) {
		return $post_id;
		}
		} elseif (!current_user_can('edit_page', $post_id)) {
		return $post_id;
		}

		// exit on autosave
		if (defined('DOING_AUTOSAVE') == DOING_AUTOSAVE) {
		return $post_id;
		}

		if(isset($_POST['author_url'])) 
		{
			update_post_meta($post_id, 'author_url', $_POST['author_url']);
		} else 
		{
			delete_post_meta($post_id, 'author_url');
		}
	}	
 }
 //hook function 
 add_filter('init','theme_testimonial_custom_post');
 
 //Theme Team
 function theme_team_custom_post(){
 	$labels = array(
		'name'                           => _x('Teams','teams','philos'),
		'singular_name'                  => _x('Team','team','philos'),
		'add_new' 						 => _x('Add New', 'team member','philos'),
		'add_new_item'                   => __('Add New Team','philos'),
		'search_items'                   => __('Search Teams','philos'),
		'all_items'                      => __('All Teams','philos'),
		'edit_item'                      => __('Edit Team','philos'),
		'update_item'                    => __('Update Team','philos'),		
		'new_item_name'                  => __('New Team Name','philos'),
		'menu_name'                      => __('Team','philos'),
		'view_item'                      => __('View Team','philos'),
		'popular_items'                  => __('Popular Team','philos'),
		'separate_items_with_commas'     => __('Separate team with commas','philos'),
		'add_or_remove_items'            => __('Add or remove teams','philos'),
		'choose_from_most_used'          => __('Choose from the most used teams','philos'),
		'not_found'                      => __('No teams found','philos')
	);
	$args = array(
		'labels' 				=> $labels,
		'public' 			 	=> true,
		'publicly_queryable' 	=> true,
		'show_ui' 				=> true,		
		'query_var' 			=> true,
		'rewrite' 				=> array('slug'=>'team','with_front'=>''),
		'capability_type' 		=> 'post',
		'menu_position' 		=> null,
		'menu_icon' 			=> 'dashicons-groups',
		'supports' 				=> array('title','editor','author','thumbnail')
	  );
	  // The following is the main step where we register the post.
	  register_post_type('team',$args);	
	
	function team_meta_init()
	{		
		add_meta_box('team_meta', 'User Detail', 'team_meta_setup', 'team', 'side', 'low');		
		add_action('save_post','team_meta_save');
	}
	add_action('admin_init','team_meta_init');
	
	function team_meta_setup()
	{
		global $post;
	 	 
		?>
		<p>
			<label><?php echo esc_html_e('User Designation', 'philos') ?></label>
			<input class="widefat" type="text" name="user_designation" id="user_designation" value="<?php echo esc_attr(get_post_meta($post->ID,'user_designation',TRUE)); ?>" />			       </p>
		<p>
			<label><?php echo esc_html_e('User Facebook URL', 'philos') ?></label>
			<input class="widefat" type="text" name="user_facebook_link" id="user_facebook_link"  value="<?php echo esc_attr(get_post_meta($post->ID,'user_facebook_link',TRUE)); ?>" />
			<label>(e.g. https://www.facebook.com/...)</label>
		</p>
		<p>
			<label><?php echo esc_html_e('User Twitter URL', 'philos') ?></label>
			<input class="widefat" type="text" name="user_twitter_link" id="user_twitter_link"  value="<?php echo esc_attr(get_post_meta($post->ID,'user_twitter_link',TRUE)); ?>"/>
			<label>(e.g. https://twitter.com/...)</label>
		</p>
		<p>
			<label><?php echo esc_html_e('User Google Plus URL', 'philos') ?></label>
			<input class="widefat" type="text" name="user_google_link" id="user_google_link"  value="<?php echo esc_attr(get_post_meta($post->ID,'user_google_link',TRUE)); ?>"/>
			<label>(e.g. https://plus.google.com/...)</label>
		</p>
		<p>
			<label><?php echo esc_html_e('User LinkedIn URL', 'philos') ?></label>
			<input class="widefat" type="text" name="user_linkedin_link" id="user_linkedin_link"  value="<?php echo esc_attr(get_post_meta($post->ID,'user_linkedin_link',TRUE)); ?>" />
			<label>(e.g. https://linkedin.com/...)</label>
		</p>			
		<?php

		// create for validation
		echo '<input type="hidden" name="meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';
	}
	function team_meta_save($post_id) 
	{
		// check nonce
		if (!isset($_POST['meta_noncename']) || !wp_verify_nonce($_POST['meta_noncename'], __FILE__)) {
		return $post_id;
		}

		// check capabilities
		if ('post' == $_POST['post_type']) {
		if (!current_user_can('edit_post', $post_id)) {
		return $post_id;
		}
		} elseif (!current_user_can('edit_page', $post_id)) {
		return $post_id;
		}

		// exit on autosave
		if (defined('DOING_AUTOSAVE') == DOING_AUTOSAVE) {
		return $post_id;
		}

		if(isset($_POST['user_designation'])) 
		{
			update_post_meta($post_id, 'user_designation', $_POST['user_designation']);
		} else 
		{
			delete_post_meta($post_id, 'user_designation');
		}
		//facebook link
		if(isset($_POST['user_facebook_link'])) 
		{
			update_post_meta($post_id, 'user_facebook_link', $_POST['user_facebook_link']);
		} else 
		{
			delete_post_meta($post_id, 'user_facebook_link');
		}
		//twitter link
		if(isset($_POST['user_twitter_link'])) 
		{
			update_post_meta($post_id, 'user_twitter_link', $_POST['user_twitter_link']);
		} else 
		{
			delete_post_meta($post_id, 'user_twitter_link');
		}
		//google link
		if(isset($_POST['user_google_link'])) 
		{
			update_post_meta($post_id, 'user_google_link', $_POST['user_google_link']);
		} else 
		{
			delete_post_meta($post_id, 'user_google_link');
		}
		//linkedin link
		if(isset($_POST['user_linkedin_link'])) 
		{
			update_post_meta($post_id, 'user_linkedin_link', $_POST['user_linkedin_link']);
		} else 
		{
			delete_post_meta($post_id, 'user_linkedin_link');
		}
	}	
 }
 //hook function 
 add_filter('init','theme_team_custom_post');
 
 //Theme Portfolio
 function theme_portfolio_custom_post(){
 	$labels = array(
		'name' 				 => _x('Portfolio', 'portfolio','philos'),
		'singular_name' 	 => _x('Portfolio', 'portfolio','philos'),
		'add_new' 			 => _x('Add New', 'portfolio','philos'),
		'add_new_item' 		 => __('Add New Portfolio','philos'),
		'edit_item' 		 => __('Edit Portfolio','philos'),
		'new_item' 			 => __('New Portfolio','philos'),
		'view_item' 		 => __('View Portfolio','philos'),
		'search_items' 	 	 => __('Search Portfolios','philos'),
		'not_found' 		 =>  __('No portfolios found','philos'),
		'not_found_in_trash' => __('No portfolios found in Trash','philos'),
		'parent_item_colon'  => ''		
	  );
	  $args = array(
		'labels' 			 => $labels,
		'public' 			 	=> true,
		'publicly_queryable' 	=> true,
		'show_ui' 				=> true,		
		'query_var' 			=> true,
		'rewrite' 				=> array('slug'=>'portfolio','with_front'=>''),
		'capability_type' 		=> 'post',
		'menu_position' 		=> null,
		'menu_icon' 		 => 'dashicons-format-gallery',		
		'supports' 			 => array('title','editor','author','thumbnail','comments')		
	  );
	  
	  // The following is the main step where we register the post.
	  register_post_type('portfolio',$args);
	  
	  // Initialize New Taxonomy Labels
	  $labels = array(
		'name' 				=> _x( 'Categories', 'category','philos' ),
		'singular_name'		=> _x( 'Category', 'category','philos' ),
		'search_items' 		=>  __( 'Search Category','philos' ),
		'all_items'		    => __( 'All Category','philos' ),
		'parent_item' 		=> __( 'Parent Category','philos' ),
		'parent_item_colon' => __( 'Parent Category:','philos' ),
		'edit_item' 		=> __( 'Edit Category','philos' ),
		'update_item' 		=> __( 'Update Category','philos' ),
		'add_new_item' 		=> __( 'Add New Category','philos' ),
		'new_item_name' 	=> __( 'New Category Name','philos' ),
	  );
		// Custom taxonomy for Project Tags
		register_taxonomy('categoryportifolio',array('portfolio'), array(
		'hierarchical' 	=> true,
		'labels' 		=> $labels,
		'show_ui' 		=> true,
		'query_var' 	=> true,
		'_builtin' 		=> false,
	  	'paged'			=> true,
		'rewrite' 		=> false,
	  ));
	  
	 
	function portfolio_meta_init()
	{		
		add_meta_box('portfolio_meta', 'Project Detail', 'portfolio_meta_setup', 'portfolio', 'side', 'low');
		add_action('save_post','portfolio_meta_save');
	}
	add_action('admin_init','portfolio_meta_init');
	
	function portfolio_meta_setup()
	{
		global $post;
	 	 
		?>
		<p>
			<label><?php echo esc_html_e('Author', 'philos') ?></label>
			<input class="widefat" type="text" name="portfolio_author" value="<?php echo esc_attr(get_post_meta($post->ID,'portfolio_author',TRUE)); ?>" />
			<label>(e.g. Nileforest...)</label>
		</p>
		<p>
			<label><?php echo esc_html_e('Project Name', 'philos') ?></label>
			<input class="widefat" type="text" name="portfolio_name" value="<?php echo esc_attr(get_post_meta($post->ID,'portfolio_name',TRUE)); ?>" />
			<label>(e.g. Nileforest...)</label>
		</p>
		<p>
			<label><?php echo esc_html_e('Project Link', 'philos') ?></label>
			<input class="widefat" type="text" name="portfolio_url" value="<?php echo esc_attr(get_post_meta($post->ID,'portfolio_url',TRUE)); ?>"  />
			<label>(e.g. http://www.nileforest.com/...)</label>
		</p>			          
		<?php

		// create for validation
		echo '<input type="hidden" name="meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';
	}
	
	function portfolio_meta_save($post_id) 
	{
		// check nonce
		if (!isset($_POST['meta_noncename']) || !wp_verify_nonce($_POST['meta_noncename'], __FILE__)) {
		return $post_id;
		}

		// check capabilities
		if ('post' == $_POST['post_type']) {
		if (!current_user_can('edit_post', $post_id)) {
		return $post_id;
		}
		} elseif (!current_user_can('edit_page', $post_id)) {
		return $post_id;
		}

		// exit on autosave
		if (defined('DOING_AUTOSAVE') == DOING_AUTOSAVE) {
		return $post_id;
		}
		//Author
		if(isset($_POST['portfolio_author'])) 
		{
			update_post_meta($post_id, 'portfolio_author', $_POST['portfolio_author']);
		} else 
		{
			delete_post_meta($post_id, 'portfolio_author');			
		}
		//project name
		if(isset($_POST['portfolio_name'])) 
		{
			update_post_meta($post_id, 'portfolio_name', $_POST['portfolio_name']);
		} else 
		{
			delete_post_meta($post_id, 'portfolio_name');			
		}
		//project link
		if(isset($_POST['portfolio_url'])) 
		{
			update_post_meta($post_id, 'portfolio_url', $_POST['portfolio_url']);
		} else 
		{
			delete_post_meta($post_id, 'portfolio_url');			
		}		
		
	} 
 }
 //hook function 
 add_filter('init','theme_portfolio_custom_post');
 
 //Theme Slider
 function theme_slider_custom_post(){
 	$labels = array(
		'name'                           => _x('Sliders', 'portfolio','philos'),
		'singular_name'                  => _x('Slider', 'portfolio','philos'),
		'add_new' 						 => _x('Add New', 'portfolio item','philos'),
		'add_new_item'                   =>  __( 'Add New Slide','philos'),
		'search_items'                   =>  __( 'Search Slides','philos'),
		'all_items'                      =>  __( 'All Slides','philos'),
		'edit_item'                      =>  __( 'Edit Slide','philos'),
		'update_item'                    =>  __( 'Update Slide','philos'),		
		'new_item_name'                  =>  __( 'New Slide Name','philos'),
		'menu_name'                      =>  __( 'Slider','philos'),
		'view_item'                      =>  __( 'View Slide','philos'),
		'popular_items'                  =>  __( 'Popular Slide','philos'),
		'separate_items_with_commas'     =>  __( 'Separate slides with commas','philos'),
		'add_or_remove_items'            =>  __( 'Add or remove slides','philos'),
		'choose_from_most_used'          =>  __( 'Choose from the most used slides','philos'),
		'not_found'                      =>  __( 'No slides found','philos')
	);
	$args = array(
		'labels' 			 	=> $labels,
		'public' 			 	=> false,
		'publicly_queryable' 	=> true,
		'show_ui' 				=> true,		
		'query_var' 			=> true,
		'rewrite' 				=> true,
		'capability_type' 		=> 'post',
		'menu_position' 		=> null,
		'menu_icon' 		 	=> 'dashicons-images-alt',	
		'supports' 				=> array('title','editor','thumbnail')
	  );
	   // The following is the main step where we register the post.
	  register_post_type('slider',$args);
	
	function slider_meta_init()
	{			
		add_meta_box('slider_meta', 'Add Slide Options', 'slider_meta_setup', 'slider', 'side', 'low');				 
		add_action('save_post','slider_meta_save');
	}
	  add_action('admin_init','slider_meta_init');
	  function slider_meta_setup()
	{
		global $post;		
		?>
		<p>
			<label><?php echo esc_html_e('Add Class', 'philos') ?></label>
			<input class="widefat" type="text" name="slide_class" id="slide_class" value="<?php echo esc_attr(get_post_meta($post->ID,'slide_class',TRUE)); ?>"/>
		</p>			
		<p>
			<label><?php echo esc_html_e('Add Height', 'philos') ?></label>
			<input class="widefat" type="text" name="slide_height" id="slide_height" value="<?php echo esc_attr(get_post_meta($post->ID,'slide_height',TRUE)); ?>" />
		</p>
			
		<p>
			<label><?php echo esc_html_e('Add Background Position', 'philos') ?></label>
			<input class="widefat" type="text" name="slide_bg_position" id="slide_bg_position" value="<?php echo esc_attr(get_post_meta($post->ID,'slide_bg_position',TRUE)); ?>"  />
		</p>
		<p>
			<label><?php echo esc_html_e('Add Caption Class', 'philos') ?></label>
			<input class="widefat" type="text" name="slide_caption_class" id="slide_caption_class" value="<?php echo esc_attr(get_post_meta($post->ID,'slide_caption_class',TRUE)); ?>" />
		</p>
			
		<?php	 	 
		
		// create for validation
		echo '<input type="hidden" name="meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';
	}
	
	function slider_meta_save($post_id) 
	{
		// check nonce
		if (!isset($_POST['meta_noncename']) || !wp_verify_nonce($_POST['meta_noncename'], __FILE__)) {
		return $post_id;
		}

		// check capabilities
		if ('post' == $_POST['post_type']) {
		if (!current_user_can('edit_post', $post_id)) {
		return $post_id;
		}
		} elseif (!current_user_can('edit_page', $post_id)) {
		return $post_id;
		}

		// exit on autosave
		if (defined('DOING_AUTOSAVE') == DOING_AUTOSAVE) {
		return $post_id;
		}
		if(isset($_POST['slide_class'])) 
		{
			update_post_meta($post_id, 'slide_class', $_POST['slide_class']);
		} else 
		{
			delete_post_meta($post_id, 'slide_class');
		}
		//height
		if(isset($_POST['slide_height'])) 
		{
			update_post_meta($post_id, 'slide_height', $_POST['slide_height']);
		} else 
		{
			delete_post_meta($post_id, 'slide_height');
		}
		//Position
		if(isset($_POST['slide_bg_position'])) 
		{
			update_post_meta($post_id, 'slide_bg_position', $_POST['slide_bg_position']);
		} else 
		{
			delete_post_meta($post_id, 'slide_bg_position');
		}
		//Caption Position
		if(isset($_POST['slide_caption_class'])) 
		{
			update_post_meta($post_id, 'slide_caption_class', $_POST['slide_caption_class']);
		} else 
		{
			delete_post_meta($post_id, 'slide_caption_class');
		}
	}
 }
  //hook function 
 add_filter('init','theme_slider_custom_post');
?>