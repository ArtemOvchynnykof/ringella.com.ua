<?php 
// Reference:  http://codex.wordpress.org/Widgets_API	
class Category_Widget extends WP_Widget {
	public function __construct() {
		$widget_options = array( 'classname' => '','description' => 'Category Widget');
		parent::__construct( false,$name='NF - Category Widget', $widget_options );
	}	

	function widget( $args, $instance ) {
		extract( $args );
		//Our variables from the widget settings.
		$title 		= 	apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title']);
		$count 		= 	empty($instance['category_count']) ? '' : $instance['category_count'];
		$column 	=   $instance['category_count'] == "4" ? "3" : "4";

		?>
		<section>
			<div class="section-padding container-fluid bg-image text-center overlay-light90" data-background-img="<?php echo get_template_directory_uri().'/framework/images/bg/bg_5.jpg'; ?>" data-bg-position-x="center center">
				<div class="container">
					<?php 
					// Display the widget title 
					if ( $title ):?>
						<h2 class="page-title"><?php echo esc_attr($title); ?></h2>
					<?php endif; ?>
				</div>
			</div>
			<div class="container container-margin-minus-t">
				<?php
					$taxonomy     = 'product_cat';
					$orderby      = 'name'; 
					$show_count   = 1;      // 1 for yes, 0 for no
					$pad_counts   = 0;      // 1 for yes, 0 for no
					$hierarchical = 1;      // 1 for yes, 0 for no
					$title        = '';  
					$empty        = 0;
					$number       = $count;
					$coulmn_count = $column;					

					$args = array(
						 'taxonomy'     => $taxonomy,
						 'orderby'      => $orderby,
						 'show_count'   => $show_count,
						 'pad_counts'   => $pad_counts,
						 'hierarchical' => $hierarchical,
						 'title_li'     => $title,
						 'hide_empty'   => $empty,
						 'number'       => $number,
						 'parent' 		=> 0,
						 'hide_empty' 	=> 0
					);

					$all_categories = get_categories( $args );
					?>
					<div class="row">
					<?php
					 foreach ($all_categories as $cat) {
						if($cat->category_parent == 0) :
							$category_id = $cat->term_id;							

							 $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true ); 
							 $link = get_category_link($cat->term_id);

							 // get the image URL
							$image = wp_get_attachment_url( $thumbnail_id ); 
							if(empty($image)):			
								$image=get_template_directory_uri().'/framework/images/placeholder/600x400.png';
							endif;

							?>
							<div class="col-md-<?php echo esc_attr($coulmn_count);?> mb-sm-30">
								<div class="categories-box">			
									<div class="categories-image-wrap">
										<a href="<?php echo esc_url($link); ?>"><img src="<?php echo esc_url($image);?>" alt="<?php echo esc_attr($cat->name);?>" /></a>
									</div>
									<div class="categories-content">
										<a href="<?php echo esc_url(get_term_link($cat->slug, 'product_cat'));?>">
											<div class="categories-caption">
												<h6 class="normal"><?php echo esc_attr($cat->name); ?></h6>
											</div>
										</a>
									</div>
								</div>
							</div>
							<?php else : ?>	
							<p  class="text-center mtb-0 font-italic"><?php esc_html__( 'Sorry, no posts matched your criteria.', 'philos' ); ?></p>
						<?php endif;   
					}
				?>
				</div>
			</div> 
		</section>
	<?php	
	}
	//Update the widget 
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		//Strip tags from title and name to remove HTML 
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['category_count'] = strip_tags( $new_instance['category_count'] );	
		return $instance;
	}

	function form( $instance ) {

		//Set up some default widget settings.
		$defaults = array( 'title' => 'Shop By Categories','category_count' => '3');
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
         
	     <p>
			<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php echo esc_html__('Title:', 'philos'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('category_count')); ?>"><?php echo esc_html__('Show Category counts:', 'philos'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('category_count')); ?>" name="<?php echo esc_attr($this->get_field_name('category_count')); ?>" value="<?php echo esc_attr($instance['category_count']); ?>" />
		</p>
		<?php
	}
} 

add_action( 'widgets_init', function(){ register_widget( 'Category_Widget' );});
//Category Widgets
?>