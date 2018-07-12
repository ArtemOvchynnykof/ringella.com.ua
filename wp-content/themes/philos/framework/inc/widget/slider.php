<?php 
// Reference:  http://codex.wordpress.org/Widgets_API	
class Slider_Widget extends WP_Widget {

	public function __construct() {
		$widget_options = array( 'classname' => '','description' => 'Slider Widget');
		parent::__construct( false,$name='NF - Slider Widget', $widget_options );
	}		

	function widget( $args, $instance ) {
		extract( $args );

		//Our variables from the widget settings.		
		$slider_count = empty($instance['slider_count']) ? '' : $instance['slider_count'];
		$show_info    = isset( $instance['show_info'] ) ? $instance['show_info'] : false;

		?>
		<!-- Intro -->
        <div id="intro" class="intro">
			<?php
			$args = array( 'post_type' => 'slider', 'post_status'=>'publish','posts_per_page' => esc_attr($slider_count));
					$loop = new WP_Query( $args );
					if ( $loop->have_posts() ) :
					?>
					<!-- Owl Slider -->
					<div id="owl-main-slider" class="owl-main-slider owl-carousel owl-theme">
							<?php						
								while ( $loop->have_posts() ) : $loop->the_post(); 
								global $product;
								$slide_height = get_post_meta( get_the_ID(), 'slide_height', TRUE );
								// Check if the custom field has a value.
								if ( ! empty( $slide_height ) ) {
									$slide_height = $slide_height;
								}else{
									$slide_height ='600';
								}
								?>
								<!--Item-->
								<div class="slide__item slide-bg-image <?php echo esc_attr(get_post_meta( get_the_ID(), 'slide_class', TRUE )); ?>" data-background-img="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" data-bg-position-x="<?php echo esc_attr(get_post_meta( get_the_ID(), 'slide_bg_position', TRUE )); ?>" data-height="<?php echo esc_attr($slide_height); ?>">								
									<div class="container">
										<div class="slide-caption <?php echo esc_attr(get_post_meta( get_the_ID(), 'slide_caption_class', TRUE )); ?>">
											<?php the_content(); ?>
										</div>
									</div>
								</div>									   
								<?php endwhile; ?>
							<?php wp_reset_query(); ?>					
					 </div>
					 <!-- End Owl Slider -->
					 <?php else : ?>
						<p class="text-center mtb-0 font-italic white"><?php esc_html__( 'Sorry, no posts matched your criteria.','philos' ); ?></p>
					 <?php endif; ?>
		</div>
		<!-- End Intro -->	
	<?php	
	}

	//Update the widget 

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		//Strip tags from title and name to remove HTML 		

		$instance['slider_count'] = strip_tags( $new_instance['slider_count'] );	
		$instance['show_info'] = $new_instance['show_info'];
		return $instance;
	}


	function form( $instance ) {
		//Set up some default widget settings.
		$defaults = array('slider_count' => '3');
		$instance = wp_parse_args( (array) $instance, $defaults ); 
	?> 

		<p>
			<label for="<?php echo esc_attr($this->get_field_id('slider_count')); ?>"><?php echo esc_html__('Number of Slider Images Display', 'philos'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('slider_count')); ?>" name="<?php echo esc_attr($this->get_field_name('slider_count')); ?>" value="<?php echo esc_attr($instance['slider_count']); ?>" />
		</p>		
		<?php
	}
} 

add_action( 'widgets_init', function(){ register_widget( 'Slider_Widget' );});
//Slider Us Widgets
?>