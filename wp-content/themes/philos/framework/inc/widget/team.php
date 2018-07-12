<?php  
// Reference:  http://codex.wordpress.org/Widgets_API	
class Team_Widget extends WP_Widget {
	public function __construct() {
		$widget_options = array( 'classname' => '','description' => 'Team Widget');
		parent::__construct( false,$name='NF - Team Widget', $widget_options );
	}	

	function widget( $args, $instance ) {
		extract( $args );
		//Our variables from the widget settings.
		$team_title = apply_filters('widget_title', isset( $instance['team_title'] ) ? $instance['team_title'] : 'Meet the Team' );
		$team_count = isset( $instance['team_count'] ) ? $instance['team_count'] : 3;		

		if($team_count>=5) :
			$team_count= 4;
		endif;	

		?>
		<div class="section-padding">
		<div class="container text-center mb-45">
			 <div class="row">
				 <div class="col-md-12">
					<?php if ( $team_title ): ?>
						<h2 class="normal"><span><?php echo esc_attr($team_title); ?></span></h2>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="container text-center">
			<div class="row">
				<div class="col-md-12">
					<?php

						$args = array( 'post_type' => 'team', 'post_status'=>'publish','posts_per_page' => '999');
						$loop = new WP_Query( $args );
						if ( $loop->have_posts() ) :
					?>

					<div class="product-item-<?php echo esc_attr($team_count);?> owl-carousel owl-theme nf-carousel-theme1">
						<?php
							while ( $loop->have_posts() ) : $loop->the_post();
							global $product;				
							?>
							<div class="product-item">
								<div class="product-item-inner">
									<div class="product-img-wrap">
										<?php the_post_thumbnail(); ?>
									</div>
									<div class="team-social">
										<ul class="team-social-icon list-none-ib">
											<?php if(get_post_meta( get_the_ID(), 'user_facebook_link', TRUE ) != '') : ?>
											<li><a href="<?php echo esc_url(get_post_meta( get_the_ID(), 'user_facebook_link', TRUE )); ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
											<?php
												endif; 
												if(get_post_meta( get_the_ID(), 'user_twitter_link', TRUE ) != '') :										
											?>
											<li><a href="<?php echo esc_url(get_post_meta( get_the_ID(), 'user_twitter_link', TRUE )); ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
											<?php 
												endif; 
												if(get_post_meta( get_the_ID(), 'user_google_link', TRUE) != '' ) :											
											?>
											<li><a href="<?php echo esc_url(get_post_meta( get_the_ID(), 'user_google_link', TRUE )); ?>" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
											<?php 
												endif; 
												if(get_post_meta( get_the_ID(), 'user_linkedin_link', TRUE ) != '') :										
											?>
											<li><a href="<?php echo esc_url(get_post_meta( get_the_ID(), 'user_linkedin_link', TRUE )); ?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
											<?php 
												endif; 											
											?>
										</ul>
									</div>
								</div>
								<div class="product-detail">
									<p class="product-title"><span><?php the_title(); ?></span></p>
									<h6 class="item-price"><?php echo esc_attr(get_post_meta( get_the_ID(), 'user_designation', TRUE)); ?></h6>
								</div>
							</div>		   
						<?php endwhile; ?>
						<?php wp_reset_query(); ?>					
					</div>
					<?php else : ?>
						<p class="text-center mtb-0 font-italic"><?php esc_html__('Sorry, no posts matched your criteria.', 'philos') ?></p>
					<?php endif; ?>
				</div>	
			</div>	
		</div>
		</div>
	<?php
	}
	//Update the widget  

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		//Strip tags from title and name to remove HTML
		$instance['team_title'] = strip_tags( $new_instance['team_title'] );
		$instance['team_count'] = strip_tags( $new_instance['team_count'] );	
		$instance['show_info'] = $new_instance['show_info'];
		return $instance;
	}

	function form( $instance ) {
		//Set up some default widget settings.
		$defaults = array( 'team_title' => 'Meet the Team','team_count' => '3');
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

	    <p>
			<label for="<?php echo esc_attr($this->get_field_id('team_title')); ?>"><?php echo esc_html__('Title', 'philos'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('team_title')); ?>" name="<?php echo esc_attr($this->get_field_name('team_title')); ?>" value="<?php echo esc_attr($instance['team_title']); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('team_count')); ?>"><?php echo esc_html__('Number of Team Display', 'philos'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('team_count')); ?>" name="<?php echo esc_attr($this->get_field_name('team_count')); ?>" value="<?php echo esc_attr($instance['team_count']); ?>" />
		</p>	
		<?php
	}
} 
add_action( 'widgets_init', function(){ register_widget( 'Team_Widget' );});
//Team Widgets
?>