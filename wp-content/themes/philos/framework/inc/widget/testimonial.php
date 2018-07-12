<?php 
// Reference:  http://codex.wordpress.org/Widgets_API	
class Testimonial_Widget extends WP_Widget {
	public function __construct() {
		$widget_options = array( 'classname' => '','description' => 'Testimonial Widget');
		parent::__construct( false,$name='NF - Testimonial Widget', $widget_options );
	}

	function widget( $args, $instance ) {
		extract( $args );

		//Our variables from the widget settings.
		$title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title']);
		$testimonial_count = empty($instance['testimonial_count']) ? '' : $instance['testimonial_count'];				
		?>
		<div class="customer-say">
			<div class="about-box-inner">
				<?php if ($title) :	?>
					<h4 class="mb-25"><?php echo esc_attr($title); ?></h4>
				<?php endif; ?>
				<?php
				$args = array( 'post_type' => 'testimonial', 'post_status'=>'publish','posts_per_page' => $testimonial_count);
						$loop = new WP_Query( $args );
						if ( $loop->have_posts() ) :
				?>
				<div class="testimonials-carousel owl-carousel owl-theme nf-carousel-theme1">
					<?php				

						while ( $loop->have_posts() ) : $loop->the_post(); 
						global $product;				
						?>
						<div class="product-item">
						  <div class="large quotes">
							<?php the_content(); ?>
						  </div>
						  <h6 class="quotes-people">
							<a href="<?php echo get_post_meta( get_the_ID(), 'author_url', TRUE ); ?>" target="_blank" title="<?php the_title(); ?>"><?php esc_html__('-&nbsp;', 'philos'); ?>					
							<?php the_title(); ?>
							</a>
						 </h6>
						</div>				   
					<?php endwhile; ?>
					<?php wp_reset_query(); ?>
				</div>		

				<?php else : ?>
				<p class="text-center mtb-0 font-italic"><?php esc_html__( 'Sorry, no posts matched your criteria.','philos' ); ?></p>
				<?php endif; ?>				  
			</div>	
		</div>	
	<?php	
	}

	//Update the widget 
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		//Strip tags from title and name to remove HTML 
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['testimonial_count'] = strip_tags( $new_instance['testimonial_count'] );			
		return $instance;
	}
	function form( $instance ) {
		//Set up some default widget settings.
		$defaults = array( 'title' => 'Customer Say','testimonial_count' => '3');
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>              

	    <p>
			<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php echo esc_html__('Title', 'philos'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('testimonial_count')); ?>"><?php echo esc_html__('Number of Testimonial Display', 'philos'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('testimonial_count')); ?>" name="<?php echo esc_attr($this->get_field_name('testimonial_count')); ?>" value="<?php echo esc_attr($instance['testimonial_count']); ?>" />
		</p>
		<?php
	}
} 

add_action( 'widgets_init', function(){ register_widget( 'Testimonial_Widget' );});
//Testimonial Widgets
?>